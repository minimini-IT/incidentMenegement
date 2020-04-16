<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift[]|\Cake\Collection\CollectionInterface $shifts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Shift'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shifts index large-9 medium-8 columns content">
    <h3><?= __('Shifts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('shifts_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shift') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shift_sort_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shifts as $shift): ?>
            <tr>
                <td><?= $this->Number->format($shift->shifts_id) ?></td>
                <td><?= h($shift->shift) ?></td>
                <td><?= $this->Number->format($shift->shift_sort_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $shift->shifts_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shift->shifts_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shift->shifts_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shift->shifts_id)]) ?>
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
