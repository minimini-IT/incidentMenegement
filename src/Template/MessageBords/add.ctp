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
                <p>選択肢の作成</p>
                <ul>
                  <li>選択肢の数を入力（上限６）</li>
                  <li>選択肢作成を押す</li>
                  <li>選択肢の数を訂正する場合はやり直しを押す</li>
                </ul>
                <p style="color:red;">選択肢を設定しなくても作成できるようになっているが選択肢がなくてはユーザがコメントできない</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('メッセージボード作成') ?></h3>
            <?= $this->Form->create($messageBord, ["type" => "file"]); ?>
                <?php
                    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                    echo $this->Form->control('title', ["label" => "タイトル", "class" => "form-control"]);
                    echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "label" => "作成者", "type" => "select", "options" => $createUser, "class" => "form-control"]));
                    echo $this->Form->control('message_statuses_id', ["label" => "ステータス", 'options' => $messageStatuses, "class" => "form-control"]);
                    echo "<p style='color:red;'>選択肢は必ず１つは作成してください</p>";
                    echo $this->Form->control('choice', ["value" => 0, "label" => "追加する選択肢の数", "max" => 5, "min" => 0, "class" => "form-control"]);
                    echo "<button id='reload' type='button' class='btn btn-danger'>選択肢作成</button>";
                    echo "<button id='reset' type='button' class='btn btn-danger'>やり直し</button>";
                    echo "<div class='choiceContent'>";
                    echo "<label id='contentLabel' for='content'>選択肢</label>";
                    echo "<input class='contentInput form-control' name='content[0]' type='text' required />";
                    echo "</div>";
                    echo str_replace(";", " ", $this->Form->control("allUser", ["label" => "閲覧可能ユーザ", "multiple" => "checkbox", "options" => $allUser, "class" => "privateAllUser"]));
echo "<div class='row'><div class='col'>";
                    echo "<div id='privateGroup'>";
                    echo "<label><input id='privateSoukatu' name='privateGroup' type='checkbox'>総括班</label>";
                    echo "<label><input id='privateKenkyo' name='privateGroup' type='checkbox'>研究・教育班</label>";
                    echo "<label><input id='privateSystem' name='privateGroup' type='checkbox'>システム監査班</label>";
                    echo "<label><input id='privateKintai' name='privateGroup' type='checkbox'>緊急対処班</label>";
                    echo "</div>";
                    echo "<div id='privateUser'>";
                    echo "<label>閲覧許可ユーザ</label>";
                    echo "<div id='privateSoukatuUser'>";
                    echo str_replace(";", " ", $this->Form->control("soukatuPrv", ["label" => false, "class" => "privateSoukatu prvUser", "multiple" => "checkbox", "options" => $soukatu]));
                    echo "</div>";
                    echo "<div id='privateKenkyoUser'>";
                    echo str_replace(";", " ", $this->Form->control("kenkyoPrv", ["label" => false, "class" => "privateKenkyo prvUser", "multiple" => "checkbox", "options" => $kenkyo]));
                    echo "</div>";
                    echo "<div id='privateSystemUser'>";
                    echo str_replace(";", " ", $this->Form->control("systemPrv", ["label" => false, "class" => "privateSystem prvUser", "multiple" => "checkbox", "options" => $system]));
                    echo "</div>";
                    echo "<div id='privateKintaiUser'>";
                    echo str_replace(";", " ", $this->Form->control("kintaiPrv", ["label" => false, "class" => "privateKintai prvUser", "multiple" => "checkbox", "options" => $kintai]));
                    echo "</div>";
                    echo "</div>";
                    /// private ///
                    
                    echo $this->Form->control('message', ["label" => "メッセージ"]);
                    echo $this->Form->control('period', ["label" => "期限"]);

                    ////    destination ////
                    echo "<p style='color:red;'>宛先ユーザが不要な場合はクロノロジー形式を推奨</p>";
                    echo "<label><input id='allUser' type='checkbox'>全選択</label>";
                    echo "<div id='group'>";
                    echo "<label><input id='soukatu' name='group' type='checkbox'>総括班</label>";
                    echo "<label><input id='kenkyo' name='group' type='checkbox'>研究・教育班</label>";
                    echo "<label><input id='system' name='group' type='checkbox'>システム監査班</label>";
                    echo "<label><input id='kintai' name='group' type='checkbox'>緊急対処班</label>";
                    echo "</div>";
                    echo "<div id='destinationUser'>";
                    echo "<label>宛先ユーザ</label>";
                    echo "<div id='soukatuUser'>";
                    echo str_replace(";", " ", $this->Form->control("soukatuDest", ["label" => false, "class" => "soukatu destUser", "multiple" => "checkbox", "options" => $soukatu]));
                    echo "</div>";
                    echo "<div id='kenkyoUser'>";
                    echo str_replace(";", " ", $this->Form->control("kenkyoDest", ["label" => false, "class" => "kenkyo destUser", "multiple" => "checkbox", "options" => $kenkyo]));
                    echo "</div>";
                    echo "<div id='systemUser'>";
                    echo str_replace(";", " ", $this->Form->control("systemDest", ["label" => false, "class" => "system destUser", "multiple" => "checkbox", "options" => $system]));
                    echo "</div>";
                    echo "<div id='kintaiUser'>";
                    echo str_replace(";", " ", $this->Form->control("kintaiDest", ["label" => false, "class" => "kintai destUser", "multiple" => "checkbox", "options" => $kintai]));
                    echo "</div>";
                    //destination   ////

                    echo "</div>";
                    //filesへの入力
                    echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false, "class" => "form-control-file"]);
                    echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                    echo "</div><div class='col-md-3'></div></div>";
                ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
