<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManagementPrefixesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManagementPrefixesTable Test Case
 */
class ManagementPrefixesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ManagementPrefixesTable
     */
    public $ManagementPrefixes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('ManagementPrefixes') ? [] : ['className' => ManagementPrefixesTable::class];
        $this->ManagementPrefixes = TableRegistry::getTableLocator()->get('ManagementPrefixes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ManagementPrefixes);

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
