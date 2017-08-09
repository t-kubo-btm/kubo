<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShopInfoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShopInfoTable Test Case
 */
class ShopInfoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShopInfoTable
     */
    public $ShopInfo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shop_info',
        'app.shops'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ShopInfo') ? [] : ['className' => ShopInfoTable::class];
        $this->ShopInfo = TableRegistry::get('ShopInfo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ShopInfo);

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
