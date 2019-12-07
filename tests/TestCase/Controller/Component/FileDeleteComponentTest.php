<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\FileDeleteComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\FileDeleteComponent Test Case
 */
class FileDeleteComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\FileDeleteComponent
     */
    public $FileDelete;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->FileDelete = new FileDeleteComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileDelete);

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
