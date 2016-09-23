<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecialPlayersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecialPlayersTable Test Case
 */
class SpecialPlayersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecialPlayersTable
     */
    public $SpecialPlayers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.special_players'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SpecialPlayers') ? [] : ['className' => 'App\Model\Table\SpecialPlayersTable'];
        $this->SpecialPlayers = TableRegistry::get('SpecialPlayers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SpecialPlayers);

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
