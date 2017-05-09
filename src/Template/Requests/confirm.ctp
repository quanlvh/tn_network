<?= $this->Html->css('requests.css')?>
<?= $this->Html->script('requests.js', array('inline' => false))?>

<?php $this->assign('title', '旅行対応依頼入力（依頼先検索）'); ?>

<div class="top_title">
    <span class="title">旅行対応依頼入力</span>
</div>
<div class="main_content">
<!--state-->
<table id='state_table'>
    <colgroup>
        <col width='20%'>
        <col width='20%'>
        <col width='20%'>
        <col width='20%'>
        <col width='20%'>
    </colgroup>
    <tr>
        <td><div>依頼先入力</div></td>
        <td><div>利用約款の承諾</div></td>
        <td><div>依頼内容入力</div></td>
        <td style="background-image: url('/img/arrow02.png');"><div>入力内容確認</div></td>
        <td><div>完了</div></td>
    </tr>
</table>

<form name="form_pref" method="post" action="<?=$this->url->build(['controller'=>'requests', 'action'=>'complete'])?>">

    <div class="top_title">
        <span class="title">医療機関確認</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="15%">
                <col width="30%">
                <col width="15%">
                <col width="40%">
            </colgroup>
            <tr>
                <td>病院名</td>
                <td><?=$post['hospital_name']?><?=$this->Form->hidden('hospital_name')?></td>
                <td>医師名</td>
                <td><?=$post['doctor_name']?><?=$this->Form->hidden('doctor_name')?></td>
            </tr>
            <?php if (!empty($post['at_rest'])):?>
            <tr>
            	<td>安静時流量</td>
            	<td><?= $post['at_rest'] ?><?= $this->Form->hidden('at_rest') ?>&nbsp;L/min
            	<?= $post['rest_hour'] ?><?= $this->Form->hidden('rest_hour') ?>&nbsp;時間</td>
            </tr>
            <?php endif;?>
            <?php if (!empty($post['during_exercise'])):?>
            <tr>
            	<td>運動時流量</td>
            	<td><?= $post['during_exercise'] ?><?= $this->Form->hidden('during_exercise') ?>&nbsp;L/min
            	<?= $post['exercise_hour'] ?><?= $this->Form->hidden('exercise_hour') ?>&nbsp;時間</td>
            </tr>
            <?php endif;?>
            <?php if (!empty($post['at_bedtime'])):?>
            <tr>
            	<td>就寝時流量</td>
            	<td><?= $post['at_bedtime'] ?><?= $this->Form->hidden('at_bedtime') ?>&nbsp;L/min
            	<?= $post['bedtime_hour'] ?><?= $this->Form->hidden('bedtime_hour') ?>&nbsp;時間</td>
            </tr>
            <?php endif;?>
            <tr>
            	<td>人口呼吸器</td>
            	<?php if ($post['is_ventilator']==='1'):?>
            	<td>併用する</td>
            	<?php elseif($post['is_ventilator']==='0'):?>
            	<td>併用しない</td>
            	<?php endif;?><?= $this->Form->hidden('is_ventilator') ?>
            	<?php if (!empty($post['ventilator_name'])):?>
            	<td colspan="2"><?= $post['ventilator_name'] ?></td>
            	<?php endif;?>
            	<?= $this->Form->hidden('ventilator_name') ?>
            </tr>
            <tr>
            	<td>ジョイント</td>
            	<?php if($post['is_ventilator_joint']==='1'): ?>
            	<td>あり</td>
            	<?php else:?>
            	<td>なし</td>
            	<?php endif;?><?= $this->Form->hidden('is_ventilator_joint') ?>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">利用者情報</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
            </colgroup>
            <tr>
                <td>氏名</td>
                <td><?=$post['user_name']?><?=$this->Form->hidden('user_name')?></td>
                <td>フリガナ</td>
                <td><?=$post['user_kana']?><?=$this->Form->hidden('user_kana')?></td>
            </tr>
            <tr>
                <td>住所</td>
                <td colspan="3"><?=$post['user_addr']?><?=$this->Form->hidden('user_addr')?></td>
                <?= $this->Form->hidden('zip_code') ?>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?=$post['user_tel']?><?=$this->Form->hidden('user_tel')?></td>
                <td>携帯番号</td>
                <td>
                    <?php if(!empty($post['user_mobile'])):?>
                        <?=$post['user_mobile']?><?=$this->Form->hidden('user_mobile')?>
                    <?php endif;?>
                </td>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">宿泊先情報</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
            </colgroup>
            <tr>
                <td>宿泊先</td>
                <td><?=$post['lodging_place_name']?><?= $this->Form->hidden('lodging_place_name')?></td>
                <td>電話番号</td>
                <td><?=$post['lodging_place_tel']?><?= $this->Form->hidden('lodging_place_tel')?></td>
            </tr>
            <tr>
                <td>住所</td>
                <td colspan="3"><?=$post['lodging_place_addr']?><?= $this->Form->hidden('lodging_place_addr')?></td>
            </tr>
            <tr>
                <td>宿泊先担当者</td>
                <td>
                    <?=$post['lodging_place_staff_name']?><?= $this->Form->hidden('lodging_place_staff_name')?>
                </td>
           </tr>
           <tr>
                <td>旅行会社名</td>
                <td>
                	<?=$post['travel_agent_name'] ?><?=$this->Form->hidden('travel_agent_name') ?>
                </td>
           </tr>
           <tr>
                <td colspan="2">ツアー予約者名・団体予約社名・宿泊先予約者名</td>
                <td colspan="2">
                    <?php if(!empty($post['subscriber_name'])):?>
                        <?=$post['subscriber_name']?><?=$this->Form->hidden('subscriber_name')?>
                    <?php endif;?>
                </td>
            </tr>
            <tr>
                <td>受入可否</td>
                <td><?=$post['is_acceptable']==1?'確認済':'未確認'?><?=$this->Form->hidden('is_acceptable')?></td>
                <td>設置履歴</td>
                <?php if($post['is_past_setting']==='1'):?>
                <td>あり</td>
                <?php else:?>
                <td>なし</td>
                <?php endif;?><?= $this->Form->hidden('is_past_setting') ?>
            </tr>
            <tr>
            	<td></td>
            	<td></td>
            	<td></td>
                <td>
                    <?php if(empty($post['past_setting_year'])):?>
                        無し
                    <?php else:?>
                        <?=$post['past_setting_year'].'年'.$post['past_setting_month'].'月ごろ'?>
                        <?=$this->Form->hidden('past_setting_year')?>
                        <?=$this->Form->hidden('past_setting_month')?>
                    <?php endif;?>
                </td>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">日程情報</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
            </colgroup>
            <tr>
                <td>滞在期間</td>
                <td colspan="3">
                    <?=$post['stay_from_date']?><?= "&nbsp(".h($from_week).")" ?>&nbsp～&nbsp
                    <?=$post['stay_to_date']?><?= "&nbsp;(".h($to_week).")" ?>
                    <?=$this->Form->hidden('stay_from_date')?>
                    <?=$this->Form->hidden('stay_to_date')?>
                </td>
            </tr>
            <tr>
            	<td>設置希望日時</td>
            	<td colspan="3"><?= $post['pre_instalation_date'] ?><?= "&nbsp;(".h($set_date).")" ?>&nbsp;<?= $post['pre_instalation_time'] ?>時頃</td>
            	<?= $this->Form->hidden('pre_instalation_date') ?>
            	<?= $this->Form->hidden('pre_instalation_time') ?>
            </tr>
            <tr>
                <td>事前設置</td>
                <td colspan="3">
                    <?php if($post['is_before_setting']==='1'):?>
                    可
                    <?php elseif($post['is_before_setting']==='2'):?>
                    可(フロント預かり)
                    <?php else:?>
                    不可
                    <?php endif;?>
                    <?=$this->Form->hidden('is_before_setting')?>
                </td>
            </tr>
            <tr>
            	<td>引取希望日時</td>
            	<td colspan="3"><?= $post['pick_up_date'] ?><?= "&nbsp;(".h($pick_up_date).")" ?>&nbsp;<?= $post['pick_up_time'] ?>時頃</td>
            	<?= $this->Form->hidden('pick_up_date') ?>
            	<?= $this->Form->hidden('pick_up_time') ?>
            </tr>
            <tr>
                <td>後日回収</td>
                <td colspan="3">
                    <?php if($post['is_after_collectable']==='1'):?>
                    可
                    <?php elseif($post['is_after_collectable']==='2'):?>
                    可(フロント預かり)
                    <?php else:?>
                    不可
                    <?php endif;?>
                    <?= $this->Form->hidden('is_after_collectable')?>
                </td>
            </tr>
        </table>
    </div>


    <div class="top_title">
        <span class="title">設置機器情報</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="25%">
                <col width="25%">
                <col width="15%">
                <col width="20%">
                <col width="15%">
            </colgroup>
            <tr>
            <?php if(!empty($post['oxygen_enricher_type1'])): ?><!-- 酸素濃縮器の第一希望パート start -->
            <?= $this->Form->hidden('oxygen_enricher_type1') ?>
            <?= $this->Form->hidden('machine_type',['value'=>'1']) ?>
                <td><p class="title">酸素濃縮器</p></td>
              </tr>
              <tr>

            <?php if($post['oxygen_enricher_type1']==='1'):?>
            <td>第一希望</td>
            	<td>3Lタイプ
            <?php elseif($post['oxygen_enricher_type1']==='2'):?>
            <td>第一希望</td>
            	<td>5Lタイプ
            <?php elseif($post['oxygen_enricher_type1']==='3'):?>
            <td>第一希望</td>
            	<td>7Lタイプ
            <?php endif;?>
            <?= $this->Form->hidden('is_humidifier1') ?>
            <?php if($post['is_humidifier1']==='1'):?>
                			　加湿あり</td>
            <?php elseif($post['is_humidifier1']==='0'):?>
                            　加湿なし</td>
            <?php endif;?>
            <?= $this->Form->hidden('oxygen_enricher1') ?>
            <?php if ($post['oxygen_enricher1']==='1'):?>
            	<td>機種指定</td>
            <?php else:?>
            	<td>指定なし</td>
            <?php endif;?>
            <?= $this->Form->hidden('oxygen_enricher_specification1') ?>
            <?= $this->Form->hidden('oxygen_enricher_name1') ?>
            <?php if(!empty($post['oxygen_enricher_name1'])):?>
            	<td><?= $post['oxygen_enricher_name1'] ?>
            <?php else: ?>
            	<td></td>
            <?php endif;?>
			</tr>
