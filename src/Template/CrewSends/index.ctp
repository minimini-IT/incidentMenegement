<?php
use Cake\datasource\ConnectionManager;
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
                    <?= $this->Html->link(__('カテゴリー'), ['controller' => 'Categories', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
                <p>申し送り事項のページ</p>
                <p>行をクリックすると詳細が表示される</p>
                <p>詳細からその申し送りに対してコメントを作成できる</p>
                <p>詳細、コメントに対してファイルを添付できる</p>
                <p>左側のACTIONSから必要に応じてカテゴリー、ステータスを追加できる</p>
                <p>作成者の欄はデフォルトでログイン中のユーザが選ばれている</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('クルー申し送り') ?></h3>
            <?php if($close == null): ?>
                <p><?= $this->Form->postLink(__('ステータス「クローズ」非表示'), ['action' => 'closeHidden']) ?></p>
            <?php elseif($close == "close"): ?>
                <p><?= $this->Form->postLink(__('ステータス「クローズ」表示'), ['action' => 'closeOpen']) ?></p>
            <?php endif ?>
            <table class="table">
                <thead>
                    <tr class="row">
                        <th class="col-md-2 col-lg-2 text-center border-top-0"><?= __("インシデントID") ?></th>
                        <th class="col-md-2 col-lg-2 text-center border-top-0"><?= __("作成者") ?></th>
                        <th class="col-md-4 col-lg-4 text-center border-top-0"><?= __("タイトル") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("カテゴリー") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("ステータス") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0"><?= __("期限") ?></th>
                        <th class="col-md-1 col-lg-1 text-center border-top-0 px-0"><?= __('編集・削除') ?></th>
                    </tr>
                </thead>
            </table>
            <?php foreach ($crewSends as $crewSend): ?>
                <table class="branch border-bottom table">
                    <tbody>
                        <tr class="row">
                            <td class="col-md-2 text-left border-top-0"><?= 
                                h($crewSend->incident_management->management_prefix->management_prefix) . "-" .  
                                $crewSend->incident_management->created->format("Ymd") . "-" .  
                                h($crewSend->incident_management->number)
                            ?></td>
                            <td class="col-md-2 text-center border-top-0"><?= h($crewSend->user->first_name . $crewSend->user->last_name) ?></td>
                            <td class="col-md-4 text-center border-top-0"><?= h($crewSend->title) ?></td>
                            <td class="col-md-1 text-center border-top-0 px-0"><?= $crewSend->category->category ?></td>
                            <td class="col-md-1 text-center border-top-0"><?= $crewSend->status->status ?></td>
                            <td class="col-md-1 text-center border-top-0"><?= h($crewSend->period) ?></td>
                            <td class="col-md-1 text-center border-top-0">
                              <?= $this->Html->link(__('編集'), ['action' => 'edit', $crewSend->crew_sends_id]) ?>
                              <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $crewSend->crew_sends_id], ['confirm' => __('{0} この申し送りを削除してよろしいですか？', $crewSend->title)]) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="node px-4">
                    <div class="row">
                        <div class="col-md-9 pl-4">
                            <div class="border-bottom"><?= $this->Text->autoparagraph($crewSend->comment) ?></div>
                        </div>

                        <!-- ファイル -->
                        <div class="col-md-3 pr-0">
                            <table>
                                <?php foreach($crewSend->files as $file): ?>
                                    <tr class="border">
                                        <td class="col-md-10">
                                            <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'sendFileDownload', $file->files_id]) ?>
                                        </td>
                                        <!--<td><?= $file->file_size ?></td>-->
                                        <td class="col-md-2 px-0">
                                            <?= $this->Form->postLink(__('削除'), ["controller" => "Files", 'action' => 'delete', $file->files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>

          
                    <?php foreach ($crewSend->crew_send_comments as $crewSendComment): ?>
                        <!--<div class="mt-3 row">-->
                            <table class="table mt-4 border-bottom border-info">
                                <tr class="row">
                                    <th class="col-md-4 pl-0 border-top-0 text-info"><?= h($crewSendComment->user->first_name . $crewSendComment->user->last_name) ?></th>
                                    <th class="col-md-3 border-top-0 text-info"><?= h($crewSendComment->created) ?></th>
                                    <td class="col-md-3 border-top-0"></td>
                                    <td class="col-md-2 border-top-0 text-right pr-0">
                                        <?= $this->Html->link(__('編集'), ["controller" => "CrewSendComments", 'action' => 'edit', $crewSendComment->crew_send_comments_id]) ?>
                                        <?= $this->Form->postLink(__('削除'), ["controller" => "CrewSendComments", 'action' => 'delete', $crewSendComment->crew_send_comments_id], ['confirm' => __('コメントを削除しますか？', $crewSendComment->crew_send_comments_id)]) ?>
                                    </td>
                                </tr>
                            </table>
                        <!--</div>-->
                        <div class="row">
                            <div class="col-md-9 border-bottom pl-4">
                                <?= $this->Text->autoparagraph($crewSendComment->comment) ?>
                            </div>
                            <div class="col-md-3 border-bottom pr-0">
                                <table class="table">
                                    <?php foreach($crewSendComment->comment_files as $file): ?>
                                        <tr class="border-bottom border-info row">
                                            <td class="border-top-0 col-md-10">
                                                <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'commentFileDownload', $file->comment_files_id]) ?>
                                            </td>
                                            <!--<td><?= $file->file_size ?></td>-->
                                            <td class="border-top-0 col-md-2 px-2">
                                                <?= $this->Form->postLink(__('削除'), ["controller" => "CommentFiles", 'action' => 'delete', $file->comment_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </table> 
                            </div>
                        </div>
                    <?php endforeach ?>
                    <!-- コメント書き込み -->
                    <?php
                        echo $this->Form->create($crewSendComment, [
                            "url" => [
                              "controller" => "crew_send_comments",
                              "action" => "add"
                            ],
                            "class" => "mb-5",
                            "type" => "file"
                        ]); 
                        echo "<div class='row'><div class='col mt-4'>";
                        echo str_replace(";", " ", $this->Form->control('users_id', ["label" => "ユーザ", "value" => $loginUser, "type" => "select", "options" => $users, "class" => "form-control"])); 
                        echo "</div><div class='col'></div><div class='col'></div></div>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->control('comment', ["label" => "コメント", "type" => "textarea", "value" => "", "class" => "form-control"]);
                        echo "</div>";
                        echo $this->Form->control('crew_sends_id', ["type" => "hidden", 'value' => $crewSend->crew_sends_id]);
                        //filesへの入力
                        echo "<div class='row'><div class='col mt-4'>";
                        echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                        echo "</div><div class='col'></div><div class='col'>";
                        echo $this->Form->button('送信', ["class" => "btn btn-info mt-4 float-right"]);
                        echo "</div></div>";
                        echo $this->Form->end();
                    ?>
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
