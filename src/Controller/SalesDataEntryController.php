<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;

class SalesDataEntryController extends AppController
{

    public function index($id=null)
    {
		//modelの読み込み
		$this->Requests = TableRegistry::get('requests');

		if(!is_null($id)) {
			//依頼情報取得
			$request= $this->Requests->find()->where(['requests.id' => $id])->enableHydration(false)
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
					->join([
						'table' => 'loan_request_machines',
						'alias' => 'lm',
						'type' => 'LEFT',
						'conditions' => 'lm.request_no = requests.request_no'
					])
					->select([
                        "id"=>"requests.id"
						,"request_no" => "requests.request_no"
						,"offer_date" => "requests.offer_date"
						,"user_name" => "requests.user_name"
						,"contractor_company_name" =>
							"CONCAT(IFNULL(cc.company_name,''),IFNULL(cb.branch_name,''))"
						,"request_company_name" =>
							"CONCAT(IFNULL(rc.company_name,''),IFNULL(rb.branch_name,''))"
						,"stay_from_date" => "requests.stay_from_date"
						,"stay_to_date" => "requests.stay_to_date"
						,"lodging_place_name" => "requests.lodging_place_name"
						,"request_charge" => "requests.request_charge"
						,"contractor_charge" => "requests.contractor_charge"
						,"contractor_payment" => "requests.contractor_payment"
                        ,"issue_of_bill_date" => "requests.issue_of_bill_date"
						,"executive_commission" => "requests.executive_commission"
						,"bomb_number" => "lm.bomb_number"
					])
					->first();
			//ビューにセット
			$this->set('request', $request);

			//金額明細データ取得
			$amount = $this->calc($request);
			$this->set('amount', $amount);
			//金額明細マスタ情報取得
			$Mst_unit_prices = \Cake\ORM\TableRegistry::get('mst_unit_prices')
					->find()
                    ->enableHydration(false)->all();
            //->where(['unit_price_detail_code NOT IN' =>  array_column($amount['amount_details'], 'unit_price_detail_code')])
            //->where(['unit_price_type_code NOT IN' => [UNIT_PRICE_TYPE_BASIC, UNIT_PRICE_TYPE_COMMISSION]])

			//ビューにセット
			$this->set('mst_unit_prices',$Mst_unit_prices);
		}
		$this->set('id', $id);

    }

    public function add()
    {
    	$mstNews = $this->Mst_news->newEntity();
    	if ($this->request->is('post')) {
    		$mstNews = $this->Mst_news->patchEntity($mstNews, $this->request->data);
    		Log::debug($this->request->data);
    		if ($this->Mst_news->save($mstBranch)) {
    			$this->Flash->success(__('新規登録が完了しました。'));

    			return $this->redirect(['action' => 'index']);
    		} else {
    			$this->Flash->error(__('エラーが発生しました。'));
    		}
    	}
    }

}