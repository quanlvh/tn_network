<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MstUserPolicy Model
 *
 * @method \App\Model\Entity\MstUserPolicy get($primaryKey, $options = [])
 * @method \App\Model\Entity\MstUserPolicy newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MstUserPolicy[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MstUserPolicy|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MstUserPolicy patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MstUserPolicy[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MstUserPolicy findOrCreate($search, callable $callback = null, $options = [])
 */
class MstUserPolicyTable extends Table
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

        $this->setTable('mst_user_policy');
        $this->setDisplayField('title');
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
            ->allowEmpty('title');

        $validator
            ->allowEmpty('text');

        $validator
            ->integer('rank')
            ->allowEmpty('rank');

        $validator
            ->integer('is_deleted')
            ->allowEmpty('is_deleted');

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

    /*
     * 規約一覧をrank順に取得
     */
    public function getList()
    {
        return $this->find()->enableHydration(false)
            ->select(['id', 'title', 'text'])
            ->where(['is_deleted' => 0])
            ->order('rank asc')
            ->all();
    }

    /*
     * 次のrankを取得
     */
    public function generateNextRank()
    {
        $currentRank = $this->find()->enableHydration(false)
            ->select('rank')
            ->where(['is_deleted' => 0])
            ->order('rank asc')
            ->last();

        return $currentRank['rank'] +1;
    }

    /*
     *  一つ手前のランクのレコードを取得する
     */
    public function getBeforeRank($id = null)
    {
        if(empty($id)) {
            return false;
        }

        $policy = $this->get($id);

        return $this->find()->enableHydration(false)
            ->where(['is_deleted'=>'0'])
            ->where(['rank <' => $policy->rank])
            ->orderAsc('rank')
            ->last();
    }

    /*
     *  一つ次のランクのレコードを取得する
     */
    public function getNextRank($id = null)
    {
        if(empty($id)) {
            return false;
        }

        $policy = $this->get($id);

        return $this->find()->enableHydration(false)
            ->where(['is_deleted'=>'0'])
            ->where(['rank >' => $policy->rank])
            ->orderAsc('rank')
            ->first();
    }
}
