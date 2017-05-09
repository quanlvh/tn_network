<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstFiles Model
 *
 * @method \App\Model\Entity\MstFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MstFilesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('mst_files');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('file_type')
            ->allowEmpty('file_type');

        $validator
            ->allowEmpty('file_name');

        $validator
            ->integer('file_size')
            ->allowEmpty('file_size');

        $validator
            ->allowEmpty('file_path');

        $validator
            ->integer('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->dateTime('delete_at')
            ->allowEmpty('delete_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmpty('updated_at');

        $validator
            ->uuid('updated_by')
            ->allowEmpty('updated_by');

        $validator
            ->dateTime('created_at')
            ->allowEmpty('created_at');

        $validator
            ->uuid('created_by')
            ->allowEmpty('created_by');

        return $validator;
    }

    /*
     * ファイル区分を指定し、その区分の一番最後に登録されたレコードを取得
     */
    public function getFileByFileType($fileType = null)
    {
        if (empty($fileType)) {
            return null;
        }

        $file = $this->find()->enableHydration(false)
            ->where(['file_type' => $fileType])
            ->where(['is_deleted' => 0])
            ->last();

        return $file;
    }

    /*
     * ファイル区分から一覧を取得
     */
    public function getFileListByFileType($fileType = null)
    {
        if (empty($fileType)) {
            return null;
        }
        return $this->find()->enableHydration(false)
            ->select(['id', 'file_type', 'file_name', 'file_size', 'created_at'])
            ->where(['file_type' => $fileType])
            ->where(['is_deleted' => 0])
            ->all();
    }

    /*
     * 各種資料用にマニュアル以外のファイルの一覧を取得
     */
    public function getDocumentList()
    {
        return $this->find()->enableHydration(false)
            ->select(['id', 'file_type', 'file_name', 'file_size', 'created_at'])
            ->where([
                'OR' => [
                    ['file_type' => FILE_TYPE_NOTICE],
                    ['file_type' => FILE_TYPE_BOARD_OF_DIRECTORS],
                    ['file_type' => FILE_TYPE_REQUEST_DOCUMENT],
                ]
            ])
            ->where(['is_deleted' => 0])
            ->all();
    }
}
