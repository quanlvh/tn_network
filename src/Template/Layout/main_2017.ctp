<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Created by: TuanBlake
 * Create new layout for new theme, it was build with bootstrap framework (http://getbootstrap.com).
 */
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('newtheme/normalize.css') ?>
    <?= $this->Html->css('newtheme/bootstrap.css') ?>
    <?= $this->Html->css('newtheme/font-awesome.css') ?>
    <?= $this->Html->css('newtheme/ionicons.css') ?>
    <?= $this->Html->css('newtheme/libraries.css') ?>
    <?= $this->Html->css('newtheme/skin.css') ?>
    <?= $this->Html->css('newtheme/content.css') ?>
    <?= $this->Html->css('newtheme/style.css') ?>

    <?= $this->Html->script(['newtheme/jquery.js','newtheme/spin.js','newtheme/bootstrap.js', 'newtheme/jquery.magnific-popup.js', 'newtheme/menu-aim.js', 'newtheme/modernizr.js', 'newtheme/jquery.nice-select.js', 'newtheme/main.js']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div id="content" class="container-fluid">
    <header class="header">
        <div class="row">
            <div class="col-sm-12">
                <div class="header-top">
                    <div class="row bg-primary">
                        <div class="col-sm-12 text-right"><p>TNネットワーク会旅行サービスシステム</p></div>
                    </div>
                </div>
                <div class="header-content">
                    <div class="row bg-white">
                        <div class="col-md-4 logo-wrapper">
                            <a href="<?= '/mypage' ?>" class="logo-link">
                                <?= $this->Html->image('logo.png', ['alt' => 'TN Network']) ?>
                                <span class="site-slogan">
                                    <?= "TNネットワーク会旅行サービスシステム" ?>
                                </span>
                            </a>
                        </div>
                        <div class="col-md-8 clearfix header-right">
                            <!-- Account Dropdown -->
                            <div class="account-info cd-dropdown-wrapper pull-right open-to-left">
                                <a class="cd-dropdown-trigger" href="#account-info"><span class="text">サイトの使い方</span>
                                    &nbsp;&nbsp;<span class="dropdown-caret icon-sprite" aria-hidden="true"></span></a>
                                <nav class="cd-dropdown">
                                    <a href="#account-info" class="cd-close">Close</a>
                                    <div class="cd-dropdown-content bg-white">
                                        <ul class="list-group">
                                            <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                            <li class="list-group-item">Nulla et mi finibus, feugiat justo quis, blandit erat.</li>
                                            <li class="list-group-item">Nulla fermentum velit ac arcu aliquam dignissim.</li>
                                            <li class="list-group-item">Integer viverra ex ac neque dictum euismod.</li>
                                            <li class="list-group-item">Duis efficitur mi sit amet sem vulputate, in sodales tortor euismod.</li>
                                        </ul>
                                    </div> <!-- .cd-dropdown-content -->
                                </nav> <!-- .cd-dropdown -->
                            </div>
                            <!-- Notification Dropdown -->
                            <div class="notification-info cd-dropdown-wrapper pull-right open-to-left">
                                <a class="cd-dropdown-trigger notification-menu" href="#notification">
                                    <span class="notice-icon icon-sprite"></span>
                                    <span class="text">お知らせ</span>
                                    &nbsp;&nbsp;<span class="dropdown-caret icon-sprite" aria-hidden="true"></span></a>
                                <nav class="cd-dropdown">
                                    <a href="#notification" class="cd-close">Close</a>
                                    <div class="cd-dropdown-content bg-white">
                                        <ul class="list-group">
                                            <?php foreach ($mst_news as $key => $news):?>
                                                <li class="list-group-item">
                                                    <div class="row no-margin">
                                                        <?php if(!empty($news['news_update_date'])) : ?>
                                                            <div class="col-xs-2 no-padding">
                                                                <span class="notice-date"><?= $news['news_update_date']->format('Y/m/d') ?></span>
                                                            </div>
                                                            <div class="col-xs-10">
                                                                <a href="#" class="notice-detail">
                                                                    <span class="title"><?=$news['news_title'] . ': '?></span>
                                                                    <?=$news['news_detail'];?>
                                                                </a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="col-xs-12 no-padding">
                                                                <a href="#" class="notice-detail">
                                                                    <span class="title"><?=$news['news_title'] . ': '?></span>
                                                                    <?=$news['news_detail'];?>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div> <!-- .cd-dropdown-content -->
                                </nav> <!-- .cd-dropdown -->
                            </div>
                            <!-- Site Guide Dropdown -->
                            <div class="site-guide-info cd-dropdown-wrapper pull-right open-to-left">
                                <a class="cd-dropdown-trigger" href="#site-guide"><span class="text">サイトの使い方</span>
                                    &nbsp;&nbsp;<span class="dropdown-caret icon-sprite" aria-hidden="true"></span></a>
                                <nav class="cd-dropdown">
                                    <a href="#site-guide" class="cd-close">Close</a>
                                    <div class="cd-dropdown-content bg-white">
                                        <ul class="list-group">
                                            <li class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                                            <li class="list-group-item">Nulla et mi finibus, feugiat justo quis, blandit erat.</li>
                                            <li class="list-group-item">Nulla fermentum velit ac arcu aliquam dignissim.</li>
                                            <li class="list-group-item">Integer viverra ex ac neque dictum euismod.</li>
                                            <li class="list-group-item">Duis efficitur mi sit amet sem vulputate, in sodales tortor euismod.</li>
                                        </ul>
                                    </div> <!-- .cd-dropdown-content -->
                                </nav> <!-- .cd-dropdown -->
                            </div>
                            <!-- Datetime info -->
                            <div class="datetime-info pull-right">2017/04/01</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="main-content">
        <div class="row">

            <!-- Begin Sidebar Left -->
            <div class="sidebar-left col-sm-3">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- Begin Side Bar Page Header -->
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab">
                            <h1 class="panel-title">
                                <a  class="clearfix" role="button" href="/mypage">
                                    <?= 'Top'?>
                                </a>
                            </h1>
                        </div>
                    </div>
                    <!-- Close Side Bar Page Header -->
                    <!-- Begin Side Bar Menu 1 -->
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="clearfix" role="button" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    受託
                                    <span class="large-caret dropdown-caret pull-right icon-sprite" aria-hidden="true"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ul class="list-group menu-sidebar">
                                    <li class="list-group-item"><a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ANSWER_WAITING?>';">未回答
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>
                                            <span class="badge warning small pull-right"><?= '36' ?></span></a></li>
                                    <li class="list-group-item"><a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ONGOING?>';">対応中
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>
                                            <span class="badge warning small pull-right"><?= '36' ?></span></a></li>
                                    <li class="list-group-item"><a href="#">受託履歴
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Close Side Bar Menu 1 -->

                    <!-- Begin Side Bar Menu 2 -->
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="clearfix" role="button" data-toggle="collapse" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    依頼
                                    <span class="large-caret dropdown-caret pull-right icon-sprite" aria-hidden="true"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul class="list-group menu-sidebar">
                                    <li class="list-group-item"><a href="/requests">新規依頼
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>
                                            <span class="badge warning small pull-right"><?= '36' ?></span></a></li>
                                    <li class="list-group-item"><a href="#">貸出機器依頼
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">依頼中
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i>
                                            <span class="badge warning small pull-right"><?= '36' ?></span></a></li>
                                    <li class="list-group-item"><a href="#">対応不可
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">依頼履歴
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Close Side Bar Menu 2 -->

                    <!-- Begin Side Bar Menu 3 -->
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="clearfix" role="button" data-toggle="collapse" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    各種機能
                                    <span class="large-caret dropdown-caret pull-right icon-sprite" aria-hidden="true"></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <ul class="list-group menu-sidebar">
                                    <li class="list-group-item"><a href="#">各種資料
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="javascript: void(0);" onclick="window.location.href='/companyInfoMaintenance/index';">会社情報メンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">事業所情報メンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">ユーザ情報メンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="javascript: void(0);" onclick="window.location.href='/availableAreasMaintenance/index';">対応可能エリアメンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">機器マスタメンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">お知らせメンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">単価マスタメンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                    <li class="list-group-item"><a href="#">サービス利用規約メンテナンス
                                            <i class="fa fa-chevron-right pull-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Close Side Bar Menu 3 -->
                </div>
            </div>
            <!-- Close Sidebar Left -->

            <!-- Begin Content -->
            <div class="content col-sm-9">
                <?= $this->Flash->render() ?>

                <!-- Begin Controller View -->
                <?= $this->fetch('content') ?>
                <!-- Close Controller View -->
            </div>
            <!-- Close Content -->

        </div>
    </main>

</div>
</body>
</html>