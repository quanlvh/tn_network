<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Psy\Command\WhereamiCommand;


class ContractRequestListController extends AppController
{
    public function index($listType)
    {
        $this->viewBuilder()->setLayout('main_2017');

		//modelの読み込み
		$this->Requests = TableRegistry::get('requests');

		//ユーザ情報取得
		$user = $this->request->session()->read('Auth')['User'];

		//一覧情報取得
		$query= $this->Requests->find()->hydrate(false)
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
					->join([
							'table' => 'loan_machines',
							'alias' => 'lm',
							'type' => 'LEFT',
							'conditions' => 'lm.request_no = requests.request_no'
					])
					->select([
                        "id"=>"requests.id",
						"request_no" => "requests.request_no"
						,"contractor_company_name" => "cc.company_name"
						,"request_company_name" => "rc.company_name"
						,"stay_from_date" => "requests.stay_from_date"
						,"stay_to_date" => "requests.stay_to_date"
						,"user_name" => "requests.user_name"
						,"lodging_place_name" => "requests.lodging_place_name"
						,"lodging_place_addr" => "requests.lodging_place_addr"
						,"machine_type" => "requests.machine_type"
						,"status_name" => "s.status_name"
						,"request_charge" => "requests.request_charge"
						,"contractor_charge" => "requests.contractor_charge"
						,"contractor_payment" => "requests.contractor_payment"
						,"executive_commission" => "requests.executive_commission"
						,"machine_type" => "requests.machine_type"
						,"request_for_setting_date" => "requests.request_for_setting_date"
						,"contractor_receive_addr" => "requests.contractor_receive_addr"
						,"is_oxygen_enricher" => "lm.is_oxygen_enricher"
						,"oxygen_enricher_type" => "lm.oxygen_enricher_type"
						,"is_humidifier" => "lm.is_humidifier"
						,"oxygen_enricher_specification" => "lm.oxygen_enricher_specification"
						,"oxygen_enricher_name" => "lm.oxygen_enricher_name"
						,"is_liquid_oxygen_parent_device" => "lm.is_liquid_oxygen_parent_device"
						,"liquid_oxygen_parent_device_type" => "lm.liquid_oxygen_parent_device_type"
						,"is_child_device" => "lm.is_child_device"
						,"child_device_type" => "lm.child_device_type"
						,"unnecessary_reason" => "lm.unnecessary_reason"
						,"is_accessories" => "lm.is_accessories"
						,"accessories" => "lm.accessories"
						,"bomb_number" => "lm.bomb_number"
						,"filling_pressure" => "lm.filling_pressure"
						,"bomb_capacity" => "lm.bomb_capacity"
						,"valve_type" => "lm.valve_type"
						,"is_flow_controller" => "lm.is_flow_controller"
						,"flow_controller_type" => "lm.flow_controller_type"
						,"flow_controller_name" => "lm.flow_controller_name"
						,"is_respiration_tuner" => "lm.is_respiration_tuner"
						,"respiration_tuner_type" => "lm.respiration_tuner_type"
						,"respiration_tuner_name" => "lm.respiration_tuner_name"
		]);

		switch ($listType){
	    	case LIST_TYPE_ANSWER_WAITING://未回答
	    		$query->where(['status' => STATUS_ANSWER_WAITING]);
				break;
			case LIST_TYPE_ONGOING://対応中依頼
				$query->where(['status >=' => STATUS_ACCEPT_WAITING_SEND_MACHINE])
								->where(['status <=' => STATUS_WAITING_CONFIRM_TRAVEL_END]);
				break;
			case LIST_TYPE_REQUESTING://依頼中
				$query->where(['status >=' => STATUS_ANSWER_WAITING])
								->where(['status <=' => STATUS_WAITING_CONFIRM_TRAVEL_END]);
				break;
			case LIST_TYPE_RENTAL_MACHINE://貸出機器一覧
				$query->where(['status >=' => STATUS_ACCEPT_WAITING_SEND_MACHINE])
								->where(['status <=' => STATUS_WAITING_RECEIVE_MACHINE]);
				if($user['user_role']!=ROLE_EXECUTIVE_HEAD_OFFICE){
					$query->where(['lm.loan_branch_code' => $user['branch_code']]);
				}
				break;
			case LIST_TYPE_RETAINED://滞留データ
                $query = $query->where(['contractor_branch_code' => $user['branch_code']]);
				break;
            case LIST_TYPE_IMPOSSIBLE://対応不可
                $query->where(['status' => STATUS_IMPOSSIBLE]);
                break;
        }

		//ユーザがMTSC・事務局の場合は担当分以外の履歴を表示する
		if($user['user_role']==ROLE_STORE and $listType!=LIST_TYPE_RENTAL_MACHINE){
			if ($listType==LIST_TYPE_REQUESTING){
				$query->where(['request_branch_code' => $user['branch_code']])->all();
			}else{
				$query->where(['contractor_branch_code' => $user['branch_code']])->all();
			}
		}
		$query->order(['stay_from_date' => 'ASC']);
		$requests = $query->all();
		//ビューにセット
		$this->set('requests', $requests);
		$this->set('list_type', $listType);

    }

}