<?= $this->Html->css('requests.css')?>
<?= $this->Html->script('requests.js', array('inline' => false))?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
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
        <td style="background-image: url('/img/arrow02.png');"><div>依頼内容入力</div></td>
        <td><div>入力内容確認</div></td>
        <td><div>完了</div></td>
    </tr>
</table>

<form name="form_pref" method="post" enctype="multipart/form-data" action="<?=$this->url->build(['controller'=>'requests', 'action'=>'confirm'])?>">
    <p>必須事項を入力してください。</p>

    <div class="top_title">
        <span class="title">医療機関確認</span>
    </div>
    <div class="sub_content">
        <table border="0">
            <colgroup>
                <col width="17%">
                <col width="40%">
                <col width="10%">
                <col width="33%">
            </colgroup>
            <tr>
                <td>病院名</td>
                <td class="input_td">
                    <?=$this->Form->input('hospital_name', ['type'=>'text', 'label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
                <td>医師名</td>
                <td class="input_td">
                    <?=$this->Form->input('doctor_name', ['type'=>'text', 'label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
            </tr>
            <tr>
            	<td>安静時流量</td>
            	<td class="input_td">
            	<?= $this->Form->input('at_rest',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false,'class'=>'w50','step'=>'0.01','style'=>'ime-mode:disabled;']) ?>&nbsp;L/min&nbsp;
            	<?= $this->Form->input('rest_hour',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false, 'class'=>'w50','step'=>'0.1','style'=>'ime-mode:disabled;']) ?>&nbsp;時間
            	</td>
            </tr>
            <tr>
            	<td>運動時流量</td>
            	<td class="input_td">
            	<?= $this->Form->input('during_exercise',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false,'class'=>'w50','step'=>'0.01','style'=>'ime-mode:disabled;']) ?>&nbsp;L/min&nbsp;
            	<?= $this->Form->input('exercise_hour',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false,'class'=>'w50','step'=>'0.1','style'=>'ime-mode:disabled;']) ?>&nbsp;時間
            	</td>
            </tr>
            <tr>
            	<td>就寝時流量</td>
            	<td class="input_td">
            	<?= $this->Form->input('at_bedtime',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false,'class'=>'w50','step'=>'0.01','style'=>'ime-mode:disabled;']) ?>&nbsp;L/min&nbsp;
            	<?= $this->Form->input('bedtime_hour',['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false,'class'=>'w50','step'=>'0.1','style'=>'ime-mode:disabled;']) ?>&nbsp;時間
            	</td>
            </tr>
            <tr>
            	<td>人工呼吸器</td>
            	<td><span style="color:red;" colspan="2">*必須</span><?= $this->Form->radio('is_ventilator',[['text'=>'併用しない','value'=>'0'],['text'=>'併用する','value'=>'1']]) ?></td>
            </tr>
            <tr>
            	<td>人工呼吸器機種名</td>
            	<td><?= $this->Form->input('ventilator_name',['id'=>'ventilator_name','class'=>'w200','label'=>false,'placeholder'=>'機種名']) ?></td>
            	<td colspan="2">ジョイント<?= $this->Form->radio('is_ventilator_joint',[['text'=>'あり','value'=>'1'],['text'=>'なし','value'=>'0']]) ?></td>
            </tr>
            <tr>
            	<td colspan="2">接続チューブ・コネクタは持参願います。</td>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">利用者情報</span>
    </div>
    <div class="sub_content">
        <table>
            <colgroup>
                <col width="20%">
                <col width="35%">
                <col width="15%">
                <col width="30%">
            </colgroup>
            <tr>
                <td>氏名</td>
                <td class="input_td">
                    <?=$this->Form->input('user_name', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
                <td>フリガナ</td>
                <td class="input_td">
                    <?=$this->Form->input('user_kana', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
            </tr>
            <tr>
            	<td>郵便番号</td>
            	<td class="input_td"><?= $this->Form->input('zip_code',['type'=>'number','label'=>false,'class'=>'w220','maxlength'=>'8','onKeyUp'=>"AjaxZip3.zip2addr(this,'','user_addr','user_addr');",'placeholder'=>'ハイフンなしで入力してください']) ?></td>
            </tr>
            <tr>
                <td>住所&nbsp;(市区町村まで)</td>
                <td colspan="3" class="input_td">
                    <?=$this->Form->input('user_addr', ['type'=>'text','label'=>false, 'class'=>'w550', 'required'=>true])?>
                </td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td class="input_td">
                    <?=$this->Form->input('user_tel', ['templates'=>['inputContainer'=>'{{content}}'],'type'=>'tel','label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
                <td>携帯番号</td>
                <td class="input_td">
                    <?=$this->Form->input('user_mobile', ['type'=>'tel','label'=>false, 'class'=>'w200', 'required'=>false])?>
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
                <col width="25%">
                <col width="30%">
                <col width="15%">
                <col width="30%">
            </colgroup>
            <tr>
                <td>宿泊先</td>
                <td class="input_td">
                    <?=$this->Form->input('lodging_place_name', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>true])?>
                </td>
                <td>電話番号</td>
                <td class="input_td">
                    <?=$this->Form->input('lodging_place_tel', ['templates'=>['inputContainer'=>'{{content}}'],'type'=>'tel','label'=>false, 'class'=>'w110', 'required'=>true])?>
                </td>
            </tr>
            <tr>
                <td>住所</td>
                <td colspan="3" class="input_td">
                <?php if (empty($lodging_place_addr)):?>
                    <?=$this->Form->input('lodging_place_addr', ['type'=>'text','label'=>false, 'class'=>'w500', 'required'=>true])?>
                    <?php else:?>
                    <?= $this->Form->input('lodging_place_addr',['type'=>'text','label'=>false, 'class'=>'w500', 'required'=>true, 'value'=>$lodging_place_addr]) ?>
                    <?php endif;?>
                </td>
            </tr>
            <tr>
                <td>宿泊先担当者</td>
                <td class="input_td">
                    <?=$this->Form->input('lodging_place_staff_name', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>true, 'placeholder'=>'フロント等'])?>
                </td>
                <td>エレベーター</td>
                <td>
                <?= $this->Form->radio('elevator',[['value'=>'1','text'=>'あり'],['value'=>'0','text'=>'なし']]) ?>
                </td>
            </tr>
            <tr>
                <td>旅行会社名</td>
                <td class="input_td">
                    <?=$this->Form->input('travel_agent_name', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>false])?>
                </td>
            </tr>
            <tr>
                <td colspan="2">ツアー予約者名・団体予約者名・宿泊先予約者名</td>
                <td colspan="2">
                    <?=$this->Form->input('subscriber_name', ['type'=>'text','label'=>false, 'class'=>'w200', 'required'=>false])?>
                </td>
            </tr>
            <tr>
                <td>受入可否</td>
                <td class="input_td">
                    <?=$this->Form->radio('is_acceptable', [['value'=>'1', 'text'=>'確認済'], ['value'=>'0', 'text'=>'未確認']], ['required'=>true])?>
                </td>
            </tr>
            <tr>
                <td>設置履歴</td>
                <td colspan="3">
                    <?=$this->Form->radio('is_past_setting', [['value'=>'1', 'text'=>'あり'],['value'=>'0', 'text'=>'なし'], ['value'=>'2', 'text'=>'不明'],])?>&nbsp;
                    <?=$this->Form->input('past_setting_year', ['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false, 'class'=>'w100', 'required'=>false])?>年
                    <?=$this->Form->input('past_setting_month', ['templates'=>['inputContainer'=>'{{content}}'],'type'=>'number','label'=>false, 'class'=>'w50', 'required'=>false])?>月頃<br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="3">
                    <span>宿泊先への受入可否を確認の上、お申し込みを行ってください</span>
                </td>
            </tr>
        </table>
    </div>

<!-- datepicker -->
<style>
.date-holiday .ui-state-default {
      background-image:none;
      background-color:#FF9999;
}
.date-saturday, .ui-datepicker-week-end .ui-state-default {
      background-image:none;
      //background-color:#66CCFF;
      background-color:#FF9999;
}
body {
      margin:0;
      padding:0;
      font-family:Arial,sans-serif;
      font-size:1.1em;
}
</style>
<!-- datepicker -->

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
                <td colspan="5" class="input_td">
                    <?=$this->Form->input('stay_from_date', ['type'=>'text','label'=>false, 'class'=>'w200 datepicker','required'=>true])?>&nbsp;～&nbsp;
                    <?=$this->Form->input('stay_to_date', ['type'=>'text','label'=>false, 'class'=>'w200 datepicker', 'required'=>true])?>
                </td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td colspan="5"><span style="color:red;">※</span>１件の依頼につき３０日まで</td>
            </tr>
            <tr>
            	<td>設置希望日時</td>
            	<td colspan="5" class="input_td">
            	<?= $this->Form->input('pre_instalation_date',['type'=>'text','label'=>false, 'class'=>'w100 datepicker']) ?>&nbsp;
            	<?= $this->Form->input('pre_instalation_time',['type'=>'text','label'=>false, 'class'=>'w50']) ?>時頃
            	</td>
            </tr>
            <tr>
                <td>
                    事前設置
                </td>
                <td colspan="2">
                    <?=$this->Form->radio('is_before_setting', [['value'=>'1', 'text'=>'可'], ['value'=>'2', 'text'=>'可(フロント預かり)'],['value'=>'0', 'text'=>'不可']], ['required'=>true])?>
                </td>
            </tr>
            <tr>
            	<td>引取希望日時</td>
            	<td colspan="5" class="input_td">
            	<?= $this->Form->input('pick_up_date',['type'=>'text','label'=>false,'class'=>'w100 datepicker']) ?>&nbsp;
            	<?= $this->Form->input('pick_up_time',['type'=>'text','label'=>false,'class'=>'w50']) ?>時頃
            	</td>
            </tr>
            <tr>
                <td>
                    後日回収
                </td>
                <td colspan="2">
                    <?=$this->Form->radio('is_after_collectable', [['value'=>'1', 'text'=>'可'], ['value'=>'2', 'text'=>'可(フロント預かり)'],['value'=>'0', 'text'=>'不可']], ['required'=>true])?>
                </td>
            </tr>
        </table>
    </div>

    <div class="top_title">
        <span class="title">設置機器情報</span>
    </div>
    <div class="sub_content">
        <div class="machine_area" id="tab_area_01">
            <ul>
                <li><a href="#t-1-1">酸素濃縮器</a></li>
                <li><a href="#t-1-2">液体酸素</a></li>
            </ul>
        <div id="t-1-1"><!-- 酸素濃縮期　表示 -->
            	<p class="title">酸素濃縮器を選択してください</p>
                <p class="sub_title">第一希望</p>
            <?=$this->Form->select('oxygen_enricher_type1', [['value'=>'', 'text'=>'選択して下さい'],
                                                        ['value'=>'1', 'text'=>'3Lタイプ'],
                                                        ['value'=>'2', 'text'=>'5Lタイプ'],
                                                        ['value'=>'3', 'text'=>'7Lタイプ'],])?>
            <?=$this->Form->select('is_humidifier1', [['value'=>'', 'text'=>'選択して下さい'],
            											['value'=>'2','text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'加湿あり'],
                                                        ['value'=>'0', 'text'=>'加湿なし'],])?>
            <?=$this->Form->select('oxygen_enricher1', [['value'=>'', 'text'=>'選択して下さい'],
                                                        ['value'=>'0', 'text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'機種指定'],])?>
            <?=$this->Form->intput('oxygen_enricher_name1', ['type'=>'text', 'label'=>false, 'class'=>'w200','list'=>'data_machines'])?>
            <p class="sub_title">第二希望(第一希望で機種指定をした場合は必須です)</p>
            <?=$this->Form->select('oxygen_enricher_type2', [['value'=>'', 'text'=>'選択して下さい'],
                                                        ['value'=>'1', 'text'=>'3Lタイプ'],
                                                        ['value'=>'2', 'text'=>'5Lタイプ'],
                                                        ['value'=>'3', 'text'=>'7Lタイプ'],])?>
            <?=$this->Form->select('is_humidifier2', [['value'=>'', 'text'=>'選択して下さい'],
            		                                    ['value'=>'2', 'text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'加湿あり'],
                                                        ['value'=>'0', 'text'=>'加湿なし'],])?>
            <?=$this->Form->select('oxygen_enricher2', [['value'=>'', 'text'=>'選択して下さい'],
            		                                    ['value'=>'0', 'text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'機種指定'],])?>
            <?=$this->Form->intput('oxygen_enricher_name2', ['type'=>'text', 'label'=>false, 'class'=>'w200','list'=>'data_machines'])?>
            <p class="sub_title">第三希望(第二希望で機種指定をした場合は必須です)</p>
            <?=$this->Form->select('oxygen_enricher_type3', [['value'=>'', 'text'=>'選択して下さい'],
                                                        ['value'=>'1', 'text'=>'3Lタイプ'],
                                                        ['value'=>'2', 'text'=>'5Lタイプ'],
                                                        ['value'=>'3', 'text'=>'7Lタイプ'],])?>
            <?=$this->Form->select('is_humidifier3', [['value'=>'', 'text'=>'選択して下さい'],
            		                                    ['value'=>'2', 'text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'加湿あり'],
                                                        ['value'=>'0', 'text'=>'加湿なし'],])?>
            <?=$this->Form->select('oxygen_enricher3', [['value'=>'', 'text'=>'選択して下さい'],
            		                                    ['value'=>'0', 'text'=>'指定なし'],
                                                        ['value'=>'1', 'text'=>'機種指定'],])?>
            <?=$this->Form->intput('oxygen_enricher_name3', ['type'=>'text', 'label'=>false, 'class'=>'w200','list'=>"data_machines"])?>
            <input type="hidden" name="machine_type" id="machine_type" value='2'>
            <datalist id="data_machines">
            <?php foreach ($machines as $value):?>
            <option value="<?= $value ?>"></option>
            <?php endforeach;?>
            </datalist>
            <div><br></div>
            <div><span style="color:red;">※加湿器有の場合は精製水をご持参ください。</span></div>
        </div>

        <div id="t-1-2"><!-- 液体酸素　表示 -->

            <div id="u1622" class="text">
          		<p><span style="text-decoration:underline;">■親器(ヘリオスH36)の使用方法を選択してください。</span></p>
        	</div>

          	<div id="u1623" class="text">
          	<?php if(isset($post['liquid_oxygen_parent_device_type']) && $post['liquid_oxygen_parent_device_type']==='1'):?>
          	    <p>&nbsp;<input id="u1622_input" type="radio" value="1" name="liquid_oxygen_parent_device_type" checked /><span>加湿器あり（フローコントロールバブル付）</span></p>
          	    <?php else:?>
            	<p>&nbsp;<input id="u1622_input" type="radio" value="1" name="liquid_oxygen_parent_device_type"/><span>加湿器あり（フローコントロールバブル付）</span></p>
            	<?php endif;?>
          	</div>

          	<div id="u1698" class="text">
          	<?php if(isset($post['liquid_oxygen_parent_device_type']) && $post['liquid_oxygen_parent_device_type']==='2'):?>
          	    <p>&nbsp;<input id="u1698_input" type="radio" value="2" name="liquid_oxygen_parent_device_type" checked /><span>加湿器なし（フローコントロールバブル・コネクタ付）</span></p>
           <?php else:?>
            	<p>&nbsp;<input id="u1698_input" type="radio" value="2" name="liquid_oxygen_parent_device_type"/><span>加湿器なし（フローコントロールバブル・コネクタ付）</span></p>
            <?php endif;?>
          	</div>

          	<div id="u1750" class="text">
          	<?php if(isset($post['liquid_oxygen_parent_device_type']) && $post['liquid_oxygen_parent_device_type']==='3'):?>
          	    <p>&nbsp;<input id="u1749_input" type="radio" value="3" name="liquid_oxygen_parent_device_type" checked /><span>親器からの吸入なし（フローコントロールバブルなし）</span></p>
          	<?php else:?>
            	<p>&nbsp;<input id="u1749_input" type="radio" value="3" name="liquid_oxygen_parent_device_type"/><span>親器からの吸入なし（フローコントロールバブルなし）</span></p>
            <?php endif;?>
          	</div>

        	<div id="u1758" class="text">
          		<p><span style="text-decoration:underline;">■子器のタイプを選択してください。</span></p>
        	</div>

<table>
  <tr>
            <?php if(isset($post['is_child_device']) && $post['is_child_device']==='0'):?>
            <td><p>&nbsp;<input type="radio" value="0" name="is_child_device" checked /><span>不要</span></p></td>
            <?php else:?>
            <td><p>&nbsp;<input type="radio" value="0" name="is_child_device"/><span>不要</span></p></td>
            <?php endif;?>
          	<td><p><span>理由：</span></p></td>
          	<td><?=$this->Form->select('unnecessary_reason', [['value'=>'', 'text'=>'選択して下さい'],
          											['value'=>'1', 'text'=>'ヘリオスH300持参'],
          											['value'=>'2', 'text'=>'ほたる持参'],
          											['value'=>'3', 'text'=>'子器を使用しない'],]) ?></td>
  </tr>
  <tr>
  			<td colspan="3">※子器持参の場合、子器用のカニューラはご本人持参としてください。</td>
  </tr>
  <tr>
            <?php if (isset($post['is_child_device']) && $post['is_child_device']==='1'):?>
            <td><p>&nbsp;<input type="radio" value="1" name="is_child_device" checked /><span>必要</span></p></td>
            <?php else:?>
  			<td><p>&nbsp;<input type="radio" value="1" name="is_child_device" /><span>必要</span></p></td>
  			<?php endif;?>
  			<td>第一希望</td>
  			<td><?=$this->Form->select('child_device_type1', [['value'=>'', 'text'=>'選択して下さい'],
  														['value'=>'0', 'text'=>'特定機種なし'],
  														['value'=>'1', 'text'=>'ヘリオスH300'],
  														['value'=>'2', 'text'=>'ほたる'],]) ?></td>
  </tr>
  <tr>
  			<td>&nbsp;</td>
  			<td>第二希望</td>
  			<td><?=$this->Form->select('child_device_type2', [['value'=>'', 'text'=>'選択して下さい'],
  														['value'=>'0', 'text'=>'特定機種なし'],
  														['value'=>'1', 'text'=>'ヘリオスH300'],
  														['value'=>'2', 'text'=>'ほたる'],]) ?>

 </tr>
</table>

			<div id="u1767" class="text">
          		<p><span style="text-decoration:underline;">■附属品が必要な場合、以下を選択してください。</span></p>
        	</div>

        	<div id="u1777" class="text">
        	<?php if(isset($post['accessories'][1])):?>
        	    <p>&nbsp;<input id="u1776_input" name="accessories[1]" type="checkbox" value="1" checked /><span>ローラーベース</span></p>
        	<?php else:?>
            	<p>&nbsp;<input id="u1776_input" name="accessories[1]" type="checkbox" value="1" /><span>ローラーベース</span></p>
            <?php endif;?>
            </div>

            <div id="u1779" class="text">
            <?php if(isset($post['accessories'][8])):?>
                <p>&nbsp;<input id="u1778_input" name="accessories[8]" type="checkbox" value="8" checked /><span>ヘリオス用酸素供給チューブ（親子接続吸入）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1778_input" name="accessories[8]" type="checkbox" value="8"/><span>ヘリオス用酸素供給チューブ（親子接続吸入）</span></p>
            <?php endif;?>
            </div>

            <div id="u1781" class="text">
            <?php if(isset($post['accessories'][2])):?>
                <p>&nbsp;<input id="u1780_input" name="accessories[2]" type="checkbox" value="2" checked/><span>ヘリオスH300専用デュアルカニューラ（小児）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1780_input" name="accessories[2]" type="checkbox" value="2"/><span>ヘリオスH300専用デュアルカニューラ（小児）</span></p>
            <?php endif;?>
            </div>

            <div id="u1783" class="text">
            <?php if(isset($post['accessories'][3])):?>
                <p>&nbsp;<input id="u1782_input" name="accessories[3]" type="checkbox" value="3" checked /><span>ヘリオスH300専用デュアルカニューラ（標準）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1782_input" name="accessories[3]" type="checkbox" value="3"/><span>ヘリオスH300専用デュアルカニューラ（標準）</span></p>
            <?php endif;?>
            </div>

            <div id="u1785" class="text">
            <?php if(isset($post['accessories'][4])):?>
                <p>&nbsp;<input id="u1784_input" name="accessories[4]" type="checkbox" value="4" checked /><span>ヘリオスH300専用ソルターラボカニューラ（小児）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1784_input" name="accessories[4]" type="checkbox" value="4"/><span>ヘリオスH300専用ソルターラボカニューラ（小児）</span></p>
            <?php endif;?>
            </div>

            <div id="u1787" class="text">
            <?php if(isset($post['accessories'][5])):?>
                 <p>&nbsp;<input id="u1786_input" name="accessories[5]" type="checkbox" value="5" checked /><span>ヘリオスH300専用ソルターラボカニューラ（標準）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1786_input" name="accessories[5]" type="checkbox" value="5"/><span>ヘリオスH300専用ソルターラボカニューラ（標準）</span></p>
            <?php endif;?>
            </div>

            <div id="u1789" class="text">
            <?php if(isset($post['accessories'][6])):?>
                <p>&nbsp;<input id="u1788_input" name="accessories[6]" type="checkbox" value="6" checked /><span>ほたる用着脱ユニット</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1788_input" name="accessories[6]" type="checkbox" value="6"/><span>ほたる用着脱ユニット</span></p>
            <?php endif;?>
            </div>

            <div id="u1791" class="text">
            <?php if(isset($post['accessories'][7])):?>
                <p>&nbsp;<input id="u1790_input" type="checkbox" name="accessories[7]" value="7" checked /><span>ほたる用タッチワンデュオ（調整器＋同調器）</span></p>
            <?php else:?>
            	<p>&nbsp;<input id="u1790_input" type="checkbox" name="accessories[7]" value="7"/><span>ほたる用タッチワンデュオ（調整器＋同調器）</span></p>
            <?php endif;?>
            </div>
            <div><span style="color:red;">※充填補助具、皮手袋はご本人持参として下さい。</span></div>


        </div><!-- 液体酸素　表示 -->

        </div>
            <div class="machine_area" id='tab_area_02'>
                <ul>
                    <li><a href="#t-2-1">ボンベ</a></li>
                </ul>
<section>
                <div class="mb20">
                	<label><input type="radio" name="entryplan" value="1" onclick="entryChange1();" checked="checked" />要</label>
                	<label><input type="radio" name="entryplan" value="0" onclick="entryChange1();" />不要</label>
                </div>

<div class="loginbox2">
	<table>
		<tr id="firstbox">
			<td>
                <div class="bomb_area" id='t-2-1'>
                    <p class="title">ボンベのタイプを選択してください</p>
                    充填圧力<?= $this->Form->radio('filling_pressure1',[['text'=>'14.7MPa', 'value'=>'1'],
                    											['text'=>'19.6MPa', 'value'=>'2'],]) ?>

                    &nbsp;容量<?= $this->Form->select('bomb_capacity1', [['value'=>'', 'text'=>'選択して下さい'],
                        ['value'=>'1', 'text'=>'容量1L'],
                        ['value'=>'2', 'text'=>'容量2L'],
                        ['value'=>'3', 'text'=>'容量2.8L'],
                    ])?>

                    <p class="title">バルブのタイプを選択してください</p>
                    <p class="sub_title">■第一希望</p>
                    <?= $this->Form->select('valve_type1', [['value'=>'', 'text'=>'選択して下さい'],
                    		                                ['value'=>'指定なし','text'=>'指定なし'],
                                                            ['value'=>'ヨーク式バルブ(残量表示なし)', 'text'=>'ヨーク式バルブ(残量表示なし)'],
                                                            ['value'=>'ヨーク式バルブ(GY-22)', 'text'=>'ヨーク式バルブ(GY-22)'],
                                                            ['value'=>'ヨーク式バルブ(圧力計付)', 'text'=>'ヨーク式バルブ(圧力計付)'],
                                                            ['value'=>'グッドラン(流量調整器一体型)', 'text'=>'グッドラン(流量調整器一体型)'],
                                                            ['value'=>'NB-3バルブ(タッチワンバルブ)', 'text'=>'NB-3バルブ(タッチワンバルブ)'],])?>

                    <p class="sub_title">■第二希望</p>
                    <?= $this->Form->select('valve_type2', [['value'=>'', 'text'=>'選択して下さい'],
                    		                                ['value'=>'指定なし','text'=>'指定なし'],
                                                            ['value'=>'ヨーク式バルブ(残量表示なし)', 'text'=>'ヨーク式バルブ(残量表示なし)'],
                                                            ['value'=>'ヨーク式バルブ(GY-22)', 'text'=>'ヨーク式バルブ(GY-22)'],
                                                            ['value'=>'ヨーク式バルブ(圧力計付)', 'text'=>'ヨーク式バルブ(圧力計付)'],
                                                            ['value'=>'グッドラン(流量調整器一体型)', 'text'=>'グッドラン(流量調整器一体型)'],
                                                            ['value'=>'NB-3バルブ(タッチワンバルブ)', 'text'=>'NB-3バルブ(タッチワンバルブ)'],])?>

                    <p class="sub_title">■第三希望</p>
                    <?= $this->Form->select('valve_type3', [['value'=>'', 'text'=>'選択して下さい'],
                    		                                ['value'=>'指定なし','text'=>'指定なし'],
                    		/*
                                                            ['value'=>'ヨーク式バルブ(残量表示なし)', 'text'=>'ヨーク式バルブ(残量表示なし)'],
                                                            ['value'=>'ヨーク式バルブ(GY-22)', 'text'=>'ヨーク式バルブ(GY-22)'],
                                                            ['value'=>'ヨーク式バルブ(圧力計付)', 'text'=>'ヨーク式バルブ(圧力計付)'],
                                                            ['value'=>'グッドラン(流量調整器一体型)', 'text'=>'グッドラン(流量調整器一体型)'],
                                                            ['value'=>'NB-3バルブ(タッチワンバルブ)', 'text'=>'NB-3バルブ(タッチワンバルブ)'],*/])?>

                    <p class="title">ボンベの本数を入力して下さい</p>
                    本数<span style="color:red;">*必須</span><?= $this->Form->input('bomb_number', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?><br>
                    <span style="color:red;">※ボンベを依頼する場合、4本目から一本あたり1000円の追加料金が発生します。</span>

                    <p class="title">流量調整器のタイプを選択してください</p>
                    <table border="0">
                    	<tr>
                    <?php if(@$post['is_flow_controller']==='0'):?>
                    <td><input type="radio" name="is_flow_controller" value='0' checked />不要</td>
                    <?php else:?>
                    <td><input type="radio" name="is_flow_controller" value='0' />不要</td>
                    <?php endif;?>
                    <td>理由(不要の場合)</td><td><?=$this->Form->select('flow_controller_unnecessary_reason', [['value'=>'', 'text'=>'選択して下さい'],
                        ['value'=>'1', 'text'=>'持参'],
                        ['value'=>'2', 'text'=>'ボンベ一体型・同調器一体型のため'],
                        ['value'=>'0', 'text'=>'使用しない'],
                    ])?></td>
                    <td>機種名</td><td align="right"><?= $this->Form->input('flow_controller_bringing_name', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    <tr>
                    <?php if(@$post['is_flow_controller']==='1'):?>
                    <td valign="top"><input type="radio" name="is_flow_controller" value='1' checked />必要</td>
                    <?php else:?>
                    <td valign="top"><input type="radio" name="is_flow_controller" value='1' />必要</td>
                    <?php endif;?>
                    <td colspan="4"><p class="sub_title">■第一希望</p>
                    <?=$this->Form->radio('flow_controller_type1', [['text'=>'特定機種なし', 'value'=>'0'],
                                                ['text'=>'特定機種', 'value'=>'1'],])?>
                    <?=$this->Form->input('flow_controller_name1', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td colspan="4"><p class="sub_title">■第二希望</p>
                    <?=$this->Form->radio('flow_controller_type2', [['text'=>'特定機種なし', 'value'=>'0'],
                                                ['text'=>'特定機種', 'value'=>'1'],])?>
                    <?=$this->Form->input('flow_controller_name2', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    </table>
                    <p class="title">呼吸同調器のタイプを選択してください</p>
                    <table border="0">
                    	<tr>
                    <?php if(@$post['is_respiration_tuner']==='0'):?>
                    <td><input type="radio" name="is_respiration_tuner" value='0' checked />不要</td>
                    <?php else:?>
                    <td><input type="radio" name="is_respiration_tuner" value='0' />不要</td>
                    <?php endif;?>
                    <td>理由</td><td><?=$this->Form->select('respiration_tuner_unnecessary_reason', [['value'=>'', 'text'=>''],
                        ['value'=>'', 'text'=>'選択してください'],
                        ['value'=>'1', 'text'=>'持参'],
                        ['value'=>'0', 'text'=>'使用しない'],
                    ])?></td>
                    <td>機種名</td><td><?=$this->Form->input('respiration_tuner_bringing_name', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    <tr>
                    <?php if(@$post['is_respiration_tuner']==='1'):?>
                    <td valign="top"><input type="radio" name="is_respiration_tuner" value='1' checked />必要</td>
                    <?php else:?>
                    <td valign="top"><input type="radio" name="is_respiration_tuner" value='1' />必要</td>
                    <?php endif;?>
                    <td colspan="4"><p class="sub_title">■第一希望</p>
                    <?=$this->Form->radio('respiration_tuner_type1', [['text'=>'特定機種なし', 'value'=>'0'],
                                                ['text'=>'特定機種', 'value'=>'1'],])?>
                    <?=$this->Form->input('respiration_tuner_name1', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td colspan="4"><p class="sub_title">■第二希望</p>
                    <?=$this->Form->radio('respiration_tuner_type2', [['text'=>'特定機種なし', 'value'=>'0'],
                                                ['text'=>'特定機種', 'value'=>'1'],])?>
                    <?=$this->Form->input('respiration_tuner_name2', ['type'=>'text', 'label'=>false, 'class'=>'w200'])?></td>
                    </tr>
                    </table>
                </div>
            </div>
           </td>
       </tr>
    </table>
</section>
        <div class="machine_area" id="tab_area_04">
            <ul>
                <li><a href="#t-4-1">共通付属品</a></li>
            </ul>
            <div class="bomb_area" id='t-4-1'>
            <p class="title">以下を選択してください。</p>
            延長ホース<?=$this->Form->radio('extention_hose_type', [['text'=>'なし', 'value'=>'0'],
                                                            ['text'=>'3m', 'value'=>'1'],
                                                            ['text'=>'5m', 'value'=>'2'],
                                                            ['text'=>'10m', 'value'=>'3'],])?><br>
            カニューラ<?=$this->Form->radio('cannula_type', [['text'=>'なし', 'value'=>'0'],
                                                            ['text'=>'M', 'value'=>'2'],
                                                            ['text'=>'L', 'value'=>'3'],])?>
            </div>
            <span style="color:red;">&nbsp;&nbsp;&nbsp;※カニューラSについては患者様ご持参としてください</span>
        </div>
    </div>

    <div class="top_title">
        <span class="title">その他依頼内容</span>
    </div>
    <div class="sub_content">
        <?= $this->Form->textarea('request_message',['id'=>'request_message']) ?>
    </div>

    <div class="top_title">
    <span class="title">依頼会社担当者</span>
    </div>
    <div class="sub_content">
    	<table>
    		<colgroup>
    			<col width="15%">
    			<col width="35%">
    			<col width="15%">
    			<col width="35$">
    		</colgroup>
            <?php if ($is_Agency): ?>
                <tr>
                    <td>会社名</td>
                    <td colspan="3" class="input_td">
                        <?= $company['company_name']?>&nbsp;<?= $branch_office['branch_name']?>
                    </td>
                </tr>
            <?php endif; ?>
    		<tr>
    			<td>担当者</td>
    			<td colspan="3" class="input_td">
    			<?= $this->Form->select('person_in_charge', $tanto, ['default'=> $user['user_name']]) ?>
    		</tr>
    	</table>
    </div>

    <div class="top_title">
    <span class="title">資料添付</span>
    </div>
    <div class="sub_content">
        <?= $this->Form->file('attachment_1') ?>
        <?= $this->Form->file('attachment_2') ?>
    </div>

<?= $this->Form->input('request_no',['hidden', 'label'=>false, 'class'=>'w200', 'required'=>false]) ?>
<?= $this->Form->hidden('offer_date') ?>
        <?=$this->Form->hidden('branch_code')?>

    <div class="button_area">
        <button type="submit" class="stop_button">依頼中止</button>
        <button type="submit" class="save_button">一時保存</button>
        <button type="submit" class="next_button">入力内容を確認する</button>
    </div>
</form>
</div>