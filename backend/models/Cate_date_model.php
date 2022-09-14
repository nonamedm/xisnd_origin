<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate_date_model extends CI_Model {

	public function getCateDateQuantity($search_key = FALSE, $keyword = FALSE)
	{
		$condition = "";
      	if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))){
          $condition = "WHERE ".$search_key." LIKE '%".$keyword."%'";
      	}

      	$sql = "SELECT * from category_date ".$condition."
          ORDER BY category_date.category_date_index DESC";
      	$data = $this->db->query($sql)->result_array();
      	return count($data);
	}
	public function getCateDateList($offset = 0, $limit = 15, $search_key = FALSE, $keyword = FALSE)
	{
		$condition = "";
      	if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))){
          $condition = "WHERE ".$search_key." LIKE '%".$keyword."%'";
      	}
      	if($offset == "" || empty($offset)):
        	$offset = 0;
      	endif;

        $sql = "SELECT * from category_date ".$condition."
          ORDER BY category_date.category_date_index DESC
          LIMIT ".$offset.",".$limit;

      	$data = $this->db->query($sql)->result_array();
      	return $data;
	}
	public function insert_date($data)
	{
		$this->db->insert('category_date',$data);
	}
	public function getSingleCate($category_date_index)
	{
		$data = $this->db->get_where('category_date',array('category_date_index'=>$category_date_index))->row_array();
		return $data;
	}
	public function update_date($data,$category_date_index)
	{
		$this->db->update('category_date',$data,array('category_date_index'=>$category_date_index));
	}
	public function delete_cate($category_date_index)
	{
		$this->db->delete('category_date',array('category_date_index'=>$category_date_index));
	}
	
		
}