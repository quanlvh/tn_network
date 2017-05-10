<div class="requests-list-wrapper region">
<!-- Begin Main Region -->
<div class="region-main">

    <!-- Begin Sub Title -->
    <h2 class="page-sub-title"><?= "対応可能エリアメンテナンス" ?></h2>
    <!-- Close Sub Title -->

    <!-- Begin Region Heading -->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="region-title">対応可能エリア一覧</h3>
        </div>
    </div>
    <!-- Close Region Heading -->

    <!-- Begin Panel Table 1 -->
    <div class="panel panel-table fixtop">
        <div class="panel-body">
            <table class="table table-default table-bordered table-text">
                <!-- Begin Table Header -->
                <thead>
                <tr>
                    <th colspan="4"><?= "  対応可能エリア" ?></th>
                </tr>
                </thead>
                <!-- Close Table Header -->
                <!-- Begin Table Body -->
                <tbody>
                <!-- Begin Row 1 -->
                <tr>
                    <td>
                        <?= "東京部中央区" ?>
                    </td>
                    <td width="10%" class="center">
                        <input type="checkbox" id="#" name="#">
                    </td>
                </tr>
                <!-- Begin Row 2 -->
                <tr>
                    <td>
                        <?= "東京部港区" ?>
                    </td>
                    <td width="10%" class="center">
                        <input type="checkbox" id="#" name="#">
                    </td>
                </tr>
                <!-- Begin Row 3 -->
                <tr>
                    <td>
                        <?= "東京部品川区" ?>
                    </td>
                    <td width="10%" class="center">
                        <input type="checkbox" id="#" name="#">
                    </td>
                </tr>
                <!-- Begin Row 4 -->
                <tr>
                    <td>
                        <?= "東京部目黒区" ?>
                    </td>
                    <td width="10%" class="center">
                        <input type="checkbox" id="#" name="#">
                    </td>
                </tr>
                <!-- Begin Row 5 -->
                <tr>
                    <td>
                        <?= "東京部渋谷区" ?>
                    </td>
                    <td width="10%" class="center">
                        <input type="checkbox" id="#" name="#">
                    </td>
                </tr>
                </tbody>
                <!-- Close Table Body -->
            </table>
        </div>

        <div class="panel-footer">
            <div class="form-actions text-right">
<!--                 <a href="#" class="btn btn-warning btn-lg open-popup-link"><?= "ダミー" ?></a> -->
                <button class="btn btn-warning btn-lg"><?= "チェックした対応可能エリアを削除" ?></button>
            </div>
        </div>
    </div>

    <!-- Begin Region Heading -->
    <div class="row">
        <div class="col-sm-12">
            <h3 class="region-title">対応可能エリア登録</h3>
        </div>
    </div>
    <!-- Close Region Heading -->
    <div class="row form-actions">
        <div class="col-sm-12">
            <div class="col-sm-3 force-col-sm-3">
                <div class="form-group">
                    <select class="form-control">
                        <option value="" selected>石川県</option>
<!--                         <option value="">能美市</option>
                        <option value="">能美市</option> -->
                    </select>
                </div>
            </div>
            <div class="col-sm-3 force-col-sm-3">
                <div class="form-group">
                    <select class="form-control">
                        <option value="" selected>能美市</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 force-col-sm-3">
                <button class="btn btn-warning btn-md full-width">追加</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <img class="img-responsive" src="/img/google-map.jpg"/>
        </div>
    </div>
</div>
<!-- Close Main Region -->
</div>