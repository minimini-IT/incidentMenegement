<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AuthorityComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AuthorityComponent Test Case
 */
class AuthorityComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\AuthorityComponent
     */
    public $Authority;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Authority = new AuthorityComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Authority);

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
