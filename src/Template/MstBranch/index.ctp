<?php $this->assign('title', '事業所情報検索・一覧')?>
<?= $this->Html->css('Branch/styles.css') ?>
<?= $this->Html->script('Branch/data.js') ?>

<body>
    <div id="base" class="">


      <!-- Unnamed (Rectangle) -->
      <div id="u6308" class="ax_default heading_2">
        <div id="u6308_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6309" class="text">
          <p><span>事業所情報マスタメンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6310" class="ax_default line">
        <img id="u6310_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6311" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6312" class="ax_default line">
        <img id="u6312_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6313" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6316" class="ax_default label">
        <div id="u6316_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6317" class="text">
          <p><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">検索結果が</span><span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:700;">&nbsp;<?= $count?>&nbsp;</span><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">件あります。</span></p>
        </div>
      </div>


      <!-- Unnamed (Rectangle) -->
      <div id="u6320" class="ax_default label">
        <div id="u6320_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6321" class="text">
          <p><span>検索結果一覧</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6322" class="ax_default line">
        <img id="u6322_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6323" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6324" class="ax_default label">
        <div id="u6324_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6325" class="text">
          <p><span>検索項目</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6326" class="ax_default line">
        <img id="u6326_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6327" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>
<?= $this->Form->create() ?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6328" class="ax_default button">
        <button id="u6328_div" type="submit">検索</button>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6331" class="ax_default label">
        <div id="u6331_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6332" class="text">
          <p><span>事業所ID</span></p>
        </div>
      </div>

      <!-- Branch Code (Text Field) -->
      <div id="u6330" class="ax_default text_field">
      <?= $this->Form->input('branch_code',['type'=>'text','label'=>false,'id'=>'u6330_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6333" class="ax_default label">
        <div id="u6333_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6334" class="text">
          <p><span>事業所名</span></p>
        </div>
      </div>

      <!-- Branch Name (Text Field) -->
      <div id="u6341" class="ax_default text_field">
      <?= $this->Form->input('branch_name',['type'=>'text','label'=>false,'id'=>'u6341_nput']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6343" class="ax_default label">
        <div id="u6343_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6344" class="text">
          <p><span>住所</span></p>
        </div>
      </div>

      <!-- Branch Addr (Text Field) -->
      <div id="u6342" class="ax_default text_field">
      <?= $this->Form->input('branch_addr',['type'=>'text','label'=>false,'id'=>'u6342_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6346" class="ax_default label">
        <div id="u6346_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6347" class="text">
          <p><span>郵便番号</span></p>
        </div>
      </div>

      <!-- Zip Code (Text Field) -->
      <div id="u6345" class="ax_default text_field">
      <?= $this->Form->input('branch_zip_code',['type'=>'number','label'=>false,'id'=>'u6345_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6418" class="ax_default label">
        <div id="u6418_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6419" class="text">
          <p><span>機器返送先住所</span></p>
        </div>
      </div>

      <!-- Return Address (Text Field) -->
      <div id="u6417" class="ax_default text_field">
      <?= $this->Form->input('return_address',['type'=>'text','label'=>false,'id'=>'u6417_input']) ?>
      </div>


      <!-- Unnamed (Rectangle) -->
      <div id="u6421" class="ax_default label">
        <div id="u6421_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6422" class="text">
          <p><span>返送先郵便番号</span></p>
        </div>
      </div>

      <!-- Return Zip Code (Text Field) -->
      <div id="u6420" class="ax_default text_field">
      <?= $this->Form->input('return_zip_code',['type'=>'number','label'=>false,'id'=>'u6420_input']) ?>
      </div>


     <!-- Unnamed (Rectangle) -->
      <div id="u6412" class="ax_default label">
        <div id="u6412_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6413" class="text">
          <p><span>電話番号</span></p>
        </div>
      </div>


      <!-- Branch Tel (Text Field) -->
      <div id="u6411" class="ax_default text_field">
      <?= $this->Form->input('branch_tel',['type'=>'text','label'=>false,'id'=>'u6411_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6335" class="ax_default label">
        <div id="u6335_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6336" class="text">
          <p><span>Paid登録</span></p>
        </div>
      </div>

      <!-- Unnamed (Checkbox) -->
      <div id="u6337" class="ax_default checkbox">
        <label for="u6337_input">
          <!-- Unnamed () -->
          <div id="u6338" class="text">
            <p><span>未登録分のみ</span></p>
          </div>
        </label>
        <?php if ($this->request->getData('paid')==='0'):?>
        <input id="u6337_input" type="checkbox" name="paid" value='0' checked />
        <?php else:?>
        <input id="u6337_input" type="checkbox" name="paid" value='0' />
        <?php endif;?>
      </div>

<?= $this->Form->end() ?>

      <!-- Unnamed (Rectangle) -->
      <div id="u6339" class="ax_default button" onClick="window.location.href='/MstBranch/add';">
        <div id="u6339_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6340" class="text">
          <p><span>新規登録</span></p>
        </div>
      </div>

      <div id="u6416" class="">
        <button onClick="window.location.href='/mstMenteMenu';">戻る</button>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6339_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6348" class="ax_default label">
        <div id="u6348_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6349" class="text">
          <p><span>会社名</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6414" class="ax_default label">
        <div id="u6414_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6415" class="text">
          <p><span><?= $mstCompany['company_name'] ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6348_ann" class="annotation"></div>

      <!-- Unnamed (Table) -->
      <div id="u6350" class="ax_default">

<?php if(!empty(($results))):?>
		<div id="result_list_area" class="">
		<?php if (count($results)!=0):?>
		<table class="list">
		<col span="7" width="10%">
		<thead>
			<tr>
				<th>事業所ID</th>
				<th>事業所名</th>
				<th>郵便番号</th>
				<th>住所</th>
				<th>電話番号</th>
				<th>Paid登録</th>
				<th></th>
			</tr>
		</thead>
			<tbody>
			<?php foreach ($results as $result):?>
			<tr>
				<td><?= h($result['branch_code']) ?></td>
				<td><?= h($result['branch_name']) ?></td>
				<td><?= h($result['branch_zip_code']) ?></td>
				<td><?= h($result['branch_addr']) ?></td>
				<td><?= h($result['branch_tel']) ?></td>
				<?php
					if ($result['paid'] == 1) {
						$viewPaid = $paid[1];
					} else {
						$viewPaid = $paid[0];
					}
				?>
				<td><?= h($viewPaid) ?></td>
				<td><form method="post" action="/MstBranch/view/<?= $result['id'] ?>">
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
	</div>
 </body>