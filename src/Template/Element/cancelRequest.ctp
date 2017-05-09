<?php if ($request['status'] != STATUS_CANCEL_TRAVEL && $request['status'] != STATUS_COMPLETE_CANCEL_TRAVEL): ?>
    <?php if ($list_type == LIST_TYPE_REQUESTING): ?>
        <div class="top_title" id="toggle_button01">
            <span class="title">依頼のキャンセル</span>
        </div>
        <div>
            <form name="form_status01" method="post" action="/requestDetail/cancelRequest">
                <?= $this->Form->hidden('id') ?>
                <?= $this->Form->hidden('list_type') ?>
                <button type="submit" class="next_button">依頼をキャンセルする</button>
            </form>
        </div>
    <?php endif ?>
<?php endif ?>