<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-2">
-->
            <nav>
                <div class="list-group">
                    <?= $this->Html->link(__('新規作成'), ['controller' => 'Categories', 'action' => 'add'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('カテゴリー') ?></h3>
            <table class="table">
                <thead>
                    <tr class="row">
                        <td class="col-md-1 border-top-0"></td>
                        <th class="col-md-3 text-left border-top-0">カテゴリー</th>
                        <th class="col-md-3 text-left border-top-0">ソート番号</th>
                        <th class="col-md-3 text-center border-top-0">Actions</th>
                        <td class="col-md-2 border-top-0"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                    <tr class="row">
                        <td class="col-md-1 border-top-0"></td>
                        <td class="col-md-3 text-left border-top-0"><?= h($category->category) ?></td>
                        <td class="col-md-3 text-left border-top-0"><?= $this->Number->format($category->category_sort_number) ?></td>
                        <td class="col-md-3 text-center border-top-0">
                            <?= $this->Html->link(__('編集'), ['action' => 'edit', $category->categories_id]) ?>
                            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $category->categories_id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->categories_id)]) ?>
                        </td>
                        <td class="col-md-2 border-top-0"></td>
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
