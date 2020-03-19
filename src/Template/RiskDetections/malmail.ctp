<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RiskDetection[]|\Cake\Collection\CollectionInterface $riskDetections
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('TOPへ戻る'), ['controller' => 'Dairy', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('新規作成'), ['action' => 'malmailAdd']) ?></li>
        <li><?= $this->Html->link(__('システム追加'), ['controller' => 'Systems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('基地追加'), ['controller' => 'Bases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('部隊追加'), ['controller' => 'Units', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('ステータス追加'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('報告有無追加'), ['controller' => 'Reports', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('検知状況追加'), ['controller' => 'Positives', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('SecLevel追加'), ['controller' => 'SecLevels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('感染経路追加'), ['controller' => 'InfectionRoutes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="riskDetections index large-9 medium-8 columns content">
    <h3><?= __('リスク検知') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('受信時刻') ?></th>
                <th scope="col"><?= $this->Paginator->sort('対処開始時刻') ?></th>
                <th scope="col"><?= $this->Paginator->sort('対処完了時刻') ?></th>
                <th scope="col"><?= $this->Paginator->sort('システム') ?></th>
                <th scope="col"><?= $this->Paginator->sort('基地') ?></th>
                <th scope="col"><?= $this->Paginator->sort('部隊') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('報告の有無') ?></th>
                <th scope="col"><?= $this->Paginator->sort('正・誤検知') ?></th>
                <th scope="col"><?= $this->Paginator->sort('SecLevel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('添付ファイルの有無') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($riskDetections as $riskDetection): ?>
            <tr>
                <td><?= $this->Number->format($riskDetection->risk_detections_id) ?></td>
                <td><?= h($riskDetection->occurrence_datetime) ?></td>
                <td><?= h($riskDetection->response_start_time) ?></td>
                <td><?= h($riskDetection->response_end_time) ?></td>
                <td><?= $riskDetection->has('system') ? $this->Html->link($riskDetection->system->systems_id, ['controller' => 'Systems', 'action' => 'view', $riskDetection->system->systems_id]) : '' ?></td>
                <td><?= $riskDetection->has('basis') ? $this->Html->link($riskDetection->basis->bases_id, ['controller' => 'Bases', 'action' => 'view', $riskDetection->basis->bases_id]) : '' ?></td>
                <td><?= $riskDetection->has('unit') ? $this->Html->link($riskDetection->unit->units_id, ['controller' => 'Units', 'action' => 'view', $riskDetection->unit->units_id]) : '' ?></td>
                <td><?= $riskDetection->has('status') ? $this->Html->link($riskDetection->status->status, ['controller' => 'Statuses', 'action' => 'view', $riskDetection->status->statuses_id]) : '' ?></td>
                <td><?= $riskDetection->has('report') ? $this->Html->link($riskDetection->report->reports_id, ['controller' => 'Reports', 'action' => 'view', $riskDetection->report->reports_id]) : '' ?></td>
                <td><?= $riskDetection->has('positive') ? $this->Html->link($riskDetection->positive->positives_id, ['controller' => 'Positives', 'action' => 'view', $riskDetection->positive->positives_id]) : '' ?></td>
                <td><?= $riskDetection->has('sec_level') ? $this->Html->link($riskDetection->sec_level->sec_levels_id, ['controller' => 'SecLevels', 'action' => 'view', $riskDetection->sec_level->sec_levels_id]) : '' ?></td>
                <td><?= $riskDetection->has('infection_route') ? $this->Html->link($riskDetection->infection_route->infection_routes_id, ['controller' => 'InfectionRoutes', 'action' => 'view', $riskDetection->infection_route->infection_routes_id]) : '' ?></td>
                <td><?= h($riskDetection->sim_live_flag) ?></td>
                <td><?= h($riskDetection->samari_flag) ?></td>
                <td><?= h($riskDetection->attachment) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $riskDetection->risk_detections_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $riskDetection->risk_detections_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $riskDetection->risk_detections_id], ['confirm' => __('Are you sure you want to delete # {0}?', $riskDetection->risk_detections_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
