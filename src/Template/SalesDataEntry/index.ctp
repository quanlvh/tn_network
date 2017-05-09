<?php
$this->assign('title', '販売管理データ詳細');
?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>
<?= $this->Html->script('mstmente.js', array('inline' => false))?>

<div class="top_title">
    <span class="title">販売データ管理
    </span>
</div>
<div id="conditions_area" class="">
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">販売データ詳細</li>
    </div>
    <table class="list">
        <thead>
        	<th>依頼番号</th>
        	<th>旅行申込日</th>
        	<th>患者様氏名</th>
        	<th>滞在先</th>
        	<th>滞在期間</th>
        	<th>受託会社</th>
		</thead>
		<tr>
			<td><?= h($request['request_no']) ?></td>
			<td><?= h($this->datew($request['offer_date'])) ?></td>
			<td><?= h($request['user_name']) ?></td>
			<td><?= h($request['lodging_place_name']) ?></td>
			<td><?php if(!is_null($request['stay_from_date'])):?>
		            		<?= h($this->datew($request['stay_from_date'])) ?>&nbsp～&nbsp<br>
		            	<?php endif; ?>
		            	<?php if(!is_null($request['stay_to_date'])):?>
		            		<?= h($this->datew($request['stay_to_date'])) ?>
		            	<?php endif; ?>
		    </td>
			<td><?= h($request['contractor_company_name']) ?></td>
		</tr>
        <thead>
        	<th>請求書発行日</th>
        	<th>依頼会社請求金額</th>
        	<th>受託会社請求金額</th>
        	<th>受託会社支払金額</th>
        	<th></th>
        	<th>依頼会社</th>
		</thead>
		<tr>
			<td><?= h($this->datew($request['issue_of_bill_date'])) ?></td>
			<td style="text-align:right;"><?= h(number_format($request['request_charge'])) ?></td>
			<td style="text-align:right;"><?= h(number_format($request['contractor_charge'])) ?></td>
			<td style="text-align:right;"><?= h(number_format($request['contractor_payment'])) ?></td>
			<td></td>
			<td><?= h($request['request_company_name']) ?></td>
		</tr>
	</table>
</div>


<div id="conditions_area" class="">
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">明細データ一覧</li>
    </div>
    <table class="list" id="detailTable">
        <thead>
        	<th>項目選択</th>
        	<th>項目</th>
        	<th>単価</th>
        	<th>数量</th>
        	<th>金額（税別）</th>
            <th></th>
		</thead>
		<tbody>
	    <?php
	    if(!empty($amount)):
		    foreach ($amount['amount_details'] as $detail):
		?>
		<tr>
			<td>
			</td>
			<td><?= h($detail['unit_price_detail_name']) ?></td>
			<td style="text-align:right;">
				<?= h(number_format($detail['unit_price'])) ?>
			</td>
			<td style="text-align:right;">
				<?= h(number_format($detail['quantity'])) ?>
			</td>
			<td style="text-align:right;">
				<?= h(number_format($detail['amount'])) ?>
			</td>
            <td>
                <input value="削除" type="button" class="removeList" />
            </td>
		</tr>
        <?php
        	endforeach;
        endif;
        ?>
		</tbody>
		<tbody id="addTBody">
		<tr class="detail">
			<td>
				<?php
				    $options = array();
				    $options += array(UNSELECTED=>'');
				    foreach ($mst_unit_prices as $unit_price) {
				        $options += array($unit_price['unit_price_detail_code'] => $unit_price['unit_price_detail_name']);
				    }
				    $options += array('99'=>'その他');
				?>
				<?= $this->Form->select('unit_price',$options,['class'=>'changeList']);?>
			</td>
			<td>
			</td>
            <td>
            <?=$this->Form->input('unit_price', ['type'=>'number', 'label'=>false,
            	'value'=>0, 'size'=>'8','style'=>'text-align:right', 'class'=>'unit_price'])?>
			</td>
			<td>
			<?=$this->Form->input('quantity', ['type'=>'number', 'label'=>false,
            	'value'=>1, 'size'=>'3','style'=>'text-align:right', 'class'=>'quantity'])?>
			</td>
			<td style="text-align:right;" class="amount">
				0
			</td>
			<td>
				<input value="削除" type="button" class="removeList" />
			</td>
		</tr>
		</tbody>
	</table>

	<button type="button" class="addList">追加</button>

	<table>
		<tr>
			<td>依頼会社請求金額（税別）：</td>
			<td><?= h(number_format($amount['request_charge'])) ?></td>
		</tr>
		<tr>
			<td>受託会社請求金額（税別）：</td>
			<td><?= h(number_format($amount['contractor_charge'])) ?></td>
		</tr>
		<tr>
			<td>受託会社支払金額（税別）：</td>
			<td><?= h(number_format($amount['contractor_payment'])) ?></td>
		</tr>
		<tr>
			<td>事務局手数料（税別）：</td>
			<td><?= h(number_format($amount['executive_commission'])) ?></td>
		</tr>

	</table>

</div>



<div class="button_area">
	<span style="float:center;">
		<div class="div_button_rtn" onclick="window.location.href='/salesdatalist?>';">
			戻る
		</div>
		<form action='<?=$this->url->build(["controller"=>"salesDataEntry/add/"])?>'>
		<button type="submit" class="save_button">登録／更新</button>
	</span>
</div>

