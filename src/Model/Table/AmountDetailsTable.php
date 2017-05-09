<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AmountDetails Model
 *
 * @method \App\Model\Entity\AmountDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\AmountDetail newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AmountDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AmountDetail|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AmountDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AmountDetail[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AmountDetail findOrCreate($search, callable $callback = null, $options = [])
 */
class AmountDetailsTable extends Table
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

        $this->table('amount_details');
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
            ->allowEmpty('request_no');

        $validator
            ->allowEmpty('unit_price_type_code');

        $validator
            ->allowEmpty('unit_price_detail_code');

        $validator
            ->allowEmpty('unit_price_detail_name');

        $validator
            ->decimal('unit_price')
            ->allowEmpty('unit_price');

        $validator
            ->integer('quantity')
            ->allowEmpty('quantity');

        $validator
            ->decimal('amount')
            ->allowEmpty('amount');

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
}
