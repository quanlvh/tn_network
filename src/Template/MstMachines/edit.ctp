<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php $this->assign('title','機器マスタメンテナンス > 新規登録')?>
<?= $this->Html->css('MstMachines/list.css');?>
<?= $this->Html->script('list.js',['inline'=>false]); ?>
<?= $this->Html->css('MstMachines/mstmachines.css'); ?>
<?= $this->Html->script('MstMachines/mstmachines.js'); ?>

<!-- 機器マスタメンテナンス -->
<div class="top_title">
	<span class="title">機器メンテナンス</span>
</div>
<?= $this->Form->create($mstMachine,['enctype'=>'multipart/form-data']); ?>
<div id="conditions_area" class="">
	<div id="u00001" class="text"><p>機器分類</p></div>
	<div id="u00002" class="radio_button"><?= $this->Form->radio('machine_code',[["onclick"=>"entryChange1();",'text'=>'酸素濃縮器','value'=>'1','checked'=>true],["onclick"=>"entryChange1();",'text'=>'液体酸素親器','value'=>'2'],["onclick"=>"entryChange1();",'text'=>'液体酸素子器','value'=>'3'],["onclick"=>"entryChange1();",'text'=>'液体酸素附属品','value'=>'4'],["onclick"=>"entryChange1();",'text'=>'バルブ','value'=>'5'],]) ?></div>