<?php endif;?><!-- 酸素濃縮器の第一希望パート end -->

<?php if(!empty($post['oxygen_enricher_type2'])):?><!-- 酸素濃縮器の第二希望パート start -->
            <tr>
            <?= $this->Form->hidden('oxygen_enricher_type1') ?>
            <?php if($post['oxygen_enricher_type2']==='1'):?>
            <td>第二希望</td>
            	<td>3Lタイプ
            <?php elseif($post['oxygen_enricher_type2']==='2'):?>
            <td>第二希望</td>
            	<td>5Lタイプ
            <?php elseif($post['oxygen_enricher_type2']==='3'):?>
            <td>第二希望</td>
            	<td>7Lタイプ
            <?php endif;?>
            <?= $this->Form->hidden('oxygen_enricher_type2') ?>
            <?php if($post['is_humidifier2']==='1'):?>
                			　加湿あり</td>
            <?php elseif($post['is_humidifier2']==='0'):?>
                            　加湿なし</td>
            <?php endif;?>
            <?= $this->Form->hidden('is_humidifier2') ?>
            <?= $this->Form->hidden('oxygen_enricher2') ?>
            <?php if($post['oxygen_enricher2']==='1'):?>
            	<td>機種指定</td>
            <?php else:?>
            	<td>指定なし</td>
            <?php endif;?>

            <?php if(!empty($post['oxygen_enricher_name2'])):?>
            	<td><?= $post['oxygen_enricher_name2'] ?></td>
            	<?= $this->Form->hidden('oxygen_enricher_name2') ?>
            <?php else:?>
            	<td></td>
            <?php endif;?>

            </tr>
