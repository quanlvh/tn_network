<?php
namespace App\Controller;

use App\Controller\AppController;



class MstMenteMenuController extends AppController
{
    public function index()
    {
        //ユーザ情報取得
        $user = $this->request->session()->read('Auth')['User'];

    }
}