<?php

namespace App\Controllers\dlyoffice;
use App\Controllers\BaseController;


use CodeIgniter\HTTP\Request;

class dlyoffice extends BaseController
{
   
    public function index()
    {
        if (!session()->has('logged_driver')) {
            return redirect()->to(base_url() . '/trpadmin/login');
        }
        return view('driverview/driver_view');
    }


    

}
