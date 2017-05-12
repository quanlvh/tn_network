<?php $this->assign('title','ユーザー登録申請')?>
<?= $this->Html->css('UserMaster/regist/styles.css') ?>
<?= $this->Html->css('data/styles.css') ?>

<?= $this->Html->script('UserMaster/regist/data.js') ?>
<?= $this->Html->script('data/document.js') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<table class="table table-default table-bordered">
<!-- Begin Table Header -->
<thead>
<tr>
		<th colspan="4">宿泊先（機器設置先）情報</th>
</tr>
</thead>
<!-- Close Table Header -->
<!-- Begin Table Body -->
<tbody>
<!-- Begin Row 1 -->
<tr>
		<td width="20%">宿泊先</td>
		<td>テスト旅館</td>
</tr>
<!-- Close Row 1 -->

<!-- Begin Row 2 -->
<tr>
		<td width="20%">宿泊先住所</td>
		<td></td>
</tr>
<!--Close Row 2 -->

<!-- Begin Row 3 -->
<tr>
		<td width="20%">電話番号</td>
		<td>0000-000-000</td>
</tr>
<!--Close Row 3 -->

<!-- Begin Row 4 -->
<tr>
		<td width="20%">旅行会社名</td>
		<td>テスト旅館</td>
</tr>
<!--Close Row 4 -->

<!-- Begin Row 5 -->
<tr>
		<td width="20%">設置履歴 </td>
		<td></td>
</tr>
<!--Close Row 5 -->
</tbody>
<!-- Close Table Body -->
</table>


    <div id="base" class="">

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6254" class="ax_default line">
        <img id="u6254_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6255" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6252" class="ax_default heading_2">
        <div id="u6252_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6253" class="text">
          <p><span>ユーザー登録申請</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6256" class="ax_default line">
        <img id="u6256_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6257" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>
