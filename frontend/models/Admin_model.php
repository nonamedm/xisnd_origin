<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function getAdminList(){
		$data = $this->db->where('admin_grade >=0')->order_by('admin_index', 'asc')->get('admin')->result_array();
		return $data;
	}

	public function count(){
		$data = $this->db->where('admin_grade >=0')->order_by('admin_index', 'asc')->get('admin')->result_array();
		$count = count($data);
		return $count;
	}

	public function getAdminById($admin_index)
	{
		$data = $this->db->get_where('admin',array('admin_index'=>$admin_index))->row_array();
		return $data;
	}

	public function updateAdmin($admin_index,$data){

		$this->db->update('admin',$data,array('admin_index'=>$admin_index));

		return $this->db->affected_rows();

	}

	public function countAdminId($admin_id)
	{
		$data = $this->db->get_where('admin',array('admin_id'=>$admin_id))->result_array();
		$count = count($data);
		return $count;
	}

	public function checkAdminId($admin_id){

        $data = $this->db->get_where('admin',array('admin_id'=>$admin_id))->row();

		return $data;

	}
    
	
}