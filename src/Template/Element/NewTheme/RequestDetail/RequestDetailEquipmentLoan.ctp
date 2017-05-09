<!-- Begin Sub Title -->
<h2 class="page-sub-title"><?= "旅行対応内容" ?></h2>
<!-- Close Sub Title -->

<!-- Begin Panel Table 1 -->
<div class="panel panel-table">
    <div class="panel-body">
        <table class="table table-default table-bordered table-text">
            <!-- Begin Table Header -->
            <thead>
            <tr>
                <th colspan="4"><?= "依頼内容概要" ?></th>
            </tr>
            </thead>
            <!-- Close Table Header -->
            <!-- Begin Table Body -->
            <tbody>
            <!-- Begin Row 1 -->
            <tr>
                <td width="20%">
                    <?= "依頼番号" ?>
                </td>
                <td>
                    <?= "13-0000049" ?>
                </td>
            </tr>
            <!-- Close Row 1 -->
            <!-- Begin Row 2 -->
            <tr>
                <td width="20%">
                    <?= "滞在期間" ?>
                </td>
                <td>
                    <?= "2017/4/10(月)　～　2017/4/11(火)" ?>
                </td>
            </tr>
            <!--Close Row 2 -->
            <!-- Begin Row 3 -->
            <tr>
                <td width="20%">
                    <?= "利用者氏名" ?>
                </td>
                <td>
                    <?= "佐藤　テスト" ?>
                </td>
            </tr>
            <!--Close Row 3 -->
            <!-- Begin Row 4 -->
            <tr>
                <td width="20%">
                    <?= "宿泊先" ?>
                </td>
                <td>
                    <?= "テスト旅館　東京都港区" ?>
                </td>
            </tr>
            <!--Close Row 4 -->
            <!-- Begin Row 5 -->
            <tr>
                <td width="20%">
                    <?= "設置機器" ?>
                </td>
                <td>
                    <?= "酸素濃縮器" ?>
                </td>
            </tr>
            <!--Close Row 5 -->
            </tbody>
            <!-- Close Table Body -->
        </table>
    </div>

    <div class="panel-footer">
        <div class="form-actions text-right">
            <a href="#registration_content_inquiry" class="btn btn-warning btn-lg open-popup-link"><?= "詳細内容照会" ?></a>
            <button class="btn btn-warning btn-lg"><?= "編集" ?></button>
        </div>
    </div>
</div>
<!-- Add Popup Detail Registration Content Inquiry -->
<?php echo $this->element('NewTheme/RequestPopup/RegistrationContentsInquiry'); ?>
<!-- Close Panel Table 1 -->

<!-- Begin Panel Table 2 -->
<div class="panel panel-table">
    <div class="panel-heading">
        <h3 class="heading-blue">
            <?= "現在の状況" ?>
        </h3>
    </div>
    <div class="panel-body">
        <div class="row no-margin equipment-load-tabs">
            <div class="col-sm-12">
                <!-- Begin Top Process -->
                <ul class="nav nav-tabs nav-justified circle-tabs">
                    <li class="circle-item">
                        <a href="#equipmentLoanTab1" aria-controls="equipmentLoanTab1" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "旅行受付" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item">
                        <a href="#equipmentLoanTab2" aria-controls="equipmentLoanTab2" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "貸出機器手配" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item active">
                        <a href="#equipmentLoanTab3" aria-controls="equipmentLoanTab3" role="tab" data-toggle="tab">
                            <div class="tab-title"><?= "機器設置" ?></div>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item">
                        <a href="#equipmentLoanTab4" aria-controls="equipmentLoanTab4" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "旅行中" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item">
                        <a href="#equipmentLoanTab5" aria-controls="equipmentLoanTab5" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "機器回収" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item">
                        <a href="#equipmentLoanTab6" aria-controls="equipmentLoanTab6" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "貸出機器返却" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>

                    <li class="circle-item">
                        <a href="#equipmentLoanTab7" aria-controls="equipmentLoanTab7" role="tab" data-toggle="tab">
                            <span class="tab-title"><?= "対応完了" ?></span>
                            <div class="tab-circle"><span class="circle"></span></div>
                        </a>
                        <div class="bottom-line"></div>
                    </li>
                </ul>
                <!-- Close Top Process -->
            </div>
            <div class="col-sm-12 tab-content">
                <!-- Begin Sub Equipment Loan Tab Step 1 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab1">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step1_TravelAcceptance'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 1 -->

                <!-- Begin Sub Equipment Loan Tab Step 2 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab2">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step2_EquipmentArrangement'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 2 -->

                <!-- Begin Sub Equipment Loan Tab Step 3 -->
                <section role="tabpanel" class="tab-pane gray-border fade in active" id="equipmentLoanTab3">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step3_EquipmentInstallation'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 3 -->

                <!-- Begin Sub Equipment Loan Tab Step 4 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab4">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step4_OnTrip'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 4 -->

                <!-- Begin Sub Equipment Loan Tab Step 5 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab5">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step5_EquipmentRecovery'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 5 -->

                <!-- Begin Sub Equipment Loan Tab Step 6 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab6">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step6_ReturningLending'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 6 -->

                <!-- Begin Sub Equipment Loan Tab Step 7 -->
                <section role="tabpanel" class="tab-pane gray-border fade" id="equipmentLoanTab7">
                    <?php echo $this->element('NewTheme/RequestDetail/EquipmentLoanSteps/Step7_ActionCompleted'); ?>
                </section>
                <!-- Close Sub Equipment Loan Tab Step 7 -->
            </div>
        </div>
    </div>

    <div class="panel-footer">
        <div class="form-actions text-right">
            <a href="#correspondence_status_update" class="btn btn-warning btn-lg open-popup-link"><?= "対応状況更新" ?></a>
        </div>
    </div>
