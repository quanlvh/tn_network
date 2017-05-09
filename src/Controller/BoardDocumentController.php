<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class BoardDocumentController extends AppController
{

   public function index()
    {
		if($this->request->is('post')) {
			if(isset($this->request->data['activity_report'])){
				$this->activityReport();
			}elseif(isset($this->request->data['accounting_report'])) {
				$this->accountingReport();
			}elseif(isset($this->request->data['member_list'])){
				$this->memberList();
			}
		}
    }

    /**
    * 活動報告
    **/
    public function activityReport()
    {

    	//年度データ抽出用
    	$yyyy_from = date('Y-m-d', strtotime($this->request->data['activity_report_yyyy'].'/04/01'));
    	$yyyy_to = date('Y-m-d', strtotime(($this->request->data['activity_report_yyyy']+1).'/03/31'));
//print_r($yyyy_from);
   		//modelの読み込み
    	$this->Requests = TableRegistry::get('requests');

    	//依頼情報取得
    	$query= $this->Requests->find()->enableHydration(false)
    		->join(['table' => 'mst_statuses',
							'alias' => 'ms',
							'type' => 'LEFT',
							'conditions' => 'ms.status_code = requests.status'])
    		->join(['table' => 'status_flows',
							'alias' => 'sf',
							'type' => 'LEFT',
							'conditions' => ['sf.request_no = requests.request_no',
											"sf.status_code = '".STATUS_WAITING_INSTALL_MACHINE."'"]])
    		->join(['table' => 'mst_codes',
							'alias' => 'mc',
							'type' => 'LEFT',
							'conditions' => ['requests.machine_type = mc.code',
											"code_type = '".CODE_MACHINE_TYPE."'"]])
    		->join(['table' => 'mst_branch_offices',
							'alias' => 'r_br',
							'type' => 'LEFT',
							'conditions' => 'r_br.branch_code = requests.request_branch_code'])
    		->join(['table' => 'mst_branch_offices',
							'alias' => 'c_br',
							'type' => 'LEFT',
							'conditions' => 'c_br.branch_code = requests.contractor_branch_code'])
    		->join(['table' => 'mst_companies',
							'alias' => 'r_c',
							'type' => 'LEFT',
							'conditions' => 'r_c.company_code = requests.request_company_code'])
    		->join(['table' => 'mst_companies',
							'alias' => 'c_c',
							'type' => 'LEFT',
							'conditions' => 'c_c.company_code = requests.contractor_company_code'])
			->where(['requests.temporary_saving_flg <>' => FIT])
			->where(['requests.offer_date >=' => $yyyy_from.' 00:00:00'])
    		->where(['requests.offer_date <=' => $yyyy_to.' 23:59:59']);
			$data=$query->select([
    	    		"yyyy"=> "'".$this->request->data['activity_report_yyyy']."'"
					,"request_no" => "requests.request_no"
    	    		,"status_name" => "ms.status_name"
    	    		,"offer_date" => "date_format(requests.offer_date,'%Y/%m/%d')"
    	    		,"stay_from_date" => "date_format(requests.stay_from_date,'%Y/%m/%d')"
    	    		,"install_machine_date" => "date_format(sf.completion_date,'%Y/%m/%d')"
					,"machine_type" => "mc.name"
    	    		,"request_branch_pref_code" => "r_br.branch_pref_code"
    	    		,"request_branch_code" => "r_br.branch_code"
    	    		,"request_branch_pref_code" => "r_br.branch_pref_code"
					,"request_member_flg" => "r_c.member_flg"
    	    		,"contractor_branch_pref_code" => "c_br.branch_pref_code"
    	    		,"contractor_branch_code" => "c_br.branch_code"
    	    		,"contractor_branch_pref_code" => "c_br.branch_pref_code"
					,"contractor_member_flg" => "c_c.member_flg"
			])
    		->all();
			//var_dump($query);
    	$_serialize = ['data'];
    	$_header = ['年度', '依頼番号', '対応状況', '申込日','滞在開始日','機器設置日','装置タイプ',
    			'依頼事業所都道府県コード', '依頼事業所コード', '依頼事業所名', '依頼会社会員区分',
    			'受託事業所都道府県コード', '受託事業所コード', '受託事業所名', '受託会社会員区分'
    	];

    	/**
    	 * Windows対応
    	 */
    	$_csvEncoding = 'CP932';
    	$_newline = "\r\n";
    	$_eol = "\r\n";

    	$this->response->download('activity_report_'.date('YmdHis').'.csv');
    	$this->viewBuilder()->setClassName('CsvView.Csv');
    	$this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }


    /***************************************************
     * 会計報告
     ***************************************************/
    public function accountingReport()
    {
    	//年度データ抽出用
    	$yyyy_from = date('Y-m-d', strtotime($this->request->data['accounting_report_yyyy'].'/04/01'));
    	$yyyy_to = date('Y-m-d', strtotime(($this->request->data['accounting_report_yyyy']+1).'/03/31'));

   		//modelの読み込み
    	$this->Requests = TableRegistry::get('requests');

    	//ユーザ情報取得
    	$query= $this->Requests->find()->enableHydration(false)
			->where(['requests.temporary_saving_flg <>' => FIT])
			->where(['requests.offer_date >=' => $yyyy_from.' 00:00:00'])
    		->where(['requests.offer_date <=' => $yyyy_to.' 23:59:59']);
		$data=$query->select([
    	    		"yyyy"=> "'".$this->request->data['accounting_report_yyyy']."'"
					,"request_no" => "requests.request_no"
    	    		,"bill_receive_date" => "date_format(requests.bill_receive_date,'%Y/%m/%d')"
					,"request_charge" => "requests.request_charge"
    	    		,"request_charge_tax" => "requests.request_charge_tax"
    	    		,"contractor_charge" => "requests.contractor_charge"
    	    		,"contractor_charge_tax" => "requests.contractor_charge_tax"
    	    		,"contractor_payment" => "requests.contractor_payment"
    	    		,"contractor_payment_tax" => "requests.contractor_payment_tax"
    	    ])
    		->all();

    	$_serialize = ['data'];
    	$_header = ['年度', '依頼番号', '請求書受取完了日', '依頼会社請求金額',
    			'依頼会社請求消費税	', '受託会社請求金額', '受託会社請求金額消費税', '受託会社支払金額'
    			,'受託会社支払消費税'
    	];

    	/**
    	 * Windows対応
    	 */
    	$_csvEncoding = 'CP932';
    	$_newline = "\r\n";
    	$_eol = "\r\n";

    	$this->response->download('accounting_report'.date('YmdHis').'.csv');
    	$this->viewBuilder()->setClassName('CsvView.Csv');
    	$this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }


    /**
    * 会員名簿
    **/
    public function memberList()
    {
   	//modelの読み込み
    	$this->Users = TableRegistry::get('users');

    	//ユーザ情報取得
    	$query= $this->Users->find()->enableHydration(false)
    		->join(['table' => 'mst_companies',
							'alias' => 'c',
							'type' => 'LEFT',
							'conditions' => 'c.company_code = users.company_code'])
    		->join(['table' => 'mst_branch_offices',
							'alias' => 'b',
							'type' => 'LEFT',
							'conditions' => 'b.branch_code = users.branch_code'])
			->join(['table' => 'mst_codes',
					'alias' => 'mc',
					'type' => 'LEFT',
					'conditions' => ['mc.code = c.member_flg',
									"code_type = '".CODE_MEMBER."'"]])
	   		->where(['users.is_deleted <>' => FIT]);
    	$data=$query->select([
    	    		"member_type"=> "mc.name"
					,"company_name" => "c.company_name"
    	    		,"branch_name" => "b.branch_name"
    	    		,"name_of_representative" => "c.name_of_representative"
    	    		,"zip_code" => "c.zip_code"
    	    		,"company_addr" => "c.company_addr"
    	    		,"company_tel" => "c.company_tel"
    	    		,"user_name" => "users.user_name"
    	    		,"position_of_user" => "users.position_of_user"
    	    		,"branch_addr" => "b.branch_addr"
    	    		,"branch_tel" => "b.branch_tel"
    	    		,"mail_addr" => "users.mail_addr"
    	    ])
    		->order(['c.pref_code'=>'ASC', 'company_name'=>'ASC','b.branch_pref_code'=>'ASC'])
    		->all();

    	$_serialize = ['data'];
    	$_header = ['会員/非会員', '会員会社名・事業所名', '代表者氏名', '代表者役職名',
    			'代表郵便番号', '代表住所', '代表電話番号', '担当者氏名', '役職名', '事業所住所',
    			'事業所電話番号', '事業所FAX番号', 'メールアドレス'
    	];

    	/**
    	 * Windows対応
    	 */
    	$_csvEncoding = 'CP932';
    	$_newline = "\r\n";
    	$_eol = "\r\n";

    	$this->response->download('member_list_'.date('YmdHis').'.csv');
    	$this->viewBuilder()->setClassName('CsvView.Csv');
    	$this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }


}