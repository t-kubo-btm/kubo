<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopInfo Model
 *
 * @property \App\Model\Table\ShopsTable|\Cake\ORM\Association\BelongsTo $Shops
 *
 * @method \App\Model\Entity\ShopInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ShopInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ShopInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShopInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ShopInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ShopInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShopInfo findOrCreate($search, callable $callback = null, $options = [])
 */
class ShopInfoTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('shop_info');
        $this->setDisplayField('shop_id');
        $this->setPrimaryKey('shop_id');

        // $this->belongsTo('Shops', [
        //    'foreignKey' => 'shop_id',
        //    'joinType' => 'INNER'
        //]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        // 店名
        $validator
            ->notEmpty('shop_name');

        // URL
        $validator
            ->allowEmpty('shop_url');

        // 最寄駅
        $validator
            ->notEmpty('closest_station');

        // 駅徒歩
        $validator
            ->integer('waik_time')
            ->notEmpty('waik_time');

        // 営業時間（開始）
        $validator
            ->notEmpty('business_hours_from');

        // 営業時間（終了）
        $validator
            ->notEmpty('business_hours_to');

        $validator
            ->integer('wifi_cd')
            ->notEmpty('wifi_cd');

        $validator
            ->integer('power_supply_cd')
            ->notEmpty('power_supply_cd');

        $validator
            ->allowEmpty('memo');

        $validator
            ->notEmpty('create_user');

        $validator
            ->dateTime('create_datetime')
            ->allowEmpty('create_datetime');

        $validator
            ->allowEmpty('update_user');

        $validator
            ->dateTime('update_datetime')
            ->allowEmpty('update_datetime');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        //$rules->add($rules->existsIn(['shop_id'], 'Shops'));

        return $rules;
    }
}
