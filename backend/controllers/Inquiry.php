<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends Basic_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->admin_index):
            header('Location:'.site_url('login'));
            exit;
        endif;
		$this->load->model('Inquiry_model', 'inquiry');
		$this->load->library('EnumValue');
	}

	public function index()
	{
        
		$show_per_page = 14;

		@$offset = $this->input->get('per_page');

		$total_inquiry = count($this->inquiry->getInquiry());

		$arr = array(
			'offset' => $offset,
			'limit' => $show_per_page
			);

		$this->data['inquiry_list'] = $this->inquiry->getInquiry($arr);

		$this->data['page_nav'] = $this->pageNavigation($base_url = site_url('inquiry/index/'), $total_rows = $total_inquiry, $limit = $show_per_page,$uri_segment = 3);

		$this->load->view('inquiry/inquiry_list',$this->data);

    }

	public function detail()
	{
        $this->load->helper('download');

		$inquiry_index = $this->uri->segment(3);

		$this->data['inquiry_info'] = $this->inquiry->getInquiryInfo($inquiry_index);

		$this->load->view('inquiry/inquiry_detail',$this->data);

    }

	public function remove(){

		$inquiry_index = $this->input->post('inquiry_index');

		$status = 0;

		$query = $this->inquiry->deleteInquiry($inquiry_index);

		if($query):
			$status = 1;
		endif;

		$call_back =  array (
			'status' => $status
			);
	    
		echo json_encode($call_back);

	}

    public function download(){

        $this->load->helper('download');

		$inquiry_index = $this->uri->segment(3);

		$this->data['inquiry_info'] = $this->inquiry->getInquiryInfo($inquiry_index);

		force_download($this->data['inquiry_info']['file_url'], NULL);

	}


}
