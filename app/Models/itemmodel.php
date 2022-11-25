<?php

namespace App\Models;

use CodeIgniter\Model;

class itemmodel extends Model
{
    public function getDataLimit()
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        // $builder->join('maha_tal_dist','maha_tal_dist.id = destination.taluka');
        $builder->where('deleted', 'N');
        $builder->orderBy('d_id', 'DESC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }

    public function getTaluka()
    {
        $db = \config\Database::connect();
        $builder = $db->table('mh_pin');
        $builder->distinct();
        $builder->select('taluka');
        $builder->orderBy('taluka', 'ASC');
        $result = $builder->get()->getResult();
        return $result;
    }
    public function getDist()
    {
        $db = \config\Database::connect();
        $builder = $db->table('mh_pin');
        $builder->distinct();
        $builder->select('dist');
        $builder->orderBy('dist', 'ASC');
        $result = $builder->get()->getResult();
        return $result;
    }

    public function getpin($pin)
    {
        $builder = $this->db->table('mh_pin');
        $builder->where('pincode', $pin);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function checkDuplicate($city)
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        $builder->where('city', $city);
        $result = $builder->get();

        if (count($result->getResultArray()) > 0) {
            return 1;
        }
    }

    public function insertCity($data)
    {
        $builder = $this->db->table('destination');
        $res = $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function checkDuplicateOnUpdate($city, $id)
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        $builder->where('city', $city);
        $builder->where('d_id !=', $id);
        $result = $builder->get();

        if (count($result->getResultArray()) > 0) {
            return 1;
        }
    }

    public function updateCity($data)
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        $builder->where('d_id', $data['d_id']);
        $builder->update(['city' => $data['city'], 'updatedby' => $data['updatedby'], 'taluka' => $data['taluka'], 'dist' => $data['dist'], 'pin' => $data['pin']]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function isDependent($tableName, $fieldName, $val)
    {
        $db = \config\Database::connect();
        $builder = $db->table($tableName);
        $builder->where($fieldName, $val);
        $result = $builder->get();

        if (count($result->getResultArray()) > 0) {
            return 1;
        }
    }

    public function deletedCity($data)
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        $builder->where('d_id', $data['d_id']);
        $builder->update($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }




    // quotation

public function getQuotData($data){
    $db = \config\Database::connect();
    $builder = $db->table('quotation');
    $builder->where(['nor' => $data['nor'],'pickup' => $data['pickup'], 'drop_material' => $data['drop_material']]);
    // $this->db->limit(5);
    $result = $builder->get()->getResultArray();

    // if (count($result->getResultArray()) > 0) {
    //     return $result;
    // }
    return $result;
}



    public function getQuotlimitCity()
    {
        $db = \config\Database::connect();
        $builder = $db->table('destination');
        $builder->where('deleted', 'N');
        $builder->orderBy('d_id', 'DESC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }






    public function checkQuotDuplicate($quotation)
    {
        $db = \config\Database::connect();
        $builder = $db->table('quot');
        $builder->where('quot_name', $quotation);
        $result = $builder->get();

        if (count($result->getResultArray()) > 0) {
            return 1;
        }
    }

    public function createQuot($data)
    {
        $builder = $this->db->table('quot');
        $res = $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getQuotlimit()
    {
        $db = \config\Database::connect();
        $builder = $db->table('quot');
        $builder->where('generated_by', 0);
        $builder->orderBy('id', 'DESC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }

    public function quotGenerateBy($quotid, $generatedBy)
    {
        $db = \config\Database::connect();
        $builder = $db->table('quot');
        $builder->where('id', $quotid);
        $builder->update(['generated_by' => $generatedBy]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function addQuotDetails($data)
    {
        $builder = $this->db->table('quot_details');
        $res = $builder->insert($data);
        if ($this->db->affectedRows() >= 1) {
            return true;
        } else {
            return false;
        }
    }


    public function getCon()
    {
        $db = \config\Database::connect();
        $builder = $db->table('consignor');
        $builder->select('nor_id,nor_name');
        // $builder->join('maha_tal_dist','maha_tal_dist.id = destination.taluka');
        $builder->where('quo_no', 0);
        $builder->orderBy('nor_name', 'ASC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }

    public function getAssignQuotData(){
        $db = \config\Database::connect();
        $builder = $db->table('consignor');
        // $builder->select('nor_id,nor_name');
        $builder->where('quo_no !=', 0);
        $builder->join('quot','quot.id = consignor.quo_no');
        $builder->join('destination','destination.d_id = consignor.nor_city');
        $builder->join('users','users.id = consignor.who_assign_quot');
        $builder->orderBy('nor_name', 'ASC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }


    public function getQuot()
    {
        $db = \config\Database::connect();
        $builder = $db->table('quot');
        $builder->select('id,quot_name');
        // $builder->join('maha_tal_dist','maha_tal_dist.id = destination.taluka');
        $builder->where('generated_by !=', 0);
        $builder->orderBy('quot_name', 'ASC');
        // $this->db->limit(5);
        $result = $builder->get()->getResult();
        return $result;
    }

    public function getNorData($data)
    {
        $builder = $this->db->table('consignor');
        $builder->where('nor_id', $data);
        $builder->join('destination', 'destination.d_id = consignor.nor_city');
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function getNeeData($data)
    {
        $builder = $this->db->table('consignee');
        $builder->where('nee_id', $data);
        $builder->join('destination', 'destination.d_id = consignee.nee_city');
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

public function assignQuotation($data){
    $db = \config\Database::connect();
    $builder = $db->table('consignor');
    $builder->where('nor_id', $data['nor_id']);
    $builder->update(['quo_no' => $data['quo_no'], 'who_assign_quot' => $data['who_assign_quot']]);
    if ($this->db->affectedRows() == 1) {
        return true;
    } else {
        return false;
    }
}

    
}
