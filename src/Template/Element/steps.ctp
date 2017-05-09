
<ol class="steps">
    <!--旅行対応受付-->
    <li class="step">
        <span>旅行対応受付</span><br>
        <?php if($request['status'] > STATUS_ANSWER_WAITING):?>
            回答日:<?=$this->datew($statuses[STATUS_ANSWER_WAITING]['completion_date'])?>
        <?php endif;?>
    </li>

    <!-- 機器送付受付待ち -->
    <?php if(!empty($statuses[STATUS_ACCEPT_WAITING_SEND_MACHINE])):?>
    <li class="step">
        <?php if($request['status'] == STATUS_ACCEPT_WAITING_SEND_MACHINE):?>
            <span><?=$statuses[STATUS_ACCEPT_WAITING_SEND_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_REQUESTING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                        <span>完了した場合は以下を入力した上で、登録ボタンを押してください。</span>
                    <?=$this->Form->hidden('id')?>
                    <?=$this->Form->hidden('list_type')?>
                        <p>送付予定日を入力してください</p>
                        送付予定日<?=$this->Form->input('expected_date', ['type'=>'text', 'label'=>false, 'class'=>'datepicker', 'default'=>date('Y/m/d')])?>
                    <button type="submit" class="next_button">完了</button>
                    </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_ACCEPT_WAITING_SEND_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_ACCEPT_WAITING_SEND_MACHINE):?>
            回答日:<?=$this->datew($statuses[STATUS_ACCEPT_WAITING_SEND_MACHINE]['completion_date'])?><br>
            送付予定日：<?=$this->datew($statuses[STATUS_ACCEPT_WAITING_SEND_MACHINE]['expected_date'])?>
        <?php endif;?>
    </li>
    <?php endif;?>

    <!-- 機器送付待ち -->
    <?php if(!empty($statuses[STATUS_WAITING_SEND_MACHINE])):?>
    <li class="step">
        <?php if($request['status'] == STATUS_WAITING_SEND_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_SEND_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_REQUESTING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                    <span>完了した場合は以下を入力した上で、登録ボタンを押してください。</span>
                <?=$this->Form->hidden('id')?>
                <?=$this->Form->hidden('list_type')?>
                    <p>配送業者を入力してください</p>
                    配送業者<?=$this->Form->input('delivery_company_name', ['type'=>'text', 'label'=>false])?>
                    <p>お問い合わせ伝票Noを入力してください</p>
                    お問い合わせ伝票No<?=$this->Form->input('inquiry_slip_no', ['type'=>'text', 'label'=>false])?>
                    <p>備考欄</p>
                    <?=$this->Form->textarea('remarks')?>
                <button type="submit" class="next_button">登録</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_SEND_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_SEND_MACHINE):?>
            回答日:<?=$this->datew($statuses[STATUS_WAITING_SEND_MACHINE]['completion_date'])?><br>
            配送業者名:<?=$statuses[STATUS_WAITING_SEND_MACHINE]['delivery_company_name']?><br>
            お問い合わせ伝票No:<?=$statuses[STATUS_WAITING_SEND_MACHINE]['inquiry_slip_no']?><br>
            <?php if(!empty($statuses[STATUS_WAITING_SEND_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_SEND_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
    </li>
    <?php endif;?>

    <!-- 貸出機器受領待ち -->
    <?php if(!empty($statuses[STATUS_WAITING_RECEIVE_MACHINE])):?>
    <li class="step">
        <?php if($request['status'] == STATUS_WAITING_RECEIVE_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_RECEIVE_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_ONGOING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                <?=$this->Form->hidden('id')?>
                <?=$this->Form->hidden('list_type')?>
                <span>機器を受領したら、完了ボタンを押してください。</span><br>
                <p>備考欄</p>
                <?=$this->Form->textarea('remarks')?>
                <button type="submit" class="next_button">完了</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_RECEIVE_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_RECEIVE_MACHINE):?>
            受領日:<?=$this->datew($statuses[STATUS_WAITING_RECEIVE_MACHINE]['completion_date'])?><br>
            <?php if(!empty($statuses[STATUS_WAITING_RECEIVE_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_RECEIVE_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
    </li>
    <?php endif;?>

    <!--宿泊先へ機器を設置-->
    <li class="step">
        <?php if($request['status'] == STATUS_WAITING_INSTALL_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_INSTALL_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_ONGOING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                <?=$this->Form->hidden('id')?>
                <?=$this->Form->hidden('list_type')?>
                <span>作業が完了したら、必要事項を入力し完了ボタンを押してください。</span><br>
                <span>機器設置完了日</span><?=$this->Form->input('completion_date', ['type'=>'text', 'label'=>false, 'class'=>'datepicker', 'default'=>date('Y/m/d')])?>
                <p>備考欄</p>
                <?=$this->Form->textarea('remarks')?>
                <button type="submit" class="next_button">完了</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_INSTALL_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_INSTALL_MACHINE):?>
            設置完了日:<?=$this->datew($statuses[STATUS_WAITING_INSTALL_MACHINE]['completion_date'])?><br>
            <?php if(!empty($statuses[STATUS_WAITING_INSTALL_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_INSTALL_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
    </li>

    <!--旅行中-->
    <li id="step_travelling">
        <span>旅行中</span>
        <?php if($request['status'] == STATUS_WAITING_PICKUP_MACHINE):?>
            
        <?php endif;?>

    </li>

    <!--機器回収-->
    <li class="step">
        <?php if($request['status'] == STATUS_WAITING_PICKUP_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_PICKUP_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_ONGOING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                <?=$this->Form->hidden('id')?>
                <?=$this->Form->hidden('list_type')?>
                <span>作業が完了したら、必要事項を入力し完了ボタンを押してください。</span><br>
                <span>機器回収完了日</span><?=$this->Form->input('completion_date', ['type'=>'text', 'label'=>false, 'class'=>'datepicker', 'default'=>date('Y/m/d')])?>
                <p>備考欄</p>
                <?=$this->Form->textarea('remarks')?>
                <button type="submit" class="next_button">完了</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_PICKUP_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_PICKUP_MACHINE):?>
            回収完了日:<?=$this->datew($statuses[STATUS_WAITING_PICKUP_MACHINE]['completion_date'])?><br>
            <?php if(!empty($statuses[STATUS_WAITING_PICKUP_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_PICKUP_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
    </li>

    <!-- 回収機器送付待ち -->
    <?php if(!empty($statuses[STATUS_WAITING_SEND_PICKUP_MACHINE])):?>
        <li class="step">
        <?php if($request['status'] == STATUS_WAITING_SEND_PICKUP_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['status_name']?></span><br>
            <span>完了した場合は以下を入力した上で、登録ボタンを押してください。</span>
            <?php if($list_type == LIST_TYPE_ONGOING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                <?=$this->Form->hidden('id')?>
                <?=$this->Form->hidden('list_type')?>
                 <p>配送業者を入力してください</p>
                配送業者<?=$this->Form->input('delivery_company_name', ['type'=>'text', 'label'=>false])?>
                <p>お問い合わせ伝票Noを入力してください</p>
                お問い合わせ伝票No<?=$this->Form->input('inquiry_slip_no', ['type'=>'text', 'label'=>false])?>
                <p>備考欄</p>
                <?=$this->Form->textarea('remarks')?>
                <button type="submit" class="next_button">完了</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_SEND_PICKUP_MACHINE):?>
            回答日:<?=$this->datew($statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['completion_date'])?><br>
            配送業者名:<?=$statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['delivery_company_name']?><br>
            お問い合わせ伝票No:<?=$statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['inquiry_slip_no']?><br>
            <?php if(!empty($statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_SEND_PICKUP_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
        </li>
    <?php endif;?>

    <!-- 回収機器受領待ち -->
    <?php if(!empty($statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE])):?>
        <li class="step">
        <?php if($request['status'] == STATUS_WAITING_RECEIVE_PICKUP_MACHINE):?>
            <span><?=$statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE]['status_name']?></span><br>
            <?php if($list_type == LIST_TYPE_REQUESTING):?>
                <form name="form_status01" method="post" action="/requestDetail/updatestatus">
                    <?=$this->Form->hidden('id')?>
                    <?=$this->Form->hidden('list_type')?>
                    <span>機器を受領したら、完了ボタンを押してください。</span><br>
                    <p>備考欄</p>
                    <?=$this->Form->textarea('remarks')?>
                    <button type="submit" class="next_button">完了</button>
                </form>
            <?php endif;?>
        <?php else:?>
            <span><?=$statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_RECEIVE_PICKUP_MACHINE):?>
            受領日:<?=$this->datew($statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE]['completion_date'])?><br>
            <?php if(!empty($statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE]['remarks'])):?>
                備考:<?=$statuses[STATUS_WAITING_RECEIVE_PICKUP_MACHINE]['remarks']?>
            <?php endif;?>
        <?php endif;?>
        </li>
    <?php endif;?>

    <!--旅行対応完了確認中-->
    <li class="step">
        <?php if($request['status'] == STATUS_WAITING_CONFIRM_TRAVEL_END):?>
        <span><?=$statuses[STATUS_WAITING_CONFIRM_TRAVEL_END]['status_name']?></span><br>
        <?php if($list_type == LIST_TYPE_ONGOING):?>
            <form name="form_status01" method="post" action="/requestDetail/updatestatus">
            <?=$this->Form->hidden('id')?>
            <?=$this->Form->hidden('list_type')?>
            <button type="submit" class="next_button">完了</button>
            </form>
        <?php endif;?>
        <?php else:?>
        <span><?=$statuses[STATUS_WAITING_CONFIRM_TRAVEL_END]['status_name']?></span><br>
        <?php endif;?>
        <?php if($request['status'] > STATUS_WAITING_CONFIRM_TRAVEL_END):?>
            完了日:<?=$this->datew($statuses[STATUS_WAITING_CONFIRM_TRAVEL_END]['completion_date'])?>
        <?php endif;?>
    </li>

    <!--旅行対応完了-->
    <li class="step">
        <span>旅行対応完了</span>
    </li>
</ol>


<script>
    $(document).ready(function(){
        currentStep(<?=$now_status['sequence_no']?>);
        //機器回収待ちの場合は旅行中もcurrentにする
        if(<?=$request['status']?> === <?=STATUS_WAITING_PICKUP_MACHINE?>) {
            $('#step_travelling').addClass('current');
        }
        else if(<?=$request['status']?> < <?=STATUS_WAITING_PICKUP_MACHINE?>) {
            $('#step_travelling').addClass('after');
        }
    });
</script>

