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
        '3'=>'特定機種なし',
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

<div class="detail_area">
        <table class="detail_table">
            <colgroup>
                <col width='20%'>
                <col width='80%'>
            </colgroup>
            <tr>
                <th colspan="2">
                    旅行を承諾した医師
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
                <td><?=$request['travel_agent_name']?></td>
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
                    <?php if(!empty($confirmMachine['oxygen_enricher_type'])): ?>
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
                                <td colspan="3"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><?=$oxygenEnricherType[$confirmMachine['oxygen_enricher_type']]?></td>
                                <td><?=$humidifier[$confirmMachine['is_humidifier']]?></td>
                                <td colspan="2">機種名:<?= $confirmMachine['oxygen_enricher_name']?></td>
                            </tr>
                        </table>
                    </div> 
                    <?php endif;?>
                    
                    <!--液体酸素-->
                    <?php if(!empty($confirmMachine['liquid_oxygen_parent_device_type'])): ?>
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
                                <td colspan="4"><?=$liquidType[$confirmMachine['liquid_oxygen_parent_device_type']]?></td>
                            </tr>
                            <tr>
                                <td colspan="2">子器のタイプ</td>
                            </tr>
                            <?php if($confirmMachine['is_child_device'] === '0'):?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td colspan="3">理由:<?=$unnecessaryReason[$confirmMachine['unnecessary_reason']]?></td>
                            </tr>
                            <?php elseif($confirmMachine['is_child_device'] === '1'):?>
                            <tr>
                                <td colspan="5">必要</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="4"><?=$childDeviceType[$confirmMachine['child_device_type']]?></td> 
                            </tr>
                            <?php endif;?>
                            
                            <?php if(!empty($confirmMachine['accessories'])):?>
                            <tr>
                                <td colspan="5">付属品</td>
                            </tr>
                            <?php foreach($confirmMachine['accessories'] as $val):?>
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
                    <?php if(!empty($confirmMachine['bomb_number'])): ?>
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
                                <td colspan="4">ボンベタイプ</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="2">充填圧力:<?=$fillingPressure[$confirmMachine['filling_pressure']]?></td>
                                <td>容量:<?=$bombCapacity[$confirmMachine['bomb_capacity']]?></td>
                            </tr>
                            <tr>
                                <td colspan="4">バルブタイプ</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3"><?=$confirmMachine['valve_type']?></td>
                            </tr>
                            <tr>
                                <td colspan="4">ボンベの本数</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="3"><?=$confirmMachine['bomb_number']?></td>
                            </tr>
                            <tr>
                                <td colspan="4">流量調節器</td>
                            </tr>
                            <?php if($confirmMachine['is_flow_controller'] === '1'):?>
                                <tr>
                                    <td colspan="4">必要</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3"><?=!empty($confirmMachine['flow_controller_bringing_name'])?'機器名:'.$confirmMachine['flow_controller_bringing_name']:''?></td>
                                    
                                </tr>
                            <?php else:?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td>理由:<?=$flowController[$confirmMachine['flow_controller_unnecessary_reason']]?></td>
                                <td><?=!empty($confirmMachine['flow_controller_bringing_name'])?'機器名:'.$confirmMachine['flow_controller_bringing_name']:''?></td>
                            </tr>
                            <?php endif;?>
                            
                            <tr>
                                <td colspan="4">呼吸同調器</td>
                            </tr>
                            <?php if($confirmMachine['is_respiration_tuner'] === '1'):?>
                                <tr>
                                    <td colspan="4">必要</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3"><?=!empty($confirmMachine['respiration_tuner_bringing_name'])?'機器名:'.$confirmMachine['respiration_tuner_bringing_name']:''?></td>
                                </tr>
                            <?php else:?>
                            <tr>
                                <td></td>
                                <td>不要</td>
                                <td>理由:<?=$flowController[$confirmMachine['respiration_tuner_unnecessary_reason']]?></td>
                                <td><?=!empty($confirmMachine['respiration_tuner_bringing_name'])?'機器名:'.$confirmMachine['respiration_tuner_bringing_name']:''?></td>
                            </tr>
                            <?php endif;?>
                            
                        </table>
                    </div> 
                    <?php endif;?>
                    
                    <!--人口呼吸器-->
                    <?php if($confirmMachine['is_ventilator']=== '1'):?>
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
                            <td colspan="3">機種名:<?=$confirmMachine['ventilator_name']?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>ジョイント</td>
                            <td colspan="2"><?=$confirmMachine['is_ventilator_joint']==='1'?'あり':'なし'?></td>
                        </tr>
                        </table>
                    </div> 
                    <?php endif;?>
                    
                    
                    <!--共通付属品-->
                    <?php if(!empty($confirmMachine['extention_hose_type']) || !empty($confirmMachine['cannula_type'])):?>
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
                            <?php if(!empty($confirmMachine['extention_hose_type'])):?>
                            <tr>
                                <td></td>
                                <td>延長ホース</td>
                                <td colspan="2"><?=$extentionHoseType[$confirmMachine['extention_hose_type']]?></td>
                            </tr>
                            <?php endif;?>
                            <?php if(!empty($confirmMachine['cannula_type'])):?>
                            <tr>
                                <td></td>
                                <td>カニューラ</td>
                                <td colspan="2"><?=$cannulaType[$confirmMachine['cannula_type']]?></td>
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
