<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('browse_model');
    }

    public function browse(){
        $data['Browseitems']=$this->Browse_model->get_products();
        $this->load->view('browse/show_itmes',$data);
      }
}