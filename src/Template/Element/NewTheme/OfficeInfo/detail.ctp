<!-- Begin Sub Title -->
<h2 class="page-sub-title"><?= "事業所情報詳細" ?></h2>
<!-- Close Sub Title -->

<!-- Begin Panel Table 1 -->
<div class="panel panel-table">
    <div class="panel-body">
        <table class="table table-default table-bordered table-text">
            <!-- Begin Table Body -->
            <tbody>
            <!-- Begin Row 1 -->
            <tr>
                <td width="20%">
                    会社名
                    <span class="label label-gray pull-right">必須</span></td>
                </td>
                <td>
                    <input type="text" class="form-control" id="1" name="1">
                </td>
            </tr>
            <!-- Close Row 1 -->
            <!-- Begin Row 2 -->
            <tr>
                <td>
                    事業所名
                    <span class="label label-gray pull-right">必須</span></td>
                </td>
                <td>
                    <div class="pull-left">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    会員
                    </label>
                    </div>
                    <div class="pull-left pl15">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    非会員
                    </label>
                    </div>
                    <div class="pull-left pl15">
                    <label>
                    <input type="radio" name="radio1" id="radio1_1" value="option1">
                    大陽日酸
                    </label>
                </td>
            </tr>
            <!--Close Row 2 -->
            <!-- Begin Row 3 -->
            <tr>
                <td>事業所郵便番号</td>
                <td>
                    <div class="col-sm-4 force-col-sm-4">
                        <input type="text" class="form-control" id="21" name="21">
                    </div>
                    <div class="col-sm-1 force-col-sm-1" style="padding: 0; width: 10px;"> - </div>
                    <div class="col-sm-4 force-col-sm-4">
                        <input type="text" class="form-control" id="22" name="22">
                    </div>
                </td>
            </tr>
            <!--Close Row 3 -->
            <!-- Begin Row 4 -->
            <tr>
                <td>
                    事業所住所
                    <span class="label label-gray pull-right">必須</span></td>
                </td>
                <td>
                    <input type="text" class="form-control" id="3" name="3">
                </td>
            </tr>
            <!--Close Row 4 -->
            <!-- Begin Row 5 -->
            <tr>
                <td>事業所電話番号</td>
                <td>
                    <input type="text" class="form-control" id="4" name="4">
                </td>
            </tr>
            <!--Close Row 5 -->
            </tbody>
            <!-- Close Table Body -->
        </table>
    </div>

    <div class="panel-footer">
        <div class="form-actions text-right">
            <button class="btn btn-warning btn-lg"><?= "登録" ?></button>
        </div>
    </div>
</div>

<!-- Begin Region Content -->
<div class="region-content radius-table">
    <h3 class="heading-blue">所属するユーザ一覧</h3>
    <!-- Begin List Requests Table Data -->
    <table class="table table-brown table-data table-bordered table-centered">
        <!-- Begin Table Header -->
        <thead>
        <tr>
            <th><?= "依頼番号" ?></th>
            <th><?= "滞在期間" ?></th>
            <th><?= "宿泊先" ?></th>
            <th><?= "設置機器" ?></th>
            <th><?= "詳細" ?></th>
        </tr>
        </thead>
        <!-- Close Table Header -->
        <!-- Begin Table Body -->
        <tbody>
        <!-- Data Row 1 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 2 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 3 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 4 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 5 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 6 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 7 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 8 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 9 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
        </tr>
        <!-- Data Row 10 -->
        <tr>
            <td><?= "13-0000049" ?></td>
            <td><?= "2017/02/22 ～2017/02/25" ?></td>
            <td><?= "テスト旅館神奈川県相模原市中央区 " ?></td>
            <td><?= "酸素濃縮器" ?></td>
            <td>
                <a href="#" class="btn btn-warning"><?= "詳細" ?></a>
            </td>
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
<!-- Close Region Footer -->