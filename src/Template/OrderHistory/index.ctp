<?php use Cake\Core\Configure;
$is_machine_type = Configure::read('is_machine_type');?>
<?php
if($history_type==HISTORY_TYPE_REQUEST):
	$this->assign('title', '依頼履歴');
else:
	$this->assign('title', '受託履歴');
endif;
?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>

<!--依頼履歴-->
<div class="top_title">
    <span class="title">
		<?php
		if($history_type==HISTORY_TYPE_REQUEST):
			echo('依頼履歴');
		else:
			echo('受託履歴');
		endif;
		?>
    </span>
</div>
<?= $this->Form->create(); ?>
<div id="conditions_area" class="">
    <div id="conditions_title">
	    <li class="title" style="list-style:url('img/u845.png')">検索項目</li>
    </div>
    <table id="conditions_table">
        <tr>
        	<td id="condition" style="width:100">
				<span>依頼番号</span>
			</td>
			<td id="condition" style="width:250">
				<?= $this->Form->input('request_no', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
			<td id="condition" style="width:100">
				<span>滞在期間</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="stay_from_date" size="10">&nbsp～&nbsp
                    <input type="input" class="w200 datepicker"  name="stay_to_date" size="10">
				</div>
			</td>
		</tr>
        <tr>
        	<td id="condition">
				<span>宿泊先</span>
			</td>
			<td id="condition">
				<?= $this->Form->input('lodging_place_name', array('type'=>'text', 'label'=>false ,'size'=>'15')); ?>
			</td>
			<td id="condition">
				<span>設置機器</span>
			</td>
			<td id="condition">
				<?= $this->Form->select('machine_type', $is_machine_type);?>

			</td>
		</tr>
        <tr>
        	<td id="condition">
				<span>対応状況</span>
			</td>
			<td id="condition">
				<?php
				    $options = array();
				    $options += array(UNSELECTED=>'選択してください');
				    foreach ($mst_statuses as $status) {
				        $options += array($status['status_code'] => $status['status_name']);
				    }
				?>
				<?= $this->Form->select('status',$options);?>

			</td>
			<td id="condition">
				<span>患者名</span>
			</td>
			<td id="condition">
				<?= $this->Form->input('user_name', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
		</tr>
	</table>
</div>

<div class="button_area">
	<?= $this->Form->button('検索',['class'=>'next_button']); ?>
</div>
<?= $this->Form->end(); ?>

    <div id="#result_list_title">
	    <li class="title" style="list-style:url('img/u845.png')">検索結果一覧</li>
    </div>


<?php if (!empty($requests)): ?>

<div id="result_list_area" class="">
	<?php if (count($requests)==0):?>
	    <p>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果がありません。</span>
    	</p>
    <?php else: ?>
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
	            <?php if($history_type==HISTORY_TYPE_REQUEST):?>
		            <th>受託会社</th>
	            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
			            <th>依頼会社</th>
		            <?php endif; ?>
	            <?php elseif($history_type==HISTORY_TYPE_TRUSTEE):?>
	            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
			            <th>受託会社</th>
		            <?php endif; ?>
		            <th>依頼会社</th>
	            <?php endif; ?>
	            <th>滞在期間</th>
	            <th>宿泊先</th>
	            <th>設置機器タイプ</th>
	            <th>対応状況</th>
	            <?php if($history_type==HISTORY_TYPE_REQUEST):?>
	            	<th>依頼会社請求額(税込)</th>
	            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
		            	<th>受託会社請求額(税込)</th>
		            	<th>受託会社支払額(税込)</th>
		            <?php endif; ?>
	            <?php elseif($history_type==HISTORY_TYPE_TRUSTEE):?>
	            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
		            	<th>依頼会社請求額(税込)</th>
		            <?php endif; ?>
	            	<th>受託会社請求額(税込)</th>
	            	<th>受託会社支払額(税込)</th>
	            <?php endif; ?>
	            <th>&nbsp&nbsp&nbsp&nbsp</th>
	        </tr>
	    </thead>
		    <tbody>

			    <?php foreach ($requests as $request): ?>
		        <tr>
		            <td><?= h($request['request_no']) ?></td>
		            <?php if($history_type==HISTORY_TYPE_REQUEST):?>
			            <td><?= h($request['contractor_company_name']) ?></td>
		            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
				            <td><?= h($request['request_company_name']) ?></td>
			            <?php endif; ?>
		            <?php elseif($history_type==HISTORY_TYPE_TRUSTEE):?>
		            	<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
				            <td><?= h($request['contractor_company_name']) ?></td>
			            <?php endif; ?>
			            <td><?= h($request['request_company_name']) ?></td>
		            <?php endif; ?>
		            <td><?php if(!is_null($request['stay_from_date'])):?>
		            		<?= h($this->datew($request['stay_from_date'])) ?>&nbsp～&nbsp<br>
		            	<?php endif; ?>
		            	<?php if(!is_null($request['stay_to_date'])):?>
		            		<?= h($this->datew($request['stay_to_date'])) ?>
		            	<?php endif; ?>
		            </td>
		            <td><?= h($request['lodging_place_name']) ?><br><?= h($request['lodging_place_addr']) ?></td>
		            <td><?= h($is_machine_type[$request['machine_type']]) ?></td>
		            <td><?= h($request['status_name']) ?></td>
					<?php if($history_type==HISTORY_TYPE_REQUEST):?>
	            		<td><?= h(number_format($request['request_charge'])) ?></td>
	            		<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
		            		<td><?= h(number_format($request['contractor_charge'])) ?></td>
		            		<td><?= h(number_format($request['contractor_payment'])) ?></td>
		            	<?php endif; ?>
					<?php elseif($history_type==HISTORY_TYPE_TRUSTEE):?>
	            		<?php if(@$user['user_role']!=ROLE_STORE)://販売店以外?>
		            		<td><?= h(number_format($request['request_charge'])) ?></td>
		            	<?php endif; ?>
	            		<td><?= h(number_format($request['contractor_charge'])) ?></td>
	            		<td><?= h(number_format($request['contractor_payment'])) ?></td>
	            	<?php endif; ?>
		            <td>
					<?php if($history_type==HISTORY_TYPE_REQUEST):?>
                         <form method="post" action="/requestDetail/index/<?=$request['request_no']?>/<?=LIST_TYPE_REQUESTING?>">
                             <?= $this->Form->button(__('詳細'),['class'=>'detail_button']) ?>
                         </form>
                    <?php else:?>
                         <form method="post" action="/requestDetail/index/<?=$request['request_no']?>/<?=LIST_TYPE_ONGOING?>">
                             <?= $this->Form->button(__('詳細'),['class'=>'detail_button']) ?>
                         </form>
	            	<?php endif; ?>
		            </td>
		        </tr>
	            <?php endforeach; ?>
	    	</tbody>
	    </table>
	<?php endif; ?>
</div>
<?php endif; ?>

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"mypage"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>


