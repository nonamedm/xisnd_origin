<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model {
	
        public function getArticleListOne( $category_index, $search_array = false )
        {
            $condition = "";

            if( $search_array )
            {
                foreach ( $search_array as $index => $item )
                {
                    $condition.=  " AND article.".$index." LIKE '%".$item."%' ";
                }
            }

            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					WHERE article.category_index =".$category_index." AND article.article_display = 1
					".$condition." 
					ORDER BY article.article_is_top DESC,article.article_sort ASC,article.article_created_time DESC,article.article_index DESC";

            $data = $this->db->query($sql)->result_array();

            return $data;
        }
        public function getArticleList($category_index, $offset = 0, $limit = 20, $search_array = false, $join_image =FALSE,$join_reply = FALSE)
        {

            $sns_left       = '';

            $limit_str = '';

            if( $limit )
            {
                $offset = $offset ? $offset : 0;
                $limit_str = 'LIMIT '.$offset.','.$limit;
            }

            if( $this->uri->segment(2) == 'sns' || $this->uri->segment(2) == 'ajaxGetSnsList' )
            {
                $sns_left = 'LEFT JOIN sns_category ON sns_category.sns_cg_index = article.sns_cg_index';
            }

			$condition = "";

			if($offset == "" || empty($offset)):
				$offset = 0;
			endif;

			if($join_image):
				$join_image = "LEFT JOIN article_image ON article.article_index = article_image.article_index";
			endif;

			if($join_reply):
				$join_reply = "LEFT JOIN article_reply ON article.article_index = article_reply.article_index";
			endif;
          
			/*if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))):
				$condition = "AND ".$search_key." LIKE '%".$keyword."%'";
			endif;*/
            if( $search_array )
            {
                foreach ( $search_array as $index => $item )
                {
                    $condition.=  " AND article.".$index." LIKE '%".$item."%' ";
                }
			}


            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
				    ".$sns_left."".$join_image." ".$join_reply." 
					WHERE article.category_index =".$category_index." AND article.article_display = 1
					".$condition." 
					ORDER BY article.article_is_top DESC,article.article_sort ASC,article.article_created_time DESC,article.article_index DESC
					".$limit_str;

			$data = $this->db->query($sql)->result_array();
			
            return $data;
        
		}

		public function getArticleQuantity( $category_index, $search_array = false){

			$condition = "";
            if( $search_array )
            {
                foreach ( $search_array as $index => $item )
                {
                    $condition.=  " AND article.".$index." LIKE '%".$item."%' ";
                }
            }


			/*if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))):
				$condition = "AND ".$search_key." LIKE '%".$keyword."%'";
			endif;*/

            $sql = "SELECT * from article 
			        LEFT JOIN category ON article.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					WHERE article.category_index =".$category_index." AND article.article_display = 1  
					".$condition." 
					ORDER BY article.article_created_time DESC,article.article_index DESC";

			$data = $this->db->query($sql)->result_array();

			return count($data);

        }
        
        public function getPrevAndNext( $category_index, $article_index, $search_where = false )
        {
            $condition = "";
            /* if( $search_array )
            {
                foreach ( $search_array as $index => $item )
                {
                    $condition.=  " AND article.".$index." LIKE '%".$item."%' ";
                }
            } */
            if( $search_where )
            {
               
                $condition.= $search_where;
                
            }

            $sql = "SELECT article_index, article_name, rec_cg_index from article 
			        LEFT JOIN category ON article.category_index = category.category_index
					LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
					WHERE article.category_index =".$category_index." AND article.article_display = 1  
					".$condition." 
                    ORDER BY article_is_top DESC, article.article_created_time DESC,article.article_index DESC";

            $data = $this->db->query($sql)->result_array();

            foreach ( $data as $index => $item )
            {
                $result[$index] = $item;
                $result_2[$item['article_index']] = $index;
            }
            $article_index = intval($article_index);
           
            $return['next'] = $result_2[$article_index]< 1 ? array() : $result[$result_2[$article_index]-1];
            $return['prev'] = !empty( $result[$result_2[$article_index]+1] ) ? $result[$result_2[$article_index]+1] : array();

            return $return; 
        }

        /*public function getArticleQuantity($category_index,$search_key = FALSE, $keyword = FALSE,$article_is_top = 0){

            $condition = "";

            if(($search_key && $keyword) || (!empty($search_key) && !empty($keyword))):
                $condition = "AND ".$search_key." LIKE '%".$keyword."%'";
            endif;

            $sql = "SELECT * from article 
                        LEFT JOIN category ON article.category_index = category.category_index
                        LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index
                        WHERE article.category_index =".$category_index." AND article.article_display = 1 AND article.article_is_top = ".$article_is_top." 
                        ".$condition." 
                        ORDER BY article.article_created_time DESC,article.article_index DESC";

            $data = $this->db->query($sql)->result_array();

            return count($data);

        }*/

		public function getSingleArticle( $type, $article_index, $search_where = false){

            $return_data    = '';
            $where_date_str = 'WHERE article.article_index = '.$article_index ;

            if( $search_where )
            {
                $where_date_str .= $search_where;
            }
			
			$sql = "SELECT article_index, category_index,article_created_time FROM article WHERE article_index = ".$article_index;
			
			$article_now	= $this->db->query( $sql )->row();

            switch($type)
            {
                case 'prev_next':
                    
                    return $this->getPrevAndNext( $article_now->category_index, $article_now->article_index, $search_where  );

                case 'now':
                    $where_date_str = 'WHERE article.article_index = '.$article_index ;

                    $sql = 'SELECT *, article.article_index from article 
			        LEFT JOIN category ON article.category_index = category.category_index 
				
					
                    '.$where_date_str;

                    return $this->db->query($sql)->row();
                    
                    /* LEFT JOIN category_template ON category_template.category_template_index = category.category_template_index */
					/* LEFT JOIN article_reply ON article.article_index = article_reply.article_index */
					/* LEFT JOIN article_image ON article.article_index = article_image.article_index */

                    
                    break;

            }

            
  

		}

		public function getCategoryArticle($category_index,$offset,$limit){

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
		//new add function 
		public function getSellOldList($offset, $limit)
		{
			
			if($offset == "" || empty($offset)):
				$offset = 0;
			endif;

            $sql = "SELECT * from sell 
          ORDER BY sell.sell_time DESC
          LIMIT ".$offset.",".$limit;

			$data = $this->db->query($sql)->result_array();
			return $data;
		}
		public function count_sell_old()
		{
			$data = $this->db->get('sell')->result_array();
			return count($data);
		}
		public function getSellList($keyword,$is_state,$xi_article_category_index,$offset, $limit)
		{
			$condition = "";
			if($is_state):
				$condition = "WHERE is_state = ".$is_state."";
			endif;

			$condition1 = "";
			if($xi_article_category_index != 0 && !empty($xi_article_category_index)){
				$condition1 = "AND xi_article_category_index = ".$xi_article_category_index."";
			}else {
				$condition1 = "";
			}

			/*$condition2 = "";
			if(($keyword) || (!empty($keyword)) && (empty($is_state)) && (empty($xi_article_category_index))){
		        $condition2 = "WHERE xi_article_title LIKE '%".$keyword."%'";
			}else if(($keyword) || (!empty($keyword)) && $is_state && $xi_article_category_index){
				$condition2 = "AND xi_article_title LIKE '%".$keyword."%'";
			}*/

			$condition2 = "";
			if(($keyword) || (!empty($keyword))):
		        $condition2 = "AND xi_article_title LIKE '%".$keyword."%'";
			endif;

			if($offset == "" || empty($offset)):
				$offset = 0;
			endif;

            $sql = "SELECT * from xi_article ".$condition." ".$condition1." ".$condition2."
          ORDER BY create_time DESC
          LIMIT ".$offset.",".$limit;

			$data = $this->db->query($sql)->result_array();
			return $data;
		}
		public function count_sell($keyword,$is_state,$xi_article_category_index)
		{
			$condition = "";
			if($is_state):
				$condition = "WHERE is_state = ".$is_state."";
			endif;

			$condition1 = "";
			if($xi_article_category_index != 0 && !empty($xi_article_category_index)){
				$condition1 = "AND xi_article_category_index = ".$xi_article_category_index."";
			}else {
				$condition1 = "";
			}

			$condition2 = "";
			if(($keyword) || (!empty($keyword))):
		        $condition2 = "AND xi_article_title LIKE '%".$keyword."%'";
			endif;

			/*$condition2 = "";
			if(($keyword) || (!empty($keyword)) && (empty($is_state)) && (empty($xi_article_category_index))){
		        $condition2 = "WHERE xi_article_title LIKE '%".$keyword."%'";
			}else if(($keyword) || (!empty($keyword)) && $is_state && $xi_article_category_index){
				$condition2 = "AND xi_article_title LIKE '%".$keyword."%'";
			}*/
			

			$data = $this->db->query("SELECT * FROM xi_article ".$condition." ".$condition1." ".$condition2." ");
			return count($data);
		}
		public function getSingleSell($xi_article_index)
		{
			$data = $this->db->get_where('xi_article',array('xi_article_index'=>$xi_article_index))->row_array();
			return $data;
		}
		public function getRegionalList()
	    {
	        return $this->db->get( 'xi_article_category' )->result_array();
	    }
	    public function getArticleInfo($xi_article_index)
	    {
	        $data = $this->db->query("SELECT * FROM xi_article_info WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_article_info_index DESC")->result_array();
	        return $data;
	    }
	    public function getArticleYear($xi_article_index)
	    {
	        $data = $this->db->query("SELECT * FROM xi_article_year WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_year_index DESC")->result_array();
	        return $data;
	    }
	    /*public function getArticleImgaes($xi_article_index)
	    {
	        $data = $this->db->get_where('xi_article_image',array('xi_article_index'=>$xi_article_index))->result_array();
	        return $data;
	    }*/

	    public function getArticleImgaes($xi_article_index)
	    {
	        $data = $this->db->query("SELECT * FROM xi_article_image WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_article_image_index DESC ")->result_array();
	        return $data;
	    }

	    public function getPersentNewest($xi_article_index)
	    {
	    	$data = $this->db->query("SELECT * FROM xi_article_year WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_year_index DESC LIMIT 0,1")->row_array();
	    	return $data;
	    }
	    public function getSingleInfo($xi_article_info_index)
	    {
	    	$data = $this->db->get_where('xi_article_info',array('xi_article_info_index'=>$xi_article_info_index))->row_array();
	    	return $data;
	    }
	    public function getTotleArticle()
	    {
	    	$data = $this->db->get('xi_article')->result_array();
	    	return $data;
	    }


}
