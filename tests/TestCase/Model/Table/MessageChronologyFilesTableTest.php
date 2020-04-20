<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MessageChronologyFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MessageChronologyFilesTable Test Case
 */
class MessageChronologyFilesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MessageChronologyFilesTable
     */
    public $MessageChronologyFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MessageChronologyFiles',
        'app.MessageBordChronologies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MessageChronologyFiles') ? [] : ['className' => MessageChronologyFilesTable::class];
        $this->MessageChronologyFiles = TableRegistry::getTableLocator()->get('MessageChronologyFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MessageChronologyFiles);

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
