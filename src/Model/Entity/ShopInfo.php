<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShopInfo Entity
 *
 * @property int $shop_id
 * @property string $shop_name
 * @property string $shop_url
 * @property string $closest_station
 * @property int $waik_time
 * @property int $wifi_cd
 * @property int $power_supply_cd
 * @property string $memo
 * @property string $create_user
 * @property \Cake\I18n\FrozenTime $create_datetime
 * @property string $update_user
 * @property \Cake\I18n\FrozenTime $update_datetime
 *
 * @property \App\Model\Entity\Shop $shop
 */
class ShopInfo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'shop_id' => false
    ];
}
