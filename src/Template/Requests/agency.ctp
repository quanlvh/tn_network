<?= $this->Html->css('requests.css'); ?>
<?= $this->Html->script('requestAgency.js', array('inline' => false)); ?>

<?php $this->assign('title', '依頼会社情報'); ?>

<div class="top_title">
    <span class="title">旅行対応代理依頼入力</span>
</div>
<div class="main_content">
    <form name="form_pref" method="post"
          action="<?= $this->url->build(['controller' => 'requests', 'action' => 'pref']) ?>">
        <div class="top_title">
            <span class="title">依頼会社情報</span>
        </div>
        <select id="company_list" name="company_code" style="width: 300px;">
            <?php foreach ($companies as $val): ?>
                <option value="<?= $val['company_code'] ?>"><?= $val['company_name'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <select id="branch_list" name="branch_code" style="width: 200px;"></select><br>

        <?= $this->Form->button('検索') ?>
    </form>
</div>