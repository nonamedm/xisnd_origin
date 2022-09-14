<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pop_model extends CI_Model {

	public function delete_pop($pop_index)
	{
		$this->db->delete('pop',array('pop_index'=>$pop_index));
	}

	public function getPopList($offset, $limit)
	{
		if($offset == ""):
			$offset = 0;
		endif;
		$data = $this->db->query("select * from pop order by pop_option desc,pop_created_time desc limit $offset,$limit")->result_array();
		return $data;
	}
	public function count()
	{
		$data = $this->db->get('pop')->result_array();
		$count = count($data);
  		return $count;
	}

	public function check_pop($pop_index)
	{
		$data = $this->db->get_where('pop',array('pop_index'=>$pop_index))->row_array();
		return $data;
	}

}