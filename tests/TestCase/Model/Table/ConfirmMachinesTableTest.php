<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfirmMachinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfirmMachinesTable Test Case
 */
class ConfirmMachinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfirmMachinesTable
     */
    public $ConfirmMachines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.confirm_machines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ConfirmMachines') ? [] : ['className' => 'App\Model\Table\ConfirmMachinesTable'];
        $this->ConfirmMachines = TableRegistry::get('ConfirmMachines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfirmMachines);

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
