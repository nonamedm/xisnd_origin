<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function getCategoryList()
    {

        $sql = "SELECT * FROM category 
                LEFT JOIN category_template ON category.category_template_index = category_template.category_template_index
                ORDER BY category.category_sort ASC, category.category_index ASC";

        $data = $this->db->query($sql)->result_array();

        return $data;

    }

    public function getChildCategory($category_index){

        $sql = "SELECT * FROM category 
                LEFT JOIN category_template ON category.category_template_index = category_template.category_template_index 
                WHERE category.parent_index = ".$category_index."
                ORDER BY category.category_sort ASC";

        $data = $this->db->query($sql)->result_array();

        return $data;
    }

    public function getParentCategory($parent_index){

        $sql = "SELECT * FROM category 
                LEFT JOIN category_template ON category.category_template_index = category_template.category_template_index 
                WHERE category.category_index = ".$parent_index."
                ORDER BY category.category_sort ASC";

        $data = $this->db->query($sql)->row();

        return $data;
    }


    public function getSingleCategory($category_index){

        $sql = "SELECT * FROM category 
                LEFT JOIN category_template ON category.category_template_index = category_template.category_template_index 
                WHERE category.category_index = ".$category_index;

        $data = $this->db->query($sql)->row();

        return $data;

    }


    public function insertCategory($data){

        $this->db->insert('category', $data);

        return $this->db->insert_id();

    }

    public function updateCategory($category_index,$data){

        $this->db->update('category',$data,array('category_index' => $category_index));

        return $this->db->affected_rows();

    }

    public function deleteCategory($category_index){

        $this->db->delete('category', array('category_index' => $category_index));

        return $this->db->affected_rows();

    }

    public function getCategorytemplate(){

        $data = $this->db->get('category_template')->result_array();

        return $data;
    }

    public function getSingleCategoryTemplate($category_template_index){

        $data = $this->db->where(array('category_template_index' => $category_template_index))->get('category_template')->row();

        return $data;

    }

    public function insertCategoryTemplate($data){

        $this->db->insert('category_template', $data);

        return $this->db->affected_rows();

    }

    public function updateCategoryTemplate($category_template_index,$data){

        $this->db->update('category_template',$data,array('category_template_index' => $category_template_index));

        return $this->db->affected_rows();

    }

    public function deleteCategoryTemplate($category_template_index){

        $this->db->delete('category_template', array('category_template_index' => $category_template_index));

        return $this->db->affected_rows();

    }

    public function getTagCategory()
    {
        return $this->db->get_where('tag_category',array('tag_cg_display' => 1))->result_array();
    }
        

}
