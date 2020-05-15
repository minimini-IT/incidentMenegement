<?php
    $this->assign("title", "メッセージボード"); 
    $sideberClass = "list-group-item list-group-item-action list-group-item-info";
?>
<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-2">
-->
            <nav>
                <div class="list-group">
                    <?= $this->Html->link(__('新規作成'), ['action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('新規作成（クロノロ）'), ['action' => 'chronoloAdd'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'MessageStatuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
                <p style="color: red;">ステータス「完了」をデフォルトで非表示にしました</p>
                <p style="color: red;">ステータス「完了」へのコメントはできないようにしました</p>
                <p style="color: red;">コメントする場合にはステータスを変えてください</p>
                <p style="color: red;">検索機能を追加しました</p>
                <p style="color: red;">なにも入力せず検索すると全検索になります</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('メッセージボード') ?></h3>

            <h5 class="my-4 branch text-info"><?= __('検索') ?></h5>
            <div class="node">
                <?= $this->Form->create("", [
                    "type" => "get",
                    "url" => [
                        "controller" => "message_bords",
                        "action" => "index"
                    ]
                ]) ?> 
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?= str_replace(";", " ", $this->Form->control('users_id', ["label" => "作成者", "class" => "form-control", "options" => $users, "empty" => true])) ?>
                        </div>
                        <div class="col-md-5">
                            <?= $this->Form->control('title', ["label" => "タイトル", "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <p class="my-0" style="color: red;">入力する場合は１と２の両方入力してください</p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?= $this->Form->control('period_start', ["label" => "期限１", "class" => "datepicker form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('period_end', ["label" => "期限２", "class" => "datepicker form-control"]) ?>
                        </div>
                        <div class="col-md-2">
                            <label>クロノロジー</label>
                            <?= $this->Form->select("chronology_flag", ["no", "yes"], ["class" => "form-control", "empty" => true]) ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <p class="my-0" style="color: red;">入力する場合は１と２の両方入力してください</p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?= $this->Form->control('created_start', ["label" => "作成日１", "class" => "datepicker form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('created_end', ["label" => "作成日２", "class" => "datepicker form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('message_statuses_id', ["label" => "ステータス", "class" => "form-control", "options" => $message_statuses, "empty" => true]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <p class="my-0" style="color: red;">複数の要素を入れる場合はスペース（全角）をあけてください</p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-8">
                            <?= $this->Form->control('message', ["label" => "メッセージ", "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-11">
                            <?= $this->Form->button('検索', ["class" => "btn btn-info mt-4 float-right"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                <?= $this->Form->end() ?>

                <!-- 検索初期化 -->
                <?= $this->Form->create("", [
                    "type" => "post",
                    "url" => [
                        "controller" => "message_bords",
                        "action" => "index"
                    ]
                ]) ?> 
                    <div class="row mt-4">
                        <div class="col-md-11">
                            <?= $this->Form->button('検索初期化', ["class" => "btn btn-info float-right"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                <?= $this->Form->end() ?>
            </div>


            <div class="row border-bottom">
                <div class="col-md-2 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("インシデントID") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("作成者") ?></p></div>
                <div class="col-md-4 border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("タイトル") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("ステータス") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("期限") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("作成日時") ?></p></div>
                <div class="col-md-1 text-center border-top-0 px-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __('編集・削除') ?></p></div>
            </div>
            <?php $i = 0 ?>
            <?php foreach ($messageBords as $messageBord): ?>
                <div class="branch border-bottom row">
                    <div class="col-md-2 text-left border-top-0 align-self-center"><p class="incidentManagementsId" name="incidentId[<?= $i ?>]"><?= 
                        h($messageBord->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                        $messageBord->message_bord->incident_management->created->format("Ymd") . "-" .  
                        h($messageBord->message_bord->incident_management->number)
                    ?></p></div>
                    <div class="col-md-2 text-center border-top-0 align-self-center"><p><?= h($messageBord->message_bord->user->first_name . $messageBord->message_bord->user->last_name) ?></p></div>
                    <div class="col-md-4 border-top-0 align-self-center"><p><?= h($messageBord->message_bord->title) ?></p></div>
                    <div class="col-md-1 text-center border-top-0 px-0 align-self-center"><p><?= $messageBord->message_bord->message_status->status ?></p></div>
                    <div class="col-md-1 text-center border-top-0 align-self-center"><p><?= h($messageBord->message_bord->period) ?></p></div>
                    <div class="col-md-1 text-center border-top-0 align-self-center"><p><?= h($messageBord->message_bord->created->format("Y/m/d")) ?></p></div>
                    <div class="col-md-1 text-center border-top-0">
                        <div class="my-3 align-self-center">
                            <!-- chronoloならchronoloEditへ -->
                            <?php if($messageBord->message_bord->chronology_flag): ?>
                                <span><?= $this->Html->link(__('編集'), ['action' => 'chronoloEdit', $messageBord->message_bord->message_bords_id]) ?></span>
                            <?php else: ?>
                                <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $messageBord->message_bord->message_bords_id]) ?></span>
                            <?php endif ?>
                            <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $messageBord->message_bord->message_bords_id], ['confirm' => __('{0} を削除してよろしいですか？', $messageBord->title)]) ?></span>
                        </div>
                    </div>
                </div>
                <div class="node px-4 border-bottom">
                    <div class="row">
                        <div class="col-md-9 pl-4">
                            <div class="border-bottom"><?= $this->Text->autoparagraph($messageBord->message_bord->message) ?></div>
                        </div>
                        <!--ファイル-->
                        <div class="col-md-3 pr-0">
                            <div>
                                <?php foreach($messageBord->message_bord->message_files as $file): ?>
                                    <div class="row border-bottom border-info">
                                        <div class="col-md-10">
                                            <p><?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'bordFileDownload', $file->message_files_id]) ?></p>
                                        </div>
                                        <div class="col-md-2 pl-0">
                                            <p><?= $this->Form->postLink(__('削除'), ["controller" => "MessageFiles", 'action' => 'delete', $file->message_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <?php if($messageBord->message_bord->chronology_flag == false): ?>
                        <div class="row mt-4">
                            <div class="col-md-1 text-center align-self-center">
                                <h6>回答</h6>
                                <span><?= $this->Html->link(__('閲覧権限'), ['action' => 'privateView', $messageBord->message_bord->message_bords_id]) ?></span>
                                <?php if($messageBord->message_bord->chronology_flag === false): ?>
                                    <span><?= $this->Html->link(__('宛先削除'), ['action' => 'destinationView', $messageBord->message_bord->message_bords_id]) ?></span>
                                <?php endif ?>
                            </div>
                            <div class="col-md-11">
                                <div class="row border-bottom border-info align-items-center">
                                    <div class="col-md-2 border-top-0 text-info"><p class="tableHeader">ユーザ名</p></div>
                                    <div class="col-md-3 border-top-0 text-center text-info"><p class="tableHeader">選択肢</p></div>
                                    <div class="col-md-4 border-top-0 text-info"><p class="tableHeader">メッセージ</p></div>
                                    <div class="col-md-2 border-top-0 text-center text-info"><p class="tableHeader">更新日</p></div>
                                    <div class="col-md-1 border-top-0 text-right text-info"><p class="tableHeader">編集</p></div>
                                </div>
                                <?php $user = [] ?>
                                <?php foreach($messageBord->message_bord->message_destinations as $destination): ?>




                                <!-- userのソート考える -->




                                    <?php if(null == $destination->message_answer): ?>
                                        <?php $user[$destination->message_destinations_id] = $destination->user->first_name . $destination->user->last_name ?>
                                    <?php endif ?>
                                    <div class="row">
                                        <div class="col-md-2 border-top-0 border-bottom">
                                            <p><?= $destination->user->first_name . $destination->user->last_name ?></p>
                                        </div>
                                        <?php if(null !== $destination->message_answer): ?>
                                            <div class="col-md-3 border-top-0 text-center border-bottom"><p><?= $destination->message_answer->message_choice->content ?></p></div>
                                            <div class="col-md-4 border-top-0 border-bottom align-items-center"><?= $this->Text->autoparagraph($destination->message_answer->message) ?></div>
                                            <div class="col-md-2 border-top-0 text-center border-bottom"><p><?= $destination->message_answer->modified->format("Y/m/d") ?></p></div>
                                            <div class="col-md-1 border-top-0 text-right border-bottom"><div class="my-3"><span><?= $this->Html->link(__('編集'), ["controller" => "message_answers", 'action' => 'edit', $destination->message_answer->message_answers_id]) ?></span></div></div>
                                        <?php else: ?>
                                            <div class="col-md-3 border-top-0 border-bottom"></div>
                                            <div class="col-md-4 border-top-0 border-bottom"></div>
                                            <div class="col-md-2 border-top-0 border-bottom"></div>
                                            <div class="col-md-1 border-top-0 border-bottom"></div>
                                        <?php endif ?>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <!--<h5>選択肢</h5>-->
                        <?php 
                            //回答数
                            $counts = [];
                            foreach($messageBord->message_bord->message_destinations as $destination){
                                if(null !== $destination->message_answer){
                                    $counts[] =  $destination->message_answer->message_choices_id;
                                }else{
                                    $counts[] = 0;
                                }
                            }
                            $count = array_count_values($counts);
                        ?>
                        <div class="row mt-4">
                            <div class="col-md-1 text-center align-self-center"><h6>選択肢</h6></div>
                            <div class="col-md-11">

                                <div>
                                    <div class="row border-bottom border-info">
                                        <div class="col-md-4 border-top-0 text-info"><p class="tableHeader">選択肢</p></div>
                                        <div class="col-md-2 border-top-0 text-center text-info"><p class="tableHeader">回答数</p></div>
                                        <div class="col-md-4 border-top-0"></div>
                                        <div class="col-md-2 border-top-0 text-right pr-0 text-info"><p class="tableHeader">編集・削除</p></div>
                                    </div>
                                    <?php $choices = []; ?>
                                    <?php $choiceCount = count($messageBord->message_bord->message_choices) ?>
                                    <?php foreach($messageBord->message_bord->message_choices as $choice): ?>
                                        <?php $choices[$choice->message_choices_id] = $choice->content ?>
                                        <div class="row">
                                            <?php if(array_key_exists($choice->message_choices_id, $count)): ?>
                                                <div class="col-md-4 border-top-0 border-bottom"><p><?= h($choice->content) ?></p></div>
                                                <div class="col-md-2 border-top-0 text-center border-bottom"><p><?= h($count[$choice->message_choices_id]) ?></p></div>
                                                <div class="col-md-4 border-top-0 border-bottom"></div>
                                                <div class="col-md-2 border-top-0 border-bottom text-right pr-0">
                                                    <div class="my-3">
                                                        <span><?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?></span>
                                                        <?php if($choiceCount != 1): ?>
                                                            <span><?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('{0} この選択肢を削除してよろしいですか？', $choice->content)]) ?></span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="col-md-4 border-top-0 border-bottom"><p><?= h($choice->content) ?></p></div>
                                                <div class="col-md-2 border-top-0 text-center border-bottom"><p><?= 0 ?></p></div>
                                                <div class="col-md-4 border-top-0 border-bottom"></div>
                                                <div class="col-md-2 border-top-0 border-bottom text-right pr-0">
                                                    <div class="my-3">
                                                        <span><?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?></span>
                                                        <?php if($choiceCount != 1): ?>
                                                            <span><?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('この選択肢を削除しますか？ # {0}', $choice->content)]) ?></span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                        <?php
                            $flag = false; 
                            foreach($messageBord->message_bord->message_destinations as $destination){
                                if(null === $destination->message_answer)
                                {
                                    $flag = true; 
                                    break;
                                }
                            } 
                        ?>
                        <?php if($flag): ?>
                            <div class="mb-4">
                                <?php if($messageBord->message_bord->message_statuses_id != 2): ?>
                                    <?php
                                        echo $this->Form->create($messageAnswers, [
                                            "url" => [
                                              "controller" => "message_answers",
                                              "action" => "add"
                                            ],
                                            "class" => "my-4",
                                        ]); 
                                        echo "<fieldset>";
                                        echo "<div class='row mb-4'><div class='col-md-1'></div><div class='col-md-4'>";
                                        echo $this->Form->control('message_destinations_id', ["type" => "select", "options" => $user, "label" => "ユーザ", "class" => "form-control"]); 
                                        echo "</div><div class='col-md-6 form-check'>";
                                        //echo $this->Form->control('message_choices_id', ["type" => "radio", "options" => $choices, "label" => ["text" => "選択肢", "class" => "form-check-label"], "class" => "form-check-input"]);
                                        //echo $this->Form->radio('message_choices_id', ["options" => $choices, "label" => "選択肢", "class" => "form-check-input"]);
                                        echo "<label>選択肢</label>";
                                        echo $this->Form->input('message_choices_id', [
                                            "type" => "radio", 
                                            "options" => $choices, 
                                            "label" => false, 
                                            "class" => "form-check-input",
                                            "templates" => [
                                                "nestingLabel" => "<div class='form-check'>{{input}}<label class='form-check-lebel'>{{text}}</label></div>"
                                            ]
                                        ]);
                                        echo "</div><div class='col-md-1'></div></div>";
                                        echo $this->Form->control('message', ["label" => "メッセージ", "type" => "textarea", "class" => "form-control"]);
                                        echo $this->Form->button('送信', ["class" => "btn btn-info mt-4 float-right"]);
                                        echo "</fieldset>";
                                        echo $this->Form->end();
                                    ?>
                                <?php endif ?>
                            </div>
                        <?php endif ?>
                    <?php elseif($messageBord->message_bord->chronology_flag == true): ?>
                        <?php foreach($messageBord->message_bord->message_bord_chronologies as $chronology): ?>
                            <div class="mt-4 border-bottom border-info">
                                <div class="row">
                                    <div class="col-md-4 pl-0 border-top-0 text-info"><p class="tableHeader"><?= h($chronology->user->first_name . $chronology->user->last_name) ?></p></div>
                                    <div class="col-md-3 border-top-0 text-info"><p class="tableHeader"><?= h($chronology->created) ?></p></div>
                                    <div class="col-md-3 border-top-0"></div>
                                    <div class="col-md-2 border-top-0 text-right pr-0">
                                        <div class="my-3">
                                            <span><?= $this->Html->link(__('編集'), ["controller" => "MessageBordChronologies", 'action' => 'edit', $chronology->message_bord_chronologies_id]) ?></span>
                                            <span><?= $this->Form->postLink(__('削除'), ["controller" => "MessageBordChronologies", 'action' => 'delete', $chronology->message_bord_chronologies_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chronology->message_bord_chronologies_id)]) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 pl-4">
                                    <div class="border-bottom">
                                        <?= $this->Text->autoparagraph($chronology->message) ?>
                                    </div>
                                </div>

                                <div class="col-md-3 border-bottom pr-0">
                                    <?php foreach($chronology->message_chronology_files as $file): ?>
                                            <div class="border-bottom border-info row">
                                                <div class="col-md-10">
                                                    <p class="mt-2"><?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'bordChronologyFileDownload', $file->message_chronology_files_id]) ?></p>
                                                </div>
                                                <div class="col-md-2 pl-0">
                                                    <span><?= $this->Form->postLink(__('削除'), ["controller" => "CommentFiles", 'action' => 'delete', $file->comment_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?></span>
                                                </div>
                                            </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- 終了したステータスでは表示しない -->
                        <?php if($messageBord->message_bord->message_statuses_id != 2): ?>
                            <?php
                                echo $this->Form->create($messageBordChronologies, [
                                    "url" => [
                                      "controller" => "message_bord_chronologies",
                                      "action" => "add"
                                    ],
                                    "class" => "mb-5",
                                    "type" => "file"
                                ]); 
                                echo "<div class='row'><div class='col mt-4'>";
                                echo $this->Form->control('message_bords_id', ["type" => "hidden", "value" => $messageBord->message_bord->message_bords_id]); 
                                echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users, "label" => "ユーザ", "value" => $loginUser, "class" => "form-control"]));
                                echo "</div><div class='col'></div><div class='col'></div></div>";
                                echo "<div class='mt-4'>";
                                echo $this->Form->control('message', ["label" => "メッセージ", "type" => "textarea", "class" => "form-control"]);
                                echo "</div>";
                                //filesへの入力
                                echo "<div class='row'><div class='col-md-8 mt-4'>";
                                echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                                echo "</div><div class='col-md-4'>";
                                echo $this->Form->button('送信', ["class" => "btn btn-info mt-4 float-right"]);
                                echo "</div></div>";
                                echo $this->Form->end();
                            ?>
                        <?php endif ?>
                    <?php endif ?>
                </div>
                <?php $i++ ?>
            <?php endforeach ?>
        </div>
    </div>
    <div class="paginator mx-auto">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
