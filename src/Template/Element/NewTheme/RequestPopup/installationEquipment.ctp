<!-- Modal-box -->
<div id="installation_equipment_<?= $id ?>" class="white-popup mfp-hide popup-wrapper">
    <div class="popup-content">
        <form action="#" id="installationEquipmentForm_<?= $id ?>" class="form-inline">
            <!-- Begin Popup Heading -->
            <h3 class="popup-heading">
                <?= "設置機器選択" ?>
            </h3>
            <!-- Close Popup Heading -->

            <!-- Begin Popup Body -->
            <div class="popup-body tabs-wrapper tab-table">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <button class="btn btn-tab" data-target="#oxygenConcen" aria-controls="oxygenConcen" role="tab" data-toggle="tab"><?= "酸素濃縮器" ?></button>
                    </li>
                    <li role="presentation">
                        <button class="btn btn-tab" data-target="#cylinder" aria-controls="cylinder" role="tab" data-toggle="tab"><?= "ボンベ" ?></button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Begin Tab Oxygen Concentrator -->
                    <div role="tabpanel" class="tab-pane fade in active" id="oxygenConcen">
                        <?php echo $this->element('NewTheme/RequestPopup/Tables/equipmentOxygenConTable', array('id' => $id)); ?>
                    </div>
                    <!-- Close Tab Oxygen Concentrator -->

                    <!-- Begin Tab Cylinder -->
                    <div role="tabpanel" class="tab-pane fade" id="cylinder">
                        <?php echo $this->element('NewTheme/RequestPopup/Tables/equipmentCylinderTable', array('id' => $id)); ?>
                    </div>
                    <!-- Close Tab Cylinder -->
                </div>

            </div>
            <!-- Close Popup Body -->

            <!-- Begin Popup Footer -->
            <div class="popup-footer">
                <!-- Begin Footer Table -->
                <div class="text-center pre-save-confirm">
                    <p class="strong-danger-color"><?= "※機器貸出費用として2,000円が発生します。" ?></p>
                </div>
                <!-- Close Footer Table -->

                <!-- Begin Footer Actions -->
                <div class="form-actions text-center">
                    <button class="btn btn-warning btn-lg"><?= "戻る" ?></button>
                    <button class="btn btn-warning btn-lg"><?= "次へ" ?></button>
                </div>
                <!-- Close Footer Actions -->
            </div>
            <!-- Close Popup Footer -->
        </form>
    </div>
</div>