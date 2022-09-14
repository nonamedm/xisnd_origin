<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basic_Controller extends CI_Controller
{

    protected $data = array();
    
	//构造函数，加载框架基本的模型
    public function __construct()
    {
        /**Core */

        parent::__construct();

		date_default_timezone_set("Asia/Seoul");

		ini_set("memory_limit","80M");

        $this->LoginState();

        $this->data = array();

        $this->load->library('EnumValue', 'enumvalue');
        $this->load->library('Tool', 'tool');

        $this->load->model('Admin_model', 'admin');
		$this->load->model('Pop_model', 'pop');


		$this->load->model('Category_model', 'category');
        $this->load->model('Setting_model', 'set');

        $this->category_index = $this->uri->segment(3);
		$category_index = $this->category_index;
		$this->data['id'] = compact("category_index");
		$demain_url = $this->uri->segment(1);
		$demain_url1 = $this->uri->segment(2);
		$this->data['demain_url'] = compact("demain_url");
        $this->data['demain_url1'] = compact("demain_url1");
    

        $this->menu();

        $setting = $this->set->getSetting();
        //定义要翻译的目标语言及po文件的编码
        //$locale = "zh_CN.utf8";
        //setlocale(LC_ALL, $locale);
        //var_dump($locale);exit;
        bindtextdomain($setting->language, "locale");
        textdomain($setting->language);
        //bindtextdomain('us', "locale");
        //textdomain('us');

        //$this->jurisdiction( $_SESSION['admin_index'] );

        /**Core End */
        
        /**Mod */
        $this->load->model('Article_model', 'article');
        /** Mod End*/
    }

    //Console
    public function console_log( $value )
    {
        echo "<script> console.log( ".json_encode( $value )." )</script>";
    }


    //login Process
    public function LoginState()
    {
        $this->load->model('login_model', 'login');

        if( !$this->session->admin_index )
        {
            //获取登陆的信息
            $login_array = !empty( get_cookie('login')) ? get_cookie('login') : false;

            if( $login_array != false )
            {
                $login_array = json_decode( get_cookie( 'login'));

                $login_info = $this->login->getLoginInfo( $login_array->login_random, $login_array->login_index);

                if ( !empty ( $login_info->login_time ) && $login_info->login_time > ( time() - 43200 ) )
                {
                    $session_data = array(
                        'admin_index'       => $login_array->login_index,
                        'admin_nick_name'   => $login_array->login_name,
                        'admin_grade'       => $login_array->login_grade,
                        'login_time'        => $login_array->login_time
                    );

                    $this->session->set_userdata( $session_data );

                }
                else
                {
                    header('Location:'.site_url('login'));
                }
            }
            else
            {
                header('Location:'.site_url('login'));
            }
        }
    }
    //nav Process
    
	public function menu()
    {
		$category_list = $this->category->getCategoryList();

		$combined_data = array(); 

        foreach($category_list as $key => $value)
        {
            if($value['category_template_module'] != 'page' && $value['parent_index'] == 0)
            {
                $category               = $value;
                $combined_data[$key]    = array_merge($category,$value);
            }
        }

		$this->data['navi'] = $combined_data;

        foreach($this->data['navi'] as $row)
        {
            $this->data['sub_navi'][$row['category_index']] = $this->category->getChildCategory($row['category_index']);
        }

		return $this->data;

    }
    
    public function categoryList( $parent_index = 0 )
    {
        $combined_data  = array();
        $category_value[0] = 'None';

        $category_list = $this->category->getCategoryList();
        
        foreach ($category_list as $index => $item) {
            $category_value[$item['category_index']] = $item['category_name']; 
        }
       
		$tree_list = $this->getTree( $category_list, $parent_index );
	
		foreach($tree_list as $key => $value)
		{
			$category[] = $value;

			@$parent_name = $this->category->getParentCategory( $value['parent_index'] )->category_name;

			if(!$parent_name)
			{
				$parent[$key]['parent_name'] = "NONE";
			}
			else
			{
				$parent[$key]['parent_name'] = $parent_name;
			}

            $combined_data[$key] = array_merge($category[$key],$parent[$key]);

		}

        //formatarray($combined_data);exit;
        
        $this->data['category_list'] = $combined_data;
        
        $this->data['category_value'] = $category_value;
        

	}
	
	
    /*
	public function menu()
    {

		$category_list = $this->category->getCategoryList();

		$combined_data = array();

		foreach($category_list as $key =>$value):

		    if($value['category_template_module'] != 'page'):

                 $category = $value;

                 $combined_data[$key] = array_merge($category,$value);

			endif;

		endforeach;

		//formatarray($combined_data);exit;
         
        $this->data['navigation'] = $this->getTree($combined_data,0);
        
		return $this->data;

	}
	
	*/
    

	//判断登录状态
	public function isLogin()
    {
		$is_login = false;

        if( isset($this->session->user_index) && !empty($this->session->user_index) )
        {
            $is_login = true;
        }

		return $is_login;

	}

    //获取无限分类的递归函数(有等级)
	
    public function getTree($data,$parent_index = 0 ,$level = 0)
    {
        static $tree = array();

        foreach($data as $arr)
        {
            if(is_array($arr))
            {
                if($arr['parent_index'] == $parent_index)
                {
                    $arr['level'] = $level;
			        $tree[] = $arr;
				    $this->getTree($data,$arr['category_index'],$level+1);
                }
            }
        }
		return $tree;
    }
    //获取无限分类的递归函数(无等级)
    public function getTrees( $data, $parent_index = false )
    {
        static $tree = array();

        foreach ( $data as $index => $item)
        {
            if ( $item['parent_index'] ==  $parent_index )
            {
                $item['children'] = getTree( $data, $item['category_index'] );
                $tree[] = $item;
            }

        }

        return $tree;
    }

	public function arrayToObject($array){

        if (is_array($array)) {

            $obj = new StdClass();

            foreach ($array as $key => $val):
                $obj->$key = $val;
            endforeach;

        } else { 

			$obj = $array; 

		}

        return $obj;

	}

	public function objectToArray($object){

        if (is_object($object)) {

            foreach ($object as $key => $value):
                $array[$key] = $value;
            endforeach;

        } else {

            $array = $object;

        }

        return $array;

	}

	//2018年2月 增加

    public function jurisdiction( $admin_index )
    {
        //加载 Model
        $this->load->model( 'Jurisdiction_model', 'jsc');
        //获取页面的信息
        $category_name  = !empty( $this->uri->segment(1) ) ? $this->uri->segment(1) : false;
        //$page_name      = !empty( $this->uri->segment(2) ) ? $this->uri->segment(2) : false;

        $jsc_tp_index = !empty( $this->jsc->getJscTpIndexByCode( $category_name )) ? $this->jsc->getJscTpIndexByCode( $category_name )->jsc_tp_index : false;

        if( $jsc_tp_index )
        {
            $data_jurisdiction = $this->jsc->getJscDataAdminList( $admin_index );

            $is_status = false;
            foreach ( $data_jurisdiction as $index => $item )
            {
                if( $item['jsc_tp_index'] == $jsc_tp_index )
                {
                    $is_status = true;
                }
            }

            if( $is_status == false )
            {
                success( 'main', 'No Jurisdiction');
            }
        }

    }

    //只获取同级别的分类
    public function getSameLevelCategory( $data, $parent_index = false )
    {
        $result_array = array();

        foreach ( $data as $item )
        {
            if( $item['parent_index'] == $parent_index )
            {
                $result_array[] = $item;
            }
        }

        return $result_array;
    }

    public function getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '5120')
	{    
        $file_base_dir  = $upload_dir;
        $folder         = date('Ymd').'/';
        $file_dir       = $file_base_dir.$folder;
        $return_array   = array();

        if (!file_exists($file_dir))
        {
             mkdir($file_dir, 0777);
        }

		$file_full_url = "";

        if( !empty( $_FILES[$post_file]['name'] ))
        {
	        $config['upload_path']      = $file_dir;
			$config['allowed_types']    = $allowed_types;
			$config['max_size']         = $max_size;
            $config['encrypt_name']     = true;
            
			$this->load->library('upload', $config);
            $this->upload->do_upload($post_file);
            
			$errors = $this->upload->display_errors();

            if($errors)
            {
                error($errors);
            }

	        $file_info      = $this->upload->data();
            $return_array['file_name']  = $file_info['client_name'];
            $return_array['file_url']   = $config['upload_path'].$file_info['file_name'];
        }

            
	    return $return_array;
    }
	//new add
	public function getSingleUploadFileUrl($upload_dir = './uploads/article',$post_file,$allowed_types ='*',$max_size = '5120'){

        $file_base_dir = $upload_dir;
        $folder = date('Ymd').'/';
        $file_dir = $file_base_dir.$folder;
        if (!file_exists($file_dir)){
             mkdir($file_dir, 0777);
        }
		$file_full_url = "";
		if($_FILES[$post_file]):
        	if($_FILES[$post_file]['name']!=''):
	        	$config['upload_path'] = $file_dir;
				$config['allowed_types'] = $allowed_types;
				$config['max_size'] = $max_size;
				$config['encrypt_name'] = true;
				$this->load->library('upload', $config);
				$this->upload->do_upload($post_file);
				$errors = $this->upload->display_errors();
            	if($errors):
			 	   error($errors);
				endif;
	    		$file_info = $this->upload->data();
	    		$file_full_url = $file_dir.$file_info['file_name'];
			endif;
		endif;   
	    return $file_full_url;      
	}

    public function fetchCateDateData($site_url,$limit)
    {
				
		$search = trim($this->input->get('search_key'));
		$search_key = 'category_date.'.$search;
		
		$keyword = trim($this->input->get('keyword'));
		if(!isset($keyword) || $keyword == "" || empty($keyword)):

			 $search_key = FALSE;

		     $keyword = FALSE;

		endif;

		$base_url = site_url($site_url).'?';
		
		if(!empty($get['search_key']) && !empty($get['keyword'])):
			$base_url.="&search_key=".$get['search_key']."&keyword=".$get['keyword'];
		endif;

		$get = $this->input->get();

		$total_rows = $this->c_date->getCateDateQuantity($search_key,$keyword);

		$limit = $limit;

		$uri_segment = 4;

        $this->data['page_nav'] = $this->pageNavigation($base_url, $total_rows, $limit, $uri_segment);

		@$offset = $get['per_page'];

		$this->data['cate_date_list'] = $this->c_date->getCateDateList($offset,$limit,$search_key,$keyword);
		
    }
    
    public function fetchArticleDateData($site_url,$limit)
    {
				
		$search = trim($this->input->get('search_key'));
		$search_key = 'category_date.'.$search;
		
		$keyword = trim($this->input->get('keyword'));
		if(!isset($keyword) || $keyword == "" || empty($keyword)):

			 $search_key = FALSE;

		     $keyword = FALSE;

		endif;
		if($this->category_index){
			$base_url = site_url($site_url).$this->category_index.'?';
		}else{
			$base_url = site_url($site_url).'?'; 
		}
		
		
		if(!empty($get['search_key']) && !empty($get['keyword'])):
			$base_url.="&search_key=".$get['search_key']."&keyword=".$get['keyword'];
		endif;

		$get = $this->input->get();

		$total_rows = $this->a_date->getArticleDateQuantity($this->category_index,$search_key,$keyword);

		$limit = $limit;

		$uri_segment = 4;

        $this->data['page_nav'] = $this->pageNavigation($base_url, $total_rows, $limit, $uri_segment);

		@$offset = $get['per_page'];

		$this->data['article_date_list'] = $this->a_date->getArticleDateList($this->category_index,$offset,$limit,$search_key,$keyword);
		
    }
    
    public function pageNavigation($base_url = '', $total_rows = '', $limit = 30,$uri_segment = 3){

        $this->load->library('pagination');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['num_links'] = 10;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment; 
        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
	    $config['next_link'] = '<span aria-hidden="true">&raquo;</span>'; 
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
	    $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>'; 
        $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"> <a>';
	    $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

		$links = $this->pagination->create_links(); 

		$this->data['total_rows'] = $total_rows;

		$this->data['cur_page'] = $this->pagination->cur_page;

		$this->data['num_pages'] = $this->data['total_rows']/$limit;

		return $links;

	}
	/*New ADD Function 2018.09.19*/
	public function fetchPopData($site_url,$limit){
        
		$base_url = site_url($site_url).'?';

		$total_rows = $this->pop->count();

		$limit = $limit;

		$uri_segment = 4;

        $this->data['page_nav'] = $this->pageNavigation($base_url, $total_rows, $limit, $uri_segment);

		@$offset = $get['per_page'];

		$this->data['pop_list'] = $this->pop->getPopList($offset, $limit);
		
	}

    
    
}
?>