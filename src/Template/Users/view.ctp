<?php $this->assign('title','ユーザマスタ登録')?>
<?= $this->Html->css('data/styles.css') ?>
<?= $this->Html->css('UserMaster/view/styles.css') ?>
<?= $this->Html->script('UserMaster/view/data.js') ?>
  <body>
    <div id="base" class="">

      <!-- Unnamed (Rectangle) -->
      <div id="u6181" class="ax_default heading_2">
        <div id="u6181_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6182" class="text">
          <p><span>ユーザー情報メンテナンス</span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6183" class="ax_default line">
        <img id="u6183_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6184" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- Unnamed (Horizontal Line) -->
      <div id="u6185" class="ax_default line">
        <img id="u6185_img" class="img " src="/img/u76.png"/>
        <!-- Unnamed () -->
        <div id="u6186" class="text" style="display:none; visibility: hidden">
          <p><span></span></p>
        </div>
      </div>

      <!-- ユーザーID (Rectangle) -->
      <div id="u6194" class="ax_default label">
        <div id="u6194_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6195" class="text">
          <p><span>ユーザーID</span></p>
        </div>
      </div>
<?= $this->Form->create($users) ?>
      <!-- User ID (Text Field) -->
      <div id="u6193" class="ax_default text_field">
        <?= $this->Form->input("user_id",['type'=>'text','label'=>false]);?>
      </div>

      <!-- ユーザ名(Rectangle) -->
      <div id="u6199" class="ax_default label">
        <div id="u6199_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6200" class="text">
          <p><span>ユーザー名</span></p>
        </div>
      </div>

      <!-- User Name (Text Field) -->
      <div id="u6198" class="ax_default text_field">
        <?= $this->Form->input("user_name",['type'=>'text','label'=>false]) ?>
      </div>

      <!-- メールアドレス (Rectangle) -->
      <div id="u6196" class="ax_default label">
        <div id="u6196_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6197" class="text">
          <p><span>メールアドレス1</span></p>
        </div>
      </div>

      <!-- Mail Address (Text Field) -->
      <div id="u6201" class="ax_default text_field">
        <?= $this->Form->input("mail_addr_1",['type'=>'text','label'=>false]) ?>
      </div>

      <!-- メールアドレス (Rectangle) -->
      <div id="u6196a" class="ax_default label">
        <div id="u6196a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6197a" class="text">
          <p><span>メールアドレス2</span></p>
        </div>
      </div>

      <!-- Mail Address (Text Field) -->
      <div id="u6201a" class="ax_default text_field">
        <?= $this->Form->input("mail_addr_2",['type'=>'text','label'=>false]) ?>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6205" class="ax_default label">
        <div id="u6205_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6206" class="text">
          <p><span>権限</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6205_ann" class="annotation"></div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6207" class="ax_default radio_button">
        <label for="u6207_input">
          <!-- Unnamed () -->
          <div id="u6208" class="text">
            <p><span>事務局本部</span></p>
          </div>
        </label>
        <?php if ($users['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE): ?>
        <input id="u6207_input" type="radio" value="1" name="user_role" checked />
        <?php else:?>
        <input id="u6207_input" type="radio" value="1" name="user_role"/>
        <?php endif;?>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6209" class="ax_default radio_button">
        <label for="u6209_input">
          <!-- Unnamed () -->
          <div id="u6210" class="text">
            <p><span>事務局支社</span></p>
          </div>
        </label>
        <?php if ($users['user_role'] == ROLE_EXECUTIVE_BRANCH_OFFICE): ?>
        <input id="u6209_input" type="radio" value="3" name="user_role" checked />
        <?php else:?>
        <input id="u6209_input" type="radio" value="3" name="user_role" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6213" class="ax_default radio_button">
        <label for="u6213_input">
          <!-- Unnamed () -->
          <div id="u6214" class="text">
            <p><span>事務局MTSC</span></p>
          </div>
        </label>
        <?php if ($users['user_role'] == ROLE_MTSC): ?>
        <input id="u6213_input" type="radio" value="2" name="user_role" checked />
        <?php else:?>
        <input id="u6213_input" type="radio" value="2" name="user_role" />
        <?php endif;?>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6211" class="ax_default radio_button">
        <label for="u6211_input">
          <!-- Unnamed () -->
          <div id="u6212" class="text">
            <p><span>販売店</span></p>
          </div>
        </label>
        <?php if ($users['user_role'] == ROLE_STORE):?>
        <input id="u6211_input" type="radio" value="4" name="user_role" checked />
        <?php else:?>
        <input id="u6211_input" type="radio" value="4" name="user_role" />
        <?php endif;?>
      </div>

       <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6194_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6215" class="ax_default label">
        <div id="u6215_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6216" class="text">
          <p><span>所属会社</span></p>
        </div>
      </div>
<?php if ( ($user['user_role'] == ROLE_STORE) or ($user['user_role'] == ROLE_EXECUTIVE_BRANCH_OFFICE) ):?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6236" class="ax_default label">
        <div id="u6236_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6237" class="text">
        <select class="parent" name="company_code" disabled required>
          <option value="" class="msg" disabled selected>-- 所属会社 --</option>
          <?php foreach ($mst_companies2 as $value):?>
          <?php if ($users['company_code'] == $value['company_code']):?>
          <option value="<?= h($value['company_code']) ?>" selected><?= h($value['company_name']) ?></option>
          <?php else:?>
          <option value="<?= h($value['company_code']) ?>"><?= h($value['company_name']) ?></option>
          <?php endif;?>
          <?php endforeach;?>
        </select>
        </div>
      </div>
<?php else:?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6236" class="ax_default label">
        <div id="u6236_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6237" class="text">
        <select class="parent" name="company_code" required>
          <option value="" class="msg" disabled selected>-- 所属会社 --</option>
          <?php foreach ($mst_companies2 as $value):?>
          <?php if ($users['company_code'] == $value['company_code']):?>
          <option value="<?= h($value['company_code']) ?>" selected><?= h($value['company_name']) ?></option>
          <?php else:?>
          <option value="<?= h($value['company_code']) ?>"><?= h($value['company_name']) ?></option>
          <?php endif;?>
          <?php endforeach;?>
        </select>
        </div>
      </div>
<?php endif;?>
      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6215_ann" class="annotation"></div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6217" class="ax_default label">
        <div id="u6217_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6218" class="text">
          <p><span>所属事業所</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6217_ann" class="annotation"></div>
<?php if ( ($user['user_role'] == ROLE_STORE) or ($user['user_role'] == ROLE_EXECUTIVE_BRANCH_OFFICE) ):?>
      <!-- Unnamed (Droplist) -->
      <div id="u6219" class="ax_default droplist">
      <select class="children" name="branch_code" required>
        <option value="" class="msg" disabled selected>-- 所属事業所 --</option>
        <?php foreach ($mst_branch_offices2 as $val):?>
        <?php if ($users['branch_code'] == $val['branch_code']):?>
        <option value="<?= h($val['branch_code']) ?>" data-val="<?= h($val['company_code']) ?>" selected><?= h($val['branch_name']) ?></option>
        <?php else:?>
        	<?php if ($users['company_code'] == $val['company_code']):?>
        <option value="<?= h($val['branch_code']) ?>" data-val="<?= h($val['company_code']) ?>"><?= h($val['branch_name']) ?></option>
        	<?php endif;?>
        <?php endif;?>
        <?php endforeach;?>
      </select>
      </div>
<?php else:?>
      <!-- Unnamed (Droplist) -->
      <div id="u6219" class="ax_default droplist">
      <select class="children" name="branch_code" disabled required>
        <option value="" class="msg" disabled selected>-- 所属事業所 --</option>
        <?php foreach ($mst_branch_offices2 as $val):?>
        <?php if ($users['branch_code'] == $val['branch_code']):?>
        <option value="<?= h($val['branch_code']) ?>" data-val="<?= h($val['company_code']) ?>" selected><?= h($val['branch_name']) ?></option>
        <?php else:?>
        <option value="<?= h($val['branch_code']) ?>" data-val="<?= h($val['company_code']) ?>"><?= h($val['branch_name']) ?></option>
        <?php endif;?>
        <?php endforeach;?>
      </select>
      </div>

<?php endif;?>
      <!-- 役職 (Rectangle) -->
      <div id="u6228" class="ax_default label">
        <div id="u6228_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6229" class="text">
          <p><span>役職</span></p>
        </div>
      </div>

      <!-- Position (Text Field) -->
      <div id="u6230" class="ax_default text_field">
        <!-- <input id="u6230_input" type="text" value=""/> -->
        <?= $this->Form->input('position',['type'=>'text','label'=>false]) ?>
      </div>

<?php if ($users->applying === '1'):?>
      <!-- Unnamed (Rectangle) -->
      <div id="u6240" class="ax_default label">
        <div id="u6240_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6241" class="text">
          <p><span>アカウント作成</span></p>
        </div>
      </div>

      <!-- Unnamed (Radio Button) -->
      <div id="u6238" class="ax_default radio_button">
        <label for="u6238_input">
          <!-- Unnamed () -->
          <div id="u6239" class="text">
            <p><span>申請中</span></p>
          </div>
        </label>
        <?php if ($users->applying === '1'):?>
        <input id="u6222_input" type="radio" name="applying" value="1" checked />
        <?php else:?>
        <input id="u6222_input" type="radio" name="applying" value="1" />
        <?php endif;?>
      </div>

            <!-- Unnamed (Radio Button) -->
      <div id="u6242" class="ax_default radio_button">
        <label for="u6242_input">
          <!-- Unnamed () -->
          <div id="u6243" class="text">
            <p><span>登録完了</span></p>
          </div>
        </label>
        <?php if ($users->applying === '2'):?>
        <input id="u6224_input" type="radio" name="applying" value="2" checked />
        <?php else:?>
        <input id="u6224_input" type="radio" name="applying" value="2" />
        <?php endif;?>
      </div>

<?php endif;?>

      <div id="u6191" class="ax_default button">
        <button type="submit" style="background-color:rgba(255, 153, 0, 1);">更新</button>
      </div>
<?= $this->Form->hidden('id',['value'=>$users->id]) ?>
<?= $this->Form->end(); ?>
<?= $this->Html->script('Useres/add/select_work.js') ?>
     <!-- Unnamed (Rectangle) -->
      <div id="u6189" class="ax_default button">
        <div id="u6189_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6190" class="text" onclick="window.location.href='/Users/find';">
          <p><span>戻る</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) -->
      <div id="u6234" class="ax_default button" onClick="window.location.href='/Users/delete/<?= $users->id ?>';">
        <div id="u6234_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6235" class="text">
          <p><span>削除</span></p>
        </div>
      </div>

      <!-- Unnamed (Rectangle) [footnote] -->
      <div id="u6234_ann" class="annotation"></div>

    </div>
  </body>


