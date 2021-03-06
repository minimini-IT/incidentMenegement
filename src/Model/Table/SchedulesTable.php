<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schedules Model
 *
 * @method \App\Model\Entity\Schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Schedule|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Schedule findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SchedulesTable extends Table
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

        $this->setTable('schedules');
        $this->setDisplayField('schedules_id');
        $this->setPrimaryKey('schedules_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('IncidentManagements', [
            'foreignKey' => 'incident_managements_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('ScheduleRepeats', [
            'foreignKey' => 'schedules_id',
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
            ->integer('schedules_id')
            ->allowEmptyString('schedules_id', null, 'create');

        $validator
            ->date('schedule_start_date')
            ->requirePresence('schedule_start_date', 'create')
            ->notEmptyDate('schedule_start_date');

        $validator
            ->date('schedule_end_date')
            ->requirePresence('schedule_end_date', 'create')
            ->notEmptyDate('schedule_end_date');

        $validator
            ->notEmpty('schedule_start_time')
            ->time('schedule_start_time', "H:i", "不正な時刻です");
        /*
            ->add("schedule_start_time", "custom", [
                "rule" => [$this, "check_date"],
                "message" => __("不正な時間です")
            ]);
         */
            /*
            ->add("schedule_start_time", "custom", [
                "rule" => function($value){
                    return preg_match("/(0[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1})$/", $value) === 1;
                },
                "message" => "不正な時間です",
            ]);
             */
        

        $validator
            ->scalar('schedule')
            ->requirePresence('schedule', 'create')
            ->notEmptyString('schedule');

        $validator
            ->notEmptyString('schedule_start_time');

        return $validator;

    }

    public function check_date($value, $context)
    {
        return (bool) preg_match("/(0[0-9]{1}|1{1}[0-9]{1}|2{1}[0-3]{1}):(0[0-9]{1}|[1-5]{1}[0-9]{1})$/", $value);
        
    }
}
