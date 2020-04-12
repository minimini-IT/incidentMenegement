<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrivateMessagesFixture
 */
class PrivateMessagesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'private_messages_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'message_bords_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'users_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'message_bords_id' => ['type' => 'index', 'columns' => ['message_bords_id'], 'length' => []],
            'users_id' => ['type' => 'index', 'columns' => ['users_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['private_messages_id'], 'length' => []],
            'private_messages_ibfk_1' => ['type' => 'foreign', 'columns' => ['message_bords_id'], 'references' => ['message_bords', 'message_bords_id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'private_messages_ibfk_2' => ['type' => 'foreign', 'columns' => ['users_id'], 'references' => ['users', 'users_id'], 'update' => 'cascade', 'delete' => 'restrict', 'length' => []],
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
                'private_messages_id' => 1,
                'message_bords_id' => 1,
                'users_id' => 1
            ],
        ];
        parent::init();
    }
}
