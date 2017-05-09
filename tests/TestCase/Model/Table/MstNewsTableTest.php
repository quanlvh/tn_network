<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MstNewsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MstNewsTable Test Case
 */
class MstNewsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MstNewsTable
     */
    public $MstNews;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mst_news'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('MstNews') ? [] : ['className' => 'App\Model\Table\MstNewsTable'];
        $this->MstNews = TableRegistry::get('MstNews', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MstNews);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
