<!-- Begin Region Heading -->
<div class="region-heading">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="region-title">依頼内容の確認<span class="danger-color"><?= "36件" ?></span></h2>
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
            <th><?= "詳細・回答" ?></th>
        </tr>
        </thead>
        <!-- Close Table Header -->
        <!-- Begin Table Body -->
        <tbody>
        <!-- Data Row 1 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_1" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 1)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 1)); ?>
            </td>
        </tr>
        <!-- Data Row 2 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_2" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 2)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 2)); ?>
            </td>
        </tr>
        <!-- Data Row 3 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_3" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 3)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 3)); ?>
            </td>
        </tr>
        <!-- Data Row 4 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_4" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 4)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 4)); ?>
            </td>
        </tr>
        <!-- Data Row 5 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_5" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 5)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 5)); ?>
            </td>
        </tr>
        <!-- Data Row 6 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_6" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 6)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 6)); ?>
            </td>
        </tr>
        <!-- Data Row 7 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_7" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 7)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 7)); ?>
            </td>
        </tr>
        <!-- Data Row 8 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_8" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 8)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 8)); ?>
            </td>
        </tr>
        <!-- Data Row 9 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_9" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 9)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 9)); ?>
            </td>
        </tr>
        <!-- Data Row 10 -->
        <tr>
            <td width="18%"><?= "13-0000049" ?></td>
            <td width="20%"><?= "2017/02/22 ～2017/02/25" ?></td>
            <td width="25%"><?= "テスト旅館神奈川県相模原市中央区" ?></td>
            <td>
                <?= "酸素濃縮器" ?>
            </td>
            <td>
                <a href="#request_detail_10" class="btn btn-warning open-popup-link"><?= "詳細・回答" ?></a>
                <!-- Render Request Detail Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/requestDetail', array('id' => 10)); ?>
                <!-- Render Installation Equipment Popup -->
                <?php echo $this->element('NewTheme/RequestPopup/installationEquipment', array('id' => 10)); ?>
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