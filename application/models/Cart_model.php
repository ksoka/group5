<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }

  public function getProduct()
  {
    foreach ($_SESSION['cart'] as $key=>$value)
    {
      array_push($_SESSION['ids'], $key);
    }
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where_in('id_products',$_SESSION['ids']);
    return $this->db->get()->result_array();
   }
}