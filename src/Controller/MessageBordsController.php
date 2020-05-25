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
    public function index($id = null)
    {
        $this->loadModels(["MessageAnswers", "MessageBordChronologies", "Users", "PrivateMessages", "MessageStatuses"]);
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");

        //検索結果用
        $data = $this->request->query();
        if($this->request->is("get"))
        {
            if(!empty($data))
            {
                //page or 検索時
                //pageのみは検索処理しない
                if(count($data) > 1)
                {
                    $between = null;
                    if($data["period_start"] != "" && $data["period_end"] != "")
                    {
                        $periodSearchStartDay = $data["period_start"];
                        $periodSearchEndDay = $data["period_end"];
                        //betweenはfindより先に定義する必要がある
                        $between = ["conditions" => ["MessageBords.period between '" . $periodSearchStartDay . "' and '" . $periodSearchEndDay . "'"]];
                    }

                    if($data["created_start"] != "" && $data["created_end"] != "")
                    {
                        $createdSearchStartDay = $data['created_start'];
                        $createdSearchEndDay = $data['created_end'];
                        if($between === null)
                        {
                            $between = ["conditions" => ["MessageBords.created between '" . $createdSearchStartDay . "' and '" . $createdSearchEndDay . "'"]];
                        }
                        else
                        {
                            array_push($between["conditions"], "MessageBords.created between '" . $createdSearchStartDay . "' and '" . $createdSearchEndDay . "'");
                        }
                    }

                    if($between === null)
                    {
                        $messageBords = $this->MessageBords->PrivateMessages->find("all")
                            ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]]);
                    }
                    else
                    {
                        $messageBords = $this->MessageBords->PrivateMessages->find("all", $between)
                            ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]]);
                    }
                    foreach($data as $key => $value)
                    {
                        if($value != "")
                        {
                            if($key == "title")
                            {
                                $messageBords = $messageBords->where(["MessageBords.{$key} like" => "%{$value}%"]);
                            }
                            else if($key == "message")
                            {
                                $value = explode("　", $value);
                                foreach($value as $val)
                                {
                                    $messageBords = $messageBords->where(["MessageBords.{$key} like" => "%{$val}%"]);
                                }
                            }
                            else if($key == "period_start" || $key == "period_end" || $key == "created_start" || $key == "created_end" || $key == "page")
                            {
                                //何もしない
                            }
                            else
                            {
                                $messageBords = $messageBords->where(["MessageBords." . $key => (int)$value]);
                            }
                        }
                    }
                }
                else
                {
                    $messageBords = $this->MessageBords->PrivateMessages->find("all")
                        ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
                        ->where(["MessageBords.message_statuses_id !=" => 2]);
                }
            }
            elseif($id != null)
            {
                $this->log("このログ見えてるはず", LOG_DEBUG);
                //インシデントIDから検索かけた時
                $messageBords = $this->MessageBords->PrivateMessages->find("all")
                    ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
                    ->where(["MessageBords.message_bords_id" => $id]);
            }
            else
            {
                $messageBords = $this->MessageBords->PrivateMessages->find("all")
                    ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
                    ->where(["MessageBords.message_statuses_id !=" => 2]);
            }
        }
        else
        {
            $messageBords = $this->MessageBords->PrivateMessages->find("all")
                ->where(["OR" => [["PrivateMessages.users_id" => $loginUser], ["PrivateMessages.users_id" => 45]]])
                ->where(["MessageBords.message_statuses_id !=" => 2]);
        }




        $messageAnswers = $this->MessageAnswers->newEntity();
        $messageBordChronologies = $this->MessageBordChronologies->newEntity();

        $this->paginate = [
            'contain' => [
              "MessageBords.Users",
              "MessageBords.IncidentManagements.ManagementPrefixes",
              'MessageBords.MessageStatuses', 
              "MessageBords.MessageDestinations.Users" => [
                    "sort" => ["MessageDestinations.Users.user_sort_number" => "asc"]
              ], 
              //"MessageBords.MessageDestinations.Users",
              "MessageBords.MessageDestinations.MessageAnswers.MessageChoices", 
              "MessageBords.MessageChoices", 
              "MessageBords.MessageBordChronologies.Users",
              "MessageBords.MessageBordChronologies.MessageChronologyFiles",
              "Users", 
              "MessageBords.MessageFiles"
            ],
            "order" => ["message_bords_id" => "desc"],
            "maxLimit" => 5
          ];

        $messageBords = $this->paginate($messageBords);
        $users = $this->Users->find('list', ['limit' => 200])
            ->where(["delete_flag" => 1])
            ->where(["delete_flag" => 45])
            ->where(["delete_flag" => 0])
            ->order(["user_sort_number" => "asc"]);
        $users = $this->Users->find('list', ['limit' => 200])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["delete_flag" => 0])
            ->order(["user_sort_number" => "asc"]);
        $message_statuses = $this->MessageStatuses->find("list", ["limit" => 200]);
        $this->set(compact('messageBords', "messageAnswers", "messageBordChronologies", "users", "loginUser", "message_statuses"));
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

        $this->set(compact('messageBords'));
    }

    public function choiceView($id = null)
    {
        $messageBords = $this->MessageBords->get($id, [
            'contain' => ['MessageChoices']
        ]);

        $this->set(compact('messageBords', "addUser"));
    }

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
            //メッセージボードのprefixはtubakiなのでincident_numberの引数は１
            if(is_int($incidentNumber = $this->IncidentManagement->incident_number(1)))
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
                    }
                    else
                    {
                        //$this->log("作成者のみ閲覧可", LOG_DEBUG);
                        $privateMessage = $this->PrivateMessages->newEntity();
                        $privateEntity = [
                            "message_bords_id" => $bordId,
                            "users_id" => $loginUser
                        ];
                        //$this->log("---privateMessage---", LOG_DEBUG);
                        //$this->log($privateMessage, LOG_DEBUG);
                        //$this->log("---privateEntity---", LOG_DEBUG);
                        //$this->log($privateEntity, LOG_DEBUG);
                        $privateMessage = $this->PrivateMessages->patchEntity($privateMessage, $privateEntity);
                        if ($this->PrivateMessages->save($privateMessage)) 
                        {
                            //$this->log("プライベートユーザにログイン中のユーザを登録", LOG_DEBUG);
                        }
                        else
                        {
                            //$this->log("プライベートユーザ登録失敗", LOG_DEBUG);
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
                    //$this->log("---destination User なし---", LOG_DEBUG);

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
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $system = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            //->where(["users_id" => 14]);
            ->where(["users_id" => 7]);


        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);

        $createUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => $loginUser]);

        //$this->set(compact('messageBord', 'messageStatuses', "users", "allUser", "soukatu", "kenkyo", "system", "kintai", "createUser"));
        $this->set(compact('messageBord', 'messageStatuses', "allUser", "soukatu", "kenkyo", "system", "kintai", "createUser", "loginUser"));
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
                        //$this->log("private allUser save", LOG_DEBUG);
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
                            //$this->log("---foreach group as private---", LOG_DEBUG);
                            //$this->log($private, LOG_DEBUG);
                            if(!empty($data[$private][0]))
                            {
                                foreach($data[$private] as $prvUser)
                                {
                                    //$this->log("---foreach data[private] as destUser---", LOG_DEBUG);
                                    //$this->log($prvUser, LOG_DEBUG);
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
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $system = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $kintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => 45]);
        $users = $this->Users->find('list', ['limit' => 200])
            ->order(["user_sort_number" => "asc"])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["delete_flag" => 0]);
        $createUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id" => $loginUser]);

        //$this->set(compact('messageBord', 'messageStatuses', "users", "allUser", "soukatu", "kenkyo", "system", "kintai", "createUser"));
        $this->set(compact('messageBord', 'messageStatuses', "allUser", "soukatu", "kenkyo", "system", "kintai", "createUser", "loginUser"));
    }

    public function edit($id = null)
    {
        $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");
        $messageBord = $this->MessageBords->get($id, [
            'contain' => ["MessageChoices", "MessageDestinations", "Users", "PrivateMessages"]
        ]);
        $privateMessagesId = $messageBord->private_messages[0]["private_messages_id"];
        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord)){
            $this->loadModels(["Users", "MessageFiles", "MessageDestinations", "PrivateMessages"]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getdata();
                $this->log("---data---", LOG_DEBUG);
                $this->log($data, LOG_DEBUG);
                $messageBordSave = $this->MessageBords->patchEntity($messageBord, $data);
                if ($this->MessageBords->save($messageBordSave)) {
                    $this->Flash->success(__('The message bord has been saved.'));

                    $allCheck = $this->PrivateMessages->find("list", ["list" => 200])
                        ->select(["users_id"])
                        ->where(["message_bords_id" => $id])
                        //->where(["users_id" => 14]);
                        ->where(["users_id" => 7]);

                    //privateMessage保存
                    if(!empty($data["allUser"][0]))
                    {
                        //allUserがすでに登録されていないことを確認
                        //$this->log("---allCheck sql---", LOG_DEBUG);
                        //$this->log($allCheck, LOG_DEBUG);
                        //$this->log("---allCheck list---", LOG_DEBUG);
                        //$this->log($allCheck->toList(), LOG_DEBUG);
                        //$this->privateAllUserSave($data["allUser"][0], $id);
                        if(empty($allCheck->toArray()))
                        {
                            //パターン　user->all
                            
                            //allUserは登録されていない
                            //すべてのユーザに閲覧許可を与えたら、個々のユーザは削除する
                            //そうしないと重複してメッセージボードが表示される
                            
                            //削除するprivateMessageのmessage_bords_id取得
                            $deletePrivateMessage = $this->PrivateMessages->find("all")
                                ->select(["message_bords_id"])
                                ->where(["message_bords_id" => $id]);
                            $tmp = $deletePrivateMessage->toArray();
                            $deletePrivateMessage = ["message_bords_id" => $tmp[0]["message_bords_id"]];

                            //一括削除
                            if($this->PrivateMessages->deleteAll($deletePrivateMessage))
                            {
                                //削除成功したらallUserを登録
                                $this->privateAllUserSave($data["allUser"][0], $id);
                            }

                        }

                        //パターン　all->all
                        //すでにallUserが登録されていたらなにもしない

                        //editの場合、各ユーザが登録されたあとにallUserを登録するならば、
                        //各ユーザは削除する処理を記述する
                    }
                    else if(!empty($data["soukatuPrv"]) || !empty($data["kenkyoPrv"]) || !empty($data["systemPrv"]) || !empty($data["kintaiPrv"]))
                    {
                        if(!empty($allCheck->toArray()))
                        {
                            //パターン　all->user

                            //allUser登録済みだけど、ユーザを登録しようとしている
                            //allUser削除して、ユーザを登録する

                            $privateMessage = $this->PrivateMessages->get($privateMessagesId);
                            if ($this->PrivateMessages->delete($privateMessage)) 
                            {
                                //allUser削除したら作成者の閲覧権限を登録
                                $entity[] = $messageBord->users_id;
                                $this->privateSave($entity, $id, $loginUser, false);
                            }
                            else
                            {
                                //$this->log("---allUser private message 削除失敗---", LOG_DEBUG);
                            }

                        }
                        //パターン　user->user
                        //パターン　all->user
                        //共通処理
                        $this->userEntityEdit($data, "Prv", "private", $loginUser, false, $id);
                    }
                    else
                    {
                        //$this->log("閲覧権限追加なし", LOG_DEBUG);
                    }

                    //choiceを保存
                    if(!empty($data["content"][0]))
                    {
                        $this->choiceSave($data["content"], $id);
                    }

                    //destination保存
                    if(!empty($data["soukatuDest"]) || !empty($data["kenkyoDest"]) || !empty($data["systemDest"]) || !empty($data["kintaiDest"]))
                    {
                        //登録ユーザあり
                        $entity[] = $messageBord->users_id;
                        $this->userEntityEdit($data, "Dest", "destination", $loginUser, false, $id);
                    }
                    else
                    {
                        //$this->log("宛先追加なし", LOG_DEBUG);
                    }
                    /*
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
                     */

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"])){
                      $this->Fileupload = $this->loadComponent("Fileupload");
                      $entity = $this->Fileupload->default_upload($data["file"], $id, "message_bords");
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

        //作成者非表示用
        $entity = $messageBord->users_id;

        //各班ごとでユーザ取得
        //private用
        $privateSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $entity])
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


        $destinationUser = $this->MessageBords->get($id, [
            'contain' => ['MessageDestinations.Users']
        ]);

        //各班ごとでユーザ取得
        //destination用
        $destinationSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
            ->where(["delete_flag" => 0]);
        $destinationKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["users_id !=" => $loginUser])
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
            //->where(["users_id !=" => 14])
            ->where(["users_id !=" => 7])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            //->where(["users_id" => 14]);
            ->where(["users_id" => 7]);

        $createUser = $messageBord->users_id;



        $this->set(compact(
            'messageBord', 
            'messageStatuses', 
            "users", 
            "createUser", 
            "allUser", 
            "loginUser",
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
        $privateMessagesId = $messageBord->private_messages[0]["private_messages_id"];
        //認証
        $this->Authority = $this->loadComponent("Authority");
        if($this->Authority->authorityCheck($messageBord)){
            $this->loadModels(["Users", "MessageFiles", "PrivateMessages"]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getdata();
                //$this->log("---data---", LOG_DEBUG);
                //$this->log($data, LOG_DEBUG);
                $messageBord = $this->MessageBords->patchEntity($messageBord, $data);
                //$this->log("---patchEntity messageBord---", LOG_DEBUG);
                //$this->log($messageBord, LOG_DEBUG);
                if ($this->MessageBords->save($messageBord)) {
                    $this->Flash->success(__('The message bord has been saved.'));
                    //$bordId = $messageBord->message_bords_id;

                    //privateMessage保存
                    //allUserが登録されているか確認
                    $allCheck = $this->PrivateMessages->find("list", ["list" => 200])
                        ->select(["users_id"])
                        ->where(["message_bords_id" => $id])
                        //->where(["users_id" => 14]);
                        ->where(["users_id" => 7]);
                    //$this->log("---allCheck->toArray() ---", LOG_DEBUG);
                    //$this->log($allCheck->toArray(), LOG_DEBUG);

                    //$this->log("---empty allUser---" , LOG_DEBUG);
                    //$this->log($data["allUser"], LOG_DEBUG);

                    if(!empty($data["allUser"][0]))
                    {
                        //$this->log("---allUser not empty---" , LOG_DEBUG);
                        if(empty($allCheck->toArray()))
                        {
                            //$this->log("---allUser 登録なし---", LOG_DEBUG);
                            //$this->log("---private user 削除して allUser登録---", LOG_DEBUG);
                            //すべてのユーザに閲覧許可を与えたら、個々のユーザは削除する
                            //そうしないと重複してメッセージボードが表示される
                            $deletePrivateMessage = $this->PrivateMessages->find("all")
                                ->select(["message_bords_id"])
                                ->where(["message_bords_id" => $id]);
                            $tmp = $deletePrivateMessage->toArray();
                            $deletePrivateMessage = ["message_bords_id" => $tmp[0]["message_bords_id"]];
                            //$this->log("---deletePrivateMessage->toArray()[0][message_bords_id]---", LOG_DEBUG);
                            //$this->log($deletePrivateMessage, LOG_DEBUG);
                            if($this->PrivateMessages->deleteAll($deletePrivateMessage))
                            {
                                //$this->log("deleteAll complate. allUser save", LOG_DEBUG);
                                $this->privateAllUserSave($data["allUser"][0], $id);
                            }
                            else
                            {
                                //$this->log("deleteAll error. not allSave", LOG_DEBUG);
                            }

                        }
                        else
                        {
                            //$this->log("---allUserすでに登録あり---", LOG_DEBUG);
                        }
                        
                        //editの場合、各ユーザが登録されたあとにallUserを登録するならば、
                        //各ユーザは削除する処理を記述する
                    }
                    else if(!empty($data["soukatuPrv"]) || !empty($data["kenkyoPrv"]) || !empty($data["systemPrv"]) || !empty($data["kintaiPrv"])) 
                    {
                        if(!empty($allCheck->toArray()))
                        {
                            //$this->log("---allUser登録済みだけど、ユーザを登録しようとしている---", LOG_DEBUG);
                            //$this->log("---allUser削除して、ユーザを登録する---", LOG_DEBUG);
                            //$privateMessagesId = $messageBord->private_messages[0]["private_messages_id"];

                            $privateMessage = $this->PrivateMessages->get($privateMessagesId);
                            if ($this->PrivateMessages->delete($privateMessage)) 
                            {
                                //$this->log("---allUser private message 削除---", LOG_DEBUG);
                                //allUser削除したら作成者の閲覧権限を登録
                                $entity[] = $messageBord->users_id;
                                $this->privateSave($entity, $id, $loginUser, false);
                            }
                            else
                            {
                                //$this->log("---allUser private message 削除失敗---", LOG_DEBUG);
                            }

                        }
                        //$this->log("---ユーザ選択されている---", LOG_DEBUG);
                        $this->userEntityEdit($data, "Prv", "private", $loginUser, false, $id);
                    }

                    //file保存
                    if(!empty($data["file"][0]["tmp_name"])){
                        $this->Fileupload = $this->loadComponent("Fileupload");
                        $entity = $this->Fileupload->default_upload($data["file"], $id, "message_bords");
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

        //作成者非表示用
        $entity = $messageBord->users_id;
        //各班ごとでユーザ取得
        //private用
        $privateSoukatu = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 1])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateKenkyo = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 2])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateSystem = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 3])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $entity])
            ->where(["delete_flag" => 0]);
        $privateKintai = $this->Users->find("list", ["limit" => 200])
            ->where(["belongs_id" => 4])
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["users_id !=" => $entity])
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
            ->where(["users_id !=" => 1])
            ->where(["users_id !=" => 45])
            ->where(["delete_flag" => 0]);

        $allUser = $this->Users->find("list", ["limit" => 200])
            ->where(["users_id !=" => 45]);

        $createUser = $messageBord->users_id;

        $this->set(compact(
            'messageBord', 
            'messageStatuses', 
            "users", 
            "createUser", 
            "allUser", 
            "loginUser",
            "messageChoices", 
            "privateSoukatu", 
            "privateKenkyo", 
            "privateSystem", 
            "privateKintai", 
            "privateUser"
        ));
    }

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
        if($data != null)
        {
            foreach($data as $user){
                $destinationEntity[] = [
                    "message_bords_id" => $id,
                    "users_id" => $user
                ];
            }
        }
        $messageDestination = $this->MessageDestinations->newEntities($destinationEntity);
        if($this->MessageDestinations->saveMany($messageDestination)){
            return true;
        }
        return false;
    }

    public function privateSave($data = null, $id = null, $loginUser = null, $isAdd = null)
    {
        //$this->loadModels(["PrivateMessages", "Users"]);
        $this->loadModels(["PrivateMessages"]);
        if($data != null)
        {
            foreach($data as $user){
                $privateEntity[] = [
                    "message_bords_id" => $id,
                    "users_id" => $user
                ];
            }
        }
        //addのみログインユーザ(作成ユーザも兼ねてる)も追加
        if($isAdd)
        {
            $privateEntity[] = [
                "message_bords_id" => $id,
                "users_id" => $loginUser
            ];
        }


        $privateMessages = $this->PrivateMessages->newEntities($privateEntity);
        if($this->PrivateMessages->saveMany($privateMessages)){
            return true;
        }
        return false;
    }

    public function privateAllUserSave($allUser = null, $id = null)
    {
        $this->loadModels(["PrivateMessages"]);
        $privateEntity = [
            "message_bords_id" => $id,
            "users_id" => $allUser
        ];
        $privateMessages = $this->PrivateMessages->newEntity();
        $privateMessages = $this->PrivateMessages->patchEntity($privateMessages, $privateEntity);
        if($this->PrivateMessages->save($privateMessages))
        {
            return true;
        }
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
            //$this->log($group, LOG_DEBUG);
            //$this->log("---data[group]---", LOG_DEBUG);
            //$this->log($data[$group], LOG_DEBUG);
            if(!empty($data[$group][0]))
            {
                foreach($data[$group] as $user)
                {
                    //$this->log("---foreach data[group] as user---", LOG_DEBUG);
                    //$this->log($user, LOG_DEBUG);
                    $users[] = $user;
                }
            }
        }
        //$this->log("---追加する private user---", LOG_DEBUG);
        //$this->log($user, LOG_DEBUG);
        if($users != null)
        {
            $type = "{$type}Save";
            $this->$type($users, $id, $loginUser, $isAdd);
        }
    }

    /*
    public function duplication($data = null)
    {
        //private destination の重複登録を防ぐ
        //登録データ取得(edit系のみ)
        //POSTデータと比較
            //POSTないですである重複も確認
        $data["soukatu{$type}"]
    }
     */
}
