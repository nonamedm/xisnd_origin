<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board_model extends CI_Model {
	

        public function getArticleList($category_index = FALSE){

			$condition = "";

			if($category_index):
				$condition = "WHERE article.category_index = ".$category_index;
			endif;

            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					".$condition."";

			$data = $this->db->query($sql)->result_array();
			
			return $data;

		}


		public function getSingleArticle($article_index){

            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index 
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
			        WHERE article.article_index = ".$article_index."";

			$data = $this->db->query($sql)->row();
			
			return $data;

		}

		public function getCategoryArticle($category_index){

            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index 
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					WHERE article.category_index = ".$category_index."";

			$data = $this->db->query($sql)->result_array();
			
			return $data;
		}

        public function getArticleImage($article_index){

            $sql = "SELECT * from article LEFT JOIN article_image ON article.article_index = article_image.article_index WHERE article_image.article_index = ".$article_index."";

			$data = $this->db->query($sql)->result_array();
			
			return $data;

		}

		public function insertArticle($data){

		    $this->db->insert('Article', $data);

		    return $this->db->insert_id();

		}

		public function insertArticleImage($data){

			$this->db->insert('article_image',$data);

			return $this->db->affected_rows();

		}
        
		public function updateArticle($data,$article_index){

			$this->db->update('article',$data,array('article_index' => $article_index));

		    return $this->db->affected_rows();

		}

		public function updateArticleImage(){

			$this->db->update('article_image',$data,array('article_index' => $article_index));

		    return $this->db->affected_rows();
		}

		public function deleteArticle($article_index){
            
	        $this->db->delete('article', array('article_index' => $article_index));

	        return $this->db->affected_rows();

		}

		public function deleteArticleImage($article_index){

	        $this->db->delete('article_image', array('article_index' => $article_index));

	        return $this->db->affected_rows();
		}

		public function deleteSingleImage($article_image_index){

	        $this->db->delete('article_image', array('article_image_index' => $article_image_index));

	        return $this->db->affected_rows();

		}


}
