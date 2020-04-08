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
}