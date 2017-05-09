<?php $this->assign('title', 'サイトの使い方'); ?>


<div>
    <div class="top_title">
        <span class="title">サイトの使い方</span>
    </div>

    <ol><a href="/manual/download/1">利用者マニュアル(簡易版)</a></ol>
    <ol><a href="/manual/download/2">利用者マニュアル(詳細版)</a></ol>

    <?php if (isset($user) && $user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE): ?>
        <ol><a href="/manual/download/3">事務局マニュアル(簡易版)</a></ol>
        <ol><a href="/manual/download/4">事務局マニュアル(詳細版)</a></ol>

        <div class="top_title">
            <span class="title">ファイルをアップロードする</span>
        </div>
        <div style="background-color: #b9b9b9;">
            <form action="/manual/upload" method="post" enctype="multipart/form-data">
                <span>ファイル区分</span>
                <?= $this->Form->select('file_type', [
                    ['text' => '選択して下さい', 'value' => ''],
                    ['text' => '利用者マニュアル(簡易版)', 'value' => FILE_TYPE_MANUAL_USER_SIMPLE],
                    ['text' => '利用者マニュアル(詳細版)', 'value' => FILE_TYPE_MANUAL_USER_DETAIL],
                    ['text' => '事務局マニュアル(簡易版)', 'value' => FILE_TYPE_MANUAL_ADMIN_SIMPLE],
                    ['text' => '事務局マニュアル(詳細版)', 'value' => FILE_TYPE_MANUAL_ADMIN_DETAIL],
                ]); ?>
                <?= $this->Form->text('file_name', ['type' => 'file']) ?>
                <?= $this->Form->button('登録', ['class' => 'next_button']) ?>
            </form>
        </div>
    <?php endif; ?>
</div>
