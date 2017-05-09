<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Log\Log;

/**
 * Description of RequestDetailController
 *
 * @author tsukagoshi
 */
class RequestDetailController extends AppController
{
    /*
     * 依頼詳細画面
     *  $id 依頼番号
     *  $list_type 遷移元の一覧画面
     */
    public function index($id = null, $list_type = null)
    {
        //パラメータが渡されていない場合はリダイレクト
        if($id === null || $list_type === null) {
            return $this->redirect(['controller'=>'mypage']);
        }

        //依頼の内容をセット
        $request = TableRegistry::get('requests')->find()
                ->where(['request_no' => $id])->first();

        //依頼会社情報をセット
        $requestCompany = TableRegistry::get('mst_branch_offices')
                ->find()
                ->hydrate(false)
                ->join([
                    'table'=>'mst_companies',
                    'alias'=>'mc',
                    'type'=>'LEFT',
                    'conditions'=>'mc.company_code = mst_branch_offices.company_code'
                ])
                ->select([
                    'company_name'=>'mc.company_name',
                    'branch_name'=>'mst_branch_offices.branch_name',
                    'branch_tel'=>'mst_branch_offices.branch_tel',
                ])
                ->where([
                    'branch_code'=>$request['request_branch_code']
                ])
                ->first();
        $this->set('requestCompany', $requestCompany);

        //受託会社情報をセット
        $contractorCompany = TableRegistry::get('mst_branch_offices')
                ->find()
                ->hydrate(false)
                ->join([
                    'table'=>'mst_companies',
                    'alias'=>'mc',
                    'type'=>'LEFT',
                    'conditions'=>'mc.company_code = mst_branch_offices.company_code'
                ])
                ->select([
                    'company_name'=>'mc.company_name',
                    'branch_name'=>'mst_branch_offices.branch_name',
                    'branch_tel'=>'mst_branch_offices.branch_tel',
                ])
                ->where([
                    'branch_code'=>$request['contractor_branch_code']
                ])
                ->first();
        $this->set('contractorCompany', $contractorCompany);

        //追加配送情報をセット
        $addDelivery = TableRegistry::get('add_deliveries')
            ->find()
            ->hydrate(false)
            ->where(['request_no'=>$id])
            ->all()
            ->toArray();

        $expState = function(&$entity) {
            $statements = explode(',',$entity['statements']);
            $amount = TableRegistry::get('amount_details');
            $totalPrice = 0;
            foreach($statements as $key =>$statement) {
                $entity['statement'][] = $amount->find()
                ->hydrate(false)
                ->where(['id'=>$statement])
                ->first();
                $totalPrice += $entity['statement'][$key]['amount'];
            }
            $entity['price'] = $totalPrice;
        };

        foreach ($addDelivery as &$delivery) {
            $expState($delivery);
        }

        $this->set('addDelivery', $addDelivery);

        //コメントを取得しセット
        //販売店コメント
        $storeComments = TableRegistry::get('request_comments')
                ->find()
                ->hydrate(false)
                ->where([
                    'request_no'=>$id,
                    'role'=>ROLE_STORE,
                ])
                ->order('id DESC')
                ->limit(50)
                ->all();
        if($storeComments) {
            $storeComments = $storeComments->toArray();
            $storeComments = array_reverse($storeComments);
        }

        $this->set('storeComments', $storeComments);

        //事務局コメント
        $executiveComments = TableRegistry::get('request_comments')
                ->find()
                ->hydrate(false)
                ->where([
                    'request_no'=>$id,
                    'role'=>ROLE_EXECUTIVE_HEAD_OFFICE,
                ])
                ->all();

        $this->set('executiveComments', $executiveComments);

        //追加配送金額情報の取得
        $priceList = TableRegistry::get('mst_unit_prices')
            ->find()
            ->hydrate(false)
            ->where(['OR'=>[
                ['unit_price_type_code' => '3'],
                ['unit_price_type_code' => '4']
            ]])
            ->all();
        $price = array();
        foreach ($priceList as $list) {
            $price[$list['unit_price_detail_code']] = $list;
        }
        $this->set('priceList', $price);

        //定数をセット
        $is_acceptable = Configure::read('is_acceptable');
        $this->set('is_acceptable', $is_acceptable);
        $is_before_settgin = Configure::read('is_before_setting');
        $this->set('is_before_setting', $is_before_settgin);

        $this->set('request', $request);
        $this->set('id', $id);
        $this->request->data['id'] = $id;
        $this->set('list_type', $list_type);
        $this->request->data['list_type'] = $list_type;


        //依頼の内容で使うテンプレートを切り替える
        switch ($list_type) {
            //回答待ち画面からきた場合
            case LIST_TYPE_ANSWER_WAITING:
                //希望機器を取得
                $requestMachine = TableRegistry::get('request_machines')->find()
                    ->hydrate(false)
                    ->where(['request_no' => $id])
                    ->first();

                if( !empty($requestMachine['accessories']) ) {
                    $requestMachine['accessories'] = explode(',', $requestMachine['accessories']);
                }

                //所属支店のユーザーを取得
                $branchUsers = TableRegistry::get('users')
                        ->find()
                        ->hydrate(false)
                        ->select('user_name')
                        ->where(['branch_code'=>$this->request->session()->read('Auth')['User']['branch_code']])
                        ->all();

                $users = [];
                foreach ($branchUsers as $user) {
                    $ary['label'] = false;
                    $ary['value'] = $user['user_name'];
                    $ary['text'] = $user['user_name'];
                    $users[] = $ary;
                }

                $this->set('branchUsers', $users);

                $this->set('requestMachine', $requestMachine);
                $this->render('detail1');
                break;
            //対応中一覧からきた場合
            case LIST_TYPE_ONGOING:

                $statuses = $this->getStatusFlow($id);
                $now_status = TableRegistry::get('status_flows')->find()
                    ->hydrate(false)
                        ->where(['request_no' => $id])
                        ->where(['status_code' => $request['status']])
                        ->first();

                $this->set('statuses', $statuses);
                $this->set('now_status', $now_status);

                $confirmMachine = TableRegistry::get('confirm_machines')
                        ->find()
                        ->hydrate(false)
                        ->where(['request_no' => $id])
                        ->first();
                $this->set('confirmMachine', $confirmMachine);

                //所属支店のユーザーを取得
                $branchUsers = TableRegistry::get('users')
                    ->find()
                    ->hydrate(false)
                    ->select('user_name')
                    ->where(['branch_code'=>$this->request->session()->read('Auth')['User']['branch_code']])
                    ->all();

                $users = [];
                foreach ($branchUsers as $user) {
                    $ary['label'] = false;
                    $ary['value'] = $user['user_name'];
                    $ary['text'] = $user['user_name'];
                    $users[] = $ary;
                }

                $this->set('branchUsers', $users);


                $this->render('detail2');
                break;
            //依頼中一覧からきた場合
            case LIST_TYPE_REQUESTING:

                if($request['status'] == STATUS_ANSWER_WAITING) {

                    //希望機器を取得
                    $requestMachine = TableRegistry::get('request_machines')->find()
                        ->hydrate(false)
                        ->where(['request_no' => $id])
                        ->first();

                    if (!empty($requestMachine['accessories'])) {
                        $requestMachine['accessories'] = explode(',', $requestMachine['accessories']);
                    }

                    $this->set('requestMachine', $requestMachine);

                    $this->render('detail3');
                    break;
                }
                else {
                    $statuses = $this->getStatusFlow($id);
                    $now_status = TableRegistry::get('status_flows')->find()
                        ->hydrate(false)
                        ->where(['request_no' => $id])
                        ->where(['status_code' => $request['status']])
                        ->first();

                    $this->set('statuses', $statuses);
                    $this->set('now_status', $now_status);
                    $this->set('now_status', $now_status);

                    //確定機器情報を取得
                    $confirmMachine = TableRegistry::get('confirm_machines')
                        ->find()
                        ->hydrate(false)
                        ->where(['request_no' => $id])
                        ->first();
                    $this->set('confirmMachine', $confirmMachine);

                    //貸出依頼機器を取得
                    $loanCount = TableRegistry::get('loan_request_machines')
                            ->find()
                            ->where([
                                'request_no'=>$id,
                                'request_branch_code'=>$this->request->session()->read('Auth')['User']['branch_code'],
                            ])->count();

                    if($loanCount !== 0) {
                        $loanMachine = TableRegistry::get('loan_request_machines')
                            ->find()
                            ->hydrate(false)
                            ->where([
                                'request_no'=>$id,
                                'request_branch_code'=>$this->request->session()->read('Auth')['User']['branch_code'],
                            ])->first();
                        $this->set('loanMachine', $loanMachine);
                    }

                    $this->render('detail2');
                }
                break;
        }
    }

