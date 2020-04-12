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
<?php $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id"); ?>
<div class="messageBords form large-9 medium-8 columns content">
    <?= $this->Form->create($messageBord, ["type" => "file"]); ?>
    <fieldset>
        <legend><?= __('メッセージボード編集') ?></legend>
        <?php
            echo $this->Form->control('title', ["label" => "タイトル"]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "label" => "作成者", "type" => "select", "options" => $users]));
            echo $this->Form->control('message_statuses_id', ["label" => "ステータス", 'options' => $messageStatuses]);
            echo "<p style='color:red;'>※選択肢の追加</p>";
            echo "<p style='color:red;'>※選択肢の編集・削除は一覧から</p>";
            echo $this->Form->control('choice', ["value" => 0, "label" => "選択肢の数", "max" => 6, "min" => 0]);
            echo "<input id='reload' type='button' value='選択肢作成' />";
            echo "<input id='reset' type='button' value='やり直し' />";
            echo "<div class='choiceContent'>";
            echo "<label id='contentLabel' for='content'>選択肢</label>";
            echo "<input class='contentInput' name='content[0]' type='text' />";
            echo "</div>";

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

            ////    destination ////
            echo "<p style='color: red;'>あて先ユーザの追加のみ</p>";
            echo "<p style='color: red;'>あて先ユーザの削除は一覧から</p>";
            echo "<p>選択済みユーザ</p>";
            foreach($destinationUser->message_destinations as $user)
            {
                echo "<p style='color: red;'>{$user->user->first_name}" . "{$user->user->last_name}</p>";
            }
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
            echo str_replace(";", " ", $this->Form->control("soukatuDest", ["label" => false, "class" => "soukatu destUser", "multiple" => "checkbox", "options" => $destinationSoukatu]));
            echo "</div>";
            echo "<div id='kenkyoUser'>";
            echo str_replace(";", " ", $this->Form->control("kenkyoDest", ["label" => false, "class" => "kenkyo destUser", "multiple" => "checkbox", "options" => $destinationKenkyo]));
            echo "</div>";
            echo "<div id='systemUser'>";
            echo str_replace(";", " ", $this->Form->control("systemDest", ["label" => false, "class" => "system destUser", "multiple" => "checkbox", "options" => $destinationSystem]));
            echo "</div>";
            echo "<div id='kintaiUser'>";
            echo str_replace(";", " ", $this->Form->control("kintaiDest", ["label" => false, "class" => "kintai destUser", "multiple" => "checkbox", "options" => $destinationKintai]));
            echo "</div>";
            echo "</div>";
            //destination   ////
            
            //filesへの入力
            echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
