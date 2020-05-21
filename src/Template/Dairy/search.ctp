<?php 
    $this->assign("title", "インシデントID検索"); 
    $sideberClass = "list-group-item list-group-item-action list-group-item-info";
?>
<!--
default.ctp
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-lg-2">
-->
            <nav>
                <div class="list-group">
                    <?= $this->Html->link(__('TOP'), ["controller" => "Dairy", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('サイバー攻撃等'), ["controller" => "RiskDetections", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('クルー申し送り'), ["controller" => "CrewSends", 'action' => 'index'], ["class" => $sideberClass]) ?>
                    <?= $this->Html->link(__('メッセージボード'), ["controller" => "MessageBords", 'action' => 'index'], ["class" => $sideberClass]) ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-10">
<?php foreach($incidentManagements as $incident): ?>
<?php debug($incident) ?>
<?php endforeach ?>
            <div class="row border-bottom">
                <div class="col-lg-1"></div>
                <div class="col-lg-4 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("インシデントID") ?></p></div>
                <div class="col-lg-4 text-center border-top-0 font-weight-bold align-self-center"><p class="tableHeader"><?= __("種類") ?></p></div>
                <div class="col-lg-3"></div>
            </div>
<!--
            <?php foreach($incidentIdSearch as $search): ?>
                <?php foreach($search as $data): ?>
                    <div class="row branch border-bottom">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-4 text-left border-top-0 align-self-center"><p class="incidentManagementsId" name="incidentId[<?= $i ?>]"><?= 
                            h($data->incident_management->management_prefix->management_prefix) . "-" .  
                            $data->incident_management->created->format("Ymd") . "-" .  
                            h($data->incident_management->number)
                        ?></p></div>
                        <div class="col-lg-4 border-top-0 align-self-center"><p><?= array_keys($incidentIdSearch)[$i] ?></p></div>
                        <div class="col-lg-3"></div>
                    </div>
                <?php endforeach ?>
            <?php endforeach ?>
            -->
        </div>
    </div>
</div>
