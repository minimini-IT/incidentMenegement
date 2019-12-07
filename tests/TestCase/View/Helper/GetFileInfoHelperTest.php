<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\GetFileInfoHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\GetFileInfoHelper Test Case
 */
class GetFileInfoHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\GetFileInfoHelper
     */
    public $GetFileInfo;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->GetFileInfo = new GetFileInfoHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->GetFileInfo);

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