<?php endif;?><!-- 酸素濃縮器の第二希望パート end -->

<?php if(!empty($post['oxygen_enricher_type3'])):?><!-- 酸素濃縮器の第三希望パート start -->
            <tr>
            <?= $this->Form->hidden('oxygen_enricher_type1') ?>
            <?php if($post['oxygen_enricher_type3']==='1'):?>
            <td>第三希望</td>
            	<td>3Lタイプ
            <?php elseif($post['oxygen_enricher_type3']==='2'):?>
            <td>第三希望</td>
            	<td>5Lタイプ
            <?php elseif($post['oxygen_enricher_type3']==='3'):?>
            <td>第三希望</td>
            	<td>7Lタイプ
            <?php endif;?>
            <?= $this->Form->hidden('oxygen_enricher_type3') ?>
            <?php if($post['is_humidifier3']==='1'):?>
                			　加湿あり</td>
            <?php elseif($post['is_humidifier3']==='0'):?>
                            　加湿なし</td>
            <?php endif;?>
            <?= $this->Form->hidden('is_humidifier3') ?>
            <?= $this->Form->hidden('oxygen_enricher3') ?>
            <?php if($post['oxygen_enricher3']==='1'):?>
            	<td>機種指定</td>
            <?php else:?>
            	<td>指定なし</td>
            <?php endif;?>
            <?php if(!empty($post['oxygen_enricher_name3'])):?>
            	<td><?= $post['oxygen_enricher_name3'] ?></td>
            	<?= $this->Form->hidden('oxygen_enricher_name3') ?>
            <?php else:?>
            	<td></td>
            <?php endif;?>

            </tr>
