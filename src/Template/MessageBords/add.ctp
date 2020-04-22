<?php
$this->assign("title", "メッセージボード作成"); 
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

                    echo "<div class='row'><div class='col-md-4'>";
                    echo "<div class='mt-4'>";
                    echo $this->Form->control('choice', ["value" => 0, "label" => "追加する選択肢の数", "max" => 5, "min" => 0, "class" => "form-control"]);
                    echo "</div>";
                    echo "<div class='mt-2 pl-4'>";
                    echo "<button id='reload' type='button' class='btn btn-danger'>選択肢作成</button>";
                    echo "<button id='reset' type='button' class='btn btn-danger ml-2'>やり直し</button>";
                    echo "</div></div>";
                    echo "<div class='col-md-8'>";
                    echo "<div class='choiceContent mt-4'>";
                    echo "<label id='contentLabel' for='content'>選択肢</label>";
                    echo "<input class='contentInput form-control' name='content[0]' type='text' required />";
                    echo "</div>";
                    echo "</div></div>";

                    /*
                    echo "<div class='mt-4'>";
                    echo "</div>";
                     */
                    /// private ///
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
                    /// private ///
                    //// destination ////
                    echo "<div class='mt-4'>";
                    echo "<p style='color:red;' class='mb-0'>宛先ユーザが不要な場合はクロノロジー形式を推奨</p>";
                    echo "<label>宛先ユーザ</label>";
                    echo "<div class='border-bottom border-info'><label class='mb-0'><input id='allUser' type='checkbox'>全選択</label></div>";
                    echo "<div class='row mt-2'><div class='col'>";
                    echo "<div class='group border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='soukatu' name='group' type='checkbox'>総括班</label>";
                    echo "</div>";
                    echo "<div id='soukatuUser' class='destinationUser mt-2'>"; 
                    echo str_replace(";", " ", $this->Form->control("soukatuDest", ["label" => false, "class" => "soukatu destUser", "multiple" => "checkbox", "options" => $soukatu]));
                    echo "</div>";
                    echo "</div><div class='col'>";

                    echo "<div class='group border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='kenkyo' name='group' type='checkbox'>研究・教育班</label>";
                    echo "</div>";
                    echo "<div id='kenkyoUser' class='destinationUser mt-2'>";
                    echo str_replace(";", " ", $this->Form->control("kenkyoDest", ["label" => false, "class" => "kenkyo destUser", "multiple" => "checkbox", "options" => $kenkyo]));
                    echo "</div>";
                    echo "</div><div class='col'>";

                    echo "<div class='group border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='system' name='group' type='checkbox'>システム監査班</label>";
                    echo "</div>";
                    echo "<div id='systemUser' class='destinationUser mt-2'>";
                    echo str_replace(";", " ", $this->Form->control("systemDest", ["label" => false, "class" => "system destUser", "multiple" => "checkbox", "options" => $system]));
                    echo "</div>";
                    echo "</div><div class='col'>";

                    echo "<div class='group border-bottom border-info'>";
                    echo "<label class='mb-0'><input id='kintai' name='group' type='checkbox'>緊急対処班</label>";
                    echo "</div>";
                    echo "<div id='kintaiUser' class='destinationUser mt-2'>";
                    echo str_replace(";", " ", $this->Form->control("kintaiDest", ["label" => false, "class" => "kintai destUser", "multiple" => "checkbox", "options" => $kintai]));
                    echo "</div>";
                    echo "</div></div>";
                    echo "</div>";

                    //filesへの入力
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
