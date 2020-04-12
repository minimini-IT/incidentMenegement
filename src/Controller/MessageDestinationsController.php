<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MessageDestinations Controller
 *
 * @property \App\Model\Table\MessageDestinationsTable $MessageDestinations
 *
 * @method \App\Model\Entity\MessageDestination[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessageDestinationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MessageBords', 'Users']
        ];
        $messageDestinations = $this->paginate($this->MessageDestinations);

        $this->set(compact('messageDestinations'));
    }

    /**
     * View method
     *
     * @param string|null $id Message Destination id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageDestination = $this->MessageDestinations->get($id, [
            'contain' => ['MessageBords', 'Users', 'MessageAnswers']
        ]);

        $this->set('messageDestination', $messageDestination);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $messageDestination = $this->MessageDestinations->newEntity();
        if ($this->request->is('post')) {
            $messageDestination = $this->MessageDestinations->patchEntity($messageDestination, $this->request->getData());
            if ($this->MessageDestinations->save($messageDestination)) {
                $this->Flash->success(__('The message destination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message destination could not be saved. Please, try again.'));
        }
        $messageBords = $this->MessageDestinations->MessageBords->find('list', ['limit' => 200]);
        $users = $this->MessageDestinations->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageDestination', 'messageBords', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message Destination id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $messageDestination = $this->MessageDestinations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $messageDestination = $this->MessageDestinations->patchEntity($messageDestination, $this->request->getData());
            if ($this->MessageDestinations->save($messageDestination)) {
                $this->Flash->success(__('The message destination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The message destination could not be saved. Please, try again.'));
        }
        $messageBords = $this->MessageDestinations->MessageBords->find('list', ['limit' => 200]);
        $users = $this->MessageDestinations->Users->find('list', ['limit' => 200]);
        $this->set(compact('messageDestination', 'messageBords', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Message Destination id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $messageDestination = $this->MessageDestinations->get($id);
        $this->loadModels(["MessageBords"]);
        $messageBord = $this->MessageBords->get($messageDestination->message_bords_id, [
            'contain' => ["Users"]
        ]);

        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord))
        {
            $this->request->allowMethod(['post', 'delete']);
            $messageDestination = $this->MessageDestinations->get($id);
            if ($this->MessageDestinations->delete($messageDestination)) {
                $this->Flash->success(__('The message destination has been deleted.'));
            } else {
                $this->Flash->error(__('The message destination could not be deleted. Please, try again.'));
            }
        }
        else
        {
            $this->Flash->error(__('権限がありません'));
            return $this->redirect($this->referer());
        }

        return $this->redirect(["controller" => "MessageBords", 'action' => 'index']);
    }
}
