<?php
namespace App\Controller;

use App\Controller\AppController;

class AvailableAreasMaintenanceController extends AppController
{
    public function index()
    {
        $this->viewBuilder()->setLayout('main_2017');
    }

}