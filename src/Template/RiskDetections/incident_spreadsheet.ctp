<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('TOPへ戻る'), ['controller' => 'Dairy', 'action' => 'index']) ?></li>
  </ul>
</nav>
<div class="cyberAttacks index large-9 medium-8 columns content">
    <h3><?= date("Y", strtotime($year)) . "年度不審メール件数" ?></h3>
    <p><?= $this->Html->link(__('<<_前年度'), ['?' => ["year" => date("Y", strtotime("-1 year", strtotime($year)))]]) ?></p>
    <p><?= $this->Html->link(__('次年度_>>'), ['?' => ["year" => date("Y", strtotime("+1 year", strtotime($year)))]]) ?></p>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th scope="col"><?= __("集計月") ?></th>
            <th scope="col"><?= __("４月") ?></th>
            <th scope="col"><?= __("５月") ?></th>
            <th scope="col"><?= __("６月") ?></th>
            <th scope="col"><?= __("７月") ?></th>
            <th scope="col"><?= __("８月") ?></th>
            <th scope="col"><?= __("９月") ?></th>
            <th scope="col"><?= __("１０月") ?></th>
            <th scope="col"><?= __("１１月") ?></th>
            <th scope="col"><?= __("１２月") ?></th>
            <th scope="col"><?= __("１月") ?></th>
            <th scope="col"><?= __("２月") ?></th>
            <th scope="col"><?= __("３月") ?></th>
        </tr>
        <tr>
            <th scope="col"><?= __("件数") ?></th>
            <th scope="col"><?= $incident[0] ?></th>
            <th scope="col"><?= $incident[1] ?></th>
            <th scope="col"><?= $incident[2] ?></th>
            <th scope="col"><?= $incident[3] ?></th>
            <th scope="col"><?= $incident[4] ?></th>
            <th scope="col"><?= $incident[5] ?></th>
            <th scope="col"><?= $incident[6] ?></th>
            <th scope="col"><?= $incident[7] ?></th>
            <th scope="col"><?= $incident[8] ?></th>
            <th scope="col"><?= $incident[9] ?></th>
            <th scope="col"><?= $incident[10] ?></th>
            <th scope="col"><?= $incident[11] ?></th>
        </tr>
    </table>
</div>
