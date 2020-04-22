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
        $product = htmlspecialchars($_GET["product"]);
        $data['page']='product/product';
        $data['information']=$this->Browse_model->get_product_information($product);
        $this->load->view('menu/content', $data);
    }
    function notlog()
	{
        $product=$this->input->post('item_id');
        $data['show_feedback']=TRUE;
        $data['message']='You must log in for placing an order<br> 
                        <a href="'.site_url('login').'" class="btn btn-primary marginTop">log in </a>';
        $data['page']='product/product';
        $data['information']=$this->Browse_model->get_product_information($product);
        $this->load->view('menu/content', $data);
    }
    
}