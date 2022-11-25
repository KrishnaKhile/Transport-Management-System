<?php

namespace App\Controllers\hr;
use App\Controllers\BaseController;


use CodeIgniter\HTTP\Request;

class hr extends BaseController
{
   
    public function index()
    {
        if (!session()->has('logged_hr')) {
            return redirect()->to(base_url() . '/trpadmin/login');
        }
        return view('hrview/hr_view');
    }


    

}
