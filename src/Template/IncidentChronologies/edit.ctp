<?php
    $this->assign("title", "クロノロ編集"); 
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
                    <?= $this->Html->link(__('システム追加'), ['controller' => 'Systems', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('基地追加'), ['controller' => 'Bases', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('部隊追加'), ['controller' => 'Units', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス追加'), ['controller' => 'Statuses', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('報告有無追加'), ['controller' => 'Reports', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('検知状況追加'), ['controller' => 'Positives', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('SecLevel追加'), ['controller' => 'SecLevels', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('感染経路追加'), ['controller' => 'InfectionRoutes', 'action' => 'add'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4">
                <?= __(
                    $incidentChronology->risk_detection->incident_management->management_prefix->management_prefix . '-' .  
                    $incidentChronology->risk_detection->incident_management->created->format('Ymd') . '-' .  
                    $incidentChronology->risk_detection->incident_management->number .
                    " 編集"
                ) ?>
            </h3>
            <?= $this->Form->create($incidentChronology) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?= $this->Form->control('risk_detections_id', ['options' => $riskDetections, "type" => "hidden"]) ?>
                            <?= str_replace(";", " ", $this->Form->control('users_id', ["label" => "ユーザ", "type" => "select", "options" => $users, "class" => "form-control"])) ?>
                        </div>
                        <div class="col-md-8"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-7">
                            <?= $this->Form->control('message', ["class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('reference', ["class" => "form-control"]) ?>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8"></div>
                        <div class="col-md-3">
                            <?= $this->Form->button('送信', ["class" => "btn btn-info float-right"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
