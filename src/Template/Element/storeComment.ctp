<!--販売店コメント欄-->
<div class="top_title">
    <span class="title">コメント</span>
</div>
<div class="detail_area">
    <table style="width:100%;border-collapse:collapse;margin-bottom: 10px;">
        <colgroup>
            <col width="20%">
            <col width="15%">
            <col width="65%">
        </colgroup>
    <?php foreach($storeComments as $comment):?>
        <tr style="border-bottom: 1px #007095 dashed">
            <td><?=$comment['created_at']->format('Y/m/d H:i')?></td>
            <td><?=$comment['user_name']?></td>
            <td style="word-break: break-all;"><?=$comment['comment']?></td>
        </tr>
    <?php endforeach;?>
    </table>
    <form name="form_comment" method="post" action="/requestDetail/saveComment">
        <?=$this->Form->hidden('id')?>
        <?=$this->Form->hidden('list_type')?>
        <?=$this->Form->hidden('role', ['value'=>ROLE_STORE])?>
        <?=$this->Form->input('comment', ['type'=>'text', 
            'label'=>false, 
            'placeholder'=>'コメントを入力してください',
            'style'=>'width:80%;'])?>
        <button type="submit">送信</button>
    </form>
</div>
