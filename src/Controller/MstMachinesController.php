<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Log\Log;
use Cake\Core\Configure;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
use Cake\ORM\TableRegistry;

/**
 * MstMachines Controller
 *
 * @property \App\Model\Table\MstMachinesTable $MstMachines
 */
class MstMachinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	// 親器
    	$Master = TableRegistry::get('mst_machines');
    	$master = $Master->find()->where(["machine_code"=>'2'])->select(["machine_name","machine_code","product_code"])->toArray();
    	$this->set("master", $master);
        $mstMachines = $this->paginate($this->MstMachines);

        // 子器
        $Child = TableRegistry::get('mst_machines');
        $child = $Child->find()->where(["machine_code"=>'3'])->select(["machine_name","machine_code","product_code"])->toArray();
        $this->set("child", $child);

        $query = $this->MstMachines->find();

        // 機器分類
        if (!empty($this->request->getData('machine_code'))) {
        	Log::debug("machine_code");
        	$query = $query->where(['machine_code' => $this->request->getData('machine_code')]);
        }
        // 機種名
        if (!empty($this->request->getData('machine_name'))) {
        	Log::debug("machine_name");
        	$query = $query->where(['machine_name LIKE' => '%'.$this->request->getData('machine_name').'%']);
        }
        // TN貸出可否
        if (!empty($this->request->getData('loanability'))){
        	Log::debug("loanability");
        	$query = $query->where(['loanability' => $this->request->getData('loanability')]);
        } elseif ($this->request->getData('loanability')=='0') {
        	$query = $query->where(['loanability' => '0']);
        }
        // 子器持参時可否
        if (!empty($this->request->getData('bringing'))){
        	Log::debug("bringing");
        	$query = $query->where(['bringing' => $this->request->getData('bringing')]);
        } elseif ($this->request->getData('bringing')=='0') {
        	$query = $query->where(['bringing' => '0']);
        }


        $results = $query->toArray();


        //
        $loana = Configure::read('loana');
        $this->set("loana", $loana);

        $machine = Configure::read('machine_type');
        $this->set("machine",$machine);

        $count = $query->count();
        $this->set('count', $count);
        $this->set('res',$results);
        $this->set('post', $this->request->getData());

        $this->set(compact('mstMachines'));
        $this->set('_serialize', ['mstMachines']);
    }

    /**
     * View method
     *
     * @param string|null $id Mst Machine id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mstMachine = $this->MstMachines->get($id, [
            'contain' => []
        ]);

        $this->set('mstMachine', $mstMachine);
        $this->set('_serialize', ['mstMachine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	// ログインユーザ情報をセット
    	if(!empty($this->request->session()->read('Auth')['User'])) {
    		$user = $this->request->session()->read('Auth')['User'];
    		$this->set('user', $user);
    	}
    	if ($this->request->is(['post','put'])) {
    		if ($this->request->getData('machine_code')=='1'){
    			$this->_fName = "file_name_1";
    			$this->log($this->request->getData('file_name_1'),LOG_DEBUG);
    		}
    		if ($this->request->getData('machine_code')=='2') {
    			$this->_fName = "file_name_2";
    			$this->log($this->request->getData('file_name_2'),LOG_DEBUG);
    		}
    		if ($this->request->getData('machine_code')=='3') {
    			$this->_fName = "file_name_3";
    			$this->log($this->request->getData('file_name_3'),LOG_DEBUG);
    		}
    		if ($this->request->getData('machine_code')=='4') {
    			$this->_fName = "file_name_4";
    			$this->log($this->request->getData('file_name_4'),LOG_DEBUG);
    		}
    		if ($this->request->getData('machine_code')=='5') {
    			$this->_fName = "file_name_5";
    			$this->log($this->request->getData('file_name_5'),LOG_DEBUG);
    		}
    	}

        $mstMachine = $this->MstMachines->newEntity();
        if ($this->request->is(['post','put'])) {
        	// 画像アップロード処理
        	$dir = realpath(WWW_ROOT . "/upload_img");
        	$limitFileSize = 1024 * 1024;
        	try{
        		$mstMachine['file'] = $this->file_upload($this->request->getData($this->_fName), $dir, $limitFileSize);
        	} catch (\RuntimeException $e){
        		$this->Flash->error(__('ファイルのアップロードが出来ませんでした。'));
        		$this->Flash->error(__($e->getMessage()));
        	}

        	if (!empty($this->request->getData('machine_name1'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name1');
        	}
        	if (!empty($this->request->getData('loanability1'))) {
        		$mstMachine->loanability = $this->request->getData('loanability1');
        	}
        	if (!empty($this->request->getData('machine_name2'))) {
				$mstMachine->machine_name = $this->request->getData('machine_name2');
        	}
        	if (!empty($this->request->getData('loanability2'))) {
        		$mstMachine->loanability = $this->request->getData('loanability2');
        	}
        	if (!empty($this->request->getData('machine_name3'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name3');
        	}
        	if (!empty($this->request->getData('loanability3'))) {
        		$mstMachine->loanability = $this->request->getData('loanability3');
        	}
        	if (!empty($this->request->getData('machine_name4'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name4');
        	}
        	if (!empty($this->request->getData('loanability4'))) {
        		$mstMachine->loanability = $this->request->getData('loanability4');
        	}
        	if (!empty($this->request->getData('machine_name5'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name5');
        	}
        	if (!empty($this->request->getData('loanability5'))) {
        		$mstMachine->loanability = $this->request->getData('loanability5');
        	}
        	// ログインID登録
        	$mstMachine->created_by = $user['user_id'];

            $mstMachine = $this->MstMachines->patchEntity($mstMachine, $this->request->getData());
            if ($this->MstMachines->save($mstMachine)) {
                $this->Flash->success(__('The mst machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mst machine could not be saved. Please, try again.'));
        }
        $this->set(compact('mstMachine'));
        $this->set('_serialize', ['mstMachine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mst Machine id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mstMachine = $this->MstMachines->get($id, [
            'contain' => []
        ]);
        $this->set(compact('mstMachine'));
        $this->set('_serialize', ['mstMachine']);

        // ログインユーザ情報をセット
        if(!empty($this->request->session()->read('Auth')['User'])) {
        	$user = $this->request->session()->read('Auth')['User'];
        	$this->set('user', $user);
        }

        // 親器
        $Master = TableRegistry::get('mst_machines');
        $master = $Master->find()->where(["machine_code"=>'2'])->select(["machine_name","machine_code","product_code"])->toArray();
        $this->set("master", $master);
        $mstMachines = $this->paginate($this->MstMachines);

        // 子器
        $Child = TableRegistry::get('mst_machines');
        $child = $Child->find()->where(["machine_code"=>'3'])->select(["machine_name","machine_code","product_code"])->toArray();
        $this->set("child", $child);


        if ($this->request->is(['patch', 'post', 'put'])) {
        	$mstMachine = $this->MstMachines->patchEntity($mstMachine, $this->request->getData());
        	// 画像アップロード処理
        	$dir = realpath(WWW_ROOT . "/upload_img");
        	$limitFileSize = 1024 * 1024;
        	try {
        		$mstMachine['file'] = $this->file_upload($this->request->getData('file_name_1'), $dir, $limitFileSize);
        	} catch (RuntimeException $e){
        		$this->Flash->error(__('*ファイルのアップロードができませんでした.*'));
        		$this->Flash->error(__($e->getMessage()));
        	}

        	// deleteボタンがクリックされたとき
        	if(isset($this->request->data['file_delete'])){
        		try{
        			$del_file = new File($dir. "/". $this->request->data["file_before"]);
        			// ファイル削除処理実行
        			if($del_file->delete()){
        				$mstMachine['file'] = "";
        			} else {
        				$mstMachine['file'] = $this->request->data["file_before"];
        				throw new \RuntimeException('ファイルの削除ができませんでした。');
        			}
        		} catch (\RuntimeException $e){
        			$this->Flash->error(__($e->getMessage()));
        		}
        	} else {
        		// ファイルが入力された時
        		if($this->request->data["file_name_1"]["name"]){
        			$limitFileSize = 1024 * 1024;
        			try {
        				$mstMachine['file'] = $this->file_upload($this->request->data['file_name_1'], $dir, $limitFileSize);
        				// ファイル更新の場合は古いファイルは削除
        				if (isset($this->request->data["file_before"])){
        					// ファイル名が同じ場合は削除を実行しない
        					if ($this->request->data["file_before"] != $mstMachine['file']){
        						$del_file = new File($dir . "/" . $this->request->data["file_before"]);
        						if(!$del_file->delete()) {
        							$this->log("ファイル更新時に下記ファイルが削除できませんでした。",LOG_DEBUG);
        							$this->log($this->request->getData("file_before"),LOG_DEBUG);
        						}
        					}
        				}
        			} catch (\RuntimeException $e) {
        				// アップロード失敗の時、既登録ファイルがある場合はそれを保持
        				if (isset($this->request->data["file_before"])){
        					$mstMachine['file'] = $this->request->data["file_before"];
        				}
        				$this->Flash->error(__('@ファイルのアップロードが出来ませんでした。@'));
        				$this->Flash->error(__($e->getMessage()));
        			}
        		}
        	}

        	if (!empty($this->request->getData('machine_name1'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name1');
        	}
        	if (!empty($this->request->getData('loanability1'))) {
        		$mstMachine->loanability = $this->request->getData('loanability1');
        	}
        	if (!empty($this->request->getData('file_name1'))) {
        		$mstMachine->file_name = $this->request->getData('file_name1');
        	}
        	if (!empty($this->request->getData('machine_name2'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name2');
        	}
        	if (!empty($this->request->getData('loanability2'))) {
        		$mstMachine->loanability = $this->request->getData('loanability2');
        	}
        	if (!empty($this->request->getData('machine_name3'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name3');
        	}
        	if (!empty($this->request->getData('loanability3'))) {
        		$mstMachine->loanability = $this->request->getData('loanability3');
        	}
        	if (!empty($this->request->getData('machine_name4'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name4');
        	}
        	if (!empty($this->request->getData('loanability4'))) {
        		$mstMachine->loanability = $this->request->getData('loanability4');
        	}
        	if (!empty($this->request->getData('machine_name5'))) {
        		$mstMachine->machine_name = $this->request->getData('machine_name5');
        	}
        	if (!empty($this->request->getData('loanability5'))) {
        		$mstMachine->loanability = $this->request->getData('loanability5');
        	}

            // 更新のuser_id を登録
            $mstMachine->updated_by = $user['user_id'];

            if ($this->MstMachines->save($mstMachine)) {
                $this->Flash->success(__('The mst machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mst machine could not be saved. Please, try again.'));
        }
        $this->set(compact('mstMachine'));
        $this->set('_serialize', ['mstMachine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mst Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mstMachine = $this->MstMachines->get($id);
        if ($this->MstMachines->delete($mstMachine)) {
            $this->Flash->success(__('The mst machine has been deleted.'));
        } else {
            $this->Flash->error(__('The mst machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
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
    				['jpg' => 'image/jpeg',
    						'png' => 'image/png',
    						'gif' => 'image/gif',],
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
