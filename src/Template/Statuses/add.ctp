<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-2">
-->
            <nav>
                <div class="list-group">
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('カテゴリー'), ['controller' => 'Categories', 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => "list-group-item list-group-item-action list-group-item-info"]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('ステータス追加') ?></h3>
            <?= $this->Form->create($status) ?>
                <?php
                    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('status', ["label" => "ステータス", "class" => "form-control"]);
                    echo "</div><div class='mt-4'>";
                    echo $this->Form->control('status_sort_number', ["label" => "ソート番号", "class" => "form-control", "min" => 0]);
                    echo "</div><div class='mt-4'>";
                    echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                    echo "</div><div class='col-md-3'></div></div></div>";
                ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
