<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function getProduct($item_id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('id_products',$item_id);
    return $this->db->get()->result_array();
   }
}