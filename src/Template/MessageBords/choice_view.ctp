<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MessageBord $messageBord
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('TOPに戻る'), ["controller" => "Dairy", 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('戻る'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="messageBords view large-9 medium-8 columns content">
<?php $count = count($messageBords->message_choices) ?>
    <table>
        <?php foreach($messageBords->message_choices as $choice): ?>
            <tr>
                <td><?= $choice->content ?></td>
                <?php if($count != 1): ?>
                    <td><?= $this->Form->postLink(__('削除'), ["controller" => "MessageChoices", 'action' => 'delete', $choice->message_choices_id], ['confirm' => __('この選択肢を削除しますか？ # {0}', $choice->content)]) ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>
