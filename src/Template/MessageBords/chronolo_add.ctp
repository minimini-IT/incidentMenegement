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
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
                <p>必要に応じて左のACTIONSからステータスを追加できる</p>
                <p>クロノロジー形式のメッセージボード</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('メッセージボード作成（クロノロ）') ?></h3>
            <?= $this->Form->create($messageBord, ["type" => "file"]); ?>
            <fieldset>
                <?php
                    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('title', ["label" => "タイトル", "class" => "form-control"]);
                    echo "</div>";
                    echo "<div class='row mt-4'><div class='col'>";
                    echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "label" => "作成者", "type" => "select", "options" => $createUser, "class" => "form-control"]));
                    echo "</div><div class='col'>";
                    echo $this->Form->control('message_statuses_id', ["label" => "ステータス", 'options' => $messageStatuses, "class" => "form-control"]);
                    echo "</div><div class='col'>";
                    echo $this->Form->control('period', ["label" => "期限", "type" => "text", "class" => "form-control datepicker", "value" => date("Y/m/d")]);
                    echo "</div></div>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('message', ["label" => "メッセージ", "class" => "form-control"]);
                    echo "</div>";
                    echo $this->Form->control('chronology_flag', ["value" => 1, "type" => "hidden"]);

                    //------privateMessage--------------
                    echo "<div class='mt-4'>";
                    echo "<div class='border-bottom border-info no-mb'>";
                    echo str_replace(";", " ", $this->Form->control("allUser", ["label" => ["text" => "閲覧許可ユーザ", "class" => "mb-2"], "multiple" => "checkbox", "options" => $allUser, "class" => "privateAllUser mb-0"]));
                    echo "</div>";
                    echo "<div class='row mt-2'><div class='col'>";
                    echo "<div class='privateGroup border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='privateSoukatu' name='privateGroup' type='checkbox'>総括班</label>";
                    echo "</div>";
                    echo "<div class='privateUser mt-2'>";
                    echo "<div id='privateSoukatuUser'>";
                    echo str_replace(";", " ", $this->Form->control("soukatuPrv", ["label" => false, "class" => "privateSoukatu prvUser", "multiple" => "checkbox", "options" => $soukatu]));
                    echo "</div>";
                    echo "</div>";
echo "</div><div class='col'>";
                    echo "<div class='privateGroup border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='privateKenkyo' name='privateGroup' type='checkbox'>研究・教育班</label>";
                    echo "</div>";
                    echo "<div class='privateUser mt-2'>";
                    echo "<div id='privateKenkyoUser'>";
                    echo str_replace(";", " ", $this->Form->control("kenkyoPrv", ["label" => false, "class" => "privateKenkyo prvUser", "multiple" => "checkbox", "options" => $kenkyo]));
                    echo "</div>";
                    echo "</div>";
                    echo "</div><div class='col'>";
                    echo "<div class='privateGroup border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='privateSystem' name='privateGroup' type='checkbox'>システム監査班</label>";
                    echo "</div>";
                    echo "<div class='privateUser mt-2'>";
                    echo "<div id='privateSystemUser'>";
                    echo str_replace(";", " ", $this->Form->control("systemPrv", ["label" => false, "class" => "privateSystem prvUser", "multiple" => "checkbox", "options" => $system]));
                    echo "</div>";
                    echo "</div>";
echo "</div><div class='col'>";
                    echo "<div class='privateGroup border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='privateKintai' name='privateGroup' type='checkbox'>緊急対処班</label>";
                    echo "</div>";
                    echo "<div class='privateUser mt-2'>";
                    echo "<div id='privateKintaiUser'>";
                    echo str_replace(";", " ", $this->Form->control("kintaiPrv", ["label" => false, "class" => "privateKintai prvUser", "multiple" => "checkbox", "options" => $kintai]));
                    echo "</div>";
                    echo "</div>";
                    echo "</div></div>";
                    echo "</div>";
                    //------privateMessage--------------
                    
                    //filesへの入力
                    echo "<div class='row mt-4'><div class='col'>";
                    echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                    echo "</div><div class='col'>";
                    echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                    echo "</div></div>";
                    echo "</div><div class='col-md-3'></div></div>";
                ?>
            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
