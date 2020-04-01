<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
    }
    
        // Loading the login page with footer and header
        function index()
        {
          $data['page']='Admin/admin';
          $this->load->view('menu/content',$data);
        }


        // Adding a user by sending the given information to the database
        // Currently anyone can do this but this should later only be able if logged in user is admin
        // Will be on the admin panel 
    function add_user(){
        $username=$this->input->post('username');
        $lastname=$this->input->post('lastname');
        $plain_password=$this->input->post('password');
        $hashed_password=password_hash($plain_password,PASSWORD_DEFAULT);
        $firstname=$this->input->post('fname');
        $address=$this->input->post('address');
        $city=$this->input->post('city');
        $zip=$this->input->post('zip');
        $phone=$this->input->post('phone');
        $admin=$this->input->post('admin');
        // Checking if the radio button for admin priviliges checked
        if(isset($admin)){
          $admin = 1 ;
        }
        else{
          $admin = 0 ;
        }
              
        $this->load->model('User_model');
        $insert_data=array(
          'password'=>$hashed_password,
          'firstname'=>$firstname,
          'lastname'=>$lastname,
          'city'=>$city,
          'zip'=>$zip,
          'address'=>$address,
          'phone'=>$phone,
          'admin'=>$admin,
          'username'=>$username
        );
  
        $testname=$this->User_model->getUsername($username);
  
        if($testname == $username){
          $data['show_feedback']=TRUE;
          $data['message']='Username already taken';
          $data['page']='Admin/admin';
          $this->load->view('menu/content',$data);
        }
        else{
          $test=$this->User_model->addUser($insert_data);
          redirect('Admin');
        }
    }

}