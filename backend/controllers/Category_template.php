<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_template extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_model', 'template');
	}

	public function index(){

		$this->data['category_template_list'] = $this->template->getCategoryTemplate();

		$this->load->view('category_template_list',$this->data);

	}

	public function add(){

		$this->load->view('category_template_add' ,$this->data);

	}

	public function insert(){
		
        $data = array(
			'category_template_url'    => $this->input->post('category_template_url'),
			'category_template_name'    => $this->input->post('category_template_name'),
			'category_template_module'    => $this->input->post('category_template_module')
			);

        $query = $this->template->insertCategoryTemplate($data);

		if($query){
			success('category_template','Success');
		}else{
			error('Error');
		}

	}

	public function edit(){

        $category_template_index = $this->uri->segment(3);

		$this->data['template'] = $this->template->getSingleCategoryTemplate($category_template_index);

		$this->load->view('category_template_edit',$this->data);

	}

	public function update(){

		$category_template_index = $this->input->post('category_template_index');
		
        $data = array(
			'category_template_url'    => $this->input->post('category_template_url'),
			'category_template_name'    => $this->input->post('category_template_name'),
			'category_template_module'    => $this->input->post('category_template_module')
			);

        $query = $this->template->updateCategoryTemplate($category_template_index,$data);       
     
		if($query){
			success('category_template','Success');
		}else{
			error('Error');
		}

	}

	public function remove(){

		$category_template_index = $this->uri->segment(3);

		$query = $this->template->deleteCategoryTemplate($category_template_index);

		if($query){
			success('category_template','Success');
		}else{
			error('Error');
		}

	}


}
