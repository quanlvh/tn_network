<?php
namespace App\Controller;

use App\Controller\AppController;

class CompanyInfoMaintenanceController extends AppController
{
    public function index($page = FALSE)
    {
        $this->viewBuilder()->setLayout('main_2017');
        $this->set('page', $page);
    }
}