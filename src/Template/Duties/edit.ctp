<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duty $duty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $duty->duties_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $duty->duties_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Duties'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="duties form large-9 medium-8 columns content">
    <?= $this->Form->create($duty) ?>
    <fieldset>
        <legend><?= __('Edit Duty') ?></legend>
        <?php
            echo $this->Form->control('duty');
            echo $this->Form->control('duty_sort_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