    /*
     * 対応内容確認画面
     */
    public function confirm()
    {
        if($this->request->is('post')) {
            //依頼の内容をセット
            $request = TableRegistry::get('requests')->find()
                    ->where(['request_no' => $this->request->data['id']])
                    ->first();

            $confirmMachine = $this->createConfirmMachine($this->request->data());
            if( !empty($confirmMachine['accessories']) ) {
                    $confirmMachine['accessories'] = explode(',', $confirmMachine['accessories']);
            }
            $this->set('confirmMachine', $confirmMachine);

            $requestMachine = TableRegistry::get('request_machines')->find()
            		->where(['request_no' => $this->request->getData('id')])->first();
            $this->set('requestMachine', $requestMachine);

            $is_acceptable = Configure::read('is_acceptable');
            $is_before_settgin = Configure::read('is_before_setting');

            $this->set('is_acceptable', $is_acceptable);
            $this->set('is_before_setting', $is_before_settgin);

            $this->set('request', $request);

            $data = $this->request->getData();
            $this->set('post',$data);
        }
    }

    /*
     * 対応回答画面
     */
    public function answer($answer = null)
    {
        $request = $this->request->getData();

        $entity = TableRegistry::get('requests')->find()
                    ->hydrate(false)
                    ->where(['request_no' => $request['id']])
                    ->first();

        //対応可能の場合
        if($answer == 1) {
            $check = [
                $request['borrow_oxygen'],
                $request['borrow_liquid'],
                $request['borrow_bomb'],
                $request['borrow_ventilator'],
                $request['borrow_accessories'],
            ];

            //確定機器を設定する
            $confirm = $this->createConfirmMachine($request);
            $this->ConfirmMachines = TableRegistry::get('confirm_machines');
            $confirmMachine = $this->ConfirmMachines->newEntity($confirm);
            $confReturn = $this->ConfirmMachines->save($confirmMachine);

            //ステータス一覧の生成
            if(!in_array('1', $check) ) {
                //ステータスフロー取得
                $flow = Configure::read('status_flow');
                $statusFlows = TableRegistry::get('status_flows');
                foreach($flow as $key => $val) {
                    Log::debug($key);

                    $ent = null;
                    $ent['request_no'] = $request['id'];
                    $ent['sequence_no'] = $key+1;
                    $ent['status_code'] = $val;

                    //回答待ちのみ完了日を入れる
                    if($val == STATUS_ANSWER_WAITING) {
                        $ent['completion_date'] = date('Y/m/d h:i:s');
                    }
                    $test = $statusFlows->newEntity($ent);
                    Log::debug($test);

                    $statusFlows->save($test);
                }

                $entity['status'] = $flow[1];
                $entity['contractor_branch_staff_name'] = $request['contractor_branch_staff_name'];
                $en = TableRegistry::get('requests')->newEntity($entity);
                Log::debug($en->errors());
                TableRegistry::get('requests')->save($en);
            }
            else if(in_array('1', $check)) {
                //ステータスフロー取得
                $flow = Configure::read('status_flow_borrow');

                foreach($flow as $key => $val) {
                    $ent = TableRegistry::get('status_flows')->newEntity();
                    $ent->request_no = $request['id'];
                    $ent->sequence_no = $key+1;
                    $ent->status_code = $val;
                    //回答待ちのみ完了日を入れる
                    if($val == STATUS_ANSWER_WAITING) {
                        $ent->completion_date = date('y/m/d');
                    }
                    TableRegistry::get('status_flows')->save($ent);
                }

                $entity['status'] = $flow[1];
                $entity['contractor_branch_staff_name'] = $request['contractor_branch_staff_name'];
                TableRegistry::get('requests')->save(TableRegistry::get('requests')->newEntity($entity));

                //貸出依頼情報
                $this->LoanRequestMachines = TableRegistry::get('loan_request_machines');
                $loan = $this->LoanRequestMachines->newEntity($confirm);
                $loan['request_company_code'] = $entity['request_company_code'];
                $loan['request_branch_code'] = $entity['request_branch_code'];
                $this->LoanRequestMachines->save($loan);
            }

        }
        //対応不可の場合
        elseif($answer == 0){

            $entity['status'] = STATUS_CANCEL_TRAVEL;

            TableRegistry::get('requests')->save(TableRegistry::get('requests')->newEntity($entity));
        }

        $this->set('answer', $answer);
    }

