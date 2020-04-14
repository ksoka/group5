<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Cart_model');
    }
    
    // Loading the cart page with footer and header
    //also with session token it loads the items in the shopping cart
    function index()
    {
      $item_id=$this->input->post('item_id');
      $quantity=$this->input->post('quantity');
      //if in cart there is already an entry for item_id it increases the quantity
      if (isset($item_id,$_SESSION['cart'][$item_id]))
      {
        for ($i=0; $i<$quantity; $i++)
        {
        $_SESSION['cart'][$item_id]++;
        } 
      }
      //if in cart there is no entry for item_id, it creates it with the quantity
      else
      {
      $_SESSION['cart'][$item_id]=$quantity;
      }
      //if there is no products in shopping cart it redirects user to empty cart page
      if(empty($_SESSION['cart'][$item_id]))
      {
        redirect('Cart/empty');
      }
      else
      {
        $data['item_info']=$this->Cart_model->getProduct();
        //print_r($data);
        $data['page']='Cart/cart';
        $this->load->view('menu/content',$data);     
      } 
    }
    
    //User empties their cart
    function empty()
    {
      $_SESSION['cart']=array();
      $_SESSION['ids']=array();
      $data['page']='Cart/empty';
      $this->load->view('menu/content',$data);  
    }
    function purchase()
    {
      //here insert purchased things to the database or something
      $data['page']='Cart/purchase';
      $this->load->view('menu/content',$data);  
    }

}