<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RiskDetectionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RiskDetectionsTable Test Case
 */
class RiskDetectionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RiskDetectionsTable
     */
    public $RiskDetections;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RiskDetections',
        'app.Systems',
        'app.Bases',
        'app.Units',
        'app.Statuses',
        'app.Reports',
        'app.Positives',
        'app.SecLevels',
        'app.InfectionRoutes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RiskDetections') ? [] : ['className' => RiskDetectionsTable::class];
        $this->RiskDetections = TableRegistry::getTableLocator()->get('RiskDetections', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RiskDetections);

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