</div>
<!-- Close Panel Table 2 -->

<!-- Add Popup Detail Correspondence Status Update -->
<?php echo $this->element('NewTheme/RequestPopup/CorrespondenceStatusUpdate'); ?>

<!-- Begin Panel Table 3 -->
<div class="panel panel-table">
    <div class="panel-heading">
        <h3 class="heading-blue">
            <?= "連絡事項" ?>
        </h3>
    </div>
    <div class="panel-body bg-white bordered">
        <ul class="list-group free-space">
            <li class="list-group-item">
                <span><?= "2017/04/20 23:30:25" ?></span>
                <span><?= "井上 (販売店)" ?></span>
                <span><?= "コメントしました。" ?></span>
            </li>
            <li class="list-group-item">
                <span><?= "2017/04/20 23:30:25" ?></span>
                <span><?= "井上 (販売店)" ?></span>
                <span><?= "コメントしました。" ?></span>
            </li>
            <li class="list-group-item">
                <span><?= "2017/04/20 23:30:25" ?></span>
                <span><?= "井上 (販売店)" ?></span>
                <span><?= "コメントしました。" ?></span>
            </li>
            <div class="expand-more collapse" id="collapseCommentList">
                <li class="list-group-item">
                    <span><?= "2017/04/20 23:30:25" ?></span>
                    <span><?= "井上 (販売店)" ?></span>
                    <span><?= "コメントしました。" ?></span>
                </li>
                <li class="list-group-item">
                    <span><?= "2017/04/20 23:30:25" ?></span>
                    <span><?= "井上 (販売店)" ?></span>
                    <span><?= "コメントしました。" ?></span>
                </li>
                <li class="list-group-item">
                    <span><?= "2017/04/20 23:30:25" ?></span>
                    <span><?= "井上 (販売店)" ?></span>
                    <span><?= "コメントしました。" ?></span>
                </li>
                <li class="list-group-item">
                    <span><?= "2017/04/20 23:30:25" ?></span>
                    <span><?= "井上 (販売店)" ?></span>
                    <span><?= "コメントしました。" ?></span>
                </li>
            </div>
            <li class="list-group-item show-all text-center">
                <a role="button" class="collapsed toggle-collapse" data-toggle="collapse" href="#collapseCommentList" aria-expanded="false" aria-controls="collapseCommentList">
                    <span class="hidden-text"><?= "全て表示" ?></span>
                    <span class="icon-collapse fa fa-chevron-down" aria-hidden="true"></span>
                </a>
            </li>
        </ul>
    </div>

    <div class="panel-footer">
        <div class="row form-actions">
            <div class="col-sm-9">
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="detailEquipmentLoanPanel3_textbox1" placeholder="<?= "連絡事項を記入" ?>">
                </div>
            </div>
            <div class="col-sm-3">
                <button class="btn btn-warning btn-lg full-width"><?= "登録" ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Close Panel Table 3 -->

<!-- Begin Panel Table 4 -->
<div class="panel panel-table">
    <div class="panel-heading">
        <h3 class="heading-blue">
            <?= "追加配送情報" ?>
        </h3>
    </div>
    <div class="panel-body">
        <table class="table table-brown table-data table-bordered table-centered">
            <!-- Begin Table Header -->
            <thead>
            <tr>
                <th><?= "対応日" ?></th>
                <th><?= "担当者" ?></th>
                <th width="30%"><?= "内容" ?></th>
                <th><?= "金額" ?></th>
                <th></th>
            </tr>
            </thead>
            <!-- Close Table Header -->
            <!-- Begin Table Body -->
            <tbody>
            <!-- Data Row 1 -->
            <tr>
                <td><?= "2017/04/20(金" ?></td>
                <td><?= "井上（販売店）" ?></td>
                <td><?= "ボンベ追加配送 3本" ?></td>
                <td><?= "￥4,000" ?></td>
                <td><button class="btn btn-gray btn-sm full-width"><?= "削除" ?></button></td>
            </tr>
            <!-- Data Row 2 -->
            <tr>
                <td><?= "2017/04/20(金" ?></td>
                <td><?= "井上（販売店）" ?></td>
                <td><?= "ボンベ追加配送 3本" ?></td>
                <td><?= "￥4,000" ?></td>
                <td><button class="btn btn-gray btn-sm full-width"><?= "削除" ?></button></td>
            </tr>
            </tbody>
            <!-- Close Table Body -->
        </table>
    </div>

    <div class="panel-footer">
        <div class="form-actions clearfix">
            <span class="strong-danger-color height-btn-lg">
                <?= "※追加配送をご希望の場合、受託会社担当者にご連絡ください。" ?>
            </span>
            <a href="#additional_delivery_registration" class="no-margin btn btn-warning btn-lg pull-right open-popup-link open-popup-link"><?= "追加配送登録" ?></a>
        </div>
    </div>
</div>
<!-- Render Popup Additional Delivery Registration -->
<?php echo $this->element('NewTheme/RequestPopup/AdditionalDeliveryRegistration'); ?>
<!-- Close Panel Table 4 -->

<!-- Begin Process Footer -->
<div class="content-footer">
    <div class="form-actions text-center">
        <div class="row">
            <div class="col-sm-12 clearfix">
                <a class="blue-link link-xlg pull-left"><?= "この依頼をキャンセルする" ?></a>
                <a href="/contractRequestList/index/2" class="no-margin btn btn-warning btn-xlg"><?= "戻る" ?></a>
            </div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
            <div class="spacer"></div>
        </div>
    </div>
</div>
<!-- Close Process Footer -->