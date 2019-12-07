<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WorkersFixture
 */
class WorkersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'date' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'classes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'positions_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'shifts_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'duties_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_users_id' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
            'fk_classes_id' => ['type' => 'index', 'columns' => ['classes_id'], 'length' => []],
            'fk_positions_id' => ['type' => 'index', 'columns' => ['positions_id'], 'length' => []],
            'fk_shifts_id' => ['type' => 'index', 'columns' => ['shifts_id'], 'length' => []],
            'fk_duties_id' => ['type' => 'index', 'columns' => ['duties_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['date', 'users_id'], 'length' => []],
            'fk_classes_id' => ['type' => 'foreign', 'columns' => ['classes_id'], 'references' => ['classes', 'classes_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_duties_id' => ['type' => 'foreign', 'columns' => ['duties_id'], 'references' => ['duties', 'duties_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_positions_id' => ['type' => 'foreign', 'columns' => ['positions_id'], 'references' => ['positions', 'positions_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_shifts_id' => ['type' => 'foreign', 'columns' => ['shifts_id'], 'references' => ['shifts', 'shifts_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'fk_users_id' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'user_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'date' => '2019-10-06',
                'users_id' => 1,
                'classes_id' => 1,
                'positions_id' => 1,
                'shifts_id' => 1,
                'duties_id' => 1
            ],
        ];
        parent::init();
    }
}
