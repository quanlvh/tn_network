<?php $this->assign('title','パスワード再発行処理')?>
<?= $this->Html->css('UserMaster/remember/styles.css') ?>
<?= $this->Html->css('data/styles.css') ?>
<?= $this->Html->script('UserMaster/remember/data.js') ?>
<?= $this->Html->script('data/document.js') ?>

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
          <p><span>パスワード再発行申請</span></p>
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
        <?= $this->Form->input('user_id',['label'=> false,'type'=>'text','pattern'=>'[a-zA-Z0-9_-.]','placeholder'=>'半角で入力ください。','id'=>'u6264_input','required'=>true,'style'=>'ime-mode:disabled']) ?>
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
        <?= $this->Form->input('mail_addr_1',['label'=> false,'type'=>'email','id'=>'u6272_input','required'=>true]) ?>
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
      <div id="u6262" class="ax_default button">
        <button id="u6262_div" class="" type="button" onclick="submit();">再 発 行</button>
      </div>
<?= $this->Form->end() ?>

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
