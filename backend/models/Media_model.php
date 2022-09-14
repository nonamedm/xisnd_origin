<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_model extends CI_Model {

	public function getMediaCategory()
    {
        $sql = "SELECT * FROM media_category";

        return $this->db->query( $sql )->result_array();
    }

    //处理 media_category_brand 表
    public function processMediaBrandCg( $data, $brand_index)
    {
        //brand_index 是 category_index
        $this->db->trans_start();

        $this->db->delete('media_category_brand', array( 'brand_index' => $brand_index ));

        foreach ( $data as $item )
        {
            $array = array
            (
                'media_cg_index' => $item,
                'brand_index'    => $brand_index
            );
            $this->db->insert('media_category_brand', $array);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();

    }

    public function getMediaCategoryInfo( $brand_index )
    {
        //brand_index 是 category_index

        return $this->db->get_where('media_category_brand',array('brand_index' => $brand_index))->result_array();
    }

    public function getTagCategory()
    {
        return $this->db->get_where('tag_category',array('tag_cg_display' => 1))->result_array();
    }

}