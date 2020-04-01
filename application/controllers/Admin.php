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


}