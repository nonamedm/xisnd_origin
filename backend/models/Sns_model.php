<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sns_model extends CI_Model {

	public function getSnsCategory()
    {
        $sql = "SELECT * FROM sns_category WHERE sns_cg_display = 1";

        return $this->db->query( $sql )->result_array();
    }
}