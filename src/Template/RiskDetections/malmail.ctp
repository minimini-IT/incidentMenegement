<?php
    $this->assign("title", "不審メール"); 
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
                    <?= $this->Html->link(__('ステータス追加'), ['controller' => 'Statuses', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('報告有無追加'), ['controller' => 'Reports', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('検知状況追加'), ['controller' => 'Positives', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('SecLevel追加'), ['controller' => 'SecLevels', 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('感染経路追加'), ['controller' => 'InfectionRoutes', 'action' => 'add'], ["class" => $sideberClass]) ?>
                </div>
                <p>値を何も入れずに検索を押すと全検索となる</p>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('不審メール') ?></h3>
            <h5 class="my-4 branch text-info"><?= __('検索') ?></h5>
            <div class="node">
                <?= $this->Form->create("", [
                    "type" => "get",
                    "url" => [
                        "controller" => "risk_detections",
                        "action" => "malmail"
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
                        <div class="col-md-3 mb-2 pt-4">
                            <label>添付ファイル</label>
                            <?= $this->Form->select("attachment", ["なし", "あり"], ["empty" => true]) ?>
                        </div>
                        <div class="col-md-3 mb-2 pt-4">
                            <label>リンク</label>
                            <?= $this->Form->select("link", ["なし", "あり"], ["empty" => true]) ?>
                        </div>
                        <div class="col-md-3 mb-2"></div>
                        <div class="col-md-8 mb-2">
                            <?= $this->Form->control("comment", ["label" => "基本情報", "class" => "form-control"]) ?>
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
                        "action" => "malmail"
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
            <div class="row border-bottom">
                <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("インシデントID") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("対処開始時刻") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("基地") ?></p></div>
                <div class="col-md-2 text-center border-top-0 font-weight-bold px-0"><p class="tableHeader"><?= __("ステータス") ?></p></div>
                <div class="col-md-1 text-center border-top-0 px-0 font-weight-bold"><p class="tableHeader"><?= __("報告の有無") ?></p></div>
                <div class="col-md-1 text-center border-top-0 px-0 font-weight-bold"><p class="tableHeader"><?= __("Sec Level") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("添付ファイル") ?></p></div>
                <div class="col-md-1 text-center border-top-0 font-weight-bold"><p class="tableHeader"><?= __("リンク") ?></p></div>
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
                    <div class="col-md-1 text-center border-top-0">
                        <?= $riskDetection->basis != null ? "<p>".h($riskDetection->basis->base)."</p>" : "<p style='color: red;'>未入力</p>" ?>
                    </div>
                    <div class="col-md-2 text-center border-top-0"><p><?= $riskDetection->status->status ?></p></div>
                    <div class="col-md-1 text-center border-top-0"><p><?= $riskDetection->report->report ?></p></div>
                    <div class="col-md-1 text-center border-top-0"><p><?= $riskDetection->sec_level->sec_level ?></p></div>
                    <div class="col-md-1 text-center border-top-0"><p><?= $riskDetection->attachment == true ? "あり" : "なし" ?></p></div>
                    <div class="col-md-1 text-center border-top-0"><p><?= $riskDetection->link == true ? "あり" : "なし" ?></p></div>
                    <div class="col-md-1 text-center border-top-0">
                        <div class="my-3">
                            <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $riskDetection->risk_detections_id]) ?></span>
                            <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $riskDetection->risk_detections_id], ['confirm' => __('このインシデントを削除してよろしいですか？ {0}', h($riskDetection->incident_management->management_prefix->management_prefix) . "-" .  $riskDetection->incident_management->created->format("Ymd") . "-" .  h($riskDetection->incident_management->number))]) ?></span>
                        </div>
                    </div>
                </div>
                <div class="node px-4 border-bottom">
                    <div class="row">
<!--
                        <div class="col-md-3 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("侵入経路") ?></p></div>
-->
                        <div class="col-md-3 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("システム") ?></p></div>
                        <div class="col-md-3 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("部隊") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("正・誤検知") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("発生時刻") ?></p></div>
                        <div class="col-md-2 text-center border-top-0 font-weight-bold"><p class="tableHeader my-2"><?= __("対処完了時刻") ?></p></div>
                    </div>
                    <div class="row">
<!--
                        <div class="col-md-3 text-center border-top-0"><p class="mb-2 mt-0"><?= h($riskDetection->infection_route->infection_route) ?></p></div>
-->
                        <div class="col-md-3 text-center border-top-0"><p class="md-2 mt-0"><?= $riskDetection->system->system ?></p></div>
                        <div class="col-md-3 text-center border-top-0">
                            <?= $riskDetection->unit != null ? "<p class='mb-2 mt-0'>".h($riskDetection->unit->unit)."</p>" : "<p class='mb-2 mt-0' style='color: red;'>未入力</p>" ?></p>
                        </div>
                        <div class="col-md-2 text-center border-top-0"><p class="mb-2 mt-0"><?= h($riskDetection->positive->positive) ?></p></div>
                        <div class="col-md-2 text-center border-top-0">
                            <?= $riskDetection->occurrence_datetime != null ? "<p class='mb-2 mt-0'>".h($riskDetection->occurrence_datetime->format("Y-m-d H:i"))."</p>" : "<p class='mb-2 mt-0' style='color: red;'>未入力</p>" ?>
                        </div>
                        <div class="col-md-2 text-center border-top-0">
                            <?= $riskDetection->response_end_time != null ? "<p class='mb-2 mt-0'>".h($riskDetection->response_end_time->format("Y-m-d H:i"))."</p>" : "<p class='mb-2 mt-0' style='color: red;'>未入力</p>" ?>
                        </div>
                    </div>
                    <div class="row border-bottom">
                        <div class="col-md-1 font-weight-bold"><p class="tableHeader"><?= __("基本情報") ?></p></div>
                        <div class="col-md-10 border mb-3"><?= $this->Text->autoparagraph($riskDetection->comment) ?></p></div>
                        <div class="col-md-1"></div>
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



<!--
        <?= $this->Form->control("systems_id", ["label" => "システム", "options" => $systems, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("bases_id", ["label" => "基地", "options" => $bases, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("units_id", ["label" => "部隊", "options" => $units, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("statuses_id", ["label" => "ステータス", "options" => $statuses, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("reports_id", ["label" => "報告の有無", "options" => $reports, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("positives_id", ["label" => "正・誤検知", "options" => $positives, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("sec_levels_id", ["label" => "Sec Level", "options" => $secLevels, "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("attachment", ["label" => "添付ファイル", "options" => [1 => "あり", 0 => "なし"], "hiddenField" => false, "empty" => true])?>
        <?= $this->Form->control("comment", ["label" => "基本情報"])?>
        <?= $this->Form->button(__('検索')) ?>
        <?= $this->Form->end() ?>
        <!- 検索初期化 ->
        <?= $this->Form->create("", [
            "type" => "post",
            "url" => [
                "controller" => "risk_detections",
                "action" => "malmail"
            ]
        ]) ?>
        <?= $this->Form->button(__('検索初期化')) ?>
        <?= $this->Form->end() ?>

    <table class="branch">
        <tbody>
            <tr>
                <td><?= 
                    h($riskDetection->incident_management->management_prefix->management_prefix) . "-" .  
                    $riskDetection->incident_management->created->format("Ymd") . "-" .  
                    h($riskDetection->incident_management->number)
                ?></td>
                <td><?= h($riskDetection->response_start_time->format("Y-m-d H:i")) ?></td>
                <td><?= $riskDetection->system->system ?></td>
                <td><?= $riskDetection->basis->base ?></td>
                <td><?= $riskDetection->unit->unit ?></td>
                <td><?= $riskDetection->status->status ?></td>
                <td><?= $riskDetection->report->report ?></td>
                <td><?= $riskDetection->positive->positive ?></td>
                <td><?= $riskDetection->sec_level->sec_level ?></td>
                <td><?= $riskDetection->attachment == 1 ? "あり" : "なし" ?></td>
                <td><?= $riskDetection->link == 1 ? "あり" : "なし" ?></td>
<?php /*
                <td><?= h($riskDetection->sim_live_flag) ?></td>
                <td><?= h($riskDetection->samari_flag) ?></td>
                <td><?= h($riskDetection->attachment) ?></td>
*/ ?>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $riskDetection->risk_detections_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $riskDetection->risk_detections_id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskDetection->risk_detections_id)]) ?>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="node">
        <div id="detection">
            <table>
                <tr>
                    <th>受信時刻</th>
                    <th>対処完了時刻</th>
                </tr>
                <tr>
                    <td><?= $riskDetection->occurrence_datetime != null ? h($riskDetection->occurrence_datetime->format("Y-m-d H:i")) : "" ?></td>
                    <td><?= $riskDetection->response_end_time != null ? h($riskDetection->response_end_time->format("Y-m-d H:i")) : "" ?></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th>受信者</th>
                </tr>
                <tr>
                    <?php foreach($riskDetection->suspicious_destination_addresses as $address): ?>
                        <td><?= $address->destination_address ?></td>
                    <?php endforeach ?>
                </tr>
            </table>
            <div>
                <?php 
                    echo $this->Form->create($destinationAddress, [
                      "url" => [
                        "controller" => "suspicious_destination_addresses",
                        "action" => "add"
                      ]
                    ]);
                    echo "<fieldset>";
                    echo $this->Form->control('risk_detections_id', ["type" => "hidden", 'value' => $riskDetection->risk_detections_id]);
                    echo $this->Form->control('destination_address', ["label" => "受信者", "class" => "address", "id" => null, "name" => "destination_address[0]"]);
                    echo "<input class='addAddress' type='button' value='追加' />";
                    echo "<input class='removeAddress' type='button' value='削除' />";
                    echo $this->Form->button(__('Submit'));
                    echo $this->Form->end();
                ?>
            </div>
            <table>
                <tr>
                    <th>リンク先</th>
                </tr>
                <tr>
                    <?php foreach($riskDetection->suspicious_links as $suspiciousLink): ?>
                        <td><?= $suspiciousLink->link ?></td>
                    <?php endforeach ?>
                </tr>
            </table>
            <div>
                <?php 
                    echo $this->Form->create($link, [
                      "url" => [
                        "controller" => "suspicious_links",
                        "action" => "add"
                      ]
                    ]);
                    echo "<fieldset>";
                    echo $this->Form->control('risk_detections_id', ["type" => "hidden", 'value' => $riskDetection->risk_detections_id]);
                    //echo $this->Form->control('link', ["type" => "text", "value" => ""]);
                    echo $this->Form->control('link', ["type" => "text", "label" => "リンク", "class" => "link", "id" => null, "name" => "link[0]"]);
                    echo "<input class='addLink' type='button' value='追加' />";
                    echo "<input class='removeLink' type='button' value='削除' />";
                    echo $this->Form->button(__('Submit'));
                    echo $this->Form->end();
                ?>
            </div>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>作成日時</th>
                <th>作成者</th>
                <th>処置内容</th>
                <th>備考</th>
            </tr>
            <?php $countID = 1 ?>
            <?php foreach ($riskDetection->incident_chronologies as $incident_chronology): ?>
            <tr>
                <td><?= $countID ?></td>
                <td><?= $incident_chronology->created->format("Y-m-d H:i") ?></td>
                <td><?= h($incident_chronology->user->first_name . $incident_chronology->user->last_name) ?></td>
                <td><?= $incident_chronology->message ?></td>
                <td><?= $incident_chronology->reference ?></td>
            </tr>
            <?php $countID++ ?>
            <?php endforeach ?>
        </table>
        <div>
        <!- incident_chronology 入力 ->
          <?php
            //ログインしているユーザ
            //$loginUser = $this->request->session()->read("Auth.User.users_id");
            $loginUser = $this->getRequest()->getSession()->read("Auth.User.users_id");

            echo $this->Form->create($incidentChronology, [
              "url" => [
                "controller" => "incident_chronologies",
                "action" => "add"
              ]
            ]); 
            echo "<fieldset>";
            echo str_replace(";", " ", $this->Form->control('users_id', ["value" => $loginUser, "type" => "select", "options" => $users])); 
            echo $this->Form->control('created');
            echo $this->Form->control('message', ["type" => "textarea", "value" => ""]);
            echo $this->Form->control('reference', ["type" => "textarea", "value" => ""]);
            echo $this->Form->control('risk_detections_id', ["type" => "hidden", 'value' => $riskDetection->risk_detections_id]);
            echo $this->Form->button(__('Submit'));
            echo $this->Form->end();
          ?>

        </div>
    </div>

    


    <!- ここまで ->
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
-->
