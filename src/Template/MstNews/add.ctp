<?= $this->assign('title', 'お知らせ情報メンテナンス');?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>
<?= $this->Html->script('mstmente.js', array('inline' => false))?>

<!--依頼履歴-->
<div class="top_title">
    <span class="title">お知らせ情報メンテナンス</span>
</div>
<?= $this->Form->create(); ?>
<div id="conditions_area" class="">

    <table id="conditions_table">
        <tr>
        	<td id="condition" width="20%">
				<span>お知らせコード</span>
			</td>
			<td id="condition">
				<span>(新規登録)</span>
			</td>
		</tr>
		<tr>
			<td id="condition">会員／非会員表示</td>
			<td id="condition">
				<?=$this->Form->radio('for_member_flg', [['value'=>'0', 'text'=>'', 'checked' => true]])?>会員・非会員両方に表示<br>
				<?=$this->Form->radio('for_member_flg', [['value'=>'1', 'text'=>'']])?>会員のみに表示
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>お知らせタイトル<br></span>
			</td>
			<td id="condition">
				<?= $this->Form->input('news_title', array('type'=>'text', 'label'=>false, 'size'=>'30','required'=>true)); ?>
			</td>
		</tr>
		<tr>
			<td id="condition" >
				<span>お知らせ内容</span>
			</td>
			<td id="condition">
                <?=$this->Form->textarea('news_detail', array('cols'=>30,'required'=>true))?>
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>掲載期間</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="viewing_start_date" size="10" required>&nbsp～&nbsp
                    <input type="input" class="w200 datepicker"  name="viewing_end_date" size="10" required>
				</div>
			</td>
		</tr>
	</table>
</div>

<div class="button_area">
	<span style="float:center;">
		<div class="div_button_rtn" onclick="window.location.href='/mstnews/index/';">
			戻る
		</div>
	<form action='<?=$this->url->build(["controller"=>"mstnews/add/"])?>'>
		<?= $this->Form->button('登録',['class'=>'next_button']); ?>
	</form>
	</span>
</div>
<?= $this->Form->end(); ?>

