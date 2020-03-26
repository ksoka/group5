<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
        $this->load->view('user/user');
    }
    
    public function show_user()
    {
        $data['user']=$this->User_model->getUserInfo();
        //print_r($data);
        $data['page']='user/user';
        $this->load->view('user/user', $data);
    }
    public function edit_user()
    {
        
    }

}
