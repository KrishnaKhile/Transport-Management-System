<?php

namespace App\Controllers\consignor;
use App\Controllers\BaseController;


use CodeIgniter\HTTP\Request;

class consignor extends BaseController
{
   
    public function index()
    {
        if (!session()->has('logged_consignor')) {
            return redirect()->to(base_url() . '/trpadmin/login');
        }
        return view('consignorview/consignor_view');
    }


    

}
