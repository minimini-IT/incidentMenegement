<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrivateMessagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrivateMessagesTable Test Case
 */
class PrivateMessagesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrivateMessagesTable
     */
    public $PrivateMessages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PrivateMessages',
        'app.MessageBords',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PrivateMessages') ? [] : ['className' => PrivateMessagesTable::class];
        $this->PrivateMessages = TableRegistry::getTableLocator()->get('PrivateMessages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PrivateMessages);

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
