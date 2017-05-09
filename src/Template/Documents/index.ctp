<?php $this->assign('title', '各種資料'); ?>
<?=$this->Html->script('documents.js')?>

<div>
    <div class="top_title">
        <span class="title">各種資料</span>
    </div>
    <?= $this->Form->select('select_type', [
        ['text' => 'すべてのファイル', 'value' => ''],
        ['text' => 'お知らせ', 'value' => FILE_TYPE_NOTICE],
        ['text' => '理事会資料', 'value' => FILE_TYPE_BOARD_OF_DIRECTORS],
        ['text' => '依頼申し込み関連資料', 'value' => FILE_TYPE_REQUEST_DOCUMENT],
    ],['id' => 'select_type']) ?>
    <form action="/documents/delete" method="post">
    <table style="width: 100%">
        <colgroup>
            <col width="5%">
            <col width="20%">
            <col width="40%">
            <col width="15%">
            <col width="20%">
        </colgroup>
        <tr style="text-align: center;">
            <th></th>
            <th>区分</th>
            <th>ファイル名</th>
            <th>サイズ</th>
            <th>登録日時</th>
        </tr>
        <?php foreach ($documentList as $row):?>
            <tr>
                <td style="text-align: center;"><input type="checkbox" name="delete[]" value="<?=$row['id']?>"></td>
                <td><?=$typeList[$row['file_type']]?></td>
                <td><a href="<?='/documents/download/'.$row['id']?>"><?=$row['file_name']?></a></td>
                <td><?=$row['file_size']?></td>
                <td><?=date('Y/m/d H:i', strtotime($row['created_at']))?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?=$this->Form->button('チェックしたファイルを削除')?>
    </form>
    <div class="top_title">
        <span class="title">ファイルをアップロードする</span>
    </div>
    <div style="background-color: #b9b9b9;">
        <form action="/documents/upload" method="post" enctype="multipart/form-data">
            <span>ファイル区分</span>
            <?= $this->Form->select('file_type', [
                ['text' => '選択して下さい', 'value' => ''],
                ['text' => 'お知らせ', 'value' => FILE_TYPE_NOTICE],
                ['text' => '理事会資料', 'value' => FILE_TYPE_BOARD_OF_DIRECTORS],
                ['text' => '依頼申し込み関連資料', 'value' => FILE_TYPE_REQUEST_DOCUMENT],
            ]); ?>
            <?= $this->Form->text('file_name', ['type' => 'file']) ?>
            <?= $this->Form->button('登録', ['class' => 'next_button']) ?>
        </form>
    </div>
</div>
