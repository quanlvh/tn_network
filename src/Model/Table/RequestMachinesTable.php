<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestMachines Model
 *
 * @method \App\Model\Entity\RequestMachine get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestMachine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestMachine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestMachine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestMachine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestMachine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestMachine findOrCreate($search, callable $callback = null)
 */
class RequestMachinesTable extends Table
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

        $this->table('request_machines');
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
        	->allowEmpty('entryplan');

        $validator
            ->allowEmpty('oxygen_enricher_type1');

        $validator
            ->allowEmpty('is_humidifier1');

        $validator
            ->allowEmpty('oxygen_enricher_specification1');

        $validator
            ->allowEmpty('oxygen_enricher1');

        $validator
            ->allowEmpty('oxygen_enricher_name1');

        $validator
            ->allowEmpty('oxygen_enricher_type2');

        $validator
            ->allowEmpty('is_humidifier2');

        $validator
            ->allowEmpty('oxygen_enricher2');

        $validator
            ->allowEmpty('oxygen_enricher_specification2');

        $validator
            ->allowEmpty('oxygen_enricher_name2');

        $validator
            ->allowEmpty('liquid_oxygen_parent_device_type');

        $validator
            ->allowEmpty('is_child_device');

        $validator
            ->allowEmpty('child_device_type1');

        $validator
            ->allowEmpty('child_device_type2');

        $validator
            ->allowEmpty('unnecessary_reason');

        $validator
            ->allowEmpty('accessories');

        $validator
            ->allowEmpty('bomb_number');

        $validator
            ->allowEmpty('filling_pressure1');

        $validator
            ->allowEmpty('filling_pressure2');

        $validator
            ->allowEmpty('bomb_capacity1');

        $validator
            ->allowEmpty('bomb_capacity2');

        $validator
            ->allowEmpty('valve_type1');

        $validator
            ->allowEmpty('valve_type2');

        $validator
            ->allowEmpty('valve_type3');

        $validator
            ->allowEmpty('is_flow_controller');

        $validator
            ->allowEmpty('flow_controller_type1');

        $validator
            ->allowEmpty('flow_controller_name1');

        $validator
            ->allowEmpty('flow_controller_type2');

        $validator
            ->allowEmpty('flow_controller_name2');

        $validator
            ->allowEmpty('flow_controller_unnecessary_reason');

        $validator
            ->allowEmpty('flow_controller_bringing_name');

        $validator
            ->allowEmpty('is_respiration_tuner');

        $validator
            ->allowEmpty('respiration_tuner_type1');

        $validator
            ->allowEmpty('respiration_tuner_name1');

        $validator
            ->allowEmpty('respiration_tuner_type2');

        $validator
            ->allowEmpty('respiration_tuner_name2');

        $validator
            ->allowEmpty('respiration_tuner_unnecessary_reason');

        $validator
            ->allowEmpty('respiration_tuner_bringing_name');

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
            ->integer('is_deleted')
            ->allowEmpty('is_deleted');

        $validator
            ->dateTime('deleted_at')
            ->allowEmpty('deleted_at');

        $validator
            ->uuid('deleted_by')
            ->allowEmpty('deleted_by');

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
