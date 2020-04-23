<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Repeats Model
 *
 * @method \App\Model\Entity\Repeat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Repeat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Repeat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Repeat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Repeat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Repeat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Repeat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Repeat findOrCreate($search, callable $callback = null, $options = [])
 */
class RepeatsTable extends Table
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

        $this->setTable('repeats');
        //$this->setDisplayField('repeats_id');
        $this->setDisplayField('repeat');
        $this->setPrimaryKey('repeats_id');
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
            ->integer('repeats_id')
            ->allowEmptyString('repeats_id', null, 'create');

        $validator
            ->scalar('repeat')
            ->maxLength('repeat', 255)
            ->requirePresence('repeat', 'create')
            ->notEmptyString('repeat');

        $validator
            ->integer('repeat_sort_number')
            ->allowEmptyString('repeat_sort_number');

        return $validator;
    }
}
