<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShopInfo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Shops
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

        $this->table('shop_info');
        $this->displayField('shop_id');
        $this->primaryKey('shop_id');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    //入力チェックその１
    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('shop_name', 'create')
            ->notEmpty('shop_name');

        $validator
            ->allowEmpty('shop_url');

        $validator
            ->requirePresence('closest_station', 'create')
            ->notEmpty('closest_station');

        $validator
            ->integer('waik_time')
            ->requirePresence('waik_time', 'create')
            ->notEmpty('waik_time');

        $validator
            ->integer('wifi_cd')
            ->requirePresence('wifi_cd', 'create')
            ->notEmpty('wifi_cd');

        $validator
            ->integer('power_supply_cd')
            ->requirePresence('power_supply_cd', 'create')
            ->notEmpty('power_supply_cd');

        $validator
            ->allowEmpty('memo');

        $validator
            ->requirePresence('create_user', 'create')
            ->allowEmpty('create_user');

        $validator
            ->date('create_datetime')
            ->requirePresence('create_datetime', 'create')
            ->allowEmpty('create_datetime');

        $validator
            ->requirePresence('update_user', 'create')
            ->allowEmpty('update_user');

        $validator
            ->date('update_datetime')
            ->requirePresence('update_datetime', 'create')
            ->allowEmpty('update_datetime');

        return $validator;
    }


}
