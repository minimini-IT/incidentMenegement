<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepeatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepeatsTable Test Case
 */
class RepeatsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RepeatsTable
     */
    public $Repeats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Repeats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Repeats') ? [] : ['className' => RepeatsTable::class];
        $this->Repeats = TableRegistry::getTableLocator()->get('Repeats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Repeats);

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
