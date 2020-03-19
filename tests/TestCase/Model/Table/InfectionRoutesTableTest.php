<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InfectionRoutesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InfectionRoutesTable Test Case
 */
class InfectionRoutesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\InfectionRoutesTable
     */
    public $InfectionRoutes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('InfectionRoutes') ? [] : ['className' => InfectionRoutesTable::class];
        $this->InfectionRoutes = TableRegistry::getTableLocator()->get('InfectionRoutes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InfectionRoutes);

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
}
