<?php

namespace App\Controllers\assistant;
use App\Controllers\BaseController;


use CodeIgniter\HTTP\Request;

class assistant extends BaseController
{
   
    public function index()
    {
        if (!session()->has('logged_assistant')) {
            return redirect()->to(base_url() . '/trpadmin/login');
        }
        return view('assistantview/assistant_view');
    }


    

}
