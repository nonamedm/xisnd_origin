<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    //产品分类
    public function getProductCategoryList( $type = '', $product_cg_patent = 0 )
    {
        $where = '';

        switch ( $type )
        {
            case 'top':
                $where = 'WHERE product_cg_parent = 0';
                break;
            case 'son':
                $where = 'WHERE product_cg_parent = '.$product_cg_patent;
                break;
        }

        $sql = "SELECT * FROM product_category ".$where;

        return $this->db->query( $sql )->result_array();
    }

    public function productCategoryCreate( $post_array )
    {
        return $this->db->insert( 'product_category', $post_array );
    }

    public function productCategoryModify($post_array, $product_cg_index )
    {
        $this->db->where( 'product_cg_index', $product_cg_index);

        return $this->db->update('product_category', $post_array);
    }

    public function getProductCategoryInfo( $product_cg_index )
    {
        $sql = "SELECT * FROM product_category WHERE product_cg_index = ".$product_cg_index;

        return $this->db->query( $sql )->row();
    }

    //产品
    public function createProduct( $product_array, $product_if_array, $product_related_array = false ){

        $this->db->trans_start();

        $this->db->insert('product', $product_array);

        $product_if_array['product_index'] = $this->db->insert_id();

        $this->db->insert('product_info', $product_if_array);

        if( $product_related_array != false )
        {

            foreach ( $product_related_array as $item )
            {
                $array = array(
                    'product_index' => $product_if_array['product_index'],
                    'related_product_index' => $item,
                    'related_display' => 1
                );

                $this->db->insert('product_related', $array);
            }
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function modifyProduct( $product_index, $product_array, $product_if_array, $product_related_array = false  )
    {
        $this->db->trans_start();

        $this->db->where('product_index', $product_index);

        $this->db->update('product', $product_array);

        $this->db->where('product_index', $product_index);

        $this->db->update('product_info', $product_if_array);

        if( $product_related_array != false )
        {
            $this->db->delete( 'product_related', array( 'product_index' => $product_index) );

            foreach ( $product_related_array as $item )
            {
                $array = array(
                    'product_index' => $product_index,
                    'related_product_index' => $item,
                    'related_display' => 1
                );

                $this->db->insert('product_related', $array);
            }

        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function getProductList( $type = 'all', $cg_index = false , $search_product_name = false )
    {
        $sql = '';

        $where_like = !empty( $search_product_name ) ? "WHERE product_info.product_if_name like '%".$search_product_name."%'" : '';
        $and_like = !empty( $search_product_name ) ? "AND product_info.product_if_name like '%".$search_product_name."%'" : '';


        switch ($type)
        {
            case 'all':

                $sql = "SELECT * FROM product 
                LEFT JOIN product_info ON product.product_index = product_info.product_index 
                LEFT JOIN category ON product.product_cg_index = category.category_index
                ".$where_like."
                ORDER BY product.product_create_date DESC
                ";

                break;
            case 'category':
                $sql = "SELECT * FROM product 
                LEFT JOIN product_info ON product.product_index = product_info.product_index 
                LEFT JOIN category ON product.product_cg_index = category.category_index
                WHERE product.product_cg_index = ".$cg_index."
                ".$and_like."
                 ORDER BY product.product_create_date DESC
                 ";
                break;
        }

        return $this->db->query( $sql )->result_array();
    }

    public function getProduct( $product_index )
    {
        $sql = "SELECT * FROM product 
                LEFT JOIN product_info ON product.product_index = product_info.product_index 
                LEFT JOIN category ON product.product_cg_index = category.category_index
                WHERE product.product_index = ".$product_index;

        return $this->db->query( $sql )->row();
    }

    public function removeProduct( $product_index )
    {

        $this->db->trans_start();

        $this->db->delete( 'product', array( 'product_index' => $product_index) );

        $this->db->delete( 'product_info', array( 'product_index' => $product_index) );

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function getRelatedList( $product_index )
    {
        $sql = "SELECT product_related.*, product_info.product_if_name FROM product_related 
                LEFT JOIN product_info ON product_related.related_product_index = product_info.product_index
                WHERE product_related.product_index = ".$product_index;

        return $this->db->query($sql)->result_array();
    }

}