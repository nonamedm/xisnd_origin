<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_article_model extends CI_Model {

  public function getSingleCategory($category_article_index){

      $sql = "SELECT * FROM category_article WHERE category_article_index = ".$category_article_index."";

      $data = $this->db->query($sql)->row();

      return $data;

    }

  public function getCategoryList()
  {

  	$data = $this->db->get('category_article')->result_array();
  	return $data;

  }
  
  
  
  public function list_cat($pid = 0)
{

  $data = $this->db->get('category_article')->result_array();
  return $this->_tree($data,$pid);

}

private function _tree($arr,$pid=0,$level = 0)
{
  
  static $tree = array();
  foreach ($arr as $v) {

    if($v['parent_index'] == $pid)
    {
      $v['level'] = $level;
      $tree[] = $v;
      $this->_tree($arr,$v['category_article_index'],$level + 1);
    }
        
  }
  return $tree;
}
  public function child($arr,$pid = 0){
    $child = array();
    foreach ($arr as $k => $v) {
      if ($v['parent_index'] == $pid){
        $child[] = $v;
      }                                           
    }
    return $child;
  }

//update
    public function getCategoryArticleIsCommon($category_article_index)
    {
      $data = $this->db->get_where("category_article",array('category_article_index'=>$category_article_index))->row_array();
      return $data;
    }
 





}