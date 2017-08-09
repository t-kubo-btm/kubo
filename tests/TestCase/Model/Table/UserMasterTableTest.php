<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserMasterTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserMasterTable Test Case
 */
class UserMasterTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserMasterTable
     */
    public $UserMaster;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_master',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserMaster') ? [] : ['className' => UserMasterTable::class];
        $this->UserMaster = TableRegistry::get('UserMaster', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserMaster);

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
