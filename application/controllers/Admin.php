<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      // Checking whether user is logged in and if admin is set
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['admin']== 1 ){
        //do nothing
      }
      else {
        redirect('login');
      }
      $this->load->model('User_model');
      $this->load->model('Admin_model');
      //These two variables loads all the information for the users table and products table
      $this->load->vars('allUsers', $this->Admin_model->getAllUsersInfo());
      $this->load->vars('allProducts', $this->Admin_model->getAllProducts());
    }
    
        // Loading the login page with footer and header
        function index()
        {
          $data['page']='admin/admin';
          $this->load->view('menu/content',$data);
          
        }


        // Adding a user by sending the given information to the database
        // Currently anyone can do this but this should later only be able if logged in user is admin
        // Will be on the admin panel 
    function add_user(){
        $username=$this->input->post('username');
        $username=strtolower($username);
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
          $data['page']='admin/admin';
          $this->load->view('menu/content',$data);
        }
        else{
          $test=$this->User_model->addUser($insert_data);
          redirect('Admin');
        }
        redirect('Admin');
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
      $currentUsername=$this->input->post('username');
      //testing if the username already exists. The username has to be unique
      if($testname != $currentUsername && $testname == $username)
      {
        $data['show_feedback']=TRUE;
        $data['message']='Username already taken';
        $data['page']='admin/admin';
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
          $this->load->view('menu/content',$data);
        }
        else
        {
          $data['show_feedback']=TRUE;
          $data['message']='Information updated succesfully';
          $data['page']='admin/admin';
          $this->load->view('menu/content',$data);
        }
      }
      redirect('Admin');
    }

    public function delete_user()
    {
      $id_user=$this->input->post('id_user');
      $test=$this->Admin_model->deleteUser($id_user);
      if($test==0){
        $data['show_feedback']=TRUE;
        $data['message']='Something went wrong. Please try again';
        $data['page']='admin/admin';
        $this->load->view('menu/content',$data);
      }
      else
      {
        $data['show_feedback']=TRUE;
        $data['message']='User deleted succesfully';
        $data['page']='admin/admin';
        $this->load->view('menu/content',$data);
      }
      redirect('Admin');
    }

  //for admin to edit the products
  public function edit_products()
  {
    $id_products=$this->input->post('id_products');
    $update_data=array(
      'name'=>$this->input->post('name'),          
      'quantity'=>$this->input->post('quantity'),
      'price'=>$this->input->post('price'),
      'image'=>$this->input->post('image'),
      'info'=>$this->input->post('info')
    );
    //to test if the update was succesfull or not:
    $test=$this->Admin_model->UpdateProducts($id_products, $update_data);
    if($test==0)
    {
      $data['show_feedback']=TRUE;
      $data['message']='Something went wrong. Please try again';
      $data['page']='admin/admin';
      $this->load->view('menu/content',$data);
    }
    else
    {
      $data['show_feedback']=TRUE;
      $data['message']='Information updated succesfully';
      $data['page']='admin/admin';
      $this->load->view('menu/content',$data);
    }
    redirect('Admin');
  }

  public function delete_products()
    {
      $id_products=$this->input->post('id_products');
      $test=$this->Admin_model->deleteProducts($id_products);
      if($test==0){
        $data['show_feedback']=TRUE;
        $data['message']='Something went wrong. Please try again';
        $data['page']='admin/admin';
        $this->load->view('menu/content',$data);
      }
      else
      {
        $data['show_feedback']=TRUE;
        $data['message']='Products deleted succesfully';
        $data['page']='admin/admin';
        $this->load->view('menu/content',$data);
      }
     redirect('Admin');
    }

    function adding_data(){

        $config['upload_path']          = './assets/Images/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);

        $productname=$this->input->post('name');
        $productamount=$this->input->post('quantity');
        $productprice=$this->input->post('price');
        $productimage=$this->input->post('image');
        $productinfo=$this->input->post('info');

        $this->load->model('Add_data_model');
        $insert_data=array(
            'name'=>$productname,
            'quantity'=>$productamount,
            'price'=>$productprice,
            'image'=>$productimage,
            'info'=>$productinfo
        );

        $testproduct=$this->Add_data_model->getProductname($productname);

            if($testproduct == $productname){
                $data['show_feedback']=TRUE;
                $data['message']='This product already exists';
                $data['page']='admin/admin';
                $this->load->view('menu/content',$data);
            }
            else{
              
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                }
      
                $test=$this->Add_data_model->add_add_data($insert_data);
                //$data['page']='Admin/admin';
                //$this->load->view('menu/content',$data);
                redirect('Admin');
              }
              redirect('Admin');
    }

    // Takes the searchbar(user_id) input and sends it to the modal to check for similar entries
    function user_id_search(){
      $user_id = $this->input->post('user_id_search');
      $data['result'] = $this->User_model->returnOnId($user_id);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(username) input and sends it to the modal to check for similar entries
    function username_search(){
      $username = $this->input->post('username_search');
      $data['result'] = $this->User_model->returnOnUsername($username);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(firstname) input and sends it to the modal to check for similar entries
    function firstname_search(){
      $firstname = $this->input->post('firstname_search');
      $data['result'] = $this->User_model->returnOnFirstname($firstname);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(lastname) input and sends it to the modal to check for similar entries
    function lastname_search(){
      $lastname = $this->input->post('lastname_search');
      $data['result'] = $this->User_model->returnOnLastname($lastname);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(city) input and sends it to the modal to check for similar entries
    function city_search(){
      $city = $this->input->post('city_search');
      $data['result'] = $this->User_model->returnOnCity($city);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(zip) input and sends it to the modal to check for similar entries
    function zip_search(){
      $zip = $this->input->post('zip_search');
      $data['result'] = $this->User_model->returnOnZip($zip);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(address) input and sends it to the modal to check for similar entries
    function address_search(){
      $address = $this->input->post('address_search');
      $data['result'] = $this->User_model->returnOnAddress($address);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }

     // Takes the searchbar(phone) input and sends it to the modal to check for similar entries
    function phone_search(){
      $phone = $this->input->post('phone_search');
      $data['result'] = $this->User_model->returnOnPhone($phone);
      $data['page'] = 'admin/admin';
      $data['load_search'] = true;
      $this->load->view('menu/content',$data);
    }
}   
