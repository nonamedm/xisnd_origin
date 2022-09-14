<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_slide extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Category_Slide_model', 'category_slide');
	}

	public function index()
	{
		$category_slide_list = $this->category_slide->getCategorySlideList();

		$combined_data = "";

		foreach($category_slide_list as $key => $value):

			    $category_slide[] = $value;

                $category_slide_count = $this->category_slide->count();

				$count[$key]['count'] = $category_slide_count;

                $combined_data[$key] = array_merge($category_slide[$key],$count[$key]);

		endforeach;

		
		if($combined_data){
			 $this->data['category_slide_list'] = $combined_data;
		}else{
			 $this->data['category_slide_list'] = array();
		}

		$this->load->view('category_slide_list',$this->data);

	}
	public function add()
	{
		$this->load->view('category_slide_add' ,$this->data);
	}
	public function insert()
	{
		
        $category_slide_data = array(

	    'category_slide_name' => $this->input->post('category_slide_name'),
	    'category_slide_width' => $this->input->post('category_slide_width'),
	    'category_slide_height' => $this->input->post('category_slide_height'),
        'category_slide_created_time' => time()

	    );
	    $this->db->insert('category_slide',$category_slide_data);
	    success('category_slide/index','Success');	
	}
	public function edit()
	{
		$category_slide_index = $this->uri->segment(3);
		$this->data['category_slide'] = $this->category_slide->check_category_slide($category_slide_index);
		$this->load->view('category_slide_edit',$this->data);
	}
	public function update()
	{
		$category_slide_index = $this->input->post('category_slide_index');
		$category_slide_data = array(

	    'category_slide_name' => $this->input->post('category_slide_name'),
	    'category_slide_width' => $this->input->post('category_slide_width'),
	    'category_slide_height' => $this->input->post('category_slide_height')

	    );
	    $this->db->update('category_slide',$category_slide_data,array('category_slide_index'=>$category_slide_index));
	    success('category_slide/index','Success');	

	}
	public function remove()
	{
		$category_slide_index = $this->uri->segment(3);
		$this->category_slide->delete_category_slide($category_slide_index);
		success('category_slide/index','Success');
	}
    

}
