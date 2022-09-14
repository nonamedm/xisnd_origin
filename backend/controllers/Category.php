<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Basic_Controller {


	public function index(){ 

		$parent_index = 0;

		if($this->uri->segment(3))
		{
			$parent_index = $this->uri->segment(3);
		}

		$this->categoryList( $parent_index );

		/* $category_list = $this->category->getCategoryList();

		
       
		$tree_list = $this->getTree( $category_list, $parent_index );
	
		foreach($tree_list as $key => $value)
		{
			$category[] = $value;

			@$parent_name = $this->category->getParentCategory( $value['parent_index'] )->category_name;

			if(!$parent_name)
			{
				$parent[$key]['parent_name'] = "NONE";
			}
			else
			{
				$parent[$key]['parent_name'] = $parent_name;
			}

            $combined_data[$key] = array_merge($category[$key],$parent[$key]);

		} */

        //formatarray($combined_data);exit;
        
		//$this->data['category_list'] = $data_array['combined_data'];

		$this->data['category_display'] = $this->enumvalue->category_display;

		$this->load->view('category_list',$this->data);

	}

    public function treeList(){
		$this->load->view('category_tree_list');
	}

	public function add(){

		$category_list = $this->category->getCategoryList();
        
		foreach($category_list as $key => $value):

			    $category[] = $value;

                @$parent_name = $this->category->getParentCategory($value['parent_index'])->category_name;

				if(!$parent_name){
					$parent[$key]['parent_name'] = "NONE";
				}else{
					$parent[$key]['parent_name'] = $parent_name;
				}

            $combined_data[$key] = array_merge($category[$key],$parent[$key]);

		endforeach;
        
		@$this->data['category_list'] = $this->getTree($combined_data,0);
		
		$this->data['category_template_list'] = $this->category->getCategoryTemplate();

		$this->load->view('category_add',$this->data);

	}

	public function insert(){

        $category_image = array();

        if( !empty( $_FILES['category_image']['tmp_name'] ) )
        {
            $category_image = $this->getUploadFileUrl('./uploads/category/', 'category_image');
        }

        $data = array(
			'parent_index'      => $this->input->post('parent_index'),
			'category_template_index' => $this->input->post('category_template_index'),
			'category_name'     => $this->input->post('category_name'),
			'category_url'     => $this->input->post('category_url'),
			'category_sort'     => $this->input->post('category_sort'),
			'category_display'  => $this->input->post('category_display'),
			'category_description' => $this->input->post('category_description'),
			'category_content'  => $this->input->post('category_content')
			);

        if( !empty( $category_image['file_url'] ) )
        {
            $data['category_image'] = $category_image['file_url'];
        }

        $query = $this->category->insertCategory($data);

        $url = 'category';
        if( $this->uri->segment(3) )
        {
            $url = $this->uri->segment(3);
        }

        if(  $this->uri->segment(4) )
        {
            $url .= '/'.$this->uri->segment(4);
        }

		if($query)
		{
			success($url,'Success');
		}else{
			error('Error');
		}

	}

	public function edit(){

        $category_index = $this->uri->segment(3);

		$this->data['category'] = $this->category->getSingleCategory($category_index);

        $category_list = $this->category->getCategoryList();

		$this->data['category_list'] = $this->getTree($category_list,0);

		$this->data['category_template_list'] = $this->category->getCategoryTemplate();

		$this->load->view('category_edit',$this->data);

	}

	public function update(){

		$category_image['file_url'] = $this->input->post('category_image_path');

		$category_index = $this->input->post('category_index');

        if( !empty( $_FILES['category_image']['tmp_name'] ) )
        {
            $category_image = $this->getUploadFileUrl('./uploads/category/', 'category_image');
        }

		
        $data = array(
			'parent_index'      => $this->input->post('parent_index'),
			'category_template_index' => $this->input->post('category_template_index'),
			'category_name'     => $this->input->post('category_name'),
			'category_url'     => $this->input->post('category_url'),
			'category_sort'     => $this->input->post('category_sort'),
			'category_display'  => $this->input->post('category_display'),
			'category_description' => $this->input->post('category_description'),
			'category_content'  => $this->input->post('category_content')
			);
        if( !empty( $category_image['file_url'] ) )
        {
            $data['category_image'] = $category_image['file_url'];
        }

        $result = $this->category->updateCategory($category_index,$data);

        $url = 'category';
        if( $this->uri->segment(3) )
        {
            $url = $this->uri->segment(3);
        }

        if(  $this->uri->segment(4) )
        {
            $url .= '/'.$this->uri->segment(4);
        }

        if ( $result )
        {
            success( $url,'Success');
        }
        else
        {
            error('Failed');
        }


	}

	public function remove(){

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

	}
}
