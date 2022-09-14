<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Basic_Controller 
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('News_model', 'news');

        $this->categoryList();
    }

    public function categoryLists()
    {
        $this->data['news_cg_lists'] = $this->news->getNewsCategoryList();

        $this->load->view('news/news_cg_lists', $this->data);
    }

    public function categoryDetail( $news_cg_index = null )
    {
        if( $news_cg_index != null )
        {
            $this->data['news_cg_detail'] = $this->news->getNewsCategoryDetail( $news_cg_index );
            $this->data['form_type'] = 'modify';
        }
        else
        {
            $this->data['news_cg_detail'] = null;
            $this->data['form_type'] = 'create';
        }
        
        $this->load->view('news/news_cg_detail', $this->data);

    }

    public function lists( $category_index = 50 )
    {
        $data_get = $this->input->get();

        $search_array = false;

        $news_category = $this->news->getNewsCategoryList();

        

        $category_index_array = array();
        foreach ($news_category as $index => $item)
        {
            $this->data['news_category'][$item['news_cg_index']] = $item['news_cg_name'];

            $category_index_array[] = "article.category_index = ".$item['category_index'];
        }

        if( !empty( $data_get['search_name'] ) )
        {
            $search_array[] = 'article_name LIKE "%'.$data_get['search_name'].'%"';
        }

        if( !empty( $data_get['search_category'] ) )
        {
            $search_array[] = 'news_cg_index LIKE "%'.$data_get['search_category'].'%" ';
        }

        //category_index 也许是数组
        $article_list = $this->article->getArticleList( $category_index_array, $search_array );

		$combined_data = "";

        foreach($article_list as $key => $value)
        {
            $article[] = $value;

            @$reply_count = $this->article->isReply($value['article_index'])->count;

            $count[$key]['count'] = $reply_count;

            $combined_data[$key] = array_merge($article[$key],$count[$key]);
        }

        if($combined_data)
        {
			 $this->data['article_list'] = $combined_data;
        }
        else
        {
			 $this->data['article_list'] = array();
        }
        
        
        
        $this->data['y_n'] = $this->enumvalue->y_n;

		$this->load->view('news/news_list',$this->data);
    }

    

    public function detail( $article_index = null )
    {
        //$this->data['news_detail'] = $this->news->getNewsDetail( $article_index );

        $this->data['aspect_width'] = 500;
        $this->data['aspect_height'] = 500;

        $this->data['form_type'] = 'insert';

        $this->data['news_category'] = $this->news->getNewsCategoryList();

        /* foreach ($news_category as $index => $item)
        {
            $this->data['news_category'][$item['news_cg_index']] = $item['news_cg_name'];
        } */

        if( $article_index != null )
        {
            $this->data['article'] = $this->article->getSingleArticle( $article_index );

            $this->data['article_image'] = $this->article->getArticleImage( $article_index );

            $this->data['form_type'] = 'update';
        }
        
        $this->load->view('news/news_detail', $this->data);
    }

    public function processCategory( $type )
    {
        $data_post      = $this->input->post();
        $news_cg_index  = isset( $data_post['news_cg_index'] ) ? $data_post['news_cg_index'] : $this->uri->segment(4);
        $return_result  = false;

        switch ( $type )
        {
            case 'create':
                $create_array = array(
                    'category_index'    => $data_post['category_index'],
                    'news_cg_name'      => $data_post['news_cg_name'],
                    'news_cg_display'   => $data_post['news_cg_display'],
                );

                $return_result = $this->news->createNewsCategory( $create_array );
                break;

            case 'modify':
                $modify_array = array(
                    'category_index'    => $data_post['category_index'],
                    'news_cg_name'      => $data_post['news_cg_name'],
                    'news_cg_display'   => $data_post['news_cg_display'],
                );

                $return_result = $news_cg_index != null ? $this->news->modifyNewsCategory( $modify_array, $news_cg_index ) : false;
                break;

            case 'remove':
                $return_result = $news_cg_index != null ? $this->news->removeNewsCategory( $news_cg_index ) : false;
                break;
        }

        if( $return_result )
        {
            success('news/categoryLists', 'Success');
        }

        success('news/categoryLists', 'Failed');
    }

}