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
<?php $count = count($messageBords->private_messages) ?>
        <?php foreach($messageBords->private_messages as $private): ?>
            <tr>
                <td><?= $private->user->first_name . $private->user->last_name ?></td>
                <?php if($private->user->users_id != $addUser && $count != 1 && $private->user->users_id != 7): ?>
                    <td><?= $this->Form->postLink(__('削除'), ["controller" => "PrivateMessages", 'action' => 'delete', $private->private_messages_id], ['confirm' => __('このユーザを閲覧禁止にしますか？ # {0}?', $private->user->first_name . $private->user->last_name)]) ?></td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
</div>
