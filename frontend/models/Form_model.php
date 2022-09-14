<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model 
{

    public function getFormCgIndex( $sub_cg_index )
    {
        $this->db->where( 'category_index', $sub_cg_index );
        return $this->db->get('form_category')->row()->form_cg_index;
    }

    public function createForm( $data_array )
    {
        return $this->db->insert('form', $data_array);
    }

    public function getFormList( $type, $offset = 0, $limit = 10 )
    {
        switch ( $type )
        {
            case 'count':

                $sql = "SELECT count(*) as number FROM form ";

                return $this->db->query( $sql )->row()->number;
                
            break;

            case 'page':

                $sql = "SELECT * FROM form
                    LEFT JOIN form_category ON form_category.form_cg_index = form.form_cg_index
                    ORDER BY form.create_date DESC LIMIT ".$offset.",".$limit;
                return $this->db->query( $sql )->result_array();

            break;


        }
    }
}