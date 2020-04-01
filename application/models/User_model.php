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
    $this->db->where('username',$given_username);
    return $this->db->get()->row('password');
  }

  public function getUsername($username){
    $this->db->select('username');
    $this->db->from('user_accounts');
    $this->db->where('username',$username);
    return $this->db->get()->row('username');
  }
}
