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
                    <?= $this->Html->link(__('カテゴリー'), ['controller' => 'Categories', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('クルー申し送り作成') ?></h3>
            <?= $this->Form->create($crewSend, ["type" => "file"]); ?>
                <?php
                    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('title', ["label" => "タイトル", "class" => "form-control"]);
                    echo "</div>";
                    echo "<div class='row mt-4'><div class='col'>";
                    echo str_replace(";", " ", $this->Form->control('users_id', ["label" => ["text" => "ユーザ", "class" => "w-25"], "type" => "select", "value" => $loginUser, "options" => $users, "class" => "form-control"]));
                    echo "</div><div class='col'>";
                    echo $this->Form->control('categories_id', ["label" => ["text" => "カテゴリー", "class" => "w-25"], 'options' => $categories, "class" => "form-control"]);
                    echo "</div></div><div class='row mt-4'><div class='col'>";
                    echo $this->Form->control('statuses_id', ["label" => ["text" => "ステータス", "class" => "w-25"], 'options' => $statuses, "class" => "form-control"]);
                    echo "</div><div class='col'>";


                    //あとで要訂正（jsのカレンダー使いたい）
                    echo $this->Form->control('period', ["label" => ["text" => "期　限", "class" => "w-25"], "select" => ["class" => "form-control"]]);




                    echo "</div></div>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('comment', ["label" => "コメント", "class" => "form-control"]);
                    echo "</div>";
                    echo "<div class='row mt-4'><div class='col'>";
                    echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                    echo "</div><div class='col'>";
                    echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                    echo "</div></div>";
                    echo "</div><div class='col-md-3'></div></div>";
                ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
