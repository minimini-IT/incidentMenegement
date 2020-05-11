<?php
    $this->assign("title", "リスク編集"); 
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
                    <?= $this->Html->link(__('サイバー攻撃等'), ['action' => 'index'], ["class" => $sideberClass]) ?>
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
                    $riskDetection->incident_management->management_prefix->management_prefix . '-' .  
                    $riskDetection->incident_management->created->format('Ymd') . '-' .  
                    $riskDetection->incident_management->number .
                    " 編集"
                ) ?>
            </h3>
            <?= $this->Form->create($riskDetection) ?>
                <fieldset>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                    <?= $this->Form->control('response_start_time', ["label" => "対処開始時刻", "name" => "response_start_time[]", "type" => "text", "class" => "form-control datepicker"]) ?>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                    <?= $this->Form->control('response_start_time', ["label" => false, "name" => "response_start_time[]", "type" => "text", "class" =>"form-control", "placeholder" => "09:30"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('occurrence_datetime', ["label" => "発生時刻", "name" => "occurrence_datetime[]", "type" => "text", "class" => "form-control datepicker"]) ?>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <?= $this->Form->control('occurrence_datetime', ["label" => false, "name" => "occurrence_datetime[]", "type" => "text", "class" =>"form-control", "placeholder" => "09:30"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('response_end_time', ["label" => "対処終了時刻", "name" => "response_end_time[]", "type" => "text", "class" => "form-control datepicker"]) ?>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <?= $this->Form->control('response_end_time', ["label" => false, "name" => "response_end_time[]", "type" => "text", "class" =>"form-control", "placeholder" => "09:30"]) ?>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?= $this->Form->control('systems_id', ["label" => "システム", 'options' => $systems, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('bases_id', ["label" => "基地", 'options' => $bases, 'empty' => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('units_id', ["label" => "部隊", 'options' => $units, 'empty' => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('statuses_id', ["label" => "ステータス", 'options' => $statuses, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <?= $this->Form->control('reports_id', ["label" => "報告の有無", 'options' => $reports, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('positives_id', ["label" => "正/誤検知", 'options' => $positives, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('sec_levels_id', ["label" => "SecLevel", 'options' => $secLevels, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3">
                            <?= $this->Form->control('infection_routes_id', ["label" => "侵入経路", 'options' => $infectionRoutes, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <?= $this->Form->control('sim_live_flag', ["label" => "シム/ライブ"]) ?>
                        </div>
                        <div class="col-md-2">
                            <?= $this->Form->control('samari_flag', ["label" => "サマリ強制表示"]) ?>
                        </div>
                        <div class="col-md-7"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <?= $this->Form->control('comment', ["label" => "基本情報", "type" => "textarea", "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                        <?= $this->Form->control('attachment', ["type" => "hidden"]) ?>
                        <?= $this->Form->control('incident_cases_id', ["type" => "hidden"]) ?>
                    <div class="row mt-4">
                        <div class="col-md-11">
                            <?= $this->Form->button('送信', ["class" => "btn btn-info float-right"]) ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
