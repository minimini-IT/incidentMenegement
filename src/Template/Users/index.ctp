<?php 
    $this->assign("title", "ユーザ"); 
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
                    <?= $this->Html->link(__('新規作成'), ['controller' => 'Users', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('班'), ['controller' => 'Belongs', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('階級'), ['controller' => 'Ranks', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
                <p>転出、退職者を含めたユーザ一覧</p>
                <p>権限は現段階で４つ</p>
                <p>基本的に編集、削除は各ユーザの権限と同等以下のものしか許可されない</p>
                <p>ユーザを作成する場合は、作成を行うユーザと同等以下の権限しかあたえられない</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('ユーザ') ?></h3>
            <table class="table">
                <thead>
                    <tr class="row">
                        <th class="col-md-1 text-left border-top-0"></th>
                        <th class="col-md-1 text-left border-top-0">姓</th>
                        <th class="col-md-1 text-left border-top-0">名</th>
                        <th class="col-md-2 text-left border-top-0">所属班</th>
                        <th class="col-md-2 text-left border-top-0">階級</th>
                        <th class="col-md-2 text-left border-top-0">権限</th>
                        <th class="col-md-1 text-left border-top-0">転出</th>
                        <th class="col-md-2 text-center border-top-0">編集・削除</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr class="row">
                            <td class="col-md-1 border-top-0"></td>
                            <td class="col-md-1 text-left border-top-0"><?= h($user->first_name) ?></td>
                            <td class="col-md-1 text-left border-top-0"><?= h($user->last_name) ?></td>
                            <td class="col-md-2 text-left border-top-0"><?= h($user->belong->belong) ?></td>
                            <td class="col-md-2 text-left border-top-0"><?= h($user->rank->rank) ?></td>
                            <td class="col-md-2 text-left border-top-0"><?= h($user->role->role_jp) ?></td>
                            <td class="col-md-1 text-left border-top-0"><?= h($user->delete_flag) ?></td>
                            <td class="col-md-2 text-center border-top-0">
                                <?= $this->Html->link(__('編集'), ['action' => 'edit', $user->users_id]) ?>
                                <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->users_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->first_name . $user->last_name)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
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
</div>
