<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuspiciousSenderAddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuspiciousSenderAddressesTable Test Case
 */
class SuspiciousSenderAddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SuspiciousSenderAddressesTable
     */
    public $SuspiciousSenderAddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SuspiciousSenderAddresses',
        'app.RiskDetections'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SuspiciousSenderAddresses') ? [] : ['className' => SuspiciousSenderAddressesTable::class];
        $this->SuspiciousSenderAddresses = TableRegistry::getTableLocator()->get('SuspiciousSenderAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SuspiciousSenderAddresses);

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
