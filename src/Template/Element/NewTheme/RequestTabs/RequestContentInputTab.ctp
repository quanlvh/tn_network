<!-- Begin Process Title -->
<h2 class="page-sub-title"><?= "依頼内容入力" ?></h2>
<!-- Close Process Title -->

<!-- Begin Process Heading -->
<div class="process-heading">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <!-- Begin Top Process -->
            <ul class="process-nav nav nav-tabs nav-justified nav-pills small-process-nav">
                <li class="process-item">
                    <a href="#smallProcessTab1" aria-controls="home" role="tab" data-toggle="tab"><?= "医療機関確認" ?><span class="arrow-right"></span></a>
                </li>
                <li class="process-item">
                    <a href="#smallProcessTab2" aria-controls="home" role="tab" data-toggle="tab"><?= "利用者情報" ?><span class="arrow-right"></span></a>
                </li>
                <li class="process-item">
                    <a href="#smallProcessTab3" aria-controls="home" role="tab" data-toggle="tab"><?= "宿泊先情報" ?><span class="arrow-right"></span></a>
                </li>
                <li class="process-item">
                    <a href="#smallProcessTab4" aria-controls="home" role="tab" data-toggle="tab"><?= "日程情報" ?><span class="arrow-right"></span></a>
                </li>
                <li class="process-item active">
                    <a href="#smallProcessTab5" aria-controls="home" role="tab" data-toggle="tab"><?= "設置機器情報" ?><span class="arrow-right"></span></a>
                </li>
                <li class="process-item">
                    <a href="#smallProcessTab6" aria-controls="home" role="tab" data-toggle="tab"><?= "依頼会社情報" ?><span class="arrow-right"></span></a>
                </li>
            </ul>
            <!-- Close Top Process -->
        </div>
    </div>
</div>
<!-- Close Process Heading -->

