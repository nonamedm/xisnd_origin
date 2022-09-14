<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
	
        private $table_name;  

        private $category_index;      
        private $parent_index;   
        private $category_name;   
	    private $category_seo_title; 
	    private $category_seo_description; 
	    private $category_image; 
        private $category_sort;       
        private $category_level;          
        private $category_display;    

        public function __construct($arr = array()){  
            parent::__construct();
            $this->table_name = (isset($arr['table_name'])) ? $arr['table_name'] : 'category';
            $this->category_index = (isset($arr['category_index'])) ? $arr['category_index'] : 'category_index';
            $this->parent_index = (isset($arr['parent_index'])) ? $arr['parent_index'] : 'parent_index';
            $this->category_name = (isset($arr['category_name'])) ? $arr['category_name'] : 'category_name';
			$this->category_seo_title = (isset($arr['category_seo_title'])) ? $arr['category_seo_title'] : 'category_seo_title';
			$this->category_seo_description = (isset($arr['category_seo_description'])) ? $arr['category_seo_description'] : 'category_seo_description';
			$this->category_image = (isset($arr['category_image'])) ? $arr['category_image'] : 'category_image';
            $this->category_sort = (isset($arr['category_sort'])) ? $arr['category_sort'] : 'category_sort';
            $this->category_level = (isset($arr['category_level'])) ? $arr['category_level'] : 'category_level';
            $this->category_display = (isset($arr['category_display'])) ? $arr['category_display'] : 'category_display';

        }

        public function getCategoryList(){

			$data = $this->db->get($this->table_name)->result_array();
			
			return $data;

		}

		public function getChildCategory($category_index){
			$data = $this->db->where(array($this->parent_index => $category_index))->get($this->table_name)->result_array();
			return $data;
		}

		public function getParentCategory($parent_index){
			$data = $this->db->where(array($this->category_index => $parent_index))->get($this->table_name)->row();
			return $data;
		}


		public function getSingleCategory($category_index){

            $data = $this->db->where(array($this->category_index => $category_index))->get($this->table_name)->row();

			return $data;

		}


		public function insertCategory($data){

		    $this->db->insert($this->table_name, $data);

		    return $this->db->affected_rows();

		}
        
		public function updateCategory($category_index,$data){

			$this->db->update($this->table_name,$data,array($this->category_index => $category_index));

		    return $this->db->affected_rows();

		}

		public function deleteCategory($category_index){
            
	        $this->db->delete($this->table_name, array($this->category_index => $category_index));

	        return $this->db->affected_rows();

		}
        

}
