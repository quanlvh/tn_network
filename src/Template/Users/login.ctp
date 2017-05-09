    <?= $this->Html->css('jquery-ui-themes.css') ?>
    <?= $this->Html->css('axure_rp_page.css') ?>
    <?= $this->Html->css('data/styles.css') ?>
    <?= $this->Html->css('login.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->script('jquery-1.7.1.min.js') ?>
    <?= $this->Html->script('jquery-ui-1.8.10.custom.min.ja') ?>
    <?= $this->Html->script('prototyoePre.js') ?>
    <?= $this->Html->script('data/document.js') ?>
    <?= $this->Html->script('prototypePost.js') ?>
    <?= $this->Html->script('login/data.js') ?>

    <div id="base" class="">

      <form method="post" accept-charset="utf-8" action="/users/login">
      <div id="u0" class="ax_default button" style="">
      <!--
        <div id="u0_div" class="tabindex=0"></div>
        <div id="u1" class="text">
          <p><span>ログイン</span></p>
        </div>
        -->
        <button id="u0_div">ログイン</button>
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u2" class="ax_default text_field">
        <input id="user_id" name="user_id" type="text" placeholder="例）Sanso1234" value="" />
      </div>

      <!-- Unnamed (Text Field) -->
      <div id="u3" class="ax_default text_field">
        <input id="password" name="password" type="password" placeholder="例）ABCD1234" value="" />
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u14" class="ax_default heading_3">
        <div id="u14_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u15" class="text">
          <p><span>英数記号8桁以上のパスワードを入力してください。</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u16" class="ax_default label">
        <div id="u16_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u17" class="text">
          <p><span>ログインID</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u18" class="ax_default label">
        <div id="u18_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u19" class="text">
          <p><span>パスワード</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u20" class="ax_default icon">
        <!--  <img id="u20_img" class="img " src="../img/u20.png"/> -->
        <!-- Unnamed () -->
        <div id="u21" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>


<!-- add start -->
      <!-- Unnamed (Rectangle) -->
      <div id="u42" class="ax_default box_3" style="cursor: pointer;" onclick="window.location.href='/Users/regist';">
        <div id="u42_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u43" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u44" class="ax_default label" onclick="window.location.href='/Users/regist';">
        <div id="u44_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u45" class="text">
          <p><span>アカウントを</span></p><p><span>新規作成する</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u46" class="ax_default icon">
        <img id="u46_img" class="img " src="/img/u26.png"/>
        <!-- Unnamed () -->
        <div id="u47" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u48" class="ax_default icon">
        <img id="u48_img" class="img " src="/img/u28.png"/>
        <!-- Unnamed () -->
        <div id="u49" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u22" class="ax_default box_3">
        <div id="u22_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u23" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u24" class="ax_default label" onclick="window.location.href='/Users/remember';">
        <div id="u24_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u25" class="text">
          <p><span>パスワードを</span></p><p><span>お忘れの方はこちら</span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u26" class="ax_default icon">
        <img id="u26_img" class="img " src="/img/u26.png"/>
        <!-- Unnamed () -->
        <div id="u27" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Shape) -->
      <div id="u28" class="ax_default icon">
        <img id="u28_img" class="img " src="/img/u28.png"/>
        <!-- Unnamed () -->
        <div id="u29" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>


<!-- add end -->
    </div>
  </body>
</html>
