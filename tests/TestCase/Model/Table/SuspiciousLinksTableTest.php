<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SuspiciousLinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SuspiciousLinksTable Test Case
 */
class SuspiciousLinksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SuspiciousLinksTable
     */
    public $SuspiciousLinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SuspiciousLinks',
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
        $config = TableRegistry::getTableLocator()->exists('SuspiciousLinks') ? [] : ['className' => SuspiciousLinksTable::class];
        $this->SuspiciousLinks = TableRegistry::getTableLocator()->get('SuspiciousLinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SuspiciousLinks);

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
