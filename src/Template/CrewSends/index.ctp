<?php
    $this->assign("title", "クルー申し送り"); 
    $sideberClass = "list-group-item list-group-item-action list-group-item-info";
?>
<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-lg-2">
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
        <div class="col-lg-10">
            <h3 class="my-4"><?= __('クルー申し送り') ?></h3>


            <h5 class="my-4 branch text-info"><?= __('検索') ?></h5>
            <div class="node">
                <?= $this->Form->create("", [
                    "type" => "get",
                    "url" => [
                        "controller" => "crew_sends",
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
                        <div class="col-md-3">
                            <?= $this->Form->control('categories_id', ["label" => "カテゴリー", "class" => "form-control", "options" => $categories, "empty" => true]) ?>
                        </div>
                        <div class="col-md-2"></div>
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
                            <?= $this->Form->control('statuses_id', ["label" => "ステータス", "class" => "form-control", "options" => $statuses, "empty" => true]) ?>
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
                            <?= $this->Form->control('comment', ["label" => "コメント", "class" => "form-control"]) ?>
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
                        "controller" => "crew_sends",
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
                <div class="col-lg-2 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader mb-0"><?= __("インシデントID") ?></p></div>
                <div class="col-lg-2 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("作成者") ?></p></div>
                <div class="col-lg-4 border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("タイトル") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("カテゴリー") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("ステータス") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("期限") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 px-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __('編集・削除') ?></p></div>
            </div>


            <?php $i = 0 ?>
            <?php foreach ($crewSends as $crewSend): ?>
                <div class="branch border-bottom row">
                    <div class="col-lg-2 text-left border-top-0 align-self-center"><p class="incidentManagementsId" name="incidentId[<?= $i ?>]"><?= 
                        h($crewSend->incident_management->management_prefix->management_prefix) . "-" .  
                        $crewSend->incident_management->created->format("Ymd") . "-" .  
                        h($crewSend->incident_management->number)
                    ?></p></div>
                    <div class="col-lg-2 text-center border-top-0 align-self-center"><p><?= h($crewSend->user->first_name . $crewSend->user->last_name) ?></p></div>
                    <div class="col-lg-4 border-top-0 align-self-center"><p><?= h($crewSend->title) ?></p></div>
                    <div class="col-lg-1 text-center border-top-0 px-0 align-self-center"><p><?= $crewSend->category->category ?></p></div>
                    <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $crewSend->status->status ?></p></div>
                    <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $crewSend->period->format("Y/m/d") ?></p></div>
                    <div class="col-lg-1 text-center border-top-0 align-self-center">
                        <div class="my-3 align-self-center">
                              <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $crewSend->crew_sends_id]) ?></span>
                              <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $crewSend->crew_sends_id], ['confirm' => __('{0} この申し送りを削除してよろしいですか？', $crewSend->title)]) ?></span>
                        </div>
                    </div>
                </div>
                <div class="node px-4 border-bottom">
                    <div class="row">
                        <div class="col-lg-9 pl-4">
                            <div class="border-bottom"><?= $this->Text->autoparagraph($crewSend->comment) ?></div>
                        </div>

                        <!-- ファイル -->
                        <div class="col-lg-3 pr-0">
                            <div>
                                <?php foreach($crewSend->files as $file): ?>
                                    <div class="row border-bottom border-info">
                                        <div class="col-lg-10">
                                            <p><?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'sendFileDownload', $file->files_id]) ?></p>
                                        </div>
                                        <div class="col-lg-2 px-0">
                                            <p><?= $this->Form->postLink(__('削除'), ["controller" => "Files", 'action' => 'delete', $file->files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($crewSend->crew_send_comments as $crewSendComment): ?>
                        <!--<div class="mt-3 row">-->
                            <div class="mt-4 border-bottom border-info">
                                <div class="row">
                                    <div class="col-lg-4 pl-0 border-top-0 text-info"><p class="tableHeader"><?= h($crewSendComment->user->first_name . $crewSendComment->user->last_name) ?></p></div>
                                    <div class="col-lg-3 border-top-0 text-info"><p class="tableHeader"><?= h($crewSendComment->created) ?></p></div>
                                    <div class="col-lg-3 border-top-0"></div>
                                    <div class="col-lg-2 border-top-0 text-right pr-0">
                                        <span><?= $this->Html->link(__('編集'), ["controller" => "CrewSendComments", 'action' => 'edit', $crewSendComment->crew_send_comments_id]) ?></span>
                                        <?= $this->Form->postLink(__('削除'), ["controller" => "CrewSendComments", 'action' => 'delete', $crewSendComment->crew_send_comments_id], ['confirm' => __('コメントを削除しますか？', $crewSendComment->crew_send_comments_id)]) ?></p>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-9 border-bottom pl-4">
                                <?= $this->Text->autoparagraph($crewSendComment->comment) ?>
                            </div>
                            <div class="col-lg-3 pr-0">
                                <div>
                                    <?php foreach($crewSendComment->comment_files as $file): ?>
                                        <div class="border-bottom border-info row">
                                            <div class="border-top-0 col-lg-10">
                                                <p><?= $this->Html->link($file->file_name, ["controller" => "Download", 'action' => 'commentFileDownload', $file->comment_files_id]) ?></p>
                                            </div>
                                            <div class="border-top-0 col-lg-2 px-2">
                                                <p><?= $this->Form->postLink(__('削除'), ["controller" => "CommentFiles", 'action' => 'delete', $file->comment_files_id], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file->file_name)]) ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div> 
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
                        echo "<div class='row'><div class='col-lg-8 mt-4'>";
                        echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                        echo "</div><div class='col-lg-4'>";
                        echo $this->Form->button('送信', ["class" => "btn btn-info mt-4 float-right"]);
                        echo "</div></div>";
                        echo $this->Form->end();
                    ?>
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
