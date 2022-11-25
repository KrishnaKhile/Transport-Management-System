<?php
namespace App\Models;
use CodeIgniter\Model;
class normodel extends Model
{

   public function checkDuplicate($data)
   {
       $db = \config\Database::connect();
       $builder = $db->table('consignor');
       $builder->where('nor_name', $data);
       $result = $builder->get();

       if (count($result->getResultArray()) > 0) {
           return 1;
       }
   }

   public function addNor($data)
   {
       $builder = $this->db->table('consignor');
       $res = $builder->insert($data);
       if ($this->db->affectedRows() == 1) {
           return true;
       } else {
           return false;
       }
   }

   public function getNor($norid){
      $db= \config\Database::connect();
      $builder = $db->table('consignor');
      $builder->where('nor_id', $norid);
    //   $builder->join('destination', 'destination.d_id = consignor.nor_city');
    //   $builder->join('mop', 'mop.id = consignor.nor_payment_type');
    //   $builder->orderBy('nor_id', 'DESC');
      
      $result= $builder->get()->getRow();
      //print_r($result);

     return $result;
     
     
   }

   public function checkDuplicateOnUpdateNor($norname, $id)
   {
       $db = \config\Database::connect();
       $builder = $db->table('consignor');
       $builder->where('nor_name', $norname);
       $builder->where('nor_id !=', $id);
       $result = $builder->get();

       if (count($result->getResultArray()) > 0) {
           return 1;
       }
   }

   public function updateNor($data)
   {
       $db = \config\Database::connect();
       $builder = $db->table('consignor');
       $builder->where('nor_id', $data['nor_id']);
       $builder->update(['nor_name' => $data['nor_name'], 'nor_shortcode' => $data['nor_shortcode'], 'nor_mobile' => $data['nor_mobile'], 'nor_email' => $data['nor_email']]);
       if ($this->db->affectedRows() == 1) {
           return true;
       } else {
           return false;
       }
   }

   public function isDependentNor($tableName, $fieldName, $val)
   {
       $db = \config\Database::connect();
       $builder = $db->table($tableName);
       $builder->where($fieldName, $val);
       $result = $builder->get();

       if (count($result->getResultArray()) > 0) {
           return 1;
       }
   }

   public function getCity($city){
      $db= \config\Database::connect();
      //$query = $this->$db->getWhere(`transaction`,['$transactionid' => $transactionid]);
      $query = $db->query('SELECT * FROM `destination` where 	d_id='.$city);
      $result= $query->getRow();
      //print_r($result);
     return $result;
     
     
   }


   public function norList(){
      $db= \Config\Database::connect();
      $builder = $db->table('consignor');
      // $builder->select('*');
    //   $builder->join('destination', 'destination.d_id = consignor.nor_city');
    //   $builder->join('mop', 'mop.id = consignor.nor_payment_type');
    //   $builder->orderBy('nor_name', 'DESC');
      $query = $builder->get()->getResult();
      return $query;
   }
  
public function deleteNor($nid)
{
   $builder = $this->db->table('consignor');
        $builder->where('nor_id',$nid);
        $builder->delete();
        if($this->db->affectedRows()>0){
            return true;
        }
        else{
            return false;
        }
}
   

   
  
}
?>