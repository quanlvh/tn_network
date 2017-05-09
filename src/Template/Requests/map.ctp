<?= $this->Html->css('https://unpkg.com/leaflet@1.0.3/dist/leaflet.css'); ?>
<?= $this->Html->script('https://unpkg.com/leaflet@1.0.3/dist/leaflet.js'); ?>
<?= $this->Html->script('map.js', array('inline' => false)); ?>

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
    <table style="width: 100%;">
        <colgroup>
            <col width='20%'>
            <col width='80%'>
        </colgroup>
        <tr>
            <td>
                <form name="form_area" method="post" id="form_area"
                      action="<?= $this->url->build(['controller' => 'requests', 'action' => 'map']) ?>">
                    <?= $this->Form->hidden('pref_name', ['id'=>'id_pref_name']) ?>
                    <?= $this->Form->hidden('area_name', ['id'=>'id_area_name']) ?>
                    <?= $this->Form->hidden('pref_code', ['id'=>'id_pref_code']) ?>
                    <?= $this->Form->hidden('area_code', ['id'=>'id_area_code']) ?>
                    <?= $this->Form->hidden('branch_code') ?>
                    <div id="area_list">
                        <select name="pref_code" id="pref_code_list" style="width: 100%;">
                            <?php foreach ($pref as $val):?>
                                <option value="<?=$val['pref_code']?>" <?=$val['pref_code']==$post['pref_code']?'selected':''?>><?=$val['pref_name']?></option>
                            <?php endforeach;?>
                        </select>
                        <table style="width:100%;text-align: left;">
                            <?php if (preg_grep('/^[あ-お]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">あ行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[あ-お]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[か-こ]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">か行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[か-こ]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[さ-そ]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">さ行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[さ-そ]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[た-と]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">た行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[た-と]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[な-の]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">な行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[な-の]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[は-ほ]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">は行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[は-ほ]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[ま-も]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">ま行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[ま-も]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[や-よ]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">や行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[や-よ]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[ら-ろ]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">ら行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[ら-ろ]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <?php if (preg_grep('/^[わ-ん]/u', $area_kana)): ?>
                                <tr>
                                    <th style="background-color:#ddddff;">わ行</th>
                                </tr>
                                <?php foreach ($area as $val): ?>
                                    <?php if (preg_match('/^[わ-ん]/u', $val['area_kana'])): ?>
                                        <tr>
                                            <td class="<?=$post['area_code']==$val['area_code']?'selected':''?>">
                                                <ruby>
                                                    <rb><a href="#"
                                                           onclick="clickArea('<?= $val['area_code'] ?>');"><?= $val['area_name'] ?></a>
                                                    </rb>
                                                    <rp>(</rp>
                                                    <rt><?= $val['area_kana'] ?></rt>
                                                    <rp>)</rp>
                                                </ruby>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                    </div>
                </form>
            </td>
            <td>
                <div id="map_area"></div>
            </td>
        </tr>
    </table>
    <form name="form_area" method="post"
          action="<?= $this->url->build(['controller' => 'requests', 'action' => 'consent']) ?>">
        <?= $this->Form->hidden('pref_name') ?>
        <?= $this->Form->hidden('area_name') ?>
        <?= $this->Form->hidden('pref_code') ?>
        <?= $this->Form->hidden('area_code') ?>
        <?= $this->Form->hidden('branch_code') ?>
        <?= $this->Form->hidden('address', ['id'=>'id_address']) ?>
        <span style="font-weight: bold">
            <?= $post['pref_name'] ?><?= $post['area_name'] ?><?= !empty($post['address'])?$post['address']:''?>
        </span>
        <?= $this->Form->button('次へ', ['class' => 'next_button']) ?>
    </form>
</div>