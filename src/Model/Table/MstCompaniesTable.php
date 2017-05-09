<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstCompanies Model
 *
 * @method \App\Model\Entity\MstCompany get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstCompany newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstCompany[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstCompany|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstCompany patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstCompany[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstCompany findOrCreate($search, callable $callback = null)
 */
class MstCompaniesTable extends Table
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

        $this->table('mst_companies');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('company_code');

        $validator
            ->allowEmpty('company_name');

        $validator
            ->allowEmpty('zip_code');

        $validator
            ->allowEmpty('pref_code');

        $validator
            ->allowEmpty('company_addr');

        $validator
            ->allowEmpty('company_tel');

        $validator
            ->allowEmpty('member_flg');

        $validator
            ->allowEmpty('name_of_representative');

        $validator
            ->allowEmpty('position_of_representative');

        return $validator;
    }

    /*
     * 大陽日酸以外の会社の会社コードと会社名を取得
     */
    public function getCompanies()
    {
        return $this->find()
            ->hydrate(false)
            ->select(['company_code', 'company_name'])
            ->where(['member_flg <>' => 2])
            ->where(['is_deleted' => 0])
            ->all();
    }
}
