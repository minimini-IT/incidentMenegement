<?php 
    $this->assign("title", "{$today}の予定一覧"); 
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
                    <?= $this->Html->link(__('ユーザ一覧'), ["controller" => "Users", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('勤務者入力'), ["controller" => "Workers", 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('予定入力'), ["controller" => "Schedules", 'action' => 'add'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __("{$today}の予定一覧") ?></h3>
            <table class="table">
                <thead>
                    <tr class="row">
                        <th class="col-md-2 text-center"><?= __("インシデントID") ?></th>
                        <th class="col-md-3 text-center"><?= __("スケジュール") ?></th>
                        <th class="col-md-2 text-center"><?= __("開始日") ?></th>
                        <th class="col-md-2 text-center"><?= __("終了日") ?></th>
                        <th class="col-md-1 text-center"><?= __("開始時刻") ?></th>
                        <th class="px-0 col-md-1 text-center"><?= __("繰り返し指定") ?></th>
                        <th class="px-0 col-md-1 text-center"><?= __("編集・削除") ?></th>
                    </tr>
                </thead>
            </table>
            <?php foreach ($today_schedules as $schedule): ?>
                <?php if(!empty($schedule->schedule_repeats)): ?>
                    <?php foreach($schedule->schedule_repeats as $repeat): ?>
                        <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                            <table class="branch border-bottom table">
                                <tbody>
                                    <tr class="row">
                                        <td class="border-top-0 col-md-2"><?=
                                            h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                                            $schedule->incident_management->created->format("Ymd") . "-" .  
                                            h($schedule->incident_management->number)
                                        ?></td>
                                        <td class="border-top-0 col-md-3 text-center"><?= h($schedule->schedule) ?></td>
                                        <td class="border-top-0 col-md-2 text-center"><?= $schedule->schedule_start_date->format("Y-m-d") ?></td>
                                        <td class="border-top-0 col-md-2 text-center"><?= $schedule->schedule_end_date->format("Y-m-d") ?></td>
                                        <td class="border-top-0 col-md-1 text-center"><?= $schedule->schedule_start_time->format("H:i") ?></td>
                                        <td class="border-top-0 col-md-1 text-center"><?= $schedule->repe_flag == (true) ? "○":"✖︎" ?></td>
                                        <td class="border-top-0 col-md-1 text-center px-0">
                                          <?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?>
                                          <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php if($schedule->repe_flag): ?>
                                <div class="node px-4">
                                    <div class="row mb-4">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <h5 class="my-4"><?= __("繰り返し指定") ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <table>
                                                <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                                    <tr>
                                                        <th><?= $repeat->repeat->repeat ?></th>
                                                    </tr>
                                                <?php endforeach ?>
                                            </table>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php else: ?>
                    <table class="branch border-bottom table">
                        <tbody>
                            <tr class="row">
                                <td class="border-top-0 col-md-2"><?=
                                    h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                                    $schedule->incident_management->created->format("Ymd") . "-" .  
                                    h($schedule->incident_management->number)
                                ?></td>
                                        <td class="border-top-0 col-md-3 text-center"><?= h($schedule->schedule) ?></td>
                                        <td class="border-top-0 col-md-2 text-center"><?= $schedule->schedule_start_date->format("Y-m-d") ?></td>
                                        <td class="border-top-0 col-md-2 text-center"><?= $schedule->schedule_end_date->format("Y-m-d") ?></td>
                                        <td class="border-top-0 col-md-1 text-center"><?= $schedule->schedule_start_time->format("H:i") ?></td>
                                        <td class="border-top-0 col-md-1 text-center"><?= $schedule->repe_flag == (true) ? "○":"✖︎" ?></td>
                                        <td class="border-top-0 col-md-1 text-center px-0">
                                  <?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?>
                                  <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php if($schedule->repe_flag): ?>
                        <div class="node px-4">
                            <div class="row mb-4">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <h5 class="my-4"><?= __("繰り返し指定") ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <table>
                                        <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                            <tr>
                                                <th><?= $repeat->repeat->repeat ?></th>
                                            </tr>
                                        <?php endforeach ?>
                                    </table>
                                </div>
                                <div class="col-md-5"></div>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
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
<!--
        <div class="col-md-10">
            <h3 class="my-4"><?= __("{$today}の予定一覧") ?></h3>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table">
                        <thead>
                            <tr class="row">
                                <th class="col-md-4"><?= __("インシデントID") ?></th>
                                <th class="col-md-5"><?= __("スケジュール") ?></th>
                                <th class="px-0 col-md-2"><?= __("開始時刻") ?></th>
                                <th class="px-0 col-md-1"><?= __("編集・削除") ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($today_schedules as $schedule): ?>
                                <?php if(!empty($schedule->schedule_repeats)): ?>
                                    <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                        <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                                            <tr class="row border-bottom branch">
                                                <td class="border-top-0 col-md-4"><?=
                                                    h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                                                    $schedule->incident_management->created->format("Ymd") . "-" .  
                                                    h($schedule->incident_management->number)
                                                ?></td>
                                                <td class="border-top-0 col-md-5"><?= h($schedule->schedule) ?></td>
                                                <td class="border-top-0 col-md-2"><?= $schedule->schedule_start_time->format("H:i") ?></td>
                                                <td class="border-top-0 col-md-1 text-center px-0">
                                                  <?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?>
                                                  <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?>
                                                </td>
                                            </tr>
                                            <tr class="node">
                                                <td><?= $schedule->schedule_start_date->format("Y-m-d") ?></td>
                                                <td><?= $schedule->schedule_end_date->format("Y-m-d") ?></td>
                                                <td><?= $schedule->repe_flag ?></td>
                                                <td><?= $schedule->created ?></td>
                                                <td><?= $schedule->modified ?></td>
                                            </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <tr class="row border-bottom branch">
                                        <td class="border-top-0 col-md-4"><?=
                                            h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                                            $schedule->incident_management->created->format("Ymd") . "-" .  
                                            h($schedule->incident_management->number)
                                        ?></td>
                                        <td class="border-top-0 col-md-5"><?= h($schedule->schedule) ?></td>
                                        <td class="border-top-0 col-md-2"><?= $schedule->schedule_start_time->format("H:i") ?></td>
                                        <td class="border-top-0 col-md-1 text-center px-0">
                                          <?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?>
                                          <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?>
                                        </td>
                                    </tr>
                                    <tr class="node">
                                        <td><?= $schedule->schedule_start_date->format("Y-m-d") ?></td>
                                        <td><?= $schedule->schedule_end_date->format("Y-m-d") ?></td>
                                        <td><?= $schedule->repe_flag ?></td>
                                        <td><?= $schedule->created ?></td>
                                        <td><?= $schedule->modified ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    </table>
                </div>
                <div class="col-md-1">
                </div>
            </div>
        </div>
    </div>
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
