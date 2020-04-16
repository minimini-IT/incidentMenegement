<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duty[]|\Cake\Collection\CollectionInterface $duties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Duty'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="duties index large-9 medium-8 columns content">
    <h3><?= __('Duties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('duties_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duty') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duty_sort_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($duties as $duty): ?>
            <tr>
                <td><?= $this->Number->format($duty->duties_id) ?></td>
                <td><?= h($duty->duty) ?></td>
                <td><?= $this->Number->format($duty->duty_sort_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $duty->duties_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $duty->duties_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $duty->duties_id], ['confirm' => __('Are you sure you want to delete # {0}?', $duty->duties_id)]) ?>
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
