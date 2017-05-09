<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VAmountDetails Model
 *
 * @method \App\Model\Entity\VAmountDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\VAmountDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\VAmountDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VAmountDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\VAmountDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\VAmountDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\VAmountDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class VAmountDetailsTable extends Table
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

        $this->table('v_amount_details');
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
            ->allowEmpty('request_no');

        $validator
            ->requirePresence('data_kbn', 'create')
            ->notEmpty('data_kbn');

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
            ->decimal('amount')
            ->allowEmpty('amount');

        $validator
            ->requirePresence('dummy_code', 'create')
            ->notEmpty('dummy_code');

        $validator
            ->requirePresence('dummy_notes', 'create')
            ->notEmpty('dummy_notes');

        $validator
            ->requirePresence('dummy_notes2', 'create')
            ->notEmpty('dummy_notes2');

        $validator
            ->requirePresence('transfer_kbn', 'create')
            ->notEmpty('transfer_kbn');

        $validator
            ->requirePresence('edi', 'create')
            ->notEmpty('edi');

        return $validator;
    }
}
