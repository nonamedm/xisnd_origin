<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{
    
    public function getNewsCategoryList()
    {
        return $this->db->get( 'category_news' )->result_array();
    }

    public function getNewsCategoryDetail( $news_cg_index )
    {
        $this->db->where('news_cg_index', $news_cg_index );
        
        return $this->db->get('category_news')->row();
    }

    public function createNewsCategory( $create_array )
    {
        return $this->db->insert( 'category_news', $create_array );
    }

    public function modifyNewsCategory( $modify_array, $news_cg_index )
    {
        $this->db->where( 'news_cg_index', $news_cg_index );

        return $this->db->update('category_news', $modify_array );
    }

    public function removeNewsCategory( $news_cg_index )
    {
        return $this->db->delete('category_news', array( 'news_cg_index'=>$news_cg_index ));
    }
}