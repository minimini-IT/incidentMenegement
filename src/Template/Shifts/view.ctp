<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Shift'), ['action' => 'edit', $shift->shifts_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Shift'), ['action' => 'delete', $shift->shifts_id], ['confirm' => __('Are you sure you want to delete # {0}?', $shift->shifts_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Shifts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Shift'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="shifts view large-9 medium-8 columns content">
    <h3><?= h($shift->shift) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Shift') ?></th>
            <td><?= h($shift->shift) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shifts Id') ?></th>
            <td><?= $this->Number->format($shift->shifts_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shift Sort Number') ?></th>
            <td><?= $this->Number->format($shift->shift_sort_number) ?></td>
        </tr>
    </table>
</div>
