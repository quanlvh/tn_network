<!--事務局用コメント欄-->
<?php if($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE):?>
<div class="top_title" id="toggle_button01">
    <span class="title">コメント(事務局用)</span>
</div>
<div class="detail_area">
    <table style="width:100%;">
        <colgroup>
            <col width="20%">
            <col width="15%">
            <col width="65%">
        </colgroup>
    <?php foreach($executiveComments as $comment):?>
        <tr>
            <td><?=$comment['created_at']->format('Y/m/d H:i')?></td>
            <td><?=$comment['user_name']?></td>
            <td style="word-break: break-all;"><?=$comment['comment']?></td>
        </tr>
    <?php endforeach;?>
    </table>
    <form name="form_comment" method="post" action="/requestDetail/saveComment">
        <?=$this->Form->hidden('id')?>
        <?=$this->Form->hidden('list_type')?>
        <?=$this->Form->hidden('role', ['value'=>ROLE_EXECUTIVE_HEAD_OFFICE])?>
        <?=$this->Form->input('comment', ['type'=>'text', 'label'=>false, 'placeholder'=>'コメントを入力してください'])?>
        <button type="submit">送信</button>
    </form>
</div>
<?php endif;?>
