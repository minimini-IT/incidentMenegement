<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Worker $worker
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Workers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Shifts'), ['controller' => 'Shifts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Shift'), ['controller' => 'Shifts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Duties'), ['controller' => 'Duties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Duty'), ['controller' => 'Duties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workers form large-9 medium-8 columns content">
    <?= $this->Form->create($worker) ?>
    <fieldset>
        <legend><?= __('Add Worker') ?></legend>
        <?php
            echo $this->Form->hidden('date', ["value" => date("Y-m-d")]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users]));
            //echo $this->Form->control('classes_id', ['options' => $classes]);
            //echo $this->Form->hidden('classes_id', ["value" => $users->class_id]);
            echo $this->Form->control('positions_id', ['options' => $positions]);
            echo $this->Form->control('shifts_id', ['options' => $shifts]);
            echo $this->Form->control('duties_id', ['options' => $duties]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
