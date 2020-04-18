<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('jquery-ui.css') ?>
    <?= $this->Html->script('jquery-3.4.1.js') ?>
    <?= $this->Html->script('popper.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery-ui.js') ?>
    <?= $this->Html->script('datepicker-ja.js') ?>
    <?= $this->Html->script('pullDown') ?>
    <?= $this->Html->script('checkBox') ?>
    <?= $this->Html->scriptStart() ?>
        $(function() {
            $(".datepicker").datepicker();
        });
    <?= $this->Html->scriptEnd() ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->Flash->render() ?>
<header>
    <?php if($this->getRequest()->getSession()->check("Auth.User.username")): ?>
        <?= $this->Html->link(__('logout'), ["controller" => "users", 'action' => 'logout'], ["class" => "float-right btn ml-md-3 btn-dark"]) ?>
    <?php endif ?>
</header>
<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-md-2">
            <?= $this->fetch('content') ?>
<!--
fetch(content)内でdiv閉じてる
    </div>
</div>
-->
<footer>
    <p>ログインID: <?= $this->getRequest()->getSession()->read("Auth.User.username") ?></p>
</footer>
</body>
</html>
