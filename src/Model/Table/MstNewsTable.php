<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstNews Model
 *
 * @method \App\Model\Entity\MstNews get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstNews newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstNews[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstNews|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstNews patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstNews[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstNews findOrCreate($search, callable $callback = null, $options = [])
 */
class MstNewsTable extends Table
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

        $this->table('mst_news');
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
             ->integer('news_code')
//             ->requirePresence('news_code', 'create')
             ->notEmpty('news_code')
             ->add('news_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('news_title');

        $validator
            ->allowEmpty('news_detail');

        $validator
            ->dateTime('news_update_date')
            ->allowEmpty('news_update_date');

        $validator
            ->allowEmpty('for_member_flg');

        $validator
//            ->dateTime('viewing_start_date')
            ->allowEmpty('viewing_start_date');

        $validator
//            ->dateTime('viewing_end_date')
            ->allowEmpty('viewing_end_date');

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
        $rules->add($rules->isUnique(['news_code']));

        return $rules;
    }
}
