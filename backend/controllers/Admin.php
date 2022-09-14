<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Basic_Controller {
    public function __construct(){

        parent::__construct();

        if(!function_exists('password_hash')):
            $this->load->helper('password');
        endif;

    }

    public function index()
    {
        $admin_list = $this->admin->getAdminList();

        $combined_data = "";

        foreach($admin_list as $key => $value):

                $admin[] = $value;

                $admin_count = $this->admin->count();

                $count[$key]['count'] = $admin_count;

                $combined_data[$key] = array_merge($admin[$key],$count[$key]);

        endforeach;

        
        if($combined_data){
             $this->data['admin_list'] = $combined_data;
        }else{
             $this->data['admin_list'] = array();
        }

        $this->load->view('admin_list',$this->data);
    }

    public function add()
    {
		$this->load->view('admin_add',$this->data);
	}

	public function insert()
    {
        $admin_pwd = $this->input->post('admin_pwd');
        $pwd_hash = password_hash($admin_pwd,PASSWORD_BCRYPT);
        $admin_id = $this->input->post('admin_id');
        $count = $this->admin->countAdminId($admin_id);
        if($count != 0) error('AdminID Already Exist');
        $admin_data = array(

        'admin_id' => $this->input->post('admin_id'),
        'admin_nick_name' => $this->input->post('admin_nick_name'),
        'admin_grade' => $this->input->post('admin_grade'), 
        'admin_pwd' => $pwd_hash, 
        'admin_create_time' => time()

        );

        $this->db->insert('admin',$admin_data);
        success('admin/index','Success');
	}

	public function edit()
    {
        $admin_index = $this->uri->segment(3);
        $this->data['admin'] = $this->admin->getAdminById($admin_index);
        $this->load->view('admin_edit',$this->data);
	}

    public function update()
    {
        $admin_index = $this->input->post('admin_index');
        $admin_data = array(

        'admin_id' => $this->input->post('admin_id'),
        'admin_nick_name' => $this->input->post('admin_nick_name'),
        'admin_grade' => $this->input->post('admin_grade')

        );

        $this->db->update('admin',$admin_data,array('admin_index'=>$admin_index));
        success('admin/index','Success');
    }

	public function edit_pwd()
    {
        $admin_index = $this->uri->segment(3);
        $this->data['admin'] = $this->admin->getAdminById($admin_index);
        $this->load->view('admin_edit_pwd',$this->data);
    }

    public function update_pwd()
    {
        $admin_index = $this->input->post('admin_index');
        $data['admin'] = $this->admin->getAdminById($admin_index);
        $admin_pwd = $data['admin']['admin_pwd'];
        $admin_password = $this->input->post('admin_password');
        if(!password_verify($admin_password,$admin_pwd)) error('Old Password Input Error.');
        $admin_new_pwd = $this->input->post('admin_new_pwd');
        $confirm_admin_new_pwd = $this->input->post('confirm_admin_new_pwd');
        if($confirm_admin_new_pwd != $admin_new_pwd) error('Confirm new password error.');
        $pwd_data = array(

            'admin_pwd' => password_hash($admin_new_pwd,PASSWORD_BCRYPT)

            );
        $this->db->update('admin',$pwd_data,array('admin_index'=>$admin_index));
        success('admin/index','Success');
        
    }

	public function remove()
    {
        $admin_index = $this->uri->segment(3);
        $this->db->delete('admin',array('admin_index'=>$admin_index));
        success('admin/index','Success');
	}

	public function ajaxCheckAdmin(){

		$admin_id = $this->input->post('admin_id');

		$query = $this->admin->checkAdminId($admin_id);

		if($query):
			echo "User ID already exists";
		endif;

	}



}