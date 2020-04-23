<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repeat[]|\Cake\Collection\CollectionInterface $repeats
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Repeat'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="repeats index large-9 medium-8 columns content">
    <h3><?= __('Repeats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('repeats_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repeat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('repeat_sort_number') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($repeats as $repeat): ?>
            <tr>
                <td><?= $this->Number->format($repeat->repeats_id) ?></td>
                <td><?= h($repeat->repeat) ?></td>
                <td><?= $this->Number->format($repeat->repeat_sort_number) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $repeat->repeats_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $repeat->repeats_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $repeat->repeats_id], ['confirm' => __('Are you sure you want to delete # {0}?', $repeat->repeats_id)]) ?>
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
