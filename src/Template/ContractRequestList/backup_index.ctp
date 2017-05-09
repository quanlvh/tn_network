<?php use Cake\Core\Configure;
$humidifier = Configure::read('humidifier');
$childDeviceType = Configure::read('childDeviceType');
$filling_pressure = Configure::read('filling_pressure');
$bombCapacity = Configure::read('bombCapacity');
$is_machine_type = Configure::read('is_machine_type');
?>
<?php $this->assign('title', '受託一覧'); ?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>

<!--タイトル-->
<div class="top_title">
    <span class="title">受託一覧</span>
</div>

<?php if (!empty($requests)): ?>

    <div id="result_list_area" class="">
        <?php if (count($requests)==0):?>
            <p>
                <span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果がありません。</span>
            </p>
        <?php else: ?>
            <p>
		    <span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;font-size:20px;">
		<?php switch ($list_type){
            case LIST_TYPE_ANSWER_WAITING://未回答 ?>
                未回答の受託処理が
                <?php break;
            case LIST_TYPE_ONGOING://対応中依頼 ?>
                現在、対応中の受託処理が
                <?php break;
            case LIST_TYPE_REQUESTING://依頼中 ?>
                現在、依頼中の旅行対応が
                <?php break;
            case LIST_TYPE_RENTAL_MACHINE://貸出機器依頼一覧 ?>
                現在、貸出機器依頼が
                <?php break;
            case LIST_TYPE_RETAINED://滞留一覧 ?>
                現在、滞留している依頼が
            <?php } ?>
			</span>
                <span style="font-family: 'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ'; font-weight: 700;font-size:20px;"><?=count($requests);?></span>
                <span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;font-size:20px;">件あります。</span>
            </p>

            <?php if($list_type==LIST_TYPE_RENTAL_MACHINE):?>
                <table class="list">
                    <thead>
                    <tr>
                        <th>依頼番号</th>
                        <th>滞在期間</th>
                        <th>患者様名</th>
                        <th>宿泊先</th>
                        <th>到着希望日</th>
                        <th>送付先</th>
                        <th>送付機器</th>
                        <th>対応状況</th>
                        <th>&nbsp&nbsp&nbsp&nbsp</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?= h($request['request_no']) ?></td>
                            <td>
                                <?php if(!is_null($request['stay_from_date'])){?>
                                    <?= h($this->datew($request['stay_from_date'])); ?>
                                <?php }?>
                                &nbsp～&nbsp<br>
                                <?php if(!is_null($request['stay_to_date'])){?>
                                    <?= h($this->datew($request['stay_to_date'])); ?>
                                <?php }?>
                            </td>
                            <td><?= h($request['user_name']) ?></td>
                            <td><?= h($request['lodging_place_name']) ?><br><?= h($request['lodging_place_addr']) ?></td>
                            <td>
                                <?php if(!is_null($request['request_for_setting_date'])){?>
                                    <?= h($this->datew($request['request_for_setting_date'])); ?>
                                <?php }?>
                            </td>
                            <td><?= h($request['contractor_receive_addr']) ?></td>
                            <td>
                                <?php if($request['is_oxygen_enricher']==FIT){//酸素濃縮器貸し出しの場合?>
                                    <?= h($request['contractor_receive_addr'].'/'.
                                        $humidifier[$request['is_humidifier']].'/'.
                                        $request['oxygen_enricher_name'].'/'
                                    ); ?>
                                <?php }?>
                                <?php if($request['is_liquid_oxygen_parent_device']==FIT){//液体酸素親器貸し出しの場合?>
                                    <?= h('ヘリオスH36/'); ?>
                                <?php }?>
                                <?php if($request['is_child_device']==FIT){//液体酸素子器貸し出しの場合?>
                                    <?= h($childDeviceType[$request['child_device_type']].'/'); ?>
                                <?php }?>
                                <?php if($request['is_accessories']==FIT){//液体酸素付属品貸し出しの場合?>
                                    <?= h('付属品/'); ?>
                                <?php }?>
                                <?php if($request['bomb_number']>0){//ボンベ貸し出しの場合?>
                                    <?= h($filling_pressure[$request['filling_pressure']].'/'.
                                        $bombCapacity[$request['bombCapacity']].'/'.
                                        $request['valve_type'].'/'
                                    ); ?>
                                <?php }?>
                                <?php if($request['is_flow_controller']==FIT){//流量調整器貸し出しの場合?>
                                    <?= h($request['flow_controller_name'].'/'); ?>
                                <?php }?>
                                <?php if($request['is_respiration_tuner']==FIT){//呼吸同調器貸し出しの場合?>
                                    <?= h($request['respiration_tuner_name'].'/'); ?>
                                <?php }?>

                            </td>
                            <td><?= h($request['status_name']) ?></td>
                            <td>
                                <form method="post" action="/requestDetail/index/<?=$request['request_no']?>/<?=$list_type?>">
                                    <?= $this->Form->button(__('詳細'),['class'=>'detail_button']) ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>

            <?php else:?>
                <table class="list">
                    <thead>
                    <tr>
                        <th>依頼番号</th>
                        <th>滞在期間</th>
                        <th>宿泊先</th>
                        <th>設置機器</th>
                        <?php if($list_type!=LIST_TYPE_ANSWER_WAITING):?><th>対応状況</th><?php endif; ?>
                        <?php switch ($list_type){
                            case LIST_TYPE_ANSWER_WAITING://未回答 ?>
                                <th>受託会社支払額(税込)</th>
                                <?php break;
                            case LIST_TYPE_ONGOING://対応中依頼 ?>
                                <th>受託会社請求額(税込)</th>
                                <th>受託会社支払額(税込)</th>
                                <?php break;
                            case LIST_TYPE_REQUESTING://依頼中 ?>
                                <th>依頼会社請求額(税込)</th>
                            <?php } ?>
                        <th>&nbsp&nbsp&nbsp&nbsp</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($requests as $request): ?>
                        <tr>
                            <td><?= h($request['request_no']) ?></td>
                            <td><?php if(!is_null($request['stay_from_date'])){?>
                                    <?= h($this->datew($request['stay_from_date'])); ?>
                                <?php }?>
                                &nbsp～&nbsp<br>
                                <?php if(!is_null($request['stay_to_date'])){?>
                                    <?= h($this->datew($request['stay_to_date'])); ?>
                                <?php }?>
                            </td>
                            <td><?= h($request['lodging_place_name']) ?><br><?= h($request['lodging_place_addr']) ?></td>
                            <td><?= h($is_machine_type[$request['machine_type']]) ?></td>
                            <?php if($list_type!=LIST_TYPE_ANSWER_WAITING):?>
                                <td><?= h($request['status_name']) ?></td>
                            <?php endif; ?>
                            <?php switch ($list_type){
                                case LIST_TYPE_ANSWER_WAITING://未回答 ?>
                                    <td><?= h(number_format($request['contractor_payment'])) ?></td>
                                    <?php break;
                                case LIST_TYPE_ONGOING://対応中依頼 ?>
                                    <td><?= h(number_format($request['contractor_charge'])) ?></td>
                                    <td><?= h(number_format($request['contractor_payment'])) ?></td>
                                    <?php break;
                                case LIST_TYPE_REQUESTING://依頼中 ?>
                                    <td><?= h(number_format($request['request_charge'])) ?></td>
                                <?php } ?>
                            <td>
                                <form method="post" action="/requestDetail/index/<?=$request['request_no']?>/<?=$list_type?>">
                                    <?= $this->Form->button(__('詳細'),['class'=>'detail_button']) ?>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endif; ?>


<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"mypage"])?>'>
        <?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
    </form>
</div>



