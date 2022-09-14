<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recruitment_model extends CI_Model
{
    public function getCategoryList()
    {
        return $this->db->get( 'category_recruitment' )->result_array();
    }
}

