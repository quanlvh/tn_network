<!-- Modal-box -->
<div id="request_detail_<?= $id ?>" class="white-popup mfp-hide popup-wrapper">
    <div class="popup-content">
        <form action="#" id="requestDetailForm_<?= $id ?>">
            <!-- Begin Popup Heading -->
            <h3 class="popup-heading">
                <?= "対応回答" ?>
            </h3>
            <!-- Close Popup Heading -->

            <!-- Begin Popup Body -->
            <div class="popup-body">
                <!-- Begin Request Detail Table 1 -->
                <table class="table table-default table-bordered">
                    <!-- Begin Table Header -->
                    <thead>
                    <tr>
                        <th colspan="4"><?= "宿泊先（機器設置先）情報" ?></th>
                    </tr>
                    </thead>
                    <!-- Close Table Header -->
                    <!-- Begin Table Body -->
                    <tbody>
                    <!-- Begin Row 1 -->
                    <tr>
                        <td width="20%"><?= "宿泊先" ?></td>
                        <td><?= "テスト旅館" ?></td>
                    </tr>
                    <!-- Close Row 1 -->

                    <!-- Begin Row 2 -->
                    <tr>
                        <td width="20%"><?= "宿泊先住所" ?></td>
                        <td><?= "" ?></td>
                    </tr>
                    <!--Close Row 2 -->

                    <!-- Begin Row 3 -->
                    <tr>
                        <td width="20%"><?= "電話番号" ?></td>
                        <td><?= "0000-000-000" ?></td>
                    </tr>
                    <!--Close Row 3 -->

                    <!-- Begin Row 4 -->
                    <tr>
                        <td width="20%"><?= "旅行会社名" ?></td>
                        <td><?= "テスト旅館" ?></td>
                    </tr>
                    <!--Close Row 4 -->

                    <!-- Begin Row 5 -->
                    <tr>
                        <td width="20%"><?= "設置履歴 " ?></td>
                        <td><?= "" ?></td>
                    </tr>
                    <!--Close Row 5 -->
                    </tbody>
                    <!-- Close Table Body -->
                </table>
                <!-- Close Request Detail Table 1 -->

                <!-- Begin Request Detail Table 2 -->
                <table class="table table-default table-bordered">
                    <!-- Begin Table Header -->
                    <thead>
                    <tr>
                        <th colspan="4"><?= "日程情報" ?></th>
                    </tr>
                    </thead>
                    <!-- Close Table Header -->
                    <!-- Begin Table Body -->
                    <tbody>
                    <!-- Begin Row 1 -->
                    <tr>
                        <td width="20%"><?= "滞在期間" ?></td>
                        <td><?= "2017/02/22(水)　～　2017/02/25(土)" ?></td>
                    </tr>
                    <!-- Close Row 1 -->

                    <!-- Begin Row 2 -->
                    <tr>
                        <td width="20%"><?= "事前設置" ?></td>
                        <td><?= "可" ?></td>
                    </tr>
                    <!--Close Row 2 -->

                    <!-- Begin Row 3 -->
                    <tr>
                        <td width="20%"><?= "後日回収" ?></td>
                        <td><?= "可" ?></td>
                    </tr>
                    <!--Close Row 3 -->
                    </tbody>
                    <!-- Close Table Body -->
                </table>
                <!-- Close Request Detail Table 2 -->

                <!-- Begin Request Detail Table 3 -->
                <table class="table table-default table-bordered">
                    <!-- Begin Table Header -->
                    <thead>
                    <tr>
                        <th colspan="4"><?= "日程情報" ?></th>
                    </tr>
                    </thead>
                    <!-- Close Table Header -->
                    <!-- Begin Table Body -->
                    <tbody>
                    <!-- Begin Row 1 -->
                    <tr>
                        <td width="20%" rowspan="2"><?= "酸素濃縮器" ?></td>
                        <td><?= "第一希望　3Lタイプ　加湿あり　機種名:test_machine" ?></td>
                    </tr>
                    <!-- Close Row 1 -->

                    <!-- Begin Row 2 -->
                    <tr>
                        <td><?= "第二希望　3Lタイプ　加湿あり　機種指定なし" ?></td>
                    </tr>
                    <!--Close Row 2 -->

                    <!-- Begin Row 3 -->
                    <tr>
                        <td width="20%" rowspan="2"><?= "ボンベ" ?></td>
                        <td>
                            <p><?= "第一希望　ヨーク式バルブ　2L　19.6MPa　3本" ?></p>
                            <ul>
                                <li><?= "流量調整器　持参　○○" ?></li>
                                <li><?= "呼吸同調器　なし" ?></li>
                            </ul>
                        </td>
                    </tr>
                    <!--Close Row 3 -->

                    <!-- Begin Row 4 -->
                    <tr>
                        <td>
                            <p><?= "第一希望　ヨーク式バルブ　2L　19.6MPa　3本" ?></p>
                            <ul>
                                <li><?= "流量調整器　持参　○○" ?></li>
                                <li><?= "呼吸同調器　なし" ?></li>
                            </ul>
                        </td>
                    </tr>
                    <!--Close Row 4 -->
                    </tbody>
                    <!-- Close Table Body -->
                </table>
                <!-- Close Request Detail Table 3 -->
            </div>
            <!-- Close Popup Body -->

            <!-- Begin Popup Footer -->
            <div class="popup-footer">
                <!-- Begin Footer Table -->
                <table class="table table-info table-bordered">
                    <!-- Begin Table Header -->
                    <thead>
                    <tr>
                        <th colspan="4"><?= "回答入力" ?></th>
                    </tr>
                    </thead>
                    <!-- Close Table Header -->
                    <!-- Begin Table Body -->
                    <tbody>
                    <!-- Begin Row 1 -->
                    <tr>
                        <td width="20%">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="requestDetail<?= $id ?>_radio1" id="requestDetail<?= $id ?>_radio1_1" value="option1">
                                    <?= "宿泊施設" ?>
                                </label>
                            </div>
                        </td>
                        <td>
                            <p class="description"><?= "※機器が用意できない場合、全部または一部機器の貸出を依頼することができます。
                            　設置いただく機器は、次の画面で選択してください。" ?></p>
                        </td>
                    </tr>
                    <!-- Close Row 1 -->

                    <!-- Begin Row 2 -->
                    <tr>
                        <td width="20%">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="requestDetail<?= $id ?>_radio1" id="requestDetail<?= $id ?>_radio1_2" value="option2">
                                    <?= "宿泊施設" ?>
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="row small-space">
                                <div class="col-sm-4">
                                    <div class="form-group clearfix no-anymargin">
                                        <label class="sr-only" for="requestDetail<?= $id ?>_select1"><?= "Selectbox 1" ?></label>
                                        <select id="requestDetail<?= $id ?>_select1" name="requestDetail<?= $id ?>_select1" class="form-control nice-select">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group clearfix no-anymargin">
                                        <label class="sr-only" for="requestDetail<?= $id ?>_textbox1"><?= "Textbox 1" ?></label>
                                        <input type="text" class="form-control" id="requestDetail<?= $id ?>_textbox1">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <!--Close Row 2 -->

                    </tbody>
                    <!-- Close Table Body -->
                </table>
                <!-- Close Footer Table -->

                <!-- Begin Footer Actions -->
                <div class="form-actions text-center">
                    <button href="#installation_equipment_<?= $id ?>" class="btn btn-warning btn-lg open-popup-link"><?= "次へ" ?></button>
                </div>
                <!-- Close Footer Actions -->
            </div>
            <!-- Close Popup Footer -->
        </form>
    </div>
</div>