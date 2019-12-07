<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use RuntimeException;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\FileuploadComponent;
use Cake\ORM\TableRegistry;

/**
 * CrewSends Controller
 *
 * @property \App\Model\Table\CrewSendsTable $CrewSends
 *
 * @method \App\Model\Entity\CrewSend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrewSendsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Statuses', 'Users']
        ];
        $crewSends = $this->paginate($this->CrewSends);

        $users = $this->CrewSends->Users->find('list', ['limit' => 200]);

        //DBのcrew_send_commentからデータ取り出す
        $this->loadModels(["CrewSendComments"]);
        $crewSendComments = $this->CrewSendComments->find();
        $this->paginate = [
            'contain' => ['Users']
        ];
        $crewSendComments = $this->paginate($this->CrewSendComments);

        $this->set(compact('crewSends', "users", "crewSendComments"));
    }

    /**
     * View method
     *
     * @param string|null $id Crew Send id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crewSend = $this->CrewSends->get($id, [
            'contain' => ['Categories', 'Statuses', 'Users']
        ]);

        $this->set('crewSend', $crewSend);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crewSend = $this->CrewSends->newEntity();
                
        if ($this->request->is('post', "patch", "put")) {
            $this->Fileupload = $this->loadComponent("Fileupload");

            $data = $this->request->getData();
            if(isset($this->request->data["file"]["tmp_name"])){
                $this->loadModels(["Files"]);

                //ファイルグループ取得
                $data["file_group"] = $this->Fileupload->next_file_group();

                //ファイルアップロード
                $this->Fileupload->default_upload($this->request->data["file"]);

            }

            $crewSend = $this->CrewSends->patchEntity($crewSend, $data);

            if ($this->CrewSends->save($crewSend)) {
                $this->Flash->success(__('The crew send has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew send could not be saved. Please, try again.'));
        }
        $categories = $this->CrewSends->Categories->find('list', ['limit' => 200]);
        $statuses = $this->CrewSends->Statuses->find('list', ['limit' => 200]);
        $users = $this->CrewSends->Users->find('list', ['limit' => 200]);
        $this->set(compact('crewSend', 'categories', 'statuses', 'users', "file_upload"));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Crew Send id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crewSend = $this->CrewSends->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crewSend = $this->CrewSends->patchEntity($crewSend, $this->request->getData());
            if ($this->CrewSends->save($crewSend)) {
                $this->Flash->success(__('The crew send has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crew send could not be saved. Please, try again.'));
        }
        $categories = $this->CrewSends->Categories->find('list', ['limit' => 200]);
        $statuses = $this->CrewSends->Statuses->find('list', ['limit' => 200]);
        $users = $this->CrewSends->Users->find('list', ['limit' => 200]);
        $this->set(compact('crewSend', 'categories', 'statuses', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Crew Send id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crewSend = $this->CrewSends->get($id);
        if ($this->CrewSends->delete($crewSend)) {
            $this->Flash->success(__('The crew send has been deleted.'));
        } else {
            $this->Flash->error(__('The crew send could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
