<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
    }
    
    // Loading the login page with footer and header
    function index()
    {
      $data['page']='Login/login';
      $this->load->view('menu/content',$data);
    }
    
    // Checking whether the credentials exist in the database and if they are correct
    // If they exist the session is set to "logged in"
    public function login(){
      $given_username=$this->input->post('username');
      $given_password=$this->input->post('password');
      $this->load->model('User_model');

      // Checking if the password matches the existing one
      $db_password=$this->User_model->getPassword($given_username);
      if (password_verify($given_password, $db_password)){
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$given_username;
          redirect('Browse/browse');
      }

      // Password did not match
      else {
          $_SESSION['logged_in']=false;
          $data['show_feedback']=TRUE;
          $data['message']='Login unsuccessful!';
          $data['page']='Login/login';
          $this->load->view('menu/content',$data);
          //redirect('login/index');
      }
    }

    // Setting the session token "logged in" to false -> logged out
    public function logout(){
      $_SESSION['logged_in']=false;
      $data['show_feedback']=TRUE;
      $data['message']='You successfully logged out';
      $data['page']='Login/login';
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
        $data['page']='Login/login';
        $this->load->view('menu/content',$data);
      }
      else{
        $test=$this->User_model->addUser($insert_data);
        redirect('Login');
      }

      //echo $test;
      //print_r($insert_data);
    }
}