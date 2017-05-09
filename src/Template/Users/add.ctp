<?php $this->assign('title', 'ユーザマスタ登録') ?>
<?= $this->Html->css('UserMaster/styles.css') ?>
<?= $this->Html->css('data/styles.css') ?>
<?= $this->Html->script('UserMaster/data.js') ?>
<?= $this->Html->script('data/document.js') ?>
<?= $this->Html->script('UserMaster/useradd.js') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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
    <?= $this->Form->create() ?>
    <!-- User ID (Rectangle) -->
    <div id="u6194" class="ax_default label">
        <div id="u6194_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6195" class="text">
            <p><span>ユーザーID</span></p>
        </div>
    </div>

    <!-- User ID (Text Field) -->
    <div id="u6193" class="ax_default text_field">
        <?= $this->Form->input('user_id', [
            'type' => 'text',
            'id' => 'u6193_input',
            'label' => false,
            'placeholder' => '半角で入力ください。',
            'style' => 'ime-mode:disabled',
            'required' => true
        ]) ?>
    </div>

    <!-- User Name (Rectangle) -->
    <div id="u6199" class="ax_default label">
        <div id="u6199_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6200" class="text">
            <p><span>ユーザー名</span></p>
        </div>
    </div>

    <!-- User Name (Text Field) -->
    <div id="u6198" class="ax_default text_field">
        <?= $this->Form->input('user_name',
            ['type' => 'text', 'id' => 'u6198_input', 'label' => false, 'required' => true]) ?>
    </div>

    <!-- Password (Rectangle) -->
    <div id="u6203" class="ax_default label">
        <div id="u6203_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6204" class="text">
            <p><span>パスワード</span></p>
        </div>
    </div>

    <!-- Password (Text Field) -->
    <div id="u6202" class="ax_default text_field">
        <?= $this->Form->input('password',
            ['type' => 'password', 'id' => 'u6202_input', 'label' => false, 'required' => false]) ?>
    </div>

    <!-- Confirmation password (Rectangle) -->
    <div id="u6232" class="ax_default label">
        <div id="u6232_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6233" class="text">
            <p><span>確認用パスワード</span></p>
        </div>
    </div>

    <!-- Confirmation password (Text Field) -->
    <div id="u6231" class="ax_default text_field">
        <?= $this->Form->input('password_conf',
            ['type' => 'password', 'id' => 'u6231_input', 'label' => false, 'required' => false]) ?>
    </div>

    <!-- Unnamed (Rectangle) [footnote] -->
    <div id="u6194_ann" class="annotation"></div>

    <!-- Mail Address (Rectangle) -->
    <div id="u6196" class="ax_default label">
        <div id="u6196_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6197" class="text">
            <p><span>メールアドレス1</span></p>
        </div>
    </div>

    <!-- Mail Address (Text Field) -->
    <div id="u6201" class="ax_default text_field">
        <?= $this->Form->input('mail_addr_1',
            ['type' => 'email', 'id' => 'u6201_input', 'label' => false, 'required' => true]) ?>
    </div>

    <!-- Mail Address (Rectangle) -->
    <div id="u6196a" class="ax_default label">
        <div id="u6196a_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6197a" class="text">
            <p><span>メールアドレス2</span></p>
        </div>
    </div>

    <!-- Mail Address (Text Field) -->
    <div id="u6201a" class="ax_default text_field">
        <?= $this->Form->input('mail_addr_2',
            ['type' => 'email', 'id' => 'u6201a_input', 'label' => false, 'required' => true]) ?>
    </div>

    <!-- Authority (Rectangle) -->
    <div id="u6205" class="ax_default label">
        <div id="u6205_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6206" class="text">
            <p><span>権限</span></p>
        </div>
    </div>

    <style>
        #u6207 label:before {
            white-space: pre;
        }
    </style>

    <!-- Unnamed (Radio Button) -->
    <div id="u6207" class="ax_default radio_button">

        <?= $this->Form->radio('user_role', [
            ['value' => '1', 'text' => '事務局本部'],
            ['value' => '3', 'text' => '事務局支社'],
            ['value' => '4', 'text' => '販売店'],
            ['value' => '2', 'text' => '事務局MTSC']
        ]) ?>


        <!--<?= $this->Form->radio('user_role', ['value' => '1'], ['label' => false]) ?>-->
    </div>


    <!-- Unnamed (Rectangle) [footnote] -->
    <div id="u6205_ann" class="annotation"></div>


    <!-- Unnamed (Rectangle) -->
    <div id="u6215" class="ax_default label">
        <div id="u6215_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6216" class="text">
            <p><span>所属会社</span></p>
        </div>
    </div>

    <!-- 所属会社 (Rectangle) -->
    <div id="u6236" class="ax_default label">
        <div id="u6236_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6237" class="text">
            <select class="parent" name="company_code" required>
                <option value="" class="msg" disabled selected>---所属会社の選択---</option>
                <?php foreach ($mst_companies as $value): ?>
                    <option value="<?= h($value['company_code']) ?>"><?= h($value['company_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <!-- 所属事業所 (Rectangle) [footnote] -->
    <div id="u6215_ann" class="annotation"></div>

    <!-- Unnamed (Rectangle) -->
    <div id="u6217" class="ax_default label">
        <div id="u6217_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6218" class="text">
            <p><span>所属事業所</span></p>
        </div>
    </div>

    <!-- Unnamed (Droplist) -->
    <div id="u6219" class="ax_default droplist">
        <select class="children" name="branch_code" disabled required>
            <option value="" class="msg" disabled selected>--所属事業所の選択--</option>
            <?php foreach ($mst_branch_offices as $val): ?>
                <option value="<?= h($val['branch_code']) ?>"
                        data-val="<?= h($val['company_code']) ?>"><?= h($val['branch_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Position (Rectangle) -->
    <div id="u6228" class="ax_default label">
        <div id="u6228_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6229" class="text">
            <p><span>役職</span></p>
        </div>
    </div>

    <!-- Position (Text Field) -->
    <div id="u6230" class="ax_default text_field">
        <input id="u6230_input" type="text" name="position" value=""/>
    </div>

    <!-- Unnamed (Rectangle) [footnote] -->
    <div id="u6217_ann" class="annotation"></div>


    <!-- Unnamed (Rectangle) -->
    <div id="u6226" class="ax_default label">
        <div id="u6226_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6227" class="text" style="display:none; visibility: hidden">
            <p><span></span></p>
        </div>
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u6191" class="ax_default button">
        <button id="u6191_div" type="submit">登録</button>
    </div>
    <?= $this->Form->hidden('company_code', ['value' => $users['company_code']]) ?>
    <?= $this->Form->hidden('branch_code', ['value' => $users['branch_code']]) ?>
    <?= $this->Form->end() ?>
    <?= $this->Html->script('Useres/add/select_work.js') ?>
    <!-- Unnamed (Rectangle) -->
    <div id="u6189" class="ax_default button" onClick="window.location.href='/Users/find';">
        <div id="u6189_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6190" class="text">
            <p><span>戻る</span></p>
        </div>
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u6234" class="ax_default button">
        <div id="u6234_div" class=""></div>
        <!-- Unnamed () -->
        <div id="u6235" class="text">
            <p><span>削除</span></p>
        </div>
    </div>

    <!-- Unnamed (Rectangle) [footnote] -->
    <div id="u6234_ann" class="annotation"></div>


</div>
