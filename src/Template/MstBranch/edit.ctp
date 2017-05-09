<?php $this->assign('title', '事業所情報メンテナンス')?>
<?= $this->Html->css('Branch/data/styles.css') ?>
<?= $this->Html->css('Branch/view/styles.css') ?>
<?= $this->Html->script('Branch/view/data.js') ?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <body>
    <div id="base" class="">


      <!-- Unnamed (Horizontal Line) -->
      <div id="u6432" class="ax_default line">
        <img id="u6432_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6433" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6430" class="ax_default heading_2">
        <div id="u6430_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6431" class="text">
          <p><span>事業所情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6434" class="ax_default line">
        <img id="u6434_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6435" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

<!-- start -->
      <!-- Unnamed (Rectangle) -->
      <div id="u6442" class="ax_default label">
        <div id="u6442_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6443" class="text">
          <p><span>事業所ID</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6462" class="ax_default label">
        <div id="u6462_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6463" class="text">
          <p><span><?= $mstBranch->branch_code ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6464" class="ax_default label">
        <div id="u6464_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6465" class="text">
          <p><span>会社名</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6466" class="ax_default label">
        <div id="u6466_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6467" class="text">
          <p><span><?= $mstCompany->company_name ?></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6447" class="ax_default label">
        <div id="u6447_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6448" class="text">
          <p><span>事業所名</span></p>
        </div>
      </div>
<?php echo $this->Form->create($mstBranch); ?>
      <!-- 事業所名 (Text Field) -->
      <div id="u6446" class="ax_default text_field">
      <?= $this->Form->input('branch_name',['type'=>'text','label'=>false,'id'=>'u6446_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6453" class="ax_default label">
        <div id="u6453_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6454" class="text">
          <p><span>電話番号</span></p>
        </div>
      </div>

      <!-- Branch_tel (Text Field) -->
      <div id="u6452" class="ax_default text_field">
      <?= $this->Form->input('branch_tel',['type'=>'text','label'=>false,'id'=>'u6452_input','value'=>$mstBranch['branch_tel']]) ?>
        <!-- <input id="u6452_input" type="text" value=""/> -->
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6444" class="ax_default label">
        <div id="u6444_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6445" class="text">
          <p><span>FAX番号</span></p>
        </div>
      </div>

      <!-- Fax Number (Text Field) -->
      <div id="u6451" class="ax_default text_field">
        <!-- <input id="u6451_input" type="text" value=""/> -->
        <?= $this->Form->input('branch_fax',['type'=>'text','label'=>false,'value'=>$mstBranch['branch_fax'],'id'=>'u6451_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6449" class="ax_default label">
        <div id="u6449_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6450" class="text">
          <p><span>メイン担当</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6449_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6455" class="ax_default label">
        <div id="u6455_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6456" class="text">
          <p><span>郵便番号</span></p>
        </div>
      </div>

      <!-- Zip Code (Text Field) -->
      <div id="u6468" class="ax_default text_field">
      <?= $this->Form->input('branch_zip_code',['type'=>'text','id'=>'u6468_input','value'=>$mstBranch['branch_zip_code'],'label'=>false,'placeholder'=>'ハイフンなしで入力してください','maxlength'=>'8','onKeyUp'=>"AjaxZip3.zip2addr(this,'','branch_addr','branch_addr');"]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6470" class="ax_default button">
        <div id="u6470_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6471" class="text">
          <p><span>郵便番号から住所を検索</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6457" class="ax_default label">
        <div id="u6457_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6458" class="text">
          <p><span>住所</span></p>
        </div>
      </div>

      <!-- branch_addr (Text Field) -->
      <div id="u6469" class="ax_default text_field">
      <?= $this->Form->input('branch_addr',['type'=>'text','id'=>'u6469_input','value'=>$mstBranch['branch_addr'],'label'=>false]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6517" class="ax_default label">
        <div id="u6517_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6518" class="text">
          <p><span>Paid登録</span></p>
        </div>
      </div>

      <!-- Unnamed (Checkbox) -->
      <div id="u6519" class="ax_default checkbox">
        <label for="u6519_input">
          <!-- Unnamed () -->
          <div id="u6520" class="text">
            <p><span>登録済み</span></p>
          </div>
        </label>
        <?= $this->Form->input('paid',['type'=>'checkbox','id'=>'u6519_input','label'=>false])?>
      </div>
    </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6440" class="ax_default button">
      <button type="submit" style="background-color:rgba(255, 153, 0, 1);">更 新</button>
      </div>

<?php $this->Form->end(); ?>

      <div id="u6523" class="">
        <button type="button" onClick="window.location.href='/MstCompanies/view/<?= $Session ?>';">戻る</button>
      </div>
      <!-- Unnamed (Rectangle) -->
      <div id="u6459" class="ax_default label">
        <div id="u6459_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6460" class="text">
          <p><span>※メイン担当を変更する場合、Paid担当者を変更するお手続きが必要です。</span></p><p><span>　お手数ですが、変更のお手続きに関してはPaidのご担当者にお問い合わせください。</span></p>
        </div>
      </div>

      <!-- Unnamed (Droplist) -->
      <div id="u6461" class="ax_default droplist">
        <select id="u6461_input">
          <option value="選択してください">選択してください</option>
          <option value="テスト太郎1">テスト太郎1</option>
          <option selected value="テスト太郎2">テスト太郎2</option>
          <option value="テスト太郎3">テスト太郎3</option>
        </select>
      </div>

<!-- start -->
<?php if (!empty($userData)):?>
	<div id="u6521" class="">
	<?php if (count($userData)!=0):?>
	<table class="list">
	<col span="6" width="15%">
	<thead>
		<tr>
			<th>ユーザーID</th>
			<th>ユーザー名</th>
			<th>メールアドレス</th>
			<th>役職</th>
			<th>メイン担当</th>
		</tr>
	</thead>
		<tbody>
		<?php foreach ($userData as $result):?>
		<tr>
			<td><?= h($result['user_id']) ?></td>
			<td><?= h($result['user_name']) ?></td>
			<td><?= h($result['mail_addr']) ?></td>
			<td><?= h($result['position']) ?></td>
			<?php if ($result['handle']==='1'):?>
			<td><?= h($handle[1]) ?></td>
			<?php else:?>
			<td>-</td>
			<?php endif;?>
			<td><form method="post" action="/Users/view/<?= $result['id'] ?>">
				<button class="detail_button" type="submit">詳細</button></form>
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<?php endif;?>
	</div>
<?php endif;?>
<!-- end -->
      <!-- Unnamed (Rectangle) -->
      <div id="u6513" class="ax_default label">
        <div id="u6513_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6514" class="text">
          <p><span>事業所に所属するユーザー</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6515" class="ax_default line">
        <img id="u6515_img" class="img " src="/img/u6515.png"/>
        <!-- Unnamed () -->
        <div id="u6516" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

  </body>
