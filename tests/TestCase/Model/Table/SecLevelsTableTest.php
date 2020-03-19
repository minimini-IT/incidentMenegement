<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SecLevelsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SecLevelsTable Test Case
 */
class SecLevelsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SecLevelsTable
     */
    public $SecLevels;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.SecLevels'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SecLevels') ? [] : ['className' => SecLevelsTable::class];
        $this->SecLevels = TableRegistry::getTableLocator()->get('SecLevels', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SecLevels);

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
