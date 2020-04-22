<?php
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
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __("{$messageBords->title}　閲覧権限") ?></h3>
            <table class="table">
                <?php $count = count($messageBords->private_messages) ?>
                <?php foreach($messageBords->private_messages as $private): ?>
                    <tr class="row">
                        <td class="border-top-0 col-md-1"></td>
                        <td class="border-top-0 col-md-3"><?= $private->user->first_name . $private->user->last_name ?></td>
                        <?php if($private->user->users_id != $addUser && $count != 1 && $private->user->users_id != 7): ?>
                            <td class="border-top-0 col-md-3 text-left"><?= $this->Form->postLink(__('削除'), ["controller" => "PrivateMessages", 'action' => 'delete', $private->private_messages_id], ['confirm' => __('このユーザを閲覧禁止にしますか？ # {0}', $private->user->first_name . $private->user->last_name)]) ?></td>
                        <?php else: ?>
                            <td class="border-top-0 col-md-3"></td>
                        <?php endif ?>
                        <td class="border-top-0 col-md-5"></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>