<!-- Begin Process Body -->
<div class="process-body tab-content">
    <!-- Begin Sub Process Tab Content 1 -->
    <section role="tabpanel" class="tab-pane process-pane fade" id="smallProcessTab1">
        <p class="empty"><?= "空の" ?></p>
    </section>
    <!-- Close Sub Process Tab Content 1 -->
    <!-- Begin Sub Process Tab Content 2 -->
    <section role="tabpanel" class="tab-pane process-pane fade" id="smallProcessTab2">
        <p class="empty"><?= "空の" ?></p>
    </section>
    <!-- Close Sub Process Tab Content 2 -->
    <!-- Begin Sub Process Tab Content 3 -->
    <section role="tabpanel" class="tab-pane process-pane fade" id="smallProcessTab3">
        <form action="#" class="form-inline">
            <table class="table table-bordered table-form">
                <!-- Begin Row 1 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="radios_1" ><?= "宿泊先区分" ?>
                            <span class="label label-gray pull-right"><?= "必須" ?></span></label>
                    </td>
                    <td class="group-radios" width="75%">
                        <div class="radio">
                            <label>
                                <input type="radio" name="radios_1" id="radios_1_1" value="option1" checked>
                                <?= "宿泊施設" ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radios_1" id="radios_1_2" value="option2">
                                <?= "宿泊施設" ?>
                            </label>
                        </div>
                    </td>
                </tr>
                <!-- Close Row 1 -->
                <!-- Begin Row 2 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_1" ><?= "宿泊先" ?>
                            <span class="label label-gray pull-right"><?= "必須" ?></span></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_1" name="textbox_1">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 2 -->
                <!-- Begin Row 3 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_2" ><?= "電話番号" ?>
                            <span class="label label-gray pull-right"><?= "必須" ?></span></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_2" name="textbox_2">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 3 -->
                <!-- Begin Row 4 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_3" ><?= "住所" ?>
                            <span class="label label-gray pull-right"><?= "必須" ?></span></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_3" name="textbox_3">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 4 -->
                <!-- Begin Row 5 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="radios_2" ><?= "エレベーター有無" ?></label>
                    </td>
                    <td class="group-radios" width="75%">
                        <div class="radio">
                            <label>
                                <input type="radio" name="radios_2" id="radios_2_1" value="option1" checked>
                                <?= "あり" ?>
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="radios_2" id="radios_1_2" value="option2">
                                <?= "なし" ?>
                            </label>
                        </div>
                    </td>
                </tr>
                <!-- Close Row 5 -->
                <!-- Begin Row 6 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_4" ><?= "宿泊先担当者" ?></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_4" name="textbox_4">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 6 -->
                <!-- Begin Row 7 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_5" ><?= "旅行会社" ?></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_5" name="textbox_5">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 7 -->
                <!-- Begin Row 8 -->
                <tr>
                    <td width="25%">
                        <label class="full-width clearfix" for="textbox_6" ><?= "ツアー予約者<br>団体予約者<br>宿泊先予約者名" ?></label>
                    </td>
                    <td width="75%">
                        <div class="form-group full-width">
                            <input type="text" class="form-control" id="textbox_6" name="textbox_6">
                        </div>
                    </td>
                </tr>
                <!-- Close Row 8 -->
                <!-- Begin Row 9 -->
                <tr>
                    <td width="25%">
                        <label for="textbox_year" ><?= "設置履歴" ?></label>
                    </td>
                    <td width="75%">
                        <div class="form-group">
                            <input type="text" class="form-control" id="textbox_year">
                            <label for="textbox_year"><?= "年" ?></label>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="textbox_month">
                            <label for="textbox_month"><?= "月頃" ?></label>
                        </div>
                    </td>
                </tr>
                <!-- Close Row 9 -->
            </table>
        </form>
    </section>
    <!-- Close Sub Process Tab Content 3 -->
    <!-- Begin Sub Process Tab Content 4 -->
    <section role="tabpanel" class="tab-pane process-pane fade" id="smallProcessTab4">
        <p class="empty"><?= "空の" ?></p>
    </section>
    <!-- Close Sub Process Tab Content 4 -->
    <!-- Begin Sub Process Tab Content 5 -->
    <section role="tabpanel" class="tab-pane process-pane fade in active" id="smallProcessTab5">
        <form action="#" class="form-inline">
            <!-- Begin Table 1 -->
            <?php echo $this->element('NewTheme/RequestContentInput/EquipmentInfo/table_1'); ?>
            <!-- Close Table 1 -->
            <!-- Begin Table 2 -->
            <?php echo $this->element('NewTheme/RequestContentInput/EquipmentInfo/table_2'); ?>
            <!-- Close Table 2 -->
            <!-- Begin Table 3 -->
            <?php echo $this->element('NewTheme/RequestContentInput/EquipmentInfo/table_3'); ?>
            <!-- Close Table 3 -->
            <!-- Begin Table 4 -->
            <?php echo $this->element('NewTheme/RequestContentInput/EquipmentInfo/table_4'); ?>
            <!-- Close Table 4 -->
            <!-- Begin Table 5 -->
            <?php echo $this->element('NewTheme/RequestContentInput/EquipmentInfo/table_5'); ?>
            <!-- Close Table 5 -->
        </form>
    </section>
    <!-- Close Sub Process Tab Content 5 -->
    <!-- Begin Sub Process Tab Content 6 -->
    <section role="tabpanel" class="tab-pane process-pane fade" id="smallProcessTab6">
        <p class="empty"><?= "空の" ?></p>
    </section>
    <!-- Close Sub Process Tab Content 6 -->
</div>
<!-- Close Process Body -->

<!-- Begin Process Footer -->
<div class="progress-footer">
    <div class="process-action text-center">
        <div class="row">
            <div class="col-sm-12">
                <button class="btn btn-warning btn-lg"><?= "戻る" ?></button>
                <button class="btn btn-warning btn-lg"><?= "キャンセル" ?></button>
                <button class="btn btn-warning btn-lg"><?= "一時保存" ?></button>
                <button class="btn btn-warning btn-lg"><?= "次へ" ?></button>
            </div>
        </div>
    </div>
</div>
<!-- Close Process Footer -->