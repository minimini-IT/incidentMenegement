<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BelongsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BelongsTable Test Case
 */
class BelongsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BelongsTable
     */
    public $Belongs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Belongs',
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
        $config = TableRegistry::getTableLocator()->exists('Belongs') ? [] : ['className' => BelongsTable::class];
        $this->Belongs = TableRegistry::getTableLocator()->get('Belongs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Belongs);

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
