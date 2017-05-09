<table class="table table-default table-bordered border-blue">
    <!-- Begin Table Body -->
    <tbody>
    <!-- Begin Row 1 -->
    <tr>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio1" id="equipmentOxygen<?= $id ?>_radio1_1" value="option1">
                    <?= "第一希望" ?>
                </label>
            </div>
        </td>
        <td><?= "タイプ" ?></td>
        <td width="40%">
            <?= "3L　加湿あり" ?>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio2" id="equipmentOxygen<?= $id ?>_radio2_1" value="option1">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio2" id="equipmentOxygen<?= $id ?>_radio2_1" value="option2">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 1 -->

    <!-- Begin Row 2 -->
    <tr>
        <td><?= "機種" ?></td>
        <td width="40%">
            <div class="form-group clearfix">
                <label for="equipmentOxygen<?= $id ?>_textbox1"><?= "指定なし" ?></label>
                <input type="text" placeholder="<?= "機種名" ?>" class="form-control" id="equipmentOxygen<?= $id ?>_textbox1" name="equipmentOxygen<?= $id ?>_textbox1">
            </div>
        </td>
    </tr>
    <!--Close Row 2 -->

    <!-- Begin Row 3 -->
    <tr>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio1" id="equipmentOxygen<?= $id ?>_radio1_2" value="option2">
                    <?= "第二希望" ?>
                </label>
            </div>
        </td>
        <td><?= "タイプ" ?></td>
        <td width="40%">
            <?= "3L　加湿あり" ?>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio3" id="equipmentOxygen<?= $id ?>_radio3_1" value="option1">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio3" id="equipmentOxygen<?= $id ?>_radio3_2" value="option2">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 3 -->

    <!-- Begin Row 4 -->
    <tr>
        <td><?= "機種" ?></td>
        <td width="40%">
            <div class="form-group clearfix">
                <label for="equipmentOxygen<?= $id ?>_textbox2"><?= "指定なし" ?></label>
                <input type="text" placeholder="<?= "機種名" ?>" class="form-control" id="equipmentOxygen<?= $id ?>_textbox2" name="equipmentOxygen<?= $id ?>_textbox2">
            </div>
        </td>
    </tr>
    <!--Close Row 4 -->

    <!-- Begin Row 5 -->
    <tr>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio1" id="equipmentOxygen<?= $id ?>_radio1_3" value="option3">
                    <?= "第三希望" ?>
                </label>
            </div>
        </td>
        <td><?= "タイプ" ?></td>
        <td width="40%">
            <?= "3L　加湿あり" ?>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio4" id="equipmentOxygen<?= $id ?>_radio4_1" value="option1">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
        <td rowspan="2">
            <div class="radio">
                <label>
                    <input type="radio" name="equipmentOxygen<?= $id ?>_radio4" id="equipmentOxygen<?= $id ?>_radio4_2" value="option2">
                    <?= "機器貸出依頼" ?>
                </label>
            </div>
        </td>
    </tr>
    <!-- Close Row 5 -->

    <!-- Begin Row 6 -->
    <tr>
        <td><?= "機種" ?></td>
        <td width="40%">
            <div class="form-group clearfix">
                <label for="equipmentOxygen<?= $id ?>_textbox3"><?= "指定なし" ?></label>
                <input type="text" placeholder="<?= "機種名" ?>" class="form-control" id="equipmentOxygen<?= $id ?>_textbox3" name="equipmentOxygen<?= $id ?>_textbox3">
            </div>
        </td>
    </tr>
    <!--Close Row 6 -->
    </tbody>
    <!-- Close Table Body -->
</table>