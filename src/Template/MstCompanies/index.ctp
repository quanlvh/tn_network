<?php $this->assign('title', '会社情報検索・一覧')?>
<?= $this->Html->css('styles.css')?>
<?= $this->Html->script('data.js') ?>

  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u6594" class="ax_default heading_2">
        <div id="u6594_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6595" class="text">
          <p><span>会社情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6620" class="ax_default label">
        <div id="u6620_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6621" class="text">
          <p><span>検索項目</span></p>
        </div>
      </div>

<?= $this->Form->create() ?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6627" class="ax_default label">
        <div id="u6627_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6628" class="text">
          <p><span>会社名</span></p>
        </div>
      </div>

      <!-- Company Name (Text Field) -->
      <div id="u6626" class="ax_default text_field">
      <?php if (!empty($post['company_name'])):?>
        <input id="u6626_input" type="text" name="company_name" value="<?= $post['company_name']?>" />
      <?php else:?>
        <input id="u6626_input" type="text" name="company_name" value="" />
      <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6635" class="ax_default label">
        <div id="u6635_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6636" class="text">
          <p><span>郵便番号</span></p>
        </div>
      </div>

      <!-- Zip Code (Text Field) -->
      <div id="u6632" class="ax_default text_field">
      <?php if (!empty($post['zip_code'])): ?>
        <input id="u6632_input" type="text" name="zip_code" value="<?= $post['zip_code'] ?>" />
      <?php else:?>
        <input id="u6632_input" type="text" name="zip_code" value="" />
      <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6630" class="ax_default label">
        <div id="u6630_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6631" class="text">
          <p><span>住所</span></p>
        </div>
      </div>

      <!-- Company Addr (Text Field) -->
      <div id="u6629" class="ax_default text_field">
      <?php if (!empty($post['company_addr'])):?>
        <input id="u6629_input" type="text" name="company_addr" value="<?= $post['company_addr'] ?>" />
      <?php else:?>
        <input id="u6629_input" type="text" name="company_addr" value="" />
      <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6642" class="ax_default label">
        <div id="u6642_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6643" class="text">
          <p><span>電話番号</span></p>
        </div>
      </div>

      <!-- Company Tel (Text Field) -->
      <div id="u6641" class="ax_default text_field">
      <?php if (!empty($post['company_tel'])): ?>
        <input id="u6641_input" type="text" name="company_tel" value="<?= $post['company_tel'] ?>" />
      <?php else:?>
        <input id="u6641_input" type="text" name="company_tel" value="" />
      <?php endif;?>
      </div>


      <!-- Unnamed (Rectangle) -->
      <div id="u6645" class="ax_default label">
        <div id="u6645_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6646" class="text">
          <p><span>代表者氏名</span></p>
        </div>
      </div>

      <!-- Name Of Representative (Text Field) -->
      <div id="u6644" class="ax_default text_field">
      <?php if (!empty($post['name_of_representative'])):?>
        <input id="u6644_input" type="text" name="name_of_representative" value="<?= $post['name_of_representative'] ?>" />
      <?php else:?>
        <input id="u6644_input" type="text" name="name_of_representative" value="" />
      <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6648" class="ax_default label">
        <div id="u6648_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6649" class="text">
          <p><span>代表者役職</span></p>
        </div>
      </div>

      <!-- Position Of Representative (Text Field) -->
      <div id="u6647" class="ax_default text_field">
      <?php if (!empty($post['position_of_representative'])): ?>
        <input id="u6647_input" type="text" name="position_of_representative" value="<?= $post['position_of_representative'] ?>" />
      <?php else:?>
        <input id="u6647_input" type="text" name="position_of_representative" value="" />
      <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6633" class="ax_default label">
        <div id="u6633_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6634" class="text">
          <p><span>会員区分</span></p>
        </div>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6637" class="ax_default radio_button">
        <label for="u6637_input">
          <!-- Unnamed () -->
          <div id="u6638" class="text">
            <p><span>会員</span></p>
          </div>
        </label>
        <?php if (!empty($post['member_flg'])):?>
        <input id="u6637_input" type="radio" value="1" name="member_flg" checked />
        <?php else:?>
        <input id="u6637_input" type="radio" value="1" name="member_flg" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6639" class="ax_default radio_button">
        <label for="u6639_input">
          <!-- Unnamed () -->
          <div id="u6640" class="text">
            <p><span>非会員</span></p>
          </div>
        </label>
        <?php if (@$post['member_flg']==='0'):?>
        <input id="u6639_input" type="radio" value="0" name="member_flg" checked />
        <?php else:?>
        <input id="u6637_input" type="radio" value="0" name="member_flg" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6624" class="ax_default button">
        <button type="submit" id="u6624_div">検索</button>
      </div>
<?= $this->Form->end() ?>


      <!-- Unnamed (Rectangle) -->
      <div id="u6616" class="ax_default label">
        <div id="u6616_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6617" class="text">
          <p><span>検索結果一覧</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6602" class="ax_default label">
        <div id="u6602_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6603" class="text">
          <p><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">検索結果が</span><span style="font-family:'メイリオ ボールド', 'メイリオ レギュラー', 'メイリオ';font-weight:700;">&nbsp;<?= $count ?>&nbsp;</span><span style="font-family:'メイリオ レギュラー', 'メイリオ';font-weight:400;">件あります。</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6618" class="ax_default line">
        <img id="u6618_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6619" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>


      <!-- Unnamed (Horizontal Line) -->
      <div id="u6622" class="ax_default line">
        <img id="u6622_img" class="img " src="/img/u867.png"/>
        <!-- Unnamed () -->
        <div id="u6623" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6650" class="ax_default button" onclick="window.location.href='/MstCompanies/add';">
        <button type="submit" id="u6650_div">新規登録</button>
      </div>

       <div id="u6652" class="" onclick="window.location.href='/mstMenteMenu';">
       <button>戻る</button>
       </div>
      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6348_ann" class="annotation"></div>


      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6350" class="ax_default">

<?php if(!empty($results)):?>
		<div id="result_list_area" class="">
		<?php if (count($results)!=0):?>
		<table class="list">
		<col span="8" width="10%">
		<thead>
			<tr>
				<th>会社名</th>
				<th>郵便番号</th>
				<th>住所</th>
				<th>電話番号</th>
				<th>会員区分</th>
				<th>代表者氏名</th>
				<th>代表者役職</th>
				<th></th>
			</tr>
		</thead>
			<tbody>
			<?php foreach ($results as $result):?>
			<tr>
				<td><?= h($result['company_name']) ?></td>
				<td><?= h($result['zip_code']) ?></td>
				<td><?= h($result['company_addr']) ?></td>
				<td><?= h($result['company_tel']) ?></td>
				<?php
				if ($result['member_flg'] == 0) {
					$memberView = $member_flg[0];
				} elseif ($result['member_flg'] == 1) {
					$memberView = $member_flg[1];
				} elseif ($result['member_flg'] == 2) {
					$memberView = $member_flg[2];
				}
				?>
				<td><?= h($memberView) ?></td>
				<td><?= h($result['name_of_representative']) ?></td>
				<td><?= h($result['position_of_representative']) ?></td>

				<td><form method="post" action="/MstCompanies/view/<?= $result['id']?>">
				<button class="detail_button" type="submit">詳細</button></form>
				</td>
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
		<?php endif;?>
		</div>
<?php endif;?>
      </div>

  </body>
