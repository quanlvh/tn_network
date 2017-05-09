<!-- Modal-box -->
<div id="additional_delivery_registration" class="white-popup mfp-hide popup-wrapper additional-registration-popup">
    <div class="popup-content">
        <form action="#" id="additionalDeliveryRegistrationForm" class="form-inline">
            <!-- Begin Popup Heading -->
            <h3 class="popup-heading">
                <?= "追加登録" ?>
            </h3>
            <!-- Close Popup Heading -->

            <!-- Begin Popup Body -->
            <div class="popup-body tabs-wrapper tab-table">
                <!-- Begin Table with Rows -->
                <div class="table-with-rows fw-bold padding-lg-sidespace">
                    <div class="row row-item">
                        <div class="col-sm-6 no-padding right-line">
                            <div class="col-sm-4 cell-item">
                                <label for="correspondingDate"><?= "対応日" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <input type="text" class="form-control" id="correspondingDate" name="correspondingDate">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 no-padding">
                            <div class="col-sm-4 cell-item">
                                <label for="deliveryPerson"><?= "配送担当者" ?></label>
                            </div>
                            <div class="col-sm-8 cell-item">
                                <div class="form-group full-width">
                                    <input type="text" class="form-control" id="deliveryPerson" name="deliveryPerson">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row-item small-space">
                        <div class="row-line col-sm-12"></div>
                    </div>
                    <div class="row row-item">
                        <div class="col-sm-2 cell-item">
                            <label for="additionalDeliveryRequestSource"><?= "追加配送依頼元" ?></label>
                        </div>
                        <div class="col-sm-10 cell-item">
                            <div class="form-group full-width">
                                <input type="text" class="form-control" id="additionalDeliveryRequestSource" name="additionalDeliveryRequestSource">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Close Table with Rows -->

                <!-- Begin Table Correspondence List -->
                <table class="table table-default table-bordered table-form table-additional" data-current-key="2">
                    <!-- Begin Table Header -->
                    <thead>
                    <tr>
                        <th width="45%"><?= "対応内容" ?></th>
                        <th><?= "本数" ?></th>
                        <th><?= "金額" ?></th>
                    </tr>
                    </thead>
                    <!-- Close Table Header -->
                    <!-- Begin Table Body -->
                    <tbody>
                    <!-- Begin Row 0 -->
                    <tr class="data-row" data-number="0">
                        <td>
                            <div class="form-group full-width">
                                <select id="correspondence_contents_0" name="correspondence_contents[]" class="form-control nice-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="number_0" name="number[]">
                                <label for="number_0"><?= "本" ?></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="amountMoney_0" name="amountMoney[]">
                                <label for="amountMoney_0"><?= "円" ?></label>
                            </div>
                        </td>
                    </tr>
                    <!-- Close Row 0 -->
                    <!-- Begin Row 1 -->
                    <tr class="data-row" data-number="1">
                        <td>
                            <div class="form-group full-width">
                                <select id="correspondence_contents_1" name="correspondence_contents[]" class="form-control nice-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="number_1" name="number[]">
                                <label for="number_1"><?= "本" ?></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="amountMoney_1" name="amountMoney[]">
                                <label for="amountMoney_1"><?= "円" ?></label>
                            </div>
                        </td>
                    </tr>
                    <!--Close Row 1 -->
                    <!-- Begin Row 2 -->
                    <tr class="data-row" data-number="2">
                        <td>
                            <div class="form-group full-width">
                                <select id="correspondence_contents_2" name="correspondence_contents[]" class="form-control nice-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="number_2" name="number[]">
                                <label for="number_2"><?= "本" ?></label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="text" class="form-control" id="amountMoney_2" name="amountMoney[]">
                                <label for="amountMoney_2"><?= "円" ?></label>
                            </div>
                        </td>
                    </tr>
                    <!--Close Row 2 -->
                    </tbody>
                    <!-- Close Table Body -->

                    <!-- Begin Table Footer -->
                    <tfoot>
                    <tr>
                        <td colspan="3" class="add-row-cell disabled text-center">
                            <a href="javascript: void(0);" class="btn btn-white add-row-btn">
                                <span class="add-row-icon ion-android-add-circle white-color"></span>
                                <?= "行を追加する" ?>
                            </a>
                        </td>
                    </tr>
                    </tfoot>
                    <!-- Close Table Footer -->
                </table>
                <!-- Close Table Correspondence List -->
            </div>
            <!-- Close Popup Body -->

            <!-- Begin Popup Footer -->
            <div class="popup-footer">
                <!-- Begin Footer Actions -->
                <div class="form-actions text-center">
                    <button class="btn btn-warning btn-lg"><?= "閉じる" ?></button>
                    <button class="btn btn-warning btn-lg"><?= "追加配送登録" ?></button>
                </div>
                <!-- Close Footer Actions -->
            </div>
            <!-- Close Popup Footer -->
        </form>
    </div>
</div>