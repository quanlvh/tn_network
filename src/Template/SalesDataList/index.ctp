<?php $this->assign('title', '販売データ管理');?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>

<!--依頼履歴-->
<div class="top_title">
    <span class="title">販売データ管理</span>
</div>
<?= $this->Form->create(); ?>
<div id="conditions_area" class="">
    <div id="conditions_title">
	    販売データ抽出条件
    </div>
    <table id="conditions_table">
		<tr>
			<td id="condition" width="30%">
				<span>旅行完了期間</span>
			</td>
			<td id="condition" width="30%>
				<div style="display:inline-flex">
                    &nbsp～&nbsp
                    <input type="input" class="w200 datepicker"  name="stay_to_date_end" size="10" value="<?=date('Y/m/').'20';?>">
				</div>
			</td>
			<td id="condition">
				<span>依頼番号</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" name="request_no" size="10">
				</div>
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>請求書発行日</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="issue_of_bill_date" size="10">
				</div>
			</td>
			<td id="condition">
				<span>完了日</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="_date" size="10">
				</div>
			</td>
		</tr>
        <tr>
        	<td id="condition" width="30%">
				<span>依頼会社名(あいまい検索)</span>
			</td>
			<td id="condition" width="30%">
				<?= $this->Form->input('request_company_name', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
		</tr>
        <tr>
        	<td id="condition" width="30%">
				<span>受託会社名(あいまい検索)</span>
			</td>
			<td id="condition" width="30%">
				<?= $this->Form->input('contractor_company_name', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
		</tr>
		<tr>
			<td id="condition">
                <input type="hidden" name="is_charge_completed" value="0">
                <input type="checkbox" name="is_charge_completed" value="1" checked><span>請求データ未作成分(Paid用)</span>
			</td>
			<td id="condition">
                <input type="hidden" name="is_payment_completed" value="0">
                <input type="checkbox" name="is_payment_completed" value="1" checked><span>支払データ未作成分(全銀用)</span>
			</td>
		</tr>
	</table>
</div>

<div class="button_area">
	<?= $this->Form->button('クリア',['class'=>'next_button']); ?>
	<?= $this->Form->submit('この条件で検索する',['class'=>'next_button','name'=>'find']); ?>
</div>

<div id="result_list_title">
	対象データ一覧
</div>


<?php if (!empty($requests)): ?>

<div id="result_list_area" class="">
	<?php if (count($requests)==0):?>
	    <p>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果がありません。</span>
    	</p>
    <?php else: ?>
    <table>
    	<tr>
	    <td>
	    <?= $this->Form->submit('請求データ作成（Paid用）',['class'=>'next_button','name'=>'csv_paid']); ?>
		</td>
		<td>
		<?= $this->Form->submit('支払データ作成（全銀用）',['class'=>'next_button','name'=>'csv_payment']); ?>
		</td>
		</tr>
	</table>
	<?= $this->Form->end(); ?>
	    <p>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果が</span>
			<span style="font-family: 'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ'; font-weight: 700;"><?=count($requests);?></span>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">件あります。</span>
		</p>
	    <table class="list">
	    <col span="10" width="9%">

	    <thead>
	        <tr>
	            <th>依頼番号</th>
	            <th>旅行終了日</th>
	            <th>請求書<br>発行日</th>
	            <th>受託会社<br>支払金額</th>
	            <th>支払<br>処理<br>状況</th>
	            <th>依頼会社<br>請求金額</th>
	            <th>受託会社<br>請求金額</th>
	            <th>請求<br>処理<br>状況</th>
	            <th>完了日</th>
	            <th>依頼<br>会社名</th>
	            <th>受託<br>会社名</th>
	            <th>&nbsp&nbsp&nbsp&nbsp</th>
	        </tr>
	    </thead>
		    <tbody>
			    <?php foreach ($requests as $request): ?>
		        <tr>

		            <td><?= $this->Html->link($request['request_no'],['controller'=>'RequestDetail',
		            		'action'=>'index',$request['request_no'],LIST_TYPE_REQUESTING]) ?></td>
		            <td><?= h($this->datew($request['stay_to_date'])) ?></td>
		            <td><input type="text" class="w200 datepicker" id="issue_of_bill_date"
		            		value="<?php
		            		if (!empty($request['issue_of_bill_date'])):
		            		    echo $request['issue_of_bill_date']->format('Y/m/d');
		            		endif; ?>" size="7"></td>
		            <td><?= h(number_format($request['contractor_payment'])) ?></td>
		            <td><?=$this->Form->checkbox( 'is_payment_completed' , ['id'=> $request['is_payment_completed'] ]) ?></td>
		            <td><?= h(number_format($request['request_charge'])) ?></td>
		            <td><?= h(number_format($request['contractor_charge'])) ?></td>
		            <td><?=$this->Form->checkbox( 'is_charge_completed' , ['id'=> $request['is_charge_completed'] ]) ?></td>
		            <td><?= h($this->datew($request['completion_date'])) ?></td>
		            <td><?= h($request['request_company_name']) ?></td>
		            <td><?= h($request['contractor_company_name']) ?></td>
		            <td>
                         <form method="post" action="/salesdataentry/index/<?=$request['id']?>/">
                             <?= $this->Form->button(__('詳細'),['class'=>'detail_button']) ?>
                         </form>
		            </td>
		        </tr>
	            <?php endforeach; ?>
	    	</tbody>
	    </table>
	<?php endif; ?>
</div>
<?php endif; ?>
<?= $this->Form->end(); ?>

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"executiveMenu"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>


