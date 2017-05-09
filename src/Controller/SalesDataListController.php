<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Symfony\Component\VarDumper\VarDumper;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;
use Cake\Database;

class SalesDataListController extends AppController
{
    public function index()
    {
		if($this->request->is('post')) {
			if(isset($this->request->data['find'])){
				$RequestResults=$this->find();
				//ビューにセット
				$this->set('requests', $RequestResults);
			}elseif(isset($this->request->data['csv_paid'])) {
				$this->paidExport();
			}elseif(isset($this->request->data['csv_payment'])){
				$this->paymentExport();
			}
		}
    }

    //請求データ作成（Paid用）
    public function paidExport()
    {
    	//再検索
    	$SearchResult = $this->find();
		$request_no=null;
    	foreach ($SearchResult as $test){
    		$request_no[]=$test['request_no'];
	    };

    	//modelの読み込み
    	$this->Requests = TableRegistry::get('requests');

    	//依頼履歴情報取得
    	$query= $this->Requests->find()->enableHydration(false)
    		->join(['table' => 'amount_details',
							'alias' => 'a',
							'type' => 'INNER',
							'conditions' => 'a.request_no = requests.request_no'])
			->where(['a.request_no IN ' => $request_no])
			->where(['a.is_request_charge' => UNFIT])
            ->where(['NOT'=>['requests.issue_of_bill_date'=>NULL]])
    	    ->select([
    	    		"branch_code"=>"requests.request_branch_code"
    	    		,"unit_price_detail_name" => "a.unit_price_detail_name"
    	    		,"request_no" => "requests.request_no"
    	    		,"amount" => "a.amount"
    	    		,"dummy_code" => "''"
    	    		,"dummy_notes" => "'TNネットワーク会'"
    	    ]);
   	    $query2= $this->Requests->find()->enableHydration(false)
	   	    ->join(['table' => 'amount_free_details',
    	    		'alias' => 'a',
    	    		'type' => 'INNER',
    	    		'conditions' => 'a.request_no = requests.request_no'])
    	    ->where(['a.request_no IN ' => $request_no])
    	    ->where(['a.is_request_charge ' => UNFIT])
            ->where(['NOT'=>['requests.issue_of_bill_date'=>NULL]])
    	    ->select([
    	    		"branch_code"=>"requests.request_branch_code"
    	    		,"unit_price_detail_name" => "a.unit_price_detail_name"
    	    		,"request_no" => "requests.request_no"
    	    		,"amount" => "a.amount"
    	    		,"dummy_code" => "''"
    	    		,"dummy_notes" => "'TNネットワーク会'"
    	    ]);
    	$data = $query->unionAll($query2)->all();

    	$_serialize = ['data'];
    	$_header = ['貴社番号', '注文内容', '伝票番号', '金額', '貴社決済コード', '備考'];

    	/**
    	 * Windows対応
    	 */
    	$_csvEncoding = 'CP932';
    	$_newline = "\r\n";
    	$_eol = "\r\n";

    	$this->response->download('paid_'.date('YmdHis').'.csv');
    	$this->viewBuilder()->setClassName('CsvView.Csv');
    	$this->set(compact('data', '_serialize', '_header', '_csvEncoding', '_newline', '_eol'));
    }

    //支払データ作成（全銀用）
    public function paymentExport()
    {
    	//再検索
    	$SearchResult = $this->find();
    	$request_no=null;
    	foreach ($SearchResult as $test){
    		$request_no[]=$test['request_no'];
    	};

    	//modelの読み込み
    	$this->VAmountDetails = TableRegistry::get('v_amount_details');

    	//金額明細情報取得
    	$query= $this->VAmountDetails->find()
    			->where(['request_no IN ' => $request_no]);
    	$data = $query
    			->enableHydration(false)
    			->select(['data_kbn','bank_code','bank_name','bank_branch_code','bank_branch_name',
    					'clearing_house_no','deposit_type','account_number','recipient_name',
    					'amount'=>$query->func()->sum('amount'),
    					'dummy_code','dummy_notes','dummy_notes2','transfer_kbn','edi'])
    			->group(['data_kbn','bank_code','bank_name','bank_branch_code', 'bank_branch_name','clearing_house_no','deposit_type','account_number','recipient_name',
    				'dummy_code','dummy_notes','dummy_notes2','transfer_kbn','edi'])
    	 		->all();

		$arr_amount=array_column($data->toArray(), 'amount');
		$summary[] = ['8',count($data),array_sum($arr_amount),''];

    	$_serialize = ['data','summary'];
    	$_header = ['1','21','0','9891029094','TNネットワーク会基金','TODO振込日','0001',
    			'みずほ銀行','194','目黒支店','1','1121345',''];

    	$_footer = ['9',''];

    	/**
    	 * Windows対応
    	 */
    	$_csvEncoding = 'CP932';
    	$_newline = "\r\n";
    	$_eol = "\r\n";

    	$this->response->download('payment_'.date('YmdHis').'.csv');
    	$this->viewBuilder()->setClassName('CsvView.Csv');
    	$this->set(compact('data','summary', '_serialize', '_header', '_footer', '_csvEncoding', '_newline', '_eol'));
    }

