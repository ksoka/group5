<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Cart_model');
      $this->load->model('User_model');
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
      $data['item_info']=$this->Cart_model->getProduct();
      //if there is no products in shopping cart it redirects user to empty cart page
      if(empty($_SESSION['ids'][0]))
      {
        redirect('Cart/empty');
      }
      else
      {
        //print_r($data);
        $data['page']='Cart/cart';
        $this->load->view('menu/content',$data);     
      } 
    }
    
    //User empties their
    //also if they try to go to cart when they don't have anything in it
    function empty()
    {
      $_SESSION['cart']=array();
      $_SESSION['ids']=array();
      $data['page']='Cart/empty';
      $this->load->view('menu/content',$data);  
    }

    function confirmation()
    {
      $data['page']='Cart/confirmation';
      $data['userInfo']=$this->User_model->getUserInfo();
      $this->load->view('menu/content',$data); 
    }

    //This function pushes bought items into purchased database
    function purchase()
    {
      //loops pushes as many times as there are different products
      for ($i=0; $i<count($_SESSION['ids']); $i++)
      {
        $id_user=$this->Cart_model->getUserID();
        $id_products=$_SESSION['ids'][$i];
        $amount=$_SESSION['cart'][$id_products];
        $priceForOne=$this->Cart_model->getPrice($id_products);
        $price=($priceForOne*$amount);
          
        $insert_data=array(
          'time'=>date("d/m/Y"),
          'id_user'=>$id_user,
          'id_products'=>$id_products,
          'amount'=>$amount,
          'price'=>$price,
        );
        $this->db->insert('purchased',$insert_data);
      }
      //empties cart and ids when one has bought the items
      $_SESSION['cart']=array();
      $_SESSION['ids']=array();
      $data['page']='Cart/purchase';
      $this->load->view('menu/content',$data);  
    }
    //this function is purely for testing different arrays and their behavior
    //Can be deleted after the program is ready
    function testing()
    {
      $id_user=$this->Cart_model->getUserID();
      echo $id_user.'<br>';
      echo 'this is ids : ';
      print_r($_SESSION['ids']);
      echo '<br> this is cart: ';
      print_r($_SESSION['cart']);
    }

}