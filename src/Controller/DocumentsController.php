<?php
/**
 * Created by PhpStorm.
 * User: tsukagoshi
 * Date: 2017/04/19
 * Time: 13:52
 */

namespace App\Controller;


use Cake\Core\Configure;
use Cake\Log\Log;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Filesystem\File;

class DocumentsController extends AppController
{
    public function index($file_type = null)
    {
        $data = $this->request->getData();
        $list = null;
        if (!empty($file_type)) {
            $list = TableRegistry::get('mst_files')->getFileListByFileType($file_type);
            $this->request->data['select_type'] = $file_type;
        } else {
            $list = TableRegistry::get('mst_files')->getDocumentList();
        }
        $this->set('documentList', $list);

        $this->set('typeList', Configure::read('file_types'));
    }

    public function upload()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $mstFiles = TableRegistry::get('mst_files')->newEntity();
            $dir = realpath(WWW_ROOT . "/image_files");
            $limitFileSize = 4096 * 4096;

            $this->log($data['file_name'], LOG_DEBUG);


            try {
                $mstFiles->file_path = $this->file_upload($this->request->getData('file_name'), $dir, $limitFileSize);
            } catch (\RuntimeException $e) {
                $this->Flash->error(__('ファイルのアップロードが出来ませんでした。'));
                $this->Flash->error(__($e->getMessage()));
            }
            $mstFiles->file_name = $data['file_name']['name'];
            $mstFiles->file_size = $data['file_name']['size'];
            $mstFiles->file_type = $data['file_type'];
            $mstFiles->created_at = date('Y-m-d H:i:s');

            //既に存在するファイル区分の場合は上書きする
            $exist = TableRegistry::get('mst_files')->getFileByFileType($data['file_type']);
            if (!empty($exist)) {
                $deleteFile = new File(WWW_ROOT . 'image_files' . DS . $exist['file_path']);
                $deleteFile->delete();

                $mstFiles->id = $exist['id'];
            }

            if (!TableRegistry::get('mst_files')->save($mstFiles)) {

            }

        }

        return $this->redirect($this->referer());
    }

    public function download($fileId = null)
    {
        $this->autoRender = false;

        if ($fileId !== null) {
            $mstFiles = TableRegistry::get('mst_files');
            $file = $mstFiles->get($fileId);

            if (empty($file)) {
                $this->Flash->error(__('ファイルが存在しません'));
                return $this->redirect($this->referer());
            } else {
                $file = $file->toArray();
            }

            $response = $this->response->withHeader('Content-Disposition',
                'attachment; filename=' . $file['file_name']);
            $response = $response->withAddedHeader('filename', $file['file_name']);
            $response = $response->withCharset('UTF-8');
            $response = $response->withFile(WWW_ROOT . 'image_files' . DS . $file['file_path'], [
                //ダウンロードしたときのファイル名。省略すれば元のファイル名。
                'name' => $file['file_name'],
                //これは必須
                'download' => true,
            ]);
            return $response;
        }

        return $this->redirect($this->referer());
    }

    public function delete()
    {
        $this->autoRender = false;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            foreach ($data['delete'] as $val) {
                $file = TableRegistry::get('mst_files')->get($val);
                $file->is_deleted = 1;
                TableRegistry::get('mst_files')->save($file);
            }
        }
        return $this->redirect($this->referer());
    }

    /**
     * 画像アップロード処理
     */
    public function file_upload($file = null, $dir = null, $limitFileSize = 4096 * 4096)
    {
        try {
            // ファイルを保存するフォルダ $dirの値のチェック
            if ($dir) {
                if (!file_exists($dir)) {
                    throw new RuntimeException('指定のディレクトリがありません。');
                }
            } else {
                throw new RuntimeException('ディレクトリの指定がありません。');
            }


            // ファイル情報取得
            $fileInfo = new File($file["tmp_name"]);

            // ファイルサイズのチェック
            if ($fileInfo->size() > $limitFileSize) {
                throw new RuntimeException('Exceeded filesize limit.');
            }

            // ファイルタイプのチェックし、拡張子を取得
            if (false === $ext = array_search($fileInfo->mime(),
                    [
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'pdf' => 'application/pdf'
                    ],
                    true)
            ) {
                throw new RuntimeException('Invalid file format.');
            }

            // ファイル名の生成
            //$uploadFile = $file["name"] . "." . $ext;
            $uploadFile = sha1_file($file["tmp_name"]) . "." . $ext;

            // ファイルの移動
            if (!@move_uploaded_file($file["tmp_name"], $dir . "/" . $uploadFile)) {
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