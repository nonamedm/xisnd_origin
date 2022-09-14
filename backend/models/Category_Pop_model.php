<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Pop_model extends CI_Model {

  public function getCategoryPopList()
  {

  	$data = $this->db->get('category_pop')->result_array();
  	return $data;

  }
  public function delete_category_pop($category_pop_index)
  {
    $this->db->query("delete category_pop,pop from category_pop left join pop on category_pop.category_pop_index = pop.category_pop_index where category_pop.category_pop_index= ".$category_pop_index."");

  }
  public function check_category_pop($category_pop_index)
  {
    
  	$data = $this->db->get_where('category_pop',array('category_pop_index'=>$category_pop_index))->row_array();
  	return $data;

  }
  public function select_category_pop($category_pop_index)
  {
    
    $data = $this->db->get_where('category_pop',array('category_pop_index'=>$category_pop_index))->result_array();
    return $data;

  }
  public function count()
  {

  	$data = $this->db->get('category_pop')->result_array();
  	$count = count($data);
  	return $count;
  	
  }




}