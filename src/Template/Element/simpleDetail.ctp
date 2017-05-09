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
<table style="width: 100%;">
            <colgroup>
                <col width='30%'>
                <col width='70%'>
            </colgroup>
            <tr>
                <td>宿泊先</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>滞在期間</td>
                <td><?=$this->datew($request['stay_from_date'])?>　～　<?=$this->datew($request['stay_to_date'])?></td>
            </tr>
            
            <!--酸素濃縮器-->
            <?php if(!empty($confirmMachine['oxygen_enricher_type'])): ?>
                <tr>
                    <td>酸素濃縮器</td>
                    <td>
                        <?=$oxygenEnricherType[$confirmMachine['oxygen_enricher_type']]?>&nbsp;
                        <?=$humidifier[$confirmMachine['is_humidifier']]?>&nbsp;
                        機種名:<?= $confirmMachine['oxygen_enricher_name']?>
                    </td>
                </tr>
            <?php endif;?>

            <tr>
                <td>氏名</td>
                <td><?=$request['user_name']?></td>
            </tr>
        </table>
