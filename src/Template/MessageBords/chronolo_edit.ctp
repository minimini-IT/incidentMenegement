<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MessageBord $messageBord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('戻る'), ['controller' => 'MessageBords', 'action' => 'index']) ?></li>
    </ul>
    <p>編集する場合、ユーザは選択しなおし</p>
    <p>選択肢のみ一覧から編集</p>
</nav>
<?php $max = 5 - (int)count($messageChoices) ?>
<?php $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id"); ?>
<div class="messageBords form large-9 medium-8 columns content">
    <?= $this->Form->create($messageBord, ["type" => "file"]); ?>
    <fieldset>
        <legend><?= __('メッセージボード編集') ?></legend>
        <?php
            echo $this->Form->control('title', ["label" => "タイトル"]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "label" => "作成者", "type" => "select", "options" => $users]));
            echo $this->Form->control('message_statuses_id', ["label" => "ステータス", 'options' => $messageStatuses]);

            //---------private user-------------
            echo "<p style='color: red;'>閲覧可能ユーザの追加のみ</p>";
            echo "<p style='color: red;'>閲覧可能ユーザの削除は一覧から</p>";
            echo "<p>選択済みユーザ</p>";
            foreach($privateUser->private_messages as $user)
            {
                echo "<p style='color: red;'>{$user->user->first_name}" . "{$user->user->last_name}</p>";
            }
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
            echo str_replace(";", " ", $this->Form->control("soukatuPrv", ["label" => false, "class" => "privateSoukatu prvUser", "multiple" => "checkbox", "options" => $privateSoukatu]));
            echo "</div>";
            echo "<div id='privateKenkyoUser'>";
            echo str_replace(";", " ", $this->Form->control("kenkyoPrv", ["label" => false, "class" => "privateKenkyo prvUser", "multiple" => "checkbox", "options" => $privateKenkyo]));
            echo "</div>";
            echo "<div id='privateSystemUser'>";
            echo str_replace(";", " ", $this->Form->control("systemPrv", ["label" => false, "class" => "privateSystem prvUser", "multiple" => "checkbox", "options" => $privateSystem]));
            echo "</div>";
            echo "<div id='privateKintaiUser'>";
            echo str_replace(";", " ", $this->Form->control("kintaiPrv", ["label" => false, "class" => "privateKintai prvUser", "multiple" => "checkbox", "options" => $privateKintai]));
            echo "</div>";
            echo "</div>";
            /// private ///
            
            echo $this->Form->control('message', ["label" => "メッセージ"]);
            echo $this->Form->control('period', ["label" => "期限"]);
            
            //filesへの入力
            echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
