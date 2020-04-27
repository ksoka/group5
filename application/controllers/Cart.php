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
      //checking if the cart is empty or not
      if(count($_SESSION['cart']))
      {
        //print_r($data);
        $item_id=$this->input->post('item_id');
        $quantity=$this->input->post('quantity');
        $data['item_info']=$this->Cart_model->getProduct();
        $data['page']='cart/cart';
        $this->load->view('menu/content',$data); 
      }
       //if there is no products in shopping cart it redirects user to empty cart page
      else
      {
        redirect('Cart/empty');
      }
    }

    function add()
    {
      $test;
      $item_id=$this->input->post('item_id');
      $quantity=$this->input->post('quantity');
      //if in cart there is already an entry for item_id it increases the quantity
      if (isset($item_id,$_SESSION['cart'][$item_id]))
      {
        for ($i=0; $i<$quantity; $i++)
        {
        $_SESSION['cart'][$item_id]++;
        }
        if($_SESSION['cart'][$item_id]>1000)
        {
          $_SESSION['cart'][$item_id]=1000 ;
          $test=1;
        }
      }
      //if in cart there is no entry for item_id, it creates it with the quantity
      else
      {
      $_SESSION['cart'][$item_id]=$quantity;
      }
      if ($test==1)
      {
        $test=0;
        $data['show_feedback']=TRUE;
        $data['message']='You can order maximum 1000 units per product. Please contact our customer service if needing more';
        $data['item_info']=$this->Cart_model->getProduct();
        $data['page']='cart/cart';
        $this->load->view('menu/content',$data);
      }
      else{
        redirect('Cart'); 
      }
     
    }

    //User empties their cart
    //also if they try to go to cart when they don't have anything in it
    function empty()
    {
      $_SESSION['cart']=array();
      $_SESSION['ids']=array();
      $data['page']='cart/empty';
      $this->load->view('menu/content',$data);  
    }

    function confirmation()
    {
      $data['page']='cart/confirmation';
      $data['userInfo']=$this->User_model->getUserInfo();
      $this->load->view('menu/content',$data); 
    }

    //This function pushes bought items into purchased database
    function purchase()
    {
      //loops pushes rows into purchased as many times as there are different products
      for ($i=0; $i<count($_SESSION['ids']); $i++)
      {
        if (isset($_SESSION['ids'][$i]))
        {
          $id_user=$this->Cart_model->getUserID();
          $id_products=$_SESSION['ids'][$i];
          $amount=$_SESSION['cart'][$id_products];
          $name=$this->Cart_model->getName($id_products);
          $priceForOne=$this->Cart_model->getPrice($id_products);
          $price=($priceForOne*$amount);
            
          $insert_data=array(
            'time'=>date("d/m/Y"),
            'id_user'=>$id_user,
            'id_products'=>$id_products,
            'amount'=>$amount,
            'price'=>$price,
            'name'=>$name
          );
          $this->db->insert('purchased',$insert_data);
        }
      }
      //empties cart and ids when one has bought the items
      $_SESSION['cart']=array();
      $_SESSION['ids']=array();
      $data['page']='cart/purchase';
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

    function delete()
    {
      $id_product=htmlspecialchars($_GET["id_for_delete"]);
      if (($key = array_search($id_product, $_SESSION['ids'])) !== false) 
      {
        unset($_SESSION['ids'][$key]);
      }
      unset($_SESSION['cart'][$id_product]);
      redirect('cart');
    }
}
