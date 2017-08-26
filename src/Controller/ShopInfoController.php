<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ShopInfoForm as ShopInfoForm;
use App\Form\ShopInfoSearchForm as ShopInfoSearchForm;

use Cake\ORM\TableRegistry;
/**
 * ShopInfo Controller
 *
 * @property \App\Model\Table\ShopInfoTable $ShopInfo
 */
class ShopInfoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
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
     * @return \Cake\Network\Response|null
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
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopInfo = $this->ShopInfo->newEntity();
        $usermaster = TableRegistry::get("UserMaster");
        $disp_um = $usermaster->find()
                ->where(["effect_flg"=>"1"])
                ->toArray();
        $this->log("disp_um", "debug");
        $this->log($disp_um, "debug");
        $disp = [];
        foreach ($disp_um as $key => $value) {
            $disp = $disp + [$value["user_name"] => $value["user_name"]];
        }
        $this->log("disp", "debug");
        $this->log($disp, "debug");

        //登録ボタン押下時        
        if ($this->request->is('post')) {
            $shopinfoform = new ShopInfoForm();
            $shopinfoform->validate($this->request->data());
            $this->log($shopinfoform->errors(), 'debug');
            if (Empty($shopinfoform->errors)) {
                $shopInfo = $this->ShopInfo->patchEntity($shopInfo, $this->request->data);
                if ($this->ShopInfo->save($shopInfo)) {
                    $this->Flash->success(__('The shop info has been saved.'));
                    return $this->redirect(['action' => 'index']);
                }

            }
            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
//        $shops = $this->ShopInfo->Shops->find('list', ['limit' => 200]);
        $this->set(compact('shopInfo', 'disp'));
        $this->set('_serialize', ['shopInfo', 'disp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Shop Info id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shopInfo = $this->ShopInfo->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shopInfo = $this->ShopInfo->patchEntity($shopInfo, $this->request->data);
            if ($this->ShopInfo->save($shopInfo)) {
                $this->Flash->success(__('The shop info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
//        $shops = $this->ShopInfo->Shops->find('list', ['limit' => 200]);
        $this->set(compact('shopInfo'));
        $this->set('_serialize', ['shopInfo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Shop Info id.
     * @return \Cake\Network\Response|null Redirects to index.
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

    /**
     * Search method
     */
    public function search()
    {
        $shopInfo = $this->ShopInfo->newEntity();
        
        //usermaster
        $usermaster = TableRegistry::get("UserMaster");
        $disp_um = $usermaster->find()
                ->where(["effect_flg"=>"1"])
                ->toArray();
        $this->log("disp_um", "debug");
        $this->log($disp_um, "debug");
        $disp = [];
        foreach ($disp_um as $key => $value) {
            $disp = $disp + [$value["user_name"] => $value["user_name"]];
        }
        $this->log("disp", "debug");
        $this->log($disp, "debug");

        //shopinfo
        $shopinfo_d = TableRegistry::get("ShopInfo");
        $doss = $shopinfo_d->find()
//                ->where(["effect_flg"=>"1"])
                ->toArray();
        $this->log("doss", "debug");
        $this->log($doss, "debug");
        $shopnames = [];
        foreach ($doss as $key => $value) {
            $shopnames = $shopnames + [$value["shop_name"] => $value["shop_name"]];
        }
        $this->log("shopnames", "debug");
        $this->log($shopnames, "debug");

        //検索ボタン押下時        
        if ($this->request->is('post')) {
            $valid_param = $this->request->data();
            
            $this->log("valid_param", 'debug');
            $this->log($valid_param, 'debug');
            if (!empty($valid_param["wifi_cd"])) {
                foreach ($this->request->data("wifi_cd") as $key => $value) {
                    $valid_param += ["wifi_cd_" . $key => $value];
                }
            }
            
            if (!empty($valid_param["power_supply_cd"])) {
                foreach ($this->request->data("power_supply_cd") as $key => $value) {
                    $valid_param += ["power_supply_cd_" . $key => $value];
                }
            }
            
            $shopinfoform = new ShopInfoSearchForm();
            $shopinfoform->validate($valid_param);

            $this->log($this->request->data(), 'debug');
        if (Empty($shopinfoform->errors)) {
                $search_result = [];
                //Free WiFi
                if(!empty($this->request->data('wifi_cd'))){
                    $search_result += ["wifi_cd in"=>$this->request->data('wifi_cd')];
                }
                //電源
                if(!empty($this->request->data('power_supply_cd'))){
                    $search_result += ["power_supply_cd in"=>$this->request->data('power_supply_cd')];
                }
                //最寄り駅
                if(!empty($this->request->data('closest_station'))){
                    $search_result += ["closest_station in"=>$this->request->data('closest_station')];
                }
                //駅徒歩
                if(!empty($this->request->data('waik_time'))){
                    array_push($search_result, "waik_time <= ".$this->request->data('waik_time'));
}
                //登録者
                if(!empty($this->request->data('create_user'))){
                    $search_result += ["create_user"=>$this->request->data('create_user')];
                }
                //店名
                if(!empty($this->request->data('shop_name'))){
                    $search_result += ["shop_name"=>$this->request->data('shop_name')];
                }
                
                $this->log($search_result, "debug");
                $shopInfo = $this->ShopInfo->patchEntity($shopInfo, $this->request->data);
                $shopinfo = TableRegistry::get("ShopInfo");
                $disp_um = $shopinfo->find()
                    ->where($search_result)
                    ->toArray();
                $this->set(compact('disp_um'));
                $this->set('_serialize', ['disp_um']);
                
            }
//            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
//        $shops = $this->ShopInfo->Shops->find('list', ['limit' => 200]);
        $this->set(compact('shopInfo', 'disp'));
        $this->set('_serialize', ['shopInfo', 'disp']);
        //
        $this->set(compact('shopInfo', 'shopnames'));
        $this->set('_serialize', ['shopInfo', 'shopnames']);
    }
    
}