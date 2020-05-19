<?php 
    $this->assign("title", "日誌"); 
    $sideberClass = "list-group-item list-group-item-action list-group-item-info";
?>
<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-lg-2">
-->
            <!-- datepickerの選んだ日付のフォーマットを変更 -->
            <script>
                $(function(){
                    $("input[name='created']").datepicker("option", "dateFormat", "yymmdd");    
                });
            </script>
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
        <div class="col-lg-10">
            <div class="row border border-bottom-0 mt-4">
                <div class="col-lg-4 px-0 border-right">
                    <div class="text-center p-2 border-bottom bg-secondary"><?= $this->Html->link(__('今日の予定'), ["controller" => "Schedules", 'action' => 'index']) ?></div>
                    <?php foreach ($today_schedules as $schedule): ?>
                        <?php if(!empty($schedule->schedule_repeats)): ?>
                            <?php foreach($schedule->schedule_repeats as $repeat): ?>
                                <?php if($repeat->repeats_id == $todayDayOfWeek): ?>
                                    <div class="row border-bottom m-0">
                                        <div class="col-lg-4 p-0 align-self-center">
                                            <p class="m-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</p>
                                        </div>
                                        <div class="col-lg-8 p-0">
                                            <p class="m-0 text-left"><?= h($schedule->schedule) ?></p>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php else: ?>
                            <div class="row border-bottom m-0">
                                <div class="col-lg-4 p-0 align-self-center">
                                    <p class="m-0 text-center"><?= $schedule->schedule_start_time->format("H:i") ?> 〜</p>
                                </div>
                                <div class="col-lg-8 p-0">
                                    <p class="m-0 text-left"><?= h($schedule->schedule) ?></p>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>


                    <div class="text-center p-2 border-bottom bg-secondary"><?= __('更新されたスレッド') ?></div>
                    <div class="text-center border-bottom"><?= __('クルー申し送り') ?></div>
                    <?php foreach($crewSendUpdateThread as $thread): ?>
                        <div class="row border-bottom m-0">
                            <div class="col-lg-5 px-0 align-self-center">
                                <p class="continueThread text-info crewSendTransition mt-0" id="<?= 
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
                            <div class="col-lg-7 px-0">
                                <p class="continueThread mt-0"><?=
                                    $thread->title
                                ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>



                    <div class="text-center border-bottom"><?= __('メッセージボード') ?></div>
                    <?php foreach($messageBordUpdateThread as $thread): ?>
                        <div class="row border-bottom m-0">
                            <div class="col-lg-5 px-0 align-self-center">
                                <p class="continueThread text-info messageBordTransition mt-0" id="<?= 
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
                            <div class="col-lg-7 px-0">
                                <p class="continueThread mt-0"><?=
                                    $thread->message_bord->title
                                ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <div class="text-center p-2 border-bottom bg-secondary"><?= __('勤務者') ?></div>
                    <table class="table mb-0">
                        <tbody>
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
                <div class="col-lg-5 px-0 border-right">
                    <div class="text-center p-2 border-bottom bg-secondary"><?= __('インシデントID検索') ?></div>
                    <div class="search">
                        <div class="row m-0">
                            <div class="col-lg-3 px-0">
                                <?= $this->Form->control('prefix', ["label" => false, "type" => "select", "options" => $prefix, "empty" => true, "class" => "form-control form-control-sm"]) ?>
                            </div>
                            <div class="col-lg-1 px-0"><p class="text-center my-0">-</p></div>
                            <div class="col-lg-3 px-0">
                                <?= $this->Form->control('created', ["label" => false, "type" => "text", "class" => "datepicker form-control form-control-sm"]) ?>
                            </div>
                            <div class="col-lg-1 px-0"><p class="text-center my-0">-</p></div>
                            <div class="col-lg-2 px-0">
                                <?= $this->Form->control('number', ["label" => false, "type" => "text", "class" => "form-control form-control-sm"]) ?>
                            </div>
                            <div class="col-lg-2 text-center">
                                <?= $this->Form->button('検索', ["class" => "btn-sm btn-info"]) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 px-0 border-right">


                </div>
            </div>
        </div>
    </div>
</div>




