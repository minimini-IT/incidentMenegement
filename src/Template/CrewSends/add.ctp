<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CrewSend $crewSend
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Crew Sends'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crewSends form large-9 medium-8 columns content">
    <?= $this->Form->create($crewSend, ["type" => "file"]); ?>
    <fieldset>
        <legend><?= __('Add Crew Send') ?></legend>
        <?php
            echo $this->Form->control('categories_id', ['options' => $categories]);
            echo $this->Form->control('title');
            echo $this->Form->control('statuses_id', ['options' => $statuses]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users]));
            echo $this->Form->control('period');
            echo $this->Form->control('comment');
            //filesへの入力
            echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
        ?>

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