    /*
     * ステータス更新
     */
    public function updateStatus()
    {
        $this->autoRender = false;

        $now_status = TableRegistry::get('status_flows')->find()
                        ->hydrate(false)
                        ->where(['request_no' => $this->request->data['id']])
                        ->where('completion_date is null')
                        ->order('sequence_no asc')->first();

        if(!empty($this->request->data['completion_date'])) {
            $now_status['completion_date'] = $this->request->data['completion_date'].' 00:00:00';
        }
        else {
            $now_status['completion_date'] = date('y/m/d').' 00:00:00';
        }

        if(!empty($this->request->data['expected_date'])) {
            $now_status['expected_date'] = $this->request->data['expected_date'].' 00:00:00';
        }

        if(!empty($this->request->data['remarks'])) {
            $now_status['remarks'] = $this->request->data['remarks'];
        }

        if(!empty($this->request->data['delivery_company_name'])) {
            $now_status['delivery_company_name'] = $this->request->data['delivery_company_name'];
        }

        if(!empty($this->request->data['inquiry_slip_no'])) {
            $now_status['inquiry_slip_no'] = $this->request->data['inquiry_slip_no'];
        }

        $ent = TableRegistry::get('statusflows')->newEntity($now_status);
        \Cake\Log\Log::debug($ent);
        $debug = TableRegistry::get('status_flows')->save($ent);
        \Cake\Log\Log::debug($debug);

        $next_status = TableRegistry::get('status_flows')->find()
                        ->hydrate(false)
                        ->where(['request_no' => $this->request->data['id']])
                        ->where('completion_date is null')
                        ->order('sequence_no asc')->first();

        //依頼のステータスの更新
        $entity = TableRegistry::get('requests')->find()
                    ->hydrate(false)
                    ->where(['request_no' => $this->request->data['id']])
                    ->first();
            $entity['status'] = $next_status['status_code'];
            TableRegistry::get('requests')->save(TableRegistry::get('requests')->newEntity($entity));

        return $this->redirect('/RequestDetail/index/'.$this->request->data['id'].'/'.$this->request->data['list_type']);
    }

