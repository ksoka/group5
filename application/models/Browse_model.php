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
    

}

/* End of file ModelName.php */
