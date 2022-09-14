<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends Basic_model{

    // Get
    public function getList($search, $is_return_count_all=false) {
        $sql_where = "";
        $sql_order = "";
        $sql_limit = "";
        $sql_where = $this->getWhere($search, $sql_where);
        if($is_return_count_all == false)
            $sql_order = $this->getOrder($search);
        if(isset($search['offset']) && !empty($search['limit']) && $is_return_count_all == false) {
            $sql_limit = " LIMIT ".(int)$search['offset'].", ".(int)$search['limit'];
        }
        $sql = "SELECT *, user.user_index
                FROM user 
                LEFT JOIN user_info ON user_info.user_index = user.user_index 
                LEFT JOIN user_taxonomy ON user_taxonomy.user_index = user.user_index
                LEFT JOIN user_taxonomy AS user_taxonomy_regional ON user_taxonomy_regional.user_index = user.user_index  
                LEFT JOIN taxonomy ON taxonomy.taxonomy_index = user_taxonomy.taxonomy_index 
                LEFT JOIN taxonomy AS taxonomy_regional ON taxonomy_regional.taxonomy_index = user_taxonomy_regional.taxonomy_index "
            .$sql_where
            ." GROUP BY user.user_index "
            .$sql_order
            .$sql_limit;
        //return $sql;
        if ($is_return_count_all == true) {
            return $this->db->query($sql)->num_rows();
        } else {
            return $this->db->query($sql)->result_array();
        }
        
    }
    public function getTotalCount() {
        return $this->db->count_all('user');
    }
    public function getOne($index) {
        $sql = "SELECT *, user.user_index, user_info.create_time
                FROM user
                LEFT JOIN user_info ON user_info.user_index = user.user_index 
                WHERE user.user_index=".$index;
        $data = $this->db->query($sql)->row_array();
        return $data;
    }
    public function getUserTaxonomy($user_index) {
        $sql = "SELECT *
                FROM user_taxonomy
                LEFT JOIN taxonomy ON taxonomy.taxonomy_index = user_taxonomy.taxonomy_index
                WHERE user_taxonomy.user_index=".$user_index;
        $data = $this->db->query($sql)->result_array();
        return $data;
    }
    public function getUserPrice($user_index) {
        $sql = "SELECT *
                FROM user_price
                WHERE user_price.user_index=".$user_index;
        $data = $this->db->query($sql)->result_array();
        return $data;
    }
    public function getUserWorkExperience($user_index) {
        $sql = "SELECT *
                FROM user_work_experience
                WHERE user_work_experience.user_index=".$user_index;
        $data = $this->db->query($sql)->result_array();
        return $data;
    }
    public function getUserHistory($user_index) {
        $sql = "SELECT *
                FROM user_history
                WHERE user_history.user_index=".$user_index;
        $data = $this->db->query($sql)->result_array();
        return $data;
    }
    // Add
    public function addOneUser($data) {
        $this->db->insert('user', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    public function addOneUserInfo($data) {
        $this->db->insert('user_info', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    public function addUserPrice($data) {
        $this->db->insert('user_price', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    public function addUserWorkExperience($data) {
        $this->db->insert('user_work_experience', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    public function addUserHisotry($data) {
        $this->db->insert('user_history', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    public function addUserTaxonomy($data) {
        $this->db->insert('user_taxonomy', $data);
        $result = $this->db->insert_id();
        return $result;
    }
    // Update
    public function updateOneUser($index, $data) {
        $this->db->update('user', $data, array('user_index'=>$index));
        return $this->db->affected_rows();
    }
    public function updateOneUserInfo($index, $data) {
        $this->db->update('user_info', $data, array('user_index'=>$index));
        return $this->db->affected_rows();
    }
    public function updateUserPrice($index, $data) {
        $this->db->update('user_price', $data, array('user_price_index'=>$index));
        return $this->db->affected_rows();
    }
    public function updateUserWorkExperience($index, $data) {
        $this->db->update('user_work_experience', $data, array('user_work_experience_index'=>$index));
        return $this->db->affected_rows();
    }
    public function updateUserHisotry($index, $data) {
        $this->db->update('user_history', $data, array('user_history_index'=>$index));
        return $this->db->affected_rows();
    }
    public function updateUserTaxonomy($index, $data) {
        $this->db->update('user_taxonomy', $data, array('user_taxonomy_index'=>$index));
        return $this->db->affected_rows();
    }
    // Delete
    public function deleteUser($index) {
        $this->db->delete('user', array('user_index'=>$index));
        return $this->db->affected_rows();
    }
    public function deleteUserInfo($index) {
        $this->db->delete('user_info', array('user_info_index'=>$index));
        return $this->db->affected_rows();
    }
    public function deleteUserTaxonomy($index) {
        $this->db->delete('user_taxonomy', array('user_taxonomy_index'=>$index));
        return $this->db->affected_rows();
    }
    public function deleteUserInfoByUserIndex($index) {
        $this->db->delete('user_info', array('user_index'=>$index));
        return $this->db->affected_rows();
    }
    public function deleteUserTaxonomyByUserIndex($index) {
        $this->db->delete('user_taxonomy', array('user_index'=>$index));
        return $this->db->affected_rows();
    }

    public function getMaxSort() {
        $sql = "SELECT taxonomy_sort
                FROM taxonomy
                WHERE taxonomy_sort=(SELECT MAX(taxonomy_sort) FROM taxonomy)
                ";
        $data = $this->db->query($sql)->row_array();
        return $data['taxonomy_sort'];
    }

	public function deleteUserByTransaction($user_index){

		//$status = '';

		//$user_index = 0;

        $this->db->trans_start();
        
		//delete relevent data on user info
		$this->db->delete('user', array('user_index'=>$user_index));
		$this->db->delete('user_info', array('user_index'=>$user_index));
		$this->db->delete('user_taxonomy', array('user_index'=>$user_index));

		$this->db->delete('user_history', array('user_index'=>$user_index));
		$this->db->delete('user_price', array('user_index'=>$user_index));
		$this->db->delete('user_work_experience', array('user_index'=>$user_index));
        
		//delete relevent data on user consult
		$consult_sql = 'DELETE consult,consult_reply,consult_taxonomy FROM consult 
		                LEFT JOIN consult_reply ON consult_reply.consult_index = consult.consult_index
						LEFT JOIN consult_taxonomy ON consult_taxonomy.consult_index = consult.consult_index
                        WHERE consult.user_index = '.$user_index.' ';
		$this->db->query($consult_sql);

        //delete relevent data on user cases
		$cases_sql   = 'DELETE cases,cases_category,cases_keyword,cases_reply FROM cases
		                LEFT JOIN cases_category ON cases_category.cases_index = cases.cases_index
						LEFT JOIN cases_keyword ON cases_keyword.cases_index = cases.cases_index
						LEFT JOIN cases_reply ON cases_reply.cases_index = cases.cases_index
                        WHERE cases.user_index = '.$user_index.' ';
		$this->db->query($cases_sql);
		$this->db->delete('favorite_cases', array('user_index'=>$user_index));

		//delete relevent data on user article
		$this->db->delete('article', array('user_index'=>$user_index));
		$this->db->delete('article_reply', array('user_index'=>$user_index));
		$this->db->delete('favorite_article', array('user_index'=>$user_index));
		
		//delete relevent data on user advertise
		$this->db->delete('advertise_taxonomy_apply', array('user_index'=>$user_index));
		$this->db->delete('advertise_taxonomy', array('user_index'=>$user_index));
        
        $this->db->trans_complete();
        
	    /*
        if ($this->db->trans_status() === FALSE):
			$status = 'langrisser';
		else:
			$status =  'surprise';
		endif;
	    */

		return $this->db->trans_status();

	}


}