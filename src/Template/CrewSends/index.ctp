<?php
use Cake\datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CrewSend[]|\Cake\Collection\CollectionInterface $crewSends
 */
?>
<!--
default.ctp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
-->
            <ul>
                <li><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('新規作成'), ['action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('カテゴリー'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('TOPへ戻る'), ['controller' => 'Dairy', 'action' => 'index']) ?></li>
            </ul>
            <p>申し送り事項のページ</p>
            <p>行をクリックすると詳細が表示される</p>
            <p>詳細からその申し送りに対してコメントを作成できる</p>
            <p>詳細、コメントに対してファイルを添付できる</p>
            <p>左側のACTIONSから必要に応じてカテゴリー、ステータスを追加できる</p>
            <p>作成者の欄はデフォルトでログイン中のユーザが選ばれている</p>
        </div>
        <div class="col-md-10">
            <h3><?= __('クルー申し送り') ?></h3>
            <?php if($close == null): ?>
                <p><?= $this->Form->postLink(__('ステータス「クローズ」非表示'), ['action' => 'closeHidden']) ?></p>
            <?php elseif($close == "close"): ?>
                <p><?= $this->Form->postLink(__('ステータス「クローズ」表示'), ['action' => 'closeOpen']) ?></p>
            <?php endif ?>
            <div class="bg-info row">
                <p class="col-md-3 text-center px-0">インシデントID</p>
                <p class="col-md-1 text-center px-0">カテゴリー<p/>
                <p class="col-md-3 text-center px-0">タイトル</p>
                <p class="col-md-1 text-center px-0">ステータス</p>
                <p class="col-md-1 text-center px-0">作成者</p>
                <p class="col-md-2 text-center px-0">期限</p>
                <p class="col-md-1 text-center px-0">編集・削除</p>
            </div>
<!--
            <table class="table bg-info row">
                <thead>
                    <tr>
                        <th class="col-md-3 text-center"><?= $this->Paginator->sort('incident_managements_id', "インシデントID") ?></th>
                        <th class="col-md-1 text-center"><?= $this->Paginator->sort('categories_id', "カテゴリー") ?></th>
                        <th class="col-md-3 text-center"><?= $this->Paginator->sort('title', "タイトル") ?></th>
                        <th class="col-md-1 text-center"><?= $this->Paginator->sort('statuses_id', "ステータス") ?></th>
                        <th class="col-md-1 text-center"><?= $this->Paginator->sort('users_id', "作成者") ?></th>
                        <th class="col-md-2 text-center"><?= $this->Paginator->sort('period', "期限") ?></th>
                        <th class="col-md-1 text-center"><?= __('編集・削除') ?></th>
                    </tr>
                </thead>
            </table>
-->
            <?php foreach ($crewSends as $crewSend): ?>
                <table class="branch border-bottom table">
                    <tbody>
                        <tr>
                            <td><?= 
                                h($crewSend->incident_management->management_prefix->management_prefix) . "-" .  
                                $crewSend->incident_management->created->format("Ymd") . "-" .  
                                h($crewSend->incident_management->number)
                            ?></td>
                            <td><?= $crewSend->category->category ?></td>
                            <td><?= h($crewSend->title) ?></td>
                            <td><?= $crewSend->status->status ?></td>
                            <td><?= h($crewSend->user->first_name . $crewSend->user->last_name) ?></td>
                            <td><?= h($crewSend->period) ?></td>
                            <td class="actions">
                              <?= $this->Html->link(__('編集'), ['action' => 'edit', $crewSend->crew_sends_id]) ?>
                              <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $crewSend->crew_sends_id], ['confirm' => __('{0} この申し送りを削除してよろしいですか？', $crewSend->title)]) ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="node">
                    <pre><p><?= h($crewSend->comment) ?></p></pre>
                    <h5>ファイル</h5>
                    <hr>
                    <table>
                        <!--実装はtableではなくbootstrapのrowとcolで行う-->
                        <?php foreach($crewSend->files as $file): ?>
                            <tr>
                                <td>
                                    <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'sendFileDownload', $file->files_id]) ?>
                                </td>
                                <td><?= $file->file_size ?></td>
                                <td>
                                    <?= $this->Form->postLink(__('Delete'), ["controller" => "Files", 'action' => 'delete', $file->files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
          
                    <h5>コメント</h5>
                    <hr>
                    <?php foreach ($crewSend->crew_send_comments as $crewSendComment): ?>
                        <table>
                            <tr>
                                <th><?= h($crewSendComment->user->first_name . $crewSendComment->user->last_name) ?></th>
                                <th><?= h($crewSendComment->created) ?></th>
                                <td><?= $this->Html->link(__('編集'), ["controller" => "CrewSendComments", 'action' => 'edit', $crewSendComment->crew_send_comments_id]) ?></td>
                                <td><?= $this->Form->postLink(__('削除'), ["controller" => "CrewSendComments", 'action' => 'delete', $crewSendComment->crew_send_comments_id], ['confirm' => __('コメントを削除しますか？', $crewSendComment->crew_send_comments_id)]) ?></td>
                            </tr>
                        </table>
                        <pre><?= $crewSendComment->comment ?></pre>  
                        <?php foreach($crewSendComment->comment_files as $file): ?>
                            <table>
                                <tr>
                                    <td>
                                        <?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'commentFileDownload', $file->comment_files_id]) ?>
                                    </td>
                                    <td><?= $file->file_size ?></td>
                                    <td>
                                        <?= $this->Form->postLink(__('Delete'), ["controller" => "CommentFiles", 'action' => 'delete', $file->comment_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?>
                                    </td>
                                </tr>
                            </table> 
                        <?php endforeach ?>
                    <?php endforeach ?>
                    <!-- コメント書き込み -->
                    <?php
                        //ログインしているユーザ
                        $loginUser = $this->request->session()->read("Auth.User.users_id");
        
                        echo $this->Form->create($crewSendComment, [
                            "url" => [
                              "controller" => "crew_send_comments",
                              "action" => "add"
                            ],
                            "type" => "file"
                        ]); 
                        echo "<fieldset>";
                        echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "type" => "select", "options" => $users])); 
                        echo $this->Form->control('comment', ["type" => "textarea", "value" => ""]);
                        echo $this->Form->control('crew_sends_id', ["type" => "hidden", 'value' => $crewSend->crew_sends_id]);
                        //filesへの入力
                        echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
                        echo "</fieldset>";
                        echo $this->Form->button(__('Submit'));
                        echo $this->Form->end();
                    ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
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
