<nav class="large-3 medium-4 columns" id="actions-sidebar">
  <ul class="side-nav">
    <li class="heading"><?= __('Actions') ?></li>
    <li><?= $this->Html->link(__('TOPへ戻る'), ['controller' => 'Dairy', 'action' => 'index']) ?></li>
  </ul>
</nav>
<div class="cyberAttacks index large-9 medium-8 columns content">
    <h3><?= __('サイバー攻撃等') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Html->link(__('リスク検知'), ['controller' => 'RiskDetections', 'action' => 'risk']) ?></th>
            </tr>
            <tr>
                <th scope="col"><?= $this->Html->link(__('不審メール'), ['controller' => 'RiskDetections', 'action' => 'malmail']) ?></th>
            </tr>
            <tr>
                <th scope="col"><?= $this->Html->link(__('年度インシデント集計表'), ['controller' => 'RiskDetections', 'action' => 'incidentSpreadsheet']) ?></th>
            </tr>
            <tr>
                <th scope="col"><?= $this->Html->link(__('部内マルウェア検出数'), ['' => '', 'action' => 'index']) ?></th>
            </tr>
            <tr>
                <th scope="col"><?= $this->Html->link(__('年度不審メール件数'), ['' => '', 'action' => 'index']) ?></th>
            </tr>
            <tr>
                <th scope="col"><?= $this->Html->link(__('不審メール宛先一覧'), ['' => '', 'action' => 'index']) ?></th>
            </tr>
        </thead>
    </table>
</div>
