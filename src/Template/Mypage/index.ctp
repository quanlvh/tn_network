<!--* Created by: TuanBlake
* Create new index view for Mypage controller (index action). -->

<!-- Mypage Index Content -->
<section class="content-render mypage-content">
    <div class="row">
        <div class="col-sm-12">
            <!-- Begin My page Top Panel -->
            <div class="panel panel-default mypage-top-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">受託</h3>
                </div>
                <div class="panel-body">
                    <div class="row no-margin">
                        <div class="col-sm-6 left-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ANSWER_WAITING?>';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-1 pull-left"></span>
                                    <span class="badge warning pull-right"><?=count($answer_waiting_requests);?></span>
                                </div>
                                <div class="text-center caption">未回答</div>
                            </a>
                        </div>
                        <div class="col-sm-6 right-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ONGOING?>';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-2 pull-left"></span>
                                    <span class="badge warning pull-right"><?=count($ongoing_requests);?></span>
                                </div>
                                <div class="text-center caption">対応中</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Close My page Top Panel -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <!-- Begin My page Bottom Panel -->
            <div class="panel panel-default mypage-bottom-panel">
                <div class="panel-heading">
                    <h3 class="panel-title">依頼</h3>
                </div>
                <div class="panel-body">
                    <div class="row no-margin">
                        <div class="col-sm-3 left-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/requests';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-3 pull-left"></span>
                                    <span class="badge warning pull-right"><?= count($requests) ?></span>
                                </div>
                                <div class="text-center caption">新規依頼</div>
                            </a>
                        </div>
                        <div class="col-sm-3 center-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_RENTAL_MACHINE?>';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-4 pull-left"></span>
                                    <span class="badge warning pull-right"><?=count($rental_machines);?></span>
                                </div>
                                <div class="text-center caption">機器貸出</div>
                            </a>
                        </div>
                        <div class="col-sm-3 center-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_REQUESTING?>';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-5 pull-left"></span>
                                    <span class="badge warning pull-right"><?=count($requests);?></span>
                                </div>
                                <div class="text-center caption">未回答</div>
                            </a>
                        </div>
                        <div class="col-sm-3 right-content block-info">
                            <a href="javascript: void(0);" onclick="window.location.href='/orderHistory/index/<?=HISTORY_TYPE_REQUEST?>';">
                                <div class="top-info clearfix">
                                    <span class="info-icon icon-6 pull-left"></span>
                                    <span class="badge warning pull-right">0</span>
                                </div>
                                <div class="text-center caption">対応不可</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>