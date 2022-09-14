<?php
class Basic_Controller extends CI_Controller
{

    protected $data = array();

	private $category_index;

	private $category_url;

    public function __construct(){

        parent::__construct();

		date_default_timezone_set("Asia/Seoul");

		ini_set("memory_limit","80M");
		
		$this->load->library('EnumValue', 'enumvalue');
		$this->load->model('Category_model', 'category');
		$this->load->model('Article_model', 'article');
        $this->load->model('User_model', 'user');
        $this->load->model('setting_model', 'set');
		$this->load->model('Pop_model', 'pop');
        $this->data['pop'] = $this->pop->getSinglePop();
        $this->data['pop_list'] = $this->pop->getPopListArr();
        $this->category_url     = $this->uri->segment(2);
        $this->category_index   = $this->uri->segment(3);
        $this->sub_cg_index     = $this->uri->segment(4); 


        $this->data = $this->menu();
        $this->getFamilySite();
        //$this->breadcrumbsNav();

        $this->data['session_user_index'] = $this->isLogin();
        
        $this->data['youku_address']    = "https://i.youku.com/i/UNDM1Mzc1NDg4OA==/videos?spm=a2hzp.8244740.0.0";

    }

    public function breadcrumbsNav()
    {
        $this->data['bb_category'] = $this->category->getBreadcrumbsCategory($top_category = true);

        foreach($this->data['bb_category'] as $row):
            $this->data['bb_sub_category'][$row['category_index']] = $this->category->getChildCategory($row['category_index']);
        endforeach;
    }


	public function menu(){

		$this->data['category'] = $this->category->getCategoryList($top_category = true);

		foreach($this->data['category'] as $row):
			$this->data['sub_category'][$row['category_index']] = $this->category->getChildCategory($row['category_index']);
		endforeach;

		return $this->data;

    }
    
    public function getFamilySite()
    {
        $this->data['family_list'] = $this->set->getFamilyList();
    }

	public function isLogin(){

		$is_login = false;

		if(isset($this->session->user_index) && !empty($this->session->user_index)):
			$is_login = true;
		endif;

		return $is_login;

	}

	public function pageNavigation($base_url = '', $total_rows = '', $limit = 10, $uri_segment = 3, $suffix = ''){

        $this->load->library('pagination');

        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['num_links'] = 10;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment; 
 	    $config['first_link'] = '처음';
	    $config['prev_link'] = '&laquo';
	    $config['next_link'] = '&raquo;';
	    $config['last_link'] = '마지막';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
	    $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="next" >';
        $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"> <a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="first" >';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';
		$config['page_query_string'] = TRUE;
        $config['suffix'] = $suffix;

        $this->pagination->initialize($config);

		$links = $this->pagination->create_links(); 

		$this->data['total_rows'] = $total_rows;

		$this->data['cur_page'] = $this->pagination->cur_page;

		$this->data['num_pages'] = $this->data['total_rows']/$limit;

		return $links;

	}

	public function pageNavigationSell($base_url = '', $total_rows = '', $limit = 10, $uri_segment = 3, $suffix = ''){

        $this->load->library('pagination');

        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['num_links'] = 10;
        $config['per_page'] = $limit;
        $config['uri_segment'] = $uri_segment; 
 	   
	    $config['prev_link'] = '<span aria-hidden="true"><i class="fa  fa-angle-left"></i></span>';
	    $config['next_link'] = '<span aria-hidden="true"><i class="fa  fa-angle-right"></i></span>';
	  
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
	    $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li >';
        $config['next_tag_close'] = '</li>';
	    $config['cur_tag_open'] = '<li class="active"> <a href="#">';
	    $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
       
		$config['page_query_string'] = TRUE;
        $config['suffix'] = $suffix;

        $this->pagination->initialize($config);

		$links = $this->pagination->create_links(); 

		$this->data['total_rows'] = $total_rows;

		$this->data['cur_page'] = $this->pagination->cur_page;

		$this->data['num_pages'] = $this->data['total_rows']/$limit;

		return $links;

	}

    public function fetchArticleData($base_url = false, $limit = false, $join_image = FALSE, $join_reply = FALSE, $search_array = false )
    {
        $this->data['page'] = $this->category->getSingleCategory($this->category_index);
        
        if( !empty( $this->sub_cg_index ) )
        {
            $this->data['sub_page'] = $this->category->getSingleCategory($this->sub_cg_index);
        }

		$this->data['parent_page'] = $this->category->getParentCategory($this->data['page']->parent_index);
        
		$get = $this->input->get();

        if( $base_url != false && $limit != false)
        {
            $total_rows = $this->article->getArticleQuantity($this->category_index, $search_array);

            $this->data['total_rows'] = $total_rows;

            if( !empty( $this->sub_cg_index ) )
            {
                $total_rows = $this->article->getArticleQuantity($this->sub_cg_index, $search_array);
            }

            //$limit = $limit;

            $uri_segment = 5;

            $this->data['page_nav'] = $this->pageNavigation($base_url, $total_rows, $limit, $uri_segment);

            @$offset = $get['per_page'];

            //$this->data['article_list'] = $this->article->getArticleList($this->category_index, $offset, $limit,$search_key,$keyword,$join_image,$join_reply);

            $this->data['article_list'] = $this->article->getArticleList( $this->sub_cg_index, $offset, $limit, $search_array ,$join_image,$join_reply);
        }
        if( $limit == false )
        {
            $this->data['article_list'] = $this->article->getArticleListOne( $this->sub_cg_index,$search_array);
        }
	}


