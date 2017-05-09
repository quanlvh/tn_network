<?php
	$this->assign('title', '理事会資料データ作成');
?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>

<!--依頼履歴-->
<div class="top_title">
    <span class="title">理事会資料データ作成</span>
</div>
<?= $this->Form->create(); ?>
<div id="conditions_area" class="">
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">活動報告</li>
    </div>
	<?= $this->Form->input('activity_report_yyyy', array('type'=>'text', 'label'=>false ,'size'=>'8')); ?>年度
	<?= $this->Form->button('CSV出力',['class'=>'next_button','name'=>'activity_report']); ?>
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">会計報告</li>
    </div>
    <?= $this->Form->input('accounting_report_yyyy', array('type'=>'text', 'label'=>false ,'size'=>'8')); ?>年度
	<?= $this->Form->button('CSV出力',['class'=>'next_button','name'=>'accounting_report']); ?>
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">会員名簿</li>
    </div>
	<?= $this->Form->button('CSV出力',['class'=>'next_button','name'=>'member_list']); ?>

</div>
<?= $this->Form->end(); ?>

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"executiveMenu"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>


