<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'user_id'
        ]);
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
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->dateTime('password_update_date')
            ->allowEmpty('password_update_date');

        $validator
            ->allowEmpty('is_lock');

        $validator
            ->requirePresence('user_role', 'create')
            ->notEmpty('user_role');

        $validator
            ->allowEmpty('mail_addr_1');

        $validator
            ->allowEmpty('mail_addr_2');

        $validator
            ->allowEmpty('company_code');

        $validator
            ->allowEmpty('company_name');

        $validator
            ->allowEmpty('branch_code');

        $validator
            ->allowEmpty('branch_name');

        $validator
            ->allowEmpty('position_of_user');

        $validator
            ->allowEmpty('user_name');

        $validator
            ->allowEmpty('applying');

        $validator
            ->allowEmpty('affiliation');

        $validator
            ->allowEmpty('position');

        $validator
            ->allowEmpty('handle');

        $validator
            ->integer('user_policy_ver')
            ->allowEmpty('user_policy_ver');

        $validator
            ->integer('approval_pending')
            ->allowEmpty('approval_pending');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
