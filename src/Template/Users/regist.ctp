<?php $this->assign('title','ユーザー登録申請')?>
<?= $this->Html->css('UserMaster/regist/styles.css') ?>
<?= $this->Html->css('data/styles.css') ?>

<?= $this->Html->css('newtheme/skin.css') ?>
<?= $this->Html->css('newtheme/style.css') ?>

<?= $this->Html->script('UserMaster/regist/data.js') ?>
<?= $this->Html->script('data/document.js') ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<?= $this->Form->create() ?>
<div>
  <table class="table table-default table-bordered table-text">
  <!-- Begin Table Header -->
  <thead>
  <tr>
      <th colspan="4">ユーザー登録申請</th>
  </tr>
  </thead>
  <!-- Close Table Header -->
  <!-- Begin Table Body -->
  <tbody>
  <!-- Begin Row -->
  <tr>
      <td width="20%">ユーザーID</td>
      <td><?= $this->Form->input('user_id',['label'=> false,'type'=>'text','placeholder'=>'半角で入力ください。','id'=>'u6264_input','required'=>true,'style'=>'ime-mode:disabled','class'=>'form-control']) ?></td>
  </tr>
  <tr>
      <td>ユーザー名</td>
      <td><?= $this->Form->input('user_name',['label'=>false,'type'=>'text','id'=>'u6269_input','required'=>true,'class'=>'form-control']) ?></td>
  </tr>
  <tr>
      <td>メールアドレス1</td>
      <td><?= $this->Form->input('mail_addr_1',['label'=> false,'type'=>'text','id'=>'u6272_input','required'=>true,'class'=>'form-control']) ?></td>
  </tr>
  <tr>
      <td>メールアドレス2</td>
      <td><?= $this->Form->input('mail_addr_2',['label'=> false,'type'=>'text','id'=>'u6272a_input','required'=>false,'class'=>'form-control']) ?></td>
  </tr>
  <tr>
      <td>所属会社</td>
      <td>
        <select class="form-control parent" name="company_code" required>
          <option value="" class="msg" disabled selected>---所属会社の選択---</option>
          <?php foreach ($companies as $value):?>
            <?php if($value['company_code']===$post->company_code):?>
              <option value="<?= h($value['company_code']) ?>" selected><?= h($value['company_name'])?></option>
            <?php else:?>
              <option value="<?= h($value['company_code']) ?>"><?= h($value['company_name'])?></option>
            <?php endif;?>
          <?php endforeach;?>
        </select>
      </td>
  </tr>
  <tr>
      <td>所属事業所</td>
      <td>
        <select class="form-control children" name="branch_code" disabled required>
          <option value="" class="msg" disabled selected>--所属事業所の選択--</option>
          <?php foreach ($branch as $val):?>
            <?php if ($val['branch_code'] === $post['branch_code']):?>
              <option value="<?= h($val['branch_code'])?>" data-val="<?= h($val['company_code']) ?>" selected><?= h($val['branch_name']) ?></option>
            <?php else:?>
              <option value="<?= h($val['branch_code'])?>" data-val="<?= h($val['company_code']) ?>"><?= h($val['branch_name']) ?></option>
            <?php endif;?>
          <?php endforeach;?>
        </select>      
      </td>
  </tr>
  <tr>
      <td>役職</td>
      <td><?= $this->Form->input('position',['label'=>false,'type'=>'text','id'=>'u6281_input', 'class'=>'form-control']) ?></td>
  </tr>
  <!-- Close Row -->
  </tbody>
  <!-- Close Table Body -->
  </table>
</div>
<div>
  <div class="form-actions text-right">
      <button class="btn-default" onclick="window.location.href='/Users/login';">戻る</button>
      <button class="btn-warning" onclick="submit();">申請</button>
  </div>
</div>
<?= $this->Form->hidden('password',['value'=> $tmp_pass]) ?>
<?= $this->Form->hidden('password_conf',['value'=> $tmp_conf]) ?>
<?= $this->Form->hidden('user_role',['value'=> $tmp_role]) ?>
<?= $this->Form->hidden('applying',['value'=> $tmp_apply]) ?>
<?= $this->Form->hidden('created_at',['value'=> $created_at]) ?>
<?= $this->Form->end() ?>
<?= $this->Html->script('Useres/add/select_work.js') ?>
</body>
