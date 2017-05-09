<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstMachines Model
 *
 * @method \App\Model\Entity\MstMachine get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstMachine newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstMachine[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstMachine|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstMachine patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstMachine[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstMachine findOrCreate($search, callable $callback = null, $options = [])
 */
class MstMachinesTable extends Table
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

        $this->setTable('mst_machines');
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
            ->allowEmpty('machine_code');

        $validator
            ->allowEmpty('machine_name');

        $validator
            ->allowEmpty('tn_product_flg');

        $validator
            ->allowEmpty('category_code');

        $validator
            ->allowEmpty('product_code');

        $validator
        	->allowEmpty('file');

        $validator
        	->allowEmpty('loanability');

        $validator
        	->allowEmpty('bringing');

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
