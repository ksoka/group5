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

    // Getting the password(hash) from the database
    public function getAdmin($given_username){
      $this->db->select('admin');
      $this->db->from('user_accounts');
      $this->db->where('username',$given_username);
      return $this->db->get()->row('admin');
    }

  //Getting all the information of the logged in user
  public function getUserInfo()
  {
    $id_user = $_SESSION['username']; //This indicates to the user who is currently logged in
    $this->db->select('*');
    $this->db->from('user_accounts');
    $this->db->where('username',$id_user);
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
    $this->db->where('username',$username);
    $sub_query = $this->db->get_compiled_select();
    // // Main Query
    $this->db->select('*');
    $this->db->from('purchased');
    $this->db->where("id_user IN ($sub_query)");
    //$query = $this->db->get()->result_array();
    return $this->db->get()->result_array();
  }

  public function getUsername($username){
    $this->db->select('username');
    $this->db->from('user_accounts');
    $this->db->where('username',$username);
    return $this->db->get()->row('username');
  }

  // Returns all user Data on a given id search string
  public function returnOnId($user_id){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('id_user', $user_id);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given username search string
  public function returnOnUsername($username){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('username', $username);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given firstname search string
  public function returnOnFirstname($firstname){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('firstname', $firstname);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given lastname search string
  public function returnOnLastname($lastname){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('lastname', $lastname);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given city search string
  public function returnOnCity($city){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('city', $city);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given zip search string
  public function returnOnZip($zip){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('zip', $zip);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given address search string
  public function returnOnAddress($address){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('address', $address);
    return $this->db->get()->result_array();
  }

  // Returns all user Data on a given phone search string
  public function returnOnPhone($phone){
    $this->db->select('id_user,firstname,lastname,city,zip,address,phone,username');
    $this->db->from('user_accounts');
    $this->db->like('phone', $phone);
    return $this->db->get()->result_array();
  }

}
