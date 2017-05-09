<?= $this->Html->css('requests.css') ?>
<?= $this->Html->script('requests.js', array('inline' => false)) ?>

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
            <td>
                <div>依頼先入力</div>
            </td>
            <td style="background-image: url('/img/arrow02.png');">
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
          action="<?= $this->url->build(['controller' => 'requests', 'action' => 'detail']) ?>">
        <p>以下の2点についてご確認の上、旅行依頼のお申し込みに進んでください。</p>

        <div id='consent_area'>
            <?= $this->Form->checkbox('doc_approval', ['id' => 'doc_approval', 'required' => true]) ?>
            <label for='doc_approval'>本お申し込みに関して、医師の了解（処方）を得ています。</label>
            <table>
                <tr>
                    <td>病院名<span style="color:red;">*必須</span></td>
                    <td class="input_td">
                        <?= $this->Form->input('hospital_name',
                            ['type' => 'text', 'label' => false, 'class' => 'w200', 'required' => true]) ?>
                    </td>
                    <td>医師名<span style="color:red;">*必須</span></td>
                    <td class="input_td">
                        <?= $this->Form->input('doctor_name',
                            ['type' => 'text', 'label' => false, 'class' => 'w200', 'required' => true]) ?>
                    </td>
                </tr>
            </table>
            <?= $this->Form->checkbox('patient_approval', ['id' => 'patient_approval', 'required' => true]) ?>
            <label for="patient_approval">患者様（使用者）からの「使用者の責に帰する事由で発生した損害責任」についての了解を得ています。</label>

            <?= $this->Form->checkbox('is_appoint', ['id' => 'is_appoint', 'required' => true]) ?>
            <label for="is_appoint">宿泊先への旅行対応の受入確認が完了しています。</label><br/>

            <?= $this->Form->checkbox('fee_approval', ['id' => 'fee_approval', 'required' => true]) ?>
            <label for="fee_approval">以下の場合、追加料金が発生することを了承します。</label>
            <div style="font-weight: 500;width: 95%;margin: 0 auto;">
                <table border='1'>
                    <tr>
                        <td colspan="2" style="background-color: gray;color: white;">基本料金</td>
                    </tr>
                    <tr>
                        <td>会員</td>
                        <td>&yen;13,000(税別)</td>
                    </tr>
                    <tr>
                        <td>非会員</td>
                        <td>&yen;23,000(税別)</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="background-color: gray;color: white;">追加料金</td>
                    </tr>
                    <tr>
                        <td>旅行開始日から4～10日前の申込</td>
                        <td>&yen;5,000(税別)</td>
                    </tr>
                    <tr>
                        <td>旅行開始日から1～3日前の申込</td>
                        <td>&yen;10,000(税別)</td>
                    </tr>
                    <tr>
                        <td>
                            ボンベ4本以上での申込
                        </td>
                        <td>4本目から&yen;1,000(税別)/本</td>
                    </tr>
                    <tr>
                        <td>追加配送　ボンベ</td>
                        <td>酸素代&yen;1,000(税別)/本　配送代&yen;3,000(税別)/回</td>
                    </tr>
                    <tr>
                        <td>追加配送　液体酸素</td>
                        <td>酸素代&yen;5,000(税別)/本　配送代&yen;5,000(税別)/回</td>
                    </tr>
                    <tr>
                        <td colspan="2">離島へのお申込、長距離の配送の場合に別途フェリー代金や高速代等が発生する可能性がございます。</td>
                    </tr>
                </table>
            </div>
        </div>

        <?= $this->Form->hidden('pref_name') ?>
        <?= $this->Form->hidden('area_name') ?>
        <?= $this->Form->hidden('address') ?>
        <?= $this->Form->hidden('branch_code') ?>
        <div class="button_area">
            <button type="button" onclick="window.location.href='/requests/pref';">戻る</button>
            <button type="submit">依頼中止</button>
            <button type="submit" class="next_button" id='content_next'>確認して、申込入力に進む</button>
        </div>
</div>