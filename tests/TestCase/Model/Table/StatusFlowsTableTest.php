<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatusFlowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatusFlowsTable Test Case
 */
class StatusFlowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatusFlowsTable
     */
    public $StatusFlows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.status_flows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StatusFlows') ? [] : ['className' => 'App\Model\Table\StatusFlowsTable'];
        $this->StatusFlows = TableRegistry::get('StatusFlows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StatusFlows);

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
