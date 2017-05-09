<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FaxSendRequests Model
 *
 * @method \App\Model\Entity\FaxSendRequest get($primaryKey, $options = [])
 * @method \App\Model\Entity\FaxSendRequest newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\FaxSendRequest[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FaxSendRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FaxSendRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FaxSendRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\FaxSendRequest findOrCreate($search, callable $callback = null, $options = [])
 */
class FaxSendRequestsTable extends Table
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

        $this->setTable('fax_send_requests');
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
            ->dateTime('request_date')
            ->allowEmpty('request_date');

        $validator
            ->integer('is_sended')
            ->allowEmpty('is_sended');

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
