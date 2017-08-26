<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShopInfoFixture
 *
 */
class ShopInfoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'shop_info';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'shop_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '店舗ID', 'autoIncrement' => true, 'precision' => null],
        'shop_name' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '店名', 'precision' => null, 'fixed' => null],
        'shop_url' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'URL', 'precision' => null, 'fixed' => null],
        'closest_station' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '最寄駅名', 'precision' => null, 'fixed' => null],
        'waik_time' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '駅徒歩', 'precision' => null, 'autoIncrement' => null],
        'wifi_cd' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'WiFi', 'precision' => null, 'autoIncrement' => null],
        'power_supply_cd' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '電源', 'precision' => null, 'autoIncrement' => null],
        'memo' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => 'memo', 'precision' => null, 'fixed' => null],
        'create_user' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '作成者', 'precision' => null, 'fixed' => null],
        'create_datetime' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作成日時', 'precision' => null],
        'update_user' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'comment' => '更新者', 'precision' => null, 'fixed' => null],
        'update_datetime' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '更新日時', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['shop_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'shop_id' => 1,
            'shop_name' => 'Lorem ipsum dolor sit amet',
            'shop_url' => 'Lorem ipsum dolor sit amet',
            'closest_station' => 'Lorem ipsum dolor ',
            'waik_time' => 1,
            'wifi_cd' => 1,
            'power_supply_cd' => 1,
            'memo' => 'Lorem ipsum dolor sit amet',
            'create_user' => 'Lorem ipsum dolor ',
            'create_datetime' => '2017-07-29',
            'update_user' => 'Lorem ipsum dolor ',
            'update_datetime' => '2017-07-29'
        ],
    ];
}
