<div class="requests-list-wrapper region">
<!-- Begin Header Region -->
<div class="region-header over-large-gutter">
    <div class="panel panel-gray panel-filter">
        <div class="panel-heading" role="tab">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" class="collapsed" href="#filterFormWrapper" aria-expanded="false" aria-controls="filterFormWrapper">
                    <span class="fa fa-search" aria-hidden="true"></span>
                    <span class="caption"><?= "検索" ?></span>
                    <span class="caret-filter fa fa-chevron-circle-up" aria-hidden="true"></span>
                </a>
            </h4>
        </div>
        <div id="filterFormWrapper" class="panel-collapse collapse" role="tabpanel" aria-labelledby="filterFormWrapper">
            <div class="panel-body">
                <!-- Begin Filter Form -->
                <form action="#" class="filter-form form-grid">
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="requestNumberFilter"><?= "依頼番号:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="requestNumberFilter" name="requestNumberFilter">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="accommodationFilter"><?= "宿泊先:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="accommodationFilter" name="accommodationFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-12">
                            <div class="form-group clearfix">
                                <label class="col-xs-12" style="width: 12%;" for="accommodationAddressFilter2"><?= "宿泊先住所:" ?></label>
                                <div class="col-xs-12 no-padding" style="width: 88%;">
                                    <input type="text" class="form-control" id="accommodationAddressFilter2" name="accommodationAddressFilter2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="accommodationAddressFilter"><?= "患者様名:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="accommodationAddressFilter" name="accommodationAddressFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-3" for="fromDateFilter"><?= "滞在期間:" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="fromDateFilter" name="fromDateFilter">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group clearfix">
                                <label class="col-xs-offset-1 col-xs-2" for="toDateFilter"><?= "～" ?></label>
                                <div class="col-xs-9 no-padding">
                                    <input type="text" class="form-control" id="toDateFilter" name="toDateFilter">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row small-space">
                        <div class="col-xs-12">
                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-white btn-lg"><?= "クリア" ?></button>
                                <button type="button" class="btn btn-brown btn-lg"><?= "この条件で検索" ?></button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Close Filter Form -->
            </div>
        </div>
    </div>
</div>
<!-- Close Header Region -->

<!-- Begin Main Region -->
<div class="region-main">

    <!-- Begin Region Heading -->
    <div class="region-heading">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="region-title">会社一覧<span class="danger-color"><?= "36件" ?></span></h2>
            </div>
            <div class="col-sm-4">
                <nav>
                    <ul class="pager">
                        <li class="disabled"><a href="#"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
                        <li><span><?= "1～20件目" ?></span></li>
                        <li><a href="#"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- Close Region Heading -->

    <!-- Begin Region Content -->
    <div class="region-content radius-table">
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

</div>
<!-- Close Main Region -->
</div>