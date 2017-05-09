<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * MstCompanies Controller
 *
 * @property \App\Model\Table\MstCompaniesTable $MstCompanies
 */
class MstCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->set('persons', $this->paginate());
    	$query = $this->MstCompanies->find();

    	// 会社名
    	if ( !empty($this->request->data['company_name']) ) {
    		$query = $query->where(['company_name LIKE'=> '%'.$this->request->data['company_name'].'%']);
    	}
    	// 郵便番号
    	if ( !empty($this->request->data['zip_code']) ) {
    		$query = $query->where(['zip_code' => $this->request->data['zip_code']]);
    	}
    	// 住所
    	if ( !empty($this->request->data['company_addr']) ) {
    		$query = $query->where(['company_addr LIKE' => '%'.$this->request->data['company_addr'].'%']);
    	}
    	// 電話番号
    	if ( !empty($this->request->data['company_tel']) ) {
    		$query = $query->where(['company_tel' => $this->request->data['company_tel']]);
    	}
    	// 代表者氏名
    	if ( !empty($this->request->data['name_of_representative']) ) {
    		$query = $query->where(['name_of_representative LIKE' => '%'.$this->request->data['name_of_representative'].'%']);
    	}
    	// 代表者役職
    	if ( !empty($this->request->data['position_of_representative']) ) {
    		$query = $query->where(['position_of_representative LIKE' => '%'.$this->request->data['position_of_representative'].'%']);
    	}
    	// 会員区分
    	if (!empty($this->request->data['member_flg'])) {
    		$query = $query->where(['member_flg' => $this->request->data['member_flg']]);
    	}
    	if ( @$this->request->data['member_flg']==='0') {
    		$query = $query->where(['member_flg' => $this->request->data['member_flg']]);
    	}
    	$query = $query->where(['is_deleted'=>0,'approval_pending'=>'0']);

    	$results = $query->all();
    	$count = $query->count();

    	// ビューにセット
    	$this->set('count', $count);
    	$this->set('results', $results);
    	$member_flg = Configure::read('member_flg');
    	$this->set('member_flg', $member_flg);
    	$this->set('post', $this->request->data);


    	/*
        $mstCompanies = $this->paginate($this->MstCompanies);

        $this->set(compact('mstCompanies'));
        $this->set('_serialize', ['mstCompanies']);
        */
    }

    /**
     * View method
     *
     * @param string|null $id Mst Company id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mstCompany = $this->MstCompanies->get($id, [
            'contain' => []
        ]);

        $mstBranch = TableRegistry::get('mst_branch_offices');
        $mstBranchName = $mstBranch->find()->where(['company_code'=>$mstCompany['company_code']])->all();
        $this->set('BranchData', $mstBranchName);
        $this->request->session()->write('id', $id);

        // Pref_code
        $this->prefCode = TableRegistry::get('mst_pref');
        $prefCode = $this->prefCode->find()->select(['pref_code','pref_name'])->toArray();
        $this->set('prefCode',$prefCode);

        // ログインユーザ情報をセット
        if(!empty($this->request->session()->read('Auth')['User'])) {
        	$user = $this->request->session()->read('Auth')['User'];
        	$this->set('user', $user);
        }

        if ( ($user['user_role']==ROLE_EXECUTIVE_HEAD_OFFICE) or ($user['user_role']==ROLE_MTSC) ){
        	// 更新処理実行
	        if ($this->request->is(['put'])) {
    	    	$mstCompany = $this->MstCompanies->patchEntity($mstCompany, $this->request->data);
        		if ($this->MstCompanies->save($mstCompany)) {
        			$this->Flash->success(__('The mst company has been saved.'));

    	    		return $this->redirect(['action' => 'index']);
        		} else {
        			$this->Flash->error(__('The mst company could not be saved. Please, try again.'));
        		}
        	}

        } else if ( ($user['user_role']==ROLE_EXECUTIVE_BRANCH_OFFICE) or ($user['user_role']==ROLE_STORE) ) {
        	// 更新申請処理
        	$entity = TableRegistry::get('mst_companies');
        	if ($this->request->is(['put'])){
        		$query = $entity->query();
        		$reMakeArray = ['company_code'=>$mstCompany['company_code'],'company_name'=>$this->request->getData('company_name'),
        				'zip_code'=>$this->request->getData('zip_code'),'pref_code'=>$mstCompany['pref_code'],
        				'company_addr'=>$this->request->getData('company_addr'),'company_tel'=>$this->request->getData('company_tel'),
        				'member_flg'=>$this->request->getData('member_flg'),'name_of_representative'=>$this->request->getData('name_of_representative'),
        				'position_of_representative'=>$this->request->getData('position_of_representative'),'approval_pending'=>APPROVAL_PENDING,
        				'updated_by'=>$user['user_id'],'id'=>$this->id_count()
        		];

        		$query->insert(['company_code','company_name','zip_code','pref_code','company_addr','company_tel','member_flg',
        				'name_of_representative','position_of_representative','approval_pending','updated_by','id'
        		]);
        		$query->values($reMakeArray);
        		$query->execute();
        		if ($query){
        			$this->Flash->success(__('更新申請を受け付けました。'));

        			return $this->redirect(['action'=>'index']);
        		} else {
        			$this->Flash->error(__('更新処理の受理が出来ませんでした。'));
        		}
        	}
        }
        $this->set('mstCompany', $mstCompany);
        $this->set('_serialize', ['mstCompany']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    	}

    	// Pref_code
    	$this->prefCode = TableRegistry::get('mst_pref');
    	$prefCode = $this->prefCode->find()->select(['pref_code','pref_name'])->toArray();
    	$this->set('prefCode',$prefCode);

    	$this->set('company_code', $this->makeCompanyCode());
        $mstCompany = $this->MstCompanies->newEntity();
        if ($this->request->is('post')) {
        	$mstCompany->created_by = $user['user_id'];
            $mstCompany = $this->MstCompanies->patchEntity($mstCompany, $this->request->getData());
            if ($this->MstCompanies->save($mstCompany)) {
                $this->Flash->success(__('The mst company has been saved.'));

                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mst company could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mstCompany'));
        $this->set('_serialize', ['mstCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mst Company id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mstCompany = $this->MstCompanies->get($id, [
            'contain' => []
        ]);

        // Pref_code
        $this->prefCode = TableRegistry::get('mst_pref');
        $prefCode = $this->prefCode->find()->select(['pref_code','pref_name'])->toArray();
        $this->set('prefCode',$prefCode);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $mstCompany = $this->MstCompanies->patchEntity($mstCompany, $this->request->data);
            if ($this->MstCompanies->save($mstCompany)) {
                $this->Flash->success(__('The mst company has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mst company could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('mstCompany'));
        $this->set('_serialize', ['mstCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mst Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    	}

    	$this->request->is('post');
    	$mstCompany = TableRegistry::get('mst_companies');

    	if ( ($user['user_role']==ROLE_EXECUTIVE_HEAD_OFFICE) or ($user['user_role']==ROLE_MTSC) ) {
    		// 削除処理
	    	$query = $mstCompany->query();
    		$query->update()->set(['is_deleted'=>1,'delete_by'=>$user['user_id']])->where(['id'=>$id])->execute();
    		if ($query){
    			$this->Flash->success(__('The mst company has been is_deleted.'));
    		} else {
    			$this->Flash->error(__('The mst company could not be is_deleted.'));
    		}
        	return $this->redirect(['action' => 'index']);
    	} elseif ( ($user['user_role']==ROLE_EXECUTIVE_BRANCH_OFFICE) or ($user['user_role']==ROLE_STORE) ) {
    		// 削除申請処理
    		$query = $mstCompany->query();
    		$query->update()->set(['approval_pending'=>APPROVAL_PENDING,'delete_by'=>$user['user_id']])->where(['id'=>$id])->execute();
    		if($query){
    			$this->Flash->success(__('削除申請を受け付けました。'));

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
    	$this->MstCompany = TableRegistry::get('mst_companies');
    	$query = $this->MstCompany->find()->all();
    	$count = $query->count();
    	$count = $count + 1;
    	return $conut;
    }

    /**
     * Make company_code
     */
    public function makeCompanyCode()
    {
    	$mstCompany = TableRegistry::get('mst_companies');
    	$query = $mstCompany->find()->order(['company_code'=>'DESC'])->select(['company_code'])->all();
    	$count = $query->first();
    	Log::debug($count);
    	if ($count == '0') {
    		$count = 1;
    	} else {
    		$count = $count['company_code'] + 1;
    	}
    	return $count;
    }
}
