<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Basic_Controller {
    public function __construct(){

        parent::__construct();

        if(!function_exists('password_hash')):
            $this->load->helper('password');
        endif;

    }

    public function index()
    {
        $admin_index = $this->session->admin_index;

		$this->data['admin'] = $this->admin->getAdminById($admin_index);

        $this->load->view('profile',$this->data);
    }

	public function update(){

        $admin_index = $this->session->admin_index;

		$admin_nick_name = $this->input->post('admin_nick_name');

		$admin_pwd = "";

		$admin_old_pwd = $this->input->post('admin_old_pwd');

		$admin_new_pwd = trim($this->input->post('admin_new_pwd'));

		if($admin_new_pwd && $admin_new_pwd !=""){
			$admin_pwd = password_hash($admin_new_pwd,PASSWORD_BCRYPT);
		}else{
			$admin_pwd = $admin_old_pwd;
		}
        
        $data = array(
			'admin_pwd' => $admin_pwd,
			'admin_nick_name' => $admin_nick_name
			);

		$query = $this->admin->updateAdmin($admin_index,$data);

        if($query){
			success('main','Success');
		}else{
			error('ERROR');
		}

	}



}