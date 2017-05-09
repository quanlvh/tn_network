<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MstUnitPricesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MstUnitPricesTable Test Case
 */
class MstUnitPricesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MstUnitPricesTable
     */
    public $MstUnitPrices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mst_unit_prices'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MstUnitPrices') ? [] : ['className' => 'App\Model\Table\MstUnitPricesTable'];
        $this->MstUnitPrices = TableRegistry::get('MstUnitPrices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MstUnitPrices);

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
