<?php $this->assign('title', '事務局用機能'); ?>
<?= $this->Html->css('mstmente.css');?>

<div class="top_title">
    <span class="title">事務局用機能</span>
</div>

<!--マスタメンテナンス欄-->

<div id="mstmente_area">
    <table id="mstmente_table">
        <tr>
            <td id="col">
                <div class="div_button" onclick="window.location.href='/salesDataList';">
    		        <span>販売データ管理</span>
                </div>
                <div class="div_button" onclick="window.location.href='/boardDocument';">
    		        <span>理事会資料用<br>データ作成</span>
                </div>
            </td>
            <td id="col"></td>
            <td id="col"></td>
            <td id="col"></td>
        </tr>
    </table>
</div>

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"mypage"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>
