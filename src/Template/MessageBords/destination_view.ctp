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
            <h3 class="my-4"><?= __("{$messageBords->title}　宛先ユーザ") ?></h3>
            <table class="table">
                <?php foreach($messageBords->message_destinations as $destination): ?>
                    <tr class="row">
                        <td class="border-top-0 col-md-1"></td>
                        <td class="border-top-0 col-md-3"><?= $destination->user->first_name . $destination->user->last_name ?></td>
                        <td class="border-top-0 col-md-3 text-left"><?= $this->Form->postLink(__('削除'), ["controller" => "MessageDestinations", 'action' => 'delete', $destination->message_destinations_id], ['confirm' => __('この宛先を削除しますか？ # {0}', $destination->user->first_name . $destination->user->last_name)]) ?></td>
                        <td class="border-top-0 col-md-5"></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>
