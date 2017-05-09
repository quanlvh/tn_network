<div>
	<h3>パスワードの変更</h3>
	<fieldset>
<?php
echo $this->Form->create();

echo $this->Form->input('password_now', ['type'=>'password', 'label'=>'使用中のパスワード']);
echo $this->Form->input('password', ['type'=>'password', 'label'=>'新しいパスワード']);
echo $this->Form->input('password_conf', ['type'=>'password', 'label'=>'新しいパスワード（確認）']);
?>
	</fieldset>
<?= $this->Form->button('パスワード変更') ?>
<?= $this->Form->end() ?>
</div>