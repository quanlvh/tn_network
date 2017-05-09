<?php if ($request['status'] == STATUS_CANCEL_TRAVEL): ?>
    <?php if ($list_type == LIST_TYPE_ONGOING): ?>
        <div class="top_title" id="toggle_button01">
            <span class="title">キャンセル依頼の承諾</span>
        </div>
        <div>
            <form name="form_status01" method="post" action="/requestDetail/cancelAccept">
                <?= $this->Form->radio('deliveryStatus', [
                    ['text' => '機器未設置', 'value' => '1'],
                    ['text' => '機器設置済', 'value' => '2']
                ]) ?><br>
                <?= $this->Form->hidden('id') ?>
                <?= $this->Form->hidden('list_type') ?>
                <button type="submit" class="next_button">承諾</button>
            </form>
        </div>
    <?php elseif ($list_type == LIST_TYPE_REQUESTING): ?>
        <div class="top_title" id="toggle_button01">
            <span class="title">キャンセル承諾待ちの依頼</span>
        </div>
    <?php endif ?>
<?php elseif ($request['status'] == STATUS_COMPLETE_CANCEL_TRAVEL): ?>
    <div class="top_title" id="toggle_button01">
            <span class="title">キャンセルされた依頼</span>
    </div>
<?php endif ?>