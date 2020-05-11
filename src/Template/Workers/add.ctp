<?php
    $this->assign("title", "勤務者"); 
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
                    <?= $this->Html->link(__('ユーザ'), ['controller' => 'Users', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('勤務体系'), ['controller' => 'Positions', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('シフト'), ['controller' => 'Shifts', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('特別勤務'), ['controller' => 'Duties', 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <h3 class="my-4"><?= __("勤務者入力") ?></h3>
                    <?= $this->Form->create($worker) ?>
                        <fieldset class="pt-3 border-top border-info">
                            <?php
                                echo $this->Form->control('date', ["type" => "hidden", "value" => date("Y-m-d")]);
                                echo str_replace(";", " ", $this->Form->control('users_id', ["label" => "ユーザ", "type" => "select", "options" => $users, "class" => "form-control"]));
                                echo $this->Form->control('positions_id', ["label" => "勤務体系", 'options' => $positions, "class" => "form-control"]);
                                echo $this->Form->control('shifts_id', ["label" => "シフト", 'options' => $shifts, "empty" => true, "class" => "form-control"]);
                                echo $this->Form->control('duties_id', ["label" => "特別勤務", 'options' => $duties, "empty" => true, "class" => "form-control"]);
                                echo "<div class='mt-4'>";
                                echo $this->Form->button('送信', ["class" => "btn btn-info float-right"]);
                                echo "</div>";
                            ?>
                        </fieldset>
                    <?= $this->Form->end() ?>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <h6 class="my-4"><?= __("{$today}の勤務者") ?></h6>
                    <div class="mb-4">
                        <?php foreach($todayWorkers as $todayWorker): ?>
                            <div class="row">
                                <div class="col-md-4 border-top-0 border-bottom p-0">
                                    <div class="my-1">
                                        <span class="worker">
                                            <?= $this->Form->postLink($todayWorker->user->first_name . $todayWorker->user->last_name, ['action' => 'delete', $todayWorker->workers_id], ['confirm' => __('{0} この申し送りを削除してよろしいですか？', $todayWorker->user->first_name . $todayWorker->user->last_name)]) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-2 border-top-0 border-bottom p-0"><p class="tableBody worker"><?= $todayWorker->position->position ?></p></div>
                                <?php if($todayWorker->shift === null): ?>
                                    <div class="col-md-2 border-top-0 border-bottom p-0"></div>
                                <?php else: ?>
                                    <div class="col-md-2 border-top-0 border-bottom p-0"><p class="tableBody worker"><?= $todayWorker->shift->shift ?></p></div>
                                <?php endif ?>
                                <?php if($todayWorker->duty != null): ?>
                                    <div class="col-md-4 border-top-0 border-bottom p-0"><p class="tableBody worker"><?= $todayWorker->duty->duty ?></p></div>
                                <?php else: ?>
                                    <div class="col-md-4 border-top-0 border-bottom p-0"></div>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div>
