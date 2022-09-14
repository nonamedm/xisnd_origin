<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
	

        public function getSetting(){

			$data = $this->db->get('setting')->row();
			
			return $data;

		}

		public function updateSetting($data){

			$this->db->update('setting',$data);

		    return $this->db->affected_rows();

		}

		public function getEmailList()
		{
			return $this->db->get('message_email')->result_array();
		}

		public function getFamilyList()
		{
			return $this->db->get('family_site')->result_array();
		}

		public function getFamilyDetail( $fs_index )
		{
			$this->db->where('fs_index', $fs_index);
			return $this->db->get('family_site')->row();
		}

		public function modifyFamily( $fs_index, $data )
		{
			$this->db->where('fs_index', $fs_index);
			return $this->db->update('family_site', $data);
		}

		public function createFamily( $data )
		{
			return $this->db->insert('family_site', $data);
		}


}
