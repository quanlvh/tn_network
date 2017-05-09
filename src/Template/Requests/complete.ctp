<?= $this->Html->css('requests.css')?>
<?= $this->Html->script('requests.js', array('inline' => false))?>

<?php $this->assign('title', '旅行対応依頼入力（依頼先検索）'); ?>

<div class="main_content">
    <div class='complete'>
        <p>依頼が完了しました。</p>
    </div>
    <div id='complete_message'>
        <p>
            TNネットワーク会旅行サービスを<br>
お申し込みいただき、ありがとうございました。<br><br>

ただいま、旅行依頼お申し込みの手配を行っております。<br>
対応回答をご連絡いたしますので、今しばらくお待ちくださいませ。<br>
今後ともご愛顧賜りますようよろしくお願い申し上げます。<br>
        </p>
    </div>
    <div class="complete_content">

    </div>
    <form action='<?=$this->url->build(["controller"=>"mypage"])?>'>
        <div class="button_area">
            <button type="submit" class='mypage_butotn'>マイページへ</button>
            <button type="button" class='list_button' onclick="window.location.href='/contractRequestList/index/3';">依頼履歴画面へ</button>
        </div>
    </form>
</div>