<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\IncidentAddComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\IncidentAddComponent Test Case
 */
class IncidentAddComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\IncidentAddComponent
     */
    public $IncidentAdd;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->IncidentAdd = new IncidentAddComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->IncidentAdd);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
