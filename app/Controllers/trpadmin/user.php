<?php

namespace App\Controllers\trpadmin;
use App\Controllers\BaseController;
use App\Models\register_model;

class user extends BaseController
{
    public $registermodel;
    public $session;
    public function __construct(){
        helper("form");
        $this->registermodel=new register_model();
        $this->session = \config\Services::session();
    }
    
    public function index()
    {
        $data = [];
        $data['rolelist'] = $this->registermodel->roleSelect();
        $rules =[
            'name' => 'required',
            'mobile' => 'required|numeric|exact_length[10]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'role' => 'required',
            'username' =>[ 
                'rules'=>'required|min_length[4]|max_length[40]|is_unique[users.username]',
                'errors'=> [
                    'is_unique'=>'The username is already exists',

                ],
            
            ],
            'password' => 'required|min_length[6]|max_length[16]',
            'cpassword' => 'required|matches[password]',

        ];
        if($this->request->getMethod() == 'post')
            {
                if($this->validate($rules)){
                    $userdata =[
                        'name'=>$this->request->getVar('name'),
                        'mobile'=>$this->request->getVar('mobile'),
                        'email'=>$this->request->getVar('email'),
                        'role'=>$this->request->getVar('role'),
                        'username'=>$this->request->getVar('username',FILTER_SANITIZE_STRING),
                        'password'=>password_hash($this->request->getVar('password'),PASSWORD_DEFAULT),
                    ];
                   if( $this->registermodel->createUser($userdata)){
                    //echo "Account created succussfully.";
                    $this->session->setTempdata('success','Account created succussfully',3);
                    return redirect()->to(base_url() . '/register');

                   }
                   else{
                    $this->session->setTempdata('error','Sorry! Unable to create an account, Try again.',3);
                    return redirect()->to(base_url() . '/register');
                   }

                }
                else{
                    $data['validation']=$this->validator;
                }

            }
        return view('trpview/register', $data);
    }


}
