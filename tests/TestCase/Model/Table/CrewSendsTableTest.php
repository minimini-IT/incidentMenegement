<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CrewSendsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CrewSendsTable Test Case
 */
class CrewSendsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CrewSendsTable
     */
    public $CrewSends;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CrewSends',
        'app.Categories',
        'app.Statuses',
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
        $config = TableRegistry::getTableLocator()->exists('CrewSends') ? [] : ['className' => CrewSendsTable::class];
        $this->CrewSends = TableRegistry::getTableLocator()->get('CrewSends', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CrewSends);

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
