<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {
	

    public function getArticleList($category_index = FALSE , $search = false)
    {

         //$search 是一个数组，每条包含，搜索的key 和 值

        $search_str = '';

        if( !empty( $search ) )
        {
            $search_str = implode(" AND " , $search);
        }

        $condition = "";

        if($category_index)
        {
			if( is_array( $category_index ))
			{
				$category_str = implode(" OR " , $category_index);

				$condition	= "WHERE (".$category_str.")". ($search_str != '' ? ' AND '.$search_str : '');
			}
			else
			{
				$condition = "WHERE article.category_index = ".$category_index. ($search_str != '' ? ' AND '.$search_str : '');
			}
            
        }
        else
        {
            $condition = $search_str != '' ? ' WHERE '.$search_str : '';
        }


        $sql = "SELECT * from article 
                LEFT JOIN category ON article.category_index = category.category_index
                LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
                ".$condition."
                ORDER BY article.article_is_top DESC, article.article_sort ASC, article.article_created_time DESC";

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

		public function isReply($article_index){

			$sql = "SELECT COUNT(*) as count FROM article_reply WHERE article_index =".$article_index;

            $data = $this->db->query($sql)->row();

            return $data;

		}

		public function insertArticle($data){

		    $this->db->insert('article', $data);

		    return $this->db->insert_id();

		}

		public function insertArticleImage($data){

			$this->db->insert('article_image',$data);

			return $this->db->affected_rows();

		}
        
		public function updateArticle( $data, $article_index){

		    $this->db->where( 'article_index', $article_index );

			return $this->db->update( 'article', $data );

			echo $this->db->last_query();exit;
		}

		public function updateArticleImage(){

			$this->db->update('article_image',$data,array('article_index' => $article_index));

		    return $this->db->affected_rows();
		}

		public function deleteArticle($article_index){
            
	        return $this->db->delete('article', array('article_index' => $article_index));

		}

		public function deleteArticleImage($article_index){

			return $this->db->delete('article_image', array('article_index' => $article_index));
			
		}

		public function deleteSingleImage($article_image_index){

	        $this->db->delete('article_image', array('article_image_index' => $article_image_index));

	        return $this->db->affected_rows();

		}

		public function getReplyList($article_index = FALSE){
			
			$condition = "";

			if($article_index):
				$condition = "WHERE article.article_index = ".$article_index;
			endif;

            $sql = "SELECT * FROM article_reply
			        LEFT JOIN article ON article_reply.article_index = article.article_index
					".$condition."";

			$data = $this->db->query($sql)->result_array();
			
			return $data;

		}

		public function getSingleReply($article_reply_index){

            $sql = "SELECT * FROM article_reply
			        LEFT JOIN article ON article_reply.article_index = article.article_index
			        WHERE article_reply.article_reply_index = ".$article_reply_index."";

			$data = $this->db->query($sql)->row();
			
			return $data;

		}

		public function insertReply($data){

			$this->db->insert('article_reply',$data);

			return $this->db->affected_rows();

		}

		public function updateReply($data,$article_reply_index){

			$this->db->update('article_reply',$data,array('article_reply_index' => $article_reply_index));

		    return $this->db->affected_rows();

		}

		public function deleteReply($article_reply_index){
            
	        $this->db->delete('article_reply', array('article_reply_index' => $article_reply_index));

	        return $this->db->affected_rows();

		}


}
