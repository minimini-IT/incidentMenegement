<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuspiciousDestinationAddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuspiciousDestinationAddressesTable Test Case
 */
class SuspiciousDestinationAddressesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SuspiciousDestinationAddressesTable
     */
    public $SuspiciousDestinationAddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SuspiciousDestinationAddresses',
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
        $config = TableRegistry::getTableLocator()->exists('SuspiciousDestinationAddresses') ? [] : ['className' => SuspiciousDestinationAddressesTable::class];
        $this->SuspiciousDestinationAddresses = TableRegistry::getTableLocator()->get('SuspiciousDestinationAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SuspiciousDestinationAddresses);

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
