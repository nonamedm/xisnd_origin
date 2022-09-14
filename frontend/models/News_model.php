<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function getNewsCategoryList()
    {
        return $this->db->get( 'category_news' )->result_array();
    }
}

