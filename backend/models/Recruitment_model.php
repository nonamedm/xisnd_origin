<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitment_model extends CI_Model
{
    
    private $table_name = 'category_recruitment';

    private $index_name = 'rec_cg_index';
    
    public function getCategoryList()
    {
        return $this->db->get( $this->table_name )->result_array();
    }

    public function getCategoryDetail( $cg_index )
    {
        $this->db->where( $this->index_name, $cg_index );
        
        return $this->db->get( $this->table_name )->row();
    }

    public function createCategory( $create_array )
    {
        return $this->db->insert( $this->table_name, $create_array );
    }

    public function modifyCategory( $modify_array, $cg_index )
    {
        $this->db->where( $this->index_name, $cg_index );

        return $this->db->update( $this->table_name, $modify_array );
    }

    public function removeCategory( $cg_index )
    {
        return $this->db->delete( $this->table_name, array( $this->index_name=>$cg_index ));
    }
}