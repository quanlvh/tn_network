<?php
namespace App\Controller;

use App\Controller\AppController;

class CompanyInfoMaintenanceController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('main_2017');
    }

}