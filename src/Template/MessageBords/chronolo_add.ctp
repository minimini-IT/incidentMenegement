<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('ステータス追加'), ["controller" => "MessageStatuses", 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('戻る'), ["controller" => "MessageBords", 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('TOPへ'), ['controller' => 'Dairy', 'action' => 'index']) ?></li>
    </ul>
  <p>必要に応じて左のACTIONSからステータスを追加できる</p>
  <p>クロノロジー形式のメッセージボード</p>
</nav>
<?php $loginUser = $this->request->session()->read("Auth.User.users_id"); ?>

<div class="messageBords form large-9 medium-8 columns content">
    <?= $this->Form->create($messageBord, ["type" => "file"]); ?>
    <fieldset>
        <legend><?= __('メッセージボード作成') ?></legend>
        <?php
            echo $this->Form->control('title', ["label" => "タイトル"]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "label" => "作成者", "type" => "select", "options" => $users]));
            echo $this->Form->control('message_statuses_id', ["label" => "ステータス", 'options' => $messageStatuses]);
            //echo $this->Form->control('choice', ["type" => "hidden", "value" => 0]);
            echo $this->Form->control('message', ["label" => "メッセージ"]);
            echo $this->Form->control('period', ["label" => "期限"]);
            echo $this->Form->control('chronology_flag', ["value" => 1, "type" => "hidden"]);

            //------privateMessage--------------
            echo str_replace(";", " ", $this->Form->control("allUser", ["label" => "閲覧可能ユーザ", "multiple" => "checkbox", "options" => $allUser, "class" => "privateAllUser"]));
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
            //------privateMessage--------------
            
            //filesへの入力
            echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
