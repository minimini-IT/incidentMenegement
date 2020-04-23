<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Repeat $repeat
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Repeats'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="repeats form large-9 medium-8 columns content">
    <?= $this->Form->create($repeat) ?>
    <fieldset>
        <legend><?= __('Add Repeat') ?></legend>
        <?php
            echo $this->Form->control('repeat');
            echo $this->Form->control('repeat_sort_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
