<?php
namespace App\Models;
use CodeIgniter\Model;
class neemodel extends Model
{

   protected $table = 'consignee';
   protected $primarykey = 'nee_id';
   protected $allowedFields =[
      'nee_name',
      'nee_shortcode',
      'nee_email',
      'nee_mobile',
      'nee_city',
      'nee_state',
      'nee_pincode',
   ];


   public function neeList(){
      $db= \Config\Database::connect();
      $builder = $db->table('consignee');
      // $builder->select('*');
      $builder->join('destination', 'destination.d_id = consignee.nee_city');
      // $builder->join('mop', 'mop.id = consignor.nor_payment_type');
      $builder->orderBy('nee_name', 'ASC');
      $query = $builder->get()->getResult();
      return $query;
   }

   

   
  
}
