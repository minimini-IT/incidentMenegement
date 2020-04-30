<?php
$this->assign("title", "予定作成"); 
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
                    <?= $this->Html->link(__('予定一覧'), ["controller" => "Schedules", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('予定作成') ?></h3>
            <?= $this->Form->create($schedule) ?>
                <fieldset>
                    <?php
                        echo "<div class='row'><div class='col-md-1'></div><div class='col-md-8'>";
                        echo "<div class='mt-4 row'><div class='col'>";
                        echo $this->Form->control('schedule_start_date', ["label" => "開始日", "type" => "text", "class" => "form-control datepicker", "value" => date("Y/m/d")]);
                        echo "</div>";
                        echo "<div class='col'>";
                        echo $this->Form->control('schedule_end_date', ["label" => "終了日", "type" => "text", "class" => "form-control datepicker", "value" => date("Y/m/d")]);
                        echo "</div></div>";
                        echo "<div class='mt-4 row'><div class='col-md-4'>";
                        echo $this->Form->control("schedule_start_time", ["label" => "開始時間(24時間表記)", "type" => "text", "class" =>"form-control", "placeholder" => "例) 0930 -> 09:30"]);
                        echo "</div><div class='col-md-4'>";
                        echo $this->Form->input('repe_flag', [
                            "type" => "checkbox", 
                            "label" => "繰り返し条件",
                            "class" => "form-check-input",
                            "templates" => [
                                "nestingLabel" => "<div class='form-check'><label id='dayOfWeek' class='form-check-lebel'>{{input}}{{text}}</label></div>"
                            ]
                        ]);
                        echo "</div><div class='col-md-4 dayOfWeek'>";
                        echo $this->Form->control("scheduleRepeats", ["class" => "repeats", "label" => false, "multiple" => "checkbox", "options" => $repeats]);
                        echo "</div></div>";
                        echo "<div class='mt-4'>";
                        echo $this->Form->control('schedule', ["label" => "スケジュール", "class" => "form-control"]);
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
