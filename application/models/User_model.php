<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  // Inserting the data from add_user into the database
  public function addUser($insert_data){
    $this->db->insert('user_accounts',$insert_data);
    return $this->db->affected_rows();
  }

  // Getting the password(hash) from the database
  public function getPassword($given_username){
    $this->db->select('password');
    $this->db->from('user_accounts');
    $this->db->where('lastname',$given_username);
    return $this->db->get()->row('password');
  }

  //Getting all the information of the logged in user
  public function getUserInfo()
  {
    $id_user = $_SESSION['username']; //This indicates to the user who is currently logged in
    $this->db->select('*');
    $this->db->from('user_accounts');
    $this->db->where('lastname',$id_user);
    return $this->db->get()->result_array();
  }
  public function UpdateUser($id_user, $update_data)
  {
    $this->db->where('id_user',$id_user);
    $this->db->update('user_accounts',$update_data);
    return $this->db->affected_rows();
  }

  //Gets all the lines from purchased products that are made by the logged in user
  public function getUserProducts()
  {
    // Sub Query  
    $username = $_SESSION['username']; //This indicates to the user who is currently logged in  
    $this->db->select('id_user');
    $this->db->from('user_accounts');
    $this->db->where('lastname',$username);
    $sub_query = $this->db->get_compiled_select();
    // // Main Query
    $this->db->select('*');
    $this->db->from('purchased');
    $this->db->where("id_user IN ($sub_query)");
    //$query = $this->db->get()->result_array();
    return $this->db->get()->result_array();
  }


}
