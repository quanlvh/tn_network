<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VAmountDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VAmountDetailsTable Test Case
 */
class VAmountDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VAmountDetailsTable
     */
    public $VAmountDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.v_amount_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VAmountDetails') ? [] : ['className' => 'App\Model\Table\VAmountDetailsTable'];
        $this->VAmountDetails = TableRegistry::get('VAmountDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VAmountDetails);

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
