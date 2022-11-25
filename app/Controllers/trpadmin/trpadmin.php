<?php

namespace App\Controllers\trpadmin;

use App\Controllers\BaseController;
use App\Models\dashboardmodel;
use App\Models\normodel;
use App\Models\neemodel;
use App\Models\selectmodel;
use App\Models\itemmodel;
use ReturnTypeWillChange;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class trpadmin extends BaseController
{
    use ResponseTrait;
    public $dmodel;
    public $imodel;
    public $normodel;
    public $session;
    protected $modelName = 'App\Models\dmodel';
    protected $format    = 'json';
    public function __construct()
    {
        $this->dmodel = new dashboardmodel();
        $this->imodel = new itemmodel();
        $this->normodel = new normodel();
        helper("form");
        $this->session = \config\Services::session();
        $this->validator =  \Config\Services::validation();
    }


    public function index()
    {

        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        // $data.headers["Access-Control-Allow-Origin"]="*";
        // return $this->respond($data);
        // return json_encode($data);

        return view('trpview/dashboard', $data);
    }
    public function logout()
    {
        if (session()->has('logged_info')) {
            $la_id = session()->get('logged_info');
            $this->dmodel->updateLogoutTime($la_id);
        }
        session()->remove('logged_admin');
        session()->destroy();
        return redirect()->to(base_url() . '/trpadmin/login');
    }
    public function userprofile()
    {
        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        return view('trpview/user_profile', $data);
    }


    public function avtar()
    {
        $data = [];
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,6024]|ext_in[avatar,png,jpg,gif]',
            ];
            if ($this->validate($rules)) {
                $file = $this->request->getFile('avatar');
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'public\profiles', $file->getRandomName())) {
                        $path = base_url() . '/public/profiles/' . $file->getName();
                        $status = $this->dmodel->updateAvatar($path, session()->get('logged_admin'));
                        if ($status == true) {
                            session()->setTempdata('success', 'Avatar is uploaded successfully', 3);
                            return redirect()->to(base_url() . '/userprofile');
                        } else {
                            session()->setTempdata('error', 'Sorry! Unable to upload Avatar', 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        session()->setTempdata('error', $file->getErrorString(), 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    session()->setTempdata('error', 'You have uploaded in valid file', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view("trpview/user_profile", $data);
    }

    public function edit_profile()
    {
        $data = [];
        $data['validation'] = null;
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required',
                'mobile' => 'required|numeric|exact_length[10]',
                'email' => 'required|valid_email',
                'address' => 'required',
            ];
            if ($this->validate($rules)) {
                $userdata = [
                    'name' => $this->request->getVar('name', FILTER_SANITIZE_STRING),
                    'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_NUMBER_INT),
                    'email' => $this->request->getVar('email'),
                    'address' => $this->request->getVar('address'),
                ];
                if ($this->dmodel->updateUserInfo($userdata, session()->get('logged_admin'))) {
                    session()->setTempdata('success', 'Profile updated successfully', 3);
                    return redirect()->to(base_url() . '/userprofile');
                } else {
                    session()->setTempdata('error', 'Sorry! Unable to update the profile, Try again', 3);
                    return redirect()->to(base_url() . '/userprofile');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        } else {
        }
        return view('trpview/user_profile', $data);
    }








    public function change_password()
    {
        $data = [];
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'password' => 'required',
                'newpassword' => 'required|min_length[6]|max_length[16]',
                'renewpassword' => 'required|matches[newpassword]',
            ];
            if ($this->validate($rules)) {
                $password = $this->request->getVar('password');
                $newpassword = password_hash($this->request->getVar('newpassword'), PASSWORD_DEFAULT);

                if (password_verify($password, $data['userdata']->password)) {
                    if ($this->dmodel->updatePassword($newpassword, session()->get('logged_admin'))) {
                        session()->setTempdata('success', 'Password updated successfully', 3);
                        return redirect()->to(base_url() . '/userprofile');
                    } else {
                        session()->setTempdata('error', 'Sorry! Unable to update the password, Try again', 3);
                        return redirect()->to(base_url() . '/userprofile');
                    }
                } else {
                    session()->setTempdata('error', 'Old password dose not match', 3);
                    return redirect()->to(base_url() . '/userprofile');
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('trpview/user_profile', $data);
    }

    public function delete_profile_pic()
    {
        $data = [];
        $data['validation'] = null;
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $profile = '';
        if ($this->dmodel->deleteProfilePic($profile, session()->get('logged_admin'))) {
            session()->setTempdata('success', 'Profile pic deleted successfully', 3);
            return redirect()->to(base_url() . '/userprofile');
        } else {
            session()->setTempdata('error', 'Sorry! Unable to delete the profile pic, Try again', 3);
            return redirect()->to(base_url() . '/userprofile');
        }

        return view('trpview/user_profile', $data);
    }




    public function loginactivity()
    {

        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);



        // $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $data['login_info'] = $this->dmodel->getLoginUserInfo();
        return view('trpview/login_activity', $data);
    }














    public function B98EG()
    {
        $data = [];
        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        $model = new selectmodel();
        $data['destlist'] = $model->locationSelect();
        $data['moplist'] = $model->mopSelect();
        $data['dlyofficelist'] = $model->dlyofficeSelect();
        $data['pkglist'] = $model->pkgSelect();
        $data['freighttypelist'] = $model->freighttypeSelect();
        $maxdata = $this->dmodel->getMaxBilty();
        $biltyno =  $maxdata['billno'] + 1;
        $data['biltynumber'] = $biltyno;

        return view('trpview/addbilty', $data);
    }

    public function addBilty()
    {
        $maxdata = $this->dmodel->getMaxBilty();
        $biltyno =  $maxdata['billno'] + 1;

        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $enteredby = $data['userdata']->id;

        $data = [
            'bilty_number' => $biltyno,
            'bilty_date' => $this->request->getPost('biltydate'),
            'consignor' => $this->request->getPost('nor'),
            'co_nor' => $this->request->getPost('norco'),
            'consignee' => $this->request->getPost('nee'),
            'co_nee' => $this->request->getPost('neeco'),
            'inv_no' => $this->request->getPost('invno'),
            'inv_date' => $this->request->getPost('invdt'),
            'ewb' => $this->request->getPost('ewb'),
            'inv_amt' => $this->request->getPost('invamt'),
            'distance' => $this->request->getPost('distance'),
            'from_city' => $this->request->getPost('fromcity'),
            'to_city' => $this->request->getPost('tocity'),
            'payment_type' => $this->request->getPost('mop'),
            'dly_office' => $this->request->getPost('dlyoffice'),
            'full_load_freight' => $this->request->getPost('frcharges'),
            'hamali' => $this->request->getPost('hamali'),
            'lr_charges' => $this->request->getPost('doccharges'),
            'dd_charges' => $this->request->getPost('ddcharges'),
            'entered_by' => $enteredby,
            'other_charges' => $this->request->getPost('othercharges'),
            'total_freight' => $this->request->getPost('totalfr'),
            'remark' => $this->request->getPost('remark'),
        ];
        $this->dmodel->addBilty($data);
        $TableData = $this->request->getPost('TableDataItems');
        $TableData = stripcslashes($TableData);
        $TableData = json_decode($TableData, TRUE);
        // print_r($TableData);
        $myTableRows = count($TableData);
        // $myTableRows = count($TableData);
        // print_r($myTableRows);
        if (!empty($TableData)) {
            for ($i = 0; $i < $myTableRows; $i++) {
                $data = [
                    'bilty_id' => $biltyno,
                    'pkg_id' => $TableData[$i]['pkg1'],
                    'qty' => $TableData[$i]['qty1'],
                    'pkg_cat' => $TableData[$i]['pkgc'],
                    'rate' => $TableData[$i]['rate1'],
                    'weight' => $TableData[$i]['pkgweight'],
                    'frtype' => $TableData[$i]['frtype'],
                ];
                $this->dmodel->addBiltyDetails($data);
            }
        } else {
            echo "No data found";
        }
        // print_r($data);
        // return view('trpview/demo', $data);
        $data['biltynumber'] = $biltyno + 1;
        $data['biltyprint'] = $this->request->getPost('biltyprint');
        $data['status'] = "Bilty Added Successfullly";
        // $data = ['status' => 'Bilty Added Successfully'];
        return $this->response->setJSON($data);
    }


    public function getmax()
    {
        $maxdata = $this->dmodel->getMaxBilty();
        // $biltyno =  $maxdata['billno'] + 1;
        // print_r($biltyno);
        // $model = new neemodel();
        // $data['maxvalue'] = $model->neeList();
        $model = new normodel();
        $data['norlist'] = $model->norList();
        // print_r($maxdata);

        // return json_encode($data);
        return $this->respond($data);
        // return view('trpview/demo');
    }

    public function insertapi()
    {
        // $data=[];
        // $data = [
        //     'nor_name' => "krushna krushi seva kendra",
        //     'nor_shortcode' => $this->request->getPost('norshort'),
        //     'nor_email' => $this->request->getPost('noremail'),
        //     'nor_mobile' => $this->request->getPost('normobile'),
        //     'nor_city' => $this->request->getPost('norcity'),
        //     'nor_gstin' => $this->request->getPost('norgstin'),
        //     'nor_payment_type' => $this->request->getPost('norpayment'),
        // ];

        // $this->normodel->addNor($data);


        // $model = new EmployeeModel();
        // $cname=$this->request->getVar('cname');

        $rules = [
            'cname' => 'required',
            'mobile' => 'required|numeric|exact_length[10]',
            'email' => 'required|valid_email|is_unique[consignor.nor_email]',
            'scode' => 'required',
        ];
        if ($this->validate($rules)) {
            $data = [
                'nor_name' => $this->request->getVar('cname'),
                'nor_shortcode'  => $this->request->getVar('scode'),
                'nor_email'  => $this->request->getVar('email'),
                'nor_mobile'  => $this->request->getVar('mobile'),
                // 'nor_city'  => $this->request->getVar('city'),
                // 'nor_gstin'  => $this->request->getVar('nor_gstin'),
                // 'nor_payment_type'  => $this->request->getVar('nor_payment_type'),

            ];

            $this->normodel->addNor($data);
            $norid = $this->dmodel->getNorId();
            $data['nor_id']=$norid['norid'];
            $response['data'] = $data;

            $response['status'] = 201;

        } else {
            $response['valid'] = [
                display_error($this->validator, 'cname'),
                display_error($this->validator, 'scode'),
                display_error($this->validator, 'email'),
                display_error($this->validator, 'mobile'),
            ];
            $response['status'] = 404;

        }

        // $response['status'] =201;

        //      [
        //       'status'   => 201,
        //       'error'    => null,
        //       'messages' => [
        //           'success' => 'Employee created successfully'
        //       ]
        //   ];
        return $this->respondCreated($response);
    }

    public function noreditapi($id)
    {
        $nor = new normodel();
        $findnor = $nor->getNor($id);
        // $data = $findnor;
        return $this->respond($findnor);
        // return $this->response->setJSON($data);
    }


    public function norUpdateapi($id)
    {
        $data = [
            'nor_id' => $id,
            'nor_name' => $this->request->getVar('cname'),
            'nor_shortcode'  => $this->request->getVar('scode'),
            'nor_email'  => $this->request->getVar('email'),
            'nor_mobile'  => $this->request->getVar('mobile'),
            // 'nor_city'  => $this->request->getVar('city'),
            // 'nor_gstin'  => $this->request->getVar('nor_gstin'),
            // 'nor_payment_type'  => $this->request->getVar('nor_payment_type'),

        ];
        $this->normodel->updateNor($data);
        $response['data'] = $data;
        //      [
        //       'status'   => 201,
        //       'error'    => null,
        //       'messages' => [
        //           'success' => 'Employee created successfully'
        //       ]
        //   ];
        return $this->respondCreated($response);
    }


    public function deleteapi($id = null)
    {
        $this->normodel->deleteNor($id);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Employee updated successfully'
            ]
        ];
        return $this->respond($response);
        // $model = new EmployeeModel();
        // $data = $model->where('id', $id)->delete($id);
        // if($data){
        //     $model->delete($id);
        //     $response = [
        //         'status'   => 200,
        //         'error'    => null,
        //         'messages' => [
        //             'success' => 'Employee successfully deleted'
        //         ]
        //     ];
        //     return $this->respondDeleted($response);
        // }else{
        //     return $this->failNotFound('No employee found');
        // }
    }

    public function BE45KL()
    {

        $norname = $this->request->getPost('norname');
        if ($this->normodel->checkDuplicate($norname) == 1) {

            // $data = ['status' => 'Duplicate record found..'];
            $data['status'] = "Duplicate record found..";
            return $this->response->setJSON($data);
        } else {
            $data = [
                'nor_name' => $norname,
                'nor_shortcode' => $this->request->getPost('norshort'),
                'nor_email' => $this->request->getPost('noremail'),
                'nor_mobile' => $this->request->getPost('normobile'),
                'nor_city' => $this->request->getPost('norcity'),
                'nor_gstin' => $this->request->getPost('norgstin'),
                'nor_payment_type' => $this->request->getPost('norpayment'),
            ];
            $this->normodel->addNor($data);
            $data['records'] = $this->normodel->norList();
            $data['status'] = "Record inserted successfully..";
            return $this->response->setJSON($data);
        }
        // $model = new normodel();
        // $data = [
        //     'nor_name' => $this->request->getPost('norname'),
        //     'nor_shortcode' => $this->request->getPost('norshort'),
        //     'nor_email' => $this->request->getPost('noremail'),
        //     'nor_mobile' => $this->request->getPost('normobile'),
        //     'nor_city' => $this->request->getPost('norcity'),
        //     'nor_gstin' => $this->request->getPost('norgstin'),
        //     'nor_payment_type' => $this->request->getPost('norpayment'),
        // ];

        // $model->save($data);
        // $data = ['status' => 'Consignor Added Successfully'];
        // return $this->response->setJSON($data);
    }

    public function fetchnor()
    {
        $model = new normodel();
        $data['norlist'] = $model->norList();
        // print_r($data);
        return $this->response->setJSON($data);
    }
    public function fetchnee()
    {
        $model = new neemodel();
        $data['neelist'] = $model->neeList();
        return $this->respond($data);
        // $data = $model->neeList();
        // return json_encode($data);
        // return $this->response->setJSON($data);
        // return view('trpview/demo', $data);
    }
    // public function fetchcity()
    // {
    //     $model = new normodel();
    //     $norid = $this->request->getPost('cid');
    //    $data['city']=$model->getcity($norid);
    //     return $this->response->setJSON($data);
    // }




    public function BE45NE()
    {
        $model = new neemodel();
        $data = [
            'nee_name' => $this->request->getPost('neename'),
            'nee_shortcode' => $this->request->getPost('neeshort'),
            'nee_email' => $this->request->getPost('neeemail'),
            'nee_mobile' => $this->request->getPost('neemobile'),
            'nee_city' => $this->request->getPost('neecity'),
            'nee_state' => $this->request->getPost('neestate'),
            'nee_pincode' => $this->request->getPost('neepin'),
        ];

        $model->save($data);
        return $this->response->setJSON($data);
    }

    public function B98EF()
    {
        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        $model = new selectmodel();

        $data['destlist'] = $model->locationSelect();
        $data['moplist'] = $model->mopSelect();
        $data['records'] = $this->normodel->norList();

        return view('trpview/consignor', $data);
    }

    public function nortable()
    {
        $nor = new normodel();
        $data['nor'] = $nor->findAll();


        return $this->response->setJSON($data);
    }
    public function norview()
    {
        $nor = new normodel();
        $id = $this->request->getPost('nid');
        $data['nor'] = $nor->getNor($id);
        // print_r($data);
        //return view('trpview/consignor', $data);
        return $this->response->setJSON($data);
    }
    public function noredit()
    {
        $nor = new normodel();
        $id = $this->request->getPost('nid');
        $findnor = $nor->getNor($id);
        $data['nor'] = $findnor;

        return $this->response->setJSON($data);
    }
    public function norupdate()
    {


        $nid = $this->request->getPost('nid');
        $norname = $this->request->getPost('norname');


        if ($this->normodel->checkDuplicateOnUpdateNor($norname, $nid) == 1) {
            $data = ['status' => 'Duplicate record found..'];
            return $this->response->setJSON($data);
        } else {

            $data = [
                'nor_id' => $nid,
                'nor_name' => $norname,
                'nor_shortcode' => $this->request->getPost('norshort'),
                'nor_mobile' => $this->request->getPost('normobile'),
                'nor_email' => $this->request->getPost('noremail'),
                'nor_city' => $this->request->getPost('norcity'),
                'nor_gstin' => $this->request->getPost('norgstin'),
                'nor_payment_type' => $this->request->getPost('norpayment'),
            ];

            $this->normodel->updateNor($data);
            $data['status'] = "Record updated successfully..";
            return $this->response->setJSON($data);
        }





        // $model = new normodel();
        // $id = $this->request->getPost('nor_id');
        // $data = [
        //     'nor_id' => $this->request->getPost('nor_id'),
        //     'nor_name' => $this->request->getPost('nor_name'),
        //     'nor_shortcode' => $this->request->getPost('nor_shortcode'),
        //     'nor_mobile' => $this->request->getPost('nor_mobile'),
        //     'nor_email' => $this->request->getPost('nor_email'),
        //     'nor_city' => $this->request->getPost('nor_city'),
        //     'nor_state' => $this->request->getPost('nor_state'),
        //     'nor_pincode' => $this->request->getPost('nor_pincode'),
        //     'nor_payment_type' => $this->request->getPost('nor_payment_type'),

        // ];
        // $model->where('nor_id', $id)->set($data)->update();
        // $message = ['status' => 'Updated Successfully'];
    }

    public function delete_nor()
    {

        $id = $this->request->getPost('globalrowid');
        if ($this->normodel->isDependentNor('bilty', 'consignor', $id) == 1) {
            $data = ['status' => 'Record can not be deleted..Dependent record found.'];
            return $this->response->setJSON($data);
        } else {

            $this->normodel->deleteNor($id);
            $data['status'] = "Record deleted successfully..";
            return $this->response->setJSON($data);
        }
    }














    // city controller
    public function city()
    {
        $data = [];
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $data['records'] = $this->imodel->getDataLimit();

        return view('trpview/city', $data);
    }


    public function insertCity()
    {
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));

        $city = $this->request->getPost('city');
        // $city = "jhg";
        $createdBy = $data['userdata']->id;

        if ($this->imodel->checkDuplicate($city) == 1) {

            // $data = ['status' => 'Duplicate record found..'];
            $data['status'] = "Duplicate record found..";
            return $this->response->setJSON($data);
        } else {
            $data = [
                'city' => $city,
                'pin' => $this->request->getPost('pincode'),
                'taluka' => $this->request->getPost('taluka'),
                'dist' => $this->request->getPost('dist'),
                'createdby' => $createdBy,
            ];
            $this->imodel->insertCity($data);
            $data['records'] = $this->imodel->getDataLimit();
            $data['status'] = "Record inserted successfully..";
            return $this->response->setJSON($data);
        }
    }




    public function updateCity()
    {

        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $updatedBy = $data['userdata']->id;
        $data = [
            'd_id' => $this->request->getPost('globalrowid'),
            'pin' => $this->request->getPost('pin'),
            'taluka' => $this->request->getPost('taluka'),
            'city' => $this->request->getPost('city'),
            'dist' => $this->request->getPost('dist'),
        ];
        $city = $this->request->getPost('city');

        $id = $this->request->getPost('globalrowid');
        if ($this->imodel->checkDuplicateOnUpdate($city, $id) == 1) {
            $data = ['status' => 'Duplicate record found..'];
            return $this->response->setJSON($data);
        } else {
            $data = [
                'd_id' => $this->request->getPost('globalrowid'),
                'pin' => $this->request->getPost('pin'),
                'taluka' => $this->request->getPost('taluka'),
                'city' => $this->request->getPost('city'),
                'dist' => $this->request->getPost('dist'),
                'updatedby' => $updatedBy,
            ];
            $this->imodel->updateCity($data);
            $data['records'] = $this->imodel->getDataLimit();
            $data['status'] = "Record updated successfully..";
            return $this->response->setJSON($data);
        }
    }
    public function deleteCity()
    {

        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $deletedby = $data['userdata']->id;

        $id = $this->request->getPost('globalrowid');
        if ($this->imodel->isDependent('bilty', 'from_city', $id) == 1) {
            $data = ['status' => 'Record can not be deleted..Dependent record found.'];
            return $this->response->setJSON($data);
        } else {

            $data = [
                'd_id' => $id,
                'deleted' => 'Y',
                'deletedby' => $deletedby,
            ];
            $this->imodel->deletedCity($data);
            $data['records'] = $this->imodel->getDataLimit();
            $data['status'] = "Record deleted successfully..";
            return $this->response->setJSON($data);
        }
    }
}
