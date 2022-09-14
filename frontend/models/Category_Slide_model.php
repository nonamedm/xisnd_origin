<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Slide_model extends CI_Model {

  public function getCategorySlideList()
  {

  	$data = $this->db->get('category_slide')->result_array();
  	return $data;

  }
  public function delete_category_slide($category_slide_index)
  {
    $this->db->query("delete category_slide,slide from category_slide left join slide on category_slide.category_slide_index = slide.category_slide_index where category_slide.category_slide_index= ".$category_slide_index."");

  }
  public function check_category_slide($category_slide_index)
  {
    
  	$data = $this->db->get_where('category_slide',array('category_slide_index'=>$category_slide_index))->row_array();
  	return $data;

  }
  public function select_category_slide($category_slide_index)
  {
    
    $data = $this->db->get_where('category_slide',array('category_slide_index'=>$category_slide_index))->result_array();
    return $data;

  }
  public function count()
  {

  	$data = $this->db->get('category_slide')->result_array();
  	$count = count($data);
  	return $count;
  	
  }




}