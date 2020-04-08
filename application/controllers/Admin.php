<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
      $this->load->model('Admin_model');
      $data['allUsers']=$this->Admin_model->getAllUsersInfo();
    }
    
        // Loading the login page with footer and header
        function index()
        {
          $data['page']='Admin/admin';
          $data['allUsers']=$this->Admin_model->getAllUsersInfo();
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

    //for admin to edit the users
    public function edit_users()
    {
      $id_user=$this->input->post('id_user');
      $username=$this->input->post('username');
      $update_data=array(
          'username'=>$this->input->post('username'),          
          'firstname'=>$this->input->post('firstname'),
          'lastname'=>$this->input->post('lastname'),
          'city'=>$this->input->post('city'),
          'zip'=>$this->input->post('zip'),
          'address'=>$this->input->post('address'),
          'phone'=>$this->input->post('phone')
        );

      $testname=$this->User_model->getUsername($username);
      //testing if the username already exists. The username has to be unique
      if($testname == $username)
      {
        $data['show_feedback']=TRUE;
        $data['message']='Username already taken';
        $data['page']='Admin/admin';
        $data['allUsers']=$this->Admin_model->getAllUsersInfo();
        $this->load->view('menu/content',$data);
      }
      else //testing if the users information got updated or not
      {   
        $test=$this->Admin_model->UpdateUsers($id_user, $update_data);
        if($test==0)
        {
          $data['show_feedback']=TRUE;
          $data['message']='Something went wrong. Please try again';
          $data['page']='admin/admin';
          $data['allUsers']=$this->Admin_model->getAllUsersInfo();
          $this->load->view('menu/content',$data);
        }
        else
        {
          $data['show_feedback']=TRUE;
          $data['message']='Information updated succesfully';
          $data['page']='admin/admin';
          $data['allUsers']=$this->Admin_model->getAllUsersInfo();
          $this->load->view('menu/content',$data);
        }
      }
    }

    public function delete_user()
    {
      $id_user=$this->input->post('id_user');
      $test=$this->Admin_model->deleteUser($id_user);
      if($test==0){
        $data['show_feedback']=TRUE;
        $data['message']='Something went wrong. Please try again';
        $data['page']='admin/admin';
        $data['allUsers']=$this->Admin_model->getAllUsersInfo();
        $this->load->view('menu/content',$data);
      }
      else
      {
        $data['show_feedback']=TRUE;
        $data['message']='User deleted succesfully';
        $data['page']='admin/admin';
        $data['allUsers']=$this->Admin_model->getAllUsersInfo();
        $this->load->view('menu/content',$data);
      }
    }
}   