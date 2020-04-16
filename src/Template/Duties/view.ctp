<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duty $duty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Duty'), ['action' => 'edit', $duty->duties_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Duty'), ['action' => 'delete', $duty->duties_id], ['confirm' => __('Are you sure you want to delete # {0}?', $duty->duties_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Duties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Duty'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="duties view large-9 medium-8 columns content">
    <h3><?= h($duty->duty) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Duty') ?></th>
            <td><?= h($duty->duty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duties Id') ?></th>
            <td><?= $this->Number->format($duty->duties_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duty Sort Number') ?></th>
            <td><?= $this->Number->format($duty->duty_sort_number) ?></td>
        </tr>
    </table>
</div>
