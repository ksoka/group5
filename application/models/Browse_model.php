<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Browse_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function get_products(){
        $this->db->select('*');
        $this->db->from('products');
        return $this->db->get()->result_array();
    }
    public function get_image($id){
        $this->db->select('image');
        $this->db->from('products');
        $this->db->where('id_products',$id);
        return $this->db->get()->row('image');
    }

}

/* End of file ModelName.php */
