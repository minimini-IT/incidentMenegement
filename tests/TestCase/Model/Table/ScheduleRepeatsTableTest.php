<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ScheduleRepeatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ScheduleRepeatsTable Test Case
 */
class ScheduleRepeatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ScheduleRepeatsTable
     */
    public $ScheduleRepeats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ScheduleRepeats',
        'app.Repeats',
        'app.Schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ScheduleRepeats') ? [] : ['className' => ScheduleRepeatsTable::class];
        $this->ScheduleRepeats = TableRegistry::getTableLocator()->get('ScheduleRepeats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ScheduleRepeats);

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
