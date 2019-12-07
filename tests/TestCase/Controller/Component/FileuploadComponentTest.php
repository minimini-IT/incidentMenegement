<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\FileuploadComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\FileuploadComponent Test Case
 */
class FileuploadComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\FileuploadComponent
     */
    public $FileuploadComponent;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->FileuploadComponent = new FileuploadComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FileuploadComponent);

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
