<?php
    $this->assign("title", "リスク検知"); 
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
                    <?= $this->Html->link(__('新規作成'), ['action' => 'riskAdd'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ['action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('システム追加'), ['controller' => 'Systems', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('基地追加'), ['controller' => 'Bases', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('部隊追加'), ['controller' => 'Units', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('ステータス'), ['controller' => 'Statuses', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('報告有無追加'), ['controller' => 'Reports', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('検知状況追加'), ['controller' => 'Positives', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('SecLevel追加'), ['controller' => 'SecLevels', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('感染経路追加'), ['controller' => 'InfectionRoutes', 'action' => 'add'], ["class" => $sideberClass]) ?>
                </div>
                <p>値を何も入れずに検索を押すと全検索となる</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('リスク検知') ?></h3>
            <h5 class="my-4 branch text-info"><?= __('検索') ?></h5>
            <div class="node">
                <?= $this->Form->create("", [
                    "type" => "get",
                    "url" => [
                        "controller" => "risk_detections",
                        "action" => "risk"
                    ]
                ]) ?> 
                    <div class='row'>
                        <div class='col-md-3 mb-2'>
                            <?= $this->Form->control('response_start_time', ["label" => "対処開始日", "type" => "text", "class" => "datepicker form-control input-sm"]) ?>
                        </div>
                        <div class='col-md-3 mb-2'>
                            <?= $this->Form->control('response_start_time_end', ["label" => "〜", "type" => "text", "class" => "datepicker form-control"]) ?>
                        </div>
                        <div class='col-md-3 mb-2'>
                            <?= $this->Form->control("systems_id", ["label" => "システム", "options" => $systems, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("bases_id", ["label" => "基地", "options" => $bases, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("units_id", ["label" => "部隊", "options" => $units, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("statuses_id", ["label" => "ステータス", "options" => $statuses, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("reports_id", ["label" => "報告の有無", "options" => $reports, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("positives_id", ["label" => "正・誤検知", "options" => $positives, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("sec_levels_id", ["label" => "Sec Level", "options" => $secLevels, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("infection_routes_id", ["label" => "侵入経路", "options" => $infectionRoutes, "hiddenField" => false, "empty" => true, "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2">
                            <?= $this->Form->control("comment", ["label" => "基本情報", "class" => "form-control"]) ?>
                        </div>
                        <div class="col-md-3 mb-2"></div>
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 mb-2">
                            <?= $this->Form->button('検索', ["class" => "btn btn-info mt-4 float-right"]) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>

                <!-- 検索初期化 -->
                <?= $this->Form->create("", [
                    "type" => "post",
                    "url" => [
                        "controller" => "risk_detections",
                        "action" => "risk"
                    ]
                ]) ?> 
                    <div class="row">
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 mb-2">
                        </div>
                        <div class="col-md-4 mb-2">
                            <?= $this->Form->button('検索初期化', ["class" => "btn btn-info float-right"]) ?>
                        </div>
                    </div>
                <?= $this->Form->end() ?>
            </div>

            <!-- unit, positive 削除した -->
            <div class="row border-bottom">
                <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("インシデントID") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("対処開始時刻") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("基地") ?></p></div>
                <div class="col-md-3 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("システム") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold px-0"><p class="tableHeader"><?= __("ステータス") ?></p></div>
                <div class="col-md-1 text-center border-top-0 px-0 font-weight-bold"><p class="tableHeader"><?= __("編集・削除") ?></p></div>
            </div>
            <?php $i = 0 ?>
            <?php foreach ($riskDetections as $riskDetection): ?>
                <div class="branch border-bottom row">
                    <div class="col-md-2 text-left border-top-0"><p class="incidentManagementsId" name="incidentId[<?= $i ?>]"><?= 
                        h($riskDetection->incident_management->management_prefix->management_prefix) . "-" .  
                        $riskDetection->incident_management->created->format("Ymd") . "-" .  
                        h($riskDetection->incident_management->number)
                    ?></p></div>
                    <div class="col-md-2 text-center border-top-0"><p><?= h($riskDetection->response_start_time->format("Y-m-d H:i")) ?></p></div>
                    <div class="col-md-2 text-center border-top-0">
                        <?= $riskDetection->basis != null ? "<p>".h($riskDetection->basis->base)."</p>" : "<p style='color: red;'>未入力</p>" ?>
                    </div>
                    <div class="col-md-3 text-center border-top-0"><p><?= $riskDetection->system->system ?></p></div>
                    <div class="col-md-2 text-center border-top-0"><p><?= $riskDetection->status->status ?></p></div>
                    <div class="col-md-1 text-center border-top-0">
                        <div class="my-3">
                            <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $riskDetection->risk_detections_id]) ?></span>
                            <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $riskDetection->risk_detections_id], ['confirm' => __('このインシデントを削除してよろしいですか？ {0}', h($riskDetection->incident_management->management_prefix->management_prefix) . "-" .  $riskDetection->incident_management->created->format("Ymd") . "-" .  h($riskDetection->incident_management->number))]) ?></span>
                        </div>
                    </div>
                </div>
                <div class="node px-4 border-bottom">
                    <div class="row">
                        <div class="col-md-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("部隊") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("侵入経路") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("正・誤検知") ?></p></div>
                        <div class="col-md-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("Sec Level") ?></p></div>
                        <div class="col-md-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("報告の有無") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("発生時刻") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("対処完了時刻") ?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center border-top-0 px-0 align-self-center">
                            <?= $riskDetection->unit != null ? "<p>".h($riskDetection->unit->unit)."</p>" : "<p style='color: red;'>未入力</p>" ?></p>
                        </div>
                        <div class="col-md-2 text-center border-top-0 px-0 align-self-center"><p><?= h($riskDetection->infection_route->infection_route) ?></p></div>
                        <div class="col-md-2 text-center border-top-0 px-0 align-self-center"><p><?= h($riskDetection->positive->positive) ?></p></div>
                        <div class="col-md-1 text-center border-top-0 px-0 align-self-center"><p><?= h($riskDetection->sec_level->sec_level) ?></p></div>
                        <div class="col-md-1 text-center border-top-0 px-0 align-self-center"><p><?= h($riskDetection->report->report) ?></p></div>
                        <div class="col-md-2 text-center border-top-0 px-0 align-self-center">
                            <?= $riskDetection->occurrence_datetime != null ? "<p>".h($riskDetection->occurrence_datetime->format("Y-m-d H:i"))."</p>" : "<p style='color: red;'>未入力</p>" ?>
                        </div>
                        <div class="col-md-2 text-center border-top-0 px-0 align-self-center">
                            <?= $riskDetection->response_end_time != null ? "<p>".h($riskDetection->response_end_time->format("Y-m-d H:i"))."</p>" : "<p style='color: red;'>未入力</p>" ?>
                        </div>
                    </div>
                    <?php if($riskDetection->infection_routes_id == 2): ?>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold align-self-center"><p class="tableHeader"><?= __("リンク先") ?></p></div>
                            <div class="col-md-10 border-bottom">
                                <?php foreach($riskDetection->suspicious_links as $link): ?>
                                    <p><?= $link->link ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold align-self-center"><p class="tableHeader"><?= __("宛先アドレス") ?></p></div>
                            <div class="col-md-10 border-bottom">
                                <?php foreach($riskDetection->suspicious_sender_addresses as $sendAddress): ?>
                                    <p><?= $sendAddress->sender_address ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 font-weight-bold align-self-center"><p class="tableHeader"><?= __("送信元アドレス") ?></p></div>
                            <div class="col-md-10">
                                <?php foreach($riskDetection->suspicious_destination_addresses as $destAddress): ?>
                                    <p><?= $destAddress->destination_address ?></p>
                                <?php endforeach ?>
                            </div>
                        </div>
                    <?php endif ?>



                    <div class="row border-bottom">
                        <div class="col-md-1 font-weight-bold align-self-center"><p class="tableHeader"><?= __("基本情報") ?></p></div>
                        <div class="col-md-11 border mb-3"><?= $this->Text->autoparagraph($riskDetection->comment) ?></div>
                    </div>
                    <?php foreach ($riskDetection->incident_chronologies as $incident_chronology): ?>
                        <div class="row align-items-center border-bottom">
                            <?= $this->Html->link($incident_chronology->user->first_name . $incident_chronology->user->last_name, ["controller" => "IncidentChronologies", 'action' => 'edit', $incident_chronology->incident_chronologies_id]) ?>
                            <div class="col-md-2"><p><?= $incident_chronology->created->format("Y/m/d H:i") ?></p></div>
                            <div class="col-md-7"><?= $this->Text->autoparagraph($incident_chronology->message) ?></div>
                            <div class="col-md-2 border-left"><?= $this->Text->autoparagraph($incident_chronology->reference) ?></div>
                        </div>
                    <?php endforeach ?>
                    <div class="mb-4">
                        <?= $this->Form->create($incidentChronology, [
                            "url" => [
                              "controller" => "incident_chronologies",
                              "action" => "add"
                            ]
                        ]) ?> 
                           <fieldset>
                                <div class="row">
                                    <div class="col-md-3 mt-4">
                                        <?= str_replace(";", " ", $this->Form->control('users_id', ["label" => "ユーザ", "value" => $loginUser, "type" => "select", "options" => $users, "class" => "form-control"])) ?>
                                    </div>
                                    <div class="col-md-9 mt-4"></div>
                                    <div class="col-md-8 mt-4">
                                        <?= $this->Form->control('message', ["label" => "処置内容", "type" => "textarea", "class" => "form-control"]) ?>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <?= $this->Form->control('reference', ["label" => "備考", "type" => "textarea", "class" => "form-control"]) ?>
                                    </div>
                                    <?= $this->Form->control('risk_detections_id', ["type" => "hidden", 'value' => $riskDetection->risk_detections_id]) ?>
                                    <?= $this->Form->control('created', ["type" => "hidden"]) ?>
                                    <div class="col-md-12 mt-4">
                                        <?= $this->Form->button('送信', ["class" => "btn btn-info float-right"]) ?>
                                    </div>
                                </div>
                           </fieldset>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>
