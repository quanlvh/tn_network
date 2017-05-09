<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;


class MypageController extends AppController
{
    public function index()
    {

        $this->viewBuilder()->setLayout('main_2017');

        //modelの読み込み(コントローラ名と同じモデルを使用する際は不要)
        $this->Requests = TableRegistry::get('requests');
        $this->Retained_requests = TableRegistry::get('retained_requests');
		$this->Mst_news = TableRegistry::get('mst_news');

        //ユーザ情報取得
        $user = $this->request->session()->read('Auth')['User'];
        $company = $this->request->session()->read('login_company');

        //お知らせ情報取得
		$Mst_news = $this->Mst_news->find();
		if($company['member_flg']==NONMEMBER){//両方表示のデータ
            $Mst_news = $Mst_news->where(['for_member_flg'=>NONMEMBER]);
        }
        //掲載期間に該当するもの
        $Mst_news = $Mst_news->where(['viewing_start_date <= ' => date('Y/m/d')]);
        $Mst_news = $Mst_news->where(['viewing_end_date >= ' => date('Y/m/d')]);
        $Mst_news = $Mst_news->order(['news_update_date' => 'DESC'])
									->hydrate(false)->all();
		//★★受託
		//未回答依頼情報取得
		$answer_waiting_requests = $this->Requests->find()->hydrate(false)
									->where(['status' => STATUS_ANSWER_WAITING]);
		if($user['user_role']==ROLE_STORE){
			$answer_waiting_requests = $answer_waiting_requests
                ->where(['contractor_branch_code' => $user['branch_code']]);
		}
		$answer_waiting_requests = $answer_waiting_requests->all();

		//対応中依頼情報取得
		$ongoing_requests = $this->Requests->find()->hydrate(false)
									->where(['status >=' => STATUS_ACCEPT_WAITING_SEND_MACHINE])
									->where(['status <=' => STATUS_WAITING_CONFIRM_TRAVEL_END]);
		if($user['user_role']==ROLE_STORE){
			$ongoing_requests = $ongoing_requests->where(['contractor_branch_code' => $user['branch_code']]);
		}
		$ongoing_requests = $ongoing_requests->all();

		//滞留依頼情報取得
		$retained_requests = $this->Retained_requests->find()->hydrate(false);
		$retained_requests = $retained_requests->all();



		//★★依頼
        //貸出機器一覧情報取得
        $rental_machines = $this->Requests->find()->hydrate(false)
            ->join([
                'table' => 'loan_machines',
                'alias' => 'lm',
                'type' => 'LEFT',
                'conditions' => 'lm.request_no = requests.request_no'
            ])
            ->where(['requests.status >=' => STATUS_ACCEPT_WAITING_SEND_MACHINE])
            ->where(['requests.status <=' => STATUS_WAITING_RECEIVE_MACHINE]);
        if($user['user_role']==ROLE_STORE or $user['user_role']==ROLE_MTSC){
            $rental_machines = $rental_machines->where(['lm.loan_branch_code' => $user['branch_code']]);
        }
        $rental_machines = $rental_machines->all();
		//依頼中情報取得
		$requests = $this->Requests->find()->hydrate(false)
					->where(['status >=' => STATUS_ANSWER_WAITING])
					->where(['status <=' => STATUS_WAITING_CONFIRM_TRAVEL_END]);
		if($user['user_role']==ROLE_STORE){
			$requests = $requests->where(['request_branch_code' => $user['branch_code']]);
		}
		$requests = $requests->all();

		//対応不可情報取得
        $impossible_requests = $this->Requests->find()->hydrate(false)
            ->where(['status' => STATUS_IMPOSSIBLE]);
        if($user['user_role']==ROLE_STORE){
            $impossible_requests = $impossible_requests
                ->where(['request_branch_code' => $user['branch_code']]);
        }
        $impossible_requests = $impossible_requests->all();


        //ビューにセット(第一引数で指定した文字列がビュー側での変数名になる)
        $this->set('mst_news', $Mst_news);

        $this->set('answer_waiting_requests', $answer_waiting_requests);   //未回答
        $this->set('ongoing_requests', $ongoing_requests);                  //対応中
        $this->set('retained_requests', $retained_requests);                //滞留依頼
        $this->set('rental_machines', $rental_machines);                    //貸出機器依頼一覧
        $this->set('requests', $requests);                                   //依頼中
        $this->set('impossible_requests', $impossible_requests);           //対応不可

        //postの場合のみ
        if($this->request->is('post')) {
            //postされたデータはこのように取得する
            $postData = $this->request->data;
            $name = !empty($postData['name'])?$postData['name']:null;

            //getの取得
            $query = $this->request->query;

            //保存する場合
            //エンティティに対応するデータを当てはめる
            $entity = $this->Requests->newEntity($postData);
            //insertもupdateも同じ関数を使用する(主キーがある場合はupdate、ない場合はinsertが動作する)
            if($this->Requests->save($entity)) {

            }
            //save()が失敗した場合
            else {

            }
        }

        //ajaxの場合のみの指定も可能
        if($this->request->is('ajax')) {

        }
    }
}