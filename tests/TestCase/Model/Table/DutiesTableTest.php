<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DutiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DutiesTable Test Case
 */
class DutiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DutiesTable
     */
    public $Duties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Duties'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Duties') ? [] : ['className' => DutiesTable::class];
        $this->Duties = TableRegistry::getTableLocator()->get('Duties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Duties);

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
