<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Basic_Controller {

    public function __construct(){

        parent::__construct();

		$this->load->model('User_model', 'user');

        if(!function_exists('password_hash')):
            $this->load->helper('password');
        endif;

    }

    public function index()
    {

	    $this->data['user_list'] = $this->user->getUserList();

		$this->data['user_gender'] = $this->enumvalue->user_gender;

		$this->data['user_status'] = $this->enumvalue->user_status;

		$this->data['user_authority'] = $this->enumvalue->user_authority;

        $this->load->view('user_list',$this->data);

    }

	public function view(){

		$user_index = $this->uri->segment(3);

		$this->data['user'] = $this->user->getUserInfo($user_index);

		$this->data['user_gender'] = $this->enumvalue->user_gender;

		$this->data['user_status'] = $this->enumvalue->user_status;

		$this->data['user_authority'] = $this->enumvalue->user_authority;

		$this->load->view('user_view',$this->data);

	}

	public function edit(){

		$user_index = $this->uri->segment(3);

		$this->data['user'] = $this->user->getUserInfo($user_index);

		$this->data['user_gender'] = $this->enumvalue->user_gender;

		$this->data['user_status'] = $this->enumvalue->user_status;

		$this->data['user_authority'] = $this->enumvalue->user_authority;

		$this->load->view('user_edit',$this->data);

	}

	public function update(){

		$user_index = $this->input->post('user_index');

		$data = array(
			'user_authority' => $this->input->post('user_authority'),
			'user_status' => $this->input->post('user_status')
			);

	    $query = $this->user->updateUser($user_index,$data);

		if($query){
			success('user','Success');
		}else{
			error('ERROR');
		}

	}

	public function remove(){

		$user_index = $this->uri->segment(3);

		$query = $this->user->deleteUser($user_index);

		if($query){
            success('user','Success');
		}else{
			error('ERROR');
		}

	}







}