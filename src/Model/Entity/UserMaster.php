<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserMaster Entity
 *
 * @property int $user_id
 * @property string $user_name
 * @property int $effect_flg
 * @property string $create_user
 * @property \Cake\I18n\Time $create_datetime
 * @property string $update_user
 * @property \Cake\I18n\Time $update_datetime
 *
 * @property \App\Model\Entity\User $user
 */
class UserMaster extends Entity
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
        'user_id' => false
    ];
}
