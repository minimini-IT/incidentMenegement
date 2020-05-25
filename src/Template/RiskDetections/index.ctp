<?php
    $this->assign("title", "サイバー攻撃等"); 
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
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-md-10">
            <h3 class="my-4"><?= __('サイバー攻撃等') ?></h3>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-top-0"><?= $this->Html->link(__('リスク検知'), ['action' => 'risk']) ?></th>
                            </tr>
                            <tr>
                                <th class="border-top-0"><?= $this->Html->link(__('インシデント集計表'), ['action' => 'spreadsheet']) ?></th>
                            </tr>
                            <tr>
                                <th class="border-top-0"><?= $this->Html->link(__('不審メール宛先一覧'), ['action' => 'malmailDestination']) ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-md-7"></div>
            </div>
        </div>
    </div>
</div>





