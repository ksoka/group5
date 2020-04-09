<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Cart_model');
    }
    
    // Loading the cart page with footer and header
    function index()
    {
        $item_id=$this->input->post('item_id');
        $data['quantity']=$this->input->post('quantity');
        $data['item_info']=$this->Cart_model->getProduct($item_id);
        $data['page']='Cart/cart';
        $this->load->view('menu/content',$data);     
    } 

}