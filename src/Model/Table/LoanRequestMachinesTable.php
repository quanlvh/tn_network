<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LoanRequestMachines Model
 *
 * @method \App\Model\Entity\LoanRequestMachine get($primaryKey, $options = [])
 * @method \App\Model\Entity\LoanRequestMachine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LoanRequestMachine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LoanRequestMachine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LoanRequestMachine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LoanRequestMachine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LoanRequestMachine findOrCreate($search, callable $callback = null, $options = [])
 */
class LoanRequestMachinesTable extends Table
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

        $this->table('loan_request_machines');
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
            ->allowEmpty('request_company_code');

        $validator
            ->allowEmpty('request_branch_code');

        $validator
            ->allowEmpty('oxygen_enricher_type');

        $validator
            ->allowEmpty('is_humidifier');

        $validator
            ->allowEmpty('oxygen_enricher_specification');

        $validator
            ->allowEmpty('oxygen_enricher_name');

        $validator
            ->allowEmpty('liquid_oxygen_parent_device_type');

        $validator
            ->allowEmpty('is_child_device');

        $validator
            ->allowEmpty('child_device_type');

        $validator
            ->allowEmpty('unnecessary_reason');

        $validator
            ->allowEmpty('accessories');

        $validator
            ->allowEmpty('bomb_number');

        $validator
            ->allowEmpty('filling_pressure');

        $validator
            ->allowEmpty('bomb_capacity');

        $validator
            ->allowEmpty('valve_type');

        $validator
            ->allowEmpty('is_flow_controller');

        $validator
            ->allowEmpty('flow_controller_type');

        $validator
            ->allowEmpty('flow_controller_name');

        $validator
            ->allowEmpty('is_respiration_tuner');

        $validator
            ->allowEmpty('respiration_tuner_type');

        $validator
            ->allowEmpty('respiration_tuner_name');

        $validator
            ->allowEmpty('is_ventilator');

        $validator
            ->allowEmpty('ventilator_name');

        $validator
            ->allowEmpty('is_ventilator_joint');

        $validator
            ->allowEmpty('extention_hose_type');

        $validator
            ->allowEmpty('cannula_type');

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
