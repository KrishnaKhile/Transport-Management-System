<?php

namespace App\Controllers\account;
use App\Controllers\BaseController;


use CodeIgniter\HTTP\Request;

class account extends BaseController
{
   
    public function index()
    {
        if (!session()->has('logged_account')) {
            return redirect()->to(base_url() . '/trpadmin/login');
        }
        return view('accountview/account_view');
    }


    

}
