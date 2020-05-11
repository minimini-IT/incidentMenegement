<?php
    $this->assign("title", "メッセージボードクロノロジー編集"); 
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
            <h3 class="my-4"><?= __("{$messageBordChronology->message_bord->title}　コメント編集") ?></h3>
            <?= $this->Form->create($messageBordChronology, ["type" => "file"]) ?>
            <fieldset>
                <?php
                    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                    echo "<div class='row mt-4'><div class='col-md-4'>";
                    //echo $this->Form->control('users_id', ['options' => $users]);
                    echo str_replace(";", " ", $this->Form->control('users_id', ["label" => "ユーザ", "type" => "select", "disabled" => true, "options" => $users, "class" => "form-control"]));
                    echo "</div><div class='col-md-8'></div></div>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('message', ["label" => "メッセージ", "class" => "form-control"]);
                    echo "</div>";


                    echo "<div class='row mt-4'><div class='col-md-8'>";
                    echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                    echo "</div><div class='col-md-4'>";
                    echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                    echo "</div></div>";


                    echo "</div><div class='col-md-3'></div></div>";
                ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
