<?= $this->assign('title', 'お知らせ情報メンテナンス');?>
<?= $this->Html->css('list.css');?>
<?= $this->Html->script('list.js', array('inline' => false))?>

<!--依頼履歴-->
<div class="top_title">
    <span class="title">お知らせ情報メンテナンス</span>
</div>
<?= $this->Form->create(); ?>
<div id="conditions_area" class="">
    <div id="conditions_title">
	    検索項目
    </div>
    <table id="conditions_table">
        <tr>
        	<td id="condition" width="20%">
				<span>お知らせコード</span>
			</td>
			<td id="condition" width="30%">
				<?= $this->Form->input('news_code', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
			<td width="20%">会員／非会員表示</td>
			<td width="30%">
				<?=$this->Form->radio('select_member', [['value'=>'0', 'text'=>'', 'checked' => true]])?>会員・非会員両方に表示<br>
				<?=$this->Form->radio('select_member', [['value'=>'1', 'text'=>'']])?>会員のみに表示
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>お知らせタイトル<br>(キーワード検索)</span>
			</td>
			<td id="condition">
				<?= $this->Form->input('news_title', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
			<td id="condition" >
				<span>お知らせ内容<br>(キーワード検索)</span>
			</td>
			<td id="condition">
				<?= $this->Form->input('news_detail', array('type'=>'text', 'label'=>false, 'size'=>'15')); ?>
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>お知らせ更新日</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="news_update_from_date" size="10">&nbsp～&nbsp
                    <input type="input" class="w200 datepicker"  name="news_update_to_date" size="10">
				</div>
			</td>
		</tr>
		<tr>
			<td id="condition">
				<span>掲載期間</span>
			</td>
			<td id="condition">
				<div style="display:inline-flex">
                    <input type="text" class="w200 datepicker"  name="viewing_from_date" size="10">&nbsp～&nbsp
                    <input type="input" class="w200 datepicker"  name="viewing_to_date" size="10">
				</div>
			</td>
		</tr>
	</table>
</div>

<div class="button_area">
	<?= $this->Form->button('検索',['class'=>'next_button']); ?>
</div>
<?= $this->Form->end(); ?>


<div id="result_list_title">
	検索結果一覧
	<span  id="span_right">
		<div class="div_button_next"  onclick="window.location.href='/mstnews/add';">
			新規登録
		</div>
	</span>
</div>


<?php if (!empty($mst_news)): ?>

<div id="result_list_area" class="">
	<?php if (count($mst_news)==0):?>
	    <p>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果がありません。</span>
    	</p>
    <?php else: ?>
	    <p>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">検索結果が</span>
			<span style="font-family: 'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ'; font-weight: 700;"><?=count($mst_news);?></span>
			<span style="font-family: 'メイリオ レギュラー', 'メイリオ'; font-weight: 400;">件あります。</span>
		</p>
	    <table class="list">
	    <col span="10" width="9%">

	    <thead>
	        <tr>
	            <th>お知らせコード</th>
	            <th>お知らせタイトル</th>
	            <th>お知らせ更新日</th>
	            <th>会員／非会員表示</th>
	            <th>掲載開始日</th>
	            <th>掲載終了日</th>
	            <th>&nbsp&nbsp&nbsp&nbsp</th>
	        </tr>
	    </thead>
		    <tbody>
			    <?php foreach ($mst_news as $news): ?>
		        <tr>
		            <td><?= h($news['news_code']) ?></td>
		            <td><?= h($news['news_title']) ?></td>
		            <td><?= h($this->datew($news['news_update_date'])) ?></td>
		            <?php if($news['for_member_flg']==NONMEMBER):?>
			            <td>会員・非会員両方</td>
		            <?php else:?>
			            <td>会員のみ</td>
		            <?php endif; ?>
		            <td><?= h($this->datew($news['viewing_start_date'])) ?></td>
		            <td><?= h($this->datew($news['viewing_end_date'])) ?></td>
		            <td>
                         <form method="post" action="/mstnews/view/<?= $news['id']?>">
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

<div class="button_area">
    <form action='<?=$this->url->build(["controller"=>"mstmentemenu"])?>'>
		<?= $this->Form->button('戻る',['type' => 'submit','class'=>'return_button']); ?>
	</form>
</div>


