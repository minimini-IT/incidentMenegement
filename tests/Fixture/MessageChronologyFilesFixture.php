<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MessageChronologyFilesFixture
 */
class MessageChronologyFilesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'message_chronology_files_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'message_bord_chronologies_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'file_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_size' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'unique_file_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'message_bord_chronologies_id' => ['type' => 'index', 'columns' => ['message_bord_chronologies_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['message_chronology_files_id'], 'length' => []],
            'message_chronology_files_ibfk_1' => ['type' => 'foreign', 'columns' => ['message_bord_chronologies_id'], 'references' => ['message_bord_chronologies', 'message_bord_chronologies_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'message_chronology_files_id' => 1,
                'message_bord_chronologies_id' => 1,
                'file_name' => 'Lorem ipsum dolor sit amet',
                'file_size' => 'Lorem ipsum dolor sit amet',
                'unique_file_name' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
