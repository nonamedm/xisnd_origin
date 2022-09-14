<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_model extends CI_Model {
	

	public function getAreaCategory(){
		
		$data = $this->db->get('user_area_category')->result_array();

		return $data;

	}

	public function getTaxonomy($arr = array()){

		$condition = ' ';

		if(isset($arr['user_area_category_index'])):
			$condition .= " WHERE user_area.user_area_category_index = ".$arr['user_area_category_index']." ";
		endif;

		$sql = "SELECT *,user_area.user_area_index from user_area
		 ".$condition." 
		ORDER BY user_area.area_sort ASC,user_area.user_area_index ASC
		";

		$data = $this->db->query($sql)->result_array();

		return $data;
	}


}
