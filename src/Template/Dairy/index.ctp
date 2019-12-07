<div class="schedules index large-9 medium-8 columns content">
                <h4><?= $today ?></h4>
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <th>Today Schedules</th>
            </tr>
            <?php foreach ($today_schedules as $schedule): ?>
<!--
            <tr>
                <td>Today Schedules</td>
            </tr>
-->
            <tr>
<!--
                <td><?= $this->Number->format($schedule["schedules_id"]) ?></td>
                <td><?= h($schedule["schedule_start_date"]) ?></td>
                <td><?= h($schedule["schedule_end_date"]) ?></td>
                <td><?= $this->Number->format($schedule["repe_flag"]) ?></td>
                <td><?= h($schedule["schedule"]) ?></td>
                <td><?= h($schedule["created"]) ?></td>
                <td><?= h($schedule["modified"]) ?></td>
-->
                <td><?= h($schedule["schedule"]) ?></td>
                <?php if($schedule["schedule_start_date"] != $schedule["schedule_end_date"]){ ?>
                    <td><?= h($schedule["schedule_start_date"]) . "〜" . h($schedule["schedule_end_date"]) ?></td>
                <?php }else{ ?>
                    <td></td>
                <?php } ?>
                <!--
                <td>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule["schedules_id"]]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule["schedules_id"]]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule["schedules_id"]], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule["schedules_id"])]) ?>
                </td>
-->
            </tr>
            <?php endforeach; ?>
            <tr>
                <th>Weekry Schedules</th>
            </tr>

            <?php foreach ($weekry_schedules as $schedule): ?>
              <!--
            <tr>
                <td>Weekly Schedules</td>
            </tr>
            <tr>
                <td><?= $this->Number->format($schedule["schedules_id"]) ?></td>
                <td><?= h($schedule["schedule_start_date"]) ?></td>
                <td><?= h($schedule["schedule_end_date"]) ?></td>
                <td><?= $this->Number->format($schedule["repe_flag"]) ?></td>
                <td><?= h($schedule["schedule"]) ?></td>
                <td><?= h($schedule["created"]) ?></td>
                <td><?= h($schedule["modified"]) ?></td>
                <td>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule["schedules_id"]]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule["schedules_id"]]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule["schedules_id"]], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule["schedules_id"])]) ?>
                </td>
-->
            <tr>
                <td><?= h($schedule["schedule"]) ?></td>
                <td><?= h($schedule["schedule_start_date"]) . "〜" . h($schedule["schedule_end_date"]) ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th>Order News</th>
            </tr>

            <?php foreach ($orderNews as $ordernews): ?>
            <!--
            <tr>
                <td>orderNews</td>
            </tr>
-->
            <tr>
<!--
                <td><?= $this->Number->format($ordernews->order_news_id) ?></td>
                <td><?= h($ordernews->order_news_date) ?></td>
                <td><?= h($ordernews->title) ?></td>
                <td><?= h($ordernews->comment) ?></td>
                <td><?= h($ordernews->created) ?></td>
                <td><?= h($ordernews->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ordernews->order_news_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordernews->order_news_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordernews->order_news_id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordernews->order_news_id)]) ?>
                </td>
-->
                <td><?= h($ordernews->title) ?></td>
                <td><?= h($ordernews->comment) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
