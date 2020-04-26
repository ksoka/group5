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
      $data['page']='login/login';
      $this->load->view('menu/content',$data);
    }
    
    // Checking whether the credentials exist in the database and if they are correct
    // If they exist the session tokens will be set
    public function login(){
      $given_username=$this->input->post('username');
      $given_password=$this->input->post('password');
      $this->load->model('User_model');

      // Checking if the password matches the existing one
      $db_password=$this->User_model->getPassword($given_username);
      $db_admin=$this->User_model->getAdmin($given_username);
      // Setting the session tokens
      if (password_verify($given_password, $db_password)){
          $_SESSION['logged_in']=true;
          $_SESSION['username']=$given_username;
          $_SESSION['admin']=$db_admin;
          if(empty($_SESSION['cart']))
          {
            $_SESSION['cart'] = array();
            $_SESSION['ids']= array();
          }
          //Redirect to admin if admin or browse if user
          if($_SESSION['admin']==1){
            redirect('Admin');
          }
          else{
            redirect('Browse/browse');
          }
      }

      // Password did not match
      else {
          $_SESSION['logged_in']=false;
          $data['show_feedback']=TRUE;
          $data['message']='Login unsuccessful!';
          $data['page']='login/login';
          $this->load->view('menu/content',$data);
          //redirect('login/index');
      }
    }

    // Setting the session token "logged in" to false -> logged out
    public function logout(){
      $_SESSION['logged_in']=false;
      $_SESSION['username']="";
      $_SESSION['admin']="";
      $_SESSION['cart']="";
      $_SESSION['ids']="";
      $data['show_feedback']=TRUE;
      $data['message']='You successfully logged out';
      $data['page']='login/login';
      $this->load->view('menu/content',$data);
    }


    function add_user(){
      $username=$this->input->post('username2');
      $lastname=$this->input->post('lastname');
      $plain_password=$this->input->post('password2');
      $hashed_password=password_hash($plain_password,PASSWORD_DEFAULT);
      $firstname=$this->input->post('firstname');
      $address=$this->input->post('address');
      $city=$this->input->post('city');
      $zip=$this->input->post('zip');
      $phone=$this->input->post('phone');
      $admin= "0";
            
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
        $data['page']='login/login';
        $this->load->view('menu/content',$data);
      }
      else{
        $test=$this->User_model->addUser($insert_data);
        $data['show_feedback']=TRUE;
        $data['message']='Account created!';
        $data['page']='login/login';
        $this->load->view('menu/content',$data);
      }
   }
}