<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RequestComments Model
 *
 * @method \App\Model\Entity\RequestComment get($primaryKey, $options = [])
 * @method \App\Model\Entity\RequestComment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RequestComment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RequestComment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RequestComment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RequestComment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RequestComment findOrCreate($search, callable $callback = null, $options = [])
 */
class RequestCommentsTable extends Table
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

        $this->table('request_comments');
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
            ->allowEmpty('role');

        $validator
            ->allowEmpty('user_name');

        $validator
            ->allowEmpty('comment');

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
