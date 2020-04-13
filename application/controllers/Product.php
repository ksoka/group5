<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Browse_model');
    }

	public function index()
	{
        $data['page']='product/product';
        $data['information']=$this->Browse_model->get_product_information(1);
        $this->load->view('menu/content', $data);
    }
    
}