    /*
     * 依頼番号からステータスフローを取得
     * 戻り値：array[
     *  'status_code' => [
     *      'completion_date',  //完了日(完了していなければnull)
     *      'status_name',      //ステータス名(未完了なら○○待ち、完了済みなら○○済み)
     *  ],
     * ]
     */
    private function getStatusFlow($request_no = null)
    {
        if($request_no === null) {
            return;
        }

        $status_flow = TableRegistry::get('status_flows')->find()->hydrate(false)
                ->join([
                    'table' => 'mst_statuses',
                    'alias' => 's',
                    'type' => 'LEFT',
                    'conditions' => 's.status_code = status_flows.status_code'
                ])
                ->select([
                    'status_code'=>'status_flows.status_code',
                    'completion_date'=>'status_flows.completion_date',
                    'expected_date'=>'status_flows.expected_date',
                    'remarks'=>'status_flows.remarks',
                    'delivery_company_name'=>'status_flows.delivery_company_name',
                    'inquiry_slip_no'=>'status_flows.inquiry_slip_no',
                    'status_name'=>'s.status_name',
                    'status_name_completion'=>'s.status_name_completion',
                ])
                ->where(['request_no' => $request_no])
                ->all();


        $statuses = array();

        foreach($status_flow as $status) {
            $statuses[$status['status_code']]['completion_date'] = $status['completion_date'];
            $statuses[$status['status_code']]['expected_date'] = $status['expected_date'];
            $statuses[$status['status_code']]['remarks'] = $status['remarks'];
            $statuses[$status['status_code']]['delivery_company_name'] = $status['delivery_company_name'];
            $statuses[$status['status_code']]['inquiry_slip_no'] = $status['inquiry_slip_no'];
            //完了日が入力されていたら済の方のステータスを参照する
            if(!empty($status['completion_date'])) {
                $statuses[$status['status_code']]['status_name'] = $status['status_name_completion'];
            }
            else {
                $statuses[$status['status_code']]['status_name'] = $status['status_name'];
            }
        }

        return $statuses;
    }

