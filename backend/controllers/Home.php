<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Basic_Controller {

    public function __construct()
    {
        parent::__construct();
        //$this->load->model('Category_model', 'category');
    }

    public function index()
    {
        $this->lists();
    }


    public function mediaList( $category_index = 105 )
    {

        $category_list = $this->category->getCategoryList();

        $tree_list = $this->getTree($category_list,$category_index);

        $article_list = array();

        if($tree_list){

            foreach($tree_list as $c):
                $get_article = $this->article->getArticleList($c['category_index']);
                $article_list = array_merge($article_list,$get_article);
            endforeach;

        } else {

            $article_list = $this->article->getArticleList($category_index);

        }

        //formatarray($article_list);exit;

        $combined_data = "";

        foreach($article_list as $key => $value):

            $article[] = $value;

            @$reply_count = $this->article->isReply($value['article_index'])->count;

            $count[$key]['count'] = $reply_count;

            $combined_data[$key] = array_merge($article[$key],$count[$key]);

        endforeach;

        //formatarray($combined_data);exit;

        if($combined_data){
            $this->data['article_list'] = $combined_data;
        }else{
            $this->data['article_list'] = array();
        }

        $this->data['article_display'] = $this->enumvalue->article_display;

        $this->data['article_is_top'] = $this->enumvalue->article_is_top;

        $this->load->view('home/media_list',$this->data);
    }

    public function mediaCreate()
    {
        $this->data['aspect_width'] = 828;
        $this->data['aspect_height'] = 470;

        $this->data['aspect2_width'] = 120;
        $this->data['aspect2_height'] = 120;

        $category_list = $this->category->getCategoryList();

        $this->data['category_list'] = $this->getTree($category_list,46);

        $this->load->view('home/media_create',$this->data);

    }

    public function mediaEdit()
    {
        $this->data['aspect_width'] = 828;
        $this->data['aspect_height'] = 470;

        $this->data['aspect2_width'] = 120;
        $this->data['aspect2_height'] = 120;

        $article_index = $this->uri->segment(3);

        $this->data['article'] = $this->article->getSingleArticle($article_index);

        $this->data['article_image'] = $this->article->getArticleImage($article_index);

        $category_list = $this->category->getCategoryList();

        $this->data['category_list'] = $this->getTree($category_list,0);

        $this->load->view('home/media_edit',$this->data);
    }

    public function process( $type, $index = false )
    {
        $data_post = $this->input->post();

        /**
         * debug
         */
        //var_dump($data_post);exit;

        $array = array();
        $url = 'home/lists/105';
        $message = '';
        $result_process = false;

        switch ( $type )
        {

            case 'media_create':

                $article_data = array(
                    'category_index'    => $this->input->post('category'),
                    'article_name'      => $this->input->post('article_name'),
                    'article_author'    => $this->input->post('article_author'),
                    'article_is_top'    => $this->input->post('article_is_top'),
                    'article_display'   => $this->input->post('article_display'),
                    'article_sort'    => $this->input->post('article_sort'),

                    'article_second_name'   => $this->input->post('article_second_name'),
                    'article_cover'         => $this->input->post('article_cover'),
                    'article_icon'         => $this->input->post('article_icon'),

                    'article_hits'          => $this->input->post('article_hits'),
                    'article_media_url'     => $this->input->post('article_media_url'),
                    'article_password'      => $this->input->post('article_password'),
                    'article_description'   => $this->input->post('article_description'),
                    'article_content'       => $this->input->post('article_content'),
                    'article_created_time'  => time()
                );

                $result_process = $this->article->insertArticle( $article_data );

                $url = 'home/mediaList/'.$this->input->post('category');

                break;

            case 'media_edit':

                $article_index = $this->input->post('article_index');

                $article_image = $this->input->post('article_image');

                $article_data = array(
                    'article_name'      => $this->input->post('article_name'),
                    'article_author'    => $this->input->post('article_author'),
                    'article_is_top'    => $this->input->post('article_is_top'),
                    'article_display'   => $this->input->post('article_display'),
                    'article_sort'    => $this->input->post('article_sort'),

                    'article_second_name'   => $this->input->post('article_second_name'),
                    'article_cover'         => $this->input->post('article_cover'),
                    'article_icon'         => $this->input->post('article_icon'),

                    'article_hits'          => $this->input->post('article_hits'),
                    'article_media_url'     => $this->input->post('article_media_url'),
                    'article_password'      => $this->input->post('article_password'),
                    'article_description'   => $this->input->post('article_description'),
                    'article_content'       => $this->input->post('article_content'),
                );

                $result_process = $this->article->updateArticle($article_data,$article_index);

                $url = $url = 'home/mediaList/'.$this->input->post('category_index');

                break;

            case 'media_remove':

                //$article_index = $this->uri->segment(3);
                $article_index = $index;

                $result_process = $this->article->deleteArticle($article_index);

                $url = 'home/mediaList/'.$this->uri->segment(5);

                break;
        }

        if( $result_process )
        {
            $message = 'Success';
        }

        //var_dump( $result_process );exit;

        success( $url,$message);

    }

    /*public function insert(){

        $category_image = $this->getUploadFileUrl('./uploads/category/','category_image');

        $data = array(
            'parent_index'      => $this->input->post('parent_index'),
            'category_template_index' => $this->input->post('category_template_index'),
            'category_name'     => $this->input->post('category_name'),
            'category_url'     => $this->input->post('category_url'),
            'category_image'    => $category_image,
            'category_sort'     => $this->input->post('category_sort'),
            'category_display'  => $this->input->post('category_display'),
            'category_description' => $this->input->post('category_description'),
            'category_content'  => $this->input->post('category_content')
        );

        $query = $this->category->insertCategory($data);

        if($query){
            success('category','Success');
        }else{
            error('Error');
        }

    }*/


    /*public function update(){

        $category_image = $this->input->post('category_image_path');

        $category_index = $this->input->post('category_index');

        $file_full_url = $this->getUploadFileUrl('./uploads/category/','category_image');

        if($file_full_url != ""):
            $category_image = $file_full_url;
        endif;

        $data = array(
            'parent_index'      => $this->input->post('parent_index'),
            'category_template_index' => $this->input->post('category_template_index'),
            'category_name'     => $this->input->post('category_name'),
            'category_url'     => $this->input->post('category_url'),
            'category_image'    => $category_image,
            'category_sort'     => $this->input->post('category_sort'),
            'category_display'  => $this->input->post('category_display'),
            'category_description' => $this->input->post('category_description'),
            'category_content'  => $this->input->post('category_content')
        );

        $this->category->updateCategory($category_index,$data);

        success('category','Success');

    }*/

    /*public function remove(){

        $category_index = $this->uri->segment(3);

        $category_list = $this->category->getCategoryList();

        $tree_list = $this->getTree($category_list,$category_index);

        if (empty($tree_list)) {

            $query = $this->category->deleteCategory($category_index);

            if($query){
                success('category','Success');
            }else{
                error('ERROR');
            }

        } else {

            error('하위 카태고리 존재하여 현제 카태고리 지울수 없습니다');

        }

    }*/


    public function getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '2048'){

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
}