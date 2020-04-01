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
}