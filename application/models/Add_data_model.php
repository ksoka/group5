<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class add_data_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function add_add_data($insert_data){
        $this->db->insert('products',$insert_data);
        return $this->db->affecter_rows();
    }
    public function getProductname($productname){
        $this->db->select('name');
        $this->db->from('products');
        $this->db->where('name',$productname);
        return $this->db->get()->row('name');
    }

}

/* End of file ModelName.php */

 ?>