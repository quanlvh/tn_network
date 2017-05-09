<?= $this->Html->css('requests.css'); ?>
<?= $this->Html->script('requests.js', array('inline' => false)); ?>

<?php $this->assign('title', '旅行対応依頼入力（依頼先検索）'); ?>

<div class="top_title">
    <span class="title">旅行対応依頼入力</span>
</div>
<div class="main_content">
    <!--state-->
    <table id='state_table'>
        <colgroup>
            <col width='20%'>
            <col width='20%'>
            <col width='20%'>
            <col width='20%'>
            <col width='20%'>
        </colgroup>
        <tr>
            <td style="background-image: url('/img/arrow02.png');">
                <div>依頼先入力</div>
            </td>
            <td>
                <div>利用約款の承諾</div>
            </td>
            <td>
                <div>依頼内容入力</div>
            </td>
            <td>
                <div>入力内容確認</div>
            </td>
            <td>
                <div>完了</div>
            </td>
        </tr>
    </table>
    <form name="form_pref" method="post"
          action="<?= $this->url->build(['controller' => 'requests', 'action' => 'map']) ?>">
        <div class="top_title">
            <span class="title">宿泊先の住所から探す</span>
        </div>
        <select id="search_pref" name="pref_code" style="width: 100px;">
            <?php foreach ($pref as $val): ?>
                <option value="<?= $val['pref_code'] ?>"><?= $val['pref_name'] ?></option>
            <?php endforeach; ?>
        </select>

        <select id="search_area" name="area_code" style="width: 150px;">
        </select>
        <?= $this->Form->input('address', ['label' => false, 'placeholder' => '番地']) ?>

        <?= $this->Form->hidden('branch_code') ?>

        <?= $this->Form->button('検索') ?>
    </form>

    <form name="form_pref" method="post"
          action="<?= $this->url->build(['controller' => 'requests', 'action' => 'city']) ?>">
        <?= $this->Form->hidden('pref_code') ?>
        <?= $this->Form->hidden('branch_code') ?>
        <div class="top_title">
            <span class="title">都道府県から選ぶ</span>
        </div>
        <table style="width:100%;text-align: left;">
            <tr>
                <th style="background-color:#ddddff;">北海道・東北</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['01', '02', '03', '04', '05', '06', '07'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">関東</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['08', '09', '10', '11', '12', '13', '14', '19', ''])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">信越・北陸</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['15', '16', '17', '18', '20'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">東海</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['21', '22', '23', '24'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">近畿</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['25', '26', '27', '28', '29', '30'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">中国</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['31', '32', '33', '34', '35'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">四国</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['36', '37', '38', '39'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th style="background-color:#ddddff;">九州・沖縄</th>
            </tr>
            <tr>
                <td>
                    <?php foreach ($pref as $val): ?>
                        <?php if (in_array($val['pref_code'], ['40', '41', '42', '43', '44', '45', '46', '47'])): ?>
                            <?= $this->Form->button($val['pref_name'],
                                ['value' => $val['pref_code'], 'class' => 'pref_submit']) ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
        <div class="button_area">
            <button type="button" onclick="window.location.href='/mypage';">戻る</button>
        </div>
    </form>
</div>