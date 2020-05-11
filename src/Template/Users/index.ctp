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
            <div class="row">
                <div class="col-md-1 text-left border-top-0"></div>
                <div class="col-md-1 text-left border-top-0"><p class="tableHeader">姓</p></div>
                <div class="col-md-1 text-left border-top-0"><p class="tableHeader">名</p></div>
                <div class="col-md-2 text-left border-top-0"><p class="tableHeader">所属班</p></div>
                <div class="col-md-2 text-left border-top-0"><p class="tableHeader">階級</p></div>
                <div class="col-md-2 text-left border-top-0"><p class="tableHeader">権限</p></div>
                <div class="col-md-1 text-left border-top-0"><p class="tableHeader">転出</p></div>
                <div class="col-md-2 text-center border-top-0"><p class="tableHeader">編集・削除</p></div>
            </div>
            <?php foreach ($users as $user): ?>
                <div class="row">
                    <div class="col-md-1 border-top-0"></div>
                    <div class="col-md-1 text-left border-top-0"><p class="tableBody"><?= h($user->first_name) ?></p></div>
                    <div class="col-md-1 text-left border-top-0"><p class="tableBody"><?= h($user->last_name) ?></p></div>
                    <div class="col-md-2 text-left border-top-0"><p class="tableBody"><?= h($user->belong->belong) ?></p></div>
                    <div class="col-md-2 text-left border-top-0"><p class="tableBody"><?= h($user->rank->rank) ?></p></div>
                    <div class="col-md-2 text-left border-top-0"><p class="tableBody"><?= h($user->role->role_jp) ?></p></div>
                    <div class="col-md-1 text-left border-top-0"><p class="tableBody"><?= h($user->delete_flag) ?></p></div>
                    <div class="col-md-2 text-center border-top-0">
                        <div class="my-3">
                            <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $user->users_id]) ?></span>
                            <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->users_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->first_name . $user->last_name)]) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