<?= $this->Form->create() ?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6265" class="ax_default label">
        <div id="u6265_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6266" class="text">
          <p><span>ユーザーID</span></p>
        </div>
      </div>

      <!-- User ID (Rectangle) -->
      <div id="u6286" class="ax_default label">
        <div id="u6286_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6287" class="text">
          <p><span>*必須</span></p>
        </div>
      </div>

      <!-- User ID (Text Field) -->
      <div id="u6264" class="ax_default text_field">
        <?= $this->Form->input('user_id',['label'=> false,'type'=>'text','placeholder'=>'半角で入力ください。','id'=>'u6264_input','required'=>true,'style'=>'ime-mode:disabled']) ?>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6265_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6270" class="ax_default label">
        <div id="u6270_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6271" class="text">
          <p><span>ユーザー名</span></p>
        </div>
      </div>

      <!-- User Name (Rectangle) -->
      <div id="u6288" class="ax_default label">
        <div id="u6288_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6289" class="text">
          <p><span>*必須</span></p>
        </div>
      </div>

      <!-- User Name (Text Field) -->
      <div id="u6269" class="ax_default text_field">
        <?= $this->Form->input('user_name',['label'=>false,'type'=>'text','id'=>'u6269_input','required'=>true]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6267" class="ax_default label">
        <div id="u6267_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6268" class="text">
          <p><span>メールアドレス1</span></p>
        </div>
      </div>

      <!-- Mail Addr (Rectangle) -->
      <div id="u6284" class="ax_default label">
        <div id="u6284_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6285" class="text">
          <p><span>*必須</span></p>
        </div>
      </div>

      <!-- Mail Addr (Text Field) -->
      <div id="u6272" class="ax_default text_field">
        <?= $this->Form->input('mail_addr_1',['label'=> false,'type'=>'text','id'=>'u6272_input','required'=>true]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6267a" class="ax_default label">
        <div id="u6267a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6268a" class="text">
          <p><span>メールアドレス2</span></p>
        </div>
      </div>

      <!-- Mail Addr (Rectangle) -->
      <div id="u6284a" class="ax_default label">
        <div id="u6284a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6285a" class="text">
          <p><span>*任意</span></p>
        </div>
      </div>

      <!-- Mail Addr (Text Field) -->
      <div id="u6272a" class="ax_default text_field">
        <?= $this->Form->input('mail_addr_2',['label'=> false,'type'=>'text','id'=>'u6272a_input','required'=>false]) ?>
      </div>


      <!-- Unnamed (Rectangle) -->
      <div id="u6273" class="ax_default label">
        <div id="u6273_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6274" class="text">
          <p><span>所属会社</span></p>
        </div>
      </div>

      <!-- 所属会社 (Rectangle) -->
      <div id="u6290" class="ax_default label">
        <div id="u6290_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6291" class="text">
          <p><span>*必須</span></p>
        </div>
      </div>

      <!-- 所属会社 (Text Field) -->
      <div id="u6282" class="ax_default text_field">
      <select class="parent" name="company_code" required>
        <option value="" class="msg" disabled selected>---所属会社の選択---</option>
      <?php foreach ($companies as $value):?>
      <?php if($value['company_code']===$post->company_code):?>
      <option value="<?= h($value['company_code']) ?>" selected><?= h($value['company_name'])?></option>
      <?php else:?>
        <option value="<?= h($value['company_code']) ?>"><?= h($value['company_name'])?></option>
        <?php endif;?>
      <?php endforeach;?>
      </select>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6273_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6275" class="ax_default label">
        <div id="u6275_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6276" class="text">
          <p><span>所属事業所</span></p>
        </div>
      </div>

      <!-- 所属事業所 (Rectangle) -->
      <div id="u6292" class="ax_default label">
        <div id="u6292_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6293" class="text">
          <p><span>*必須</span></p>
        </div>
      </div>

      <!-- 所属事業所 (Text Field) -->
      <div id="u6283" class="ax_default text_field">
      <select class="children" name="branch_code" disabled required>
        <option value="" class="msg" disabled selected>--所属事業所の選択--</option>
      <?php foreach ($branch as $val):?>
      <?php if ($val['branch_code'] === $post['branch_code']):?>
        <option value="<?= h($val['branch_code'])?>" data-val="<?= h($val['company_code']) ?>" selected><?= h($val['branch_name']) ?></option>
        <?php else:?>
        <option value="<?= h($val['branch_code'])?>" data-val="<?= h($val['company_code']) ?>"><?= h($val['branch_name']) ?></option>
        <?php endif;?>
      <?php endforeach;?>
      </select>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6275_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6277" class="ax_default label">
        <div id="u6277_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6278" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6279" class="ax_default label">
        <div id="u6279_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6280" class="text">
          <p><span>役職</span></p>
        </div>
      </div>

      <!-- 役職 (Text Field) -->
      <div id="u6281" class="ax_default text_field">
        <?= $this->Form->input('position',['label'=>false,'type'=>'text','id'=>'u6281_input']) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6262" class="ax_default button">
        <button id="u6262_div" class="" type="button" onclick="submit();">申請</button>
      </div>
      <?= $this->Form->hidden('password',['value'=> $tmp_pass]) ?>
      <?= $this->Form->hidden('password_conf',['value'=> $tmp_conf]) ?>
      <?= $this->Form->hidden('user_role',['value'=> $tmp_role]) ?>
      <?= $this->Form->hidden('applying',['value'=> $tmp_apply]) ?>
      <?= $this->Form->hidden('created_at',['value'=> $created_at]) ?>
<?= $this->Form->end() ?>
<?= $this->Html->script('Useres/add/select_work.js') ?>

      <!-- Unnamed (Rectangle) -->
      <div id="u6260" class="ax_default button" onclick="window.location.href='/Users/login';">
        <div id="u6260_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6261" class="text">
          <p><span>戻る</span></p>
        </div>
      </div>


    </div>
  </body>
