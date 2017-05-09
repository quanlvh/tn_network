<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @method \App\Model\Entity\Request get($primaryKey, $options = [])
 * @method \App\Model\Entity\Request newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Request[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Request[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestsTable extends Table
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

        $this->table('requests');
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
            ->dateTime('offer_date')
            ->allowEmpty('offer_date');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('user_kana');

        $validator
            ->allowEmpty('user_name');

        $validator
            ->allowEmpty('user_addr');

        $validator
            ->allowEmpty('user_tel');

        $validator
            ->allowEmpty('user_mobile');

        $validator
            ->allowEmpty('lodging_place_name');

        $validator
            ->allowEmpty('lodging_place_addr');

        $validator
            ->allowEmpty('lodging_place_tel');

        $validator
            ->allowEmpty('lodging_place_staff_name');

        $validator
            ->allowEmpty('contractor_receive_addr');

        $validator
            ->allowEmpty('travel_agent_name');

        $validator
            ->allowEmpty('subscriber_name');

        $validator
            ->allowEmpty('is_acceptable');

        $validator
            ->allowEmpty('is_past_setting');

        $validator
            ->allowEmpty('past_setting_year');

        $validator
            ->allowEmpty('past_setting_month');

        $validator
            ->dateTime('stay_from_date')
            ->allowEmpty('stay_from_date');

        $validator
            ->dateTime('stay_to_date')
            ->allowEmpty('stay_to_date');

        $validator
            ->dateTime('pre_instalation_date')
            ->allowEmpty('pre_instalation_date');

        $validator
            ->allowEmpty('pre_instalation_time');

        $validator
            ->dateTime('pick_up_date')
            ->allowEmpty('pick_up_date');

        $validator
            ->allowEmpty('pick_up_time');

        $validator
            ->allowEmpty('person_in_charge');

        $validator
            ->dateTime('request_for_setting_date')
            ->allowEmpty('request_for_setting_date');

        $validator
            ->allowEmpty('is_before_setting');

        $validator
            ->allowEmpty('is_after_collectable');

        $validator
            ->allowEmpty('request_branch_code');

        $validator
            ->allowEmpty('request_branch_staff_name');

        $validator
            ->allowEmpty('request_company_code');

        $validator
            ->allowEmpty('request_company_staff_name');

        $validator
            ->boolean('is_approval')
            ->allowEmpty('is_approval');

        $validator
            ->allowEmpty('hospital_name');

        $validator
            ->allowEmpty('doctor_name');

        $validator
            ->allowEmpty('is_ventilator');

        $validator
            ->allowEmpty('ventilator_name');

        $validator
            ->allowEmpty('is_ventilator_joint');

        $validator
            ->allowEmpty('at_rest');

        $validator
            ->allowEmpty('rest_hour');

        $validator
            ->allowEmpty('during_exercise');

        $validator
            ->allowEmpty('exercise_hour');

        $validator
            ->allowEmpty('at_bedtime');

        $validator
            ->allowEmpty('bedtime_hour');

        $validator
            ->allowEmpty('request_message');

        $validator
            ->allowEmpty('temporary_saving_flg');

        $validator
            ->allowEmpty('cancel_flg');

        $validator
            ->allowEmpty('machine_type');

        $validator
            ->allowEmpty('contractor_branch_code');

        $validator
            ->allowEmpty('contractor_branch_staff_name');

        $validator
            ->allowEmpty('contractor_company_code');

        $validator
            ->decimal('request_charge')
            ->allowEmpty('request_charge');

        $validator
            ->decimal('request_charge_tax')
            ->allowEmpty('request_charge_tax');

        $validator
            ->decimal('contractor_charge')
            ->allowEmpty('contractor_charge');

        $validator
            ->decimal('contractor_charge_tax')
            ->allowEmpty('contractor_charge_tax');

        $validator
            ->decimal('contractor_payment')
            ->allowEmpty('contractor_payment');

        $validator
            ->decimal('contractor_payment_tax')
            ->allowEmpty('contractor_payment_tax');

        $validator
            ->decimal('executive_commission')
            ->allowEmpty('executive_commission');

        $validator
            ->decimal('executive_commission_tax')
            ->allowEmpty('executive_commission_tax');

        $validator
            ->allowEmpty('is_charge_completed');

        $validator
            ->allowEmpty('is_payment_completed');

        $validator
            ->allowEmpty('is_bill_received');

        $validator
            ->allowEmpty('is_bill_receive_completed');

        $validator
            ->dateTime('bill_receive_date')
            ->allowEmpty('bill_receive_date');

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

    public function changeStatus($requestNo, $newStatus)
    {
        $request = $this->find()
            ->hydrate(false)
            ->where(['request_no' => $requestNo])
            ->first();

        if(empty($request)) {
           return false;
        }
        $request['status'] = $newStatus;
        return $this->save($this->newEntity($request));
    }

    public function changePrice($requestNo, $price)
    {
        $request = $this->find()
            ->hydrate(false)
            ->where(['request_no' => $requestNo])
            ->first();

        if(empty($request)) {
            return false;
        }
        $request['request_charge'] = $price;
        return $this->save($this->newEntity($request));
    }
}
