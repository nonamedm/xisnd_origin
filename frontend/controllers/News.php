<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Basic_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model', 'news');
    }

    public function lists( $news_cg_index = 1 )
    {
        $offset = "LIMIT 0,5";

        $search = !empty( $this->input->get('search_word') ) ? $this->input->get('search_word') : false;

        $this->data['news_list'] = $this->news->getNewsList( $news_cg_index, $offset, $search );

        $this->data['list_count'] = count( $this->news->getNewsList( $news_cg_index, false, $search ) );

        $this->load->view('news/list', $this->data);
    }

    public function detail( $news_index )
    {
        $this->data['news_detail'] = $this->news->getNewsDetail( $news_index );

        $this->data['prev_next'] = $this->news->getNewsPrevNext( $this->data['news_detail']->news_cg_index, $this->data['news_detail']->news_create_date );

        $this->news->click( $this->data['news_detail']->news_index );

        $this->load->view('news/detail', $this->data);
    }

    public function getListByAjax()
    {

        $post_data = $this->input->post();

        $news_cg_index = $post_data['cg_index'];

        $offset = "LIMIT ". $post_data['index']."," .$post_data['count'];


        switch ($post_data['type'])
        {
            case 'get_more':

                $data_array = array();

                $search = !empty($post_data['search']) ? $post_data['search'] : false ;

                $this->data['news_list'] = $this->news->getNewsList( $news_cg_index, $offset, $search );

                $this->data['list_count'] = count( $this->news->getNewsList( $news_cg_index, false, $search ) );

                foreach ( $this->data['news_list'] as $item )
                {
                    $array = array
                    (
                        'tags'    => $item['news_cg_name'],
                        'title'   => $item['news_title'],
                        'detail'  => $item['news_description'],
                        'img_src' => base_url().$item['news_image'],
                        'date'    => date('Y.m.d', $item['news_create_date']),
                        'url'     => site_url('news/detail/'.$item['news_index'])
                    );

                    $data_array[] = array_merge($array, $data_array);
                }

                if( $this->data['news_list'] && $this->data['list_count'] )
                {
                    $status     = 1;
                    $news_list  = $data_array;
                    $now_number = $post_data['index'];
                    $max_number = $this->data['list_count'];

                }
                else
                {
                    $status = 2;
                    $news_list = '';
                    $now_number = '';
                    $max_number = '';
                }

                if( ($now_number + $post_data['count']) > $max_number )
                {
                    $now_number = $max_number;
                }
                elseif( $max_number == 0 )
                {
                    $now_number = 0;
                }
                else
                {
                    $now_number = $now_number + $post_data['count'];
                }

                $return_array = array
                (
                    'status'        => $status,
                    'news_list'     => $news_list,
                    'now_number'    => $now_number,
                    'max_number'    => $max_number,
                );
                echo json_encode( $return_array );
                break;
        }

;

    }



}