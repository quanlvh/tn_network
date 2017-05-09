<!--* Created by: TuanBlake
* Create new index view for Mypage controller (index action). -->

<!-- Mypage Index Content -->
<section class="content-render request-content tabs-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <!-- Begin Top Process -->
                <ul class="process-nav nav nav-tabs nav-justified nav-pills">
                    <li class="process-item">
                        <a href="#processTab1" aria-controls="home" role="tab" data-toggle="tab"><?= "依頼先選択" ?>
                            <span class="arrow-right"></span></a>
                    </li>
                    <li class="process-item">
                        <a href="#processTab2" aria-controls="home" role="tab" data-toggle="tab"><?= "注意事項の確認" ?>
                            <span class="arrow-right"></span></a>
                    </li>
                    <li class="process-item">
                        <a href="#processTab3" aria-controls="home" role="tab" data-toggle="tab"><?= "依頼内容入力" ?>
                            <span class="arrow-right"></span></a>
                    </li>
                    <li class="process-item active">
                        <a href="#processTab4" aria-controls="home" role="tab" data-toggle="tab"><?= "依頼内容の確認" ?>
                            <span class="arrow-right"></span></a>
                    </li>
                    <li class="process-item">
                        <a href="#processTab5" aria-controls="home" role="tab" data-toggle="tab"><?= "完了" ?>
                            <span class="arrow-right"></span></a>
                    </li>
                </ul>
            <!-- Close Top Process -->
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 tab-content">

            <!-- Begin Tab Process Content 1 -->
            <div role="tabpanel" class="tab-pane process-pane fade" id="processTab1">
                <!-- Load Element: "Template/Element/NewTheme/RequestTabs/SelectRequesterTab.ctp" -->
                <?php echo $this->element('NewTheme/RequestTabs/SelectRequesterTab'); ?>
            </div>
            <!-- Close Tab Process Content 1 -->

            <!-- Begin Tab Process Content 2 -->
            <div role="tabpanel" class="tab-pane process-pane fade" id="processTab2">
                <!-- Load Element: "Template/Element/NewTheme/RequestTabs/NotesConfirmationTab.ctp" -->
                <?php echo $this->element('NewTheme/RequestTabs/NotesConfirmationTab'); ?>
            </div>
            <!-- Close Tab Process Content 2 -->

            <!-- Begin Tab Process Content 3 -->
            <div role="tabpanel" class="tab-pane process-pane fade" id="processTab3">
                <!-- Load Element: "Template/Element/NewTheme/RequestTabs/RequestContentInputTab.ctp" -->
                <?php echo $this->element('NewTheme/RequestTabs/RequestContentInputTab'); ?>
            </div>
            <!-- Close Tab Process Content 3 -->

            <!-- Begin Tab Process Content 4 -->
            <div role="tabpanel" class="tab-pane process-pane fade in active" id="processTab4">
                <!-- Load Element: "Template/Element/NewTheme/RequestTabs/RequestContentConfirmationTab.ctp" -->
                <?php echo $this->element('NewTheme/RequestTabs/RequestContentConfirmationTab'); ?>
            </div>
            <!-- Close Tab Process Content 4 -->

            <!-- Begin Tab Process Content 5 -->
            <div role="tabpanel" class="tab-pane process-pane fade" id="processTab5">
                <!-- Load Element: "Template/Element/NewTheme/RequestTabs/DoneTab.ctp" -->
                <?php echo $this->element('NewTheme/RequestTabs/DoneTab'); ?>
            </div>
            <!-- Close Tab Process Content 5 -->


        </div>
</section>