    /*
     * 機器選択結果から確定機器情報を生成する
     */
    private function createConfirmMachine($data)
    {
        //希望機器を取得
        $requestMachine = TableRegistry::get('request_machines')->find()
            ->hydrate(false)
            ->where(['request_no' => $data['id']])
            ->first();

        $confirmMachine = array();
        $confirmMachine['request_no'] = $data['id'];

        //酸素濃縮器がある場合は情報をセット
        if(!empty($requestMachine['oxygen_enricher_type1'])) {
            if($data['borrow_oxygen'] == 1) {
                $confirmMachine['oxygen_enricher_type'] = $requestMachine['oxygen_enricher_type1'];
                $confirmMachine['is_humidifier'] = $requestMachine['is_humidifier1'];
                $confirmMachine['oxygen_enricher_specification'] = $requestMachine['oxygen_enricher_specification1'];
                if(!empty($requestMachine['oxygen_enricher_name1'])) {
                    $confirmMachine['oxygen_enricher_name'] = $requestMachine['oxygen_enricher_name1'];
                }
                else if(!empty($data['exygen_enricher_name'])){
                    $confirmMachine['oxygen_enricher_name'] = $data['exygen_enricher_name'];
                }
            }
            else {
                //機種第一希望が選択されているか
                switch ($data['selected_oxygen']) {
                    case 1:
                        $confirmMachine['oxygen_enricher_type'] = $requestMachine['oxygen_enricher_type1'];
                        $confirmMachine['is_humidifier'] = $requestMachine['is_humidifier1'];
                        $confirmMachine['oxygen_enricher_specification'] = $requestMachine['oxygen_enricher_specification1'];
                        if(!empty($requestMachine['oxygen_enricher_name1'])) {
                            $confirmMachine['oxygen_enricher_name'] = $requestMachine['oxygen_enricher_name1'];
                        }
                        else if(!empty($data['exygen_enricher_name'])){
                            $confirmMachine['oxygen_enricher_name'] = $data['exygen_enricher_name'];
                        }
                        break;
                    case 2:
                        $confirmMachine['oxygen_enricher_type'] = $requestMachine['oxygen_enricher_type2'];
                        $confirmMachine['is_humidifier'] = $requestMachine['is_humidifier2'];
                        $confirmMachine['oxygen_enricher_specification'] = $requestMachine['oxygen_enricher_specification2'];
                        if(!empty($requestMachine['oxygen_enricher_name2'])) {
                            $confirmMachine['oxygen_enricher_name'] = $requestMachine['oxygen_enricher_name2'];
                        }
                        else if(!empty($data['exygen_enricher_name'])){
                            $confirmMachine['oxygen_enricher_name'] = $data['exygen_enricher_name'];
                        }
                        break;
                    default :
                        break;
                }
            }

        }

        //液体酸素がある場合は情報をセット
        if(!empty($requestMachine['liquid_oxygen_parent_device_type'])) {
            $confirmMachine['liquid_oxygen_parent_device_type'] = $requestMachine['liquid_oxygen_parent_device_type'];
            $confirmMachine['is_child_device'] = $requestMachine['is_child_device'];
            $confirmMachine['accessories'] = $requestMachine['accessories'];

            if($data['borrow_liquid'] == 1) {
                //子機が不要の場合
                if($requestMachine['is_child_device']  == 0) {
                    $confirmMachine['unnecessary_reason'] = $requestMachine['unnecessary_reason'];
                }
                else {
                    $confirmMachine['child_device_type'] = $requestMachine['child_device_type1'];
                }
            }
            else {
              //子機が不要の場合
                if($requestMachine['is_child_device']  == 0) {
                    $confirmMachine['unnecessary_reason'] = $requestMachine['unnecessary_reason'];
                }
                else {
                    switch ($data['selected_liquid']) {
                        case 1:
                            $confirmMachine['child_device_type'] = $requestMachine['child_device_type1'];
                            break;
                        case 2:
                            $confirmMachine['child_device_type'] = $requestMachine['child_device_type2'];
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        //ボンベがある場合は情報をセット
        if(!empty($requestMachine['bomb_number'])) {
            $confirmMachine['bomb_number'] = $requestMachine['bomb_number'];
            $confirmMachine['filling_pressure'] = $requestMachine['filling_pressure1'];
            $confirmMachine['bomb_capacity'] = $requestMachine['bomb_capacity1'];

            if($data['borrow_bomb'] == 1) {
                $confirmMachine['valve_type'] = $requestMachine['valve_type1'];
                $confirmMachine['is_flow_controller'] = $requestMachine['is_flow_controller'];
                if($requestMachine['is_flow_controller'] == 1) {
                    $confirmMachine['flow_controller_type'] = $requestMachine['flow_controller_type1'];
                    if(!empty($requestMachine['flow_controller_name1'])) {
                        $confirmMachine['flow_controller_name'] = $requestMachine['flow_controller_name1'];
                    }
                }
                else {
                    //流量調整器不要
                    $confirmMachine['flow_controller_unnecessary_reason'] = $requestMachine['flow_controller_unnecessary_reason'];
                    $confirmMachine['flow_controller_bringing_name'] = $requestMachine['flow_controller_bringing_name'];
                }
                $confirmMachine['is_respiration_tuner'] = $requestMachine['is_respiration_tuner'];
                if($requestMachine['is_respiration_tuner'] == 1) {
                    $confirmMachine['respiration_tuner_type'] = $requestMachine['respiration_tuner_type1'];
                    if(!empty($requestMachine['respiration_tuner_name1'])) {
                        $confirmMachine['respiration_tuner_name'] = $requestMachine['respiration_tuner_name1'];
                    }
                }
                else {
                    //流量調整器不要
                    $confirmMachine['respiration_tuner_unnecessary_reason'] = $requestMachine['respiration_tuner_unnecessary_reason'];
                    $confirmMachine['respiration_tuner_bringing_name'] = $requestMachine['respiration_tuner_bringing_name'];
                }
            }
            else {
                switch ($data['selected_valve']) {
                    case 1:
                        $confirmMachine['valve_type'] = $requestMachine['valve_type1'];
                        break;
                    case 2:
                        $confirmMachine['valve_type'] = $requestMachine['valve_type2'];
                        break;
                    case 3:
                        $confirmMachine['valve_type'] = $requestMachine['valve_type3'];
                        break;
                    default :
                        break;
                }
                $confirmMachine['is_flow_controller'] = $requestMachine['is_flow_controller'];
                if($requestMachine['is_flow_controller'] == 1) {
                    //流量調整器必要
                    switch ($data['selected_flow_controller']) {
                        case 1:
                            $confirmMachine['flow_controller_type'] = $requestMachine['flow_controller_type1'];
                            if(!empty($requestMachine['flow_controller_name1'])) {
                                $confirmMachine['flow_controller_name'] = $requestMachine['flow_controller_name1'];
                            }
                            break;
                        case 2:
                            $confirmMachine['flow_controller_type'] = $requestMachine['flow_controller_type2'];
                            if(!empty($requestMachine['flow_controller_name2'])) {
                                $confirmMachine['flow_controller_name'] = $requestMachine['flow_controller_name2'];
                            }
                            break;
                        default :
                            break;
                    }
                }
                else {
                    //流量調整器不要
                    $confirmMachine['flow_controller_unnecessary_reason'] = $requestMachine['flow_controller_unnecessary_reason'];
                    $confirmMachine['flow_controller_bringing_name'] = $requestMachine['flow_controller_bringing_name'];
                }
                $confirmMachine['is_respiration_tuner'] = $requestMachine['is_respiration_tuner'];
                if($requestMachine['is_respiration_tuner'] == 1) {
                    //呼吸同調器必要
                    switch ($data['selected_respiration_tuner']) {
                        case 1:
                            $confirmMachine['respiration_tuner_type'] = $requestMachine['respiration_tuner_type1'];
                            if(!empty($requestMachine['respiration_tuner_name1'])) {
                                $confirmMachine['respiration_tuner_name'] = $requestMachine['respiration_tuner_name1'];
                            }
                            break;
                        case 2:
                            $confirmMachine['respiration_tuner_type'] = $requestMachine['respiration_tuner_type2'];
                            if(!empty($requestMachine['respiration_tuner_name2'])) {
                                $confirmMachine['respiration_tuner_name'] = $requestMachine['respiration_tuner_name2'];
                            }
                            break;
                        default :
                            break;
                    }
                }
                else {
                    //流量調整器不要
                    $confirmMachine['respiration_tuner_unnecessary_reason'] = $requestMachine['respiration_tuner_unnecessary_reason'];
                    $confirmMachine['respiration_tuner_bringing_name'] = $requestMachine['respiration_tuner_bringing_name'];
                }
            }



        }

        $confirmMachine['is_ventilator'] = $requestMachine['is_ventilator'];
        $confirmMachine['ventilator_name'] = $requestMachine['ventilator_name'];
        $confirmMachine['is_ventilator_joint'] = $requestMachine['is_ventilator_joint'];
        $confirmMachine['extention_hose_type'] = $requestMachine['extention_hose_type'];
        $confirmMachine['cannula_type'] = $requestMachine['cannula_type'];

        return $confirmMachine;
    }

    /*
     * コメントの登録
     */
    public function saveComment()
    {
        $this->autoRender = false;

        if($this->request->is('post')) {
            $user = $this->request->session()->read('Auth')['User'];
            $this->Comment = TableRegistry::get('request_comments');
            $comment = $this->Comment->newEntity();

            $comment['request_no'] = $this->request->data['id'];
            $comment['role'] = $this->request->data['role'];
            $comment['user_name'] = $user['user_name'];
            $comment['comment'] = $this->request->data['comment'];
            $comment['created_at'] = date('Y/m/d H:i:s');

            $this->Comment->save($comment);

            return $this->redirect('/RequestDetail/index/'.$this->request->data['id'].'/'.$this->request->data['list_type']);
        }
    }

    /*
     * 追加配送登録
     */
    public function addDelivery()
    {
        $this->autoRender = false;
        $request = $this->request->getData();
        if($this->request->is('post')) {

            //追加配送酸素代、配送代
            $saveId = array();
            //追加配送(ボンベ)
            if(!empty($request['bomb_num'])) {
                $priceOxygen = TableRegistry::get('mst_unit_prices')
                    ->find()
                    ->hydrate(false)
                    ->where(['unit_price_detail_name like' => '%追加配送料金（ボンベ酸素代）%'])
                    ->first();
                $priceDelivery = TableRegistry::get('mst_unit_prices')
                    ->find()
                    ->hydrate(false)
                    ->where(['unit_price_detail_name like' => '%追加配送料金（ボンベ配送代）%'])
                    ->first();

                //酸素代追加
                $saveId[] = TableRegistry::get('amount_details')->save(TableRegistry::get('amount_details')->newEntity([
                    'request_no'=>$request['id'],   //依頼番号
                    'unit_price_type_code'=>$priceOxygen['unit_price_type_code'], //金額識別コード
                    'unit_price_detail_code'=>$priceOxygen['unit_price_detail_code'], //金額明細コード
                    'unit_price_detail_name'=>$priceOxygen['unit_price_detail_name'], //金額明細名
                    'unit_price'=>$priceOxygen['unit_price'], //単価
                    'quantity'=>$request['bomb_num'], //数量
                    'amount'=>$priceOxygen['unit_price']*$request['bomb_num'], //金額
                    'is_request_charge'=>1, //依頼会社請求フラグ
                    'is_contractor_payment'=>1, //受託会社支払フラグ
                    'is_contractor_charge'=>0, //受託会社請求フラグ
                    'is_commission'=>0, //事務局手数料フラグ
                ]))->id;

                //配送代追加
                $saveId[] = TableRegistry::get('amount_details')->save(TableRegistry::get('amount_details')->newEntity([
                    'request_no'=>$request['id'],   //依頼番号
                    'unit_price_type_code'=>$priceDelivery['unit_price_type_code'], //金額識別コード
                    'unit_price_detail_code'=>$priceDelivery['unit_price_detail_code'], //金額明細コード
                    'unit_price_detail_name'=>$priceDelivery['unit_price_detail_name'], //金額明細名
                    'unit_price'=>$priceDelivery['unit_price'], //単価
                    'quantity'=>1, //数量
                    'amount'=>$priceDelivery['unit_price'], //金額
                    'is_request_charge'=>1, //依頼会社請求フラグ
                    'is_contractor_payment'=>1, //受託会社支払フラグ
                    'is_contractor_charge'=>0, //受託会社請求フラグ
                    'is_commission'=>0, //事務局手数料フラグ
                ]))->id;
            }

            //追加配送(液体酸素)
            if(!empty($request['liquid_num'])) {
                $priceOxygen = TableRegistry::get('mst_unit_prices')
                    ->find()
                    ->hydrate(false)
                    ->where(['unit_price_detail_name like' => '%追加配送料金（液体酸素酸素代）%'])
                    ->first();
                $priceDelivery = TableRegistry::get('mst_unit_prices')
                    ->find()
                    ->hydrate(false)
                    ->where(['unit_price_detail_name like' => '%追加配送料金（液体酸素配送代）%'])
                    ->first();

                //酸素代追加
                $saveId[] = TableRegistry::get('amount_details')->save(TableRegistry::get('amount_details')->newEntity([
                    'request_no'=>$request['id'],   //依頼番号
                    'unit_price_type_code'=>$priceOxygen['unit_price_type_code'], //金額識別コード
                    'unit_price_detail_code'=>$priceOxygen['unit_price_detail_code'], //金額明細コード
                    'unit_price_detail_name'=>$priceOxygen['unit_price_detail_name'], //金額明細名
                    'unit_price'=>$priceOxygen['unit_price'], //単価
                    'quantity'=>$request['liquid_num'], //数量
                    'amount'=>$priceOxygen['unit_price']*$request['bomb_num'], //金額
                    'is_request_charge'=>1, //依頼会社請求フラグ
                    'is_contractor_payment'=>1, //受託会社支払フラグ
                    'is_contractor_charge'=>0, //受託会社請求フラグ
                    'is_commission'=>0, //事務局手数料フラグ
                ]))->id;

                //配送代追加
                $saveId[] = TableRegistry::get('amount_details')->save(TableRegistry::get('amount_details')->newEntity([
                    'request_no'=>$request['id'],   //依頼番号
                    'unit_price_type_code'=>$priceDelivery['unit_price_type_code'], //金額識別コード
                    'unit_price_detail_code'=>$priceDelivery['unit_price_detail_code'], //金額明細コード
                    'unit_price_detail_name'=>$priceDelivery['unit_price_detail_name'], //金額明細名
                    'unit_price'=>$priceDelivery['unit_price'], //単価
                    'quantity'=>1, //数量
                    'amount'=>$priceDelivery['unit_price'], //金額
                    'is_request_charge'=>1, //依頼会社請求フラグ
                    'is_contractor_payment'=>1, //受託会社支払フラグ
                    'is_contractor_charge'=>0, //受託会社請求フラグ
                    'is_commission'=>0, //事務局手数料フラグ
                ]))->id;
            }

            //その他対応内容
            //その他対応内容の項目はのちのメンテナンスで項目が増えることを想定し、
            //price_(unit_price_detail_code)のnameを持たせる
            $keys = array_keys($request);
            $preg = preg_grep('/^price_/', $keys);
            foreach ($preg as $code) {
                if (!empty($request[$code])) {
                    $detailCode = explode('_', $code)[1];
                    $priceSp = TableRegistry::get('mst_unit_prices')
                        ->find()
                        ->hydrate(false)
                        ->where(['unit_price_detail_code' => $detailCode])
                        ->first();

                    $saveId[] = TableRegistry::get('amount_details')->save(TableRegistry::get('amount_details')->newEntity([
                        'request_no'=>$request['id'],   //依頼番号
                        'unit_price_type_code'=>$priceSp['unit_price_type_code'], //金額識別コード
                        'unit_price_detail_code'=>$priceSp['unit_price_detail_code'], //金額明細コード
                        'unit_price_detail_name'=>$priceSp['unit_price_detail_name'], //金額明細名
                        'unit_price'=>$priceSp['unit_price'], //単価
                        'quantity'=>1, //数量
                        'amount'=>$request[$code], //金額
                        'is_request_charge'=>1, //依頼会社請求フラグ
                        'is_contractor_payment'=>1, //受託会社支払フラグ
                        'is_contractor_charge'=>0, //受託会社請求フラグ
                        'is_commission'=>0, //事務局手数料フラグ
                    ]))->id;
                }
            }

            //追加配送テーブルに追加
            if(!empty($saveId)) {
                TableRegistry::get('add_deliveries')->save(
                    TableRegistry::get('add_deliveries')->newEntity([
                        'request_no'=>$request['id'],
                        'installation_date'=>$request['installation_date'].' 00:00:00',
                        'staff_name'=>$request['staff_name'],
                        'statements'=>implode(',', $saveId),
                    ])
                );
            }
        }
        return $this->redirect('/RequestDetail/index/'.$request['id'].'/'.$request['list_type']);
    }

    /*
     * 追加配送用金額取得(ajax)
     */
    public function getPrice()
    {
        $this->autoRender = false;
        if ($this->request->is('ajax')) {
            //unit_price_type_codeから金額を取得する
            $unitPrices = TableRegistry::get('mst_unit_prices');
            $request = $this->request->getData();

            if(empty($request['unit_price_detail_name'])) {
               echo json_encode(['unit_price'=>'']);
               return;
            }

            $price = $unitPrices->find()
                ->hydrate(false)
                ->select('unit_price')
                ->where(['unit_price_detail_name like' => '%'.$request['unit_price_detail_name'].'%'])
                ->first();

            echo json_encode($price);
        }
    }

    /*
     * キャンセル依頼
     */
    public function cancelRequest()
    {
        $data = $this->request->getData();

        //ステータスをキャンセルに更新
        TableRegistry::get('requests')->changeStatus($data['id'], STATUS_CANCEL_TRAVEL);

        return $this->redirect('/RequestDetail/index/'.$data['id'].'/'.$data['list_type']);
    }

    /*
     * キャンセル承諾
     */
    public function cancelAccept()
    {
        $data = $this->request->getData();

        //ステータスをキャンセルに更新
        TableRegistry::get('requests')->changeStatus($data['id'], STATUS_COMPLETE_CANCEL_TRAVEL);

        //キャンセル時に機器未設置の場合は金額を0円にする
        if ($data['deliveryStatus'] == 1) {
            TableRegistry::get('requests')->changePrice($data['id'], 0);
        }

        return $this->redirect('/RequestDetail/index/' . $data['id'] . '/' . $data['list_type']);
    }
}
