<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-2">
-->
<?php
$sideberClass = "list-group-item list-group-item-action list-group-item-info";
?>
            <nav>
                <div class="list-group">
                    <?= $this->Html->link(__('新規作成'), ['action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('新規作成（クロノロ）'), ['action' => 'chronoloAdd'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
                <p>任意のユーザに対してメッセージを作成できる</p>
                <p>用途としては主にアンケート形式での隊務を想定</p>
                <p>行を選択して詳細を表示できる</p>
                <p>メッセージにファイルを添付できる</p>
                <p>メッセージの返事は選択肢の選択は必須、コメントはなくても可</p>
                <p>選択肢は一つのみ選択可</p>
                <p style="color:red;">選択肢なしでメッセージボードを作成すると、メッセージボード作成後の、選択したユーザがメッセージボードに対してのコメントできなくなる</p>
                <p style="color:red;">公開区分作成中</p>
                <p style="color:red;">ファイルアップロードサイズ上限->200M</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('メッセージボード') ?></h3>
            <table class="table mb-0">
                <thead>
                    <tr class="row">
                        <th class="col-md-2 col-lg-2 text-center border-top-0"><?= __("インシデントID") ?></th>
                        <th class="col-md-4 col-lg-2 text-center border-top-0"><?= __("作成者") ?></th>
                        <th class="col-md-1 col-lg-4 text-center border-top-0"><?= __("タイトル") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("ステータス")  ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("期限") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("作成日時") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __('編集・削除') ?></th>
                    </tr>
                </thead>
            </table>
            <?php $c = 0 ?>
            <?php foreach ($messageBords as $messageBord): ?>
                <table class="branch border-bottom table">
                    <tbody>
                        <tr class="row">
                            <td class="col-md-2 text-left border-top-0 align-self-center"><?= 
                                h($messageBord->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                $messageBord->message_bord->incident_management->created->format("Ymd") . "-" .  
                                h($messageBord->message_bord->incident_management->number)
                            ?></td>
                            <td class="col-md-2 text-center border-top-0 align-self-center"><?= h($messageBord->message_bord->user->first_name . $messageBord->message_bord->user->last_name) ?></td>
                            <td class="col-md-4 text-center border-top-0 align-self-center"><?= h($messageBord->message_bord->title) ?></td>
                            <td class="col-md-1 text-center border-top-0 align-self-center"><?= $messageBord->message_bord->message_status->status ?></td>
                            <td class="col-md-1 text-center border-top-0 align-self-center"><?= h($messageBord->message_bord->period) ?></td>
                            <td class="col-md-1 text-center border-top-0 align-self-center"><?= h($messageBord->message_bord->modified->format("Y/m/d")) ?></td>
                            <td class="col-md-1 text-center border-top-0 list-group">
                                <?= $this->Html->link(__('閲覧権限'), ['action' => 'privateView', $messageBord->message_bord->message_bords_id]) ?>
                                <?php if($messageBord->message_bord->chronology_flag === false): ?>
                                    <?= $this->Html->link(__('宛先削除'), ['action' => 'destinationView', $messageBord->message_bord->message_bords_id]) ?>
                                <?php endif ?>
                                <!-- chronoloならchronoloEditへ -->
                                <?php if($messageBord->message_bord->chronology_flag): ?>
                                    <?= $this->Html->link(__('編集'), ['action' => 'chronoloEdit', $messageBord->message_bord->message_bords_id]) ?>
                                <?php else: ?>
                                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $messageBord->message_bord->message_bords_id]) ?>
                                <?php endif ?>

                                <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $messageBord->message_bord->message_bords_id], ['confirm' => __('{0} を削除してよろしいですか？', $messageBord->title)]) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <div class="node px-4">
                    <div class="row">
                        <div class="col-md-9 pl-4">
                            <div class="border-bottom"><?= $this->Text->autoparagraph($messageBord->message_bord->message) ?></div>
                        </div>

                        <!--ファイル-->
                        <div class="col-md-3 pr-0">
                            <table class="table">
                                <?php foreach($messageBord->message_bord->message_files as $file): ?>
                                    <tr class="border-bottom border-info row">
                                        <td class="border-top-0 col-md-10">
                                            <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'bordFileDownload', $file->message_files_id]) ?>
                                        </td>
                                        <td class="border-top-0 col-md-2 pl-0">
                                            <?= $this->Form->postLink(__('削除'), ["controller" => "MessageFiles", 'action' => 'delete', $file->message_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                    <?php if($messageBord->message_bord->chronology_flag == false): ?>
                        <div class="row mt-4">
                            <div class="col-md-1 text-center align-self-center"><h6>回答</h6></div>
                            <div class="col-md-11">
                                <table class="table">
                                    <tr class="row border-bottom border-info">
                                        <th class="col-md-2 border-top-0 text-info">ユーザ名</th>
                                        <th class="col-md-3 border-top-0 text-center text-info">選択肢</th>
                                        <th class="col-md-4 border-top-0 text-center text-info">メッセージ</th>
                                        <th class="col-md-2 border-top-0 text-center text-info">更新日</th>
                                        <th class="col-md-1 border-top-0 text-right text-info">編集</th>
                                    </tr>
                                    <?php $user = [] ?>
                                    <?php foreach($messageBord->message_bord->message_destinations as $destination): ?>
                                        <?php if(null == $destination->message_answer): ?>
                                            <?php $user[$destination->message_destinations_id] = $destination->user->first_name . $destination->user->last_name ?>
                                        <?php endif ?>
                                        <tr class="row">
                                            <td class="col-md-2 border-top-0 border-bottom"><?= $destination->user->first_name . $destination->user->last_name ?></td>
                                            <?php if(null !== $destination->message_answer): ?>
                                                <td class="col-md-3 border-top-0 text-center border-bottom"><?= $destination->message_answer->message_choice->content ?></td>



                                                <td class="col-md-4 border-top-0 text-center border-bottom"><?= $this->Text->autoparagraph($destination->message_answer->message) ?></td>



                                                <td class="col-md-2 border-top-0 text-center border-bottom"><?= $destination->message_answer->modified->format("Y/m/d") ?></td>
                                                <td class="col-md-1 border-top-0 text-right border-bottom"><?= $this->Html->link(__('編集'), ["controller" => "message_answers", 'action' => 'edit', $destination->message_answer->message_answers_id]) ?></td>
                                            <?php else: ?>
                                                <td class="col-md-3 border-top-0 border-bottom"></td>
                                                <td class="col-md-4 border-top-0 border-bottom"></td>
                                                <td class="col-md-2 border-top-0 border-bottom"></td>
                                                <td class="col-md-1 border-top-0 border-bottom"></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
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
                                <table class="table">
                                    <tr class="row border-bottom border-info">
                                        <th class="col-md-4 border-top-0 text-info">選択肢</th>
                                        <th class="col-md-2 border-top-0 text-center text-info">回答数</th>
                                        <th class="col-md-4 border-top-0"></th>
                                        <th class="col-md-2 border-top-0 text-right pr-0 text-info">編集・削除</th>
                                    </tr>
                                    <?php $choices = []; ?>
                                    <?php $choiceCount = count($messageBord->message_bord->message_choices) ?>
                                    <?php foreach($messageBord->message_bord->message_choices as $choice): ?>
                                        <?php $choices[$choice->message_choices_id] = $choice->content ?>
                                        <tr class="row">
                                            <?php if(array_key_exists($choice->message_choices_id, $count)): ?>
                                                <td class="col-md-4 border-top-0 border-bottom"><?= h($choice->content) ?></td>
                                                <td class="col-md-2 border-top-0 text-center border-bottom"><?= h($count[$choice->message_choices_id]) ?></td>
                                                <td class="col-md-4 border-top-0 border-bottom"></td>
                                                <td class="col-md-2 border-top-0 border-bottom text-right pr-0">
                                                    <?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?>
                                                    <?php if($choiceCount != 1): ?>
                                                        <?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('{0} この選択肢を削除してよろしいですか？', $choice->content)]) ?>
                                                    <?php endif ?>
                                                </td>
                                            <?php else: ?>
                                                <td class="col-md-4 border-top-0 border-bottom"><?= h($choice->content) ?></td>
                                                <td class="col-md-2 border-top-0 text-center border-bottom"><?= 0 ?></td>
                                                <td class="col-md-4 border-top-0 border-bottom"></td>
                                                <td class="col-md-2 border-top-0 border-bottom text-right pr-0">
                                                    <?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?>
                                                    <?php if($choiceCount != 1): ?>
                                                        <?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('この選択肢を削除しますか？ # {0}', $choice->content)]) ?>
                                                    <?php endif ?>
                                                </td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
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
                            </div>
    
                        <?php endif ?>
                    <?php $c++ ?>
                    <?php elseif($messageBord->message_bord->chronology_flag == true): ?>
                        <?php foreach($messageBord->message_bord->message_bord_chronologies as $chronology): ?>
                            <table class="table mt-4 border-bottom border-info">
                                <tr class="row">
                                    <th class="col-md-4 pl-0 border-top-0 text-info"><?= h($chronology->user->first_name . $chronology->user->last_name) ?></th>
                                    <th class="col-md-3 border-top-0 text-info"><?= h($chronology->created) ?></th>
                                    <td class="col-md-3 border-top-0"></td>
                                    <td class="col-md-2 border-top-0 text-right pr-0">
                                        <?= $this->Html->link(__('編集'), ["controller" => "MessageBordChronologies", 'action' => 'edit', $chronology->message_bord_chronologies_id]) ?>
                                        <?= $this->Form->postLink(__('削除'), ["controller" => "MessageBordChronologies", 'action' => 'delete', $chronology->message_bord_chronologies_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chronology->message_bord_chronologies_id)]) ?>
                                    </td>
                                </tr>
                            </table>
                        <div class="row">
                            <div class="col-md-9 border-bottom pl-4">
                                <?= $this->Text->autoparagraph($chronology->message) ?>
                            </div>

                            <div class="col-md-3 border-bottom pr-0">
                                <?php foreach($chronology->message_chronology_files as $file): ?>
                                    <table>
                                        <tr class="border-bottom border-info">
                                            <td class="col-md-10">
                                                <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'bordChronologyFileDownload', $file->message_chronology_files_id]) ?>
                                            </td>
                                            <!--<td><?= $file->file_size ?></td>-->
                                            <td class="col-md-2 pl-0">
                                                <?= $this->Form->postLink(__('削除'), ["controller" => "CommentFiles", 'action' => 'delete', $file->comment_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                            </td>
                                        </tr>
                                    </table> 
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endforeach ?>
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
                        echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $normalUsers, "label" => "ユーザ", "value" => $loginUser, "class" => "form-control"]));
                        echo "</div><div class='col'></div><div class='col'></div></div>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->control('message', ["label" => "メッセージ", "type" => "textarea", "class" => "form-control"]);
                        echo "</div>";
                        //filesへの入力
                        echo "<div class='row'><div class='col mt-4'>";
                        echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                        echo "</div><div class='col'></div><div class='col'>";
                        echo $this->Form->button('送信', ["class" => "btn btn-info mt-4 float-right"]);
                        echo "</div></div>";
                        echo $this->Form->end();
                    ?>
                    <?php endif ?>
                </div>
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
