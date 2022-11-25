<?php

namespace App\Controllers\trpadmin;

use App\Controllers\BaseController;
use App\Models\dashboardmodel;
use App\Models\itemmodel;

class quotation extends BaseController
{
    public $dmodel;
    public $imodel;
    public $session;
    public function __construct()
    {
        $this->dmodel = new dashboardmodel();
        $this->imodel = new itemmodel();

        $this->session = \config\Services::session();
    }

    public function index()
    {
        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        return view("trpview/cquotation", $data);
    }

    public function loadTalDist()
    {
        $data = [];
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $data['taluka'] = $this->imodel->getTaluka();
        $data['dist'] = $this->imodel->getDist();

        return $this->response->setJSON($data);
    }

    public function talDist()
    {
        $pin = $this->request->getPost('pin');
        // $pin = 414208;
        $data['pincode'] = $this->imodel->getpin($pin);
        return $this->response->setJSON($data);
    }


    public function showData()
    {
        $data = [];
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $data['records'] = $this->imodel->getQuotlimitCity();
        $data['quotrecords'] = $this->imodel->getQuotlimit();

        // print_r($data);
        return $this->response->setJSON($data);
        // return view('trpview/cquotation', $data);
    }

    public function addQuotName()
    {
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));

        $quotation = $this->request->getPost('quot_name');
        // $quotation = "dfg12";

        $createdBy = $data['userdata']->id;

        if ($this->imodel->checkQuotDuplicate($quotation) == 1) {

            // $data = ['status' => 'Duplicate record found..'];
            $data['status'] = "Duplicate record found..";
            return $this->response->setJSON($data);
        } else {
            $data = [
                'quot_name' => $quotation,
                'created_by' => $createdBy,
            ];
            $this->imodel->createQuot($data);
            $data['quotrecords'] = $this->imodel->getQuotlimit();
            $data['status'] = "Record inserted successfully..";
            return $this->response->setJSON($data);
        }
    }

    public function saveQuotation()
    {

        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));

        $generatedBy = $data['userdata']->id;
        $quotid = $this->request->getPost('quotid');
        $this->imodel->quotGenerateBy($quotid, $generatedBy);

        $TableData = $this->request->getPost('TableData');
        $TableData = stripcslashes($TableData);
        $TableData = json_decode($TableData, TRUE);
        // print_r($TableData);
        $myTableRows = count($TableData);
        // $myTableRows = count($TableData);
        // print_r($myTableRows);
        if (!empty($TableData)) {
            for ($i = 0; $i < $myTableRows; $i++) {
                $data = [
                    'quot_no' => $quotid,
                    'city' => $TableData[$i]['rowid'],
                    // 'city' => $TableData[$i]['qty1'],
                    'rs_box' => $TableData[$i]['rsbox'],
                    'rs_kg' => $TableData[$i]['rskg'],

                ];
                $this->imodel->addQuotDetails($data);
            }
        } else {
            echo "No data found";
        }
        $data['status'] = "Quotation Created Successfully.";
        return $this->response->setJSON($data);
    }






    public function assignQuot()
    {

        $id = session()->get('logged_admin');

        $data['userdata'] = $this->dmodel->getLoggedInUserData($id);
        $data['records'] = $this->imodel->getAssignQuotData();

        return view("trpview/assign_quotation", $data);
    }

    public function loadConQuot()
    {
        $data = [];
        $data['consignor'] = $this->imodel->getCon();
        $data['quotation'] = $this->imodel->getQuot();

        return $this->response->setJSON($data);
    }

    public function conData()
    {
        $maxdata = $this->dmodel->getMaxBilty();
        $data['biltynumber'] =  $maxdata['billno'] + 1;
        $conid = $this->request->getPost('norid');
        // $conid =35;
        $data['nordata'] = $this->imodel->getNorData($conid);
        return $this->response->setJSON($data);
    }


    public function getQuotdata()
    {
        $data = [
            'nor' => $this->request->getPost('nor'),
            // 'nor' => 63,
            'pickup' => $this->request->getPost('pickup'),
            // 'pickup' => 1,
            'drop_material' => $this->request->getPost('citynee'),
            // 'drop_material' => 5,

        ];

        $quot=$this->imodel->getQuotData($data);
        // print_r($quot);
        return $this->response->setJSON($quot);
    }


    public function neeData()
    {
        $maxdata = $this->dmodel->getMaxBilty();
        $data['biltynumber'] =  $maxdata['billno'] + 1;
        $neeid = $this->request->getPost('neeid');
        // $conid =35;
        $data['needata'] = $this->imodel->getNeeData($neeid);
        return $this->response->setJSON($data);
    }

    public function assignQuotation()
    {
        $data['userdata'] = $this->dmodel->getLoggedInUserData(session()->get('logged_admin'));
        $assignby = $data['userdata']->id;


        $data = [
            'nor_id' => $this->request->getPost('norname'),
            'quo_no' => $this->request->getPost('quotname'),
            'who_assign_quot' => $assignby,
        ];

        $this->imodel->assignQuotation($data);
        $data['status'] = "Quotation Assign Successfully.";
        return $this->response->setJSON($data);
    }
}