</div>
<?php
if ($mstMachine['machine_code']=== '1'){
	$mstMachine['machine_name1'] = $mstMachine['machine_name'];
	$mstMachine['loanability1'] = $mstMachine['loanability'];
} elseif ($mstMachine['machine_code']==='2') {
	$mstMachine['machine_name2'] = $mstMachine['machine_name'];
	$mstMachine['loanability2'] = $mstMachine['loanability'];
} elseif ($mstMachine['machine_code']==='3') {
	$mstMachine['machine_name3'] = $mstMachine['machine_name'];
	$mstMachine['loanability3'] = $mstMachine['loanability'];
} elseif ($mstMachine['machine_code']==='4') {
	$mstMachine['machine_name4'] = $mstMachine['machine_name'];
	$mstMachine['loanability4'] = $mstMachine['loanability'];
} elseif ($mstMachine['machine_code']==='5') {
	$mstMachine['machine_name5'] = $mstMachine['machine_name'];
	$mstMachine['loanability5'] = $mstMachine['loanability'];
}
?>
<!-- 酸素濃縮器 -->
<div id="firstBox"><!-- 酸素濃縮器 --></div>
<div id="firstElement">
	<div id="u00003"><p>機種名</p></div>
	<div id="u00004"><?= $this->Form->input('machine_name1',['type'=>'text','label'=>false,'id'=>'u00004_input']) ?></div>
	<div id="u00005"><p>画像</p></div>
    <div id="u00005g">
	<?php
	if ($mstMachine->file){
		echo '<img src="' . "/upload_img/" .  $mstMachine->file . '" width="100">';
		echo $this->Form->input("file_before",["type"=>"hidden","value"=>$mstMachine->file]);
		echo $this->Form->input("delete",["type"=>"submit","name"=>"file_delete","value"=>"delete"]);
	}
	?>
	</div>
	<div id="u00006"><?= $this->Form->file('file_name_1'); ?></div>
	<div id="u00007"><p>TN貸出可否</p></div>
	<div id="u00008"><?= $this->Form->radio('loanability1',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
</div>


<!-- 液体酸素親器 -->
<div id="secondBox"><!-- 液体酸素親器 --></div>
<div id="secondElement">
	<div id="u00009"><p>機種名</p></div>
	<div id="u00010"><?= $this->Form->input('machine_name2',['type'=>'text','label'=>false,'id'=>'u00010_input']) ?></div>
	<div id="u00011"><p>画像</p></div>
	<div id="u00005g">
	<?php
	if ($mstMachine->file){
		echo '<img src="' . "/upload_img/" .  $mstMachine->file . '" width="100">';
		echo $this->Form->input("file_before",["type"=>"hidden","value"=>$mstMachine->file]);
		echo $this->Form->input("delete",["type"=>"submit","name"=>"file_delete","value"=>"delete"]);
	}
	?>
	</div>
	<div id="u00012"><?= $this->Form->file('file_name_2'); ?></div>
	<div id="u00013"><p>TN貸出可否</p></div>
	<div id="u00014"><?= $this->Form->radio('loanability2',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
</div>

<!-- 液体酸素子器 -->
<div id="thirdBox"><!-- 液体酸素子器 --></div>
<div id="thirdElement">
	<div id="u00015"><p>親器</p></div>
	<div id="u00016">
	<select name="master_code">
	<option value="" selected>-- 選択 --</option>
	<?php foreach($master as $row1):?>
	<option value="<?= h($row1['machine_code'])?>"><?= h($row1['machine_name'])?></option>
	<?php endforeach;?>
	</select>
	<!-- <select><option>ヘリオスリザーバー (H36)</option></select> -->
	</div>
	<div id="u00017"><p>子器</p></div>
	<div id="u00018">
	<select name="child_code">
	<option value="" selected>-- 選択 --</option>
	<?php foreach ($child as $row2):?>
	<option value="<?= h($row2['machine_code']) ?>"><?= h($row2['machine_name']) ?></option>
	<?php endforeach;?>
	</select>
	<!--  <select><option>ヘリオスポータブル(H300)</option></select> -->
	</div>
	<div id="u00019"><p>機種名</p></div>
	<div id="u00020"><?= $this->Form->input('machine_name3',['type'=>'text','label'=>false,'id'=>'u00020_input']) ?></div>
	<div id="u00021"><p>画像</p></div>
	<div id="u00005_img">
	<?php
	if ($mstMachine->file){
		echo '<img src="' . "/upload_img/" .  $mstMachine->file . '" width="100">';
		echo $this->Form->input("file_before",["type"=>"hidden","value"=>$mstMachine->file]);
		echo $this->Form->input("delete",["type"=>"submit","name"=>"file_delete","value"=>"delete"]);
	}
	?>
	</div>
	<div id="u00022"><?= $this->Form->file('file_name_3'); ?></div>
	<div id="u00023"><p>TN貸出可否</p></div>
	<div id="u00024"><?= $this->Form->radio('loanability3',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
</div>
<!-- 液体酸素附属品 -->
<div id="fourthBox"><!-- 液体酸素附属品 --></div>
<div id="fourthElement">
	<div id="u00025"><p>親器</p></div>
	<div id="u00026">
	<select name="machin_code">
	<option value="" selected>-- 選択 --</option>
	<?php foreach ($master as $row3):?>
	<option value="<?= h($row3['machine_code']) ?>"><?= h($row3['machine_name']) ?></option>
	<?php endforeach;?>
	</select>
	</div>

	<div id="u00027"><p>子器</p></div>
	<div id="u00028">
	<select name="child_code">
	<option value="" selected>-- 選択 --</option>
	<?php foreach ($child as $row4):?>
	<option value="<?= h($row4['machine_code']) ?>"><?= h($row4['machine_name']) ?></option>
	<?php endforeach;?>
	</select>
	</div>

	<div id="u00029"><p>機種名</p></div>
	<div id="u00030"><?= $this->Form->input('machine_name4',['type'=>'text','label'=>false,'id'=>'u00020_input']) ?></div>
	<div id="u00031"><p>画像</p></div>
	<div id="u00031_img">
	<?php
	if ($mstMachine->file){
		echo '<img src="' . "/upload_img/" .  $mstMachine->file . '" width="100">';
		echo $this->Form->input("file_before",["type"=>"hidden","value"=>$mstMachine->file]);
		echo $this->Form->input("delete",["type"=>"submit","name"=>"file_delete","value"=>"delete"]);
	}
	?>
	</div>
	<div id="u00032"><?= $this->Form->file('file_name_4'); ?></div>
	<div id="u00033"><p>TN貸出可否</p></div>
	<div id="u00034"><?= $this->Form->radio('loanability4',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
	<div id="u00035"><p>子器持参時選択</p></div>
	<div id="u00036"><?= $this->Form->radio('bringing',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
</div>
<!-- バルブ -->
<div id="fifthBox"><!-- バルブ --></div>
<div id="fifthElement">
	<div id="u00037"><p>機種名</p></div>
	<div id="u00038"><?= $this->Form->input('machine_name5',['type'=>'text','label'=>false,'id'=>'u00020_input']) ?></div>
	<div id="u00039"><p>画像</p></div>
	<div id="u00039_img">
	<?php
	if ($mstMachine->file){
		echo '<img src="' . "/upload_img/" .  $mstMachine->file . '" width="100">';
		echo $this->Form->input("file_before",["type"=>"hidden","value"=>$mstMachine->file]);
		echo $this->Form->input("delete",["type"=>"submit","name"=>"file_delete","value"=>"delete"]);
	}
	?>
	</div>
	<div id="u00040"><?= $this->Form->file('file_name_5'); ?></div>
	<div id="u00041"><p>TN貸出可否</p></div>
	<div id="u00042"><?= $this->Form->radio('loanability5',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],]) ?></div>
</div>

<!-- 戻る -->
<div id="u00063">
	<button type="button" onclick="window.location.href='/MstMachines/';">戻る</button>
</div>

<!-- 登録 -->
<div id="u00062" class="ax_default button">
	<button id="u00062_div" type="button" onclick="submit();">更新</button>
</div>

<?= $this->Form->end(); ?>
