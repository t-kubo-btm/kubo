<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserMaster Controller
 *
 * @property \App\Model\Table\UserMasterTable $UserMaster
 *
 * @method \App\Model\Entity\UserMaster[] paginate($object = null, array $settings = [])
 */
class UserMasterController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        //$this->paginate = [
        //    'contain' => ['Users']
        //];
        $userMaster = $this->paginate($this->UserMaster);

        $this->set(compact('userMaster'));
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * View method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //$userMaster = $this->UserMaster->get($id, [
        //    'contain' => ['Users']
        //]);

        $this->set('userMaster', $userMaster);
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userMaster = $this->UserMaster->newEntity();
        if ($this->request->is('post')) {
            $userMaster = $this->UserMaster->patchEntity($userMaster, $this->request->getData());
            if ($this->UserMaster->save($userMaster)) {
                $this->Flash->success(__('The user master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user master could not be saved. Please, try again.'));
        }
        //$users = $this->UserMaster->Users->find('list', ['limit' => 200]);
        $this->set(compact('userMaster'));
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userMaster = $this->UserMaster->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userMaster = $this->UserMaster->patchEntity($userMaster, $this->request->getData());
            if ($this->UserMaster->save($userMaster)) {
                $this->Flash->success(__('The user master has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user master could not be saved. Please, try again.'));
        }
        $users = $this->UserMaster->Users->find('list', ['limit' => 200]);
        //$this->set(compact('userMaster', 'users'));
        $this->set('_serialize', ['userMaster']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User Master id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userMaster = $this->UserMaster->get($id);
        if ($this->UserMaster->delete($userMaster)) {
            $this->Flash->success(__('The user master has been deleted.'));
        } else {
            $this->Flash->error(__('The user master could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
