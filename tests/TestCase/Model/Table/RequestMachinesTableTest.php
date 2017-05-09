<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RequestMachinesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RequestMachinesTable Test Case
 */
class RequestMachinesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RequestMachinesTable
     */
    public $RequestMachines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.request_machines'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('RequestMachines') ? [] : ['className' => 'App\Model\Table\RequestMachinesTable'];
        $this->RequestMachines = TableRegistry::get('RequestMachines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RequestMachines);

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
