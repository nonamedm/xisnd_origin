<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends Basic_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Form_model', 'form');
        $this->load->model('Basic_model', 'basics');
        
        $this->categoryList();

    }

    public function index()
    {
        $this->lists();
    }

    /**
     * Ask Categotry
     */
    public function categoryLists()
    {
        $this->data['form_cg_list'] = $this->form->getFormCategoryList();
        $this->load->view('form/form_category_lists', $this->data);
    }

    public function categoryDetail( $form_cg_index = null )
    {
        if( $form_cg_index != null )
        {
            $this->data['form_cg_detail'] = $this->form->getFormCategoryDetail( $form_cg_index );
            $this->data['form_type'] = 'modify';
        }
        else
        {
            $this->data['form_cg_detail'] = null;
            $this->data['form_type'] = 'create';
        }
        
        $this->load->view('form/form_category_detail', $this->data);

    }

    public function processCategory( $type )
    {
        $data_post      = $this->input->post();
        $form_cg_index  = isset( $data_post['form_cg_index'] ) ? $data_post['form_cg_index'] : $this->uri->segment(4);
        $return_result  = false;

        switch ( $type )
        {
            case 'create':
                $create_array = array(
                    'category_index'    => $data_post['category_index'],
                    'form_cg_name'      => $data_post['form_cg_name'],
                    'form_cg_display'   => $data_post['form_cg_display'],
                );

                $return_result = $this->form->createFormCategory( $create_array );
                break;

            case 'modify':
                $modify_array = array(
                    'category_index'    => $data_post['category_index'],
                    'form_cg_name'      => $data_post['form_cg_name'],
                    'form_cg_display'   => $data_post['form_cg_display'],
                );

                $return_result = $form_cg_index != null ? $this->form->modifyFormCategory( $modify_array, $form_cg_index ) : false;
                break;

            case 'remove':
                $return_result = $form_cg_index != null ? $this->form->removeFormCategory( $form_cg_index ) : false;
                break;
        }

        if( $return_result )
        {
            success('form/categoryLists', 'Success');
        }

        success('form/categoryLists', 'Failed');
    }

    public function formLists()
    {

        $data_get = $this->input->get();

        $search_array = false;

        if( !empty( $data_get['search_name'] ) )
        {
            $search_array[] = 'name LIKE "%'.$data_get['search_name'].'%"';
        }

        if( !empty( $data_get['search_category'] ) )
        {
            $search_array[] = 'form_cg_index LIKE "%'.$data_get['search_category'].'%" ';
        }

        $this->data['form_list']     = $this->form->getFormList( $search_array ); 
        
        $form_category = $this->form->getFormCategory();

        foreach ($form_category as $index => $item)
        {
            $this->data['form_category'][$item['form_cg_index']] = $item['form_cg_name'];
        }

        $this->load->view('form/form_list', $this->data);

    }

    public function formDetail( $form_cg_index, $form_index = null )
    {
        $this->data['form_type'] = 'create';
        if( $form_index != null )
        {
            $this->data['form_type']    = 'modify';
            $this->data['form_detail']  = $this->form->getFormDetail( $form_index );
        }
    
        $this->load->view('form/form_detail', $this->data);
    }

    

    //ask_email

    public function email()
    {
        $url = 'form/email';
        $message = 'Failed';
        $process_result = false;

        $this->data['email_cg'] = $this->form->getEmailCategory();

        $this->data['email'] = $this->form->getEmail();

        if($this->input->post('form_status') == 1)
        {
            //var_dump($this->input->post());exit;

            $data_post = $this->input->post();

            $process_result = $this->form->processEmail( $data_post );

            if( $process_result )
            {
                $message = 'Success';
            }

            success($url, $message);
        }

        $this->load->view('form/email' ,$this->data);
    }

    //处理方法
    public function process( $type, $form_index = false )
    {
        $data_post = $this->input->post();

        //var_dump($data_post);exit;

        $array      = array();
        $url        = 'main';
        $message    = 'Failed';

        switch ( $type )
        {
            case 'remove':

                $result_process = $this->form->removeForm( $form_index );

                $url = 'form/formLists';

                break;
            default:
                $result_process = false;
                break;
        }

        if( $result_process )
        {
            $message = 'success';
        }

        success( $url,$message);
    }
}