<head>
    <?= $this->Html->css('newtheme/bootstrap.css') ?>
    <?= $this->Html->css('newtheme/style.css') ?>
    <?= $this->Html->css('newtheme/skin.css') ?>
    <?= $this->Html->css('newtheme/custom.css') ?>
</head>

<style type="text/css">
</style>
<div class="requests-list-wrapper region">
<!-- <?php if(!$page) :?> -->
<!-- Begin Header Region -->
<div class="region-header over-large-gutter">
    <div class="region-main">
        <h2 class="page-sub-title">ユーザー登録申請</h2>
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
                        <td>所属会社
                            <span class="label label-gray pull-right">必須</span>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="4" name="4">
                        </td>
                    </tr>
                    <tr>
                        <td>所属事業所
                            <span class="label label-gray pull-right">必須</span>
                        </td>
                        <td>
                            <input type="text" class="form-control" id="4" name="4">
                        </td>
                    </tr>
                    <tr>
                        <td>役職</td>
                        <td>
                            <input type="text" class="form-control" id="4" name="4">
                        </td>
                    </tr>
                    </tbody>
                    <!-- Close Table Body -->
                </table>
            </div>

            <div class="panel-footer">
                <div class="form-actions text-center">
                    <a href="#registration_content_inquiry" class="btn btn-warning btn-lg open-popup-link" 
                    onclick="window.location.href='/users/login';"
                    ><?= "戻る" ?></a>
                    <button class="btn btn-warning btn-lg"
                    onclick="window.location.href='/users/confirm';"
                    ><?= "次に" ?></button>
                </div>
            </div>
        </div>
</div>
<!-- Close Header Region -->
<!-- <?php endif; ?> -->
</div>