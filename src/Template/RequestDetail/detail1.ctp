<?php
    //濃縮器容量
    $oxygenEnricherType = [
        '1'=>'3Lタイプ',
        '2'=>'5Lタイプ',
        '3'=>'7Lタイプ',
    ];

    //加湿有り無し
    $humidifier = [
        '0'=>'加湿なし',
        '1'=>'加湿あり',
    ];

    //ボンベ充填圧力
    $fillingPressure = [
        '1'=>'14.7MPa',
        '2'=>'19.6MPa',
    ];

    //ボンベ容量
    $bombCapacity = [
        '1'=>'1L',
        '2'=>'2L',
        '3'=>'3L',
    ];

    //流量調整器
    $flowController = [
        '0'=>'使用しない',
        '1'=>'持参',
        '2'=>'ボンベ一体型・同調器一体型のため'
    ];

    //延長ホース
    $extentionHoseType = [
        '1'=>'3m',
        '2'=>'5m',
        '3'=>'7m',
    ];

    //カニューラ
    $cannulaType = [
        '1'=>'S',
        '2'=>'M',
        '3'=>'L',
    ];

    //液酸親機タイプ
    $liquidType = [
        '1'=>'加湿器あり（フローコントローラーバルブ付）',
        '2'=>'加湿器なし（フローコントローラーバルブ・コネクタ付）',
        '3'=>'親器からの吸入なし（フローコントローラーバルブなし）',
    ];

    //液酸子器不要理由
    $unnecessaryReason = [
        '1'=>'ヘリオスH300持参',
        '2'=>'ほたる持参',
        '3'=>'子器を使用しない',
    ];

    //子機機種
    $childDeviceType = [
        '1'=>'ヘリオスH300',
        '2'=>'ほたる',
        '0'=>'特定機種なし',
    ];

    $accessories = [
        '1'=>'ローラーベース',
        '2'=>'ヘリオス用酸素供給チューブ（親子接続吸入）',
        '3'=>'ヘリオスH300専用デュアルカニューラ（小児）',
        '4'=>'ヘリオスH300専用デュアルカニューラ（標準）',
        '5'=>'ヘリオスH300専用ソルターラボカニューラ（小児）',
        '6'=>'ヘリオスH300専用ソルターラボカニューラ（標準）',
        '7'=>'ほたる用着脱ユニット',
        '8'=>'ほたる用タッチワンデュオ（調整器＋同調器）',
    ];

?>

<?= $this->Html->css('requestdetail.css'); ?>
<?= $this->Html->script('requestdetail.js', array('inline' => false)); ?>

<?php $this->assign('title', '旅行対応依頼内容'); ?>

<div class="top_title">
    <span class="title">旅行対応依頼内容</span>
