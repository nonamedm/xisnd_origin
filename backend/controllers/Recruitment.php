<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment extends Basic_Controller 
{
    private $controllers_name = 'recruitment';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Recruitment_model', 'recruitment');

        $this->categoryList();


        
    }

    public function categoryLists()
    {
        $this->data['news_cg_lists'] = $this->recruitment->getCategoryList();

        $this->load->view($this->controllers_name.'/cg_lists', $this->data);
    }

    public function categoryDetail( $cg_index = null )
    {
        if( $cg_index != null )
        {
            $this->data['cg_detail'] = $this->recruitment->getCategoryDetail( $cg_index );
            $this->data['form_type'] = 'modify';
        }
        else
        {
            $this->data['news_cg_detail'] = null;
            $this->data['form_type'] = 'create';
        }
        
        $this->load->view($this->controllers_name.'/cg_detail', $this->data);

    }

    public function lists( $category_index = 46 )
    {
        $data_get = $this->input->get();

        $search_array = false;

        $second_category = $this->recruitment->getCategoryList();

        $category_index_array = array();

        foreach ($second_category as $index => $item)
        {
            $this->data['second_category'][$item['rec_cg_index']] = $item['rec_cg_name'];

            $category_index_array[] = "article.category_index = ".$item['category_index'];
        }

        if( !empty( $data_get['search_name'] ) )
        {
            $search_array[] = 'article.article_name LIKE "%'.$data_get['search_name'].'%"';
        }

        if( !empty( $data_get['search_category'] ) )
        {
            $search_array[] = 'article.rec_cg_index = '.$data_get['search_category'] ;
        }

        //category_index 也许是数组
        $article_list = $this->article->getArticleList( $category_index_array, $search_array );
        $this->console_log($article_list);

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

		$this->load->view($this->controllers_name.'/list',$this->data);
    }

    

    public function detail( $article_index = null )
    {
        //$this->data['news_detail'] = $this->news->getNewsDetail( $article_index );

        $this->data['aspect_width'] = 500;
        $this->data['aspect_height'] = 500;

        $this->data['form_type'] = 'insert';

        $this->data['second_category'] = $this->recruitment->getCategoryList();

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
        
        $this->load->view( $this->controllers_name.'/detail', $this->data);
    }

    public function processCategory( $type )
    {
        $data_post      = $this->input->post();
        $cg_index  = isset( $data_post['cg_index'] ) ? $data_post['cg_index'] : $this->uri->segment(4);
        $return_result  = false;

        switch ( $type )
        {
            case 'create':
                $create_array = array(
                    'category_index'    => $data_post['category_index'],
                    'rec_cg_name'      => $data_post['cg_name'],
                    'rec_cg_display'   => $data_post['cg_display'],
                );

                $return_result = $this->recruitment->createCategory( $create_array );
                break;

            case 'modify':
                $modify_array = array(
                    'category_index'    => $data_post['category_index'],
                    'rec_cg_name'      => $data_post['cg_name'],
                    'rec_cg_display'   => $data_post['cg_display'],
                );

                $return_result = $cg_index != null ? $this->recruitment->modifyCategory( $modify_array, $cg_index ) : false;
                break;

            case 'remove':
                $return_result = $cg_index != null ? $this->recruitment->removeCategory( $cg_index ) : false;
                break;
        }

        if( $return_result )
        {
            //success($this->controllers_name.'/categoryLists', 'Success');
        }

        //success($this->controllers_name.'/categoryLists', 'Failed');
    }

}