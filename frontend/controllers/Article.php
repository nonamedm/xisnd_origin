<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Basic_Controller {


    public function __construct(){

        parent::__construct();

        $this->load->model('Form_model','form');
        $this->load->model('News_model','news');
        $this->load->model('Recruitment_model', 'recruitment');

        $this->data['category_index']   = $this->uri->segment(3);
        $this->data['sub_cg_index']     = $this->uri->segment(4);
        $this->data['article_index']    = $this->uri->segment(5);

    }

    public function index()
    {
       //foreach
    }

    //ajax
    //获取数据
    public function getAjaxRecruitmentList()
    {
    	$page   = $this->input->post('page');
    	$ts     = $this->input->post('ts');
        $gjz    = $this->input->post('gjz');//关键字
        $cg_index = $this->input->post('cg_index');
        $search_array   = false;

        if( $gjz )
        {
            $search_array['article_name'] = $gjz;
        }

        if( $cg_index > 0 )
        {
            $search_array['rec_cg_index'] = $cg_index;
            //$_GET['rec_cg_index'] = $cg_index;
        }

    	$start_limit = 0;
        if($page != 1)
        {
            $start_limit = ($page - 1)*$ts;
        }
		
        //$data1  = $this->process->getAjaxList( $gjz, $start_limit, $ts );//每页显示的数据
        $data1  = $this->article->getArticleList( $this->sub_cg_index, $start_limit, $ts, $search_array);
        //$num    = $this->process->getAjaxNum( $gjz );//总条数
        $num    = $this->article->getArticleQuantity( $this->sub_cg_index, $search_array );
        $result_cg  = $this->recruitment->getCategoryList();
        $sub_cg     = array();
        //var_dump( $result_cg );
         foreach( $result_cg as $item )
        {
            $sub_cg[$item['rec_cg_index']] = $item['rec_cg_name'];
        } 
    	$data   = array(
            'list' => $data1,
            'cg'   => $sub_cg,
    		'num'  => $num
    		);
    	echo json_encode($data);
    }

    //获取总条数
    public function getTotleNav()
    {
        $gjz            = $this->input->post('gjz');
        $cg_index = $this->input->post('cg_index');
        $search_array   = false;

        if( $gjz )
        {
            $search_array['article_name'] = $gjz;
        }

        if( $cg_index > 0 )
        {
            $search_array['rec_cg_index'] = $cg_index;
            //$_GET['rec_cg_index'] = $cg_index;
        }

        $count = $this->article->getArticleQuantity( $this->sub_cg_index, $search_array );

        echo json_encode($count);
    }

    //ajax详细页
    public function getAjaxSingleForm()
    {
        $article_index      = $this->input->post('article_index');
        $rec_cg_index       = $this->input->post('cg_index');
        $search_str         = ''; 

        if( $rec_cg_index != 0 )
        {
            $search_str = ' AND article.rec_cg_index = '.$rec_cg_index.' ';
        }
        
    	$data_single    = $this->article->getSingleArticle( 'now', $article_index, $search_str);//详细数据
    	$data_pn       = $this->article->getSingleArticle( 'prev_next', $article_index, $search_str );//上一页
    	//$data_next      = $this->article->getSingleArticle( 'next', $article_index, ' AND article.category_index = '.$this->data['sub_cg_index']);//下一页
        $article_hits = $data_single->article_hits + 1;

        $data_pre = $data_pn['prev'];
        $data_next = $data_pn['next'];
		$data = array(
			'article_hits' => $article_hits
			);

		$this->article->updateArticle($data,$article_index);

        $result_cg  = $this->recruitment->getCategoryList();
        $sub_cg     = array();

         foreach( $result_cg as $item )
        {
            $sub_cg[$item['rec_cg_index']] = $item['rec_cg_name'];
        } 

        $data = array(
            'single'    => $data_single,
            'cg'        => $sub_cg,
    		'pre'       => $data_pre,
    		'next'      => $data_next
    		);
    	echo json_encode($data);
    }

    public function getArticleByAjax()
    {
        $data_post  = $this->input->post();
        $offset     = $data_post['offset'];
        $limit      = $data_post['limit'];
        //$search_array =  $data_post['search'];
        $join_image = true;

        $article_list = $this->article->getArticleList( $this->sub_cg_index, $offset, $limit, $search_array ,$join_image);
        
        foreach( $article_list as $index => $item )
        {
            $article_lists[$index]['image_url'] = '';
            $article_lists[$index]['url'] = '';
        }
        $reatut = array(
            'status'    => 1,
            'data'      => $article_lists
        );
        echo json_encode( $article_lists );
    }

    public function getArticleDetailByAjax()
    {
        $data_post          = $this->input->post();

        if( !empty($data_post['index']) )
        {
            $article_index      = $data_post['index'];
        }
        
      
        //$search_array =  $data_post['search'];
        //$join_image = true;

        $this->fetchDetailData( false, $article_index);

        foreach( $this->data['article_image'] as $index => $item )
        {
            $article_image[$index] = '<div style="float:left; width:100%; position:relative; height:100%; text-align:center; margin:0px;" id="fancybox_html_content"><img src="'.base_url().$item['article_image_url'].'" style="margin:0 auto; max-width:100%;" /></div>';
        }
        
        $result = array(
            'status'    => 1,
            'src'      => $article_image
        );
        echo json_encode( $result );
        //var_dump($result);exit;
        
        
    }

    public function getRecruitmentCgByAjax()
    {
        $recruitment_category = $this->recruitment->getCategoryList();

        foreach ($recruitment_category as $index => $item)
        {
            $this->data['recruitment_category_category'][$item['rec_cg_index']] = $item['rec_cg_name'];
        }

        echo json_encode($this->data['recruitment_category_category']);
    }
    

    //1.5
    public function recruitment()
    {
  
        $second_category = $this->recruitment->getCategoryList();

        foreach ($second_category as $index => $item)
        {
            $this->data['second_category'][$item['rec_cg_index']] = $item['rec_cg_name'];
        }

        $this->data['sub_type'] = 'sub1';

        $this->fetchArticleData();

        $this->load->view('article/recruitment', $this->data);
    }
    //4.3
    public function history()
    {
        $this->load->model('History_model','history');

        $this->data['history_category'] = $this->history->getHistoryCategory();

        //$this->data['history']

        $list = $this->history->getHistList();

    
        foreach( $list as $item )
        {
            $this->data['history_list'][$item['category_date_index']][$item['article_date_title']][] = array( 'month' => $item['article_date_month'], 'content' => $item['article_date_content'] );
            
        }

        $this->fetchArticleData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('article/history', $this->data);
    }

    //5.2.1
    public function portfolioDetail()
    {
        
        $this->fetchDetailData();
        $this->data['sub_type'] = 'sub5';

        $this->load->view('article/portfolio_detail',$this->data);
    }

    //3.1
    public function notice(){

        $data_get   = $this->input->get();
        $search_array   = array();

        if( !empty($data_get['search_word']) )
        {
            $search_array['article_name'] = $data_get['search_word'];
        }

        if( !empty($data_get['per_page']) )
        {
            unset( $data_get['per_page']);
        }
  
        
        $limit      = 10;
        $base_url   = site_url('article/notice/'.$this->data['category_index'].'/'.$this->data['sub_cg_index'].'?').http_build_query($data_get);
        
        
        $this->fetchArticleData($base_url, $limit, false, false, $search_array);
        
        $this->data['sub_type'] = 'sub4';

        $this->load->view('article/notice', $this->data);

        

    }

    //7.1.1
    public function noticeDetail()
    {

        $this->fetchDetailData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('article/notice_detail',$this->data);

    }
    //4.1
    public function download()
    {
        //$limit      = 10;
        //$base_url  = site_url('article/download/'.$this->data['category_index'].'/'.$this->data['sub_cg_index'].'?');

        $this->fetchArticleData( );
        $this->data['sub_type'] = 'sub4';

        $this->load->view('article/download',$this->data);

    }
}