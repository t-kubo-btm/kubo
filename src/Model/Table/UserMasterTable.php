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
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name');

        $validator
            ->integer('effect_flg')
            ->requirePresence('effect_flg', 'create')
            ->notEmpty('effect_flg');

        $validator
            ->requirePresence('create_user', 'create')
            ->notEmpty('create_user');

        $validator
            ->dateTime('create_datetime')
            ->requirePresence('create_datetime', 'create')
            ->notEmpty('create_datetime');

        $validator
            ->requirePresence('update_user', 'create')
            ->notEmpty('update_user');

        $validator
            ->dateTime('update_datetime')
            ->requirePresence('update_datetime', 'create')
            ->notEmpty('update_datetime');

        return $validator;
    }

}
