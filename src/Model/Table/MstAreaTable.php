<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstArea Model
 *
 * @method \App\Model\Entity\MstArea get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstArea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstArea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstArea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstArea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstArea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstArea findOrCreate($search, callable $callback = null)
 */
class MstAreaTable extends Table
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

        $this->table('mst_area');
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
            ->allowEmpty('area_code');

        $validator
            ->allowEmpty('area_name');

        $validator
            ->allowEmpty('area_kana');

        $validator
            ->allowEmpty('pref_code');

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
