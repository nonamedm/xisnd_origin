<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process_model extends CI_Model {
  //start new functions
    public function getAjaxList($gjz = FALSE,$start_limit,$ts)
    {
        $condition = "";
        $condition1 = "limit $start_limit,$ts";
        if($gjz != ""){
        $condition = "WHERE as_title LIKE '%".$gjz."%'";
        }

        $sql = "SELECT * from as_form ".$condition."
            ORDER BY as_form.as_created_time DESC ".$condition1."";

        $data = $this->db->query($sql)->result_array();
        return $data;
    }

    public function getAjaxNum($gjz = FALSE)
    {
        $condition = "";
        if($gjz != ""){
        $condition = "WHERE as_title LIKE '%".$gjz."%'";
        }
        $sql = "SELECT * from as_form ".$condition."
            ORDER BY as_form.as_created_time DESC";
        $data = $this->db->query($sql)->result_array();
        $count = count($data);
        return $count;
    }

    public function getTotlePage($gjz = FALSE)
    {
        $condition = "";
        if($gjz != ""){
            $condition = "WHERE as_title LIKE '%".$gjz."%'";
        }
        $sql = "SELECT * from as_form ".$condition."
                ORDER BY as_form.as_created_time DESC";
        $data = $this->db->query($sql)->result_array();
        $count = count($data);
        return $count;
    }

    public function getSingleAs($as_index)
    {
        $data = $this->db->get_where('as_form',array('as_index'=>$as_index))->row_array();
        return $data;
    }
    
    public function getPreArticle($as_index)
    {
        $data = $this->db->query("select * from as_form where as_index < $as_index order by as_created_time desc limit 0, 1")->row_array();
        return $data;
    }

    public function getNextArticle($as_index)
    {
        $data = $this->db->query("select * from as_form where as_index > $as_index order by as_created_time desc limit 0, 1")->row_array();
        return $data;
    }

    public function getEmail( $email_cg_index = false )
    {
        $search = '';

        if( $email_cg_index != false )
        {
            $search = "WHERE email.email_cg_index = ".$email_cg_index;
        }

        $sql = "SELECT * FROM email LEFT JOIN email_category ON email.email_cg_index = email_category.email_cg_index
               ".$search;

        return $this->db->query( $sql )->result_array();
    }

}