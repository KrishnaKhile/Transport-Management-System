<?php
namespace App\Models;
use CodeIgniter\Model;
class dashboardmodel extends Model
{
    public function getLoggedInUserData($id)
    {
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->join('role','role.r_id = users.role');
        $result = $builder->get();
        if(count($result->getResultArray()) == 1)
        {
            return $result->getRow();
        }
        else{
            return false;
        }
    }
    public function updateLogoutTime($id){
        $builder = $this->db->table('login_activity');
        $builder->where('la_id',$id);
        $builder->update(['logout_time'=>date('Y-m-d h:i:s')]);
        if($this->db->affectedRows()>0){
            return true;
        }
    }

    public function getLoginUserInfo()
    {
        $builder = $this->db->table('login_activity');
        // $builder->where('user',$id);
        $builder->join('users','users.id = login_activity.user');

        $builder->orderBy('la_id', 'DESC');
        $builder->limit(10);
        $result = $builder->get()->getResult();
        return $result;
        // if(count($result->getResultArray())>0){
        //     return $result->getResult();
        // }
        // else{
        //     return false;
        // }
    }

    public function updateAvatar($path,$id){
        $builder = $this->db->table('users');
        $builder->where('id',$id);
        $builder->update(['profile_pic'=>$path]);
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateUserInfo($data,$id)
    {
        $builder = $this->db->table('users');
        $builder->where('id',$id);
        $builder->update($data);
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    public function updatePassword($renewPassword, $id)
    {
        $builder = $this->db->table('users');
        $builder->where('id',$id);
        $builder->update(['password'=>$renewPassword]);
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function deleteProfilePic($data,$id)
    {
        $builder = $this->db->table('users');
        $builder->where('id',$id);
        $builder->update(['profile_pic'=>$data]);
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
    }


    public function getMaxBilty(){
        // $db= \config\Database::connect();
        // $query = $db->query('SELECT MAX(bilty_number) as billno FROM `bilty` ');
        // $result = $query->getResult();
        // return $result;
        
        $builder = $this->db->table('bilty');
        $builder->select('MAX(bilty_number) as billno', false);
        // $builder->select(MAX('bilty_number'));
        $result = $builder->get();
        
        if(count($result->getResultArray()) == 1){
            return $result->getRowArray();
        }
        else{
            return false;
        }

     }
    public function getNorId(){
        // $db= \config\Database::connect();
        // $query = $db->query('SELECT MAX(bilty_number) as billno FROM `bilty` ');
        // $result = $query->getResult();
        // return $result;
        
        $builder = $this->db->table('consignor');
        $builder->select('MAX(nor_id) as norid', false);
        // $builder->select(MAX('bilty_number'));
        $result = $builder->get();
        
        if(count($result->getResultArray()) == 1){
            return $result->getRowArray();
        }
        else{
            return false;
        }

     }


     public function addBilty($data){
        $builder= $this->db->table('bilty');
        $res=$builder->insert($data);
        if($this->db->affectedRows()==1){
            return true;
        }
        else{
            return false;
        }

    }

    public function addBiltyDetails($data){
        $builder= $this->db->table('biltydetails');
        $res=$builder->insert($data);
        if($this->db->affectedRows()>=1){
            return true;
        }
        else{
            return false;
        }


    }















    


}
