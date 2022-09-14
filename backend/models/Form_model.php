<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {

    public function getFormCategoryList()
    {
        return $this->db->get('form_category')->result_array();
    }

    public function getFormCategoryDetail( $form_cg_index )
    {
        $this->db->where('form_cg_index', $form_cg_index );
        
        return $this->db->get('form_category')->row();
    }

    public function createFormCategory( $create_array )
    {
        return $this->db->insert( 'form_category', $create_array );
    }

    public function modifyFormCategory( $modify_array, $form_cg_index )
    {
        $this->db->where( 'form_cg_index', $form_cg_index );
        return $this->db->update('form_category', $modify_array );
    }

    public function removeFormCategory( $form_cg_index )
    {
        return $this->db->delete('form_category', array( 'form_cg_index'=>$form_cg_index ));
    }

	public function getFormCategory()
    {
        $sql = "SELECT * FROM form_category";

        return $this->db->query( $sql )->result_array();
    }

    public function getFormList( $search_array = false )
    {
        $search_str = '';

        if( $search_array )
        {
            $search_str .= ' WHERE '. implode( ' AND ', $search_array );
        }

        $sql = "SELECT * FROM form ".$search_str." ORDER BY form.create_date DESC";

        return $this->db->query( $sql )->result_array();
    }
    
    public function getFormDetail( $form_index )
    {
        $this->db->where('form_index', $form_index );
        return $this->db->get('form')->row();
    }

    public function removeform( $form_index )
    {
        return $this->db->delete( 'form', array( 'form_index' => $form_index) );
    }

  
    //邮件
    public function getEmail( $email_cg_index = false )
    {
        $search = '';

        if( $email_cg_index != false )
        {
            $search = 'WHERE email.email_cg_index = '.$email_cg_index;
        }

        $sql = "SELECT * FROM email 
                    LEFT JOIN email_category ON email.email_cg_index = email_category.email_cg_index
                    ".$search;
                    
        return $this->db->query( $sql )->result_array();
    }

    public function getEmailCategory()
    {
        return $this->db->get('email_category')->result_array();
    }

    //邮件处理

    public function processEmail( $data )
    {
        //var_dump( $data['email_name'][0]);exit;

        $this->db->trans_start();

        $this->db->delete('email',array('email_cg_index' => $data['email_cg_index']));

        $i = 0;
        foreach ( $data['email'] as $item )
        {
            if( !empty( $data['email'] ) )
            {
                $array = array
                (
                    'email_cg_index'    => $data['email_cg_index'],
                    'email_name'        => $data['email_name'][$i],
                    'email_url' => $item
                );

                $this->db->insert( 'email', $array );
            }

            $i++;

        }

        $this->db->trans_complete();

        return $this->db->trans_status();

    }
}