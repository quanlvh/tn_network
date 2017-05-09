
<?= $this->Html->css('requestdetail.css'); ?>
<?= $this->Html->script('requestdetail.js', array('inline' => false)); ?>

<?php $this->assign('title', '旅行対応依頼内容'); ?>

<div class="top_title">
    <span class="title">旅行対応依頼内容</span>
</div>
<div class="main_content">

    <!--キャンセル確認待ち-->
    <?=$this->element('cancelAccept')?>

    <div class="detail_area">
        <?=$this->element('simpleDetail')?>
    </div>
    
    <!--ステータス表示-->
    <div id="step_box">
        <?=$this->element('steps')?>
    </div>

    <!--販売店コメント欄-->
    <?=$this->element('storeComment')?>

    <!--事務局用コメント欄-->
    <?=$this->element('executiveComment')?>
    
    <!--追加配送依頼-->
    <div>
        <?=$this->element('addDelivery')?>
    </div>
    
    <!--連絡先情報-->
    <div>
        <?=$this->element('contractInfomation')?>
    </div>
    
    
    
    <!--依頼回答待ち一覧以外は詳細を折りたためるようにする-->
    <div class="top_title" id="toggle_button01">
        <span class="title">詳細情報</span>
    </div>
    <div class="close_tab" id="slide_toggle01">      
        <?=$this->element('requestDetail')?>
    </div>

    <!--キャンセル申請-->
    <?=$this->element('cancelRequest')?>


    <form name="form_button" method="post" action="<?=$this->url->build(['controller'=>'mypage'])?>">
        <div class="button_area">
            <button type="submit" id="return_button">戻る</button>
            <button type="submit" class="next_button" id='mypage_button'>マイページへ</button>
        </div>
    </form>
    
</div>
