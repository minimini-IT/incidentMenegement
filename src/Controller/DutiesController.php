<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Duties Controller
 *
 * @property \App\Model\Table\DutiesTable $Duties
 *
 * @method \App\Model\Entity\Duty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DutiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $duties = $this->paginate($this->Duties);

        $this->set(compact('duties'));
    }

    /**
     * View method
     *
     * @param string|null $id Duty id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $duty = $this->Duties->get($id, [
            'contain' => []
        ]);

        $this->set('duty', $duty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $duty = $this->Duties->newEntity();
        if ($this->request->is('post')) {
            $duty = $this->Duties->patchEntity($duty, $this->request->getData());
            if ($this->Duties->save($duty)) {
                $this->Flash->success(__('The duty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The duty could not be saved. Please, try again.'));
        }
        $this->set(compact('duty'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Duty id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $duty = $this->Duties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $duty = $this->Duties->patchEntity($duty, $this->request->getData());
            if ($this->Duties->save($duty)) {
                $this->Flash->success(__('The duty has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The duty could not be saved. Please, try again.'));
        }
        $this->set(compact('duty'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Duty id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $duty = $this->Duties->get($id);
        if ($this->Duties->delete($duty)) {
            $this->Flash->success(__('The duty has been deleted.'));
        } else {
            $this->Flash->error(__('The duty could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
