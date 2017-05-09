<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class OrderHistoryController extends AppController
{

    public function index($historyType)
    {
		//modelの読み込み

		$this->Requests = TableRegistry::get('requests');
		$this->Mst_statuses = TableRegistry::get('mst_statuses');
		$this->Mst_machines = TableRegistry::get('mst_machines');

		//ユーザ情報取得
		$user = $this->request->session()->read('Auth')['User'];

		$Mst_statuses = $this->Mst_statuses->find()
									->order(['status_code' => 'ASC'])
									->enableHydration(false)->all();

		if($this->request->is('post')) {

			//依頼履歴情報取得
			$query= $this->Requests->find()->enableHydration(false)
					->join([
							'table' => 'mst_statuses',
							'alias' => 's',
							'type' => 'LEFT',
							'conditions' => 's.status_code = requests.status'
					])
					->join([
						'table' => 'mst_companies',
						'alias' => 'cc',
						'type' => 'LEFT',
						'conditions' => 'cc.company_code = requests.contractor_company_code'
					])
					->join([
							'table' => 'mst_companies',
							'alias' => 'rc',
							'type' => 'LEFT',
							'conditions' => 'rc.company_code = requests.request_company_code'
					])
					->select([
                        "id"=>"requests.id"
						,"request_no" => "requests.request_no"
						,"contractor_company_name" => "cc.company_name"
						,"request_company_name" => "rc.company_name"
						,"stay_from_date" => "requests.stay_from_date"
						,"stay_to_date" => "requests.stay_to_date"
						,"lodging_place_name" => "requests.lodging_place_name"
						,"lodging_place_addr" => "requests.lodging_place_addr"
						,"machine_type" => "requests.machine_type"
						,"status_name" => "s.status_name"
						,"request_charge" => "requests.request_charge"
						,"contractor_charge" => "requests.contractor_charge"
						,"contractor_payment" => "requests.contractor_payment"
						,"executive_commission" => "requests.executive_commission"
					]);

			//依頼番号
			if( !empty($this->request->data['request_no']) ){
				$query=$query->where(['request_no' => $this->request->data['request_no']]);
			}
			//滞在期間
			if( !empty($this->request->data['stay_from_date']) ){
				$query=$query->where(['stay_to_date >= ' => $this->request->data['stay_from_date']]);
			}
			if( !empty($this->request->data['stay_to_date']) ){
				$query=$query->where(['stay_from_date <= ' => $this->request->data['stay_to_date']]);
			}
			//宿泊先（LIKE）
			if( !empty($this->request->data['lodging_place_name']) ){
				$query=$query->where(['lodging_place_name LIKE' => '%'.$this->request->data['lodging_place_name'].'%']);
			}
			//設置機器
			if( !empty($this->request->data['machine_type']) ){
				$query=$query->where(['machine_type' => $this->request->data['machine_type']]);
			}
			//対応状況
			if( !empty($this->request->data['status']) ){
				$query=$query->where(['status' => $this->request->data['status']]);
			}
			//患者名（LIKE）
			if( !empty($this->request->data['user_name'])){
				$query=$query->where(['OR' => [['user_name LIKE' => '%'.$this->request->data['user_name'].'%'],
						['user_kana LIKE' => '%'.$this->request->data['user_name'].'%']]]);
			}

			//ユーザがMTSC・事務局の場合は担当分以外の履歴を表示する
			if($user['user_role']==ROLE_STORE){
				if($historyType==HISTORY_TYPE_TRUSTEE){
					$query = $query->where(['contractor_company_code' => $user['company_code']]);
				}else{
					$query = $query->where(['request_company_code' => $user['company_code']]);
				}
			}
			$query = $query->order(['stay_from_date' => 'ASC']);
			$requests = $query->all();
			//ビューにセット
			$this->set('requests', $requests);
		}

		$this->set('mst_statuses', $Mst_statuses);
		$this->set('history_type', $historyType);
    }

}