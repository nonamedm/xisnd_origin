<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_date extends Basic_Controller {

	public function __construct(){
		parent::__construct();

		if(!$this->session->admin_index)
		{
			header('Location:'.site_url('login'));
            exit;
		}

		$this->load->model('Article_date_model', 'a_date');
		$this->load->model('Cate_date_model', 'c_date');
		$this->load->library('EnumValue','enumvalue');
		
	}

	public function article_date_list()
	{	
		$category_index = $this->uri->segment(3);
		$this->data['id'] = compact("category_index");
		$this->data['cate_date'] = $this->a_date->getCateDateList();

		$this->fetchArticleDateData($site_url = '/article_date/article_date_list/',$limit = 15);
		
		$this->load->view('article_date/article_date_list',$this->data);
	}

	public function add_article_date()
	{
		$this->data['cate_date'] = $this->a_date->getCateDateList();
		$this->load->view('article_date/add_article_date',$this->data);
	}

	public function insert_article_date()
	{
		$category_date_index = $this->input->post('category_date_index');
		$data = array(
			'category_date_index'	=> $category_date_index,
			'article_date_title'	=> $this->input->post('article_date_title'),
			'article_date_month'	=> $this->input->post('article_date_month'),
			'article_date_content'	=> $this->input->post('article_date_content'),
			'article_date_sort'		=> $this->input->post('article_date_sort'),
			'create_time'			=>time()
			);
		$this->a_date->insert_article_date($data);
		success('article_date/article_date_list/'.$category_date_index,'Success.');
	}

	public function edit_article_date()
	{
		$category_date_index = $this->uri->segment(3);
		$article_date_index = $this->uri->segment(4);
		$this->data['cate_date'] = $this->a_date->getCateDateList();
		$this->data['single_article_date'] = $this->a_date->getSingleArticleDate($article_date_index);
		$this->load->view('article_date/edit_article_date',$this->data);
	}

	public function update_article_date()
	{
		$article_date_index = $this->input->post('article_date_index');
		$category_date_index = $this->input->post('category_date_index');
		$data = array(
			'category_date_index'	=> $category_date_index,
			'article_date_title'	=> $this->input->post('article_date_title'),
			'article_date_month'	=> $this->input->post('article_date_month'),
			'article_date_content'	=> $this->input->post('article_date_content'),
			'article_date_sort'		=> $this->input->post('article_date_sort')
			);
		//var_dump($data);exit;
		$this->a_date->update_article_date($data,$article_date_index);
		success('article_date/article_date_list/'.$category_date_index,'Success.');
	}

	public function remove()
	{
		$category_date_index = $this->uri->segment(3);
		$article_date_index = $this->uri->segment(4);
		$this->a_date->delete_article_date($article_date_index);
		success('article_date/article_date_list/'.$category_date_index,'Success');
	}

	public function upload_content_image()
    {
        $date = date('Ymd');
        $config['upload_path']      = './uploads/article/'.$date.'/';
        $config['allowed_types']    = '*';
        $config['max_size']     = 4096;
        if (!file_exists($config['upload_path'])){

            mkdir($config['upload_path'], 0777);

        }
        $this->load->library('upload',$config);
        $this->upload->do_upload('upload_image');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        echo $date .'/'. $info['client_name'];
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

	public function remove_cate()
	{
		$category_date_index = $this->uri->segment(3);
		$this->c_date->delete_cate($category_date_index);
		success('cate_date/cate_list','Success');
	}
	





}
