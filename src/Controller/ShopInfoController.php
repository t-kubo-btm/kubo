<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $shopInfo = $this->ShopInfo->get($id);

        $this->set('shopInfo', $shopInfo);
        $this->set('_serialize', ['shopInfo']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shopInfo = $this->ShopInfo->newEntity();
        if ($this->request->is('post')) {
            $shopInfo = $this->ShopInfo->patchEntity($shopInfo, $this->request->getData());
            if ($this->ShopInfo->save($shopInfo)) {
                $this->Flash->success(__('The shop info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shop info could not be saved. Please, try again.'));
        }
        
        $this->set(compact('shopInfo'));
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
        
        $this->set(compact('shopInfo'));
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
