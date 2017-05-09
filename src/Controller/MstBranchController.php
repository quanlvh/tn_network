<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * MstBranch Controller
 *
 * @property \App\Model\Table\MstBranchTable $MstBranch
 */
class MstBranchController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->set('persons', $this->paginate());
    	$query = $this->MstBranch->find();

    	// 支店ID
    	if ( !empty($this->request->data['branch_code']) ) {
    		$query = $query->where(['branch_code' => $this->request->data['branch_code']]);
    	}
    	// 支店名
    	if ( !empty($this->request->data['branch_name']) ) {
    		$query = $query->where(['branch_name LIKE' => '%'.$this->request->data['branch_name'].'%']);
    	}
    	// 郵便番号
    	if ( !empty($this->request->data['branch_zip_code']) ) {
    		$query = $query->where(['branch_zip_code' => $this->request->data['branch_zip_code']]);
    	}
    	// 電話番号
    	if ( !empty($this->request->data['branch_tel']) ) {
    		$query = $query->where(['branch_tel' => $this->request->data['branch_tel']]);
    	}
    	// 支店住所
    	if ( !empty($this->request->data['branch_addr']) ) {
    		$query = $query->where(['branch_addr LIKE' => '%'.$this->request->data['branch_addr'].'%']);
    	}
    	// Paid登録「未登録分の検索」
    	if ($this->request->getData('paid')=='0') {
    		$query = $query->where(['paid' => $this->request->data['paid']]);
    	}
    	$query = $query->where(['is_deleted'=>'0','approval_pending'=>'0']);

    	$results = $query->toArray();
    	$count = $query->count();
    	$mstCompany = TableRegistry::get('mst_companies');
    	$mstCompanyName = $mstCompany->find()->where(['company_code'=>$results[0]['company_code']])->first();
    	$this->set('mstCompany', $mstCompanyName);
    	// ビューにセット
    	$this->set('count', $count);
    	$this->set('results', $results);
    	$paid = Configure::read('paid');
    	$this->set('paid', $paid);
    	$this->set('post', $this->request->data);


    	/*
        $mstBranch = $this->paginate($this->MstBranch);

        $this->set(compact('mstBranch'));
        $this->set('_serialize', ['mstBranch']);
        */
    }

    /**
     * View method
     *
     * @param string|null $id Mst Branch id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {

        $mstBranch = $this->MstBranch->get($id, [
            'contain' => []
        ]);

        $mstCompany = TableRegistry::get('mst_companies');
        $mstCompanyName = $mstCompany->find()->where(['company_code'=>$mstBranch['company_code']])->first();
        $this->set('mstCompany', $mstCompanyName);
        $users = TableRegistry::get('users');
        $userData = $users->find()->where(['branch_code'=>$mstBranch['branch_code'],['approval_pending'=>'0'],['applying'=>'2']])->toArray();
        $this->set('userData', $userData);
        $handle = Configure::read('handle');
        $this->set('handle', $handle);

        // ログインユーザ情報をセット
        if(!empty($this->request->session()->read('Auth')['User'])) {
        	$user = $this->request->session()->read('Auth')['User'];
        	$this->set('user', $user);
        }

        // Pref Code
        $this->prefCode = TableRegistry::get('mst_pref');
        $prefCode = $this->prefCode->find()->select(['pref_code','pref_name'])->toArray();
        $this->set('prefCode',$prefCode);


        if ( ($user['user_role']==ROLE_EXECUTIVE_HEAD_OFFICE) or ($user['user_role']==ROLE_MTSC) ) {
        	// 更新処理実行
        	if ($this->request->is(['put'])) {
        		$mstBranch = $this->MstBranch->patchEntity($mstBranch, $this->request->getData());
        		$mstBranch->updated_by = $user['user_id'];
        		if ($this->MstBranch->save($mstBranch)) {
        			$this->Flash->success(__('The mst branch has been saved.'));

        			return $this->redirect(['action' => 'index']);
        		} else {
        			$this->Flash->error(__('The mst branch could not be saved. Please, try again.'));
        		}
        	}
        } else if ( ($user['user_role']==ROLE_EXECUTIVE_BRANCH_OFFICE) or ($user['user_role']==ROLE_STORE) ) {
        	// 更新承認申請
        	$entity = TableRegistry::get('mst_branch_offices');
        	if ($this->request->is(['put'])){

        		$query = $entity->query();
        		$reMakeArray = ['company_code'=>$mstBranch['company_code'],'branch_code'=>$mstBranch['branch_code'],'branch_name'=>$this->request->getData('branch_name'),
        				'bank_code'=>$this->request->getData('bank_code'),'bank_name'=>$this->request->getData('bank_name'),'bank_branch_code'=>$this->request->getData('bank_branch_code'),
        				'bank_branch_name'=>$this->request->getData('bank_branch_name'),'deposit_type'=>$this->request->getData('deposit_type'),'account_number'=>$this->request->getData('account_number'),
        				'recipient_name'=>$this->request->getData('recipient_name'),
        				'invoice_shipping_address'=>$this->request->getData('invoice_shipping_address'),'branch_tel'=>$this->request->getData('branch_tel'),
        				'branch_fax'=>$this->request->getData('branch_fax'),'necessity_fax'=>$this->request->getData('necessity_fax'),'branch_zip_code'=>$this->request->getData('branch_zip_code'),
        				'branch_addr'=>$this->request->getData('branch_addr'),'paid'=>$this->request->getData('paid'),'approval_pending'=>APPROVAL_PENDING,'created_by'=>$user['user_id']
        		];

        		$query->insert(['company_code','branch_code','branch_name','bank_code','bank_name','bank_branch_code','bank_branch_name','deposit_type','account_number','recipient_name','invoice_shipping_address','branch_tel','branch_fax','necessity_fax',
        		'branch_zip_code','branch_addr','paid','approval_pending','created_by','id']);
        		$query->values($reMakeArray);
        		$query->execute();
        		if ($query) {
        			$this->Flash->success(__('更新申請を受け付けました。'));
        			//return $this->redirect(['action' => 'index']);
        		} else {
        			$this->Flash->error(__('更新処理の受理が出来ませんでした。'));
        		}
        	}
        }

        $this->set('mstBranch', $mstBranch);
        $this->set('_serialize', ['mstBranch']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	$handle = Configure::read('handle');
    	$this->set('handle', $handle);
    	// 会社情報取得
    	$company = TableRegistry::get('mst_companies');
    	$companies = $company->find()->enableHydration(false)
    	->order(['company_code'])->where(['approval_pending'=>'0'])->select(['company_code','company_name'])->toArray();
    	$this->set('companies', $companies);
    	$this->set('branch_code',$this->makeBranchCode());

    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    		$this->set('user', $user);
    	}

    	// Pref Code
    	$this->prefCode = TableRegistry::get('mst_pref');
    	$prefCode = $this->prefCode->find()->select(['pref_code','pref_name'])->toArray();
    	$this->set('prefCode',$prefCode);

        $mstBranch = $this->MstBranch->newEntity();
        if ($this->request->is(['post','put'])) {
        	$mstBranch->created_by = $user['user_id'];
            $mstBranch = $this->MstBranch->patchEntity($mstBranch, $this->request->getData());
            if ($this->MstBranch->save($mstBranch)) {
                $this->Flash->success(__('The mst branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mst branch could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mstBranch'));
        $this->set('_serialize', ['mstBranch']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mst Branch id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mstBranch = $this->MstBranch->get($id, [
            'contain' => []
        ]);

        $handle = Configure::read('handle');
        $this->set('handle', $handle);
        $users = TableRegistry::get('users');
        $userData = $users->find()->where(['branch_code'=>$mstBranch['branch_code']])->all();
        $this->set('userData', $userData);

        $mstCompany = TableRegistry::get('mst_companies');
        $mstCompanyName = $mstCompany->find()->where(['company_code'=>$mstBranch['company_code']])->first();
        $this->set('mstCompany', $mstCompanyName);
        $this->set('Session', $this->request->session()->read('id'));

        if ($this->request->is(['put'])) {
            $mstBranch = $this->MstBranch->patchEntity($mstBranch, $this->request->getData());
            if ($this->MstBranch->save($mstBranch)) {
                $this->Flash->success(__('The mst branch has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mst branch could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('mstBranch'));
        $this->set('_serialize', ['mstBranch']);
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
    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    	}

    	$this->request->is(['put']);
    	$mstBranch = TableRegistry::get('mst_branch_offices');

    	if ( ($user['user_role']==ROLE_EXECUTIVE_HEAD_OFFICE) or ($user['user_role']==ROLE_MTSC) ){
			// 更新処理実行
        	$query = $mstBranch->query();
        	$query->update()->set(['is_deleted'=>1,'delete_by'=>$user['user_id']])->where(['id'=> $id])->execute();
        	if($query){
        		$this->Flash->success(__('The mst branch has been is_deleted.'));
        	} else {
        		$this->Flash-error(__('The mst branch could not be deleted.'));
        	}

        	return $this->redirect(['action' => 'index']);
    	} elseif ( ($user['user_role']==ROLE_EXECUTIVE_BRANCH_OFFICE) or ($user['user_role']==ROLE_STORE) ){
    		//更新申請処理
    		$query = $mstBranch->query();
    		$query->update()->set(['approval_pending'=>APPROVAL_PENDING,'delete_by'=>$user['user_id']])->where(['id'=> $id])->execute();
    		if ($query) {
    			$this->Flash->success(__('削除処理を受け付けました。'));
    			return $this->redirect(['action'=>'index']);
    		} else {
    			$this->Flash->error(__('削除処理の受理が出来ませんでした。'));
    		}
    	}
    }

    /**
     * id count
     */
    public function id_count()
    {
    	$count = 0;
    	$this->MstBranch = TableRegistry::get('mst_branch_offices');
    	$query = $this->MstBranch->find()->all();
    	$count = $query->count();
    	$count = $count + 1;
    	return $count;
    }

    /**
     * Make Branch Code
     */
    public function makeBranchCode()
    {
    	$mstBranch = TableRegistry::get('mst_branch_offices');
    	$query = $mstBranch->find()->order(['branch_code'=>'DESC'])->select(['branch_code'])->all();
    	$count = $query->first();
    	Log::debug($count);
    	if ($count == '0'){
    		$count = 1;
    	} else {
    		$count = $count['branch_code'] + 1;
    	}
    	return $count;
    }
}
