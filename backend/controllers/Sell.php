<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell extends Basic_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Sell_model', 'sell');
    }
    /** Regional Start**/
    public function regional_list()
    {
    	$regional_list = $this->sell->getRegionalList();

		$combined_data = "";

		foreach($regional_list as $key => $value):

			    $regional[] = $value;

                $regional_count = $this->sell->count_regional();

				$count[$key]['count'] = $regional_count;

                $combined_data[$key] = array_merge($regional[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['regional_list'] = $combined_data;
		}else{
			 $this->data['regional_list'] = array();
		}
		$this->load->view('sell/regional_list',$this->data);
    }

    public function regional_detail()
	{
		$xi_article_category_index = $this->uri->segment(3);
		$this->data['single_regional'] = $this->sell->getSingleRegional( $xi_article_category_index );
		$this->load->view('sell/regional_detail',$this->data);
	}

	public function insert_regional()
	{
		$data = array(
			'xi_article_category_name'=>$this->input->post('xi_article_category_name'),	
		);
		$this->sell->insertRegional( $data );
		success('sell/regional_list','Success');
	}
	public function update_regional()
	{
		$xi_article_category_index = $this->input->post('xi_article_category_index');
		$data = array(
			'xi_article_category_name'=>$this->input->post('xi_article_category_name'),	
		);
		$this->sell->updateRegional( $data ,$xi_article_category_index);
		success('sell/regional_list','Success');
	}
	public function remove_regional()
	{
		$xi_article_category_index = $this->uri->segment(3);
		$this->sell->removeRegional($xi_article_category_index);
		success('sell/regional_list','Success');
	}
	/** Regional End**/


	/** Sell Start**/
    public function sell_list()
	{

		$sell_list = $this->sell->getSellList();

		$combined_data = "";

		foreach($sell_list as $key => $value):

			    $sell[] = $value;

                $sell_count = $this->sell->count_sell();

				$count[$key]['count'] = $sell_count;

                $combined_data[$key] = array_merge($sell[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['sell_list'] = $combined_data;
		}else{
			 $this->data['sell_list'] = array();
		}
		$this->data['regional_list'] = $this->sell->getRegionalList();
		$this->load->view('sell/sell_list',$this->data);
	}
	public function add_sell()
	{
		$this->data['regional_list'] = $this->sell->getRegionalList();
		$this->load->view('sell/add_sell',$this->data);
	}
	public function insertAjax()
	{
		$form_array = $this->input->post('form_array');
		$ajax_data = $this->input->post('ajax_data');
		$content_ajax_data = $this->input->post('content_ajax_data');
		$data_val= array();
		$data_name= array();
		$count = 0;
		foreach ($form_array as $key => $value) {
			$count++;
			if($count < 12):
			array_push($data_val,$value['value']);
			array_push($data_name,$value['name']);
			endif;
		}	
		$sell_data = array_combine($data_name, array_values($data_val));
		$xi_article_index = $this->sell->insertSell($sell_data);
		if($xi_article_index){
			if($ajax_data):
			foreach (array_reverse ($ajax_data) as $key => $value) {
				$data_year = array(
					'xi_article_index'=>$xi_article_index,
					'xi_year_title'=>$value['xi_year_title'],
					'xi_year_totle_percent'=>$value['xi_year_totle_percent'],
					'xi_year_colum1'=>$value['xi_year_colum1'],
					'xi_year_colum2'=>$value['xi_year_colum2'],
					'xi_year_colum3'=>$value['xi_year_colum3'],
					'xi_year_colum4'=>$value['xi_year_colum4'],
					'xi_year_colum5'=>$value['xi_year_colum5'],
					'xi_year_colum6'=>$value['xi_year_colum6'],
					'xi_year_colum7'=>$value['xi_year_colum7'],
					'xi_year_colum8'=>$value['xi_year_colum8'],
				);
				$this->sell->insertYear($data_year);	
			}
			endif;
			if($content_ajax_data):
			foreach (array_reverse ($content_ajax_data) as $key => $value) {
				$data_info = array(
					'xi_article_index'=>$xi_article_index,
					'xi_article_info_title'=>$value['xi_article_info_title'],
					'xi_article_info_content'=>$value['xi_article_info_content'],
				);
				$this->sell->insertInfo($data_info);	
			}
			endif;
			$data = array(
				'status'=>1,
				'id'=>$xi_article_index
			);
			echo json_encode($data);
		}else{
			$data = array(
				'status' =>0
			);
			echo json_encode($data);
		}
	}
	public function insert_sell()
	{
		if($_FILES['xi_article_image']['name'] != ""):
            $xi_article_image = $this->getSingleUploadFileUrl($upload_dir = './uploads/file/','xi_article_image',$allowed_types ='*',$max_size = '5120');
        endif;
		$xi_article_index = $this->input->post('xi_article_index');
		$sell_data = array(
			'xi_article_image'=>$xi_article_image,
		);
		$this->sell->updateSell($sell_data,$xi_article_index);

		if($_FILES['img_file']['name'][0] != ""):
		foreach($_FILES['img_file'] as $index => $vals){
            foreach ($vals as $i => $val) {
                $file_map[$i]['img_file'][$index] = $val;
            }
        }
        $count = -1;
        foreach ($file_map as $files) {
        	$count ++;
			$file_base_dir = './uploads/file/'.date('Ymd').'/';
			if (!file_exists($file_base_dir)){
				mkdir($file_base_dir, 0777);
			}
            $config['upload_path']      = './uploads/file/'.date('Ymd').'/';
            $config['allowed_types']    = '*';
            $config['max_size']     = 5120;
            $config['file_name']    = time() . mt_rand(1000,9999);   
            $_FILES = $files;
			$this->load->library('upload',$config);
            $this->upload->do_upload("img_file");
			$info_img = $this->upload->data();
			$file_base_dir = $config['upload_path'];
			$images = array();
			array_push($images,$info_img);
			$img_title = array();
			$img_title = $this->input->post('img_title[]');
			foreach ($images as $key => &$value) {
				$value['img_title'] = $img_title[$count];
			}
            foreach ($images as $key => $value) {
				$data1['xi_article_image_url'] = $file_base_dir.$value['file_name'];
				$data1['xi_article_index'] = $xi_article_index;
				$data1['xi_article_image_title']  = $value['img_title'];
				$this->sell->insertArticleImg($data1);  
            }
        }
		endif;
		success('sell/sell_list','Success');

	}
	public function edit_sell()
	{
		$xi_article_index = $this->uri->segment(3);
		$this->data['regional_list'] = $this->sell->getRegionalList();
		$this->data['single_sell'] = $this->sell->getSingleSell( $xi_article_index );
		$this->data['info'] = $this->sell->getArticleInfo($xi_article_index);
        $this->data['year'] = $this->sell->getArticleYear($xi_article_index);
        $this->data['images'] = $this->sell->getArticleImgaes($xi_article_index);
		$this->load->view('sell/edit_sell',$this->data);
	}
	public function updateAjax()
	{
		$form_array = $this->input->post('form_array');
		$ajax_data = $this->input->post('ajax_data');
		$content_ajax_data = $this->input->post('content_ajax_data');
		$data_val= array();
		$data_name= array();
		$xi_article_index = $form_array[0]['value'];
		$count = 0;
		foreach ($form_array as $key => $value) {
			$count++;
			if($count != 1 && $count != 4 && $count < 12):
			array_push($data_val,$value['value']);
			array_push($data_name,$value['name']);
			endif;
		}	
		$sell_data = array_combine($data_name, array_values($data_val));
		$this->sell->updateSell($sell_data,$xi_article_index);

		if($ajax_data):
			foreach ($ajax_data as $key => $value) {
				if($value['id'] == ""){
						$data_year = array(
							'xi_article_index'=>$xi_article_index,
							'xi_year_title'=>$value['xi_year_title'],
							'xi_year_totle_percent'=>$value['xi_year_totle_percent'],
							'xi_year_colum1'=>$value['xi_year_colum1'],
							'xi_year_colum2'=>$value['xi_year_colum2'],
							'xi_year_colum3'=>$value['xi_year_colum3'],
							'xi_year_colum4'=>$value['xi_year_colum4'],
							'xi_year_colum5'=>$value['xi_year_colum5'],
							'xi_year_colum6'=>$value['xi_year_colum6'],
							'xi_year_colum7'=>$value['xi_year_colum7'],
							'xi_year_colum8'=>$value['xi_year_colum8'],
						);
						$this->sell->insertYear($data_year);	
				}else{
					if($_SESSION['admin_grade'] != 1){
						$data_year = array(
							'xi_year_title'=>$value['xi_year_title'],
							'xi_year_totle_percent'=>$value['xi_year_totle_percent'],
							'xi_year_colum1'=>$value['xi_year_colum1'],
							'xi_year_colum2'=>$value['xi_year_colum2'],
							'xi_year_colum3'=>$value['xi_year_colum3'],
							'xi_year_colum4'=>$value['xi_year_colum4'],
							'xi_year_colum5'=>$value['xi_year_colum5'],
							'xi_year_colum6'=>$value['xi_year_colum6'],
							'xi_year_colum7'=>$value['xi_year_colum7'],
							'xi_year_colum8'=>$value['xi_year_colum8'],
						);
						$this->sell->updateYear($data_year,$value['id']);
					}else{
						$data_year = array(
							'xi_article_index'=>$xi_article_index,
							'xi_year_totle_percent'=>$value['xi_year_totle_percent'],
							'xi_year_colum2'=>$value['xi_year_colum2'],
							'xi_year_colum4'=>$value['xi_year_colum4'],
							'xi_year_colum6'=>$value['xi_year_colum6'],
							'xi_year_colum8'=>$value['xi_year_colum8'],
						);
						$this->sell->updateYear($data_year,$value['id']);

					}
					
				}
				
			}
			endif;
			if($content_ajax_data):
			foreach ($content_ajax_data as $key => $value) {
				if($value['id'] == ""){
					$data_info = array(
						'xi_article_index'=>$xi_article_index,
						'xi_article_info_title'=>$value['xi_article_info_title'],
						'xi_article_info_content'=>$value['xi_article_info_content'],
					);
					$this->sell->insertInfo($data_info);
				}else{
					$data_info = array(
						'xi_article_info_title'=>$value['xi_article_info_title'],
						'xi_article_info_content'=>$value['xi_article_info_content'],
					);
					$this->sell->updateInfo($data_info,$value['id']);
				}
					
			}
			endif;
			$data = array(
				'status'=>1
			);
			echo json_encode($data);
	}
	public function update_sell()
	{
		
		$xi_article_index = $this->input->post('xi_article_index');

        $xi_article_image = $this->input->post('xi_article_image_bak');

        if($_FILES['xi_article_image']['name'] != ""):
            $xi_article_image = $this->getSingleUploadFileUrl($upload_dir = './uploads/file/','xi_article_image',$allowed_types ='*',$max_size = '5120');
        endif;

		$sell_data = array(
			'xi_article_image'=>$xi_article_image,
		);
		$this->sell->updateSell($sell_data,$xi_article_index);

		if($_FILES['img_file']['name'][0] != ""):
		foreach($_FILES['img_file'] as $index => $vals){
            foreach ($vals as $i => $val) {
                $file_map[$i]['img_file'][$index] = $val;
            }
        }
        $count = -1;
        foreach ($file_map as $files) {
        	$count ++;
			$file_base_dir = './uploads/file/'.date('Ymd').'/';
			if (!file_exists($file_base_dir)){
				mkdir($file_base_dir, 0777);
			}
            $config['upload_path']      = './uploads/file/'.date('Ymd').'/';
            $config['allowed_types']    = '*';
            $config['max_size']     = 5120;
            $config['file_name']    = time() . mt_rand(1000,9999);   
            $_FILES = $files;
			$this->load->library('upload',$config);
            $this->upload->do_upload("img_file");
			$info_img = $this->upload->data();
			$file_base_dir = $config['upload_path'];
			$images = array();
			array_push($images,$info_img);
			$img_title = array();
			$img_title = $this->input->post('img_title[]');
			foreach ($images as $key => &$value) {
				$value['img_title'] = $img_title[$count];
			}
            foreach ($images as $key => $value) {
				$data1['xi_article_image_url'] = $file_base_dir.$value['file_name'];
				$data1['xi_article_index'] = $xi_article_index;
				$data1['xi_article_image_title']  = $value['img_title'];
				$this->sell->insertArticleImg($data1);  
            }
        }
		endif;
		success('sell/sell_list','Success');
	}
	public function removeImgAjax()
	{
		$xi_article_image_index = $this->input->post('img_id');
		$xi_article_image_url = $this->input->post('url');
		@unlink($xi_article_image_url);
        $this->sell->removeImages($xi_article_image_index);
        $data = array(
			'status'=>1
		);
		echo json_encode($data);
	}
	public function remove_sell()
	{
		$xi_article_index = $this->uri->segment(3);
		$info = $this->sell->getArticleInfo($xi_article_index);
        $year = $this->sell->getArticleYear($xi_article_index);
        $images = $this->sell->getArticleImgaes($xi_article_index);
        if($info):
        	foreach ($info as $i) {
        		$this->sell->removeInfo($i['xi_article_info_index']);
        	}
        endif;
    	if($year):
    		foreach ($year as $y) {
        		$this->sell->removeYear($y['xi_year_index']);
        	}
        endif;
        if($images):
    		foreach ($images as $img) {
    			@unlink($img['xi_article_image_url']);
        		$this->sell->removeImages($img['xi_article_image_index']);
        	}
        endif;
		$this->sell->removeSell($xi_article_index);
		success('sell/sell_list','Success');
	}


	/** Sell End**/


	/** Info Start**/
	public function info_list()
	{
	
		$xi_article_index = $this->uri->segment(3);

		$this->data['id'] = compact('xi_article_index');

		$info_list = $this->sell->getArticleInfo($xi_article_index);

		$combined_data = "";

		foreach($info_list as $key => $value):

			    $info[] = $value;

                $info_count = count($info_list);

				$count[$key]['count'] = $info_count;

                $combined_data[$key] = array_merge($info[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['info_list'] = $combined_data;
		}else{
			 $this->data['info_list'] = array();
		}
		$this->load->view('sell/info_list',$this->data);
	}

	public function info_detail()
	{
		$xi_article_index = $this->uri->segment(3);
		$this->data['id'] = compact('xi_article_index');
		$xi_article_info_index = $this->uri->segment(4);
		$this->data['single_info'] = $this->sell->getSingleInfo( $xi_article_info_index );
		$this->load->view('sell/info_detail',$this->data);
	}
	public function insert_info()
	{
		$xi_article_index = $this->uri->segment(3);
		$data_info = array(
			'xi_article_index'=>$xi_article_index,
			'xi_article_info_title'=>$this->input->post('xi_article_info_title'),
			'xi_article_info_content'=>$this->input->post('xi_article_info_content'),	
		);
		$this->sell->insertInfo($data_info);
		success('sell/info_list/'.$xi_article_index,'Success');
	}
	public function updateInfoAjax()
	{
		$xi_article_info_index = $this->input->post('id');
		$data_info = array(
			'xi_article_info_title'=>$this->input->post('xi_article_info_title'),
			'xi_article_info_content'=>$this->input->post('xi_article_info_content'),
		);
		$this->sell->updateInfo( $data_info ,$xi_article_info_index);
		$data = array(
			'status'=>1
		);
		echo json_encode($data);
	}
	public function update_info()
	{
		$xi_article_index = $this->uri->segment(3);
		$xi_article_info_index = $this->input->post('xi_article_info_index');
		$data_info = array(
			'xi_article_info_title'=>$this->input->post('xi_article_info_title'),
			'xi_article_info_content'=>$this->input->post('xi_article_info_content'),
		);
		$this->sell->updateInfo( $data_info ,$xi_article_info_index);
		success('sell/info_list/'.$xi_article_index,'Success');
	}
	public function removeInfoAjax()
	{
		$xi_article_info_index = $this->input->post('data_index');
		$this->sell->removeInfo($xi_article_info_index);
		$data = array(
			'status'=>1
		);
		echo json_encode($data);
	}
	public function remove_info()
	{
		$xi_article_index = $this->uri->segment(3);
		$xi_article_info_index = $this->uri->segment(4);
		$this->sell->removeInfo($xi_article_info_index);
		success('sell/info_list/'.$xi_article_index,'Success');
	}
	/** Info End**/



	/** Year Start**/
	public function year_list()
	{
		
		$xi_article_index = $this->uri->segment(3);

		$this->data['id'] = compact('xi_article_index');

		$year_list = $this->sell->getArticleYear($xi_article_index);

		$combined_data = "";

		foreach($year_list as $key => $value):

			    $year[] = $value;

                $year_count = count($year_list);

				$count[$key]['count'] = $year_count;

                $combined_data[$key] = array_merge($year[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['year_list'] = $combined_data;
		}else{
			 $this->data['year_list'] = array();
		}
		$this->load->view('sell/year_list',$this->data);
	}

	public function year_detail()
	{
		$xi_article_index = $this->uri->segment(3);
		$this->data['id'] = compact('xi_article_index');
		$xi_year_index = $this->uri->segment(4);
		$this->data['single_year'] = $this->sell->getSingleYear( $xi_year_index );
		$this->load->view('sell/year_detail',$this->data);
	}
	public function insert_year()
	{
		$xi_article_index = $this->uri->segment(3);
		$data_year = array(
			'xi_article_index'=>$xi_article_index,
			'xi_year_title'=>$this->input->post('xi_year_title'),
			'xi_year_totle_percent'=>$this->input->post('xi_year_totle_percent'),
			'xi_year_colum1'=>$this->input->post('xi_year_colum1'),
			'xi_year_colum2'=>$this->input->post('xi_year_colum2'),
			'xi_year_colum3'=>$this->input->post('xi_year_colum3'),
			'xi_year_colum4'=>$this->input->post('xi_year_colum4'),
			'xi_year_colum5'=>$this->input->post('xi_year_colum5'),
			'xi_year_colum6'=>$this->input->post('xi_year_colum6'),
			'xi_year_colum7'=>$this->input->post('xi_year_colum7'),
			'xi_year_colum8'=>$this->input->post('xi_year_colum8')
		);
		$this->sell->insertYear($data_year);
		success('sell/year_list/'.$xi_article_index,'Success');
	}
	public function updateYearAjax()
	{
		$xi_year_index = $this->input->post('id');

		if($_SESSION['admin_grade'] != 1){
			$data_year = array(
				'xi_year_title'=>$this->input->post('xi_year_title'),
				'xi_year_totle_percent'=>$this->input->post('xi_year_totle_percent'),
				'xi_year_colum1'=>$this->input->post('xi_year_colum1'),
				'xi_year_colum2'=>$this->input->post('xi_year_colum2'),
				'xi_year_colum3'=>$this->input->post('xi_year_colum3'),
				'xi_year_colum4'=>$this->input->post('xi_year_colum4'),
				'xi_year_colum5'=>$this->input->post('xi_year_colum5'),
				'xi_year_colum6'=>$this->input->post('xi_year_colum6'),
				'xi_year_colum7'=>$this->input->post('xi_year_colum7'),
				'xi_year_colum8'=>$this->input->post('xi_year_colum8')
			);
			
		}else{
			$data_year = array(
				'xi_year_totle_percent'=>$this->input->post('xi_year_totle_percent'),
				'xi_year_colum2'=>$this->input->post('xi_year_colum2'),
				'xi_year_colum4'=>$this->input->post('xi_year_colum4'),
				'xi_year_colum6'=>$this->input->post('xi_year_colum6'),
				'xi_year_colum8'=>$this->input->post('xi_year_colum8'),
			);
		}
		
		$this->sell->updateYear( $data_year ,$xi_year_index);
		$data = array(
			'status'=>1
		);
		echo json_encode($data);
	}
	public function update_year()
	{
		$xi_article_index = $this->uri->segment(3);
		$xi_year_index = $this->input->post('xi_year_index');
		$data_year = array(
			'xi_year_title'=>$this->input->post('xi_year_title'),
			'xi_year_totle_percent'=>$this->input->post('xi_year_totle_percent'),
			'xi_year_colum1'=>$this->input->post('xi_year_colum1'),
			'xi_year_colum2'=>$this->input->post('xi_year_colum2'),
			'xi_year_colum3'=>$this->input->post('xi_year_colum3'),
			'xi_year_colum4'=>$this->input->post('xi_year_colum4'),
			'xi_year_colum5'=>$this->input->post('xi_year_colum5'),
			'xi_year_colum6'=>$this->input->post('xi_year_colum6'),
			'xi_year_colum7'=>$this->input->post('xi_year_colum7'),
			'xi_year_colum8'=>$this->input->post('xi_year_colum8')
		);
		$this->sell->updateYear( $data_year ,$xi_year_index);
		success('sell/year_list/'.$xi_article_index,'Success');
	}
	public function removeYearAjax()
	{
		$xi_year_index = $this->input->post('data_index');
		$this->sell->removeYear($xi_year_index);
		$data = array(
			'status'=>1
		);
		echo json_encode($data);
	}
	public function remove_year()
	{
		$xi_article_index = $this->uri->segment(3);
		$xi_year_index = $this->uri->segment(4);
		$this->sell->removeYear($xi_year_index);
		success('sell/year_list/'.$xi_article_index,'Success');
	}
	/** Year End**/
	

}