	public function fetchDetailData( $search_array = false, $article_index = false ){

	    /*
	     * $search 是一个数组
	     * 键值1：search_key 数据库字段
	     * 键值2：search_function 搜索方法
	     */
        if( $article_index == false )
        {
            $article_index = $this->uri->segment(5);
        }

        $this->data['article'] = $this->article->getSingleArticle( $type = 'now', $article_index );
        
        $this->data['article_image']    = $this->article->getArticleImage( $article_index );

        $search_str = '';

        if( $search_array )
        {
                $search_str .= 'AND article.'.$search_array["search_key"].' '.$search_array["search_function"].' '.$this->data['article']->$search_array["search_key"];
        }

        $prev_next = $this->article->getSingleArticle( $type = 'prev_next', $article_index, $search_str );

        $this->console_log( $prev_next );
        
        $this->data['prev_article'] = $prev_next['prev'];

        $this->data['next_article'] = $prev_next['next'];
        
        
		$this->data['page'] = $this->category->getSingleCategory($this->data['article']->category_index);

		$this->data['parent_page'] = $this->category->getParentCategory($this->data['page']->parent_index);

		$article_hits = $this->data['article']->article_hits + 1;

		$data = array(
			'article_hits' => $article_hits
			);

		$this->article->updateArticle($data,$article_index);


	}

	public function fetchPageData(){

        $this->data['page'] = $this->category->getSingleCategory($this->category_index);
        
        if( !empty( $this->sub_cg_index ) )
        {
            $this->data['sub_page'] = $this->category->getSingleCategory($this->sub_cg_index);
        }

		$this->data['parent_page'] = $this->category->getParentCategory($this->data['page']->parent_index);

	}

    public function getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '2048')
    {
        
        $file_base_dir = $upload_dir;

        $folder = date('Ymd').'/';

        $file_dir = $file_base_dir.$folder;

        if (!file_exists($file_dir)){

             mkdir($file_dir, 0777);

        }

		$file_full_url = "";

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
	    $file_full_url = $config['upload_path'].$file_info['file_name'];

		endif;
            
	    return $file_full_url;
            
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

    public function getArraySearch($array, $key_name, $key_value){

        $index = array_search($key_value, array_column($array, $key_name));

        if($index !==false) {

            return $array[$index];

        } else {

            return array();

        }

    }

    public function getArrayByKey($array, $key_name) {

        $result = array();

        $key = array_column($array, $key_name);

        foreach($key as $i => $value) {

            $result[$value] = $array[$i];

        }

        return $result;

    }

    public function getQueryString(){

        $get_query = $this->input->get();

        $query_string = "";

        $count = 0;

        foreach($get_query as $key => $value):

            $count++;

            $symbol = '&';

            /*
            if($count = = 1):

                $symbol = '';

            endif;
            */

            //Convert array to string which fetched from GET method of user form

            if(is_array($value)):

                foreach($value as $key_arr => $value_arr):

                    $query_string .= $symbol.$key.'[]='.$value_arr;

                endforeach;

            else:

                if($key != 'per_page'):

                    $query_string .= $symbol.$key.'='.$value;

                endif;

            endif;

        endforeach;

        return $query_string;

    }

    public function console_log( $value )
    {
        echo "<script>console.log(".json_encode( $value ).")</script>";
    }
	// new add function
	public function fetchSellOldData($site_url,$limit){

		$keyword = trim($this->input->get('keyword'));

		if(!isset($keyword) || $keyword == "" || empty($keyword)):

		     $keyword = FALSE;

		endif;
        
		$base_url = site_url($site_url).'?';

		$get = $this->input->get();

		if(!empty($get['keyword'])):
			$base_url.="&keyword=".$get['keyword'];
		    $keyword = $get['keyword'];
		endif;

		$total_rows = $this->article->count_sell_old();

		$this->data['num'] = compact("total_rows");

		$limit = $limit;

		$uri_segment = 4;

        $this->data['page_nav'] = $this->pageNavigationSell($base_url, $total_rows, $limit, $uri_segment);

		@$offset = $get['per_page'];

		$this->data['sell_list'] = $this->article->getSellOldList($offset, $limit);

	}
    public function fetchSellData($site_url,$limit){

        $is_state = $this->uri->segment(3);

        $this->data['state'] = compact("is_state");

        $this->data['category'] = "";
        
        $xi_article_category_index = $this->uri->segment(4);

        $keyword = trim($this->input->get('keyword'));

        if(!isset($keyword) || $keyword == "" || empty($keyword)):

             $keyword = FALSE;

        endif;
        
        $base_url = site_url($site_url).$is_state.'?';
        if($xi_article_category_index):
            $this->data['category'] = compact("xi_article_category_index");
            $base_url = site_url($site_url).$is_state.'/'.$xi_article_category_index.'?';
        endif;
        $get = $this->input->get();

        if(!empty($get['keyword'])):
            $base_url.="&keyword=".$get['keyword'];
            $keyword = $get['keyword'];
        endif;

        $total_rows = $this->article->count_sell($keyword,$is_state,$xi_article_category_index);

        $this->data['num'] = compact("total_rows");

        $limit = $limit;

        $uri_segment = 4;

        $this->data['page_nav'] = $this->pageNavigationSell($base_url, $total_rows, $limit, $uri_segment);

        @$offset = $get['per_page'];

        $this->data['sell_list'] = $this->article->getSellList($keyword,$is_state,$xi_article_category_index,$offset, $limit);

    }


}
?>