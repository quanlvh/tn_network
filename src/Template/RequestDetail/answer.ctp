<?= $this->Html->css('requestdetail.css'); ?>
<?= $this->Html->script('requestdetail.js', array('inline' => false)); ?>

<?php $this->assign('title', '回答完了'); ?>

<div class="top_title">
    <span class="title">ご回答ありがとうございました</span>
</div>
<div class="main_content">
    <?php switch ($answer){case 0://対応不可 ?>
        <span>またの機会がございましたら、よろしくお願い申し上げます。</span>
    <?php break;
            case 1://対応可能 ?>
        <span>この度は、旅行対応依頼を受けて頂き誠にありがとうございます。</span><br>
        <span>旅行対応の受託処理は、マイページの受託メニューから操作が可能です。</span>
    <?php } ?>
    <form name="form_answer" method="post" action="<?=$this->url->build(['controller'=>'mypage'])?>">
            <div class="button_area">
                <button type="submit" class="next_button">マイページに戻る</button>
            </div>
    </form>
</div>