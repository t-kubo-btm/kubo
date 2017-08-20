<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use App\Form\ShopInfoForm;
use Cake\ORM\TableRegistry;
use Exception;

/**
 * ShopInfo Controller
 *
 * @property \App\Model\Table\ShopInfoTable $ShopInfo
 *
 * @method \App\Model\Entity\ShopInfo[] paginate($object = null, array $settings = [])
 */
class ShopInfoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [];
        $shopInfo = $this->paginate($this->ShopInfo);

        $this->set(compact('shopInfo'));
        $this->set('_serialize', ['shopInfo']);

    }

    /**
     * View method
     *
     * @param string|null $id Shop Info id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shopInfo = $this->ShopInfo->get($id, [
            
        ]);

        $this->set('shopInfo', $shopInfo);
        $this->set('_serialize', ['shopInfo']);
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|void
     */
    public function search()
    {
       /************/
       /* 初期表示 */
       /************/
        $shop_info = $this->ShopInfo->find();

        /* 最寄駅 */
        $closest_station = $shop_info->select(['closest_station'])
                   ->distinct(['closest_station'])
                   ->order(['closest_station' => 'ASC'])
                   ->toArray();
        $arr_closest_station=[];
        foreach($closest_station as $key => $value){
          $arr_closest_station = $arr_closest_station
                  + [$value['closest_station'] => $value['closest_station']];
        }
        $this->set(compact('arr_closest_station'));
        $this->set('_serialize',['arr_closest_station']);

        /* 登録者 */
        $create_user = $shop_info->select(['create_user'])
                   ->distinct(['create_user'])
                   ->order(['create_user' => 'ASC'])
                   ->toArray();
        $arr_create_user=[];
        foreach($create_user as $key => $value){
          $arr_create_user = $arr_create_user
                  + [$value['create_user'] => $value['create_user']];
        }
        $this->set(compact('arr_create_user'));
        $this->set('_serialize',['arr_create_user']);


        $this->paginate = [];
        $shopInfo = $this->paginate($this->ShopInfo);
        $this->set(compact('shopInfo'));
        $this->set('_serialize', ['shopInfo']);

        /************/
        /*   検索   */
        /************/
        if ($this->request->is('post')) {
          if (array_key_exists('search', $this->request->data())) {
//$this->log('----- search -----','debug');
             //検索処理
            $search_info = $this->ShopInfo->find();
            $search_result = $search_info
                 ->where(['closest_station' => $this->request->getData('closest_station')])
                 ->where(['shop_name like ' => '%' . $this->request->getData('shop_name') . '%'])
                 ->toArray();

            $this->set(compact('search_result'));
            $this->set('_serialize', ['search_result']);
         } else {
             // 削除処理
         }
      }

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $create_user = TableRegistry::get('UserMaster');
        $create_users = $create_user->find();
        $users = $create_users->select(['user_name'])
                   ->where(['effect_flg' => 1])
                   ->order(['user_name' => 'ASC'])
                   ->toArray();

        $new_users=[];
        foreach($users as $key => $value){
          $new_users = $new_users + [$value['user_name'] => $value['user_name']];
        }
        $this->log($new_users, "debug");
        $this->set(compact('new_users'));
        $this->set('_serialize',['new_users']);

        // オブジェクトを作成
        $shopInfo = $this->ShopInfo->newEntity();
        if ($this->request->is('post')) {
            $shopInfoForm = new ShopInfoForm();
            $shopInfoForm->validate($this->request->data());

            $this->log($shopInfoForm->errors(), 'debug');
            if(Empty($shopInfoForm->errors())){
               
                // 内部的に設定する項目
                $default_condition = [
                    'create_datetime' => date('Y-m-d H:i:s'),
                    'update_user' => $this->request->getData('create_user'),
                    'update_datetime' => date('Y-m-d H:i:s'),
                ];

                // 画面から受け取った値と、内部的に設定する項目を合算
                $shop_info_condition = $this->request->getData() + $default_condition;
                $shopInfo = $this->ShopInfo->newEntity();
                $patch_shopInfo = $this->ShopInfo->patchEntity($shopInfo, $shop_info_condition);

                // DBに保存
                if ($this->ShopInfo->save($patch_shopInfo)) {
                    $this->Flash->success(__('The shop info has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }             
            }
            // バリデーションチェックエラーを設定
            $errors = $shopInfoForm->errors();
            $this->set(compact('errors'));
            $this->set('_serialize', ['errors']);

            // DB保存エラー時のreturn文
            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
        $this->set(compact('shopInfo', 'shops'));
        $this->set('_serialize', ['shopInfo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop Info id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopInfo = $this->ShopInfo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopInfo = $this->ShopInfo->patchEntity($shopInfo, $this->request->getData());
            if ($this->ShopInfo->save($shopInfo)) {
                $this->Flash->success(__('The shop info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
        // $shops = $this->ShopInfo->Shops->find('list', ['limit' => 200]);
        $this->set(compact('shopInfo', 'shops'));
        $this->set('_serialize', ['shopInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shopInfo = $this->ShopInfo->get($id);
        if ($this->ShopInfo->delete($shopInfo)) {
            $this->Flash->success(__('The shop info has been deleted.'));
        } else {
            $this->Flash->error(__('The shop info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
