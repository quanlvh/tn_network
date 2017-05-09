<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Log\Log;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\Mailer\Email;
use Cake\Network\Exception\NotFoundException;

class ForgetpassController extends AppController
{
	/*
	 * パスワードリセット
	 */
	public function index()
	{
		$this->Users = TableRegistry::get('Users');

		$this->pageTitle = "Reset Your Password";
		$this->set("error", false);

		if($this->request->is('post')) {
			$Users = TableRegistry::get('Users');
			$query = $Users->query();
			Log::debug('通ったよ');
			$user = $this->request->data['user_id'];
			$mailAdr = $this->request->data['mail_addr'];
			$tmpPass = $this->TmpPass();
			$chPass = $this->chPassword($tmpPass);

			if($user and $mailAdr) {
				$query = $Users->find()->hydrate(false);
				$data = $query->all();

				foreach ($data as $row){
					if (($row['user_id'] == $user) && ($row['mail_addr'] == $mailAdr)) {
						//echo $row['user_id']." => ".$row['mail_addr']."<br />\n";
						Log::debug($this->chPassword($tmpPass));
						$password = $this->chPassword($tmpPass);
						date_default_timezone_set('Asia/Tokyo');
						$password_update_date = date('Y-m-d H:i:s');
						Log::debug($password_update_date);
						if($query->update()
								->set(['password' => $this->chPassword($tmpPass),
										'password_update_date' => $password_update_date
								])
								->where(['id' => $row['id']])
								->execute()) {
								$this->send($this->Mailtext($tmpPass));
							$this->set("error", false);
							$this->Flash->success(__('パスワードをメールいたしました。'));
							$this->redirect('/Users/login');
						} else {
							$this->Flash->success(__('データ更新に失敗しました。'));
							$this->set("error", false);
						}
					} else {
						$this->set("error", true);
					}
				}

			} else {
				Log::debug('エラー');
				//$this->Flash->success(__('ログインID、登録メールアドレスを確認してください。'));
				$this->set("error", true);
			}
		}

	}

	/*
	 * メール送信処理
	 *
	 */
	public function send($MailText)
	{
		$email = new Email();
		$email->from(['admin@ids.co.jp' => '管理人'])
			  ->to($this->request->data['mail_addr'])
			  ->subject('パスワードリセットのお知らせ')
			  ->send($MailText);
	}

	/**
	 * メール本文
	 */
	public function Mailtext($tmpPass)
	{
		$this->_val = "";
		$this->_val .= "アカウント ".$this->request->data['user_id']." 様からの";
		$this->_val .= "リセット後のパスワードは ".$tmpPass." になります。\n";
		$this->_val .= "ログイン後にパスワードの変更をお願いいたします。";

		return $this->_val;
	}

	/**
	 * 一時パスワード生成
	 *
	 */
	public function TmpPass($length = 8)
	{
		return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 0, $length);
	}

	/*
	 * パスワードのハッシュ化
	 */
	public function chPassword($value)
	{
		$hasher = new DefaultPasswordHasher();
		return $hasher->hash($value);
	}

	/*
	 * パスワード更新
	 */
	public function PassUpDate()
	{

	}

}