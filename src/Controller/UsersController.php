<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\Event\Event;
use Cake\Database\Type;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\PostDec;
use Cake\Mailer\Email;

class UsersController extends AppController
{
	private $default_password = "******";

	/**
	 *  beforeFilter
	 *  @param Event $event イベントオブジェクト
	 *  @return void
	 */
	public function boforeFilter(Event $event)
	{
		parent::boforeFilter($event);
		$this->Auth->allow(['regist']);
	}

	/**
	 * ログインページ
	 * @return Type
	 */
	public function login()
	{
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user); // データをセットしてログイン
				//$this->request->session()->delete('Auth.redirect');
				// パスワードの変更日数確認
				$interval = $this->password_interval($user['password_update_date']);

				if ($interval == true){
					$this->Flash->error(__('ユーザIDまたは、パスワードに誤りがあります'));
				} else {
					return $this->redirect($this->Auth->redirectUrl());
				}
			} else {
				$this->Flash->error(__('Username or password is incorrect'),'default',[],'auth');
			}
		}
	}


	/**
	 * ログアウト
	 * @return Type
	 */
	public function logout()
	{
		$this->Flash->success('ログアウトしました');
		return $this->redirect($this->Auth->logout());
	}

	/**
	 * パスワードの変更
	 * @return Type
	 */
	public function repass()
	{
		//modelの読み込み(コントローラ名と同じモデルを使用する際は不要)
		$this->Requests = TableRegistry::get('requests');
		$this->Retained_requests = TableRegistry::get('retained_requests');
		$this->Users = TableRegistry::get('Users');
		$this->Mst_companies = TableRegistry::get('mst_companies');
		$this->Mst_branch_offices = TableRegistry::get('mst_branch_offices');

		//ユーザ情報取得(絞り込んで取得する場合 first()は最初の一件のみ取得)
		$auth = $this->set('user',$this->Auth->user());
		$users = $this->Users->find()->hydrate(false)
		->where(['user_id' => $auth->viewVars['user']['user_id']])->first();
		//会社情報取得
		$Mst_companies = $this->Mst_companies->find()->hydrate(false)
		->where(['company_code' => $users['company_code']])->first();
		//支店情報取得
		$Mst_branch_offices = $this->Mst_branch_offices->find()->hydrate(false)
		->where(['company_code' => $users['company_code']])
		->where(['branch_code' => $users['branch_code']])
		->first();

		//ビューにセット(第一引数で指定した文字列がビュー側での変数名になる)
		$this->set('users', $users);
		$this->set('mst_companies', $Mst_companies);
		$this->set('mst_branch_offices', $Mst_branch_offices);

		$user = $this->Users->get($this->Auth->user('id'),[
				'contain' => []
		]);
		if($this->request->is(['post'])) {
			$user = $this->Users->patchEntity($user, $this->request->data());
			if ($this->Users->save($user)) {
				echo "パスワード変更が完了しました。";
			}else{
				echo "パスワード変更が出来ませんでした。";
				$this->set('error', true);
				Log::debug($this->request->data);
			}
		}

	}

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
    public function index()
    {
    	$use_list = $this->Users->find()->select(['user_id','user_name'])->order(['user_id' => 'ASC'])->all();
    }

    /**
     * ユーザー情報表示&更新
     * @param unknown $id
     */
    public function view($id)
    {
    	// model の読み込み
    	$this->Mst_companies = TableRegistry::get('mst_companies');
    	$this->Mst_branch_offices = TableRegistry::get('mst_branch_offices');

    	$users = $this->Users->get($id);
    	$this->set('users', $users);

    	// 会社情報取得
    	$Mst_companies = $this->Mst_companies->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['company_code'])->select(['company_code','company_name'])->toArray();

    	// 事業所情報取得
    	$Mst_branch_offices = $this->Mst_branch_offices->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['branch_code'])->select(['branch_code','branch_name','company_code'])->toArray();

    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    		$this->set('user', $user);
    	}
