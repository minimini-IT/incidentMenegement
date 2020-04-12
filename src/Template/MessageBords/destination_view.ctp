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
    <table>
        <?php foreach($messageBords->message_destinations as $destination): ?>
            <tr>
                <td><?= $destination->user->first_name . $destination->user->last_name ?></td>
                <td><?= $this->Form->postLink(__('削除'), ["controller" => "MessageDestinations", 'action' => 'delete', $destination->message_destinations_id], ['confirm' => __('この宛先を削除しますか？ # {0}', $destination->user->first_name . $destination->user->last_name)]) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
