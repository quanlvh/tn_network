<!-- Begin Sub Title -->
<h2 class="page-sub-title"><?= "各種資料" ?></h2>
<!-- Close Sub Title -->

<!-- Begin Region Content -->
<div class="region-content radius-table">
    <h3 class="heading-blue">資料一覧</h3>
    <!-- Begin List Requests Table Data -->
    <table class="table table-brown table-data table-bordered table-centered">
        <!-- Begin Table Header -->
        <thead>
        <tr>
            <th><?= "依頼番号" ?></th>
            <th><?= "滞在期間" ?></th>
            <th><?= "宿泊先" ?></th>
            <th><?= "設置機器" ?></th>
            <th><?= "削除" ?></th>
        </tr>
        </thead>
        <!-- Close Table Header -->
        <!-- Begin Table Body -->
        <tbody>
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td><input type="checkbox" id="c1" name="c1"></td>
        </tr>
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td><input type="checkbox" id="c1" name="c1"></td>
        </tr>
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td><input type="checkbox" id="c1" name="c1"></td>
        </tr>
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td><input type="checkbox" id="c1" name="c1"></td>
        </tr>
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td><input type="checkbox" id="c1" name="c1"></td>
        </tr>
        </tbody>
        <!-- Close Table Body -->
    </table>
    <!-- Close List Requests Table Data -->
</div>
<!-- Close Region Content -->

<!-- Begin Region Footer -->
<div class="region-footer text-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="disabled previous">
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true"><?= "前のページ" ?><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                </a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li class="next">
                <a href="#" aria-label="Next">
                    <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i><?= "次のページ" ?></span>
                </a>
            </li>
        </ul>
    </nav>
</div>
    <div class="form-actions text-right">
        <button class="btn btn-warning btn-lg"><?= "チェックしたファイルを削除" ?></button>
    </div>
<!-- Close Region Footer -->
<!-- Begin Panel Table 1 -->
<div class="panel panel-table">
    <h3 class="heading-blue">資料一アップロード</h3>
    <div class="panel-body">
        <table class="table table-default table-bordered table-text">
            <!-- Begin Table Body -->
            <tbody>
            <!-- Begin Row 1 -->
            <tr>
                <td width="20%">
                    ファイル九区分
                    <span class="label label-gray pull-right">必須</span></td>
                </td>
                <td>
                    <div class="col-sm-8 force-col-sm-4">
                        <div class="form-group">
                            <select class="form-control">
                            </select>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- Close Row 1 -->
            <!-- Begin Row 2 -->
            <tr>
                <td>
                    ファイル参照
                    <span class="label label-gray pull-right">必須</span></td>
                </td>
                <td>
                    <input type="text" class="form-control" id="1" name="1">
                </td>
            </tr>
            <!--Close Row 2 -->
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