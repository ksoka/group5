<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
        $data['page']='user/user';
        $this->load->view('menu/content', $data);
    }

    public function show_user()
    {
        $data['user']=$this->User_model->getUserInfo();
        //print_r($data);
        $data['user_products']=$this->User_model->getUserProducts();
        $data['page']='user/user';
        $this->load->view('menu/content', $data);
    }
    public function edit_user()
    {
        $id_user=$this->input->post('id_user');
        $plain_password=$this->input->post('password');

        if(strlen($plain_password) > 0)
        {
            $hashed_password=password_hash($plain_password,PASSWORD_DEFAULT);
            $update_data=array(
                'password'=>$hashed_password,
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'city'=>$this->input->post('city'),
                'zip'=>$this->input->post('zip'),
                'address'=>$this->input->post('address'),
                'phone'=>$this->input->post('phone')
            );
        }
        else{
            $update_data=array(
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'city'=>$this->input->post('city'),
                'zip'=>$this->input->post('zip'),
                'address'=>$this->input->post('address'),
                'phone'=>$this->input->post('phone')
            );
        }


        $test=$this->User_model->UpdateUser($id_user, $update_data);
        if ($test==0)
        {
            $data['show_feedback']=TRUE;
            $data['message']='Something went wrong';
            $data['page']='user/user';
            $data['page']='user/user';
            $data['user']=$this->User_model->getUserInfo();
            $data['user_products']=$this->User_model->getUserProducts();
            $this->load->view('menu/content',$data);

        }
        else
        {
            $data['show_feedback']=TRUE;
            $data['message']='Your information updated succesfully';
            $data['page']='user/user';
            $data['user']=$this->User_model->getUserInfo();
            $data['user_products']=$this->User_model->getUserProducts();
            $data['page']='user/user';
            $this->load->view('menu/content',$data);
       
        }
    }

}
