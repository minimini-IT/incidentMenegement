<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PositivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PositivesTable Test Case
 */
class PositivesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PositivesTable
     */
    public $Positives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Positives'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Positives') ? [] : ['className' => PositivesTable::class];
        $this->Positives = TableRegistry::getTableLocator()->get('Positives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Positives);

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
