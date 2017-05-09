<?= $this->Html->css('requestdetail.css'); ?>
<?= $this->Html->script('requestdetail.js', array('inline' => false)); ?>

<?php $this->assign('title', '旅行対応依頼内容'); ?>

<div class="top_title">
    <span class="title">旅行対応依頼内容</span>
</div>
<div class="main_content">
    <?php switch ($list_type){case LIST_TYPE_ANSWER_WAITING://未回答 ?>
        <span>以下の旅行対応のお申込みがあります。</span><br>
        <span>内容をご確認の上、対応可否をご回答ください。</span>
    <?php break;
            case LIST_TYPE_ONGOING://対応中依頼 ?>

    <?php break;
            case LIST_TYPE_REQUESTING://依頼中 ?>


    <?php } ?>

    <?php if($list_type != LIST_TYPE_ANSWER_WAITING ||
                $list_type != LIST_APPROVAL_PENDING):?>
        <!--回答待ち、承認待ち以外はステータスフローを表示する-->
        <!--旅行対応受付-->
        <div class="status_flow" id="">
            <span>旅行対応受付</span><br>
            <form name="form_status01" method="post" action="<?=$this->url->build(['controller'=>'requestdetail', 'action'=>'index'])?>">
            <span style="color: red;">※次は機器の手配を行います。</span><br>
            <span>作業が完了したら、完了ボタンを押してください。</span>
                <button type="submit" class="next_button">完了</button>
            </form>

        </div>
        <!--宿泊先へ機器を設置-->
        <div class="status_flow">
            <span>宿泊先へ機器を設置</span><br>
            <form name="form_status01" method="post" action="<?=$this->url->build(['controller'=>'requestdetail', 'action'=>'index'])?>">
            <span style="color: red;">※次は機器の手配を行います。</span><br>
            <span>作業が完了したら、必要事項を入力し完了ボタンを押してください。</span><br>
            <span>機器設置完了日</span>
            </form>
        </div>
        <!--旅行中-->
        <div class="status_flow">
            <span>旅行中</span>
        </div>
        <!--機器回収-->
        <div class="status_flow">
            <span>機器回収</span>
        </div>
        <!--旅行対応完了-->
        <div class="status_flow">
            <span>旅行対応完了</span>
        </div>
    <?php endif;?>


    <?php if($list_type != LIST_TYPE_ANSWER_WAITING):?>
        <!--依頼回答待ち一覧以外は詳細を折りたためるようにする-->
        <div class="top_title" id="toggle_button01">
            <span class="title">詳細情報</span>
        </div>
        <div class="close_tab" id="slide_toggle01">
    <?php endif;?>
    <div class="detail_area">
        <?php if($list_type == LIST_TYPE_ANSWER_WAITING): ?>
        <form name="form_answer" method="post" action="<?=$this->url->build(['controller'=>'request_detail', 'action'=>'confirm'])?>">
        <?php endif;?>
        <table class="detail_table">
            <colgroup>
                <col width='20%'>
                <col width='80%'>
            </colgroup>
            <tr>
                <th colspan="2">
                    宿泊先（機器設置先）情報
                </th>
            </tr>
            <tr>
                <td>宿泊先</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>電話番号</td>
                <td><?=$request['lodging_place_tel']?></td>
            </tr>
            <tr>
                <td>旅行会社名</td>
                <td><?=$request['lodging_place_name']?></td>
            </tr>
            <tr>
                <td>受入可否</td>
                <td>
                    <?=$is_acceptable[$request['is_acceptable']]?>
                </td>
            </tr>
            <tr>
                <td>設置履歴</td>
                <td></td>
            </tr>


            <tr>
                <th colspan="2">
                    日程情報
                </th>
            </tr>
            <tr>
                <td>滞在期間</td>
                <td></td>
            </tr>
            <tr>
                <td>事前設置</td>
                <td><?=$is_before_setting[$request['is_before_setting']]?></td>
            </tr>
            <tr>
                <td>後日回収</td>
                <td><?=$is_before_setting[$request['is_after_collectable']]?></td>
            </tr>


            <tr>
                <th colspan="2">
                    設置機器情報
                </th>
            </tr>
            <tr>
                <td colspan="2">
                    <?=$this->Form->radio('select_machine', [['value'=>'1', 'text'=>'']])?>
                    第一希望　酸素濃縮器　3Lタイプ　加湿あり　機種指定：○○○○
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=$this->Form->radio('select_machine', [['value'=>'2', 'text'=>'']])?>
                    第二希望　酸素濃縮器　3Lタイプ　加湿あり　機種指定なし
                    <?=$this->Form->input('machine_name', ['type'=>'text','label'=>false, 'placeholder'=>'対応する機器名を入力して下さい'])?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <?=$this->Form->radio('select_machine', [['value'=>'3', 'text'=>'']])?>
                    機器貸し出しを依頼する
                </td>
            </tr>


            <tr>
                <th colspan="2">
                    その他依頼内容
                </th>
            </tr>
            <tr>
                <td>
                    <?php if(!empty($request['request_message'])): ?>
                        $request['request_message'];
                    <?php else:?>
                        なし
                    <?php endif;?>
                </td>
            </tr>
        </table>
        <?php if($list_type == LIST_TYPE_ANSWER_WAITING): ?>
            <?=$this->Form->hidden('id')?>
            <?=$this->Form->hidden('list_type')?>
            <div class="button_area">
                <button type="submit" id="impossible_button">対応不可☹</button>
                <button type="submit" class="next_button" id='possible_button'>対応可能☺</button>
            </div>
        </form>
        <?php endif;?>
    </div>
    <?php if($list_type != LIST_TYPE_ANSWER_WAITING):?>
        <!--依頼回答待ち一覧以外は詳細を折りたためるようにする-->
        <div class="close_tab">
    <?php endif;?>
</div>