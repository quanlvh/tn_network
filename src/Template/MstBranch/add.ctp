<?php $this->assign('title','事業所情報登録')?>
<?= $this->Html->css('Branch/add/styles.css') ?>
<?= $this->Html->css('Branch/data/styles.css') ?>
<?= $this->Html->css('list.css')?>
<?= $this->Html->script('Branch/add/data.js') ?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u6430" class="ax_default heading_2">
        <div id="u6430_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6431" class="text">
          <p><span>事業所情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6432" class="ax_default line">
        <img id="u6432_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6433" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
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


      <!-- Unnamed (Rectangle) -->
      <div id="u6438" class="ax_default button" onclick="window.location.href='/MstBranch';">
        <div id="u6438_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6439" class="text">
          <p><span>戻る</span></p>
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
<?php echo $this->Form->create(); ?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6466" class="ax_default label">
        <div id="u6466_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6467" class="text">
          <p><span>
               <select id="company_code" name="company_code" required>
                 <option value="" disabled selected>-- 会社選択 --</option>
          <?php foreach ($companies as $value):?>
       <option value="<?= $value['company_code'] ?>"><?= $value['company_name'] ?></option>
          <?php endforeach;?>
    </select>
          </span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6440" class="ax_default button">
      <button type="submit" id="u6440_div">登録</button>
        <!-- <div id="u6440_div" class=""></div> -->
        <!-- Unnamed () -->
        <div id="u6441" class="text">
          <!-- <p><span>*登録</span></p> -->
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

      <!-- 事業所名 -->
      <div id="u6446" class="ax_default text_field">
      <?= $this->Form->input('branch_name',['type'=>'text','label'=>false,'id'=>'u6446_input','required'=>true]) ?>
      </div>

      <!-- 被仕向銀行名 -->
      <div id="u6521" class="ax_default label">
        <div id="u6521_div" class=""></div>
        <div id="u6522" class="text">
          <p><span>銀行名</span></p>
        </div>
      </div>

      <!-- 被仕向銀行名 -->
      <div id="u6523" class="ax_default text_field">
      <?= $this->Form->input('bank_name',['type'=>'text','label'=>false,'id'=>'u6523_input']) ?>
      </div>

      <!-- 被仕向支店名 -->
      <div id="u6536" class="ax_default label">
        <div id="u6536_div" class=""></div>
        <div id="u6537" class="text">
          <p><span>支店名</span></p>
        </div>
      </div>

      <!-- 被仕向支店名 -->
      <div id="u6538" class="ax_default text_field">
      <?= $this->Form->input('bank_branch_name',['type'=>'text','label'=>false,'id'=>'u6538_input']) ?>
      </div>

      <!-- 被仕向銀行番号 -->
      <div id="u6542" class="ax_default label">
        <div id="u6543_div" class=""></div>
        <div id="u6543" class="text">
          <p><span>銀行番号</span></p>
        </div>
      </div>

      <!-- 被仕向銀行番号 -->
      <div id="u6544" class="ax_default text_field">
      <?= $this->Form->input('bank_code',['type'=>'text','label'=>false,'id'=>'u6544_input','maxlength'=>'4']) ?>
      </div>

      <!-- 被仕向銀行支店番号 -->
      <div id="u6545" class="ax_default label">
        <div id="u6546_div" class=""></div>
        <div id="u6546" class="text">
          <p><span>支店番号</span></p>
        </div>
      </div>

      <!-- 被仕向銀行支店番号 -->
      <div id="u6547" class="ax_default text_field">
      <?= $this->Form->input('bank_branch_code',['type'=>'text','label'=>false,'id'=>'u6547_input','maxlength'=>'3']) ?>
      </div>

      <!-- 口座番号 -->
      <div id="u6548" class="ax_default label">
        <div id="u6549_div" class=""></div>
        <div id="u6549" class="text">
          <p><span>口座番号</span></p>
        </div>
      </div>

      <!-- 口座番号 -->
      <div id="u6550" class="ax_default text_field">
      <?= $this->Form->input('account_number',['type'=>'text','label'=>false,'id'=>'u6550_input','maxlength'=>'7']) ?>
      </div>

      <!-- 預金種目 -->
      <div id="u6551" class="ax_default label">
        <div id="u6552_div" class=""></div>
        <div id="u6552" class="text">
          <p><span>預金種目</span></p>
        </div>
      </div>

      <!-- 預金種目 -->
      <div id="u6553" class="ax_default text_field">
      <?= $this->Form->radio('deposit_type',[['text'=>'普通預金','value'=>'1'],['text'=>'当座預金','value'=>'2'],['text'=>'貯蓄預金','value'=>'4'],['text'=>'その他','value'=>'9'],]) ?>
      </div>

      <!-- 受取人名 -->
      <div id="u6554" class="ax_default label">
        <div id="u6555_div" class=""></div>
        <div id="u6555" class="text">
          <p><span>受取人名</span></p>
        </div>
      </div>

      <!-- 受取人名 -->
      <div id="u6556" class="ax_default text_field">
      <?= $this->Form->input('recipient_name',['type'=>'text','label'=>false,'id'=>'u6556_input','maxlength'=>'30']) ?>
      </div>

      <!-- 請求書送付先住所 -->
      <div id="u6524" class="ax_default label">
        <div id="u6524_div" class=""></div>
        <div id="u6525" class="text">
          <p><span>請求書送付先住所</span>
        </div>
      </div>

      <!-- 請求書送付先住所 -->
      <div id="u6526" class="ax_default text_field">
      <?= $this->Form->input('invoice_shipping_address',['type'=>'text','label'=>false,'id'=>'u6525_input'])?>
      </div>
      <!-- Unnamed (Rectangle) -->
      <div id="u6453" class="ax_default label">
        <div id="u6453_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6454" class="text">
          <p><span>電話番号</span></p>
        </div>
      </div>

      <!-- Branch Tel (Text Field) -->
      <div id="u6452" class="ax_default text_field">
      <?= $this->Form->input('branch_tel',['type'=>'tel','label'=>false,'id'=>'u6452_input']) ?>
      </div>

      <!-- Branch Fax (Rectangle) -->
      <div id="u6444" class="ax_default label">
        <div id="u6444_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6445" class="text">
          <p><span>FAX番号</span></p>
        </div>
      </div>

      <!-- Branch Fax (Text Field) -->
      <div id="u6451" class="ax_default text_field">
      <?= $this->Form->input('branch_fax',['type'=>'tel','label'=>false,'id'=>'u6451_input']) ?>
      </div>

      <!-- Branch Fax (Rectangle) -->
      <div id="u6444a" class="ax_default label">
        <div id="u6444a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6445a" class="text">
          <p><span>FAX通知</span></p>
        </div>
      </div>

      <!-- Fax要否 -->
      <div id="u6527" class="ax_default label">
      <?= $this->Form->radio('is_receive_fax',[['text'=>'要','value'=>'1'],['text'=>'否','value'=>'0'],]) ?>
      </div>

      <!-- 郵便番号 (Rectangle) -->
      <div id="u6455" class="ax_default label">
        <div id="u6455_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6456" class="text">
          <p><span>郵便番号</span></p>
        </div>
      </div>

      <!-- 郵便番号 (Text Field) -->
      <div id="u6468" class="ax_default text_field">
        <input id="u6468_input" type="number" placeholder="ハイフンなしで入力してください" style="ime-mode:disabled;" name="branch_zip_code" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','branch_pref_code','branch_addr');" />
      </div>

      <!-- 住所 (Rectangle) -->
      <div id="u6457" class="ax_default label">
        <div id="u6457_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6458" class="text">
          <p><span>住所</span></p>
        </div>
      </div>

     <!-- 都道府県 (Text Field) -->
      <div id="u6469a" class="ax_default text_field">
      <select name="branch_pref_code" id="u6469a_input" class="">
      <option value="" disabled selected>-- 都道府県 --</option>
      <?php foreach ($prefCode as $value):?>
      <option value="<?= $value['pref_code'] ?>"><?= $value['pref_name'] ?></option>
      <?php endforeach;?>
      </select>
      <!--<?= $this->Form->input('branch_addr',['type'=>'text','label'=>false,'id'=>'u6469_input']) ?>-->
      </div>

     <!-- 住所 市区町村(Text Field) -->
      <div id="u6469" class="ax_default text_field">
      <?= $this->Form->input('branch_addr',['type'=>'text','label'=>false,'id'=>'u6469_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6449_ann" class="annotation"></div>

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
        <?= $this->Form->input('paid',['type'=>'checkbox','label'=>false,'id'=>'u6519_input']) ?>
      </div>


      <!-- Unnamed (Horizontal Line) -->
      <div id="u6515" class="ax_default line">
        <img id="u6515_img" class="img " src="/img/u6515.png"/>
        <!-- Unnamed () -->
        <div id="u6516" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- 郵便番号 (Rectangle) -->
      <div id="u6528" class="ax_default label">
        <div id="u6528_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6529" class="text">
          <p><span>返送先郵便番号</span></p>
        </div>
      </div>

      <!-- 郵便番号 (Text Field) -->
      <div id="u6530" class="ax_default text_field">
        <input id="u6530_input" type="number" placeholder="ハイフンなしで入力してください" style="ime-mode:disabled;" name="return_zip_code" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','return_address','return_address');" />
      </div>

      <!-- 住所 (Rectangle) -->
      <div id="u6531" class="ax_default label">
        <div id="u6531_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6532" class="text">
          <p><span>機器返送先住所</span></p>
        </div>
      </div>

     <!-- 住所 (Text Field) -->
      <div id="u6534" class="ax_default text_field">
      <?= $this->Form->input('return_address',['type'=>'text','label'=>false,'id'=>'u6534_input']) ?>
      </div>
<?= $this->Form->hidden('branch_code',['value'=>$branch_code]) ?>
<?php $this->Form->end();?>

      <!-- Unnamed (Rectangle) -->
      <div id="u6470" class="ax_default button">
        <div id="u6470_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6471" class="text">
          <p><span>郵便番号から住所を検索</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6535" class="ax_default button">
        <div id="u6535_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6471" class="text">
          <p><span>郵便番号から住所を検索</span></p>
        </div>
      </div>

    </div>
  </body>