<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_data extends CI_Controller {

    public function __contruct()
    {
        parent::__construct();
    }

    function add_data(){
        $productname=$this->input->post('name');
        $productamount=$this->input->post('quantity');
        $productprice=$this->input->post('price');
        $productimage=$this->input->post('image');

        $this->load->model('Add_data_model');
        $insert_data=array(
            'name'=>$productname,
            'quantity'=>$productamount,
            'price'=>$productprice,
            'image'=>$productimage
        );

        $testproduct=$this->add_data_model->getProductname($productname);

        if($testproduct == $productname){
            $data['show_feedback']=TRUE;
            $data['message']='This product already exists';
            $data['page']='Admin/admin';
            $this->load->view('admin/admin',$data);
        }
        else{
            $test=$this->Add_data_model->add_add_data($insert_data);
            $this->load->view('admin/admin',$data);
        }
        }
        
    }


   

/* End of file Add_data.php */
 
 ?>
