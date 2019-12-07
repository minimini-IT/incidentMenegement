<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use App\Controller\Component\FileDeleteComponent;

/**
 * CrewSendComments Controller
 *
 * @property \App\Model\Table\CrewSendCommentsTable $CrewSendComments
 *
 * @method \App\Model\Entity\CrewSendComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrewSendCommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CrewSends', 'Users']
        ];
        $crewSendComments = $this->paginate($this->CrewSendComments);

        $this->set(compact('crewSendComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Crew Send Comment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crewSendComment = $this->CrewSendComments->get($id, [
            'contain' => ['CrewSends', 'Users']
        ]);

        $this->set('crewSendComment', $crewSendComment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //なぜかpostで通らないのでif無し
        //if ($this->request->is('post')) {
        $crewSendComment = $this->CrewSendComments->newEntity();

        $data = $this->request->getData();
        //ファイルあればアップロード処理
        if(isset($this->request->data["file"][0]["tmp_name"])){
            $this->Fileupload = $this->loadComponent("Fileupload");
            $this->loadModels(["Files"]);

            //ファイルグループ取得
            $data["file_group"] = $this->Fileupload->next_file_group();

            //ファイルアップロード
            $this->Fileupload->default_upload($this->request->data["file"]);
        }
        //$crewSendComment = $this->CrewSendComments->patchEntity($crewSendComment, $this->request->getData());
        $crewSendComment = $this->CrewSendComments->patchEntity($crewSendComment, $data);
        if ($this->CrewSendComments->save($crewSendComment)) {
            $this->Flash->success(__('The crew send comment has been saved.'));

            return $this->redirect(["controller" => "CrewSends", 'action' => 'index']);
        }
        $this->Flash->error(__('The crew send comment could not be saved. Please, try again.'));
        //}
        //$crewSends = $this->CrewSendComments->CrewSends->find('list', ['limit' => 200]);
        //$users = $this->CrewSendComments->Users->find('list', ['limit' => 200]);
        //$this->set(compact('crewSendComment', 'crewSends', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Crew Send Comment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crewSendComment = $this->CrewSendComments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crewSendComment = $this->CrewSendComments->patchEntity($crewSendComment, $this->request->getData());
            if ($this->CrewSendComments->save($crewSendComment)) {
                $this->Flash->success(__('The crew send comment has been saved.'));

                return $this->redirect(["controller" => "CrewSends", 'action' => 'index']);
            }
            $this->Flash->error(__('The crew send comment could not be saved. Please, try again.'));
        }
        $crewSends = $this->CrewSendComments->CrewSends->find('list', ['limit' => 200]);
        $users = $this->CrewSendComments->Users->find('list', ['limit' => 200]);
        $this->set(compact('crewSendComment', 'crewSends', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Crew Send Comment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crewSendComment = $this->CrewSendComments->get($id);
        if ($this->CrewSendComments->delete($crewSendComment)) {
          if($crewSendComment->file_group > 0){
            //ファイルの削除
            //file_idを求める
            $this->loadModels(["Files"]);
            $files_id = $this->Files->find()
              ->select(["files_id"])
              ->where(["file_group" => $crewSendComment["file_group"]]);
              //->all();
            //同じfile_groupのファイルを削除する
            $this->redirect(["controller" => "Files", 'action' => 'redirect_delete', $files_id]);
          }
          $this->Flash->success(__('The crew send comment has been deleted.'));
        } else {
            $this->Flash->error(__('The crew send comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(["controller" => "CrewSends", 'action' => 'index']);
    }
}
