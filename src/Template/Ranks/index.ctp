<?php 
    $this->assign("title", "階級"); 
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
                    <?= $this->Html->link(__('新規作成'), ['controller' => 'Ranks', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ユーザ'), ['controller' => 'Users', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('班'), ['controller' => 'Belongs', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('階級') ?></h3>
            <table class="table">
                <thead>
                    <tr class="row">
                        <td class="col-md-1 border-top-0"></td>
                        <th class="col-md-2 text-left border-top-0"><?= __('階級') ?></th>
                        <th class="col-md-2 text-left border-top-0"><?= __('略称') ?></th>
                        <th class="col-md-2 text-left border-top-0"><?= __('ソート番号') ?></th>
                        <th class="col-md-2 text-center border-top-0"><?= __('編集・削除') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ranks as $rank): ?>
                        <tr class="row">
                            <td class="col-md-1 border-top-0"></td>
                            <td class="col-md-2 text-left border-top-0"><?= h($rank->rank) ?></td>
                            <td class="col-md-2 text-left border-top-0"><?= h($rank->abb_rank) ?></td>
                            <td class="col-md-2 text-left border-top-0"><?= $this->Number->format($rank->rank_sort_number) ?></td>
                            <td class="col-md-2 text-center border-top-0">
                                <?= $this->Html->link(__('編集'), ['action' => 'edit', $rank->ranks_id]) ?>
                                <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $rank->ranks_id], ['confirm' => __('この階級を削除してよろしいですか？ {0}?', $rank->rank)]) ?>
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
