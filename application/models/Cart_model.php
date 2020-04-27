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
      if(!in_array($key, $_SESSION['ids']))
      {
      array_push($_SESSION['ids'], $key);
      }
    }
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where_in('id_products',$_SESSION['ids']);
    return $this->db->get()->result_array();
   }

  public function getUserID()
  {
    $this->db->select('id_user');
    $this->db->from('user_accounts');
    $this->db->where('username',$_SESSION['username']);
    return $this->db->get()->row('id_user');
  }

  public function getPrice($id_products)
  {
    $this->db->select('price');
    $this->db->from('products');
    $this->db->where('id_products',$id_products);
    return $this->db->get()->row('price');
  }

  public function getName($id_products)
  {
    $this->db->select('name');
    $this->db->from('products');
    $this->db->where('id_products',$id_products);
    return $this->db->get()->row('name');
  }
}