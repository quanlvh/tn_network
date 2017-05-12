<!-- Begin Sub Title -->
<h2 class="page-sub-title"><?= "ユーザ情報詳細" ?></h2>
<!-- Close Sub Title -->

<!-- Begin Panel Table 1 -->
<div class="panel panel-table">
    <div class="panel-body">
        <table class="table table-default table-bordered table-text">
            <!-- Begin Table Body -->
            <tbody>
            <tr>
                <td width="20%">
                    ユーザID
                    <span class="label label-gray pull-right">必須</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="1" name="1">
                </td>
            </tr>
            <tr>
                <td>
                    ユーザ名
                    <span class="label label-gray pull-right">必須</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="3" name="3">
                </td>
            </tr>
            <tr>
                <td>
                    メールアドレス1
                    <span class="label label-gray pull-right">必須</span>
                </td>
                <td>
                    <input type="text" class="form-control" id="3" name="3">
                </td>
            </tr>
            <tr>
                <td>メールアドレス2</td>
                <td>
                    <input type="text" class="form-control" id="4" name="4">
                </td>
            </tr>
            <tr>
                <td>権限</td>
                <td>
                    <div class="pull-left">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    可
                    </label>
                    </div>
                    <div class="pull-left pl15">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    可（フロント預かり）
                    </label>
                    </div>
                    <div class="pull-left pl15">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    不可
                    </label>
                </td>
            </tr>
            </tbody>
            <!-- Close Table Body -->
        </table>
    </div>

    <div class="panel-footer">
        <div class="form-actions pull-left">
            <button class="btn btn-warning btn-lg"><?= "戻る" ?></button>
        </div>
        <div class="form-actions pull-right">
            <button class="btn btn-warning btn-lg"><?= "登録" ?></button>
        </div>
    </div>
</div>