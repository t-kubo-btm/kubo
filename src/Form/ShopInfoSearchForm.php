<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class ShopInfoSearchForm extends Form
{

    protected function _buildSchema(Schema $schema)
    {
        return $schema
//            ->addField('wifi_cd', ['type' => 'integer'])
//            ->addField('closest_station', ['type' => 'string'])
            ->addField('shop_name', ['type' => 'string'])
            ->addField('waik_time', ['type' => 'integer']);
    }
    protected function _buildValidator(Validator $validator)
    {
        return $validator
                    // 店舗名
                    ->allowEmpty('shop_name')
                    ->add('shop_name', [
                             'length' => [
                                  'rule' => ['maxLength', 20],
                                  'message' => '店名は20文字以下で入力してください',
                               ]
                      ])
                    // 徒歩
                    ->allowEmpty('waik_time')
                    ->add('waik_time', [
                             'format' => ['rule' => 'naturalNumber', 'message' => '徒歩には数字を入力して下さい',],
                             'range'   => ['rule' => ['range', 0, 2147483647], 'message' => '徒歩は2147483647以下で入力してください',],
                      ]);
    }

    protected function _execute(array $data)
    {
        // メールを送信する
        return true;
    }
}
