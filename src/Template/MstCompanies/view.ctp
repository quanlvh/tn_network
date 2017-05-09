<?php $this->assign('title', '会社情報メンテナンス')?>
<?= $this->Html->css('data/styles.css') ?>
<?= $this->Html->css('Companies/view/styles.css') ?>
<?= $this->Html->script('Companies/view/data.js') ?>
<?= $this->Html->script('Companies_add/data.js') ?>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u6666" class="ax_default heading_2">
        <div id="u6666_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6667" class="text">
          <p><span>会社情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6668" class="ax_default line">
        <img id="u6668_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6669" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6670" class="ax_default line">
        <img id="u6670_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6671" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6678" class="ax_default label">
        <div id="u6678_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6679" class="text">
          <p><span>会社コード</span></p>
        </div>
      </div>
<?= $this->Form->create($mstCompany) ?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6697" class="ax_default label">
        <div id="u6697_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6698" class="text">
          <p><span><?= $mstCompany['company_code'] ?></span></p>
        </div>
      </div>

     <!-- Unnamed (Rectangle) -->
      <div id="u6683" class="ax_default label">
        <div id="u6683_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6684" class="text">
          <p><span>会社名</span></p>
        </div>
      </div>

      <!-- Company Name (Text Field) -->
      <div id="u6682" class="ax_default text_field">
      <?= $this->Form->input('company_name',['type'=>'text','id'=>'u6682_input','label'=>'','value'=>$mstCompany['company_name']]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6699" class="ax_default label">
        <div id="u6699_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6700" class="text">
          <p><span>郵便番号</span></p>
        </div>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u6701" class="ax_default text_field">
      <?= $this->Form->input('zip_code',['type'=>'text','id'=>'u6701_input','label'=>'','value'=>$mstCompany['zip_code'],'placeholder'=>'ハイフンなしで入力してください','maxlength'=>'8','onKeyUp'=>"AjaxZip3.zip2addr(this,'','pref_code','company_addr');"]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6702" class="ax_default button">
        <div id="u6702_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6703" class="text">
          <p><span>郵便番号から住所を検索</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6687" class="ax_default label">
        <div id="u6687_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6688" class="text">
          <p><span>住所</span></p>
        </div>
      </div>

      <!-- Company addr (Text Field) -->
      <div id="u6686a" class="ax_default text_field">
      <select name="pref_code" id="u6686a_input">
      <option value="" disabled selected>-- 都道府県 --</option>
      <?php foreach ($prefCode as $value):?>
      <?php if($value['pref_code']===$mstCompany['pref_code']):?>
      <option value="<?= h($value['pref_code'])?>" selected><?= h($value['pref_name']) ?></option>
      <?php else:?>
      <option value="<?= h($value['pref_code'])?>"><?= h($value['pref_name'])?></option>
      <?php endif;?>
      <?php endforeach;?>
      </select>
      </div>

      <!-- Company addr (Text Field) -->
      <div id="u6686" class="ax_default text_field">
      <?= $this->Form->input('company_addr',['type'=>'text','id'=>'u6686_input','placeholder'=>'市区町村以下','label'=>false,'value'=>$mstCompany['company_addr']]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6680" class="ax_default label">
        <div id="u6680_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6681" class="text">
          <p><span>電話番号</span></p>
        </div>
      </div>

       <!-- Company tel (Text Field) -->
      <div id="u6685" class="ax_default text_field">
      <?= $this->Form->input('company_tel',['type'=>'text','id'=>'u6685_input','placeholder'=>'ハイフンなしで入力してください','label'=>false,'value'=>$mstCompany['company_tel']]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6689" class="ax_default label">
        <div id="u6689_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6690" class="text">
          <p><span>会員区分</span></p>
        </div>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6691" class="ax_default radio_button">
        <label for="u6691_input">
          <!-- Unnamed () -->
          <div id="u6692" class="text">
            <p><span>会員</span></p>
          </div>
        </label>
        <?php if ($mstCompany['member_flg']==='1'):?>
        <input id="u6691_input" type="radio" value="1" name="member_flg" checked />
        <?php else:?>
        <input id="u6691_input" type="radio" value="1" name="member_flg" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6693" class="ax_default radio_button">
        <label for="u6693_input">
          <!-- Unnamed () -->
          <div id="u6694" class="text">
            <p><span>非会員</span></p>
          </div>
        </label>
        <?php if ($mstCompany['member_flg']==='0'):?>
        <input id="u6693_input" type="radio" value="0" name="member_flg" checked />
        <?php else:?>
        <input id="u6693_input" type="radio" value="0" name="member_flg" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6695" class="ax_default label">
        <div id="u6695_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6696" class="text">
          <p><span>代表者氏名</span></p>
        </div>
      </div>


      <!-- 代表者氏名 (Text Field) -->
      <div id="u6704" class="ax_default text_field">
      <?= $this->Form->input('name_of_representative',['type'=>'text','id'=>'u6704_input','label'=>'','value'=>$mstCompany['name_of_representative']]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6705" class="ax_default label">
        <div id="u6705_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6706" class="text">
          <p><span>代表者役職</span></p>
        </div>
      </div>

      <!-- 代表者役職 (Text Field) -->
      <div id="u6707" class="ax_default text_field">
      <?= $this->Form->input('position_of_representative',['type'=>'text','id'=>'u6707_input','label'=>'','value'=>$mstCompany['position_of_representative']]) ?>
      </div>
    </div>

      <!-- Unnamed (Rectangle) --><!--
      <div id="u6676" class="ax_default button" onclick="window.location.href='/MstCompanies/edit/<?= $mstCompany['id']?>';">
        <div id="u6676_div" class=""></div>-->
        <!-- Unnamed () --><!--
        <div id="u6677" class="text">
          <p><span>更新</span></p>
        </div>
      </div>-->
      <div id="u6676" class="ax_default button">
      	<div id="u6677" class="text">
      		<button type="button" onClick="submit();" style="background-color:rgba(255, 153, 0, 1);">更 新</button>
      	</div>
      </div>

<?= $this->Form->end() ?>

      <!-- Unnamed (Rectangle) -->
      <div id="u6674" class="ax_default button" onclick="window.location.href='/MstCompanies';">
        <div id="u6674_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6675" class="text">
          <p><span>戻る</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6712" class="ax_default button" onclick="window.location.href='/MstCompanies/delete/<?= $mstCompany['id'] ?>';">
        <div id="u6712_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6713" class="text">
          <p><span>削 除</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6708" class="ax_default label">
        <div id="u6708_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6709" class="text">
          <p><span>所属する事業所</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6710" class="ax_default line">
        <img id="u6710_img" class="img " src="/img/u6515.png"/>
        <!-- Unnamed () -->
        <div id="u6711" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>
      <!-- start -->
<?php if (!empty($BranchData)):?>
      <div id="u6711" class="">
      <?php if (count($BranchData)!=0):?>
      <table class="list">
      <col span="6" width="20%">
      <thead>
      	<tr>
      		<th>事業所コード</th>
      		<th>事業所名</th>
      		<th>住所</th>
      		<th>電話番号</th>
      		<th>Paid登録</th>
      	</tr>
      </thead>
      <tbody>
      <?php foreach ($BranchData as $value):?>
      	<tr>
      		<td><?= h($value['branch_code']) ?></td>
      		<td><?= h($value['branch_name']) ?></td>
      		<td><?= h($value['branch_addr']) ?></td>
      		<td><?= h($value['branch_tel']) ?></td>
      		<?php if ($value['paid']==='1'):?>
      		<td>済</td>
      		<?php else:?>
      		<td>未</td>
      		<?php endif;?>
      		<td>
      			<form method="post" action="/MstBranch/edit/<?= $value['id'] ?>">
      				<button class="detail_button" type="submit">詳細</button>
      			</form>
      		</td>
      	</tr>
      <?php endforeach;?>
      </tbody>
      </table>
      <?php endif;?>
      </div>
<?php endif;?>
      <!-- end -->

  </body>
