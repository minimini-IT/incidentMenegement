<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CrewSend $crewSend
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crewSend->crew_sends_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crewSend->crew_sends_id)]
            )
        ?></li>
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
    <?= $this->Form->create($crewSend) ?>
    <fieldset>
        <legend><?= __('Edit Crew Send') ?></legend>
        <?php
            echo $this->Form->control('categories_id', ['options' => $categories]);
            echo $this->Form->control('title');
            echo $this->Form->control('statuses_id', ['options' => $statuses]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users]));
            //echo $this->Form->control('users_id', ['options' => $users]);
            echo $this->Form->control('period', ['empty' => true, "type" => "hidden"]);
            //echo $this->Form->control('file_group');
            echo $this->Form->control('comment');
            //echo $this->Form->control('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
