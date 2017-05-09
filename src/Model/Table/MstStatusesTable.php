<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstStatuses Model
 *
 * @method \App\Model\Entity\MstStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstStatus findOrCreate($search, callable $callback = null)
 */
class MstStatusesTable extends Table
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

        $this->table('mst_statuses');
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
            ->integer('status_code')
            ->allowEmpty('status_code');

        $validator
            ->allowEmpty('status_name');

        $validator
            ->allowEmpty('user_type');

        return $validator;
    }
}
