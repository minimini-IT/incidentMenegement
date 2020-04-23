<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Repeats Controller
 *
 * @property \App\Model\Table\RepeatsTable $Repeats
 *
 * @method \App\Model\Entity\Repeat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RepeatsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $repeats = $this->paginate($this->Repeats);

        $this->set(compact('repeats'));
    }

    /**
     * View method
     *
     * @param string|null $id Repeat id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $repeat = $this->Repeats->get($id, [
            'contain' => []
        ]);

        $this->set('repeat', $repeat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $repeat = $this->Repeats->newEntity();
        if ($this->request->is('post')) {
            $repeat = $this->Repeats->patchEntity($repeat, $this->request->getData());
            if ($this->Repeats->save($repeat)) {
                $this->Flash->success(__('The repeat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repeat could not be saved. Please, try again.'));
        }
        $this->set(compact('repeat'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Repeat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repeat = $this->Repeats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repeat = $this->Repeats->patchEntity($repeat, $this->request->getData());
            if ($this->Repeats->save($repeat)) {
                $this->Flash->success(__('The repeat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The repeat could not be saved. Please, try again.'));
        }
        $this->set(compact('repeat'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Repeat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repeat = $this->Repeats->get($id);
        if ($this->Repeats->delete($repeat)) {
            $this->Flash->success(__('The repeat has been deleted.'));
        } else {
            $this->Flash->error(__('The repeat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
