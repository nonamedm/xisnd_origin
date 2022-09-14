<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_old extends Basic_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sell_old_model', 'sell_old');
    }

    public function sell_list()
	{

		$sell_list = $this->sell_old->getSellList();

		$combined_data = "";

		foreach($sell_list as $key => $value):

			    $sell[] = $value;

                $sell_count = $this->sell_old->count_sell();

				$count[$key]['count'] = $sell_count;

                $combined_data[$key] = array_merge($sell[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['sell_list'] = $combined_data;
		}else{
			 $this->data['sell_list'] = array();
		}
		$this->load->view('sell_old/sell_list',$this->data);
	}
	public function sell_detail()
	{
		$sell_index = $this->uri->segment(3);
		$this->data['single_sell'] = $this->sell_old->getSingleSell( $sell_index );
		$this->load->view('sell_old/sell_detail',$this->data);
	}
	public function insert()
	{
		$sell_file = "";
		if($_FILES['sell_file']['name'] != ""):	
		$config['upload_path']      = './uploads/file/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 5120;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('sell_file');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $sell_file = $config['upload_path'].$info['file_name'];
        endif;
		$sell_data = array(
			'sell_title'=>$this->input->post('sell_title'),	
			'sell_type'=>$this->input->post('sell_type'),	
			'sell_location'=>$this->input->post('sell_location'),	
			'sell_generation'=>$this->input->post('sell_generation'),	
			'sell_inquiry'=>$this->input->post('sell_inquiry'),	
			'sell_link'=>$this->input->post('sell_link'),	
			'sell_file'=>$sell_file,
			'sell_time'=>time()	
		);
		$this->sell_old->insertSell( $sell_data );
		success('sell_old/sell_list','Success.');
	}
	public function update()
	{
		
		$sell_file = $this->input->post('sell_file_bak');
		$sell_index = $this->input->post('sell_index');
		if($_FILES['sell_file']['name'] != ""):	
		$config['upload_path']      = './uploads/file/'.date('Ymd').'/';
		if (!file_exists($config['upload_path'] )){

             mkdir($config['upload_path'] , 0777);

        }
        $config['allowed_types']    = '*';
        $config['max_size']     = 5120;
        $config['file_name']    = time() . mt_rand(1000,9999);
        $this->load->library('upload',$config);
        $this->upload->do_upload('sell_file');
        $wrong = $this->upload->display_errors();
        if($wrong)  
        {
            error($wrong);
        }
        $info = $this->upload->data();
        $sell_file = $config['upload_path'].$info['file_name'];
        endif;
		$sell_data = array(
			'sell_title'=>$this->input->post('sell_title'),	
			'sell_type'=>$this->input->post('sell_type'),	
			'sell_location'=>$this->input->post('sell_location'),	
			'sell_generation'=>$this->input->post('sell_generation'),	
			'sell_inquiry'=>$this->input->post('sell_inquiry'),	
			'sell_link'=>$this->input->post('sell_link'),	
			'sell_file'=>$sell_file
		);
		$this->sell_old->updateSell( $sell_data, $sell_index );
		success('sell_old/sell_list','Success.');
	}
	public function remove_sell()
	{
		$sell_index = $this->uri->segment(3);
		$this->sell_old->removeSell($sell_index);
		success('sell_old/sell_list','Success.');
	}

}