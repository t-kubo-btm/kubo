<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ShopInfoForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('shop_name', ['type' => 'string'])
            ->addField('shop_name', ['type' => 'string'])
            ->addField('shop_url', ['type' => 'string'])
            ->addField('closest_station', ['type' => 'string'])
            ->addField('waik_time', ['type' => 'integer'])
            ->addField('wifi_cd', ['type' => 'integer'])
            ->addField('power_supply_cd', ['type' => 'integer'])
            ->addField('memo', ['type' => 'string'])
            ->addField('create_user', ['type' => 'string']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator
                    ->notEmpty('shop_name', '店名は必須入力です')
                    ->add('shop_name', [
                             'length' => [
                                  'rule' => ['maxLength', 20],
                                  'message' => '店名は20文字以下で入力してください',
                               ]
                      ])
                    // URL
                    ->add('shop_url', [
                             'length' => [
                                  'rule' => ['maxLength', 150],
                                  'message' => 'は150文字以下で入力してください',
                               ]
                      ])
                    ->add('shop_url', [
                             'format' => [
                                  'rule' => 'url',
                                  'message' => 'URLはURL形式で入力してください',
                               ]
                      ])
                    // 最寄駅
                    ->notEmpty('closest_station', '最寄駅は必須入力です')
                    ->add('closest_station', [
                             'length' => [
                                  'rule' => ['maxLength', 20],
                                  'message' => '最寄駅は20文字以下で入力してください',
                               ]
                      ])
                    // 徒歩
                    ->notEmpty('waik_time', '徒歩は必須入力です')
                    ->add('waik_time', [
                             'format' => ['rule' => 'naturalNumber', 'message' => '徒歩には数字を入力して下さい',],
                             'range'   => ['rule' => ['range', 0, 2147483647], 'message' => '徒歩は2147483647以下で入力してください',],
                      ])
                    ->add('memo', [
                             'length' => [
                                  'rule' => ['maxLength', 150],
                                  'message' => 'memoは150文字以下で入力してください',
                               ]
                      ])
                    // 登録者
                    ->notEmpty('create_user', '登録者は必須入力です');
    }

    protected function _execute(array $data)
    {
        // メールを送信する
        return true;
    }
}
