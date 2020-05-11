<?php 
    $this->assign("title", "カテゴリー"); 
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
                    <?= $this->Html->link(__('新規作成'), ['controller' => 'Categories', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('カテゴリー') ?></h3>
            <div class="row">
                <div class="col-md-1 border-top-0"></div>
                <div class="col-md-3 text-left border-top-0"><p class="tableHeader">カテゴリー</p></div>
                <div class="col-md-3 text-left border-top-0"><p class="tableHeader">ソート番号</p></div>
                <div class="col-md-3 text-center border-top-0"><p class="tableHeader">編集・削除</p></div>
                <div class="col-md-2 border-top-0"></div>
            </div>
            <?php foreach ($categories as $category): ?>
                <div class="row">
                    <div class="col-md-1 border-top-0"></div>
                    <div class="col-md-3 text-left border-top-0"><p class="tableBody"><?= h($category->category) ?></p></div>
                    <div class="col-md-3 text-left border-top-0"><p class="tableBody"><?= $this->Number->format($category->category_sort_number) ?></p></div>
                    <div class="col-md-3 text-center border-top-0">
                        <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $category->categories_id]) ?></span>
                        <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $category->categories_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->category)]) ?></span>
                    </div>
                    <div class="col-md-2 border-top-0"></div>
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
