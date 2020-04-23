<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ScheduleRepeatsFixture
 */
class ScheduleRepeatsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'schedule_repeats_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'repeats_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'schedules_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'repeats_id' => ['type' => 'index', 'columns' => ['repeats_id'], 'length' => []],
            'schedules_id' => ['type' => 'index', 'columns' => ['schedules_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['schedule_repeats_id'], 'length' => []],
            'schedule_repeats_ibfk_1' => ['type' => 'foreign', 'columns' => ['repeats_id'], 'references' => ['repeats', 'repeats_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'schedule_repeats_ibfk_2' => ['type' => 'foreign', 'columns' => ['schedules_id'], 'references' => ['schedules', 'schedules_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'schedule_repeats_id' => 1,
                'repeats_id' => 1,
                'schedules_id' => 1
            ],
        ];
        parent::init();
    }
}
