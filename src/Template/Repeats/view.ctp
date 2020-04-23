<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repeat $repeat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Repeat'), ['action' => 'edit', $repeat->repeats_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Repeat'), ['action' => 'delete', $repeat->repeats_id], ['confirm' => __('Are you sure you want to delete # {0}?', $repeat->repeats_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Repeats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Repeat'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="repeats view large-9 medium-8 columns content">
    <h3><?= h($repeat->repeats_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Repeat') ?></th>
            <td><?= h($repeat->repeat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repeats Id') ?></th>
            <td><?= $this->Number->format($repeat->repeats_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Repeat Sort Number') ?></th>
            <td><?= $this->Number->format($repeat->repeat_sort_number) ?></td>
        </tr>
    </table>
</div>
