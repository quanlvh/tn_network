<div class="requests-list-wrapper region">
<?php if($list_type != 'equipmentLoan') :?>
<!-- Begin Header Region -->
<div class="region-header over-large-gutter">
    <div class="panel panel-gray panel-filter">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" class="collapsed" href="#filterFormWrapper" aria-expanded="false" aria-controls="filterFormWrapper">
                    <span class="fa fa-search" aria-hidden="true"></span>
                    <span class="caption"><?= "検索" ?></span>
                    <span class="caret-filter fa fa-chevron-circle-up" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="filterFormWrapper" class="panel-collapse collapse" role="tabpanel" aria-labelledby="filterFormWrapper">
            <div class="panel-body">
                <!-- Begin Filter Form -->
                <form action="#" class="filter-form form-grid">
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="requestNumberFilter"><?= "依頼番号:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="requestNumberFilter" name="requestNumberFilter">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="accommodationFilter"><?= "宿泊先:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="accommodationFilter" name="accommodationFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group clearfix">
                                <label class="col-xs-12" style="width: 12%;" for="accommodationAddressFilter2"><?= "宿泊先住所:" ?></label>
                                <div class="col-xs-12 no-padding" style="width: 88%;">
                                    <input type="text" class="form-control" id="accommodationAddressFilter2" name="accommodationAddressFilter2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="accommodationAddressFilter"><?= "患者様名:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="accommodationAddressFilter" name="accommodationAddressFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="fromDateFilter"><?= "滞在期間:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="fromDateFilter" name="fromDateFilter">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-offset-1 col-xs-2" for="toDateFilter"><?= "～" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="toDateFilter" name="toDateFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12">
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-white btn-lg"><?= "クリア" ?></button>
                                <button type="button" class="btn btn-brown btn-lg"><?= "この条件で検索" ?></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Close Filter Form -->
            </div>
        </div>
    </div>
</div>
<!-- Close Header Region -->
<?php endif; ?>

<!-- Begin Main Region -->
<div class="region-main">
    <?php if($list_type == 1) :?>

        <!-- List Requests waiting for Answer -->
        <?php echo $this->element('NewTheme/ListTypeAnswerWaiting'); ?>

    <?php elseif($list_type == 2) : ?>

        <!-- List Requests on going to send -->
        <?php echo $this->element('NewTheme/ListTypeOnGoing'); ?>

    <?php elseif($list_type == 'equipmentLoan') : ?>

        <!-- List Requests on going to send -->
        <?php echo $this->element('NewTheme/RequestDetail/RequestDetailEquipmentLoan'); ?>

    <?php endif; ?>
</div>
<!-- Close Main Region -->
</div>