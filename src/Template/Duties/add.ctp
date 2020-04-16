<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Duty $duty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('戻る'), ["controller" => "Workers", 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('TOPに戻る'), ["controller" => "Dairy", 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="duties form large-9 medium-8 columns content">
    <?= $this->Form->create($duty) ?>
    <fieldset>
        <legend><?= __('特別勤務追加') ?></legend>
        <?php
            echo $this->Form->control('duty', ["label" => "特別勤務"]);
            echo $this->Form->control('duty_sort_number', ["label" => "ソート番号"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
