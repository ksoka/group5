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

}
