<?php 
    $this->assign("title", "日誌"); 
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
                    <?= $this->Html->link(__('ユーザ一覧'), ["controller" => "Users", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('勤務者入力'), ["controller" => "Workers", 'action' => 'add'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('予定入力'), ["controller" => "Schedules", 'action' => 'add'], ["class" => $sideberClass]) ?>
                </div>
                <p style="color: red;">メッセージボードに「閲覧権限」を追加しました。</p>
                <p style="color: red;">ファイルダウンロード時の文字化けを解消しました。</p>
                <p>日誌的なページ</p>
                <p>最終的には</p>
                <ul>
                    <li>今日の予定</li>
                    <li>今週の予定</li>
                    <li>命令</li>
                    <li>日付</li>
                    <li>今日の勤務者</li>
                    <li>対処中のインシデント</li>
                    <li>対処状況</li>
                    <li>班内アナウンス</li>
                </ul>
                <p>を表示予定</p>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <?= $this->Form->create("", [
                        "type" => "get",
                        "url" => [
                            "controller" => "Dairy",
                            "action" => "search"
                        ]
                    ]) ?>
                        <div class="row">
                            <div class="col-md-9 p-0">
                                <?= $this->Form->control('incidentID', ["label" => false, "type" => "text", "class" => "form-control-sm"]) ?>
                            </div>
                            <div class="col-md-3 p-0">
                                <?= $this->Form->button('検索', ["class" => "btn-sm btn-info"]) ?>
                            </div>
                        </div>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-md-6"></div>




                <div class="col-md-4 px-0">
                    <div class="text-center p-2 border bg-secondary"><?= $this->Html->link(__('今日の予定'), ["controller" => "Schedules", 'action' => 'index']) ?></div>
                    <table class="table mb-0">
                        <tbody class="border border-top-0">
                            <?php foreach ($today_schedules as $schedule): ?>
                                <?php if(!empty($schedule->schedule_repeats)): ?>
                                    <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                        <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                                                <tr>
                                                    <td class="border-top-0 p-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</td>
                                                    <td class="border-top-0 p-0 text-left"><?= h($schedule->schedule) ?></td>
                                                </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php else: ?>
                                        <tr>
                                            <td class="border-top-0 p-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</td>
                                            <td class="border-top-0 p-0 text-left"><?= h($schedule->schedule) ?></td>
                                        </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                    <div class="text-center p-2 border border-top-0 bg-secondary"><?= __('継続中のスレッド') ?></div>
                    <div class="text-center border border-top-0"><?= __('クルー申し送り') ?></div>
                    <div class="row">
                        <?php foreach($crewSendContinueThread as $thread): ?>
                            <div class="col-md-5 pr-0">
                                <p class="continueThread border-bottom border-left pl-2 my-0 text-info crewSendTransition" id="<?= 
                                    h($thread->incident_management->management_prefix->management_prefix) . "-" .  
                                    $thread->incident_management->created->format("Ymd") . "-" .  
                                    h($thread->incident_management->number) 
                                ?>">
                                    <?=
                                        h($thread->incident_management->management_prefix->management_prefix) . "-" .  
                                        $thread->incident_management->created->format("Ymd") . "-" .  
                                        h($thread->incident_management->number) 
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7 pl-0">
                                <p class="continueThread border-bottom border-right my-0"><?=
                                    $thread->title
                                ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="text-center border border-top-0"><?= __('メッセージボード') ?></div>
                    <div class="row">
                        <?php foreach($messageBordContinueThread as $thread): ?>
                            <div class="col-md-5 pr-0">
                                <p class="continueThread border-bottom border-left pl-2 my-0 text-info messageBordTransition" id="<?= 
                                    h($thread->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                    $thread->message_bord->incident_management->created->format("Ymd") . "-" .  
                                    h($thread->message_bord->incident_management->number) 
                                ?>">
                                    <?=
                                        h($thread->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                        $thread->message_bord->incident_management->created->format("Ymd") . "-" .  
                                        h($thread->message_bord->incident_management->number) 
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7 pl-0">
                                <p class="continueThread border-bottom border-right my-0"><?=
                                    $thread->message_bord->title
                                ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="text-center p-2 border border-top-0 bg-secondary"><?= __('最新スレッド') ?></div>
                    <div class="text-center border border-top-0"><?= __('クルー申し送り') ?></div>
                    <div class="row">
                        <?php foreach($crewSendLatestThread as $thread): ?>
                            <div class="col-md-5 pr-0">
                                <p class="continueThread border-bottom border-left pl-2 my-0 text-info crewSendTransition" id="<?= 
                                    h($thread->incident_management->management_prefix->management_prefix) . "-" .  
                                    $thread->incident_management->created->format("Ymd") . "-" .  
                                    h($thread->incident_management->number) 
                                ?>">
                                    <?=
                                        h($thread->incident_management->management_prefix->management_prefix) . "-" .  
                                        $thread->incident_management->created->format("Ymd") . "-" .  
                                        h($thread->incident_management->number) 
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7 pl-0">
                                <p class="continueThread border-bottom border-right my-0"><?=
                                    $thread->title
                                ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <div class="text-center border border-top-0"><?= __('メッセージボード') ?></div>
                    <div class="row">
                        <?php foreach($messageBordLatestThread as $thread): ?>
                            <div class="col-md-5 pr-0">
                                <p class="continueThread border-bottom border-left pl-2 my-0 text-info messageBordTransition" id="<?= 
                                    h($thread->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                    $thread->message_bord->incident_management->created->format("Ymd") . "-" .  
                                    h($thread->message_bord->incident_management->number) 
                                ?>">
                                    <?=
                                        h($thread->message_bord->incident_management->management_prefix->management_prefix) . "-" .  
                                        $thread->message_bord->incident_management->created->format("Ymd") . "-" .  
                                        h($thread->message_bord->incident_management->number) 
                                    ?>
                                </p>
                            </div>
                            <div class="col-md-7 pl-0">
                                <p class="continueThread border-bottom border-right my-0"><?=
                                    $thread->message_bord->title
                                ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>

                    <div class="text-center p-2 border border-top-0 bg-secondary"><?= __('勤務者') ?></div>
                    <table class="table">
                        <tbody class="border-left border-right">
                            <tr>
                                <th rowspan="<?= $allDayCount ?>" class="border-top-0 text-center border-bottom py-0"><?= __("常日勤") ?></th>
                                <?php $i = 0; ?>
                                <?php foreach ($workers as $worker): ?>
                                    <?php if($worker->positions_id == 1 && $i == 0): ?>
                                        <?php $i++; ?>
                                        <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                        <?php if(null != $worker->duty): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                        </tr>
                                    <?php elseif($worker->positions_id == 1 && $i == 1): ?>
                                        <tr>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                            <?php if(null != $worker->duty): ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                            <?php else: ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>

                            <tr>
                                <th rowspan="<?= $dayCrewCount ?>" class="border-top-0 text-center border-bottom py-0"><?= __("対処係") ?></th>
                                <?php $i = 0; ?>
                                <?php foreach ($workers as $worker): ?>
                                    <?php if($worker->positions_id == 2 && $i == 0): ?>
                                        <?php $i++; ?>
                                        <?php if(null != $worker->shift): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->shift->shift) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                        <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                        <?php if(null != $worker->duty): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                        </tr>
                                    <?php elseif($worker->positions_id == 2 && $i == 1): ?>
                                        <tr>
                                        <?php if(null != $worker->shift): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->shift->shift) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                            <?php if(null != $worker->duty): ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                            <?php else: ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>

                            <tr>
                                <th rowspan="<?= $nightCrewCount ?>" class="border-top-0 text-center border-bottom py-0"><?= __("監視係") ?></th>
                                <?php $i = 0; ?>
                                <?php foreach ($workers as $worker): ?>
                                    <?php if($worker->positions_id == 3 && $i == 0): ?>
                                        <?php $i++; ?>
                                        <?php if(null != $worker->shift): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->shift->shift) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                        <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                        <?php if(null != $worker->duty): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                        </tr>
                                    <?php elseif($worker->positions_id == 3 && $i == 1): ?>
                                        <tr>
                                        <?php if(null != $worker->shift): ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->shift->shift) ?></td>
                                        <?php else: ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"></td>
                                        <?php endif ?>
                                            <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                                            <?php if(null != $worker->duty): ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"><?= h($worker->duty->duty) ?></td>
                                            <?php else: ?>
                                                <td class="border-top-0 py-0 border-left border-bottom"></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endif ?>
                                <?php endforeach ?>
                            <!-- </tr>はif(~~~ && $i = 0)内で閉じてる -->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 px-0">
                    <div class="text-center p-2 border bg-secondary">週間予定</div>
                </div>
            </div>
        </div>
    </div>
</div>




<!--
                <div class="col-md-5 px-0">
                    <div class="text-center p-2 border bg-secondary">今週の予定</div>
                    <table class="table mb-0">
                        <tbody class="border border-top-0">
                            <?php foreach ($today_schedules as $schedule): ?>
                                <?php if(!empty($schedule->schedule_repeats)): ?>
                                    <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                        <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                                                <tr>
                                                    <td class="border-top-0 p-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</td>
                                                    <td class="border-top-0 p-0 text-left"><?= h($schedule->schedule) ?></td>
                                                </tr>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php else: ?>
                                        <tr>
                                            <td class="border-top-0 p-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</td>
                                            <td class="border-top-0 p-0 text-left"><?= h($schedule->schedule) ?></td>
                                        </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="schedules index large-9 medium-8 columns content">
                <h4><?= $today ?></h4>
    <table>
        <tbody>
            <tr>
                <th>今週の予定</th>
            </tr>

            <?php foreach ($weekry_schedules as $schedule): ?>
              <!-
            <tr>
                <td>Weekly Schedules</td>
            </tr>
            <tr>
                <td><?= $this->Number->format($schedule["schedules_id"]) ?></td>
                <td><?= h($schedule["schedule_start_date"]) ?></td>
                <td><?= h($schedule["schedule_end_date"]) ?></td>
                <td><?= $this->Number->format($schedule["repe_flag"]) ?></td>
                <td><?= h($schedule["schedule"]) ?></td>
                <td><?= h($schedule["created"]) ?></td>
                <td><?= h($schedule["modified"]) ?></td>
                <td>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule["schedules_id"]]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule["schedules_id"]]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule["schedules_id"]], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule["schedules_id"])]) ?>
                </td>
