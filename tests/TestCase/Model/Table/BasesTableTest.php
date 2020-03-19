<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BasesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BasesTable Test Case
 */
class BasesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BasesTable
     */
    public $Bases;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bases'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bases') ? [] : ['className' => BasesTable::class];
        $this->Bases = TableRegistry::getTableLocator()->get('Bases', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bases);

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