Log::debug($user);
    	//ビューにセット
    	$this->set('mst_companies2', $Mst_companies);
    	$this->set('mst_branch_offices2', $Mst_branch_offices);

    	if ( ($user['user_role']==ROLE_EXECUTIVE_HEAD_OFFICE) or ($user['user_role']==ROLE_MTSC) ) {
    		// 更新処理実行
    		if ($this->request->is(['put'])) {
    			$users = $this->Users->patchEntity($users, $this->request->getData());
    			Log::debug("users = ".$users);
    			if ($this->Users->save($users)) {
    				$this->Flash->success(__('The user has been saved.'));
    				return $this->redirect(['action' => 'find']);
    			} else {
    				$this->Flash->error(__('The Users could not be saved. Please, try again.'));
    			}
    		}
    	} elseif ( ($user['user_role']==ROLE_STORE) or ($user['user_role']==ROLE_EXECUTIVE_BRANCH_OFFICE) ) {
    		// 更新承認申請
    		$entity = TableRegistry::get('Users');
    		if ($this->request->is(['put'])){
    			$this->Count = $this->id_count();
    			$query = $entity->query();
    			$reMakeArray = ['user_id'=>$this->request->getData('user_id'),'password'=>$users['password'],'user_role'=>$this->request->getData('user_role'),
    					'is_lock'=>$this->request->getData('is_lock'),'user_name'=>$this->request->getData('user_name'),'approval_pending'=>APPROVAL_PENDING,
    					'mail_addr_1'=>$this->request->getData('mail_addr_1'),'mail_addr_2'=>$this->request->getData('mail_addr_2'),'company_code'=>$this->request->getData('company_code'),'branch_code'=>$this->request->getData('branch_code'),
    					'applying'=>$this->request->getData('applying'),'position'=>$this->request->getData('position'),'id'=>$this->Count
    			];
    			$query->insert(['user_id','password','user_role','is_lock','user_name','approval_pending','mail_addr_1',
    					'mail_addr_2','company_code','branch_code','applying','position','id'
    			]);
    			$query->values($reMakeArray);
    			$query->execute();
    			if ($query){
    				$this->Flash->success(__('更新申請を受け付けました。'));
    			} else {
    				$this->Flash->error(__('更新処理の受理が出来ませんでした。'));
    			}
    		}

    	}
    }

    /*
     * adding user data
     */
    public function add()
    {
    	//modelの読み込み(コントローラ名と同じモデルを使用する際は不要)
    	$this->Requests = TableRegistry::get('requests');
    	$this->Retained_requests = TableRegistry::get('retained_requests');
    	$this->Users = TableRegistry::get('Users');
    	$this->Mst_companies = TableRegistry::get('mst_companies');
    	$this->Mst_branch_offices = TableRegistry::get('mst_branch_offices');

    	//ユーザ情報取得(絞り込んで取得する場合 first()は最初の一件のみ取得)
    	$auth = $this->set('user',$this->Auth->user());
    	$users = $this->Users->find()->enableHydration(false)
    	->where(['user_id' => $auth->viewVars['user']['user_id']])->first();

    	//会社情報取得
    	$Mst_companies = $this->Mst_companies->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['company_code'])->select(['company_code','company_name'])->toArray();

    	//支店情報取得
    	$Mst_branch_offices = $this->Mst_branch_offices->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['branch_code'])->select(['branch_code','branch_name','company_code'])->toArray();

    	//ビューにセット(第一引数で指定した文字列がビュー側での変数名になる)
    	$this->set('users', $users);
    	$this->set('mst_companies', $Mst_companies);
    	$this->set('mst_branch_offices', $Mst_branch_offices);

    	$addusers = $this->Users->newEntity();
    	if ($this->request->is(['post','put'])) {
    		$addusers = $this->Users->patchEntity($addusers, $this->request->getData());
    		if ($this->Users->save($addusers)) {
    			$this->Flash->success(__('The user has been saved.'));
    			return $this->redirect(['action' => 'add']);
    		} else {
    			Log::debug("ER = ".$addusers);
    			$this->Flash->error(__('Unable to add the User.'));
    		}
    	}

    }

    /*
     * 利用者検索処理
     *
     */
    public function find()
    {
    	//modelの読み込み(コントローラ名と同じモデルを使用する際は不要)
    	$this->Requests = TableRegistry::get('requests');
    	$this->Retained_requests = TableRegistry::get('retained_requests');
    	$this->Users = TableRegistry::get('Users');
    	$this->Mst_companies = TableRegistry::get('mst_companies');
    	$this->Mst_branch_offices = TableRegistry::get('mst_branch_offices');

    	//ユーザ情報取得(絞り込んで取得する場合 first()は最初の一件のみ取得)
    	$auth = $this->set('user',$this->Auth->user());
    	$users = $this->Users->find()->enableHydration(false)
    	->where(['user_id' => $auth->viewVars['user']['user_id']])->first();

    	//会社情報取得
    	$Mst_companies = $this->Mst_companies->find()->enableHydration(false)
    	->order(['company_code'])->select(['company_name','company_code'])->toList();
        // 会社情報配列の再配列化
    	$arName = $this->MakeArray($Mst_companies);

    	//事業者情報取得
    	$Mst_branch_offices = $this->Mst_branch_offices->find()->enableHydration(false)
    	->order(['branch_code'])->select(['branch_code','branch_name','company_code'])->toList();
    	// 事業所情報配列の再配列化
    	$arBranchName = $this->BranchMakeArray($Mst_branch_offices);

    	//メイン担当
    	$handle = Configure::read("handle");
    	$this->set("handle", $handle);

    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    		$this->set('user', $user);

    		//会社情報取得
    		$Mst_companies = \Cake\ORM\TableRegistry::get('mst_companies')->find()->enableHydration(false)
    		->where(['company_code' => $user['company_code']])->first();
    		$this->request->session()->write('login_company', $Mst_companies);
    		//支店情報取得
    		$Mst_branch_offices = \Cake\ORM\TableRegistry::get('mst_branch_offices')->find()->enableHydration(false)
    		->where(['company_code' => $user['company_code']])
    		->where(['branch_code' => $user['branch_code']])
    		->first();
    		$this->request->session()->write('login_branch_office', $Mst_branch_offices);

    		//ビューにセット(第一引数で指定した文字列がビュー側での変数名になる)
    		$this->set('mst_companies', $Mst_companies);
    		$this->set('mst_branch_offices', $Mst_branch_offices);
    	}

    	//ビューにセット(第一引数で指定した文字列がビュー側での変数名になる)
    	$this->set('name', $arName);
    	$this->set('branchName', $arBranchName);

    	$users = [];
    	$count = 0;
    	if ($this->request->is('post')){
    		$find = $this->request->getQuery('user_id');
    		$query = $this->Users->find();
    		if ($this->request->data['user_id']) {
    			$query = $query->where(['user_id' => $this->request->data['user_id']])->order(['user_id' => 'DESC']);
    		}
    		if ($this->request->data['user_name']) {
    			$query = $query->where(['user_name LIKE' => '%'.$this->request->data['user_name'].'%'])->order(['user_name' => 'DESC']);
    		}
    		if ( !empty($this->request->data['mail_addr_1'])) {
    			$query = $query->where(['mail_addr_1 LIKE' => '%'.$this->request->data['mail_addr_1'].'%'])->order(['mail_addr_1' => 'DESC']);
    		}
    		if (!empty($this->request->getData('mail_addr_2'))){
    			$query = $query->where(['mail_addr_2 LIKE' => '%'.$this->request->getData('mail_addr_2').'%'])->order(['mail_addr_2' => 'DESC']);
    		}
    		if ( !empty($this->request->data['handle'])) {
    			$query = $query->where(['handle' => $this->request->data['handle']]);
    		}
    		if (!empty($this->request->getData('applying'))) {
    			$query = $query->where(['applying'=> $this->request->getData('applying')]);
    		} else {
    			if (!empty($this->request->getData('is_deleted'))) {
    				$query = $query->where(['applying'=>2,'is_deleted IN'=>[0,1],'approval_pending'=>'0']);
    			} else {
    				$query = $query->where(['applying'=>'2','approval_pending'=>'0','is_deleted'=>'0']);
    			}
    		}
Log::debug($query);
    		$count = $query->count();
    		$users = $query->toList();
    	}
    	$this->set('users', $users);
    	$this->set('count', $count);
    	$this->set('post', $this->request->getData());
    }

    /**
     * ユーザー登録申請
     */
    public function regist()
    {
    	$error = false;
    	$query = $this->Users->find();
    	$query->select(['user_id']);
    	foreach ($query as $row) {
    		if ($row->user_id == $this->request->getData('user_id')) {
    			$this->Flash->error(__('入力されました、ユーザーIDは既に使用されてますので、変更をお願い致します。'));
    			$error = true;
    			break;
    		}
    	}
    	// 所属会社情報取得
    	$company = TableRegistry::get('mst_companies');
    	$companies = $company->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['company_code'])
    	->select(['company_code','company_name'])->toArray();
    	$this->set('companies',$companies);

    	// 所属事業所情報取得
    	$branch = TableRegistry::get('mst_branch_offices');
    	$Mst_branch_offices = $branch->find()->enableHydration(false)
    	->where(['approval_pending'=>'0'])
    	->order(['branch_code'])->select(['branch_code','branch_name','company_code'])->toArray();
    	$this->set('branch',$Mst_branch_offices);

    	// password & password_conf & user_role の設定
    	$tmp_pass = date('Ymd', mktime(0, 0, 0, date('m'), date('d'), date('Y')))."system";
    	$tmp_conf = date('Ymd', mktime(0, 0, 0, date('m'), date('d'), date('Y')))."system";
    	$tmp_role = "0";
    	$applying = "1";
    	$created = date("Y-m-d H:i:s");

    	$this->set('tmp_pass', $tmp_pass);
    	$this->set('tmp_conf', $tmp_conf);
    	$this->set('tmp_role', $tmp_role);
    	$this->set('tmp_apply', $applying);
    	$this->set('created_at', $created);

    	if($error == false) {
    	  $registUser = $this->Users->newEntity();
    	  if ($this->request->is(['post','put'])) {
    		  $registUser = $this->Users->patchEntity($registUser, $this->request->getData());
    		  if ($this->Users->save($registUser)) {
    			  $this->Flash->success(__('The user has been saved.'));
    		  } else {
    			  $this->Flash->error(__('Unable to add the user.'));
    		  }
    	  }
    	}
    	$this->set('post',$this->request->getData());

    }

    /**
     * Delete method
     *
     * @param string|null $id Mst Branch id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	$this->request->is(['post', 'delete']);
    	$del_users = $this->Users->get($id);

    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    		$this->set('user',$user);
    	}

    	if (($user['user_role'] == ROLE_EXECUTIVE_BRANCH_OFFICE) or ($user['user_role'] == ROLE_STORE)) {
    		// 事務局支社・販売店の削除処理パート
    		$del_user = TableRegistry::get('Users');
    		$query = $del_user->query();
    		$query->update()->set(['approval_pending'=>APPROVAL_PENDING,'deleted_by'=>$user['user_id']])->where(['id'=>$id])->execute();
    		if($query){
    			$this->Flash->success(__('削除申請を受け付けました。'));
    		} else {
    			$this->Flash->error(__('Unable to is_deleted the user'));
    		}
    	} elseif (($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE)or($user['user_role'] == ROLE_MTSC)) {
    		// 事務局本部・MTSCの論理削除処理パート
    		$del_user = TableRegistry::get('Users');
    		$query = $del_user->query();
    		$query->update()->set(['is_deleted'=>IS_DELETE,'deleted_by'=> $user['user_id']])->where(['id'=> $id])->execute();
    		if ($query){
    			$this->Flash->success(__('The user has been delete.'));
    		} else {
    			$this->Flash->error(__('Unable to delete the user.'));
    		}
    	}
    	return $this->redirect(['action' => 'find']);
    }

    /*
     * パスワード忘れ処理
     */
    public function remember()
    {
    	$this->pwd_text = "本日、パスワードの発行処理を行いました。\n";
    	$this->pwd_text .= "もし、処理を行った覚えが無い場合は、\n";
    	$this->pwd_text .= "すぐに事務局まで連絡をお願い致します。\n";
    	$this->pwd_text .= "発行パスワードは、YYYYMMDD＋PWDになります。\n";
    	$this->pwd_text .= "ログイン後、すぐにパスワードの変更をお願い致します。\n";

    	$user_id_error = true;
    	$mail_addr_1_error = true;
    	if ($this->request->is(['post','put'])) {
    		$query = $this->Users->find()->where(['approval_pending'=>'0','applying'=>'2','user_id'=>$this->request->getData('user_id')]);
    		$query->select(['id','user_id','mail_addr_1','mail_addr_2']);
    		foreach ($query as $row) {
    			if ($row->user_id == $this->request->getData('user_id')) {
    				Log::debug("user_id");
    				//$this->Flash->success(__('ユーザーID OK'));
    				$user_id_error = false;
    			}
    			if ($row->mail_addr_1 == $this->request->getData('mail_addr_1')) {
    				Log::debug("mail_addr_1");
    				$this->mail_addr_1 = $this->request->getData('mail_addr_1');
    				if(!empty($row->mail_addr_2)){
    					$this->mail_addr_2 = $row->mail_addr_2;
    					$this->mail_addr = [$this->mail_addr_1,$this->mail_addr_2];
    				} else {
    					$this->mail_addr = $this->mail_addr_1;
    				}
    				//$this->Flash->success(__('メールアドレス OK'));
    				$mail_addr_1_error = false;
    			}
    			$this->id = $row->id;
    		}
    	}

    	if ($this->request->is(['post','put'])){
    		if ($user_id_error == true){
    			$this->Flash->error(__('ユーザーIDを確認して下さい。'));
    		}
    		if ($mail_addr_1_error == true) {
    			$this->Flash->error(__('メールアドレス1を確認して下さい。'));
    		}
    	}

    	if( ($user_id_error == false) and ($mail_addr_1_error == false) ) {
    		//$this->Flash->success(__('OK'));
    		if ($this->request->is(['post','put'])) {
    			date_default_timezone_set("Asia/Tokyo");
    			$pwd_update = date('Y-m-d H:i:s');
    			//$new_pwd = password_hash($this->request->getData('user_id'), PASSWORD_BCRYPT);
    			$new_pwd = password_hash(date('Ymd')."PWD", PASSWORD_BCRYPT);
    			$new_Password = TableRegistry::get('Users');
    			$query = $new_Password->query();
    			$query->update()->set(['password_update_date'=>$pwd_update,'password'=>$new_pwd])->where(['id'=>$this->id])->execute();

    			if ($query) {
    				$this->Flash->success(__('パスワードを再発行しました。'));
    				$this->send($this->mail_addr);

    				return $this->redirect(['action'=>'login']);
    			} else {
    				$this->Flash->error(__('パスワードの再発行に失敗しました。'));
    			}
    		}
    	}
    }

    /*
     *
     *
     */
    public function beforeFilter(\Cake\Event\Event $event) {
    	parent::beforeFilter($event);
    	$this->Auth->allow(['regist']);
    }

    /*
     * 会社情報連想配列の再配列処理
     */
    public function MakeArray($array)
    {
    	foreach($array as $value) {
    		$name[$value['company_code']] = $value['company_name'];
    	}
    	return $name;
    }

    /*
     * 支社情報連想配列の再配列処理
     */
    public function BranchMakeArray($array)
    {
    	foreach ($array as $value) {
    		$name[$value['branch_code']] = $value['branch_name'];
    	}
    	return $name;
    }

    /**
     *
     */
    public function reUpdate($array)
    {
    	unset($array['id']);
    	return $array;
    }

    /**
     * id count
     *
     */
    public function id_count()
    {
    	$count = 0;
    	$this->Users = TableRegistry::get('Users');
    	$query = $this->Users->find()->all();
    	$count = $query->count();
    	$count = $count + 1;
    	return $count;
    }

    /*
     * メール送信
     *
     */
    public function send()
    {
    	$email = new Email('default');
    	$email->setFrom(['admin@ids.co.jp'=>'アドミン'])
    		  ->setTo($this->mail_addr)
    		  ->setSubject('パスワード発行のお知らせ')
    		  ->send($this->pwd_text);
    }

    /*
     * パスワード更新日の確認
     */
    public function password_interval($password_update_date)
    {
    	$back = false;
    	$today = date('Y-m-d H:i:s');

    	$day1 = strtotime($password_update_date);
    	$day2 = strtotime($today);

    	$interval = ($day2 - $day1) / (60 * 60 * 24);

    	if ($interval >= 180) {
    		$back = true;
    	} else {
    		$back = false;
    	}
    	return $back;
    }
}