<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model 
{
    public function getHistoryCategory()
    {
        $sql = "SELECT * FROM category_date ORDER BY category_date_sort ASC";
        return $this->db->query( $sql )->result_array();
    }

    public function getHistList()
    {
        $sql = "SELECT * FROM article_date
                LEFT JOIN category_date ON category_date.category_date_index = article_date.category_date_index
                ORDER BY article_date.article_date_title DESC, article_date.article_date_month DESC, article_date.article_date_sort ASC, article_date.create_time DESC";
        return $this->db->query( $sql )->result_array();
        
    }
}