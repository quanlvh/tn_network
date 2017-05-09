<?php $this->assign('title', 'マイページ'); ?>
<?= $this->Html->css('mypage.css');?>
<?= $this->Html->script('mypage.js', array('inline' => false))?>

<!--お知らせ欄-->

<div class="block_outer">
    <div id="news_area">
        <div class="top_title">
            <span class="title">お知らせ</span>
        </div>
        <!-- お知らせ欄 -->
        <div class="block_body">
            <div class="news_contents">
                <?php foreach ($mst_news as $news):?>
                    <dl class="newslist">
                        <dt>
                            <?php
                            if(!empty($news['news_update_date'])):
                                $news['news_update_date']->format('Y/m/d');
                            endif;
                            ?>&nbsp;
                            <a href="javascript:;"><?=$news['news_title'];?></a>
                        </dt>
                        <dd class="news_body" style="display: none;">
                            <?=$news['news_detail'];?>
                        </dd>
                    </dl>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!--受託依頼欄-->
<div id="request_area">
    <table id="request_table">
        <tr>
            <!--受託-->
            <td id="trustee">
                <div id="trustee_title">
                    <li class="title" style="list-style:url('img/u92.png');margin-left:40px">受託</li>
                </div>
                <?php if($user['user_role'] == ROLE_STORE): ?>
                    <?php if (empty($answer_waiting_requests) or count($answer_waiting_requests)==0): ?>
                        <div class="div_button">
                            <span>未回答の受託：0件</span>
                        </div>
                    <?php else: ?>
                        <div class="div_button" disabled="disabled"
                             onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ANSWER_WAITING?>';">
                            <span>未回答の受託：<?=count($answer_waiting_requests);?>件</span>
                            <!-- ！マーク -->
                            <img src="img/u104.png" class="img"/>
                        </div>
                    <?php endif; ?>
                    <?php if ( empty($ongoing_requests) or count($ongoing_requests)==0): ?>
                        <div class="div_button">
                            <span>現在対応中の受託：0件</span>
                        </div>
                    <?php else: ?>
                        <div class="div_button"
                             onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_ONGOING?>';">
                            <span>現在対応中の受託：<?=count($ongoing_requests);?>件</span>
                            <img src="img/u104.png" class="img"/>
                        </div>
                    <?php endif; ?>
                    <div class="div_button"
                         onclick="window.location.href='/orderHistory/index/<?=HISTORY_TYPE_TRUSTEE?>';">
                        <span>受託履歴</span>
                    </div>
                <?php endif; ?>
                <?php if($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE or $user['user_role'] == ROLE_MTSC): ?>
                    <?php if ( empty($requests) or count($requests)==0): ?>
                        <div class="div_button">
                            <span>滞留している旅行依頼：0件</span>
                        </div>
                    <?php else: ?>
                        <div class="div_button"
                             onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_RETAINED?>';">
                            <span>滞留している旅行依頼：<?=count($requests);?>件</span>
                            <!-- 受託ボタン1マーク -->
                            <img src="img/u104.png" class="img"/>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <!--依頼-->
            <td id="request">
                <div id="request_title">
                    <li class="title" style="list-style:url('img/u90.png');margin-left:40px">依頼</li>
                </div>
                <?php if($user['user_role'] == ROLE_STORE): ?>
                    <div class="div_button" onclick="window.location.href='/requests';">
                        <span>新しく旅行を依頼する</span>
                    </div>
                <?php endif; ?>
                <?php if($user['user_role'] != ROLE_EXECUTIVE_BRANCH_OFFICE): ?>
                    <?php if ( empty($rental_machines) or count($rental_machines)==0): ?>
                        <div class="div_button">
                            <span>貸出機器依頼一覧：0件</span>
                        </div>
                    <?php else: ?>
                        <div class="div_button"
                             onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_RENTAL_MACHINE?>';">
                            <span>貸出機器依頼一覧：<?=count($rental_machines);?>件</span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($user['user_role'] == ROLE_STORE): ?>
                    <?php if ( empty($requests) or count($requests)==0): ?>
                        <div class="div_button">
                            <span>現在依頼中の旅行対応：0件</span>
                        </div>
                    <?php else: ?>
                        <div class="div_button"
                             onclick="window.location.href='/contractRequestList/index/<?=LIST_TYPE_REQUESTING?>';">
                            <span>現在依頼中の旅行対応：<?=count($requests);?>件</span>
                            <img src="img/u104.png" class="img"/>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE
                    or $user['user_role'] == ROLE_MTSC
                    or $user['user_role'] == ROLE_EXECUTIVE_BRANCH_OFFICE): ?>
                    <div class="div_button" onclick="window.location.href='/requests/agency';">
                        <span>代理旅行依頼</span>
                    </div>
                <?php endif; ?>
                <div class="div_button"
                     onclick="window.location.href='/orderHistory/index/<?=HISTORY_TYPE_REQUEST?>';">
                    <span>依頼履歴</span>
                </div>
            </td>
        </tr>
    </table>
</div>

<!--各種機能欄-->
<div id='function_area'>
    <div id="function_title">
        <li class="title" style="list-style:url('img/u122.png');margin-left:40px">各種機能</li>
    </div>

    <table>
        <tr>
            <td>
                <?php if($user['user_role'] == ROLE_EXECUTIVE_HEAD_OFFICE): ?>
                <div class="div_button">
                    <span>マスタメンテナンス承認待ち一覧： 件</span>
                </div>
            </td>
            <td class="left_area">
                <div class="div_button" onclick="window.location.href='/executiveMenu';">
                    <span>事務局用機能</span>
                </div>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>
                <div class="div_button" onclick="window.location.href='/mstMenteMenu';">
                    <span>マスタメンテナンス</span>
                </div>
            </td>
            <td class="left_area">
                <div class="div_button">
                    <span>各種資料</span>
                </div>
</div>
</td>
</tr>
</table>

</div>