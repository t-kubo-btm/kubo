<?php
namespace App\Test\TestCase\Form;

use App\Form\ShopInfoForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\ShopInfoForm Test Case
 */
class ShopInfoFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\ShopInfoForm
     */
    public $ShopInfo;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->ShopInfo = new ShopInfoForm();
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
