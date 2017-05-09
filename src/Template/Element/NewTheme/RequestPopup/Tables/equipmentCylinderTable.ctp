<table class="table table-default table-bordered border-blue">
    <!-- Begin Table Body 1 -->
    <tbody class="table-body-1">
    <!-- Begin Row 1 ( full 6 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td rowspan="6">
            <div class="radio">
                <label>
                    <input checked="checked" type="radio" name="equipmentCylinder<?= $id ?>all_radio1" id="equipmentCylinder<?= $id ?>tbody1_radio1_1" value="option1">
                    <?= "第一希望" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 2 == -->
        <td rowspan="4"><?= "タイプ" ?></td>

        <!-- == Cell 3 == -->
        <td><?= "タイプ" ?></td>

        <!-- == Cell 4 == -->
        <td width="35%">
            <div class="form-group clearfix">
                <label for="fromDateFilter"><?= "指定なし" ?></label>
                <input type="text" class="form-control" placeholder="<?= "機種名" ?>" id="equipmentCylinder<?= $id ?>tbody1_textbox1" name="equipmentCylinder<?= $id ?>tbody1_textbox1">
            </div>
        </td>

        <!-- == Cell 5 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input checked="checked" type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio2" id="equipmentCylinder<?= $id ?>tbody1_radio2_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 6 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio2" id="equipmentCylinder<?= $id ?>tbody1_radio2_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 1 ( full 6 cells ) -->

    <!-- Begin Row 2 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "容量" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%"><?= "2L" ?></td>
    </tr>
    <!--Close Row 2 ( 2 cells ) -->

    <!-- Begin Row 3 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "圧力" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <p class="clearfix">
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio3" id="equipmentCylinder<?= $id ?>tbody1_radio3_1" value="option1">
                        <?= "4.7MPa" ?>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio3" id="equipmentCylinder<?= $id ?>tbody1_radio3_2" value="option2">
                        <?= "19.7MPa" ?>
                    </label>
                </div>
            </p>
            <p class="description">
                <?= "※圧力を変更する際は、<br>
                必要に応じて本数を変更してください。" ?>
            </p>
        </td>
    </tr>
    <!-- Close Row 3 ( 2 cells ) -->

    <!-- Begin Row 4 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "本数" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <div class="form-group">
                <input value="3" type="text" class="form-control" id="equipmentCylinder<?= $id ?>tbody1_textbox2" name="equipmentCylinder<?= $id ?>tbody1_textbox2">
                <label for="equipmentCylinder<?= $id ?>tbody1_textbox2">年</label>
            </div>
        </td>
    </tr>
    <!--Close Row 4 ( 2 cells ) -->

    <!-- Begin Row 5 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "流量調整器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "○○" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody1_radio4" id="equipmentCylinder<?= $id ?>tbody1_radio4_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio4" id="equipmentCylinder<?= $id ?>tbody1_radio4_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 5 ( 4 cells ) -->

    <!-- Begin Row 6 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "呼吸同調器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "使用しない" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody1_radio5" id="equipmentCylinder<?= $id ?>tbody1_radio5_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody1_radio5" id="equipmentCylinder<?= $id ?>tbody1_radio5_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!--Close Row 6 ( 4 cells ) -->
    </tbody>
    <!-- Close Table Body 1-->

    <!-- Begin Table Body 2 -->
    <tbody class="table-body-2">
    <!-- Begin Row 1 ( full 6 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td rowspan="6">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>all_radio1" id="equipmentCylinder<?= $id ?>all_radio1_2" value="option2">
                    <?= "第二希望" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 2 == -->
        <td rowspan="4"><?= "タイプ" ?></td>

        <!-- == Cell 3 == -->
        <td><?= "タイプ" ?></td>

        <!-- == Cell 4 == -->
        <td width="35%">
            <div class="form-group clearfix">
                <label for="fromDateFilter"><?= "指定なし" ?></label>
                <input type="text" class="form-control" placeholder="<?= "機種名" ?>" id="equipmentCylinder<?= $id ?>tbody2_textbox1" name="equipmentCylinder<?= $id ?>tbody2_textbox1">
            </div>
        </td>

        <!-- == Cell 5 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input checked="checked" type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio2" id="equipmentCylinder<?= $id ?>tbody2_radio2_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 6 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio2" id="equipmentCylinder<?= $id ?>tbody2_radio2_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 1 ( full 6 cells ) -->

    <!-- Begin Row 2 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "容量" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%"><?= "2L" ?></td>
    </tr>
    <!--Close Row 2 ( 2 cells ) -->

    <!-- Begin Row 3 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "圧力" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <p class="clearfix">
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio3" id="equipmentCylinder<?= $id ?>tbody2_radio3_1" value="option1">
                        <?= "4.7MPa" ?>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio3" id="equipmentCylinder<?= $id ?>tbody2_radio3_2" value="option2">
                        <?= "19.7MPa" ?>
                    </label>
                </div>
            </p>
            <p class="description">
                <?= "※圧力を変更する際は、<br>
                必要に応じて本数を変更してください。" ?>
            </p>
        </td>
    </tr>
    <!-- Close Row 3 ( 2 cells ) -->

    <!-- Begin Row 4 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "本数" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <div class="form-group">
                <input value="3" type="text" class="form-control" id="equipmentCylinder<?= $id ?>tbody2_textbox2" name="equipmentCylinder<?= $id ?>tbody2_textbox2">
                <label for="equipmentCylinder<?= $id ?>tbody2_textbox2">年</label>
            </div>
        </td>
    </tr>
    <!--Close Row 4 ( 2 cells ) -->

    <!-- Begin Row 5 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "流量調整器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "○○" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody2_radio4" id="equipmentCylinder<?= $id ?>tbody2_radio4_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio4" id="equipmentCylinder<?= $id ?>tbody2_radio4_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 5 ( 4 cells ) -->

    <!-- Begin Row 6 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "呼吸同調器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "使用しない" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody2_radio5" id="equipmentCylinder<?= $id ?>tbody2_radio5_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody2_radio5" id="equipmentCylinder<?= $id ?>tbody2_radio5_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!--Close Row 6 ( 4 cells ) -->
    </tbody>
    <!-- Close Table Body 2-->


    <!-- Begin Table Body 3 -->
    <tbody class="table-body-3">
    <!-- Begin Row 1 ( full 6 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td rowspan="6">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>all_radio1" id="equipmentCylinder<?= $id ?>all_radio1_3" value="option3">
                    <?= "第三希望" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 2 == -->
        <td rowspan="4"><?= "タイプ" ?></td>

        <!-- == Cell 3 == -->
        <td><?= "タイプ" ?></td>

        <!-- == Cell 4 == -->
        <td width="35%">
            <div class="form-group clearfix">
                <label for="fromDateFilter"><?= "指定なし" ?></label>
                <input type="text" class="form-control" placeholder="<?= "機種名" ?>" id="equipmentCylinder<?= $id ?>tbody3_textbox1" name="equipmentCylinder<?= $id ?>tbody3_textbox1">
            </div>
        </td>

        <!-- == Cell 5 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input checked="checked" type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio2" id="equipmentCylinder<?= $id ?>tbody3_radio2_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 6 == -->
        <td rowspan="4">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio2" id="equipmentCylinder<?= $id ?>tbody3_radio2_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 1 ( full 6 cells ) -->

    <!-- Begin Row 2 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "容量" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%"><?= "2L" ?></td>
    </tr>
    <!--Close Row 2 ( 2 cells ) -->

    <!-- Begin Row 3 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "圧力" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <p class="clearfix">
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio3" id="equipmentCylinder<?= $id ?>tbody3_radio3_1" value="option1">
                        <?= "4.7MPa" ?>
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio3" id="equipmentCylinder<?= $id ?>tbody3_radio3_2" value="option2">
                        <?= "19.7MPa" ?>
                    </label>
                </div>
            </p>
            <p class="description">
                <?= "※圧力を変更する際は、<br>
                必要に応じて本数を変更してください。" ?>
            </p>
        </td>
    </tr>
    <!-- Close Row 3 ( 2 cells ) -->

    <!-- Begin Row 4 ( 2 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "本数" ?></td>

        <!-- == Cell 2 == -->
        <td width="35%">
            <div class="form-group">
                <input value="3" type="text" class="form-control" id="equipmentCylinder<?= $id ?>tbody3_textbox2" name="equipmentCylinder<?= $id ?>tbody3_textbox2">
                <label for="equipmentCylinder<?= $id ?>tbody3_textbox2">年</label>
            </div>
        </td>
    </tr>
    <!--Close Row 4 ( 2 cells ) -->

    <!-- Begin Row 5 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "流量調整器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "○○" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody3_radio4" id="equipmentCylinder<?= $id ?>tbody3_radio4_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio4" id="equipmentCylinder<?= $id ?>tbody3_radio4_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 5 ( 4 cells ) -->

    <!-- Begin Row 6 ( 4 cells ) -->
    <tr>
        <!-- == Cell 1 == -->
        <td><?= "呼吸同調器" ?></td>

        <!-- == Cell 2 == -->
        <td colspan="2"><?= "使用しない" ?></td>

        <!-- == Cell 3 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="equipmentCylinder<?= $id ?>tbody3_radio5" id="equipmentCylinder<?= $id ?>tbody3_radio5_1" value="option1">
                    <?= "持参" ?>
                </label>
            </div>
        </td>

        <!-- == Cell 4 == -->
        <td>
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentCylinder<?= $id ?>tbody3_radio5" id="equipmentCylinder<?= $id ?>tbody3_radio5_2" value="option2">
                    <?= "貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!--Close Row 6 ( 4 cells ) -->
    </tbody>
    <!-- Close Table Body 3-->
</table>