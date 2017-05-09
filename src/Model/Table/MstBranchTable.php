<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstCompanies Model
 *
 * @method \App\Model\Entity\MstBranch get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstBranch newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstBranch[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstBranch|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstBranch patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstBranch[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstBranch findOrCreate($search, callable $callback = null)
 */
class MstBranchTable extends Table
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

        $this->table('mst_branch_offices');
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
            ->allowEmpty('company_code');

        $validator
            ->allowEmpty('branch_code');

         $validator
         	->allowEmpty('branch_name');

        $validator
            ->allowEmpty('branch_addr');

        $validator
        	->allowEmpty('zip_code');

        $validator
            ->allowEmpty('branch_tel');

        $validator
        	->allowEmpty('branch_fax');

        $validator
        	->allowEmpty('branch_mail');

        $validator
        	->allowEmpty('paid');

        $validator
        	->allowEmpty('responsible');

        $validator
            ->allowEmpty('availability_area_update');

        $validator
        	->allowEmpty('update_at');

        $validator
        	->allowEmpty('update_by');

        $validator
        	->allowEmpty('created_at');

        $validator
        	->allowEmpty('created_by');

        return $validator;
    }
}
