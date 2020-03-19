<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageDestinationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageDestinationsTable Test Case
 */
class MessageDestinationsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageDestinationsTable
     */
    public $MessageDestinations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MessageDestinations',
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
        $config = TableRegistry::getTableLocator()->exists('MessageDestinations') ? [] : ['className' => MessageDestinationsTable::class];
        $this->MessageDestinations = TableRegistry::getTableLocator()->get('MessageDestinations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageDestinations);

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
