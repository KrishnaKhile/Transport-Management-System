<?php
namespace App\Models;
use CodeIgniter\Model;
class selectmodel extends Model
{

    public function norSelect(){
        $db= \config\Database::connect();
        $query = $db->query('SELECT * FROM `consignor`');
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
    public function neeSelect(){
        $db= \config\Database::connect();
        $query = $db->query('SELECT * FROM `consignee`');
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
    public function locationSelect(){
      $builder = $this->db->table('destination');
      $builder->orderBy('city', 'ASC');

        $result = $builder->get()->getResult();
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
    public function mopSelect(){
        $db= \config\Database::connect();
        $query = $db->query('SELECT * FROM `mop`');
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
    public function dlyofficeSelect(){
      $builder = $this->db->table('users');
      $where = "role='3'";
      $builder->where($where);

      $result = $builder->get()->getResult();
      // return $result;
      if(count($result) > 0)
      {
         return $result;
      }
      else{
          return false;
      }
  
     }
    public function pkgSelect(){
      $builder = $this->db->table('pkg');

      $result = $builder->get()->getResult();
      // return $result;
      if(count($result) > 0)
      {
         return $result;
      }
      else{
          return false;
      }
  
     }
    public function freighttypeSelect(){
      $builder = $this->db->table('freight_type');

      $result = $builder->get()->getResult();
      // return $result;
      if(count($result) > 0)
      {
         return $result;
      }
      else{
          return false;
      }
  
     }

   

   
  
}
