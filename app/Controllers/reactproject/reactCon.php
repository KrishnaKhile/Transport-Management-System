<?php

namespace App\Controllers\reactproject;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\register_model;
class reactCon extends BaseController
{
    use ResponseTrait;
    public $registermodel;
    public function registerUser()
    {
                    $userdata =[
                        'name'=>$this->request->getVar('name'),
                        'mobile'=>$this->request->getVar('mobile'),
                        'email'=>$this->request->getVar('email'),
                        'role'=>$this->request->getVar('role'),
                        'username'=>$this->request->getVar('username',FILTER_SANITIZE_STRING),
                        'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                    ];
                    $this->registermodel->createUser($userdata);
                    $response['data'] =$userdata;
            return $this->respondCreated($response);
        // return view('trpview/register', $data);
    }


    public function demo(){
        echo("hello");
    }


}
