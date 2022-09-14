<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends CI_Model {
    public function getFamilyList()
    {
        return $this->db->get('family_site')->result_array();
    }
}