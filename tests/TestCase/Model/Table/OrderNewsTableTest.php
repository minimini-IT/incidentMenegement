<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderNewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderNewsTable Test Case
 */
class OrderNewsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderNewsTable
     */
    public $OrderNews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrderNews'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrderNews') ? [] : ['className' => OrderNewsTable::class];
        $this->OrderNews = TableRegistry::getTableLocator()->get('OrderNews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderNews);

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
