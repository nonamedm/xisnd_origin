<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

//form1_list_DB
    /*public function getEmailList($category_index = FALSE){

        $condition = "";

        if($category_index):
            $condition = "WHERE guestbooks.category_index = ".$category_index;
        endif;
        $sql = "SELECT * from guestbooks 
			        LEFT JOIN category ON guestbooks.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					".$condition." ORDER BY guestbooks.create_time desc";
        $data = $this->db->query($sql)->result_array();

        return $data;

    }*/
//form2_list_DB
    /*public function getEmailListII($category_index = FALSE){

        $condition = "";

        if($category_index):
            $condition = "WHERE guestbooks_num1.category_index = ".$category_index;
        endif;
        $sql = "SELECT * from guestbooks_num1 
			        LEFT JOIN category ON guestbooks_num1.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					".$condition."
					ORDER BY guestbooks.create_time desc";
        $data = $this->db->query($sql)->result_array();

        return $data;

    }*/

    //详细一条数据的信息
    /*public function getSingleArticle($article_index){

        $sql = "SELECT * from guestbooks 
			        LEFT JOIN category ON guestbooks.category_index = category.category_index 
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
			        WHERE guestbooks.mes_index = ".$article_index."";

        $data = $this->db->query($sql)->row();

        return $data;

    }*/
    //guestbooks_num1 详细一条数据的信息
    /*public function getSingleArticle_num1($article_index){

        $sql = "SELECT * from guestbooks_num1 
			        LEFT JOIN category ON guestbooks_num1.category_index = category.category_index 
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
			        WHERE guestbooks_num1.mes_index = ".$article_index."";

        $data = $this->db->query($sql)->row();

        return $data;

    }*/
    //详细一条数据的信息
    public function getSingleEmail( $index ){

        $sql = "SELECT * from email WHERE email_index = ".$index." ";

        $data = $this->db->query($sql)->row();

        return $data;

    }

    public function deleteEmail($mes_index){

        $this->db->delete('guestbooks', array('mes_index' => $mes_index));

        return $this->db->affected_rows();

    }

    //
    public function deleteEmail_num1($mes_index){

        $this->db->delete('guestbooks_num1', array('mes_index' => $mes_index));

        return $this->db->affected_rows();

    }
    //
    public function updateArticleImage(){

        $this->db->update('article_image',$data,array('article_index' => $article_index));

        return $this->db->affected_rows();
    }



    public function updateEmailAddress($email_index,$data){

        $this->db->update('email',$data,array('email_index' => $email_index));

        return $this->db->affected_rows();

    }


}
