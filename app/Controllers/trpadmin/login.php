<?php

namespace App\Controllers\trpadmin;

use App\Controllers\BaseController;
use App\Models\login_model;
use App\Models\dashboardmodel;

use CodeIgniter\HTTP\Request;

class login extends BaseController
{
    public $loginmodel;
    public $dmodel;
    public $session;
    public function __construct()
    {
        helper('form', 'array');
        $this->loginmodel = new login_model();
        $this->session = session();
        $this->dmodel = new dashboardmodel();
    }

    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required|min_length[6]|max_length[16]',
            ];
            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $userdata = $this->loginmodel->verifyUsername($username);
                if ($userdata) {
                    if (password_verify($password, $userdata['password'])) {
                        if ($userdata['role'] == 1) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_admin', $userdata['id']);
                            return redirect()->to(base_url() . '/dashboard');
                        } elseif ($userdata['role'] == 2) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),
                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_driver', $userdata['id']);
                            return redirect()->to(base_url() . '/driver/driver/');
                        } elseif ($userdata['role'] == 3) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_dlyoffice', $userdata['id']);
                            return redirect()->to(base_url() . '/dlyoffice/dlyoffice/');
                        } elseif ($userdata['role'] == 4) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_consignor', $userdata['id']);
                            return redirect()->to(base_url() . '/consignor/consignor/');
                        } elseif ($userdata['role'] == 5) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_hr', $userdata['id']);
                            return redirect()->to(base_url() . '/hr/hr/');
                        } elseif ($userdata['role'] == 6) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_account', $userdata['id']);
                            return redirect()->to(base_url() . '/account/account/');
                        } elseif ($userdata['role'] == 7) {
                            $logininfo = [
                                'user' => $userdata['id'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time' => date('Y-m-d h:i:s'),

                            ];
                            $la_id = $this->loginmodel->saveLoginInfo($logininfo);
                            if ($la_id) {
                                $this->session->set('logged_info', $la_id);
                            }

                            $this->session->set('logged_assistant', $userdata['id']);
                            return redirect()->to(base_url() . '/assistant/assistant/');
                        } else {
                            $this->session->setTempdata('error', 'Sorry! Invalid credentials.', 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setTempdata('error', 'Invalid! Username or Password.', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setTempdata('error', 'Invalid! Username or Password.', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('trpview/login_view', $data);
    }



    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser();
        } elseif ($agent->isRobot()) {
            $currentAgent = $this->agent->robot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }

    public function passforgot()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'email' => [
                    'label' => 'Email',
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => '{field} field required',
                        'valid_email' => 'Valid {field} required'
                    ]
                ],
            ];
            if ($this->validate($rules)) {
               // $username = $this->request->getVar('username', FILTER_SANITIZE_STRING);
                $email = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
                $userdata = $this->loginmodel->verifyEmail($email);
                if (!empty($userdata)) {
                    if ($this->loginmodel->updatedAt($userdata['id'])) {
                        $to = $email;
                        $subject = 'Reset Password Link';
                        $token = $userdata['id'];
                        $message = 'Hi ' . $userdata['name'] . '<br><br>'
                            . 'Your reset password request has been received. Please click '
                            . ' the below link to reset your password.<br><br>'
                            . '<a href="' . base_url() . '/trpadmin/login/reset_password/' . $token . '">Click here to Reset Password</a><br><br>'
                            . 'Thanks<br>Krushna LogiTech';
                        $email = \Config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('study.krushna@gmail.com', 'khile');
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        if ($email->send()) {
                            session()->setTempdata('success', 'Reset password link sent to your registred email. Please verify with in 15mins', 3);
                            return redirect()->to(base_url() . '/trpadmin/login');
                        } else {
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    } else {
                        $this->session->setTempdata('error', 'Sorry! Unable to update. try again', 3);
                        return redirect()->to(base_url() . '/trpadmin/login');
                    }
                    
                } else {
                    $this->session->setTempdata('error', 'Email does not exists', 3);
                    return redirect()->to(base_url() . '/trpadmin/login');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('trpview/login_view', $data);
    }

    public function reset_password($token = null)
    {
        $data = [];
        if (!empty($token)) {
            $userdata = $this->loginmodel->verifyToken($token);
            // print_r($userdata);
            if (!empty($userdata)) {
                if ($this->checkExpiryDate($userdata['updated_at'])) {
                    if ($this->request->getMethod() == 'post') {
                        $rules = [
                            'pass' => [
                                'label' => 'Password',
                                'rules' => 'required|min_length[6]|max_length[16]',
                            ],
                            'cpass' => [
                                'label' => 'Confirm Password',
                                'rules' => 'required|matches[cpass]'
                            ],
                        ];
                        if ($this->validate($rules)) {
                            $pass = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
                            if ($this->loginmodel->updatePassword($token, $pass)) {
                                session()->setTempdata('success', 'Password updated successfully, Login now', 3);
                                return redirect()->to(base_url() . '/trpadmin/login');
                            } else {
                                session()->setTempdata('error', 'Sorry! Unable to update Password. try again', 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            $data['validation'] = $this->validator;
                        }
                    }
                } else {
                    $data['error'] = 'Reset password link was expired.';
                }
            } else {
                $data['error'] = 'Unable to find user account';
            }
        } else {
            $data['error'] = 'Sorry! Unauthourized access';
        }
        return view('trpview/reset_passowrd_view', $data);
    }

    public function checkExpiryDate($time)
    {
        $timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);
        if ($timeDiff < 600) {
            return true;
        } else {
            return false;
        }
    }
}