->
            <tr>
                <td><?= h($schedule["schedule"]) ?></td>
                <td><?= h($schedule["schedule_start_date"]) . "〜" . h($schedule["schedule_end_date"]) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <th>命令会報等</th>
            </tr>

            <?php foreach ($orderNews as $ordernews): ?>
            <!-
            <tr>
                <td>orderNews</td>
            </tr>
->
            <tr>
<!-
                <td><?= $this->Number->format($ordernews->order_news_id) ?></td>
                <td><?= h($ordernews->order_news_date) ?></td>
                <td><?= h($ordernews->title) ?></td>
                <td><?= h($ordernews->comment) ?></td>
                <td><?= h($ordernews->created) ?></td>
                <td><?= h($ordernews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordernews->order_news_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordernews->order_news_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordernews->order_news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordernews->order_news_id)]) ?>
                </td>
->
                <td><?= h($ordernews->title) ?></td>
                <td><?= h($ordernews->comment) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <th>勤務者</th>
            </tr>
            <?php foreach ($workers as $worker): ?>
                <tr>
                    <td><?= h($worker->user->first_name . $worker->user->last_name) ?></td>
                    <td><?= h($worker->position->position) ?></td>
                    <?php if($worker->shift == null): ?>
                        <td></td>
                    <?php else: ?>
                        <td><?= h($worker->shift->shift) ?></td>
                    <?php endif ?>
                    <?php if($worker->duty == null): ?>
                        <td></td>
                    <?php else: ?>
                        <td><?= h($worker->duty->duty) ?></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <th>サイバー攻撃等対処状況</th>
            </tr>
            <?php foreach ($nowStatus as $key=>$value): ?>
                <tr>
                    <td><?= h($key) ?></td>
                    <td><?= h($value) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
-->
