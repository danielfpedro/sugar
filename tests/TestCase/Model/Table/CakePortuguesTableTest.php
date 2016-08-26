<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CakePortuguesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CakePortuguesTable Test Case
 */
class CakePortuguesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CakePortuguesTable
     */
    public $CakePortugues;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cake_portugues'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CakePortugues') ? [] : ['className' => 'App\Model\Table\CakePortuguesTable'];
        $this->CakePortugues = TableRegistry::get('CakePortugues', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CakePortugues);

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
