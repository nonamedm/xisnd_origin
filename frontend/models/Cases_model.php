<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases_model extends CI_Model {

  
  public function getCasesQuantity($category_index, $sort,$son_category_index,$keyword = FALSE, $total_keyword = FALSE)
  {
      $condition = "";
      $condition1 = "";
          
      if(!empty($keyword)):
        $condition .= " AND (cases_keyword.cases_keyword LIKE '%".$keyword."%' OR cases.cases_name LIKE '%".$keyword."%' OR user_info.user_name LIKE '%".$keyword."%')";
      endif;

	  if($total_keyword && $total_keyword !=''):
        $condition .= " AND (cases_keyword.cases_keyword LIKE '%".$total_keyword."%' OR cases.cases_name LIKE '%".$total_keyword."%'  OR user_info.user_name LIKE '%".$total_keyword."%') ";
	  endif;

      if($sort == 1){
        $condition1 = "create_time DESC";
      }else if($sort == 2){
        $condition1 = "cases_loves DESC";
      }else {
        $condition1 = "cases_hits DESC";
      }

      if(($category_index == "" || $category_index == 0) && ($son_category_index == "" || $son_category_index == 0)){
        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases 
                LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
                LEFT JOIN  category ON category.category_index = cases_category.category_index
                LEFT JOIN cases_keyword on cases.cases_index = cases_keyword.cases_index 
                LEFT JOIN  user_info ON cases.user_index = user_info.user_index 
                WHERE cases.cases_display = 1 ".$condition." 
          ORDER BY cases.".$condition1."";
          
      }else if(($category_index != "" || $category_index != 0) && ($son_category_index == "" || $son_category_index == 0)){

        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN  user_info ON cases.user_index = user_info.user_index
          WHERE cases.cases_display = 1 AND ( cases_category.category_index =".$category_index."  OR category.parent_index = ".$category_index." )".$condition." 
          ORDER BY cases.".$condition1."";

          //echo $sql;
      }else{
        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN  user_info ON cases.user_index = user_info.user_index
          WHERE cases_category.category_index =".$son_category_index." AND cases.cases_display = 1 ".$condition." 
          ORDER BY cases.".$condition1."";

      }
      
      $data = $this->db->query($sql)->result_array();

      return count($data);
  }
  public function getCasesList($category_index, $sort,$son_category_index,$offset = 0, $limit = 20, $keyword = FALSE, $total_keyword = FALSE){
            
      $condition = "";
      $condition1 = "";

       if($sort == 1){
        $condition1 = "create_time Desc";
      }else if($sort == 2){
        $condition1 = "cases_loves DESC";
      }else {
        $condition1 = "cases_hits DESC";
      }

      if($offset == "" || empty($offset)):
        $offset = 0;
      endif;
         
      if(!empty($keyword)):
        $condition .= " AND (cases_keyword.cases_keyword LIKE '%".$keyword."%' OR cases.cases_name LIKE '%".$keyword."%' OR user_info.user_name LIKE '%".$keyword."%')";
      endif;

	  if($total_keyword && $total_keyword !=''):
        $condition .= " AND (cases_keyword.cases_keyword LIKE '%".$total_keyword."%' OR cases.cases_name LIKE '%".$total_keyword."%'  OR user_info.user_name LIKE '%".$total_keyword."%') ";
	  endif;

      if(($category_index == "" || $category_index == 0) && ($son_category_index == "" || $son_category_index == 0)){
        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases 
                LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
                LEFT JOIN  category ON category.category_index = cases_category.category_index
                LEFT JOIN cases_keyword on cases.cases_index = cases_keyword.cases_index 
                LEFT JOIN  user_info ON cases.user_index = user_info.user_index 
                WHERE cases.cases_display = 1 ".$condition." 
          ORDER BY cases.".$condition1." LIMIT ".$offset.",".$limit;
          //echo $sql;

      }else if(($category_index != "" || $category_index != 0) && ($son_category_index == "" || $son_category_index == 0)){

        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN  user_info ON cases.user_index = user_info.user_index
          WHERE cases_category.category_index =".$category_index." OR category.parent_index = ".$category_index." AND cases.cases_display = 1 ".$condition." 
          ORDER BY cases.".$condition1." LIMIT ".$offset.",".$limit;

         // echo $sql;
      }else{
        $sql = "SELECT cases.cases_index,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN  user_info ON cases.user_index = user_info.user_index
          WHERE cases_category.category_index =".$son_category_index." AND cases.cases_display = 1 ".$condition." 
          ORDER BY cases.".$condition1." LIMIT ".$offset.",".$limit;

      }
      $data = $this->db->query($sql)->result_array();
      
      return $data;

    }

    public function getPreCases($cases_index,$category_index)
    {

      $data = $this->db->query("select * from cases where cases_index < $cases_index and category_index = $category_index order by create_time desc limit 0, 1")->row_array(); 
	  return $data;

    }

    public function getNextCases($cases_index,$category_index)
    {

      $data = $this->db->query("select * from cases where cases_index > $cases_index and category_index = $category_index order by create_time desc limit 0, 1")->row_array();
    return $data;

    }

    public function getSingleCase($cases_index)
    {
      $data = $this->db->query("SELECT cases.cases_index,cases.cases_hits,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases.user_index,user_info.user_profile_image,cases_category.category_index ,category.parent_index from cases
	  		  LEFT JOIN user_info ON cases.user_index = user_info.user_index
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
			  LEFT JOIN  cases_reply ON cases.cases_index = cases_reply.cases_index
              WHERE cases.cases_index = ".$cases_index."")->row_array();
			 
      return $data;

    }

    public function getSIngleParentIndex($category_index)
    {

      $data = $this->db->get_where('category',array('category_index'=>$category_index))->row_array();
      return $data;

    }

    public function getRelatedCases($category_index,$cases_index)
    {

      $data = $this->db->query(" SELECT cases.cases_index,cases.cases_hits,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN category ON category.category_index = cases_category.category_index
              LEFT JOIN cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN user_info ON cases.user_index = user_info.user_index  where category.category_index = $category_index and cases.cases_index != $cases_index order by create_time desc limit 0,6 ")->result_array();
      return $data;

    }

    public function getCasesReply($cases_index)
    {
      $data  = $this->db->query("select *,cases_reply.user_index from cases_reply 
	  left join user on cases_reply.user_index = user.user_index 
	  left join user_info on user.user_index = user_info.user_index
	  where cases_reply.cases_index = $cases_index")->result_array();
      return $data;
    }
    public function getCountCasesReply($cases_index)
    {
      $data = $this->db->get_where('cases_reply',array('cases_index'=>$cases_index))->result_array();
      $count = count($data);
      return $count;
    }
    public function updateCasesHits($data,$cases_index)
    {
      $this->db->update('cases',$data,array('cases_index'=>$cases_index ));
    }
    public function getUserType($user_index)
    {
      $data = $this->db->get_where('user',array('user_index'=>$user_index))->row_array();
      return $data;
    }
    public function insert_reply($data)
    {
      $this->db->insert('cases_reply',$data);
    }
    public function delete_reply($cases_reply_index)
    {
      $this->db->delete('cases_reply',array('cases_reply_index'=>$cases_reply_index));
    }
    public function update_reply($data,$cases_reply_index)
    {
      $this->db->update('cases_reply',$data,array('cases_reply_index'=>$cases_reply_index));
    }
    public function insert_favourite($favourite_data)
    {
      $this->db->insert('favorite_cases',$favourite_data);
    }
     public function getSingleFavouriteCases($cases_index,$user_index)
    {
      $data = $this->db->query("select * from favorite_cases where cases_index = $cases_index and user_index= $user_index")->row_array();    
      return $data;
     }
     public function check_child($category_index)
     {
      $data = $this->db->get_where('category',array('parent_index'=>$category_index))->result_array();
      return $data;
     }
     public function insertCases($data_case)
     {
      $data = $this->db->insert('cases',$data_case);
      return $this->db->insert_id(); 
     }
     public function insertCate($data_cate)
     {
      $data = $this->db->insert('cases_category',$data_cate);
      return $this->db->insert_id(); 
     }
     public function insertCasesKeyword($data_keyword)
     {
      $data = $this->db->insert('cases_keyword',$data_keyword);
      return $this->db->insert_id(); 
     }
     public function getUserCasesList($user_index)
     {
      $data = $this->db->query("SELECT cases.cases_index,cases.cases_hits,cases.cases_name,cases.cases_thumbnail,cases.create_time,cases.cases_content,cases_keyword.cases_keyword,user_info.user_name,cases_category.category_index from cases
              LEFT JOIN  cases_category ON cases.cases_index = cases_category.cases_index
              LEFT JOIN  category ON category.category_index = cases_category.category_index
              LEFT JOIN  cases_keyword ON cases.cases_index = cases_keyword.cases_index
              LEFT JOIN  user_info ON cases.user_index = user_info.user_index WHERE cases.user_index = ".$user_index." order by create_time desc limit 0,5")->result_array();
      return $data;
     }
     public function updateCases($data_case,$cases_index)
     {
      $this->db->update('cases',$data_case,array('cases_index'=>$cases_index));
     }
     public function updateCasesKeyword($data_keyword,$cases_index)
     {
      $this->db->update('cases_keyword',$data_keyword,array('cases_index'=>$cases_index));
     }
     public function delete_cases($cases_index)
     {
      $this->db->delete('cases',array('cases_index'=>$cases_index));  
     }
     public function delete_cases_reply($cases_index)
     {
      $this->db->delete('cases_reply',array('cases_index'=>$cases_index));
     }
     public function delete_cases_favourite($cases_index)
     {
      $this->db->delete('favorite_cases',array('cases_index'=>$cases_index));    
     }
	 public function getDetailFcases($user_index,$cases_index)
   {
	   if($user_index == ""){
		   $data = $this->db->query("select * from favorite_cases where cases_index = $cases_index")->result_array();
	   }else{
		   $data = $this->db->query("select * from favorite_cases where user_index = $user_index and cases_index = $cases_index")->result_array();
	   }
	   
	   return $data;
   }
   


}