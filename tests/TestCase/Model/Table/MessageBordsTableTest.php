<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageBordsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageBordsTable Test Case
 */
class MessageBordsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageBordsTable
     */
    public $MessageBords;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MessageBords',
        'app.MessageStatuses',
        'app.MessageDestinations',
        'app.MessageChoices',
        'app.MessageFiles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MessageBords') ? [] : ['className' => MessageBordsTable::class];
        $this->MessageBords = TableRegistry::getTableLocator()->get('MessageBords', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageBords);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
