<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StatusFlows Model
 *
 * @method \App\Model\Entity\StatusFlow get($primaryKey, $options = [])
 * @method \App\Model\Entity\StatusFlow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StatusFlow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StatusFlow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StatusFlow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StatusFlow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StatusFlow findOrCreate($search, callable $callback = null, $options = [])
 */
class StatusFlowsTable extends Table
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

        $this->setTable('status_flows');
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
            ->allowEmpty('request_no');

        $validator
            ->integer('sequence_no')
            ->allowEmpty('sequence_no');

        $validator
            ->integer('status_code')
            ->allowEmpty('status_code');

        $validator
            ->dateTime('expected_date')
            ->allowEmpty('expected_date');

        $validator
            ->dateTime('completion_date')
            ->allowEmpty('completion_date');

        $validator
            ->allowEmpty('remarks');

        $validator
            ->allowEmpty('delivery_company_name');

        $validator
            ->allowEmpty('inquiry_slip_no');

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
