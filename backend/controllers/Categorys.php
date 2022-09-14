<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorys extends Basic_Controller {

    public function Lists()
    {
        $parent_index = 0;

        if($this->uri->segment(3))
        {
            $parent_index = $this->uri->segment(3);
        }

        $this->categoryList( $parent_index );

        $this->data['category_display'] = $this->enumvalue->category_display;

        $this->load->view('category/category_list',$this->data);
    }

    public function detail( $category_index )
    {
        $this->data['form_type'] = 'insert';

        if ( $category_index )
        {
            $this->data['category'] = $this->category->getSingleCategory($category_index);

            $category_list = $this->category->getCategoryList();

            $this->data['category_list'] = $this->getTree($category_list,0);

            $this->data['category_template_list'] = $this->category->getCategoryTemplate();

            $this->data['form_type'] = 'update';
        }

        $this->load->view('category/category_detail',$this->data);
    }
}