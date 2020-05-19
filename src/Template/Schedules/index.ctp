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
            <div class="row border-bottom">
                <div class="col-lg-2 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("インシデントID") ?></p></div>
                <div class="col-lg-3 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("スケジュール") ?></p></div>
                <div class="col-lg-2 border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("開始日") ?></p></div>
                <div class="col-lg-2 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("終了日") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 font-weight-bold px-0 align-self-center"><p class="tableHeader"><?= __("開始時刻") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("繰り返し指定") ?></p></div>
                <div class="col-lg-1 text-center border-top-0 px-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __('編集・削除') ?></p></div>
            </div>
            <?php foreach ($today_schedules as $schedule): ?>
                <?php if(!empty($schedule->schedule_repeats)): ?>
                    <?php foreach($schedule->schedule_repeats as $repeat): ?>
                        <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                            <div class="row border-bottom branch">
                                <div class="col-lg-2 text-left border-top-0 align-self-center"><p><?=
                                    h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                                    $schedule->incident_management->created->format("Ymd") . "-" .  
                                    h($schedule->incident_management->number)
                                ?></p></div>
                                <div class="col-lg-3 text-center border-top-0 align-self-center"><p><?= h($schedule->schedule) ?></p></div>
                                <div class="col-lg-2 border-top-0 align-self-center"><p><?= $schedule->schedule_start_date->format("Y-m-d") ?></p></div>
                                <div class="col-lg-2 text-center border-top-0 px-0 align-self-center"><p><?= $schedule->schedule_end_date->format("Y-m-d") ?></p></div>
                                <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $schedule->schedule_start_time->format("H:i") ?></p></div>
                                <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $schedule->repe_flag == (true) ? "○":"✖︎" ?></p></div>
                                <div class="col-lg-1 text-center border-top-0 align-self-center">
                                          <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?></span>
                                          <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?></span>
                                </div>
                            </div>
                            <?php if($schedule->repe_flag): ?>
                                <div class="node px-4">
                                    <div class="row mb-4">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-2">
                                            <h5 class="my-4"><?= __("繰り返し指定") ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <table class="table">
                                                <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                                    <tr>
                                                        <th class="border-top-0 border-bottom"><?= $repeat->repeat->repeat ?></th>
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
                    <div class="branch border-bottom row">
                        <div class="border-top-0 col-md-2"><p><?=
                            h($schedule->incident_management->management_prefix->management_prefix) . "-" .  
                            $schedule->incident_management->created->format("Ymd") . "-" .  
                            h($schedule->incident_management->number)
                        ?></p></div>
                        <div class="col-lg-3 text-center border-top-0 align-self-center"><p><?= h($schedule->schedule) ?></p></div>
                        <div class="col-lg-2 border-top-0 align-self-center"><p><?= $schedule->schedule_start_date->format("Y-m-d") ?></p></div>
                        <div class="col-lg-2 text-center border-top-0 px-0 align-self-center"><p><?= $schedule->schedule_end_date->format("Y-m-d") ?></p></div>
                        <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $schedule->schedule_start_time->format("H:i") ?></p></div>
                        <div class="col-lg-1 text-center border-top-0 align-self-center"><p><?= $schedule->repe_flag == (true) ? "○":"✖︎" ?></p></div>
                        <div class="col-lg-1 text-center border-top-0 align-self-center">
                            <span><?= $this->Html->link(__('編集'), ['action' => 'edit', $schedule->schedules_id]) ?></span>
                            <span><?= $this->Form->postLink(__('削除'), ['action' => 'delete', $schedule->schedules_id], ['confirm' => __('{0} このスケジュールを削除してよろしいですか？', $schedule->schedule)]) ?></span>
                        </div>
                    </div>
                    <?php if($schedule->repe_flag): ?>
                        <div class="node px-4">
                            <div class="row mb-4">
                                <div class="col-md-2"></div>
                                <div class="col-md-2">
                                    <h5 class="my-4"><?= __("繰り返し指定") ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <table class="table">
                                        <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                            <tr>
                                                <th class="border-top-0 border-bottom"><?= $repeat->repeat->repeat ?></th>
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
