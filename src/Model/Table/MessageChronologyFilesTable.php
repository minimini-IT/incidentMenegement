<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MessageChronologyFiles Model
 *
 * @property \App\Model\Table\MessageBordChronologiesTable&\Cake\ORM\Association\BelongsTo $MessageBordChronologies
 *
 * @method \App\Model\Entity\MessageChronologyFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\MessageChronologyFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MessageChronologyFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MessageChronologyFile|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MessageChronologyFile saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MessageChronologyFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MessageChronologyFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MessageChronologyFile findOrCreate($search, callable $callback = null, $options = [])
 */
class MessageChronologyFilesTable extends Table
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

        $this->setTable('message_chronology_files');
        $this->setDisplayField('message_chronology_files_id');
        $this->setPrimaryKey('message_chronology_files_id');

        $this->belongsTo('MessageBordChronologies', [
            'foreignKey' => 'message_bord_chronologies_id',
            'joinType' => 'INNER'
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
            ->integer('message_chronology_files_id')
            ->allowEmptyFile('message_chronology_files_id', null, 'create');

        $validator
            ->scalar('file_name')
            ->maxLength('file_name', 255)
            ->requirePresence('file_name', 'create')
            ->notEmptyFile('file_name');

        $validator
            ->scalar('file_size')
            ->maxLength('file_size', 255)
            ->requirePresence('file_size', 'create')
            ->notEmptyFile('file_size');

        $validator
            ->scalar('unique_file_name')
            ->maxLength('unique_file_name', 255)
            ->requirePresence('unique_file_name', 'create')
            ->notEmptyFile('unique_file_name');

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
        $rules->add($rules->existsIn(['message_bord_chronologies_id'], 'MessageBordChronologies'));

        return $rules;
    }
}
