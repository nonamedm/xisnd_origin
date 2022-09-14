<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materials extends Basic_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->categoryList();

        $this->data['form_url_1'] = 'materials';
    }

    public function materialsEnLists( $category_index = 54)
    {
        $this->data['detail_url'] = 'materialsEnDetail';
        $this->lists( $category_index );
    }

    public function materialsEnDetail( $article_index = null )
    {

        
        $this->data['form_url_2'] = 'materialsEnLists';
        $this->data['category_index_v'] = 54;
        $this->data['materials_title'] = '영어 인쇄홍보물제작';

        $this->detail( $article_index );
    }

    public function materialsCnLists()
    {
        $this->data['detail_url'] = 'materialsCnDetail';
        $this->lists( $category_index = 101 );
    }

    public function materialsCnDetail(  $article_index = null )
    {
        $this->data['form_url_2'] = 'materialsCnLists';
        $this->data['category_index_v'] = 101;
        $this->data['materials_title'] = '중국어 인쇄홍보물제작';
        
        $this->detail( $article_index );
    }

    public function materialsOLists()
    {
        $this->data['detail_url'] = 'materialsODetail';
        $this->lists( $category_index = 102 );
    }

    public function materialsODetail( $article_index = null )
    {
        $this->data['form_url_2'] = 'materialsOLists';
        $this->data['category_index_v'] = 102;
        $this->data['materials_title'] = '기타언어 인쇄홍보물제작';

        $this->detail( $article_index );
    }

    public function lists( $category_index )
    {
        $data_get = $this->input->get();

        $search_array = false;

        if( !empty( $data_get['search_name'] ) )
        {
            $search_array[] = 'article_name LIKE "%'.$data_get['search_name'].'%"';
        }

        if( !empty( $data_get['search_category'] ) )
        {
            $search_array[] = 'news_cg_index LIKE "%'.$data_get['search_category'].'%" ';
        }


        $article_list = $this->article->getArticleList( $category_index, $search_array );

		$combined_data = "";

        foreach($article_list as $key => $value)
        {
            $article[] = $value;

            @$reply_count = $this->article->isReply($value['article_index'])->count;

            $count[$key]['count'] = $reply_count;

            $combined_data[$key] = array_merge($article[$key],$count[$key]);
        }

        if( $combined_data )
        {
			 $this->data['article_list'] = $combined_data;
        }
        else
        {
			 $this->data['article_list'] = array();
        }
        
        $this->data['y_n'] = $this->enumvalue->y_n;

		$this->load->view('materials/materials_lists',$this->data);
    }

    

    public function detail( $article_index = null )
    {
        //$this->data['news_detail'] = $this->news->getNewsDetail( $article_index );

        $this->data['aspect_width'] = 264;
        $this->data['aspect_height'] = 300;

        $this->data['form_type'] = 'insert';

        if( $article_index != null )
        {
            $this->data['article'] = $this->article->getSingleArticle( $article_index );

            $this->data['article_image'] = $this->article->getArticleImage( $article_index );

            $this->data['form_type'] = 'update';
        }
        
        $this->load->view('materials/materials_detail', $this->data);
    }

}