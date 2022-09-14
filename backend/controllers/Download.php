<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends Basic_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->categoryList();

        $this->data['category_index'] = 56;
        
        $this->data['category_type'] = $this->uri->segment(1);
    }

    public function lists()
    {
        $category_index     = $this->data['category_index'];
        $data_get           = $this->input->get();

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

		$this->load->view('download/list',$this->data);
    }

    

    public function detail( $article_index = null )
    {
        //$this->data['news_detail'] = $this->news->getNewsDetail( $article_index );

        $this->data['aspect_width'] = 500;
        $this->data['aspect_height'] = 500;

        $this->data['form_type'] = 'insert';

        if( $article_index != null )
        {
            $this->data['article'] = $this->article->getSingleArticle( $article_index );

            $this->data['article_image'] = $this->article->getArticleImage( $article_index );

            $this->data['form_type'] = 'update';
        }
        
        $this->load->view('download/detail', $this->data);
    }

    public function process()
    {
        
    }

}