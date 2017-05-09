<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AddDeliveries Model
 *
 * @method \App\Model\Entity\AddDelivery get($primaryKey, $options = [])
 * @method \App\Model\Entity\AddDelivery newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AddDelivery[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AddDelivery|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AddDelivery patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AddDelivery[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AddDelivery findOrCreate($search, callable $callback = null, $options = [])
 */
class AddDeliveriesTable extends Table
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

        $this->table('add_deliveries');
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
            ->dateTime('installation_date')
            ->allowEmpty('installation_date');

        $validator
            ->allowEmpty('staff_name');

        $validator
            ->allowEmpty('statements');

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
}
