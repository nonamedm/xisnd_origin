<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Slide_model', 'slide');
		$this->load->model('Category_Slide_model', 'category_slide');
	}

	public function index()
	{
		$slide_list = $this->slide->getSlideList();

		$combined_data = "";

		foreach($slide_list as $key => $value):

			    $slide[] = $value;

                $slide_count = $this->slide->count();

				$count[$key]['count'] = $slide_count;

                $combined_data[$key] = array_merge($slide[$key],$count[$key]);

		endforeach;

		
		if($combined_data){
			 $this->data['slide_list'] = $combined_data;
		}else{
			 $this->data['slide_list'] = array();
		}

		$this->load->view('slide_list',$this->data);

	}
	public function add()
	{
		$this->data['category_slide_list'] = $this->category_slide->getCategorySlideList();
		$this->load->view('slide_add',$this->data);
	}
	public function insert()
	{

		$config['upload_path']      = './uploads/slide/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 2048;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('slide_image');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $slide_image = '/'.$config['upload_path'].$info['file_name'];
        $slide_data = array(

	    'slide_name' => $this->input->post('slide_name'),
	    'category_slide_index' => $this->input->post('category_slide_index'),
	    'slide_option' => $this->input->post('slide_option'), 
        'slide_image' => $slide_image, 
        'slide_sort' => $this->input->post('slide_sort'), 
        'slide_description' => $this->input->post('slide_description'),
        'slide_created_time' => time()

	    );
	    $this->db->insert('slide',$slide_data);
	    success('slide/index','Success');	
	}
	public function edit()
	{
		$slide_index = $this->uri->segment(3);
		$this->data['slide'] = $this->slide->check_slide($slide_index);
		$this->data['category_slide_list'] = $this->category_slide->getCategorySlideList();
		$this->load->view('slide_edit',$this->data);
	}
	public function update()
	{
		$slide_image = $this->input->post('slide_image_bak');
		$slide_index = $this->input->post('slide_index');
		if($_FILES['slide_image']['name'] != ""):
        $config['upload_path']      = './uploads/slide/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 2048;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('slide_image');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $slide_image = '/'.$config['upload_path'].$info['file_name'];
        endif;
        $slide_data = array(

	    'slide_name' => $this->input->post('slide_name'),
	    'category_slide_index' => $this->input->post('category_slide_index'),
	    'slide_option' => $this->input->post('slide_option'), 
        'slide_image' => $slide_image, 
        'slide_sort' => $this->input->post('slide_sort'),
        'slide_description' => $this->input->post('slide_description')

	    );
	    $this->db->update('slide',$slide_data,array('slide_index'=>$slide_index));
	    success('slide/index','Success');	
	}
	public function remove()
	{
		$slide_index = $this->uri->segment(3);
		$this->slide->delete_slide($slide_index);
		success('slide/index','Success');
	}
    public function category_slide_list()
    {
    	$category_slide_index = $this->uri->segment(3);
    	$slide_list = $this->slide->getCategorySlide($category_slide_index);

		$combined_data = "";

		foreach($slide_list as $key => $value):

			    $slide[] = $value;

                $slide_count = $this->slide->count_category_slide($category_slide_index);

				$count[$key]['count'] = $slide_count;

                $combined_data[$key] = array_merge($slide[$key],$count[$key]);

		endforeach;

		
		if($combined_data){
			 $this->data['slide_list'] = $combined_data;
		}else{
			 $this->data['slide_list'] = array();
		}

		$this->load->view('slide_list',$this->data);
    }

}
