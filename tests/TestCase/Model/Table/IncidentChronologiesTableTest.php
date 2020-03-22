<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncidentChronologiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncidentChronologiesTable Test Case
 */
class IncidentChronologiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncidentChronologiesTable
     */
    public $IncidentChronologies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.IncidentChronologies',
        'app.RiskDetections',
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
        $config = TableRegistry::getTableLocator()->exists('IncidentChronologies') ? [] : ['className' => IncidentChronologiesTable::class];
        $this->IncidentChronologies = TableRegistry::getTableLocator()->get('IncidentChronologies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncidentChronologies);

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
