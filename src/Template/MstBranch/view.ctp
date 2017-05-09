<?php $this->assign('title', '事業所情報メンテナンス')?>
<?= $this->Html->css('Branch/data/styles.css') ?>
<?= $this->Html->css('Branch/view/styles.css') ?>
<?= $this->Html->script('Branch/data.js') ?>
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
<?php echo $this->Form->create($mstBranch);?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6462" class="ax_default label">
        <div id="u6462_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6463" class="text">
          <p><span><?= $mstBranch->branch_code?></span></p>
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

      <!-- 事業所名 (Text Field) -->
      <div id="u6446" class="ax_default text_field">
      <?= $this->Form->input('branch_name',['type'=>'text','label'=>false,'id'=>'u6446_input','value'=>$mstBranch->branch_name]) ?>
      </div>

      <!-- 被仕向銀行名 -->
      <div id="u6525" class="ax_default label">
        <div id="6525_div" class=""></div>
        <div id="u6526" class="text">
          <p><span>銀行名</span>
        </div>
      </div>

      <!-- 被仕向銀行名 -->
      <div id="u6527" class="ax_default text_field">
      <?= $this->Form->input('bank_name',['type'=>'text','label'=>false,'id'=>'u6527_input','value'=>$mstBranch->bank_name]) ?>
      </div>

      <!-- 被仕向支店名 -->
      <div id="u6541" class="ax_default label">
        <div id="6542_div" class=""></div>
        <div id="u6542" class="text">
          <p><span>支店名</span>
        </div>
      </div>

      <!-- 被仕向支店名 -->
      <div id="u6543" class="ax_default text_field">
      <?= $this->Form->input('bank_branch_name',['type'=>'text','label'=>false,'id'=>'u6543_input','value'=>$mstBranch->bank_branch_name]) ?>
      </div>

      <!-- 被仕向銀行番号 -->
      <div id="u6544" class="ax_default label">
        <div id="6544_div" class=""></div>
        <div id="u6545" class="text">
          <p><span>銀行番号</span>
        </div>
      </div>

      <!-- 被仕向銀行番号 -->
      <div id="u6546" class="ax_default text_field">
      <?= $this->Form->input('bank_code',['type'=>'text','label'=>false,'id'=>'u6546_input','value'=>$mstBranch->bank_code,'maxlength'=>'4']) ?>
      </div>

      <!-- 被仕向支店番号 -->
      <div id="u6547" class="ax_default label">
        <div id="6547_div" class=""></div>
        <div id="u6548" class="text">
          <p><span>支店番号</span>
        </div>
      </div>

      <!-- 被仕向支店番号 -->
      <div id="u6549" class="ax_default text_field">
      <?= $this->Form->input('bank_branch_code',['type'=>'text','label'=>false,'id'=>'u6549_input','value'=>$mstBranch->bank_branch_code,'maxlength'=>'3']) ?>
      </div>

      <!-- 預金種目 -->
      <div id="u6550" class="ax_default label">
        <div id="6550_div" class=""></div>
        <div id="u6551" class="text">
          <p><span>預金種目</span>
        </div>
      </div>

      <!-- 預金種目 -->
      <div id="u6552" class="ax_default text_field">
      <?= $this->Form->radio('deposit_type',[['text'=>'普通預金','value'=>'1'],['text'=>'当座預金','value'=>'2'],['text'=>'貯蓄預金','value'=>'4'],['text'=>'その他','value'=>'9'],]) ?>
      </div>

      <!-- 受取人名 -->
      <div id="u6553" class="ax_default label">
        <div id="6553_div" class=""></div>
        <div id="u6554" class="text">
          <p><span>受取人名</span>
        </div>
      </div>

      <!-- 受取人名 -->
      <div id="u6555" class="ax_default text_field">
      <?= $this->Form->input('recipient_name',['type'=>'text','label'=>false,'id'=>'u6555_input','value'=>$mstBranch->recipient_name,'maxlength'=>'30']) ?>
      </div>

      <!-- 口座番号 -->
      <div id="u6556" class="ax_default label">
        <div id="6556_div" class=""></div>
        <div id="u6557" class="text">
          <p><span>口座番号</span>
        </div>
      </div>

      <!-- 口座番号 -->
      <div id="u6558" class="ax_default text_field">
      <?= $this->Form->input('account_number',['type'=>'text','label'=>false,'id'=>'u6558_input','value'=>$mstBranch->account_number,'maxlength'=>'7']) ?>-->
      </div>

      <!-- 請求書送付先住所 -->
      <div id="u6528" class="ax_default label">
        <div id="u6528_div" class=""></div>
        <div id="u6529" class="text">
          <p><span>請求書送付先住所</span>
        </div>
      </div>

      <!-- 請求書送付先住所 -->
      <div id="u6530" class="ax_default text_field">
      <?= $this->Form->input('invoice_shipping_address',['type'=>'text','label'=>false,'id'=>'u6530_input','value'=>$mstBranch->invoice_shipping_address]) ?>
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
      <?= $this->Form->input('branch_tel',['type'=>'tel','label'=>false,'id'=>'u6452_input','value'=>$mstBranch->branch_tel]) ?>
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
        <?= $this->Form->input('branch_fax',['type'=>'tel','label'=>false,'id'=>'u6451_input','value'=>$mstBranch->branch_fax]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6444a" class="ax_default label">
        <div id="u6444a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6445a" class="text">
          <p><span>FAX通知</span></p>
        </div>
      </div>

      <!-- FAX要否 -->
      <div id="u6531" clsdd="ax_default label">
      <?= $this->Form->radio('is_receive_fax',[['text'=>'要','value'=>'1'],['text'=>'否','value'=>'0'],]) ?>
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
      <?= $this->Form->input('branch_zip_code',['type'=>'number','id'=>'u6468_input','label'=>false,'value'=>$mstBranch->branch_zip_code,'placeholder'=>'ハイフンなしで入力してください','maxlength'=>'8','onKeyUp'=>"AjaxZip3.zip2addr(this,'','branch_pref_code','branch_addr');"]) ?>
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
      <div id="u6469a" class="ax_default text_field">
      <select name="branch_pref_code" id="u6469a_input">
      <option value="" disabled selected>-- 都道府県 --</option>
      <?php foreach ($prefCode as $value):?>
      <?php if($mstBranch['branch_pref_code']===$value['pref_code']):?>
      <option value="<?= h($value['pref_code']) ?>" selected><?= h($value['pref_name'])?></option>
      <?php else:?>
      <option value="<?= h($value['pref_code']) ?>"><?= h($value['pref_name'])?></option>
      <?php endif;?>
      <?php endforeach;?>
      </select>
      </div>

      <!-- branch_addr (Text Field) -->
      <div id="u6469" class="ax_default text_field">
      <?= $this->Form->input('branch_addr',['type'=>'text','id'=>'u6469_input','label'=>false,'value'=>$mstBranch->branch_addr]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6517" class="ax_default label">
        <div id="u6517_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6518" class="text">
          <p><span>Paid登録</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6449_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6533" class="ax_default label">
        <div id="u6533_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6534" class="text">
          <p><span>返送先郵便番号</span></p>
        </div>
      </div>

      <!-- Zip Code (Text Field) -->
      <div id="u6535" class="ax_default text_field">
      <?= $this->Form->input('return_zip_code',['type'=>'number','id'=>'u6535_input','label'=>false,'value'=>$mstBranch->return_zip_code,'placeholder'=>'ハイフンなしで入力してください','maxlength'=>'8','onKeyUp'=>"AjaxZip3.zip2addr(this,'','return_address','return_address');"]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6536" class="ax_default button">
        <div id="u6536_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6537" class="text">
          <p><span>郵便番号から住所を検索</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6538" class="ax_default label">
        <div id="u6538_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6539" class="text">
          <p><span>機器返送先住所</span></p>
        </div>
      </div>

      <!-- return_addr (Text Field) -->
      <div id="u6540" class="ax_default text_field">
      <?= $this->Form->input('return_address',['type'=>'text','id'=>'u6540_input','label'=>false,'value'=>$mstBranch->return_address]) ?>
      </div>


      <!-- Unnamed (Checkbox) -->
      <div id="u6519" class="ax_default checkbox">
        <label for="u6519_input">
          <!-- Unnamed () -->
          <div id="u6520" class="text">
            <p><span>登録済み</span></p>
          </div>
        </label>
        <?= $this->Form->input('paid',['type'=>'checkbox','id'=>'u6519_input','label'=>false]) ?>
      </div>
    </div>

    <div id="u6440" class="ax_default button">
	    <div id="u6441" class="text">
    		<button type="button" onClick="submit();" style="background-color:rgba(255, 153, 0, 1);">更 新</button>
    	</div>
    </div>

<?php $this->Form->end(); ?>

     <div id="u6524" class="">
       <button type="button" onClick="window.location.href='/MstBranch';">戻る</button>
     </div>

     <div id="u6532" class="">
       <button type="button" onClick="window.location.href='/MstBranch/delete/<?= $mstBranch['id']?>';" style="background-color:rgba(255,153,0,1);">削 除</button>
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
          <option value="" disabled selected>メイン担当者</option>
          <?php foreach ($userData as $value):?>
          <?php if($value['handle']==='1'):?>
          <option value="<?= h($value['user_id'])?>" selected><?= h($value['user_name']) ?></option>
          <?php else:?>
          <option value="<?= h($value['user_id'])?>"><?= h($value['user_name']) ?></option>
          <?php endif;?>
          <?php endforeach;?>
        </select>
      </div>

<!-- start -->
<?php if(!empty($userData)):?>
	<div id="u6522" class="">
	<?php if (count($userData)!=0):?>
	<table class="list">
	<col span="6" width="20%">
	<thead>
		<tr>
			<th>ユーザーID</th>
			<th>ユーザー名</th>
			<th>メールアドレス</th>
			<th>役職</th>
			<th>メイン担当</th>
			<th></th>
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
				<button class="detail_button" type="button" onclick="submit();">詳細</button></form>
			</td>
		</tr>
		<?php endforeach;?>
		</tbody>
		</table>
	<?php endif;?>
<?php endif;?>
<!-- end -->
</div>
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
