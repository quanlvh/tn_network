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
    <div class="detail_area">
        <table class="detail_table">
            <colgroup>
                <col width='20%'>
                <col width='80%'>
            </colgroup>
            <tr>
                <th colspan="2">
                    医療機関確認
                </th>
            </tr>
            <tr>
                <td>病院名</td>
                <td><?=$request['hospital_name']?></td>
            </tr>
            <tr>
                <td>医師名</td>
                <td><?=$request['doctor_name']?></td>
            </tr>

            <tr>
                <th colspan="2">利用者情報</th>
            </tr>
            <tr>
                <td>氏名</td>
                <td><?=$request['user_name']?></td>
            </tr>
            <tr>
                <td>フリガナ</td>
                <td><?=$request['user_kana']?></td>
            </tr>
            <tr>
                <td>住所</td>
                <td><?=$request['user_addr']?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?=$request['user_tel']?></td>
            </tr>
            <?php if(!empty($request['user_mobile'])):?>
            <tr>
                <td>携帯番号</td>
                <td><?=$request['user_mobile']?></td>
            </tr>
            <?php endif;?>


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
                <td>宿泊先担当者</td>
                <td><?=$request['lodging_place_staff_name']?></td>
            </tr>
            <tr>
                <td>旅行会社名</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>旅行会社名</td>
                <td><?=$request['subscriber_name']?></td>
            </tr>
            <tr>
                <td>受入可否</td>
                <td><?=$is_acceptable[$request['is_acceptable']]?></td>
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
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>第一希望</td>
                                <td><?=$oxygenEnricherType[$requestMachine['oxygen_enricher_type1']]?></td>
                                <td><?=$humidifier[$requestMachine['is_humidifier1']]?></td>
                                <!--機種指定なしの場合は機種名の入力フォームを入れる-->
                                <?php if($requestMachine['oxygen_enricher1']  == 1):?>
                                    <!--機種指定-->
                                    <td>機種名:<?= $requestMachine['oxygen_enricher_name1']?></td>
                                <?php else:?>
                                    <!--機種指定なし-->
                                    <td>機種指定なし</td>
                                <?php endif;?>
                            </tr>
                            <?php if(!empty($requestMachine['oxygen_enricher_type2'])): ?>
                            <tr>
                                <td></td>
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
                                    </td>
                                <?php endif;?>
                            </tr>
                            <?php endif;?>
                            <?php if(!empty($requestMachine['oxygen_enricher_type3'])): ?>
                            <tr>
                                <td></td>
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
                                <td colspan="3"></td>
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
                                <td></td>
                                <td>第一希望</td>
                                <td colspan="3"><?=$childDeviceType[$requestMachine['child_device_type1']]?></td>
                            </tr>
                            <?php if(!empty($requestMachine['child_device_type2'])):?>
                            <tr>
                                <td></td>
                                <td>第二希望</td>
                                <td colspan="3"><?=$childDeviceType[$requestMachine['child_device_type2']]?></td>
                            </tr>
                            <?php endif;?>
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
                                <td colspan="4"></td>
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
                                <td></td>
                                <td>第一希望</td>
                                <td colspan="2"><?=$requestMachine['valve_type1']?></td>
                            </tr>
                            <?php if(!empty($requestMachine['valve_type2'])):?>
                                <tr>
                                    <td></td>
                                    <td>第二希望</td>
                                    <td colspan="2"><?=$requestMachine['valve_type2']?></td>
                                </tr>
                            <?php endif;?>
                            <?php if(!empty($requestMachine['valve_type3'])):?>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                    <td>第一希望</td>
                                    <?php if($requestMachine['flow_controller_type1'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['flow_controller_name1']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php if(!empty($requestMachine['flow_controller_type2'])):?>
                                <tr>
                                    <td></td>
                                    <td>第二希望</td>
                                    <?php if($requestMachine['flow_controller_type2'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['flow_controller_name2']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
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
                                    <td></td>
                                    <td>第一希望</td>
                                    <?php if($requestMachine['respiration_tuner_type1'] === '1'):?>
                                    <td colspan="2">機器名:<?=$requestMachine['respiration_tuner_name1']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
                                    </td>
                                    <?php endif;?>
                                </tr>
                                <?php if(!empty($requestMachine['respiration_tuner_type2'])):?>
                                <tr>
                                    <td></td>
                                    <td>第二希望</td>
                                    <?php if($requestMachine['respiration_tuner_type2']):?>
                                    <td colspan="2">機器名:<?=$requestMachine['respiration_tuner_name2']?></td>
                                    <?php else:?>
                                    <td colspan="2">
                                        機種指定なし
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
                                <td colspan="2"></td>
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
                                <td colspan="2"></td>
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

        </table>
    </div>

</div>

<form name="form_button" method="post" action="<?=$this->url->build(['controller'=>'mypage'])?>">
    <div class="button_area">
        <button type="submit" id="return_button">戻る</button>
        <button type="submit" class="next_button" id='mypage_button'>マイページへ</button>
    </div>
</form>
