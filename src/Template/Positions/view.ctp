<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Position $position
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->positions_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->positions_id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->positions_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positions view large-9 medium-8 columns content">
    <h3><?= h($position->position) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= h($position->position) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Positions Id') ?></th>
            <td><?= $this->Number->format($position->positions_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position Sort Number') ?></th>
            <td><?= $this->Number->format($position->position_sort_number) ?></td>
        </tr>
    </table>
</div>
