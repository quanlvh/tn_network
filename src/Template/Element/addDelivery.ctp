<?php if($list_type == LIST_TYPE_ONGOING):?>
<?php if($request['status'] > STATUS_WAITING_INSTALL_MACHINE):?>
<div class="top_title">
    <span class="title">追加配送</span>
</div>
<table  border='1' style="width:100%;">
    <colgroup>
        <col width='25%'>
        <col width='25%'>
        <col width='25%'>
        <col width='25%'>
    </colgroup>
    <tr>
        <th>配送日</th>
        <th>担当者</th>
        <th>内容</th>
        <th>金額</th>
    </tr>
    <?php foreach($addDelivery as $delivery):?>
    <tr>
        <td><?=$this->datew($delivery['installation_date'])?></td>
        <td><?=$delivery['staff_name']?></td>
        <td>
            <?php foreach ($delivery['statement'] as $statement):?>
                <?php if($statement['unit_price_detail_code'] === '31'):?>
                    <span><?=\Cake\Core\Configure::read('addDelivery')[$statement['unit_price_detail_code']]?></span>
                    <span>×<?=$statement['quantity']?>本</span><br>
                <?php elseif ($statement['unit_price_detail_code'] === '33'):?>
                    <span><?=\Cake\Core\Configure::read('addDelivery')[$statement['unit_price_detail_code']]?></span><br>
                <?php elseif ($statement['unit_price_detail_code'] === '41'):?>
                    <span><?=\Cake\Core\Configure::read('addDelivery')[$statement['unit_price_detail_code']]?></span><br>
                <?php elseif ($statement['unit_price_detail_code'] === '42'):?>
                    <span><?=\Cake\Core\Configure::read('addDelivery')[$statement['unit_price_detail_code']]?></span><br>
                <?php endif;?>
            <?php endforeach?>
        </td>
        <td style="text-align: right;"><?='\\'.number_format($delivery['price'])?></td>
    </tr>
    <?php endforeach?>
</table>
<form method="POST" action='/requestDetail/addDelivery'>
    <?=$this->Form->hidden('id')?>
    <?=$this->Form->hidden('list_type')?>
    <table width="100%">
        <colgroup>
            <col width='25%'>
            <col width='25%'>
            <col width='25%'>
            <col width='25%'>
        </colgroup>
        <tr>
            <td colspan="4"><span>担当者</span><?=$this->Form->select('staff_name', $branchUsers, ['default'=>$user['user_name']])?></td>
        </tr>
        <tr>
            <td colspan="4"><span>配送日</span><?=$this->Form->input('installation_date', ['type'=>'text', 'label'=>false, 'id'=>'installation_date', 'default'=>date('Y/m/d')])?></td>
        </tr>
        <tr>
            <td colspan="4">配送内容</td>
        </tr>
        <tr>
            <td>追加配送(ボンベ)</td>
            <td><?=$this->Form->input('bomb_oxygen_price', ['label'=>'酸素代', 'type'=>'text', 'readonly'=>true, 'style'=>'width: 150px;', 'default'=>$priceList[ADD_BOMB_OXYGEN]['unit_price']])?></td>
            <td><?=$this->Form->input('bomb_delivery_price', ['label'=>'配送代', 'type'=>'text', 'readonly'=>true, 'style'=>'width: 150px;', 'default'=>$priceList[ADD_BOMB_DELIVERY]['unit_price']])?></td>
            <td><?=$this->Form->input('bomb_num', ['label'=>'数量', 'type'=>'text', 'id'=>'bomb_num', 'style'=>'width: 150px;', 'default'=>'0'])?></td>
        </tr>
        <tr>
            <td>追加配送(液体酸素)</td>
            <td><?=$this->Form->input('liquid_oxygen_price', ['label'=>'酸素代', 'type'=>'text', 'readonly'=>true, 'style'=>'width: 150px;', 'default'=>$priceList[ADD_LIQUID_OXYGEN]['unit_price']])?></td>
            <td><?=$this->Form->input('liquid_delivery_price', ['label'=>'配送代', 'type'=>'text', 'readonly'=>true, 'style'=>'width: 150px;', 'default'=>$priceList[ADD_LIQUID_DELIVERY]['unit_price']])?></td>
            <td><?=$this->Form->input('liquid_num', ['label'=>'数量', 'type'=>'text', 'id'=>'liquid_num', 'style'=>'width: 150px;', 'default'=>'0'])?></td>
        </tr>
        <tr>
            <td colspan="4">その他配送内容</td>
        </tr>
        <?php foreach($priceList as $list):?>
            <?php if($list['unit_price_type_code'] === '4'):?>
                <tr>
                    <td colspan="2"><?=$list['unit_price_detail_name']?></td>
                    <td colspan="2"><?=$this->Form->input('price_'.$list['unit_price_detail_code'], ['type'=>'text', 'label'=>false, 'value'=>'', 'placeholder'=>'金額を入力して下さい'])?><br></td>
                </tr>
            <?php endif?>
        <?php endforeach?>
    </table>
    <button type="submit" class="next_button">登録</button>
</form>
<?php endif;?>
<?php endif;?>
