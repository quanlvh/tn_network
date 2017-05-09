<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * MstBranchOffices Model
 *
 * @method \App\Model\Entity\MstBranchOffice get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstBranchOffice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstBranchOffice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstBranchOffice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstBranchOffice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstBranchOffice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstBranchOffice findOrCreate($search, callable $callback = null, $options = [])
 */
class MstBranchOfficesTable extends Table
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

        $this->table('mst_branch_offices');
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
            ->integer('company_code')
            ->requirePresence('company_code', 'create')
            ->notEmpty('company_code');

        $validator
            ->integer('branch_code')
            ->requirePresence('branch_code', 'create')
            ->notEmpty('branch_code')
            ->add('branch_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('branch_name');

        $validator
            ->allowEmpty('branch_zip_code');

        $validator
            ->allowEmpty('branch_addr');

        $validator
            ->allowEmpty('branch_tel');

        $validator
            ->allowEmpty('branch_fax');

        $validator
            ->allowEmpty('branch_mail');

        $validator
            ->allowEmpty('paid');

        $validator
            ->allowEmpty('responsible');

        $validator
            ->dateTime('availability_area_update')
            ->allowEmpty('availability_area_update');

        $validator
            ->allowEmpty('is_receive_fax');

        $validator
            ->allowEmpty('bank_code');

        $validator
            ->allowEmpty('bank_name');

        $validator
            ->allowEmpty('bank_branch_code');

        $validator
            ->allowEmpty('bank_branch_name');

        $validator
            ->allowEmpty('deposit_type');

        $validator
            ->allowEmpty('account_number');

        $validator
            ->allowEmpty('recipient_name');

        $validator
            ->dateTime('delete_at')
            ->allowEmpty('delete_at');

        $validator
            ->allowEmpty('delete_by');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['branch_code']));

        return $rules;
    }

    /*
     * 会社コードから事業所を取得
     */
    public function getBranchByCompanyCode($companyCode)
    {
        if (empty($companyCode)) {
            return null;
        }

        return $this->find()
            ->hydrate(false)
            ->select(['branch_code', 'branch_name'])
            ->where(['company_code' => $companyCode])
            ->where(['is_deleted' => 0])
            ->all();
    }

    /*
     * 事業所コードから会社情報を取得
     */
    public function getCompanyByBranchCode($branchCode)
    {
        if (empty($branchCode)) {
            return null;
        }

        $company_code = $this->find()
            ->enableHydration(false)
            ->select(['company_code'])
            ->where(['branch_code' => $branchCode])
            ->where(['is_deleted' => 0])
            ->first();

        return TableRegistry::get('mst_companies')->find()
            ->enableHydration(false)
            ->select(['company_code', 'company_name'])
            ->where(['company_code' => $company_code['company_code']])
            ->first();
    }
}
