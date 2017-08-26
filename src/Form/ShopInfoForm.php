<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
/*
use App\src\Form\ShopInfoForm as ShopInfoForm

ShopInfo = new ShopInfoForm
	ShopInfo->validate($request)
	if($Empty(ShopInfo->errors>)){
		this->set(error,errors)
	}
*/



//入力チェックその２
class ShopInfoForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema
            ->addField('shop_name', 'string')
            ->addField('shop-url', 'url')
            ->addField('closest_station', 'string')
            ->addField('waik_time', 'num')
            ->addField('business_hours_from[hour]', 'range')
            ->addField('business_hours_from[minute]', 'range')
            ->addField('business_hours_to[hour]', 'range')
            ->addField('business_hours_to[minute]', 'range')
            ->addField('wifi_cd', 'list')
            ->addField('power_supply_cd', 'list')
            ->addField('user_id', 'num');
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('shop_name', 'length', [
                'rule' => ['maxLength', 20],
                'message' => '店名は20文字以内にしてください'
            ])
            ->add('shop_url', 'url', [
                'rule' => 'url',
                'message' => '有効なURLにしてください'
            ])
            ->add('closest_station', 'length', [
                'rule' => ['maxLength', 10],
                'message' => '最寄り駅名は10文字以内にしてください'
            ])
            ->add('waik_time', 'num', [
                'rule' => ['numeric'],
                'message' => '駅徒歩に数字以外が入力されています'
            ])
            ->add('business_hours_from[hour]', 'range', [
                'rule' => ['range', 0, 23],
                'message' => '営業開始時間（時）にリスト外の値が入力されています'
            ])
            ->add('business_hours_from[minute]', 'range', [
                'rule' => ['range', 0, 59],
                'message' => '営業開始時間（分）にリスト外の値が入力されています'
            ])
            ->add('business_hours_to[hour]', 'range', [
                'rule' => ['range', 0, 23],
                'message' => '営業終了時間（時）にリスト外の値が入力されています'
            ])
            ->add('business_hours_to[minute]', 'range', [
                'rule' => ['range', 0, 59],
                'message' => '営業終了時間（分）にリスト外の値が入力されています'
            ])
            ->add('wifi_cd', 'list', [
                'rule' => ['inList', ['0', '1', '9']],
                'message' => 'Free WiFiは0,1,9のみ入力可能です'
            ])
            ->add('power_supply_cd', 'list', [
                'rule' => ['inList', ['0', '1', '9']],
                'message' => '電源は0,1,9のみ入力可能です'
            ])
            ->add('user_id', 'num', [
                'rule' => ['numeric'],
                'message' => '駅徒歩に数字以外が入力されています'
            ]);
    }

    protected function _execute(array $data)
    {
        // メールを送信する
        return true;
    }
}

