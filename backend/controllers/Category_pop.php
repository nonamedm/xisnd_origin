<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_pop extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_Pop_model', 'category_pop');
	}

	public function index()
	{
		$category_pop_list = $this->category_pop->getCategoryPopList();

		$combined_data = "";

		foreach($category_pop_list as $key => $value):

			    $category_pop[] = $value;

                $category_pop_count = $this->category_pop->count();

				$count[$key]['count'] = $category_pop_count;

                $combined_data[$key] = array_merge($category_pop[$key],$count[$key]);

		endforeach;

		
		if($combined_data){
			 $this->data['category_pop_list'] = $combined_data;
		}else{
			 $this->data['category_pop_list'] = array();
		}

		$this->load->view('category_pop_list',$this->data);

	}
	public function add()
	{
		$this->load->view('category_pop_add' ,$this->data);
	}
	public function insert()
	{
		
        $category_pop_data = array(

	    'category_pop_name' => $this->input->post('category_pop_name'),
	    'category_pop_url' => $this->input->post('category_pop_url'),
        'category_pop_created_time' => time()

	    );
	    $this->db->insert('category_pop',$category_pop_data);
	    success('category_pop/index','Success');	
	}
	public function edit()
	{
		$category_pop_index = $this->uri->segment(3);
		$this->data['category_pop'] = $this->category_pop->check_category_pop($category_pop_index);
		$this->load->view('category_pop_edit',$this->data);
	}
	public function update()
	{
		$category_pop_index = $this->input->post('category_pop_index');
		$category_pop_data = array(

	    'category_pop_name' => $this->input->post('category_pop_name'),
	    'category_pop_url' => $this->input->post('category_pop_url')

	    );
	    $this->db->update('category_pop',$category_pop_data,array('category_pop_index'=>$category_pop_index));
	    success('category_pop/index','Success');	

	}
	public function remove()
	{
		$category_pop_index = $this->uri->segment(3);
		$this->category_pop->delete_category_pop($category_pop_index);
		success('category_pop/index','Success');
	}
    

}
