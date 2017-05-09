<div>
	<h3>パスワードリセット</h3>
</div>
<div>
<p>パスワードのリセットを行います。<br />
登録されているIDとメールアドレスを入力してください。一時パスワードが送信されます。</p>
</div>
<?= $this->Form->create('post') ?>
<fieldset>
<div>
<table>
	<tr>
		<td>ログインID</td><td><input type="text" id="user_id" name="user_id" value="" /></td>
	</tr>
	<tr>
		<td>登録メールアドレス</td><td><input type="text" id="mail_addr" name="mail_addr" value="" /></td>
	</tr>
</table>
</fieldset>
<?php if($error === true): ?>
<div>
ログインIDか登録メールアドレスが違うようです。
再度入力をお願いいたします。
</div>
<?php endif; ?>
<?= $this->Form->button('送信') ?>
<?= $this->Form->end() ?>
