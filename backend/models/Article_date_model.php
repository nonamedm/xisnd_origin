<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_date_model extends CI_Model {

	public function getArticleDateQuantity($category_index,$search_key = FALSE, $keyword = FALSE)
	{
		$condition = "";
      	if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))){
      		if($category_index){
          		$condition = "AND ".$search_key." LIKE '%".$keyword."%'";
          	}else{
          		$condition = "Where ".$search_key." LIKE '%".$keyword."%'";
          	}
      	}
      	if($category_index){
      		$sql = "SELECT * from article_date Where category_date_index = $category_index ".$condition."
          ORDER BY article_date.create_time DESC";
      	}else{
      		$sql = "SELECT * from article_date ".$condition."
          ORDER BY article_date.create_time DESC";
      	}

      	$data = $this->db->query($sql)->result_array();
      	return count($data);
	}
	public function getArticleDateList($category_index,$offset = 0, $limit = 15, $search_key = FALSE, $keyword = FALSE)
	{
		$condition = "";
      	if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))){
      		if($category_index){
          		$condition = "AND ".$search_key." LIKE '%".$keyword."%'";
          	}else{
          		$condition = "Where ".$search_key." LIKE '%".$keyword."%'";
          	}
      	}
      	if($offset == "" || empty($offset)):
        	$offset = 0;
      	endif;
      	if($category_index){
      		$sql = "SELECT * from article_date Where category_date_index = $category_index ".$condition."
          ORDER BY article_date.article_date_title DESC, article_date.article_date_month DESC, article_date.article_date_sort ASC, article_date.create_time DESC LIMIT ".$offset.",".$limit;
      	}else{
      		$sql = "SELECT * from article_date ".$condition."
          ORDER BY article_date.article_date_title DESC, article_date.article_date_month DESC, article_date.article_date_sort ASC, article_date.create_time DESC LIMIT ".$offset.",".$limit;
      	}

      	$data = $this->db->query($sql)->result_array();
      	return $data;
	}
	public function insert_article_date($data)
	{
		$this->db->insert('article_date',$data);
	}
	public function getSingleArticleDate($article_date_index)
	{
		$data = $this->db->get_where('article_date',array('article_date_index'=>$article_date_index))->row_array();
		return $data;
	}
	public function update_article_date($data,$article_date_index)
	{
		$this->db->update('article_date',$data,array('article_date_index'=>$article_date_index));
	}
	public function delete_article_date($article_date_index)
	{
		$this->db->delete('article_date',array('article_date_index'=>$article_date_index));
	}
	public function getCateDateList()
	{
		$data = $this->db->get('category_date')->result_array();
		return $data;
	}
	
		
}