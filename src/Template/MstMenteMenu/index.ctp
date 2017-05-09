<?php $this->assign('title', 'マスタメンテナンス'); ?>
<?= $this->Html->css('mstmente.css');?>

<div class="top_title">
    <span class="title">マスタメンテナンス</span>
</div>

<!--マスタメンテナンス欄-->

<div id="mstmente_area">
    <table id="mstmente_table">
        <tr>
            <td id="col">
                <div class="div_button" onclick="window.location.href='/Users/find';">
    		        <span>ユーザー情報<br>メンテナンス</span>
                </div>
                <div class="div_button" onclick="window.location.href='/MstCompanies';">
    		        <span>会社情報<br>メンテナンス</span>
                </div>
            </td>
            <td id="col">
                <div class="div_button" onclick="window.location.href='/MstBranch';">
    		        <span>事業所情報<br>メンテナンス</span>
                </div>
                <div class="div_button">
    		        <span>対応可能エリア<br>メンテナンス</span>
                </div>
            </td>
            <td id="col"></td>
            <td id="col"></td>
        </tr>
    </table>
</div>

<!--事務局管理マスタメンテナンス欄-->
<?php if($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE): ?>

	<div id='mstmente_area'>
	    <div id="headoffice_title">
	        事務局管理マスタメンテナンス
	    </div>

	    <table>
	        <tr>
	            <td id="col">
	                <div class="div_button" onclick="window.location.href='/MstNews/index';">
	    		        <span>お知らせ情報<br>メンテナンス</span>
	                </div>
	                <div class="div_button">
	    		        <span>単価情報<br>メンテナンス</span>
	                </div>
	            </td>
	            <td id="col">
	                <div class="div_button" onclick="window.location.href='/mstUserPolicy';">
	    		        <span>サービス利用許諾<br>メンテナンス</span>
	                </div>
	                <div class="div_button">
	    		        <span>区分値(税区分等)<br>メンテナンス</span>
	                </div>
	            </td>
	            <td id="col">
	                <div class="div_button" onclick="window.location.href='/MstMachines/index';">
	    		        <span>機器情報<br>メンテナンス</span>
	                </div>
	            </td>
            	<td id="col"></td>
            </tr>
	    </table>

	</div>
<?php endif; ?>

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"mypage"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>
