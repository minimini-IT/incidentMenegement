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
            <table class="table">
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
                            <td class="col-md-2 text-left border-top-0"><?= 
                                h($messageBord->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                $messageBord->message_bord->incident_management->created->format("Ymd") . "-" .  
                                h($messageBord->message_bord->incident_management->number)
                            ?></td>
                            <td class="col-md-2 text-center border-top-0"><?= h($messageBord->message_bord->user->first_name . $messageBord->message_bord->user->last_name) ?></td>
                            <td class="col-md-4 text-center border-top-0"><?= h($messageBord->message_bord->title) ?></td>
                            <td class="col-md-1 text-center border-top-0"><?= $messageBord->message_bord->message_status->status ?></td>
                            <td class="col-md-1 text-center border-top-0"><?= h($messageBord->message_bord->period) ?></td>
                            <td class="col-md-1 text-center border-top-0"><?= h($messageBord->message_bord->modified) ?></td>
                            <td class="col-md-1 text-center border-top-0">
                                <?= $this->Html->link(__('閲覧権限確認'), ['action' => 'privateView', $messageBord->message_bord->message_bords_id]) ?>
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
                    <pre><p><?= h($messageBord->message_bord->message) ?></p></pre>
                    <h5>ファイル</h5>
                    <table>
                        <?php foreach($messageBord->message_bord->message_files as $file): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'bordFileDownload', $file->message_files_id]) ?>
                                </td>
                                <td><?= $file->file_size ?></td>
                                <td>
                                    <?= $this->Form->postLink(__('削除'), ["controller" => "MessageFiles", 'action' => 'delete', $file->message_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                    <?php if($messageBord->message_bord->chronology_flag == false): ?>

                        <h5>選択肢</h5>
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
    
                        <table>
                            <?php $choices = []; ?>
                            <?php $choiceCount = count($messageBord->message_bord->message_choices) ?>
                            <?php foreach($messageBord->message_bord->message_choices as $choice): ?>
                                <?php $choices[$choice->message_choices_id] = $choice->content ?>
                                <tr>
                                    <?php if(array_key_exists($choice->message_choices_id, $count)): ?>
                                        <td><?= h($choice->content) ?></td>
                                        <td><?= h($count[$choice->message_choices_id]) ?></td>
                                        <td>
                                            <?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?>
                                            <?php if($choiceCount != 1): ?>
                                                <?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('{0} この選択肢を削除してよろしいですか？', $choice->content)]) ?>
                                            <?php endif ?>
                                        </td>
                                    <?php else: ?>
                                        <td><?= h($choice->content) ?></td>
                                        <td><?= 0 ?></td>
                                        <td>
                                            <?= $this->Html->link(__('編集'), ["controller" => "message_choices", 'action' => 'edit', $choice->message_choices_id]) ?>
                                            <?php if($choiceCount != 1): ?>
                                                <?= $this->Form->postLink(__('削除'), ["controller" => "message_choices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('この選択肢を削除しますか？ # {0}', $choice->content)]) ?>
                                            <?php endif ?>
                                        </td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </table>

                        <table>
                            <tr>
                                <th>ユーザ名</th>
                                <th>選択肢</th>
                                <th>メッセージ</th>
                                <th>更新日時</th>
                                <th>編集</th>
                            </tr>
                            <?php $user = [] ?>
                            <?php foreach($messageBord->message_bord->message_destinations as $destination): ?>
                                <?php if(null == $destination->message_answer): ?>
                                    <?php $user[$destination->message_destinations_id] = $destination->user->first_name . $destination->user->last_name ?>
                                <?php endif ?>
                                <tr>
                                    <td><?= $destination->user->first_name . $destination->user->last_name ?></td>
                                    <?php if(null !== $destination->message_answer): ?>
                                        <td><?= $destination->message_answer->message_choice->content ?></td>
                                        <td><pre><?= h($destination->message_answer->message) ?></pre></td>
                                        <td><?= $destination->message_answer->modified ?></td>
                                        <td><?= $this->Html->link(__('編集'), ["controller" => "message_answers", 'action' => 'edit', $destination->message_answer->message_answers_id]) ?></td>
                                    <?php else: ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    <?php endif ?>
                                </tr>
                            <?php endforeach ?>
                        </table>
    
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
                            <div>
                            <?php
                                echo $this->Form->create($messageAnswers, [
                                    "url" => [
                                      "controller" => "message_answers",
                                      "action" => "add"
                                    ]
                                ]); 
                                echo "<fieldset>";
                                echo $this->Form->control('message_destinations_id', ["type" => "select", "options" => $user, "label" => "ユーザ"]); 
                                echo $this->Form->control('message_choices_id', ["type" => "radio", "options" => $choices, "label" => "選択肢"]);
                                echo $this->Form->control('message', ["label" => "メッセージ", "type" => "textarea"]);
                                echo "</fieldset>";
                                echo $this->Form->button(__('Submit'));
                                echo $this->Form->end();
                            ?>
                            </div>
    
                        <?php endif ?>
                    <?php $c++ ?>
                    <?php elseif($messageBord->message_bord->chronology_flag == true): ?>
                        <table>
                            <?php foreach($messageBord->message_bord->message_bord_chronologies as $chronology): ?>
                                <tr>
                                    <th scope="col" class="actions"><?= h($chronology->user->first_name . $chronology->user->last_name) ?></th>
                                    <td>
                                        <?= $this->Html->link(__('編集'), ["controller" => "MessageBordChronologies", 'action' => 'edit', $chronology->message_bord_chronologies_id]) ?>
                                        <?= $this->Form->postLink(__('削除'), ["controller" => "MessageBordChronologies", 'action' => 'delete', $chronology->message_bord_chronologies_id], ['confirm' => __('Are you sure you want to delete # {0}?', $chronology->message_bord_chronologies_id)]) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= h($chronology->message) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <?php $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id"); ?>
                        <?php
                            echo $this->Form->create($messageBordChronologies, [
                                "url" => [
                                  "controller" => "message_bord_chronologies",
                                  "action" => "add"
                                ]
                            ]); 
                            echo "<fieldset>";
                            echo $this->Form->control('message_bords_id', ["type" => "hidden", "value" => $messageBord->message_bord->message_bords_id]); 
                            echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $normalUsers, "label" => "ユーザ", "value" => $loginUser]));
                            echo $this->Form->control('message', ["label" => "メッセージ", "type" => "textarea"]);
                            echo "</fieldset>";
                            echo $this->Form->button(__('Submit'));
                            echo $this->Form->end();
                        ?>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
            <div class="paginator">
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
    </div>
</div>
