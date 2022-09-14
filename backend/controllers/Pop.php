<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pop extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('Pop_model', 'pop');
	}

	public function pop_list()
	{	
		$this->fetchPopData($site_url = '/Pop/pop_list/',$limit = 12);
		$this->load->view('pop/pop_list',$this->data);
	}
	public function add_pop()
	{
		$this->load->view('pop/add_pop',$this->data);
	}
	public function insert()
	{
		$pop_img = "";
		if($_FILES['pop_img']['name'] != ""):	
		$config['upload_path']      = './uploads/pop/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 2048;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('pop_img');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $pop_img = $config['upload_path'].$info['file_name'];
        endif;
        $pop_data = array(

	    'pop_title' => $this->input->post('pop_title'),
	    'pop_option' => $this->input->post('pop_option'),
	    'top' => $this->input->post('top'),
	    'left' => $this->input->post('left'), 
		'pop_link' => $this->input->post('pop_link'), 
        'pop_img' => $pop_img, 
        'pop_created_time' => time()

	    );
	    $this->db->insert('pop',$pop_data);
	    success('Pop/pop_list','추가하였습니다');	
	}
	public function edit_pop()
	{
		$pop_index = $this->uri->segment(3);
		$this->data['pop'] = $this->pop->check_pop($pop_index);
		$this->load->view('pop/edit_pop',$this->data);
	}
	public function update()
	{
		$pop_img = $this->input->post('pop_img_bak');
		$pop_index = $this->input->post('pop_index');
		
		if($_FILES['pop_img']['name'] != ""):
        $config['upload_path']      = './uploads/pop/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 2048;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('pop_img');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $pop_img = $config['upload_path'].$info['file_name'];
        endif;
        
        $pop_data = array(

	    'pop_title' => $this->input->post('pop_title'),
	    'pop_option' => $this->input->post('pop_option'),
	    'top' => $this->input->post('top'),
	    'left' => $this->input->post('left'), 
		'pop_link' => $this->input->post('pop_link'), 
        'pop_img' => $pop_img
        

	    );
	    $this->db->update('pop',$pop_data,array('pop_index'=>$pop_index));
	    success('Pop/pop_list','수정완료되었습니다');	
	}
	public function remove()
	{
		$pop_index = $this->uri->segment(3);
		$this->data['pop'] = $this->pop->check_pop($pop_index);
		$pop_img = $this->data['pop']['pop_img'];
		@unlink ( $pop_img );
		$this->pop->delete_pop($pop_index);
		success('Pop/pop_list','Success.');  
	}
	public function removeAjax()
	{
		$pop_list = array();
		$pop_list = $this->input->post('state_arr');
		foreach ($pop_list as $v){
			$this->data['pop'] = $this->pop->check_pop($v['value']);
			$pop_img = $this->data['pop']['pop_img'];
			@unlink ( $pop_img );
			$this->pop->delete_pop($v['value']);
		}
	}
    
}
