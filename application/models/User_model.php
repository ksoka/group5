<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserInfo()
    {
        $id_user = 1; //This should indicate to the user who is currently logged in
        $this->db->select('*');
        $this->db->from('user_accounts');
        $this->db->where('id_user',$id_user);
        return $this->db->get()->result_array();
    }

}