<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    -->

    <?=$this->Html->script('jquery.min.js')?>
    <?=$this->Html->script('jquery-1.7.1.min.js')?>
    <?=$this->Html->script('jquery-ui.min.js')?>
    <?=$this->Html->script('datepicker-ja.js')?>
    <?=$this->Html->script('HolidayChk.js')?>
    <?=$this->Html->script('jquery.funcResizeBox.js')?>
    <?= $this->Html->css('select2.min.css'); ?>
    <?= $this->Html->script('select2.min.js', array('inline' => false)); ?>
    <?= $this->Html->css('newtheme/custom.css') ?>
<script type="text/javascript">
$(function(){
    $("#datepicker").datepicker({
            beforeShowDay: function(date) {
                var result;
                var dd = date.getFullYear() + "/" + (date.getMonth() + 1) + "/" + date.getDate();
                var hName = ktHolidayName(dd);

                if(hName != "") {
                    result = [true, "date-holiday", hName];
                } else {
                    switch (date.getDay()) {
                    case 0: //日曜日
                        result = [true, "date-holiday"];
                        break;
                    case 6: //土曜日
                        result = [true, "date-saturday"];
                        break;
                    default:
                        result = [true];
                        break;
                    }
                }
                return result;
            },
                    onSelect: function(dateText, inst) {
                        alert(dateText);
                    }
                    });
});
</script>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('jquery.autocomplete.css') ?>
    <?= $this->Html->css('common.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container" id="header_area">
        <!--ロゴ-->
        <div id="logo_area" onclick="window.location.href='/mypage';"></div>
        <!--システム名-->
        <div id="sysname_area" onclick="window.location.href='/mypage';">
            <span class="tn_network">TNネットワーク会</span><br>
            <span class="sysname">旅行サービスシステム</span>
        </div>
        <!--ユーザー名-->
        <div id="username_area">
            <nobr><span class="user_name"><?php if(@$mst_companies['company_name']): ?>ようこそ<?php endif;?>　<?= @$mst_companies['company_name']?>　<?= @$mst_branch_offices['branch_name']?>　<?= @$user['user_name'] ?><?php if(@$mst_companies['company_name']):?>様<?php endif;?></span></nobr>
        </div>
        <!--ボタン-->
        <div id="headerbutton_area">
            <button class="how_to_use" onclick="window.location.href='/manual';">サイトの使い方</button>
            <?php if(@$mst_companies['company_name']): ?>
            <button class="logout" onclick="window.location.href='/users/logout';">ログアウト</button>
            <?php endif; ?>
        </div>
    </div>

    <?= $this->Flash->render() ?>

    <div class="container clearfix">
        <div id="render_area">
        <?= $this->fetch('content') ?>
        </div>
    </div>
    <footer>
    </footer>
</body>
</html>
