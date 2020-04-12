<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MessageBords Controller
 *
 * @property \App\Model\Table\MessageBordsTable $MessageBords
 *
 * @method \App\Model\Entity\MessageBord[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MessageBordsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModels(["MessageAnswers", "MessageBordChronologies", "Users", "PrivateMessages"]);
        $messageAnswers = $this->MessageAnswers->newEntity();
        $messageBordChronologies = $this->MessageBordChronologies->newEntity();

        $this->paginate = [
            'contain' => [
              "MessageBords.Users",
              "MessageBords.IncidentManagements.ManagementPrefixes",
              'MessageBords.MessageStatuses', 
              "MessageBords.MessageDestinations.Users", 
              "MessageBords.MessageDestinations.MessageAnswers.MessageChoices", 
              "MessageBords.MessageChoices", 
              "MessageBords.MessageBordChronologies.Users",
              "MessageBords.PrivateMessages.Users", 
              "MessageBords.MessageFiles"
            ],
            "order" => ["message_bords_id" => "desc"],
            "maxLimit" => 5
          ];

        //$loginUser = $this->request->session()->read("Auth.User.users_id");
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $privateMessages = $this->PrivateMessages->find("all")
            ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 7]]]);
        $messageBords = $this->paginate($privateMessages);
        $normalUsers = $this->Users->find('list', ['limit' => 200])
            ->where(["delete_flag" => 0])
            ->order(["user_sort_number" => "asc"]);
        $this->set(compact('messageBords', "messageAnswers", "messageBordChronologies", "normalUsers"));




        /*
        $this->loadModels(["MessageAnswers", "MessageBordChronologies", "Users"]);
        $messageAnswers = $this->MessageAnswers->newEntity();
        $messageBordChronologies = $this->MessageBordChronologies->newEntity();

        $this->paginate = [
            'contain' => [
              "Users",
              "IncidentManagements.ManagementPrefixes",
              'MessageStatuses', 
              "MessageDestinations.Users", 
              "MessageDestinations.MessageAnswers.MessageChoices", 
              "MessageChoices", 
              "MessageBordChronologies.Users", 
              "MessageFiles",
              "MessageBordChronologies"
            ],
            "order" => ["message_bords_id" => "desc"],
            "maxLimit" => 5
          ];
        $messageBords = $this->paginate($this->MessageBords);
        $normalUsers = $this->Users->find('list', ['limit' => 200])
            ->where(["delete_flag" => 0])
            ->order(["user_sort_number" => "asc"]);
        $this->set(compact('messageBords', "messageAnswers", "messageBordChronologies", "normalUsers"));
         */
    }

    /**
     * View method
     *
     * @param string|null $id Message Bord id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $messageBord = $this->MessageBords->get($id, [
            'contain' => ['MessageStatuses']
        ]);

        $this->set('messageBord', $messageBord);
    }

    public function privateView($id = null)
    {
        $messageBords = $this->MessageBords->get($id, [
            'contain' => ['PrivateMessages.Users']
        ]);

        $addUser = $this->MessageBords->get($id,[
            "contain" => ["Users"]
        ]);
        $addUser = $addUser->user->users_id;

        $this->set(compact('messageBords', "addUser"));
    }

    public function destinationView($id = null)
    {
        $messageBords = $this->MessageBords->get($id, [
            'contain' => ['MessageDestinations.Users']
        ]);

        $this->set(compact('messageBords', "addUser"));
    }

    public function choiceView($id = null)
    {
        $messageBords = $this->MessageBords->get($id, [
            'contain' => ['MessageChoices']
        ]);

        $this->set(compact('messageBords', "addUser"));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //選択肢ないとエラーにする
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $messageBord = $this->MessageBords->newEntity();
        $this->loadModels(["MessageChoices", "MessageDestinations", "Users", "PrivateMessages", "MessageFiles"]);
        if ($this->request->is('post')) {
            $this->IncidentManagement = $this->loadComponent("IncidentAdd");
            $data = $this->request->getdata();
            $messageBord = $this->MessageBords->patchEntity($messageBord, $data);

            //MessageBord save前にincident_managements更新
            if(is_int($incidentNumber = $this->IncidentManagement->incident_number(4)))
            {
                //インシデント番号生成成功したら
                $data = array_merge($data, ["incident_managements_id" => $incidentNumber]);
                $messageBord = $this->MessageBords->patchEntity($messageBord, $data);
                if ($this->MessageBords->save($messageBord)) 
                {
                    $this->Flash->success(__('The message bord has been saved.'));
                    $bordId = $messageBord->message_bords_id;


                    //privateMessage保存
                    if(!empty($data["allUser"][0]))
                    {
                        $this->privateAllUserSave($data["allUser"][0], $bordId);
                    }
                    else if(
                        !empty($data["soukatuPrv"]) || 
                        !empty($data["kenkyoPrv"]) || 
                        !empty($data["systemPrv"]) || 
                        !empty($data["systemPrv"]))
                    {
                        $this->userEntityEdit($data, "Prv", "private", $loginUser, true, $bordId);
                        /*
                        $group = [
                            "soukatuPrv",
                            "kenkyoPrv",
                            "systemPrv",
                            "kintaiPrv"
                        ];
                        $privateUser = null;
                        foreach($group as $private)
                        {
                            $this->log("---foreach group as private---", LOG_DEBUG);
                            $this->log($private, LOG_DEBUG);
                            if(!empty($data[$private][0]))
                            {
                                foreach($data[$private] as $prvUser)
                                {
                                    $this->log("---foreach data[private] as destUser---", LOG_DEBUG);
                                    $this->log($prvUser, LOG_DEBUG);
                                    $privateUser[] = $prvUser;
                                }
                            }
                        }
                        $this->privateSave($privateUser, $bordId, $loginUser, true);
                         */
                    }
                    else
                    {
                        $this->log("作成者のみ閲覧可", LOG_DEBUG);
                        $privateMessage = $this->PrivateMessages->newEntity();
                        $privateEntity = [
                            "message_bords_id" => $bordId,
                            "users_id" => $loginUser
                        ];
                        $this->log("---privateMessage---", LOG_DEBUG);
                        $this->log($privateMessage, LOG_DEBUG);
                        $this->log("---privateEntity---", LOG_DEBUG);
                        $this->log($privateEntity, LOG_DEBUG);
                        $privateMessage = $this->PrivateMessages->patchEntity($privateMessage, $privateEntity);
                        if ($this->PrivateMessages->save($privateMessage)) 
                        {
                            $this->log("プライベートユーザにログイン中のユーザを登録", LOG_DEBUG);
                        }
                        else
                        {
                            $this->log("プライベートユーザ登録失敗", LOG_DEBUG);
                        }
                    }

                    //choiceを保存
                    if(!empty($data["content"][0]))
                    {
                        //$this->log("choice save", LOG_DEBUG);
                        $this->choiceSave($data["content"], $bordId);
                    }

                    //destination保存
                    if(
                        !empty($data["soukatuDest"]) || 
                        !empty($data["kenkyoDest"]) || 
                        !empty($data["systemDest"]) || 
                        !empty($data["systemDest"]))
                    {
                        $group = [
                            "soukatuDest",
                            "kenkyoDest",
                            "systemDest",
                            "kintaiDest"
                        ];
                        foreach($group as $dest)
                        {
                            foreach($data[$dest] as $destUser)
                            {
                                $destinationUser[] = $destUser;
                            }
                        }
                        if(!empty($destinationUser))
                        {
                            $this->destinationSave($destinationUser, $bordId);
                        }
                    }
                    $this->log("---destination User なし---", LOG_DEBUG);

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"]))
                    {
                        //ファイルアップロード
                        $this->Fileupload = $this->loadComponent("Fileupload");
                        $entity = $this->Fileupload->default_upload($data["file"], $bordId, "message_bords");
                        $file = $this->MessageFiles->newEntities($entity);
                        if($this->MessageFiles->saveMany($file)) 
                        {
                          $this->Flash->success(__('ファイルのアップロードに成功しました。'));
                        }
                        else
                        {
                          $this->Flash->error(__('ファイルのアップロードに失敗しました。'));
                        }
                        return $this->redirect(['action' => 'index']);
                    }
                    else
                    {
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            $this->Flash->error(__('The message bord could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);

        }
        $messageStatuses = $this->MessageBords->MessageStatuses->find('list', ['limit' => 200]);

        //各班ごとでユーザ取得
        $soukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $system = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => 7]);


        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);
        $this->set(compact('messageBord', 'messageStatuses', "users", "allUser", "soukatu", "kenkyo", "system", "kintai"));
    }

    public function chronoloAdd()
    {
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $messageBord = $this->MessageBords->newEntity();
        $this->loadModels(["MessageChoices", "MessageDestinations", "Users", "MessageFiles"]);
        if ($this->request->is('post')) {
            $this->IncidentManagement = $this->loadComponent("IncidentAdd");
            $data = $this->request->getdata();
            $messageBord = $this->MessageBords->patchEntity($messageBord, $data);

            //MessageBord save前にincident_managements更新
            if(is_int($incidentNumber = $this->IncidentManagement->incident_number(4)))
            {
                //インシデント番号生成成功したら
                $data = array_merge($data, ["incident_managements_id" => $incidentNumber]);
                $messageBord = $this->MessageBords->patchEntity($messageBord, $data);
                if ($this->MessageBords->save($messageBord)) 
                {
                    $this->Flash->success(__('The message bord has been saved.'));
                    $bordId = $messageBord->message_bords_id;

                    //privateMessage保存
                    if(!empty($data["allUser"][0]))
                    {
                        $this->log("private allUser save", LOG_DEBUG);
                        $this->privateAllUserSave($data["allUser"][0], $bordId);
                    }
                    else
                    {
                        $group = [
                            "soukatuPrv",
                            "kenkyoPrv",
                            "systemPrv",
                            "kintaiPrv"
                        ];
                        $privateUser = null;
                        foreach($group as $private)
                        {
                            $this->log("---foreach group as private---", LOG_DEBUG);
                            $this->log($private, LOG_DEBUG);
                            if(!empty($data[$private][0]))
                            {
                                foreach($data[$private] as $prvUser)
                                {
                                    $this->log("---foreach data[private] as destUser---", LOG_DEBUG);
                                    $this->log($prvUser, LOG_DEBUG);
                                    $privateUser[] = $prvUser;
                                }
                            }
                        }
                        $this->privateSave($privateUser, $bordId, $loginUser, true);
                    }

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"]))
                    {
                        //ファイルアップロード
                        $this->Fileupload = $this->loadComponent("Fileupload");
                        $entity = $this->Fileupload->default_upload($data["file"], $bordId, "message_bords");
                        $file = $this->MessageFiles->newEntities($entity);
                        if($this->MessageFiles->saveMany($file)) 
                        {
                          $this->Flash->success(__('ファイルのアップロードに成功しました。'));
                        }
                        else
                        {
                          $this->Flash->error(__('ファイルのアップロードに失敗しました。'));
                        }
                        return $this->redirect(['action' => 'index']);
                    }
                    else
                    {
                        return $this->redirect(['action' => 'index']);
                    }
                }
            }
            $this->Flash->error(__('The message bord could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);

        }
        $messageStatuses = $this->MessageBords->MessageStatuses->find('list', ['limit' => 200]);
        //各班ごとでユーザ取得
        $soukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $system = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => 7]);
        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);
        $this->set(compact('messageBord', 'messageStatuses', "users", "allUser", "soukatu", "kenkyo", "system", "kintai"));
    }

    /**
     * Edit method
     *
     * @param string|null $id Message Bord id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $messageBord = $this->MessageBords->get($id, [
            'contain' => ["MessageChoices", "MessageDestinations", "Users"]
        ]);
        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord)){
            $this->loadModels(["Users", "MessageFiles", "MessageDestinations", "PrivateMessages"]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getdata();
                $this->log("---data---", LOG_DEBUG);
                $this->log($data, LOG_DEBUG);
                $messageBord = $this->MessageBords->patchEntity($messageBord, $data);
                if ($this->MessageBords->save($messageBord)) {
                    $this->Flash->success(__('The message bord has been saved.'));
                    $bordId = $messageBord->message_bords_id;

                    //privateMessage保存
                    if(!empty($data["allUser"][0]))
                    {
                        //allUserがすでに登録されていないことを確認
                        $allCheck = $this->PrivateMessages->find("list", ["list" => 200])
                            ->select(["users_id"])
                            ->where(["message_bords_id" => $id])
                            ->where(["users_id" => 7]);
                        $this->log("---allCheck sql---", LOG_DEBUG);
                        $this->log($allCheck, LOG_DEBUG);
                        $this->log("---allCheck list---", LOG_DEBUG);
                        $this->log($allCheck->toList(), LOG_DEBUG);
                        $this->privateAllUserSave($data["allUser"][0], $bordId);

                        //editの場合、各ユーザが登録されたあとにallUserを登録するならば、
                        //各ユーザは削除する処理を記述する
                        //$this->log("---allではない---", LOG_DEBUG);
                    }
                    else if(
                        !empty($data["soukatuPrv"]) || 
                        !empty($data["kenkyoPrv"]) || 
                        !empty($data["systemPrv"]) || 
                        !empty($data["kintaiPrv"]))
                    {
                        $this->log("---ユーザ選択されている---", LOG_DEBUG);
                        $this->userEntityEdit($data, "Prv", "private", $loginUser, false, $bordId);
                        /*
                        $group = [
                            "soukatuPrv",
                            "kenkyoPrv",
                            "systemPrv",
                            "kintaiPrv"
                        ];
                        $privateUser = null;
                        foreach($group as $private)
                        {
                            if(!empty($data[$private][0]))
                            {
                                foreach($data[$private] as $prvUser)
                                {
                                    $privateUser[] = $prvUser;
                                }
                            }
                        }
                        $this->log("---privateUser---", LOG_DEBUG);
                        $this->log($privateUser, LOG_DEBUG);
                        $this->privateSave($privateUser, $bordId, $loginUser, false);
                         */
                    }
                    else
                    {
                        $this->log("閲覧権限追加なし", LOG_DEBUG);
                        /*
                         * editにはいらなかった
                        $privateMessage = $this->PrivateMessages->newEntiy();
                        $privateEntity = [
                            "message_bords_id" => $id,
                            "users_id" => $loginUser
                        ];
                        $privateMessages = $this->PrivateMessages->patchEntity($privateMessages, $privateEntity);
                        if ($this->MessageBords->save($messageBord)) 
                        {
                            $this->log("プライベートユーザにログイン中のユーザを登録", LOG_DEBUG);
                        }
                        else
                        {
                            $this->log("プライベートユーザ登録失敗", LOG_DEBUG);
                        }
                         */
                    }

                    //choiceを保存
                    if(!empty($data["content"][0]))
                    {
                        $this->choiceSave($data["content"], $bordId);
                    }

                    //destination保存
                    $group = [
                        "soukatuDest",
                        "kenkyoDest",
                        "systemDest",
                        "kintaiDest"
                    ];
                    foreach($group as $dest)
                    {
                        foreach($data[$dest] as $destUser)
                        {
                            $destinationUser[] = $destUser;
                        }
                    }
                    if(!empty($destinationUser))
                    {
                        $this->destinationSave($destinationUser, $bordId);
                    }
                    /*
                     * 全消しなし edit 追加のみ
                    //いっぺん全消し
                    $this->MessageDestinations->deleteAll(["message_bords_id" => $bordId]);
                    if(!empty($data["user"]))
                    {
                        $this->destinationSave($data["user"], $bordId);
                    }
                     */

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"])){
                      $this->Fileupload = $this->loadComponent("Fileupload");
                      $entity = $this->Fileupload->default_upload($data["file"], $bordId, "message_bords");
                      $file = $this->MessageFiles->newEntities($entity);
                      if($this->MessageFiles->saveMany($file)) {
                        $this->Flash->success(__('ファイルのアップロードに成功しました。'));
                      }else{
                        $this->Flash->error(__('ファイルのアップロードに失敗しました。'));
                      }
                    }
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The message bord could not be saved. Please, try again.'));
            }
        }else{
            $this->Flash->error(__('権限がありません'));
            return $this->redirect($this->referer());
        }

        $messageStatuses = $this->MessageBords->MessageStatuses->find('list', ['limit' => 200]);
        $messageDestinations = $messageBord->message_destinations;
        $messageChoices = $messageBord->message_choices;

        $privateUser = $this->MessageBords->get($id, [
            'contain' => ['PrivateMessages.Users']
        ]);

        //各班ごとでユーザ取得
        //private用
        $privateSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);


        //private用
        foreach($privateUser->private_messages as $user)
        {
            if($user->user->belongs_id == 1)
            {
                $privateSoukatu->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 2)
            {
                $privateKenkyo->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 3)
            {
                $privateSystem->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 4)
            {
                $privateKintai->where(["users_id !=" => $user->users_id]);
            }
        }


        /*
        $privateSoukatu = $privateSoukatu->toList();
        $privateKenkyo = $privateKenkyo->toList();
        $privateSystem = $privateSystem->toList();
        $privateKintai = $privateKintai->toList();
         */


        $destinationUser = $this->MessageBords->get($id, [
            'contain' => ['MessageDestinations.Users']
        ]);

        //各班ごとでユーザ取得
        //destination用
        $destinationSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);

        foreach($destinationUser->message_destinations as $user)
        {
            if($user->user->belongs_id == 1)
            {
                $destinationSoukatu->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 2)
            {
                $destinationKenkyo->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 3)
            {
                $destinationSystem->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 4)
            {
                $destinationKintai->where(["users_id !=" => $user->users_id]);
            }
        }

        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => 7]);


        $this->set(compact(
            'messageBord', 
            'messageStatuses', 
            "users", 
            "allUser", 
            "messageDestinations", 
            "messageChoices", 
            "privateSoukatu", 
            "privateKenkyo", 
            "privateSystem", 
            "privateKintai", 
            "privateUser", 
            "destinationSoukatu", 
            "destinationKenkyo", 
            "destinationSystem", 
            "destinationKintai",
            "destinationUser"
        ));
    }

    public function chronoloEdit($id = null)
    {
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $messageBord = $this->MessageBords->get($id, [
            'contain' => ["MessageChoices", "MessageDestinations", "Users", "PrivateMessages"]
        ]);
        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord)){
            $this->loadModels(["Users", "MessageFiles", "PrivateMessages"]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getdata();
                $this->log("---data---", LOG_DEBUG);
                $this->log($data, LOG_DEBUG);
                $messageBord = $this->MessageBords->patchEntity($messageBord, $data);
                if ($this->MessageBords->save($messageBord)) {
                    $this->Flash->success(__('The message bord has been saved.'));
                    //$bordId = $messageBord->message_bords_id;

                    //privateMessage保存
                    //allUserが登録されているか確認
                    $allCheck = $this->PrivateMessages->find()
                        ->select(["users_id"])
                        ->where(["message_bords_id" => $id])
                        ->where(["users_id" => 7]);
                    $this->log("---allCheck sql---", LOG_DEBUG);
                    $this->log($allCheck, LOG_DEBUG);

                    if(!empty($data["allUser"][0]))
                    {
                        if(empty($allCheck->toArray()))
                        {
                            $this->log("---allUser 登録なし---", LOG_DEBUG);
                            //すべてのユーザに閲覧許可を与えたら、個々のユーザは削除する
                            //そうしないと重複してメッセージボードが表示される
                            $deletePrivateMessage = $this->PrivateMessages->find("all")
                                ->select(["message_bords_id"])
                                ->where(["message_bords_id" => $id]);
                            $tmp = $deletePrivateMessage->toArray();
                            $deletePrivateMessage = ["message_bords_id" => $tmp[0]["message_bords_id"]];
                            $this->log("---deletePrivateMessage->toArray()[0][message_bords_id]---", LOG_DEBUG);
                            //$this->log($deletePrivateMessage[0]["message_bords_id"], LOG_DEBUG);
                            $this->log($deletePrivateMessage, LOG_DEBUG);
                            if($this->PrivateMessages->deleteAll($deletePrivateMessage))
                            {
                                $this->log("deleteAll complate. allUser save", LOG_DEBUG);
                                $this->privateAllUserSave($data["allUser"][0], $bordId);
                            }
                            else
                            {
                                $this->log("deleteAll error. not allSave", LOG_DEBUG);
                            }

                        }
                        else
                        {
                            $this->log("---allUserすでに登録あり---", LOG_DEBUG);
                        }
                        
                        //editの場合、各ユーザが登録されたあとにallUserを登録するならば、
                        //各ユーザは削除する処理を記述する
                    }
                    else if(
                        !empty($data["soukatuPrv"]) || 
                        !empty($data["kenkyoPrv"]) || 
                        !empty($data["systemPrv"]) || 
                        !empty($data["kintaiPrv"]))
                    {
                        if(!empty($allCheck->toArray()))
                        {
                            $this->log("---allUser登録済みだけど、ユーザを登録しようとしている---", LOG_DEBUG);
                            $this->log("---allUser削除して、ユーザを登録する---", LOG_DEBUG);
                            $privateMessagesId = $messageBord->private_messages[0]["private_messages_id"];

                            $privateMessage = $this->PrivateMessages->get($privateMessagesId);
                            if ($this->PrivateMessages->delete($privateMessage)) 
                            {
                                $this->log("---allUser private message 削除---", LOG_DEBUG);
                                //allUser削除したら作成者の閲覧権限を登録
                                $entity[] = $messageBord->users_id;
                                $this->privateSave($entity, $id, $loginUser, false);
                            }
                            else
                            {
                                $this->log("---allUser private message 削除失敗---", LOG_DEBUG);
                            }

                        }
                        $this->log("---ユーザ選択されている---", LOG_DEBUG);
                        $this->userEntityEdit($data, "Prv", "private", $loginUser, false, $id);
                    }
                    else
                    {
                        $this->log("閲覧権限追加なし", LOG_DEBUG);
                    }

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"])){
                        $this->Fileupload = $this->loadComponent("Fileupload");
                        $entity = $this->Fileupload->default_upload($data["file"], $bordId, "message_bords");
                        $file = $this->MessageFiles->newEntities($entity);
                        if($this->MessageFiles->saveMany($file)) {
                          $this->Flash->success(__('ファイルのアップロードに成功しました。'));
                        }else{
                          $this->Flash->error(__('ファイルのアップロードに失敗しました。'));
                        }
                    }
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The message bord could not be saved. Please, try again.'));
            }
        }else{
            $this->Flash->error(__('権限がありません'));
            return $this->redirect($this->referer());
        }

        $messageStatuses = $this->MessageBords->MessageStatuses->find('list', ['limit' => 200]);
        $messageDestinations = $messageBord->message_destinations;
        $messageChoices = $messageBord->message_choices;

        $privateUser = $this->MessageBords->get($id, [
            'contain' => ['PrivateMessages.Users']
        ]);

        //各班ごとでユーザ取得
        //private用
        $privateSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $privateKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 7],["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);


        //private用
        foreach($privateUser->private_messages as $user)
        {
            if($user->user->belongs_id == 1)
            {
                $privateSoukatu->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 2)
            {
                $privateKenkyo->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 3)
            {
                $privateSystem->where(["users_id !=" => $user->users_id]);
            }
            elseif($user->user->belongs_id == 4)
            {
                $privateKintai->where(["users_id !=" => $user->users_id]);
            }
        }

        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => 7]);


        $this->set(compact(
            'messageBord', 
            'messageStatuses', 
            "users", 
            "allUser", 
            "messageChoices", 
            "privateSoukatu", 
            "privateKenkyo", 
            "privateSystem", 
            "privateKintai", 
            "privateUser"
        ));

    }

    /**
     * Delete method
     *
     * @param string|null $id Message Bord id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $messageBord = $this->MessageBords->get($id,[
            "contain" => ["MessageFiles", "Users"]
        ]);
        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord)){
            if ($this->MessageBords->delete($messageBord)) {
                //ファイルあれば
                if(!empty($messageBord->message_files)){
                    foreach($messageBord->message_files as $file){
                        $uniqueFileNames[] = $file->unique_file_name;
                    }
                    $this->FileDelete = $this->loadComponent("FileDelete");
                    //ディレクトリ内のファイルを削除
                    $this->FileDelete->deleteFiles($uniqueFileNames);
                }
                $this->Flash->success(__('The message bord has been deleted.'));
            } else {
                $this->Flash->error(__('The message bord could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('権限がありません'));
            return $this->redirect($this->referer());
        }
    }

    public function choiceSave($data = null, $id = null)
    {
        $this->loadModels(["MessageChoices"]);
        //choiceのentity作成
        foreach($data as $content){
            $choiceEntity[] = [
                "message_bords_id" => $id,
                "content" => $content
            ];
        }
        $messageChoice = $this->MessageChoices->newEntities($choiceEntity);
        if($this->MessageChoices->saveMany($messageChoice)){
            return true;
        }
        return false;
    }

    public function destinationSave($data = null, $id = null)
    {
        $this->loadModels(["MessageDestinations"]);
        foreach($data as $user){
            $destinationEntity[] = [
                "message_bords_id" => $id,
                "users_id" => $user
            ];
        }
        $messageDestination = $this->MessageDestinations->newEntities($destinationEntity);
        if($this->MessageDestinations->saveMany($messageDestination)){
            return true;
        }
        return false;
    }

    public function privateSave($data = null, $id = null, $loginUser = null, $isAdd = null)
    {
        $this->loadModels(["PrivateMessages", "Users"]);
        if($data != null)
        {
            foreach($data as $user){
                $privateEntity[] = [
                    "message_bords_id" => $id,
                    "users_id" => $user
                ];
            }
        }
        //addのみログインユーザも追加
        if($isAdd)
        {
            $privateEntity[] = [
                "message_bords_id" => $id,
                "users_id" => $loginUser
            ];
        }

        $normalUsers = $this->Users->find('list', ['limit' => 200])
            ->where(["delete_flag" => 0])
            ->order(["user_sort_number" => "asc"]);


        $privateMessages = $this->PrivateMessages->newEntities($privateEntity);
        if($this->PrivateMessages->saveMany($privateMessages)){
            return true;
        }
        return false;
    }

    public function privateAllUserSave($allUser = null, $id = null)
    {
        $this->loadModels(["PrivateMessages"]);
        /*
        $this->log("---privateAllUserSave---", LOG_DEBUG);
        $this->log("---allUser---", LOG_DEBUG);
        $this->log($allUser, LOG_DEBUG);
        $this->log("---id---", LOG_DEBUG);
        $this->log($id, LOG_DEBUG);
         */
        $privateEntity = [
            "message_bords_id" => $id,
            "users_id" => $allUser
        ];
        /*
        $this->log("---privateEntity---", LOG_DEBUG);
        $this->log($privateEntity, LOG_DEBUG);
         */
        /*
        foreach($data as $user){
            $privateEntity[] = [
                "message_bords_id" => $id,
                "users_id" => $user
            ];
        }
         */
        $privateMessages = $this->PrivateMessages->newEntity();
        /*
        $this->log("---newEntity privateMessages---", LOG_DEBUG);
        $this->log($privateMessages, LOG_DEBUG);
         */
        $privateMessages = $this->PrivateMessages->patchEntity($privateMessages, $privateEntity);
        /*
        $this->log("---patchEntity privateMessages---", LOG_DEBUG);
        $this->log($privateMessages, LOG_DEBUG);
         */
        if($this->PrivateMessages->save($privateMessages))
        {
           // $this->log("---save true---", LOG_DEBUG);
            return true;
        }
        //$this->log("---save false---", LOG_DEBUG);
        return false;
    }

    public function userEntityEdit($data, $groupType, $type, $loginUser, $isAdd, $id)
    {
        $groups = [
            "soukatu{$groupType}",
            "kenkyo{$groupType}",
            "system{$groupType}",
            "kintai{$groupType}"
        ];
        $users = null;
        foreach($groups as $group)
        {
            $this->log($group, LOG_DEBUG);
            $this->log("---data[group]---", LOG_DEBUG);
            $this->log($data[$group], LOG_DEBUG);
            if(!empty($data[$group][0]))
            {
                foreach($data[$group] as $user)
                {
                    $this->log("---foreach data[group] as user---", LOG_DEBUG);
                    $this->log($user, LOG_DEBUG);
                    $users[] = $user;
                }
            }
        }
        $this->log("---追加する private user---", LOG_DEBUG);
        $this->log($user, LOG_DEBUG);
        if($users != null)
        {
            $type = "{$type}Save";
            $this->$type($users, $id, $loginUser, $isAdd);
        }
    }
}
