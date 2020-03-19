<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncidentManagementsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncidentManagementsTable Test Case
 */
class IncidentManagementsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncidentManagementsTable
     */
    public $IncidentManagements;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.IncidentManagements',
        'app.ManagementPrefixes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('IncidentManagements') ? [] : ['className' => IncidentManagementsTable::class];
        $this->IncidentManagements = TableRegistry::getTableLocator()->get('IncidentManagements', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncidentManagements);

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
