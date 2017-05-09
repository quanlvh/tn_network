<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MstBranchOfficesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MstBranchOfficesTable Test Case
 */
class MstBranchOfficesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MstBranchOfficesTable
     */
    public $MstBranchOffices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mst_branch_offices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MstBranchOffices') ? [] : ['className' => 'App\Model\Table\MstBranchOfficesTable'];
        $this->MstBranchOffices = TableRegistry::get('MstBranchOffices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MstBranchOffices);

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
