<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

	public function getUserList(){

		$data = $this->db->get('user')->result_array();

		return $data;

	}

	public function getUserInfo($user_index){

		$data = $this->db->get_where('user',array('user_index'=>$user_index))->row();
        
		return $data;

	}

    public function insertUser($data){

		$this->db->insert('user', $data);

		return $this->db->affected_rows();

	}

	public function updateUser($user_index,$data){

		$this->db->update('user',$data,array('user_index'=>$user_index));

		return $this->db->affected_rows();

	}

	public function deleteUser($user_index){

	    $this->db->delete('user', array('user_index' => $user_index));

	    return $this->db->affected_rows();
	}

	public function checkUserId($user_id){

        $data = $this->db->get_where('user',array('user_id'=>$user_id))->row();

		return $data;

	}
    
	
}