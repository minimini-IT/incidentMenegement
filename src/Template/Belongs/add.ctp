<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Belong $belong
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Belongs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="belongs form large-9 medium-8 columns content">
    <?= $this->Form->create($belong) ?>
    <fieldset>
        <legend><?= __('Add Belong') ?></legend>
        <?php
            echo $this->Form->control('belong');
            echo $this->Form->control('belong_sort_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
