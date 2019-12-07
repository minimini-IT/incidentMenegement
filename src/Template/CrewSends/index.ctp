<?php
use Cake\datasource\ConnectionManager;

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CrewSend[]|\Cake\Collection\CollectionInterface $crewSends
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Crew Send'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crewSends index large-9 medium-8 columns content">
    <h3><?= __('Crew Sends') ?></h3>
    <table cellpadding="0" cellspacing="0">
      <thead>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('crew_sends_id') ?></th>
          <th scope="col"><?= $this->Paginator->sort('categories_id') ?></th>
          <th scope="col"><?= $this->Paginator->sort('title') ?></th>
          <th scope="col"><?= $this->Paginator->sort('statuses_id') ?></th>
          <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
          <th scope="col"><?= $this->Paginator->sort('period') ?></th>
          <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
    </table>
    <?php foreach ($crewSends as $crewSend): ?>
      <table>
        <tbody>
          <tr>
            <td><?= $this->Number->format($crewSend->crew_sends_id) ?></td>
            <td><?= $crewSend->has('category') ? $this->Html->link($crewSend->category->category, ['controller' => 'Categories', 'action' => 'view', $crewSend->category->categories_id]) : '' ?></td>
            <td><?= h($crewSend->title) ?></td>
            <td><?= $crewSend->has('status') ? $this->Html->link($crewSend->status->status, ['controller' => 'Statuses', 'action' => 'view', $crewSend->status->statuses_id]) : '' ?></td>
            <td><?= h($crewSend->user->first_name . $crewSend->user->last_name) ?></td>
            <td><?= h($crewSend->period) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $crewSend->crew_sends_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $crewSend->crew_sends_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $crewSend->crew_sends_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crewSend->crew_sends_id)]) ?>
            </td>
          </tr>
        </tbody>
      </table>

      <h5>Content</h5>
      <pre><p><?= h($crewSend->comment) ?></p></pre>
      <?php
          //実装はtableではなくbootstrapのrowとcolで行う
          if(isset($crewSend->file_group)){
              $files_info = $this->GetFileInfo->file_info($crewSend);
              echo "<h5>File</h5>";
              foreach($files_info as $file_info){
                echo "<p>" . $this->Html->link($file_info["file_name"], ["controller" => "Download", 'action' => 'downloadFile', $file_info["files_id"]]);
                echo " : " . $file_info["file_size"] . "</p>";
                echo $this->Form->postLink(__('Delete'), ["controller" => "Files", 'action' => 'delete', $file_info["files_id"]], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file_info["file_name"])]); 
              }
          }
      ?>
      <h5>Comment</h5>
      <table>
        <tr>
          <th>User</th>
          <th>Comment</th>
          <th>File</th>
          <th>Action</th>
        </tr>
        <?php foreach ($crewSendComments as $crewSendComment): ?>
          <?php if($crewSend->crew_sends_id == $crewSendComment->crew_sends_id): ?>
            <tr>
              <td><?= h($crewSendComment->user->first_name . $crewSendComment->user->last_name) ?></td>
              <td><pre><?= h($crewSendComment->comment) ?></pre></td>
              <td>
              <?php //ファイルあれば
                if(isset($crewSendComment->file_group)){
                  $files_info = $this->GetFileInfo->file_info($crewSendComment);
                  foreach($files_info as $file_info){
                    echo "・" . $this->Html->link($file_info["file_name"], ["controller" => "Download", 'action' => 'downloadFile', $file_info["files_id"]]);
                    echo " : " . $file_info["file_size"] . " : ";
                    echo $this->Form->postLink(__('Delete'), ["controller" => "Files", 'action' => 'delete', $file_info["files_id"]], ['confirm' => __('ファイルを削除しますか？ # {0}?', $file_info["file_name"])]); 
                  }
                }
              ?>
              </td>
              <td><?= $this->Html->link(__('Edit'), ["controller" => "CrewSendComments", 'action' => 'edit', $crewSendComment->crew_send_comments_id]) ?>
                  <?= $this->Form->postLink(__('Delete'), ["controller" => "CrewSendComments", 'action' => 'delete', $crewSendComment->crew_send_comments_id], ['confirm' => __('Are you sure you want to delete # {0}?', $crewSendComment->crew_send_comments_id)]) ?></td>
            </tr>
          <?php endif; ?>
        <?php endforeach; ?>
      </table>

      <!-- コメント書き込み -->
      <div>
        <?php
        echo $this->Form->create($crewSendComments, [
        "url" => [
          "controller" => "crew_send_comments",
          "action" => "add"
        ],
        "type" => "file"
        ]); 
        echo str_replace(";", " ", $this->Form->control('users_id', ["type" => "select", "options" => $users])); 
        echo $this->Form->control('comment');
        echo $this->Form->control('crew_sends_id', ["type" => "hidden", 'value' => $crewSend->crew_sends_id]);
        echo $this->Form->control('file_group', ["type" => "hidden", 'value' => 0]);
        //filesへの入力
        echo $this->Form->file("file[]", ["multiple" => "true", "secure" => false]);
        echo $this->Form->button(__('Submit'));
        echo $this->Form->end();
        ?>
      </div>

    <?php endforeach; ?>
</div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