<?php endif;?><!-- 酸素濃縮器の第三希望パート end -->

			<!-- 液体酸素パート start -->
            <?php if(!empty($post['liquid_oxygen_parent_device_type'])):?>
            <?= $this->Form->hidden('liquid_oxygen_parent_device_type') ?>
            <?= $this->Form->hidden('machine_type',['value'=>'2']) ?>
            	<td><p class="title">液体酸素</p></td>

            <!-- 親器のタイプ start-->
            </tr>
            <tr>
            	<td>親器のタイプ</td>
            	<?php if($post['liquid_oxygen_parent_device_type']==='1'):?>
            	<td colspan="3"><span>加湿器あり（フローコントロールバブル付）</span></td>
            	<?php elseif($post['liquid_oxygen_parent_device_type']==='2'):?>
            	<td colspan="3"><span>加湿器なし（フローコントロールバブル・コネクタ付）</span></td>
            	<?php elseif($post['liquid_oxygen_parent_device_type']==='3'):?>
            	<td colspan="3"><span>親器からの吸入なし（フローコントロールバブルなし）</span></td>
            	<?php endif;?>
            </tr>
            <tr>
            	<td>子器のタイプ</td>
            <?= $this->Form->hidden('is_child_device') ?>
            <?php if($post['is_child_device']==='0'):?><!-- 子器タイプパート start -->
                 <td>不要</td>
            	<?php if(!empty($post['unnecessary_reason'])):?>
            	<?= $this->Form->hidden('unnecessary_reason') ?>
            	<td>理由：</td>
            	<?php endif;?>

            	<?php if($post['unnecessary_reason']==='1'):?>
            	<td><span>ヘリオスH300持参</span></td>
            	<?php elseif($post['unnecessary_reason']==='2'):?>
            	<td><span>ほたる持参</span></td>
            	<?php elseif($post['unnecessary_reason']==='0'):?>
            	<td><span>子器を使用しない</span></td>
            	<?php endif;?>
            <?php elseif($post['is_child_device']==='1'):?>
            	<td>必要</td>
            	<td>第一希望</td>
            	<?= $this->Form->hidden('child_device_type1') ?>
            	<?php if($post['child_device_type1']==='1'):?>
            	<td><span>ヘリオスH300</span></td>
            	<?php elseif($post['child_device_type1']==='2'):?>
            	<td><span>ほたる</span></td>
            	<?php elseif($post['child_device_type1']==='0'):?>
            	<td><span>特定機種なし</span></td>
            	<?php endif;?>
            </tr>
            <tr>
            	<td></td>
            	<td></td>
            	<td>第二希望</td>
            	<?= $this->Form->hidden('child_device_type2') ?>
            	<?php if($post['child_device_type2']==='1'):?>
            	<td><span>ヘリオスH300</span></td>
            	<?php elseif($post['child_device_type2']==='2'):?>
            	<td><span>ほたる</span></td>
            	<?php elseif($post['child_device_type2']==='0'):?>
            	<td><span>特定機種なし</span></td>
            </tr>
            	<?php endif;?>
            <?php endif;?><!-- 子器タイプパート end -->

            <!-- 附属品パート start -->
            <tr>
            	<td><p class="title">附属品</p></td>
            </tr>
            <tr>
				<td colspan="5">
		<?php if(!empty($post['accessories'][1])):?>
		<?= $this->Form->hidden('accessories[1]',['value'=>'1']) ?>
            <?php if($post['accessories'][1]==='1'):?>
            	<span>ローラーベース</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][2])):?>
        <?= $this->Form->hidden('accessories[2]',['value'=>'2']) ?>
            <?php if ($post['accessories'][2]==='2'):?>
            	<span>ヘリオスH300専用デュアルカニューラ（小児）</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][3])):?>
        <?= $this->Form->hidden('accessories[3]',['value'=>'3']) ?>
            <?php if ($post['accessories'][3]==='3'):?>
            	<span>ヘリオスH300専用デュアルカニューラ（標準）</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][4])):?>
        <?= $this->Form->hidden('accessories[4]',['value'=>'4']) ?>
            <?php if ($post['accessories'][4]==='4'):?>
            	<span>ヘリオスH300専用ソルターラボカニューラ（小児）</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][5])):?>
        <?= $this->Form->hidden('accessories[5]',['value'=>'5']) ?>
            <?php if ($post['accessories'][5]==='5'):?>
            	<span>ヘリオスH300専用ソルターラボカニューラ（標準）</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][6])):?>
        <?= $this->Form->hidden('accessories[6]',['value'=>'6']) ?>
            <?php if ($post['accessories'][6]==='6'):?>
            	<span>ほたる用着脱ユニット</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][7])):?>
        <?= $this->Form->hidden('accessories[7]',['value'=>'7']) ?>
            <?php if ($post['accessories'][7]==='7'):?>
            	<span>ほたる用タッチワンデュオ（調整器＋同調器）</span><br />
            <?php endif;?>
        <?php endif;?>
        <?php if(!empty($post['accessories'][8])):?>
        <?= $this->Form->hidden('accessories[8]',['value'=>'8']) ?>
            <?php if ($post['accessories'][8]==='8'):?>
            	<span>ヘリオス用酸素供給チューブ（親子接続吸入）</span><br />
            <?php endif;?>
        <?php endif;?>
            	</td>
            <?php endif; ?><!-- 液体酸素パート end -->
            </tr>
            <?php if(empty($post['oxygen_enricher1']) and (empty($post['oxygen_enricher2']))):?>
            <?= $this->Form->hidden('machine_type',['value'=>'3']) ?>
            <?php endif;?>
            <tr>
            	<td><p class="title">ボンベ</p></td>
            </tr>
            <tr>
            <?php if($post['entryplan']==='1'): ?>
            	<td>要</td>
            <?php else: ?>
            	<td>不要</td>
            <?php endif; ?>
            <?= $this->Form->hidden('entryplan') ?>
            </tr>
            <tr>
            <?= $this->Form->hidden('filling_pressure1') ?>
            <?php if(!empty($post['filling_pressure1'])):?><!-- ボンベパート start -->
            <tr>
            	<td><p class="title">ボンベのタイプ</p></td>
            </tr>
            <tr>
            <?= $this->Form->hidden('filling_pressure1') ?>
            <?php if($post['filling_pressure1']==='1'):?>
            <td>充填圧力</td>
            	<td>14.7MPa</td>
            <?php elseif($post['filling_pressure1']==='2'):?>
            <td>充填圧力</td>
            	<td>19.6MPa</td>
            <?php endif;?>

            <?php if($post['bomb_capacity1']==='1'):?>
                <td>容量</td>
            	<td>1L</td>
            <?php elseif($post['bomb_capacity1']==='2'):?>
                <td>容量</td>
            	<td>2L</td>
            <?php elseif($post['bomb_capacity1']==='3'):?>
                <td>容量</td>
            	<td>3L</td>
            <?php endif;?>
            </tr>
            <?= $this->Form->hidden('bomb_capacity1') ?>
            <tr>
            	<td><p class="title">バルブのタイプ</p></td>
            </tr>
            <tr>
            <?php if(!empty($post['valve_type1'])):?>
            	<td>第一希望</td>
            <?php endif; ?>
            <?php if($post['valve_type1']==='ヨーク式バルブ(残量表示なし)'):?>
            	<td colspan="3">ヨーク式バルブ(残量表示なし)</td>
            <?php elseif($post['valve_type1']==='ヨーク式バルブ(GY-22)'):?>
            	<td colspan="3">ヨーク式バルブ(GY-22)</td>
            <?php elseif($post['valve_type1']==='ヨーク式バルブ(圧力計付)'):?>
            	<td colspan="3">ヨーク式バルブ(圧力計付)</td>
            <?php elseif($post['valve_type1']==='グッドラン(流量調整器一体型)'):?>
            	<td colspan="3">グッドラン(流量調整器一体型)</td>
            <?php elseif($post['valve_type1']==='NB-3バルブ(タッチワンバルブ)'):?>
            	<td colspan="3">NB-3バルブ(タッチワンバルブ)</td>
            <?php elseif($post['valve_type1']==='指定なし'):?>
            	<td colspan="3">指定なし</td>
            <?php endif;?>
            </tr>
            <?= $this->Form->hidden('valve_type1') ?>
            <tr>
            <?php if(!empty($post['valve_type2'])):?>
            	<td>第二希望</td>
            <?php endif; ?>
            <?php if($post['valve_type2']==='ヨーク式バルブ(残量表示なし)'):?>
            	<td colspan="3">ヨーク式バルブ(残量表示なし)</td>
            <?php elseif($post['valve_type2']==='ヨーク式バルブ(GY-22)'):?>
            	<td colspan="3">ヨーク式バルブ(GY-22)</td>
            <?php elseif($post['valve_type2']==='ヨーク式バルブ(圧力計付)'):?>
            	<td colspan="3">ヨーク式バルブ(圧力計付)</td>
            <?php elseif($post['valve_type2']==='グッドラン(流量調整器一体型)'):?>
            	<td colspan="3">グッドラン(流量調整器一体型)</td>
            <?php elseif($post['valve_type2']==='NB-3バルブ(タッチワンバルブ)'):?>
            	<td colspan="3">NB-3バルブ(タッチワンバルブ)</td>
            <?php elseif($post['valve_type2']==='指定なし'):?>
            	<td colspan="3">指定なし</td>
            <?php endif;?>
            </tr>
            <?= $this->Form->hidden('valve_type2') ?>
            <tr>
            <?php if(!empty($post['valve_type3'])):?>
            	<td>第三希望</td>
            <?php endif;?>
            <?php if($post['valve_type3']==='ヨーク式バルブ(残量表示なし)'):?>
            	<td colspan="3">ヨーク式バルブ(残量表示なし)</td>
            <?php elseif($post['valve_type3']==='ヨーク式バルブ(GY-22)'):?>
            	<td colspan="3">ヨーク式バルブ(GY-22)</td>
            <?php elseif($post['valve_type3']==='ヨーク式バルブ(圧力計付)'):?>
            	<td colspan="3">ヨーク式バルブ(圧力計付)</td>
            <?php elseif($post['valve_type3']==='グッドラン(流量調整器一体型)'):?>
            	<td colspan="3">グッドラン(流量調整器一体型)</td>
            <?php elseif($post['valve_type3']==='NB-3バルブ(タッチワンバルブ)'):?>
            	<td colspan="3">NB-3バルブ(タッチワンバルブ)</td>
            <?php elseif($post['valve_type3']==='指定なし'):?>
            	<td colspan="3">指定なし</td>
            <?php endif;?>
            </tr>
            <?= $this->Form->hidden('valve_type3') ?>

            <tr>
            <?php if(!empty($post['bomb_number'])):?>
            	<td>ボンベの本数</td>
            	<td><?= $post['bomb_number'] ?>&nbsp;本<?= $this->Form->hidden('bomb_number') ?></td>
            <?php endif;?>
            </tr>
            <tr>
            	<td>流量調節器のタイプ</td>
            <?php if(empty($post['is_flow_controller'])):?>
            <?php $post['is_flow_controller'] = NULL; ?>
            <?php endif;?>
            <?php if(empty($post['is_floe_controller'])):?>
            <?php if($post['is_flow_controller']==='1'):?>
            	<td>必要</td>
            <?php else:?>
            	<td>不要</td>
            	<?php if($post['flow_controller_unnecessary_reason']==='1'):?>
            	<td>持参</td>
            	<?php elseif($post['flow_controller_unnecessary_reason']==='2'):?>
            	<td colspan="2">ボンベ一体型・同調器一体型のため</td>
            	<?php else:?>
            	<td>使用しない</td>
            	<?php endif;?>
            	<td><?= $post['flow_controller_bringing_name'] ?></td>
            <?= $this->Form->hidden('is_flow_controller') ?>
            <?= $this->Form->hidden('flow_controller_unnecessary_reason')?>
            <?= $this->Form->hidden('flow_controller_bringing_name')?>

            <?php endif;?>
            </tr>
            <tr>
            <?php if($post['is_flow_controller']==='1'):?>
            	<td>第一希望</td>
            	<?= $this->Form->hidden('flow_controller_type1') ?>
            	<?php if($post['flow_controller_type1']==='1'):?>
            	<td>機種指定</td>
                <?php else:?>
            	<td>機種指定なし</td>
                <?php endif;?>
                <?php if(!empty($post['flow_controller_name1'])):?>
                <td colspan="2"><?= $post['flow_controller_name1'] ?></td>
                <?php endif;?>
                <?= $this->Form->hidden('flow_controller_name1') ?>
				<?= $this->Form->hidden('flow_controller_unnecessary_reason') ?>
			<?php endif;?>

            </tr>
            <tr>
            <?php if($post['is_flow_controller']==='1'):?>
            	<td>第二希望</td>
            <?php if($post['flow_controller_type2']==='1'): ?>
            	<td>機種指定</td>
            <?php else: ?>
            	<td>機種指定なし</td>
            <?php endif; ?>
            <?php if(!empty($post['flow_controller_name2'])):?>
            <td colspan="2"><?= $post['flow_controller_name2'] ?></td>
            <?php endif;?>
            <?php endif;?>
            <?= $this->Form->hidden('is_flow_controller') ?>
            <?= $this->Form->hidden('flow_controller_type2')?>
            <?= $this->Form->hidden('flow_controller_name2') ?>

            </tr>
            <tr>
            	<td>呼吸同調器のタイプ</td>
            <?php if(!empty($post['is_respiration_tuner'])): ?>
            	<?php if($post['is_respiration_tuner']==='1'):?>
                 <td>必要</td>
            	<?php endif;?>
 				<?= $this->Form->hidden('is_respiration_tuner') ?>
            </tr>
            <tr>
            	<td>第一希望</td>
            	<?php if($post['respiration_tuner_type1']==='1'):?>
            	<td>機種指定</td>
            	<?php else:?>
            	<td>機種指定なし</td>
            	<?php endif;?>
            	<?php if(!empty($post['respiration_tuner_name1'])):?>
            	<td colspan="2"><?= $post['respiration_tuner_name1'] ?></td>
            	<?php endif;?>
            	<?= $this->Form->hidden('respiration_tuner_type1') ?>
            	<?= $this->Form->hidden('respiration_tuner_name1') ?>
            </tr>
            <tr>
            	<td>第二希望</td>
            	<?php if($post['respiration_tuner_type2']==='1'):?>
            	<td>機種指定</td>
            	<?php else:?>
            	<td>機種指定なし</td>
            	<?php endif;?>
            	<?php if(!empty($post['respiration_tuner_name2'])):?>
            	<td colspan="2"><?= $post['respiration_tuner_name2'] ?>
            	<?php endif;?>
            	<?= $this->Form->hidden('respiration_tuner_type2') ?>
            	<?= $this->Form->hidden('respiration_tuner_name2') ?>
            <?php else:?>
            	<td>不要</td>
            <?php endif;?>

            <?php endif;?><!-- ボンベ -->
            <?= $this->Form->hidden('is_respiration_tuner') ?>

            <?= $this->Form->hidden('respiration_tuner_unnecessary_reason') ?>
			<?php if($post['respiration_tuner_unnecessary_reason']==='1'):?>
				<td>持参</td>
			<?php elseif($post['respiration_tuner_unnecessary_reason']==='0'):?>
				<td>使用しない</td>
			<?php endif;?>
				<td><?= $post['respiration_tuner_bringing_name'] ?></td>
				<?= $this->Form->hidden('respiration_tuner_bringing_name') ?>
            </tr>
            <?php endif;?><!-- ボンベ -->

            <tr>
            	<td colspan="2"><p class="title">共通付属品</p></td>
            </tr>
            <tr>
            	<td>延長ホース</td>
            <?php if($post['extention_hose_type']==='1'):?>
            	<td>3m</td>
            <?php elseif($post['extention_hose_type']==='2'):?>
            	<td>5m</td>
            <?php elseif($post['extention_hose_type']==='3'):?>
            	<td>10m</td>
            <?php else:?>
            	<td>なし</td>
            <?php endif;?>
            <?= $this->Form->hidden('extention_hose_type') ?>
            </tr>
            <tr>
            	<td>カニューラ</td>
            <?= $this->Form->hidden('cannula_type') ?>
            <?php if($post['cannula_type']==='1'):?>
            	<td>S</td>
            <?php elseif($post['cannula_type']==='2'):?>
            	<td>M</td>
            <?php elseif($post['cannula_type']==='3'):?>
            	<td>L</td>
            <?php else:?>
            	<td>なし</td>
            <?php endif;?>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">その他依頼内容</span>
    </div>
    <div class="sub_content">
        <?php if(!empty($post['request_message'])):?>
        <?=$post['request_message']?><input name="request_message" value="<?=$post['request_message']?>" hidden>
        <?php else:?>
        特に無し
        <?php endif;?>
    </div>

        <div class="top_title">
    	<span class="title">依頼会社担当</span>
    </div>
    <div class="sub_content">
    	<table>
    		<colgroup>
    			<col width="15%">
    			<col width="35%">
    			<col width="15%">
    			<col width="35%">
    		</colgroup>
    		<tr>
    			<td>担当者</td>
    			<td colspan="3">
    			<?php
    			foreach($tanto as $value) {
    				if ($post['person_in_charge'] == $value['user_name']) {
    					echo $value['user_name'];
    					echo $this->Form->hidden('person_in_charge');
    				}
    			}
    			?>
    			</td>
    		</tr>
    	</table>

    </div>

    <div class="top_title">
    <span class="title">添付資料</span>
    </div>
    <div class="sub_content">
    	<table>
    		<colgroup>
    			<col width="15%">
    			<col width="35%">
    			<col width="15%">
    			<col width="35%">
    		</colgroup>
    		<tr>
    			<td>ファイル１:</td>
    			<td><?= $files["attachment_1"]["name"]?></td>
    			<td>ファイル２：</td>
    			<td><?= $files["attachment_2"]["name"] ?></td>
    			<?php
    			foreach($files as $key1 => $val1) {
    				foreach($val1 as $key2 => $val2) {
    					echo "<input type=\"hidden\" name=\"files[".$key1."][".$key2."]\" value=".$val2." />\n";
    				}
    			}
    			?>
    		</tr>
    	</table>
    </div>

    <?= $this->Form->hidden('request_message')?>
    <input type='hidden' name='request_no' value="<?= $post['request_no'] ?>" >
    <div class="top_title">
        <span class="title">依頼予定金額</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
            </colgroup>
            <tr>
                <td>内訳</td>
            </tr>
            <?=$this->Form->hidden('amount') ?>
		    <?php
		    if(!empty($amount)):
			    foreach ($amount['amount_details'] as $detail):
			?>
	            <tr>
	                <td></td>
	                <td colspan="4">
	                	<?=h($detail['unit_price_detail_name']);?>：&yen;<?=number_format($detail['amount']);?>
	                </td>
	            </tr>
	        <?php
	        	endforeach;
	        endif;
	        ?>
            <tr>
                <td>小計（税別）：</td>
                <td colspan="4">　&yen;<?=number_format($amount['request_charge']);?></td>
            </tr>
            <tr>
                <td>合計（税込）：</td>
                <td colspan="4">　&yen;<?=number_format($amount['request_charge']+$amount['request_charge_tax']);?></td>
            </tr>

        </table>
        <span style="color: red;">※追加配送等が発生する場合、金額は変動する可能性がございますのでご了承ください。</span>
    </div>
    <?= $this->Form->hidden('pref_code') ?>
    <?= $this->Form->hidden('area_code') ?>
    <?= $this->Form->hidden('offer_date') ?>
    <?= $this->Form->hidden('bomb_number') ?>
    <?= $this->Form->hidden('branch_code') ?>


    <div class="button_area">
        <button type="submit" class="return_button">戻る</button>
        <button type="submit" class="stop_button">依頼中止</button>
        <button type="submit" class='save_button'>一時保存</button>
        <button type="submit" class="next_button">依頼を確定する</button>
    </div>
</form>
</div>