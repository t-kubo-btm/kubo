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
        /* 最寄駅 */
        $shop_info = $this->ShopInfo->find();
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
        $create_user  = $this->ShopInfo->find();
        $create_users = $create_user->select(['create_user'])
                         ->distinct(['create_user'])
                         ->order(['create_user' => 'ASC'])
                         ->toArray();
        $arr_create_user=[];
        foreach($create_users as $key => $value){
          $arr_create_user = $arr_create_user
                  + [$value['create_user'] => $value['create_user']];
        }
        $this->set(compact('arr_create_user'));
        $this->set('_serialize',['arr_create_user']);

/*
        $this->paginate = [];
        $shopInfo = $this->paginate($this->ShopInfo);
        $this->set(compact('shopInfo'));
        $this->set('_serialize', ['shopInfo']);
*/
        /************/
        /*   検索   */
        /************/
        if ($this->request->is('post')) {
          if (array_key_exists('search', $this->request->data())) {
$this->log('----------','debug');
$this->log($this->request->data(),'debug');
$this->log($this->request->getData('wifi_cd'),'debug');
//$this->log($this->request->getData('wifi_cd')[0],'debug');
//$this->log($this->request->getData('wifi_cd')[1],'debug');
            $searchInfo = $this->ShopInfo->find();

            /* 検索条件を設定 */
            $conditions = [];
            // WiFi
           if (!empty($this->request->getData('wifi_cd'))) {
              // チェックが1つ
//              $conditions['wifi_cd'] = "IN(".substr(str_repeat(',?',count($this->request->getData('wifi_cd'))),1).")";
/*
              if (!empty($this->request->getData('wifi_cd')[0])
                  and
                   empty($this->request->getData('wifi_cd')[1])) {
                $conditions['wifi_cd'] = $this->request->getData('wifi_cd')[0];
$this->log('チェック1つ','debug');
              }
              // チェックが2つ
              if (!empty($this->request->getData('wifi_cd')[0])
                  and
                  !empty($this->request->getData('wifi_cd')[1])) {
                $conditions['wifi_cd in '] = $this->request->getData('wifi_cd')[0]
                                             . ',' .
                                             $this->request->getData('wifi_cd')[1];
$this->log('チェック2つ','debug');
              }
*/
            } 
            // 最寄駅
            if (!empty($this->request->getData('closest_station'))) {
              $conditions['closest_station'] = $this->request->getData('closest_station');
            }
            // 徒歩
            if (!empty($this->request->getData('wail_time'))) {
              $conditions['waik_time <= '] = $this->request->getData('waik_time');
            }
            // 登録者
            if (!empty($this->request->getData('create_user'))) {
              $conditions['create_user'] = $this->request->getData('create_user');
            }
            // 店名
            if (!empty($this->request->getData('shop_name'))) {
              $conditions['shop_name like'] = '%' . $this->request->getData('shop_name') . '%';
            }
            /* 検索 */
            if(!empty($conditions)){
              //検索条件が指定された場合
              $search_result = $searchInfo
                     ->where($conditions)
                   ->toArray();
            } else {
              $search_result = $searchInfo;
            }
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
                try{
                  if ($this->ShopInfo->save($patch_shopInfo)) {
                      $this->Flash->success(__('店舗情報を登録しました'));
                      // 検索画面を再表示
                      return $this->redirect(['action' => 'add']);
                  }else{
                      $this->Flash->error(__('予期せぬエラーが発生しました。管理者へお問い合わせください'));
                  }
                } catch(Exception $e){
                  // DB保存エラー時のreturn文
                  $this->Flash->error(__('予期せぬエラーが発生しました。管理者へお問い合わせください'));
                }
            }else{
              // バリデーションチェックエラー時
              $errors = $shopInfoForm->errors();
              $this->set(compact('errors'));
              $this->set('_serialize', ['errors']);

              // DB保存エラー時のreturn文
              $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('shopInfo', 'shops'));
        $this->set('_serialize', ['shopInfo']);
        // 検索画面を再表示
//        return $this->redirect(['action' => 'add']);
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
