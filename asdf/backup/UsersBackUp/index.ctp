<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Belongs'), ['controller' => 'Belongs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Belong'), ['controller' => 'Belongs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <h5><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></h5>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <!--<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('first_name') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('last_name') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('name') ?></th>-->
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Belong</th>
                <th scope="col">Actions</th>
                <!--<th scope="col"><?= $this->Paginator->sort('class_id') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('belong_id') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('password') ?></th>-->
                <!--<th scope="col"><?= $this->Paginator->sort('user_sort_number') ?></th>-->
                <!--<th scope="col" class="actions"><?= __('Actions') ?></th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <!--<td><?= $this->Number->format($user->user_id) ?></td>-->
                <!--<td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>-->
                <!--<td><?= h($user->password) ?></td>-->
                <!--<td><?= $this->Number->format($user->user_sort_number) ?></td>-->
                <td><?= h($user->first_name . $user->last_name) ?></td>
                <!--<td><?= $user->has('class') ? $this->Html->link($user->class->class, ['controller' => 'Classes', 'action' => 'view', $user->class->class]) : '' ?></td>-->
                <!--<td><?= $user->has('belong') ? $this->Html->link($user->belong->belong, ['controller' => 'Belongs', 'action' => 'view', $user->belong->belong]) : '' ?></td>-->
                <td><?= h($user->class->class) ?></td>
                <td><?= h($user->belong->belong) ?></td>
                <td class="actions">
                    <!--<?= $this->Html->link(__('View'), ['action' => 'view', $user->user_id]) ?>-->
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id)]) ?>
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
