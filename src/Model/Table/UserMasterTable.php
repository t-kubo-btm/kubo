<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserMaster Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserMaster get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserMaster newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserMaster[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserMaster|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserMaster patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserMaster[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserMaster findOrCreate($search, callable $callback = null, $options = [])
 */
class UserMasterTable extends Table
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

        $this->setTable('user_master');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        //$this->belongsTo('Users', [
        //    'foreignKey' => 'user_id',
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
        $validator
            ->allowEmpty('user_name');

        $validator
            ->integer('effect_flg')
            ->allowEmpty('effect_flg');

        $validator
            ->allowEmpty('create_user');

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
}
