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
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="mt-4"><?= __("{$messageAnswer->message_destination->message_bord->title}　回答編集") ?></h3>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-8">
                    <h5 class="mt-4"><?= $messageAnswer->message_destination->user->first_name . $messageAnswer->message_destination->user->last_name ?></h5>
                </div>
                <div class="col-md-3"></div>
            </div>
            <?= $this->Form->create($messageAnswer); ?>
                <fieldset>
                    <?php
                        echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->control('message_destinations_id', ["type" => "hidden"]); 
                        echo "<label>選択肢</label>";
                        echo $this->Form->input('message_choices_id', [
                            "type" => "radio", 
                            "options" => $choices, 
                            "label" => false, 
                            "class" => "form-check-input",
                            "templates" => [
                                "nestingLabel" => "<div class='form-check'>{{input}}<label class='form-check-lebel'>{{text}}</label></div>"
                            ]
                        ]);
                        echo "</div>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->control('message', ["type" => "textarea", "label" => "メッセージ", "class" => "form-control"]);
                        echo "</div>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                        echo "</div>";
                        echo "</div><div class='col-md-3'></div></div>";
                    ?>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
