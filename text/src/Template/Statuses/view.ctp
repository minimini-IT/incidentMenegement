<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->statuses_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->statuses_id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->statuses_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="statuses view large-9 medium-8 columns content">
    <h3><?= h($status->statuses_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($status->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Statuses Id') ?></th>
            <td><?= $this->Number->format($status->statuses_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Sort Number') ?></th>
            <td><?= $this->Number->format($status->status_sort_number) ?></td>
        </tr>
    </table>
</div>
