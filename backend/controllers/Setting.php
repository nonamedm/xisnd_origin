<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Setting_model', 'set');
	}

	public function index()
	{
        $this->data['setting'] = $this->set->getSetting();
	  
		$this->load->view('setting',$this->data);
	}

	public function update(){

		$title = $this->input->post('title');
		$keyword = $this->input->post('keyword');
		$description = $this->input->post('description');
		$language = $this->input->post('language');

		$data = array(
			'title' => $title,
			'keyword' => $keyword,
			'description' => $description,
			'language' => $language
			);

		$this->set->updateSetting($data);
        
		success('setting','Success');

	}

	public function familySite()
	{
		$this->data['family_list'] = $this->set->getFamilyList();

		$this->load->view('set/family_list', $this->data);
	}

	public function familyDetail( $fs_index = false )
	{
		$data_post = $this->input->post();
		
		
		if( !empty( $data_post['fs_index'] ) )
		{
			$fs_index = $data_post['fs_index'];
		}

		if( $fs_index != false )
		{
			$this->data['form_type'] = 'familyModify';

			$this->data['family_detail'] = $this->set->getFamilyDetail( $fs_index );
		}
		else
		{
			$this->data['form_type'] = 'familyCreate';
		}

		$this->load->view('set/family_detail', $this->data);

	}

	public function processFamily( $type = false, $fg_index = false )
	{
		$data_post = $this->input->post();
		//var_dump($data_post);exit;

		if( !empty( $data_post['fs_index'] ) )
		{
			$fg_index	= $data_post['fs_index'];
		}

		$result		= false;
		$message 	= '';

		switch( $type )
		{
			case 'familyModify':
				$data = array(
					'fs_name'	=> $data_post['fs_name'],
					'fs_url'	=> $data_post['fs_url'],
					'fs_display'=> 1
				);
				$result = $this->set->modifyFamily( $fg_index, $data);

				break;
			
			case 'familyCreate':
				$data = array(
					'fs_name'	=> $data_post['fs_name'],
					'fs_url'	=> $data_post['fs_url'],
					'fs_display'=> 1
				);
				$result = $this->set->createFamily( $data);

				break;
			
			case 'familyRemove':
				$result = $this->set->removeFamily( $fg_index );
				break;
		}

		if( $result )
		{
			$message = 'Success';
		}
		else
		{
			$message = 'Failed';
		}

		success('setting/familySite', $message);
	}
    


}
