<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CrewSendComment $crewSendComment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $crewSendComment->crew_send_comments_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crewSendComment->crew_send_comments_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Crew Send Comments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crew Sends'), ['controller' => 'CrewSends', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crew Send'), ['controller' => 'CrewSends', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crewSendComments form large-9 medium-8 columns content">
    <?= $this->Form->create($crewSendComment) ?>
    <fieldset>
        <legend><?= __('Edit Crew Send Comment') ?></legend>
        <?php
            echo $this->Form->control('crew_sends_id', ['options' => $crewSends]);
            //echo $this->Form->control('users_id', ['options' => $users]);
            echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users]));
            echo $this->Form->control('file_group', ["type" => "hidden"]);
            echo $this->Form->control('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
