<?php

namespace App\Models;

use CodeIgniter\Model;

class login_model extends Model
{
    public function verifyUsername($username){
        $builder = $this->db->table('users');
        $builder->select("id,role,username,password");
        $builder->where('username', $username);
        $result = $builder->get();
        if(count($result->getResultArray()) == 1){
            return $result->getRowArray();
        }
        else{
            return false;
        }
        

    }


    public function saveLoginInfo($data)
    {
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return $this->db->insertID();
        }
        else
        {
            return false;
        }
    }

    public function verifyEmail($email){
       
        $builder = $this->db->table('users');
        $builder->select("id,name,username,password");
        $builder->where('email',$email);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }


    public function updatedAt($id){
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function verifyToken($token){
        $builder = $this->db->table('users');
        $builder->select("id,username,updated_at");
        $builder->where('id',$token);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
    public function updatePassword($id,$pass){
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->update(['password'=>$pass]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
