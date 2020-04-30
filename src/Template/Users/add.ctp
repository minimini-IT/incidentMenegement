<?php 
    $this->assign("title", "ユーザ作成"); 
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
                    <?= $this->Html->link(__('ユーザ'), ['controller' => 'Users', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('班'), ['controller' => 'Belongs', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('階級'), ['controller' => 'Ranks', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('ユーザ作成') ?></h3>
            <?= $this->Form->create($user) ?>
                <fieldset>
                    <?php
                        echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                        echo "<div class='row mt-4'><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('first_name', ["label" => "姓", "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('last_name', ["label" => "名", "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('username', ["label" => "ユーザID", "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('belong_id', ["label" => "所属班", 'options' => $belongs, "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('ranks_id', ["label" => "階級", 'options' => $ranks, "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('roles_id', ["label" => "ロール", 'options' => $roles, "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('password', ["label" => "パスワード", "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo $this->Form->control('user_sort_number', ["label" => "ソート番号", "class" => "form-control"]);
                        echo "</div><div class='col-md-4 mt-4'>";
                        echo "</div></div><div class='mt-4'>";
                        echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                        echo "</div></div><div class='col-md-3'></div></div>";
                    ?>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
