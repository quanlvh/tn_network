<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Stmt\Foreach_;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AppController
{

    public function index()
    {
        $this->viewBuilder()->setLayout('main_2017');
        //$this->autoRender = false;
        //$this->redirect(['action' => 'pref']);
    }

    /*
     * 代理依頼会社選択
     */
    public function agency()
    {
        //大陽日酸以外の会社一覧を取得
        $companies = TableRegistry::get('mst_companies')->getCompanies();
        $this->set('companies', $companies);
    }

    /*
     * 都道府県選択
     */
    public function pref()
    {
        $this->viewBuilder()->setLayout('main_2017');
        //都道府県マスタから取得
        $this->Pref = \Cake\ORM\TableRegistry::get('MstPref');
        $pref = $this->Pref->find()
            ->hydrate(false)
            ->select(['pref_code', 'pref_name'])
            ->order('pref_code asc')
            ->all();
        $this->set('pref', $pref);
        $this->set('post', $this->request->data);

    }

    /*
     * 地域選択
     */
    public function city()
    {
        if ($this->request->is('post')) {
            //都道府県コードから地域を取得
            $this->Area = \Cake\ORM\TableRegistry::get('MstArea');
            $area = $this->Area->find()->hydrate(false)
                ->where(['pref_code' => $this->request->data['pref_code']])
                ->select(['area_code', 'area_name', 'area_kana'])
                ->order('area_kana asc')
                ->all();
            $this->set('area', $area);
            $this->set('post', $this->request->data);

            $area_kana = array();
            foreach ($area as $val) {
                $area_kana[] = $val['area_kana'];
            }
            $this->set('area_kana', $area_kana);
        }

    }

    public function map()
    {
        if ($this->request->is('post')) {
            //都道府県マスタから取得
            $this->Pref = \Cake\ORM\TableRegistry::get('MstPref');
            $pref = $this->Pref->find()
                ->hydrate(false)
                ->select(['pref_code', 'pref_name'])
                ->order('pref_code asc')
                ->all();
            $this->set('pref', $pref);

            $this->Area = \Cake\ORM\TableRegistry::get('MstArea');
            $area = $this->Area->find()->hydrate(false)
                ->where(['pref_code' => $this->request->data['pref_code']])
                ->select(['area_code', 'area_name', 'area_kana'])
                ->order('area_kana asc')
                ->all();
            $this->set('area', $area);

            $area_kana = array();
            foreach ($area as $val) {
                $area_kana[] = $val['area_kana'];
            }
            $this->set('area_kana', $area_kana);

            $pref_name = \Cake\ORM\TableRegistry::get('mst_pref')
                ->find()
                ->enableHydration(false)
                ->select(['pref_name'])
                ->where(['pref_code'=>$this->request->getData('pref_code')])
                ->first();

            if(!empty($this->request->data['area_code'])) {
                $area_name = \Cake\ORM\TableRegistry::get('mst_area')
                    ->find()
                    ->enableHydration(false)
                    ->select(['area_name'])
                    ->where(['area_code'=>$this->request->getData('area_code')])
                    ->first();
                $this->request->data['area_name'] = $area_name['area_name'];
            }
            else if(!empty($this->request->getData('area_name'))){
                $area_code = TableRegistry::get('mst_area')->find()
                        ->hydrate(false)
                        ->select('area_code')
                        ->where(['pref_code' => $this->request->getData('pref_code')])
                        ->where(['area_name' => $this->request->getData('area_name')])
                        ->first();
                $this->request->data['area_code'] = $area_code['area_code'];
            }
            else {
                $this->request->data['area_code'] = "";
            }
            $this->request->data['pref_name'] = $pref_name['pref_name'];


            $this->set('post', $this->request->getData());
        }

    }

    /*
     * 医師の了解
     */
    public function consent()
    {
        $this->set('post', $this->request->data);
    }

    /*
     * request_no の作成
     *
     */
    public function count()
    {
    	// requests テーブルから、request_no の値を取得する。
    	$this->CountNum = \Cake\ORM\TableRegistry::get('requests');
    	$CountNum = $this->CountNum->find()
    						->select(['id','status','request_no'])
    						->last();
    	// 値が空で在れば新規に作成する
    	if(empty($CountNum->request_no)) {
    		$CountNum = PERIOD . "-" . "0001";
    	} else {
    	// カウントアップする。
    		$NumTmp = explode("-", $CountNum->request_no);
    		++$NumTmp[1];
    		$CountNum = PERIOD . "-" . str_pad($NumTmp[1], 4, 0, STR_PAD_LEFT);
    	}
    	return $CountNum;
    }


    /*
     * 依頼詳細入力
     */
    public function detail($history = null)
    {
        $request = $this->request->getData();

        //一時保存のデータがある場合は呼び出す
        if(!empty($history)) {

        }

        if( $this->request->is('post') ) {

            //県コードと地域コードから住所を生成
            $pref_name = $this->request->getData('pref_name');

            $area_name = $this->request->getData('area_name');
            if (!empty($pref_name) and (!empty($area_name))) {
            	//$this->request->withData('lodging_place_addr', $pref_name['pref_name'].$area_name['area_name']);
            	$this->set('lodging_place_addr',$pref_name.$area_name.$this->request->getData('address'));
            }

            $this->request->data['request_no']= $this->count();

            Log::debug($this->request->data());
            $data = $this->request->data();
            $this->set(compact($data));
            $this->set('_seriarize', ['data']);

        }

        // datalist 機器リストの取得
        $this->Mst_machines = TableRegistry::get('mst_machines');
        $mst_machines = $this->Mst_machines->find()->enableHydration(false)
        ->order(['machine_code'])->select(['machine_code','machine_name'])->toList();

        // 機器リストの配列操作
        $mst_machines = $this->MachinesMakeArray($mst_machines);
        Log::debug($mst_machines);

        // 事業所情報をセット
        $Mst_branch_offices = null;
        $Mst_companies = null;
        //代理依頼
        if (!empty($request['branch_code'])) {
            $Mst_branch_offices = TableRegistry::get('mst_branch_offices')->find()
                ->enableHydration(false)
                ->where(['branch_code' => $request['branch_code']])
                ->first();
            $this->set('is_Agency', true);
        } //通常依頼
        else {
            $Mst_branch_offices = $this->request->session()->read('login_branch_office');

            $this->set('is_Agency', false);
        }
        $Mst_companies = TableRegistry::get('mst_companies')->find()->enableHydration(false)
            ->where(['company_code' => $Mst_branch_offices['company_code']])
            ->first();
        $this->set('branch_office', $Mst_branch_offices);
        $this->set('company', $Mst_companies);


        // 依頼会社担当者リストの取得
        $this->Users = TableRegistry::get('users');
        $Person = $this->Users->find()->enableHydration(false)
        ->order(['id'=>'asc'])->toList();
        $this->set('tanto', $this->MakeSelectBoxArray($Person, $Mst_branch_offices['branch_code']));

        $this->set('machines',$mst_machines);
        $this->request->data['offer_date']=date('Y/m/d');
        $this->set('post', $this->request->data());
    }

    /*
     * 入力内容の確認
     */
    public function confirm()
    {
    	Log::debug($this->request->data());
    	$this->set('from_week', $this->weekday_2_convert($this->request->data['stay_from_date']));
    	$this->set('to_week', $this->weekday_2_convert($this->request->data['stay_to_date']));
    	$this->set('set_date', $this->weekday_2_convert($this->request->getData('pre_installation_date')));
    	$this->set('pick_up_date',$this->weekday_2_convert($this->request->getData('pick_up_date')));

    	// 依頼会社担当者リストの取得
    	$this->Users = TableRegistry::get('users');
    	$Person = $this->Users->find()->enableHydration(false)
    	->order(['id'=>'asc'])->toList();
    	$this->set('tanto', $Person);

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


    		$this->set('mst_companies', $Mst_companies);
    		$this->set('mst_branch_offices', $Mst_branch_offices);
    	}
    	// ファイルアップロード処理
    	$finfo = finfo_open(FILEINFO_MIME_TYPE); // ファイルインフォデータベースを開く
    	$now = date("YmdHis");

    	// 仮アップロード
    	foreach($_FILES as $key => $val){
    		if (!$val["tmp_name"]) continue;
    		$files[$key]["name"] = $val["name"];
    		// アップロードされたファイルの拡張子を取得
    		list($mime,$ext) = explode("/",finfo_file($finfo, $val["tmp_name"]));

			// 仮ディレクトリへファイルをアップロード
			copy($val["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}/webroot/temp_img_files/tmp/{$now}_{$key}.{$ext}");
			$files[$key]["tmp_name"] = "{$_SERVER['DOCUMENT_ROOT']}/webroot/temp_img_files/tmp/{$now}_{$key}.{$ext}";
			$files[$key]["url"] = "http://{$_SERVER['SERVER_NAME']}/webroot/temp_img_files/tmp/{$now}_{$key}.{$ext}";
    	}
    	// ファイルインフォデータベースを閉じる
    	finfo_close($finfo);

    	$this->set('files', $files);

        $this->set('amount', $this->calc($this->request->data()));
    	$this->set('post', $this->request->data());
    	Log::debug($this->request->data());
    }

    /*
     * 完了画面
     */
    public function complete()
    {
        if($this->request->is('post')) {
         	//var_dump($this->request->getData());
            $entity = $this->Requests->newEntity($this->request->data);
            if (!$entity->getErrors()) {
            	//エラーなし
            	$dir = realpath(WWW_ROOT . "tmp_img_file");
            	$limitFileSize = 1024 * 1024;
            	try{
            		$entity['file'] = $this->file_upload($this->request->getData($this->tmpName), $dir, $limitFileSize);
            	} catch (\RuntimeException $e){
            		$this->Flash->error(__('ファイルのアップロードが出来ませんでした。'));
            		$this->Flash->error(__($e->getMessage()));
            	}
            } else {
            	//エラーあり
            	$errors = $entity->getErrors();
            	Log::debug($errors);
            }
            $this->set('post', $this->request->data);
            Log::debug($this->request->data);

            //status
            $entity->status = STATUS_ANSWER_WAITING;
            $entity->temporary_saving_flg = STATUS_START;

            //日付をdatetime型に
            $entity->stay_from_date = $this->request->getData('stay_from_date').' 00:00:00';
            $entity->stay_to_date = $this->request->getData('stay_to_date').' 00:00:00';
            $entity->setting_preferred_date = $this->request->getData('setting_preferred_date').' 00:00:00';
            $entity->pickup_preferred_date = $this->request->getData('pickup_preferred_date').' 00:00:00';
            $entity->pre_instalation_date = $this->request->getData('pre_instalation_date').' 00:00:00';
            $entity->pick_up_date = $this->request->getData('pick_up_date').' 00:00:00';
            date_default_timezone_set('Asia/Tokyo');
            $entity->offer_date = date('Y-m-d H:i:s');

            // 添付ファイル情報
            $files = $this->request->getData('files');
            $entity->is_attachment_1 = $files["attachment_1"]["name"];
            $entity->is_attachment_2 = $files["attachment_2"]["name"];

            foreach ($files as $key => $val) {
            	rename($val["tmp_name"],"{$_SERVER['DOCUMENT_ROOT']}/webroot/temp_img_files/".basename($val["name"]));
            	$files[$key]["url"] = "http://{$_SERVER['SERVER_NAME']}/webroot/temp_img_files/".basename($val["name"]);
            }


            //依頼会社情報をセット
            $user = $this->request->session()->read('Auth')['User'];
            $company = $this->request->session()->read('login_company');

            $entity->request_company_staff_name = $user['user_name'];

            //代理依頼
            if(!empty($this->request->getData('branch_code'))) {
                $company = TableRegistry::get('mst_branch_offices')
                    ->getCompanyByBranchCode($this->request->getData('branch_code'));
                $entity->request_company_code = $company['company_code'];
                $entity->request_branch_code = $this->request->getData('branch_code');
            }
            else {
                $entity->request_company_code = $user['company_code'];
                $entity->request_branch_code = $user['branch_code'];
            }

            //受託会社をテスト用にログイン会社と同じ会社にする
            $entity->contractor_company_code = $user['company_code'];
            $entity->contractor_branch_code = $user['branch_code'];

            //金額情報をセット
            $amount=$this->calc($this->request->data());
            $entity->request_charge = $amount['request_charge'];
            $entity->request_charge_tax = $amount['request_charge_tax'];
            $entity->contractor_charge = $amount['contractor_charge'];
            $entity->contractor_charge_tax = $amount['contractor_charge_tax'];
            $entity->contractor_payment = $amount['contractor_payment'];
            $entity->contractor_payment_tax = $amount['contractor_payment_tax'];
            $entity->executive_commission = $amount['executive_commission'];
            $entity->executive_commission_tax = $amount['executive_commission_tax'];

            // 依頼書作成者
            $entity->created_by = $user['user_id'];

            if($this->Requests->save($entity)) {
                //save成功
                if(!empty($this->request->data['accessories'])) {
                	Log::debug($this->request->data['accessories']);
                	$WorkTmp = $this->explode2implode($this->request->data['accessories']);
                	$this->request->data('accessories',$WorkTmp);
                }
                $this->RequestMachines = \Cake\ORM\TableRegistry::get('RequestMachines');
                $entity2 = $this->RequestMachines->newEntity($this->request->data);
                $this->RequestMachines->save($entity2);
                Log::debug($entity2);
                //金額明細テーブル更新
                $this->AmountDetails = \Cake\ORM\TableRegistry::get('AmountDetails');
                foreach($amount['amount_details'] as $value){
	                $entity3 = $this->AmountDetails->newEntity($value);
                	$entity3->request_no = $this->request->data['request_no'];
	                $this->AmountDetails->save($entity3);
                }
                Log::debug($entity3);


                //保存した内容から依頼番号取得
                //依頼機器を保存

                //依頼先選出

                //メール送信

                //FAX送信
            }
            else {

            }
        }
    }

    /*
     * カンマ区切りに
     */
    public function explode2implode($data)
    {
    	$WorkTwo = implode(",", $data);

    	return $WorkTwo;
    }

    /*
     * 日付から曜日を求める
     */
    public function weekday_2_convert( $date )
    {
    	$weekday = ['日', '月', '火', '水', '木', '金', '土'];

    	return $weekday[date( 'w', strtotime($date))];
    }

    /*
     * 一時保存
     */
    public function temporarilySave()
    {
    	if($this->request->is('post')) {
    		Log::debug($this->request->data);
    		$entity = $this->Requests->newEntity($this->request->data);
    		$this->set('post', $this->request->data);

    		//status
    		$entity->status = STATUS_TMP_SAVE;
    		$entity->temporary_saving_flg = STATUS_TMP_SAVE;

    		//日付をdatetime型に
    		$entity->stay_from_date = $entity->stay_from_date;
    		$entity->stay_to_date = $entity->stay_to_date;
    		$entity->setting_preferred_date = $entity->setting_preferred_date.' 00:00:00';
    		$entity->pickup_preferred_date = $entity->pickup_preferred_date.' 00:00:00';

    		//依頼会社情報をセット
    		$user = $this->request->session()->read('Auth')['User'];
    		$company = $this->request->session()->read('login_company');

    		$entity->request_company_staff_name = $user['user_name'];
    		$entity->request_company_code = $user['company_code'];
    		$entity->request_branch_code = $user['branch_code'];

    		//受託会社をテスト用にログイン会社と同じ会社にする
    		$entity->contractor_company_code = $user['company_code'];
    		$entity->contractor_branch_code = $user['branch_code'];

    		if($this->Requests->save($entity)) {
    			//save成功
    			if(!empty($this->request->data['accessories'])) {
    				$WorkTmp = $this->explode2implode($this->request->data['accessories']);
    				$this->request->withData('accessories',$WorkTmp);
    			}
    			$this->RequestMachines = \Cake\ORM\TableRegistry::get('RequestMachines');
    			$entity2 = $this->RequestMachines->newEntity($this->request->data);
    			$this->RequestMachines->save($entity2);
    			Log::debug("entity2 = ".$entity2);
    			//保存した内容から依頼番号取得
    			//依頼機器を保存

    			//依頼先選出

    			//メール送信

    			//FAX送信
    		}
    		else {

    		}
    	}

        //$this->redirect(['controller'=>'Mypage']);
    }

    /*
     * 機器マスターデータの配列処理
     */
    public function MachinesMakeArray($array)
    {
    	foreach ($array as $value){
    		$name[$value['machine_code']] = $value['machine_name'];
    	}
    	return $name;
    }

    /*
     * 依頼会社担当者用に配列を作成する
     *
     */
    public function MakeSelectBoxArray($array, $branch_code)
    {
    	foreach($array as $value){
    		if ($branch_code == $value['branch_code']) {
    			$name[$value['user_name']] = $value['user_name'];
    		}
    	}
    	return $name;
    }

    /*
     * 地区コードから座標を取得する
     */
    public function getAddress() {
        $this->autoRender = false;
        if($this->request->is('ajax')) {
            $request = $this->request->getData();

            $area = $request['prefName'].$request['areaName'].$request['address'];
            $xml = file_get_contents('http://geocode.csis.u-tokyo.ac.jp/cgi-bin/simple_geocode.cgi?charset=UTF8&addr='.$area);
            $response = get_object_vars(simplexml_load_string($xml));
            $response['candidate'] = get_object_vars($response['candidate']);

            $pos['longitude'] = $response['candidate']['longitude'];
            $pos['latitude'] = $response['candidate']['latitude'];

            Log::debug($pos);
            echo json_encode($pos);
        }
    }

    /*
     * 都道府県コードから市区町村のリストを取得する
     */
    public function getAreaList() {
        $this->autoRender = false;
        if($this->request->is('ajax')) {
            //都道府県コードから地域を取得
            $this->Area = \Cake\ORM\TableRegistry::get('MstArea');
            $area = $this->Area->find()->hydrate(false)
                ->where(['pref_code' => $this->request->getData('prefCode')])
                ->select(['area_code', 'area_name'])
                ->order('area_kana asc')
                ->all();

            echo json_encode($area);
        }
    }

    /*
     * 会社コードから販売店を取得
     */
    public function getBranchOffices()
    {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $branch = TableRegistry::get('mst_branch_offices')->getBranchByCompanyCode($data['companyCode']);

            echo json_encode($branch);
        }
    }

    /**
     * 画像アップロード処理
     */
    public function file_upload ($file = null,$dir = null, $limitFileSize = 1024 * 1024){
    	try {
    		// ファイルを保存するフォルダ $dirの値のチェック
    		if ($dir){
    			if(!file_exists($dir)){
    				throw new RuntimeException('指定のディレクトリがありません。');
    			}
    		} else {
    			throw new RuntimeException('ディレクトリの指定がありません。');
    		}

    		// 未定義、複数ファイル、破損攻撃のいずれかの場合は無効処理
    		if (!isset($file['error']) || is_array($file['error'])){
    			throw new RuntimeException('Invalid parameters.');
    		}

    		// エラーのチェック
    		switch ($file['error']) {
    			case 0:
    				break;
    			case UPLOAD_ERR_OK:
    				break;
    			case UPLOAD_ERR_NO_FILE:
    				throw new RuntimeException('No file sent.');
    			case UPLOAD_ERR_INI_SIZE:
    			case UPLOAD_ERR_FORM_SIZE:
    				throw new RuntimeException('Exceeded filesize limit.');
    			default:
    				throw new RuntimeException('Unknown errors.');
    		}

    		// ファイル情報取得
    		$fileInfo = new File($file["tmp_name"]);

    		// ファイルサイズのチェック
    		if ($fileInfo->size() > $limitFileSize) {
    			throw new RuntimeException('Exceeded filesize limit.');
    		}

    		// ファイルタイプのチェックし、拡張子を取得
    		if (false === $ext = array_search($fileInfo->mime(),
    				[		'jpg' => 'image/jpeg',
    						'png' => 'image/png',
    						'gif' => 'image/gif',
    						'pdf' => 'application/pdf',
    				],
    				true)){
    					throw new RuntimeException('Invalid file format.');
    				}

    				// ファイル名の生成
    				//$uploadFile = $file["name"] . "." . $ext;
    				$uploadFile = sha1_file($file["tmp_name"]) . "." . $ext;

    				// ファイルの移動
    				if (!@move_uploaded_file($file["tmp_name"], $dir . "/" . $uploadFile)){
    					throw new RuntimeException('Failed to move uploaded file.');
    				}

    				// 処理を抜けたら正常終了
    				//echo 'File is uploaded successfully.';

    	} catch (RuntimeException $e) {
    		throw $e;
    	}
    	return $uploadFile;
    }
}
