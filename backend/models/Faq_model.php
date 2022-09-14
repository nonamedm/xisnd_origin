<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends CI_Model {

	public function getFaqCategory()
    {
        $sql = "SELECT * FROM faq_category";

        return $this->db->query( $sql )->result_array();
    }
}