<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php $this->assign('title','機器マスタメンテナンス > 検索・一覧')?>
<?= $this->Html->css('MstMachines/list.css');?>
<?= $this->Html->script('list.js',['inline'=>false]); ?>
<?= $this->Html->css('MstMachines/mstmachines.css'); ?>
<?= $this->Html->script('MstMachines/mstmachines.js'); ?>

<!-- 機器マスタメンテナンス -->
<div class="top_title">
	<span class="title">機器メンテナンス</span>
</div>
<?= $this->Form->create($mstMachines); ?>
<div id="conditions_area" class="">
	<div id="conditions_title">
		検索項目
	</div>
	<div id="u00001a" class="text"><p>機器分類</p></div>
	<div id="u00002a" class="radio_button"><?= $this->Form->radio('machine_code',[["onclick"=>"entryChange1();",'text'=>'酸素濃縮器','value'=>'1'],["onclick"=>"entryChange1();",'text'=>'液体酸素親器','value'=>'2'],["onclick"=>"entryChange1();",'text'=>'液体酸素子器','value'=>'3'],["onclick"=>"entryChange1();",'text'=>'液体酸素附属品','value'=>'4'],["onclick"=>"entryChange1();",'text'=>'バルブ','value'=>'5'],]) ?></div>
</div>
<!-- 親器 -->
<div id="u00049"><p>親器</p></div>
<div id="u00050">
<select name="master_code">
<option value="" selected>-- 選択 --</option>
<?php foreach ($master as $row1): ?>
<option value="<?= h($row1['machine_code']) ?>"><?= h($row1['machine_name']) ?></option>
<?php endforeach; ?>
</select>
<!--  <select><option>ヘリオスH300用ソルターラボカニューラ(標準)</option></select> -->
</div>

<!-- 子器 -->
<div id="u00051"><p>子器</p></div>
<div id="u00052">
<select name="child_code">
<option value="" selected>-- 選択 --</option>
<?php foreach ($child as $row2):?>
<option value="<?= h($row2['machine_code']) ?>"><?= h($row2['machine_name'])?></option>
<?php endforeach;?>
</select>
<!--  <select><option>ヘリオスポータブル(H300)</option></select> -->
</div>

<!-- 機種名 -->
<div id="u00053"><p>機種名</p></div>
<div id="u00054"><?= $this->Form->input('machine_name',['type'=>'text','label'=>false,'id'=>'u00054_input']) ?></div>

<!-- TN貸出可否 -->
<div id="u00055"><p>TN貸出可否</p></div>
<div id="u00056"><?= $this->Form->radio('loanability',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],['text'=>'全て','value'=>''],]) ?></div>

<!-- 子器持参時選択 -->
<div id="u00057"><p>子器持参時選択</p></div>
<div id="u00058"><?= $this->Form->radio('bringing',[['text'=>'不可','value'=>'0'],['text'=>'可','value'=>'1'],['text'=>'全て','value'=>''],]) ?></div>

<!-- 検索 -->
<div id="u00059" class="ax_default button">
	<button id="u00059_div" type="button" onclick="submit();">検索</button>
</div>
<?= $this->Form->end(); ?>
<!-- 戻る -->
<div id="u00061" class="ax_default button">
	<button onclick="window.location.href='/mstMenteMenu';">戻る</button>
</div>

<!-- 新規登録 -->
<div id="u00060" class="ax_default button">
	<button id="u00060_div" onclick="window.location.href='/MstMachines/add';">新規登録</button>
</div>

<!-- 仕切り線 -->
<div id="u00064" class="ax_default line">
	<img id="u00064_img" class="img" src="/img/u867.png">
<div id="u00065" class="text" style="display:none; visibility: hidden">
<p>
	<span></span>
</p>
</div>
</div>

<!-- 検索結果一覧 -->
<div id="u00066" class="ax_default label">
	<div id="u00066_div" class=""></div>
	<div id="u00067" class="text">
		<p><span>検索結果一覧</span></p>
	</div>
</div>

<!-- 検索結果数 -->
<div id="u00068" class="ax_default label">
	<div id="u00068_div" class=""></div>
	<div id="u00069" class="text">
	<p>
	<span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:400;">検索結果が</span>
	<span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:700;"><?= $count; ?></span>
	<span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:400;">件があります。</span>
	</p>
	</div>
</div>

<!-- 結果の表示 -->
<div id="u00070" class="ax_default">
<?php if(!empty($res)):?>
  <div id="result_list_area" class="">
<?php if (count($res)!=0):?>
    <table class="list">
      <colgroup>
        <col span="7" width="10%">
      </colgroup>
      <thead>
        <tr>
          <th width="5%">機器分類</th>
          <th>親器</th>
          <th>子器</th>
          <th>機種名</th>
          <th>TN貸出可否</th>
          <th>子器持参時選択</th>
          <th>詳細</th>
         </tr>
       </thead>
       <tbody>
       <?php foreach ($res as $result): ?>
       <tr>
       	<td><?= h($machine[$result['machine_code']]) ?></td>
       	<td></td>
       	<td></td>
       	<td><?= h($result['machine_name']); ?></td>
       	<td><?= h($loana[$result['loanability']])?></td>
       	<td><?= h($loana[$result['bringing']]) ?></td>
       	<td><form action="/MstMachines/edit/<?= $result['id'] ?>">
       	<button class="detail_button" type="submit">詳細</button></form>
       	</td>
       </tr>
       <?php endforeach;?>
       </tbody>
    </table>
    <?php endif;?>
  </div>
</div>
<?php endif;?>