<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ScheduleRepeats Model
 *
 * @property \App\Model\Table\RepeatsTable&\Cake\ORM\Association\BelongsTo $Repeats
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\BelongsTo $Schedules
 *
 * @method \App\Model\Entity\ScheduleRepeat get($primaryKey, $options = [])
 * @method \App\Model\Entity\ScheduleRepeat newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ScheduleRepeat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ScheduleRepeat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ScheduleRepeat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ScheduleRepeat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ScheduleRepeat[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ScheduleRepeat findOrCreate($search, callable $callback = null, $options = [])
 */
class ScheduleRepeatsTable extends Table
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

        $this->setTable('schedule_repeats');
        $this->setDisplayField('schedule_repeats_id');
        $this->setPrimaryKey('schedule_repeats_id');

        $this->belongsTo('Repeats', [
            'foreignKey' => 'repeats_id'
        ]);
        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedules_id'
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
            ->integer('schedule_repeats_id')
            ->allowEmptyString('schedule_repeats_id', null, 'create');

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
        $rules->add($rules->existsIn(['repeats_id'], 'Repeats'));
        $rules->add($rules->existsIn(['schedules_id'], 'Schedules'));

        return $rules;
    }
}