    //検索
    private function find(){
    	//modelの読み込み
    	$this->Requests = TableRegistry::get('requests');

    	//依頼履歴情報取得
    	$query= $this->Requests->find()->enableHydration(false)
    	->join([
    			'table' => 'mst_companies',
    			'alias' => 'cc',
    			'type' => 'LEFT',
    			'conditions' => 'cc.company_code = requests.contractor_company_code'
    	])
    	->join([
    			'table' => 'mst_branch_offices',
    			'alias' => 'cb',
    			'type' => 'LEFT',
    			'conditions' => ['cb.company_code = requests.contractor_company_code',
    					'cb.branch_code = requests.contractor_branch_code']
    	])
    	->join([
    			'table' => 'mst_companies',
    			'alias' => 'rc',
    			'type' => 'LEFT',
    			'conditions' => 'rc.company_code = requests.request_company_code'
    	])
    	->join([
    			'table' => 'mst_branch_offices',
    			'alias' => 'rb',
    			'type' => 'LEFT',
    			'conditions' => ['rb.company_code = requests.request_company_code',
    					'rb.branch_code = requests.request_branch_code']
    	])
    	->join(['table' => 'status_flows',
				'alias' => 'sf',
				'type' => 'LEFT',
				'conditions' => ['sf.request_no = requests.request_no',
								"sf.status_code = '".STATUS_WAITING_TRAVEL_END."'"]])
		->select(["id"=>"requests.id"
    			,"request_no" => "requests.request_no"
				,"stay_to_date" => "requests.stay_to_date"
				,"contractor_payment" => "requests.contractor_payment"
				,"issue_of_bill_date" => "requests.issue_of_bill_date"
				,"is_payment_completed" => "requests.is_payment_completed"
				,"request_charge" => "requests.request_charge"
				,"contractor_charge" => "requests.contractor_charge"
				,"request_charge" => "requests.request_charge"
				,"is_charge_completed" => "requests.is_charge_completed"
				,"completion_date" => "sf.completion_date"
    			,'request_company_name'=>'rc.company_name'
    			,'contractor_company_name'=>'cc.company_name'
    			]);

    	//旅行終了日
    	if( !empty($this->request->data['stay_to_date_end'])){
    		$query=$query->where(['stay_to_date <= ' => $this->request->data['stay_to_date_end']]);
    	}
    	//請求書発行日
    	if( !empty($this->request->data['issue_of_bill_date'])){
    		$query=$query->where(['issue_of_bill_date' => $this->request->data['issue_of_bill_date']]);
    	}
    	//依頼会社名（LIKE）
    	if( !empty($this->request->data['request_company_name'])){
    		$query=$query->where(['OR' => [['rc.company_name LIKE' => '%'.$this->request->data['request_company_name'].'%'],
    				['rb.branch_name LIKE' => '%'.$this->request->data['request_company_name'].'%']]]);
    		//				$query=$query->where(['company_name LIKE' => '%'.$this->request->data('company_name').'%']);
    	}
    	//受託会社名（LIKE）
    	if( !empty($this->request->data['contractor_company_name'])){
    		$query=$query->where(['OR' => [['cc.company_name LIKE' => '%'.$this->request->data['contractor_company_name'].'%'],
    				['cb.branch_name LIKE' => '%'.$this->request->data['contractor_company_name'].'%']]]);
    		//				$query=$query->where(['company_name LIKE' => '%'.$this->request->data('company_name').'%']);
    	}

    	//請求データ未作成分
    	if($this->request->data['is_charge_completed']=='1'){
	    	$query=$query->where(['is_charge_completed' => UNFINISHED]);
    	}else{
    		$query=$query->where(['is_charge_completed' => FINISHED]);
    	}
    	//支払データ未作成分
    	if($this->request->data['is_payment_completed']=='1'){
	    	$query=$query->where(['is_payment_completed' => UNFINISHED]);
    	}else{
    		$query=$query->where(['is_payment_completed' => FINISHED]);
    	}
    	//依頼番号
    	if( !empty($this->request->data['request_no'])){
    		$query=$query->where(['requests.request_no' => $this->request->data['request_no']]);
    	}

    	//完了日
//     	if( !empty($this->request->data['request_no'])){
//     		$query=$query->where(['request_no' => $this->request->data['request_no']]);
//     	}

    	$query = $query->order(['stay_to_date' => 'ASC']);
    	$RequestResults = $query->all();
    	return $RequestResults;
    }

    /*
     * 請求書発行日更新(ajax)
     */
    public function updateIssueOfBillDate()
    {
    	$this->autoRender = false;
    	if ($this->request->is('ajax')) {
    		$request = $this->request->getData();
Log::debug($this->request->getData());
    		if(empty($request['issue_of_bill_date'])) {
    			echo json_encode(['issue_of_bill_date'=>'']);
    			return;
    		}

    		//依頼情報更新
    		$request = TableRegistry::get('requests');

    	}
    }
}