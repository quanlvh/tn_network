<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use \Exception;

class MstNewsController extends AppController
{
	//検索一覧表示
    public function index()
    {
		//modelの読み込み
		$this->Mst_news = TableRegistry::get('mst_news');
		//依頼履歴情報取得
		$query= $this->Mst_news->find()->enableHydration(false);
		$query=$query->where(['is_deleted' => 0]);
		if($this->request->is('post')) {
			//お知らせコード
			if( !empty($this->request->data['news_code']) ){
				$query=$query->where(['news_code' => $this->request->data['news_code']]);
			}
			//会員／非会員表示
			if( !empty($this->request->data['select_member']) ){
				$query=$query->where(['for_member_flg' => $this->request->data['select_member']]);
			}
			//お知らせタイトル（LIKE）
			if( !empty($this->request->data['news_title']) ){
				$query=$query->where(['news_title LIKE' => '%'.$this->request->data['news_title'].'%']);
			}
			//お知らせ内容（LIKE）
			if( !empty($this->request->data['news_detail']) ){
				$query=$query->where(['news_detail LIKE' => '%'.$this->request->data['news_detail'].'%']);
			}
			//お知らせ更新日
			if( !empty($this->request->data['news_update_from_date']) ){
				$query=$query->where(['news_update_date >= ' => $this->request->data['news_update_from_date']]);
			}
			if( !empty($this->request->data['news_update_to_date']) ){
				$query=$query->where(['news_update_date <= ' => $this->request->data['news_update_to_date']]);
			}
			//掲載期間
			if( !empty($this->request->data['viewing_from_date']) ){
				$query=$query->where(['viewing_end_date >= ' => $this->request->data['viewing_from_date']]);
			}
			if( !empty($this->request->data['viewing_to_date']) ){
				$query=$query->where(['viewing_start_date <= ' => $this->request->data['viewing_to_date']]);
			}
		}
		$query = $query->order(['news_update_date' => 'ASC']);
		$Mst_news = $query->all();

		//ビューにセット
		$this->set('mst_news', $Mst_news);
    }

	//新規登録
    public function add()
    {
    	try{
			$this->MstNews = TableRegistry::get('mst_news');
			$news_code = $this->MstNews->find()
						->select(['id','news_code'])
						->last();
	    	$mstNews = $this->MstNews->newEntity();
	    	if ($this->request->is('post')) {
	    		$mstNews->news_code = ++$news_code->id;
	    		$mstNews->news_update_date = date('Y/m/d');
//	    		$mstNews->viewing_start_date = $this->request->data['viewing_start_date'].' 00:00:00';
//	    		$mstNews->viewing_end_date = $this->request->data['viewing_end_date'].' 00:00:00';
	    		$mstNews->viewing_start_date = $this->request->data['viewing_start_date'];
	    		$mstNews->viewing_end_date = $this->request->data['viewing_end_date'];
	    		$mstNews = $this->MstNews->patchEntity($mstNews, $this->request->getData());
				var_dump($mstNews);
	    		if ($this->MstNews->save($mstNews)) {
	    			$this->Flash->success(__('お知らせが新規登録されました。'));

	    			return $this->redirect(['action' => 'index']);
	    		} else {
	    			$this->Flash->error(__('お知らせが登録できませんでした。再度登録を実行してください。'));
	    		}
	    	}
	    	$this->set(compact('mstNews'));
	    	$this->set('_serialize', ['mstNews']);
    	} catch (Exception $ex) {
    		Log::Debug($ex);
    	}
    }

 	//参照・更新
    public function view($id = null)
    {
		$this->MstNews = TableRegistry::get('mst_news');
     	$mstNews = $this->MstNews->get($id, [
     		'contain' => []
     	]);

     	Log::Debug($this->request->is('put'));
     	$this->request->session()->write('id', $id);
     	if ($this->request->is('put')) {
     		Log::Debug('test');
     		$mstNews->news_update_date = date('Y/m/d');
     		$mstNews = $this->MstNews->patchEntity($mstNews, $this->request->data());
     		$mstNews->viewing_start_date = $this->request->data['viewing_start_date'].' 00:00:00';
     		$mstNews->viewing_end_date = $this->request->data['viewing_end_date'].' 00:00:00';
     		if ($this->MstNews->save($mstNews)) {
     			$this->Flash->success(__('お知らせが更新されました。'));
     			return $this->redirect(['action' => 'index']);
     		} else {
     			$this->Flash->error(__('お知らせが更新できませんでした。再度更新を実行してください。'));
     		}
     	}

     	$this->set('mstNews', $mstNews);
     	$this->set('_serialize', ['mstNews']);
     }


    public function edit($id = null)
    {
		$this->MstNews = TableRegistry::get('mst_news');
     	$mstNews = $this->MstNews->get($id, [
     			'contain' => []
     	]);
     	Log::debug($mstNews);
    	Log::Debug($this->request->query('news_detail'));
    	if ($this->request->is('get')) {
    		$mstNews->news_update_date = date('Y/m/d');
    		$mstNews = $this->MstNews->patchEntity($mstNews, $this->request->query());
    		$mstNews->viewing_start_date = $this->request->query['viewing_start_date'].' 00:00:00';
    		$mstNews->viewing_end_date = $this->request->query['viewing_end_date'].' 00:00:00';
    		if ($this->MstNews->save($mstNews)) {
    			$this->Flash->success(__('お知らせが更新されました。'));
    			Log::Debug($this->request->query('news_detail'));
//    			return $this->redirect(['action' => 'index']);
    		} else {
    			$this->Flash->error(__('お知らせが更新できませんでした。再度更新を実行してください。'));
    		}
    	}
    	$this->set(compact('mstNews'));
    	$this->set('_serialize', ['mstNews']);
//    	return $this->redirect(['action' => 'view/'.$id]);
    }

    //削除
    public function delete($id = null)
    {
    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    	}

		$this->MstNews = TableRegistry::get('mst_news');
		$query = $this->MstNews->query();
		$query->update()->set(['is_deleted'=>1,'deleted_by'=>$user['user_id']])->where(['id'=>$id])->execute();

		if ($query){
    		$this->Flash->success(__('お知らせが削除されました。'));
    		return $this->redirect(['action' => 'index']);
		} else {
    		$this->Flash->error(__('お知らせが削除できませんでした。再度削除を実行してください。'));
    	}

    }
}