</div>
<div class="main_content">
    <span>以下の旅行対応のお申込みがあります。</span><br>
    <span>内容をご確認の上、対応可否をご回答ください。</span>

    <div class="detail_area">
        <form name="form_answer" method="post" action="<?=$this->url->build(['controller'=>'request_detail', 'action'=>'confirm'])?>">
        <table class="detail_table">
            <colgroup>
                <col width='20%'>
                <col width='80%'>
            </colgroup>
            <tr>
                <th colspan="2">
                    宿泊先（機器設置先）情報
                </th>
            </tr>
            <tr>
                <td>宿泊先</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?=$request['lodging_place_tel']?></td>
            </tr>
            <tr>
                <td>旅行会社名</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>受入可否</td>
                <td>
                    <?=$is_acceptable[$request['is_acceptable']]?>
                </td>
            </tr>
            <tr>
                <td>設置履歴</td>
                <td></td>
            </tr>


            <tr>
                <th colspan="2">
                    日程情報
                </th>
            </tr>
            <tr>
                <td>滞在期間</td>
                <td><?=$this->datew($request['stay_from_date'])?>　～　<?=$this->datew($request['stay_to_date'])?></td>
            </tr>
            <tr>
                <td>事前設置</td>
                <td><?=$is_before_setting[$request['is_before_setting']]?></td>
            </tr>
            <tr>
                <td>後日回収</td>
                <td><?=$is_before_setting[$request['is_after_collectable']]?></td>
            </tr>


            <tr>
                <th colspan="2">
                    設置機器情報
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <!--酸素濃縮器-->
                    <?php if(!empty($requestMachine['oxygen_enricher_type1'])): ?>
                    <div class="detail_area">
                        <table style="width: 100%;">
                            <colgroup>
                                <col width="5">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="50%">
                            </colgroup>
                            <tr>
                                <th colspan="2">酸素濃縮器</th>
                                <td colspan="3">
                                    <?= $this->Form->checkbox('borrow_oxygen',['label'=>false]) ?><span>貸出を依頼する</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_oxygen')==='1'):?>
                                <input type="radio" name="selected_oxygen" value="1" checked />
                                <?php else:?>
                                <input type="radio" name="selected_oxygen" value="1" />
                                <?php endif;?>
                                </td>
                                <td>第一希望</td>
                                <td><?=$oxygenEnricherType[$requestMachine['oxygen_enricher_type1']]?></td>
                                <td><?=$humidifier[$requestMachine['is_humidifier1']]?></td>
                                <!--機種指定なしの場合は機種名の入力フォームを入れる-->
                                <?php if($requestMachine['oxygen_enricher1']  == 1):?>
                                    <!--機種指定-->
                                    <td>機種名:<?= $requestMachine['oxygen_enricher_name1']?></td>
                                <?php else:?>
                                    <!--機種指定なし-->
                                    <td>機種指定なし<?=$this->Form->input('exygen_enricher_name1', ['type'=>'text', 'label'=>false, 'placeholder'=>'対応する機種名を入力して下さい','style'=>'width:71%;'])?></td>
                                <?php endif;?>
                            </tr>
                            <?php if(!empty($requestMachine['oxygen_enricher_type2'])): ?>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_oxygen')==='2'):?>
                                <input type="radio" name="selected_oxygen" value="2" checked />
                                <?php else:?>
                                <input type="radio" name="selected_oxygen" value="2" />
                                <?php endif;?>
                                </td>
                                <td>第二希望</td>
                                <td><?=$oxygenEnricherType[$requestMachine['oxygen_enricher_type2']]?></td>
                                <td><?=$humidifier[$requestMachine['is_humidifier2']]?></td>
                                <!--機種指定なしの場合は機種名の入力フォームを入れる-->
                                <?php if($requestMachine['oxygen_enricher2']  == 1):?>
                                    <!--機種指定-->
                                    <td>機種名:<?= $requestMachine['oxygen_enricher_name2']?></td>
                                <?php else:?>
                                    <!--機種指定なし-->
                                    <td>
                                        機種指定なし
                                        <?=$this->Form->input('exygen_enricher_name2', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;'])?>
                                    </td>
                                <?php endif;?>
                            </tr>
                            <?php endif;?>
                            <?php if(!empty($requestMachine['oxygen_enricher_type3'])): ?>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_oxygen')==='3'):?>
                                <input type="radio" name="selected_oxygen" value="3" checked />
                                <?php else:?>
                                <input type="radio" name="selected_oxygen" value="3" />
                                <?php endif;?>
                                </td>
                                <td>第三希望</td>
                                <td><?=$oxygenEnricherType[$requestMachine['oxygen_enricher_type3']]?></td>
                                <td><?=$humidifier[$requestMachine['is_humidifier3']]?></td>
                                <!--機種指定なしの場合は機種名の入力フォームを入れる-->
                                <?php if($requestMachine['oxygen_enricher3']  == 1):?>
                                    <!--機種指定-->
                                    <td>機種名:<?= $requestMachine['oxygen_enricher_name3']?></td>
                                <?php else:?>
                                    <!--機種指定なし-->
                                    <td>
                                        機種指定なし
                                        <?=$this->Form->input('exygen_enricher_name3', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;','hiddenField'=>false])?>
                                    </td>
                                <?php endif;?>
                            </tr>
                            <?php endif;?>
                        </table>
                    </div>
                    <?php endif;?>

                    <!--液体酸素-->
                    <?php if(!empty($requestMachine['liquid_oxygen_parent_device_type'])): ?>
                    <div class="detail_area">
                        <table style="width: 100%;">
                            <colgroup>
                                <col width="5">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="50%">
                            </colgroup>
                            <tr>
                                <th colspan="2">液体酸素</th>
                                <td colspan="3">
                                    <input type="hidden" name="borrow_liquid" value="0">
                                    <?= $this->Form->checkbox('borrow_liquid',['label'=>false,'value'=>'1']) ?>
                                    <span>貸出を依頼する</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">親器のタイプ</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="4"><?=$liquidType[$requestMachine['liquid_oxygen_parent_device_type']]?></td>
                            </tr>
                            <tr>
                                <td colspan="2">子器のタイプ</td>
                            </tr>
                            <?php if($requestMachine['is_child_device'] === '0'):?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td colspan="3">理由:<?=$unnecessaryReason[$requestMachine['unnecessary_reason']]?></td>
                            </tr>
                            <?php elseif($requestMachine['is_child_device'] === '1'):?>
                            <tr>
                                <td colspan="5">必要</td>
                            </tr>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_liquid')==='1'):?>
                                <input type="radio" name="selected_liquid" value="1" checked />
                                <?php else:?>
                                <input type="radio" name="selected_liquid" value="1" />
                                <?php endif;?>
                                </td>
                                <td>第一希望</td>
                                <td colspan="3"><?=$childDeviceType[$requestMachine['child_device_type1']]?></td>
                            </tr>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_liquid')==='2'):?>
                                <input type="radio" name="selected_liquid" value="2" checked />
                                <?php else:?>
                                <input type="radio" name="selected_liquid" value="2" />
                                <?php endif;?>
                                </td>
                                <td>第二希望</td>
                                <td colspan="3"><?=$childDeviceType[$requestMachine['child_device_type2']]?></td>
                            </tr>
                            <?php endif;?>

                            <?php if(!empty($requestMachine['accessories'])):?>
                            <tr>
                                <td colspan="5">付属品</td>
                            </tr>
                            <?php foreach($requestMachine['accessories'] as $val):?>
                            <tr>
                                <td></td>
                                <td colspan="4"><?=$accessories[$val]?></td>
                            </tr>
                            <?php endforeach;?>
                            <?php endif;?>
                        </table>
                    </div>
                    <?php endif;?>

                    <!--ボンベ-->
                    <?php if(!empty($requestMachine['bomb_number'])): ?>
                    <div class="detail_area">
                        <table style="width: 100%;">
                            <colgroup>
                                <col width="5">
                                <col width="15%">
                                <col width="25%">
                                <col width="55%">
                            </colgroup>
                            <tr>
                                <th colspan="2">ボンベ</th>
                                <td colspan="4">
                                    <input type="hidden" name="borrow_bomb" value="0">
                                    <input type="checkbox" name="borrow_bomb" value="1"><span>貸出を依頼する</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">ボンベタイプ</td>
                                <td>充填圧力:<?=$fillingPressure[$requestMachine['filling_pressure1']]?></td>
                                <td>容量:<?=$bombCapacity[$requestMachine['bomb_capacity1']]?></td>
                            </tr>
                            <tr>
                                <td colspan="4">バルブタイプ</td>
                            </tr>
                            <tr>
                                <td>
                                <?php if ($this->request->getData('selected_valve')==='1'):?>
                                <input type="radio" name="selected_valve" value="1" checked />
                                <?php else:?>
                                <input type="radio" name="selected_valve" value="1" />
                                <?php endif;?>
                                </td>
                                <td>第一希望</td>
                                <td colspan="2"><?=$requestMachine['valve_type1']?></td>
                            </tr>
                            <?php if(!empty($requestMachine['valve_type2'])):?>
                                <tr>
                                    <td>
                                    <?php if ($this->request->getData('selected_valve')==='2'):?>
                                    <input type="radio" name="selected_valve" value="2" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_valve" value="2" />
                                    <?php endif;?>
                                    </td>
                                    <td>第二希望</td>
                                    <td colspan="2"><?=$requestMachine['valve_type2']?></td>
                                </tr>
                            <?php endif;?>
                            <?php if(!empty($requestMachine['valve_type3'])):?>
                                <tr>
                                    <td>
                                    <?php if ($this->request->getData('selected_valve')==='3'):?>
                                    <input type="radio" name="selected_valve" value="3" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_valve" value="3" />
                                    <?php endif;?>
                                    </td>
                                    <td>第三希望</td>
                                    <td colspan="2"><?=$requestMachine['valve_type3']?></td>
                                </tr>
                            <?php endif;?>
                            <tr>
                                <td colspan="4">ボンベの本数</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3"><?=$requestMachine['bomb_number']?></td>
                            </tr>
                            <tr>
                                <td colspan="4">流量調節器</td>
                            </tr>
                            <?php if($requestMachine['is_flow_controller'] === '1'):?>
                                <tr>
                                    <td colspan="4">必要</td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if($this->request->getData('selected_flow_controller')==='1'):?>
                                    <input type="radio" name="selected_flow_controller" value="1" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_flow_controller" value="1" />
                                    <?php endif;?>
                                    </td>
                                    <td>第一希望</td>
                                    <?php if($requestMachine['flow_controller_type1'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['flow_controller_name1']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                        <?=$this->Form->input('flow_controller_name1', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;'])?>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php if(!empty($requestMachine['flow_controller_type2'])):?>
                                <tr>
                                    <td>
                                    <?php if ($this->request->getData('selected_flow_controller')==='2'):?>
                                    <input type="radio" name="selected_flow_controller" value="2" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_flow_controller" value="2">
                                    <?php endif;?>
                                    </td>
                                    <td>第二希望</td>
                                    <?php if($requestMachine['flow_controller_type2'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['flow_controller_name2']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                        <?=$this->Form->input('flow_controller_name2', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;'])?>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php endif;?>
                            <?php else:?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td>理由:<?=$flowController[$requestMachine['flow_controller_unnecessary_reason']]?></td>
                                <td><?=$requestMachine['flow_controller_bringing_name']?></td>
                            </tr>
                            <?php endif;?>

                            <tr>
                                <td colspan="4">呼吸同調器</td>
                            </tr>
                            <?php if($requestMachine['is_respiration_tuner'] === '1'):?>
                                <tr>
                                    <td colspan="4">必要</td>
                                </tr>
                                <tr>
                                    <td>
                                    <?php if ($this->request->getData('selected_respiration_tuner')==='1'):?>
                                    <input type="radio" name="selected_respiration_tuner" value="1" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_respiration_tuner" value="1" />
                                    <?php endif;?>
                                    </td>
                                    <td>第一希望</td>
                                    <?php if($requestMachine['respiration_tuner_type1'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['respiration_tuner_name1']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                        <?=$this->Form->input('respiration_tuner_name', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;'])?>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php if(!empty($requestMachine['respiration_tuner_type2'])):?>
                                <tr>
                                    <td>
                                    <?php if ($this->request->getData('selected_respiration_tuner')==='2'):?>
                                    <input type="radio" name="selected_respiration_tuner" value="2" checked />
                                    <?php else:?>
                                    <input type="radio" name="selected_respiration_tuner" value="2" />
                                    <?php endif;?>
                                    </td>
                                    <td>第二希望</td>
                                    <?php if($requestMachine['respiration_tuner_type2']):?>
                                    <td colspan="2">機器名:<?=$requestMachine['respiration_tuner_name2']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                        <?=$this->Form->input('respiration_tuner_name', ['type'=>'text', 'label'=>false, 'placeholder'=>'使用する機種名を入力して下さい', 'style'=>'width:70%;'])?>
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php endif;?>
                            <?php else:?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td>理由:<?=$flowController[$requestMachine['respiration_tuner_unnecessary_reason']]?></td>
                                <td><?=$requestMachine['respiration_tuner_bringing_name']?></td>
                            </tr>
                            <?php endif;?>

                        </table>
                    </div>
                    <?php endif;?>

                    <!--人口呼吸器-->
                    <?php if($requestMachine['is_ventilator']=== '1'):?>
                    <div class="detail_area">
                        <table style="width: 100%;">
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="25%">
                                <col width="55%">
                            </colgroup>
                        <tr>
                            <tr>
                                <th colspan="2">人工呼吸器</th>
                                <td colspan="2">
                                    <input type="hidden" name="borrow_ventilator" value="0">
                                </td>
                                <td></td>
                            </tr>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="3">機種名:<?=$requestMachine['ventilator_name']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>ジョイント</td>
                            <td colspan="2"><?=$requestMachine['is_ventilator_joint']==='1'?'あり':'なし'?></td>
                        </tr>
                        </table>
                    </div>
                    <?php endif;?>


                    <!--共通付属品-->
                    <?php if(!empty($requestMachine['extention_hose_type']) || !empty($requestMachine['cannula_type'])):?>
                    <div class="detail_area">
                        <table style="width: 100%;">
                            <colgroup>
                                <col width="5">
                                <col width="15%">
                                <col width="25%">
                                <col width="55%">
                            </colgroup>
                            <tr>
                                <th colspan="2">共通付属品</th>
                                <td colspan="2">
                                    <input type="hidden" name="borrow_accessories" value="0">
                                </td>
                            </tr>
                            <?php if(!empty($requestMachine['extention_hose_type'])):?>
                            <tr>
                                <td></td>
                                <td>延長ホース</td>
                                <td colspan="2"><?=$extentionHoseType[$requestMachine['extention_hose_type']]?></td>
                            </tr>
                            <?php endif;?>
                            <?php if(!empty($requestMachine['cannula_type'])):?>
                            <tr>
                                <td></td>
                                <td>カニューラ</td>
                                <td colspan="2"><?=$cannulaType[$requestMachine['cannula_type']]?></td>
                            </tr>
                            <?php endif;?>
                        </table>
                    </div>
                    <?php endif;?>

                </td>
            </tr>



            <tr>
                <th colspan="2">
                    その他依頼内容
                </th>
            </tr>
            <tr>
                <td>
                    <?php if(!empty($request['request_message'])): ?>
                        <?=$request['request_message']?>
                    <?php else:?>
                        なし
                    <?php endif;?>
                </td>
            </tr>

            <tr>
                <th colspan="2">
                    担当者名
                </th>
            </tr>
            <tr>
                <td>担当者名</td>
                <td>
                    <?=$this->Form->select('contractor_branch_staff_name', $branchUsers, ['default'=>$user['user_name']])?>
                </td>
            </tr>
        </table>
            <?=$this->Form->hidden('id')?>
            <?=$this->Form->hidden('list_type')?>
            <div class="button_area">
                <button type="submit" id="impossible_button">対応不可☹</button>
                <button type="submit" class="next_button" id='possible_button'>対応可能☺</button>
            </div>
        </form>
    </div>
</div>

<form name="form_button" method="post" action="<?=$this->url->build(['controller'=>'mypage'])?>">
    <div class="button_area">
        <button type="submit" id="return_button2">戻る</button>
        <button type="submit" class="next_button" id='mypage_button'>マイページへ</button>
    </div>
</form>
