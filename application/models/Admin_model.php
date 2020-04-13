<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }
  //Getting all the informations of all the users
  public function getAllUsersInfo()
  {
    $this->db->select('*');
    $this->db->from('user_accounts');
    return $this->db->get()->result_array();
  }
  public function getAllProducts()
  {
    $this->db->select('*');
    $this->db->from('products');
    return $this->db->get()->result_array();
  }
  public function UpdateUsers($id_user, $update_data)
  {
    $this->db->where('id_user',$id_user);
    $this->db->update('user_accounts',$update_data);
    return $this->db->affected_rows();
  }

  public function deleteUser($id_user){
    $this->db->where('id_user',$id_user);
    $this->db->delete('user_accounts');
    return $this->db->affected_rows();
  }
  public function UpdateProducts($id_products, $update_data)
  {
    $this->db->where('id_products',$id_products);
    $this->db->update('products',$update_data);
    return $this->db->affected_rows();
  }

  public function deleteProducts($id_products){
    $this->db->where('id_products',$id_products);
    $this->db->delete('products');
    return $this->db->affected_rows();
  }

}