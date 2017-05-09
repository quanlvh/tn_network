<!-- Modal-box -->
<div id="correspondence_status_update" class="white-popup mfp-hide popup-wrapper additional-registration-popup">
    <div class="popup-content">
        <form action="#" id="additionalDeliveryRegistrationForm" class="form-inline">
            <!-- Begin Popup Heading -->
            <h3 class="popup-heading">
                <?= "対応状況更新" ?>
            </h3>
            <!-- Close Popup Heading -->

            <!-- Begin Popup Body -->
            <div class="popup-body tabs-wrapper tab-table">
                <!-- Begin Table with Rows -->
                <h3 class="heading-blue">
                    <?= "対応状況登録" ?>
                </h3>
                <div class="table-with-rows fw-bold padding-lg-sidespace">
                    <div class="row row-item">
                        <div class="col-sm-2 cell-item">
                            <label for="correspondenceSituationSelect"><?= "対応状況" ?></label>
                        </div>
                        <div class="col-sm-10 cell-item">
                            <div class="form-group full-width">
                                <select id="correspondenceSituationSelect" name="correspondenceSituationSelect" class="form-control nice-select">
                                    <option value="1"><?= "機器設置" ?></option>
                                    <option value="2"><?= "機器設置" ?></option>
                                    <option value="3"><?= "機器設置" ?></option>
                                    <option value="4"><?= "機器設置" ?></option>
                                    <option value="5"><?= "機器設置" ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row row-item small-space">
                        <div class="row-line col-sm-12"></div>
                    </div>
                    <div class="row row-item">
                        <div class="col-sm-6 no-padding right-line">
                            <div class="col-sm-4 cell-item">
                                <label for="installationCompletionDate"><?= "設置完了日" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 no-padding">
                            <div class="col-sm-4 cell-item">
                                <label for="installationPersonnel"><?= "設置担当者" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-item small-space">
                        <div class="row-line col-sm-12"></div>
                    </div>
                    <div class="row row-item">
                        <div class="col-sm-2 cell-item">
                            <label for="correspondenceRemarks"><?= "備考" ?></label>
                        </div>
                        <div class="col-sm-10 cell-item">
                            <div class="form-group full-width">
                                <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row row-item small-space">
                        <div class="row-line col-sm-12"></div>
                    </div>

                    <div class="row row-item">
                        <div class="col-sm-6 no-padding right-line">
                            <div class="col-sm-4 cell-item">
                                <label><?= "更新者" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 no-padding">
                            <div class="col-sm-4 cell-item">
                                <label><?= "更新日" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row row-item small-space">
                        <div class="row-line col-sm-12"></div>
                    </div>
                </div>
                <h3 class="heading-blue">
                    <?= "対応済み内容編集" ?>
                </h3>
                <!-- Collapse -->
                <!-- 1 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse1">
                            旅行受付
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "回答日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 1 -->
                <!-- 2 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                            機器貸出受付
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "受付日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationPersonnel"><?= "送付予定日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 2 -->
                <!-- 3 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapseTwo">
                            貸出機器送付
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "送付完了日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-5 cell-item">
                                            <label for="installationPersonnel"><?= "到着予定日" ?></label>
                                        </div>
                                        <div class="col-sm-7 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "配送業者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-5 cell-item">
                                            <label for="installationPersonnel"><?= "お問い合わせ伝票NO" ?></label>
                                        </div>
                                        <div class="col-sm-7 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 3 -->
                <!-- 4 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapseTwo">
                            機器設置
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "設置完了日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationPersonnel"><?= "設置担当者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 4 -->
                <!-- 5 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse5" aria-expanded="true" aria-controls="collapseTwo">
                            機器回収
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "回収完了日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationPersonnel"><?= "回収担当者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 5 -->
                <!-- 6 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse6" aria-expanded="true" aria-controls="collapseTwo">
                            貸出機器返却
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "返却完了日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-5 cell-item">
                                            <label for="installationPersonnel"><?= "到着予定日" ?></label>
                                        </div>
                                        <div class="col-sm-7 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "設置担当者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-5 cell-item">
                                            <label for="installationPersonnel"><?= "お問い合わせ伝票NO" ?></label>
                                        </div>
                                        <div class="col-sm-7 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationPersonnel" name="installationPersonnel">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 6 -->
                <!-- 7 -->
                <div class="panel-statusUpdate">
                    <div class="panel-heading" role="tab">
                        <a class="clearfix collapsed" role="button" data-toggle="collapse" href="#collapse7" aria-expanded="true" aria-controls="collapseTwo">
                            対応完了
                            <span class="statusUpdate-caret dropdown-caret pull-right icon-sprite"></span>
                        </a>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse" role="tabpanel">
                        <div class="panel-body">
                            <div class="table-with-rows">
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label for="installationCompletionDate"><?= "対応完了日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <input type="text" class="form-control" id="installationCompletionDate" name="installationCompletionDate">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-2 cell-item">
                                        <label for="correspondenceRemarks"><?= "備考" ?></label>
                                    </div>
                                    <div class="col-sm-10 cell-item">
                                        <div class="form-group full-width">
                                            <textarea id="correspondenceRemarks" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-item small-space">
                                    <div class="row-line col-sm-12"></div>
                                </div>
                                <div class="row row-item">
                                    <div class="col-sm-6 no-padding right-line">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新者" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "井上（販売店）" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 no-padding">
                                        <div class="col-sm-4 cell-item">
                                            <label><?= "更新日" ?></label>
                                        </div>
                                        <div class="col-sm-8 cell-item">
                                            <div class="form-group full-width">
                                                <p class="form-control-static"><?= "2017/04/11(火)" ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Close 7 -->
                <!-- Close collapse -->
                <!-- Close Table with Rows -->
            </div>
            <!-- Close Popup Body -->

            <!-- Begin Popup Footer -->
            <div class="popup-footer">
                <!-- Begin Footer Actions -->
                <div class="form-actions text-center">
                    <button class="btn btn-warning btn-lg magnific-popup-close"><?= "閉じる" ?></button>
                    <button class="btn btn-warning btn-lg"><?= "登録" ?></button>
                </div>
                <!-- Close Footer Actions -->
            </div>
            <!-- Close Popup Footer -->
        </form>
    </div>
</div>