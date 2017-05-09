<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MstStatusesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MstStatusesTable Test Case
 */
class MstStatusesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MstStatusesTable
     */
    public $MstStatuses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mst_statuses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MstStatuses') ? [] : ['className' => 'App\Model\Table\MstStatusesTable'];
        $this->MstStatuses = TableRegistry::get('MstStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MstStatuses);

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
