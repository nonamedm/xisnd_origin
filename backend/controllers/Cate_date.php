<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate_date extends Basic_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->admin_index):
            header('Location:'.site_url('login'));
            exit;
        endif;

		$this->load->model('Cate_date_model', 'c_date');
		$this->load->library('EnumValue','enumvalue');
		
	}

	public function cate_list()
	{	
		$this->data['is_option'] = $this->enumvalue->is_option;
		$this->fetchCateDateData($site_url = '/cate_date/cate_list/',$limit = 15);
		$this->load->view('cate_date/cate_date_list',$this->data);
	}
	public function add_cate()
	{
		$this->load->view('cate_date/add_cate',$this->data);
	}
	public function insert_cate()
	{
		
		$data = array(
			'category_date_name' => $this->input->post('category_date_name'),
			'category_date_sort' => $this->input->post('category_date_sort'),
			'is_option'=>$this->input->post('is_option')
			);
		$this->c_date->insert_date($data);
		success('cate_date/cate_list','Success.');
	}
	public function edit_cate()
	{
		$category_date_index = $this->uri->segment(3);
		$this->data['single_cate'] = $this->c_date->getSingleCate($category_date_index);
		$this->load->view('cate_date/edit_cate',$this->data);
	}
	public function update_cate()
	{
		$category_date_index = $this->input->post('category_date_index');
		$data = array(
			'category_date_name'	=> $this->input->post('category_date_name'),
			'category_date_sort' 	=> $this->input->post('category_date_sort'),
			'is_option'=>$this->input->post('is_option')
			);
		$this->c_date->update_date($data,$category_date_index);
		success('cate_date/cate_list','Success.');
	}
	public function remove()
	{
		$category_date_index = $this->uri->segment(3);
		$this->c_date->delete_cate($category_date_index);
		success('cate_date/cate_list','Success');
	}

}
