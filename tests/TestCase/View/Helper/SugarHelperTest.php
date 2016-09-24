<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\SugarHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\SugarHelper Test Case
 */
class SugarHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\SugarHelper
     */
    public $Sugar;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Sugar = new SugarHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sugar);

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
