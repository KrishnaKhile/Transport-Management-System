<?php

namespace App\Models;

use CodeIgniter\Model;

class register_model extends Model
{
    public function createUser($userdata){
        $builder= $this->db->table('users');
        $res=$builder->insert($userdata);
        if($this->db->affectedRows()==1){
            return true;
        }
        else{
            return false;
        }

    }

    public function roleSelect(){
        $db= \config\Database::connect();
        $query = $db->query('SELECT * FROM `role`');
        $result = $query->getResult();
       // $ordercount=count($result);
       // print_r($ordercount);
        if(count($result)>0)
        {
           return $result;
        }
        else
        {
           return false;
        }
  
     }

}
