<?php $this->assign('title', '利用規約マスタメンテナンス'); ?>
<?=$this->Html->script('mstUserPolicy.js')?>

<div>
    <div class="top_title">
        <span class="title">利用規約設定</span>
    </div>
    <form action="/mstUserPolicy/edit" method="post">
        <table style="width: 100%;">
            <colgroup>
                <col width="25$">
                <col width="75%">
            </colgroup>
            <tr>
                <th>規約タイトル</th>
                <td><?=$this->Form->input('title', ['type'=>'text', 'id'=>'title', 'style'=>'width:100%;', 'label'=>false])?></td>
            </tr>
            <tr>
                <th>規約内容</th>
                <td><?=$this->Form->textarea('text', ['id'=>'text'])?></td>
            </tr>
        </table>
        <?=$this->Form->hidden('id', ['id'=>'id'])?>
        <?= $this->Form->button('この内容で登録する') ?>
    </form>

    <table style="width: 100%;">
        <colgroup>
            <col width="65$">
            <col width="10%">
            <col width="10%">
            <col width="15%">
        </colgroup>
        <tr style="text-align: center;">
            <th>規約タイトル</th>
            <th>編集</th>
            <th>削除</th>
            <th>移動</th>
        </tr>
        <?php foreach ($policy as $key =>$row):?>
            <tr>
                <td><?=$row['title']?></td>
                <td style="text-align: center;"><a href="" onclick="setPolicy(<?=$row['id']?>); return false;">編集</a></td>
                <td style="text-align: center;"><a href="/mstUserPolicy/delete/<?=$row['id']?>">削除</a></td>
                <td style="text-align: center;"><?= $key === 0?'':'<a href="/mstUserPolicy/rankUp/'.$row['id'].'">上へ</a>';?><?= $key+1 === count($policy)?'':'<a href="/mstUserPolicy/rankDown/'.$row['id'].'">下へ</a>';?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
