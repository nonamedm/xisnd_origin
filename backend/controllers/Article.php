<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Basic_Controller {

	

	public function index(){

		$article_list = $this->article->getArticleList();

		$combined_data = "";

		foreach($article_list as $key => $value):

			    $article[] = $value;

                @$reply_count = $this->article->isReply($value['article_index'])->count;

				$count[$key]['count'] = $reply_count;

                $combined_data[$key] = array_merge($article[$key],$count[$key]);

		endforeach;

		if($combined_data){
			 $this->data['article_list'] = $combined_data;
		}else{
			 $this->data['article_list'] = array();
		}

		$this->data['article_display'] = $this->enumvalue->article_display;

		$this->data['article_is_top'] = $this->enumvalue->article_is_top;

		$this->load->view('article_list',$this->data);

	}
    
	/*
	* Get article list by category
	*/
	public function category(){

		$category_index = $this->uri->segment(3);

		$category_list = $this->category->getCategoryList();

		$tree_list = $this->getTree($category_list,$category_index);

		$article_list = array();

		if($tree_list){

			foreach($tree_list as $c):
			    $get_article = $this->article->getArticleList($c['category_index']);
                $article_list = array_merge($article_list,$get_article);
			endforeach;

		} else {

			$article_list = $this->article->getArticleList($category_index);

		}

		//formatarray($article_list);exit;

		$combined_data = "";

		foreach($article_list as $key => $value):

			    $article[] = $value;

                @$reply_count = $this->article->isReply($value['article_index'])->count;

				$count[$key]['count'] = $reply_count;

                $combined_data[$key] = array_merge($article[$key],$count[$key]);

		endforeach;

		//formatarray($combined_data);exit;

		if($combined_data){
			 $this->data['article_list'] = $combined_data;
		}else{
			 $this->data['article_list'] = array();
		}

		$this->data['article_display'] = $this->enumvalue->article_display;

		$this->data['article_is_top'] = $this->enumvalue->article_is_top;

		$this->load->view('article_list',$this->data);

	}

	public function ajaxRemoveImage(){

		$article_image_index = json_decode($this->input->post('article_image_index'));

		$article_index = json_decode($this->input->post('article_index'));
        
        $query = $this->article->deleteSingleImage($article_image_index);

		if(!$query):
			error('ERROR');
		endif;

		$this->data['article_image'] = $this->article->getArticleImage($article_index);

		$this->data['article_index'] = $article_index;

		$this->load->view('article_image_ajax',$this->data);

	}



	public function add(){

        $this->data['aspect_width'] = 500;
		$this->data['aspect_height'] = 500;
		
		$this->categoryList();

		//$category_list = $this->category->getCategoryList();
		

		//$this->data['category_list'] = $this->getTree($category_list,0);

		$this->load->view('article_add',$this->data);

	}

	public function insert( $url1 = null, $url2 = null, $url3 = null )
	{
        $file 		                = $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_file",$allowed_types ='*',$max_size = '20480');
        $article_attachment_1 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_1",$allowed_types ='*',$max_size = '5120');
        $article_attachment_2 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_2",$allowed_types ='*',$max_size = '5120');
        $article_attachment_3 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_3",$allowed_types ='*',$max_size = '5120');
		$article_data = array(
			
			'category_index'	=> $this->input->post('category'),
			'article_name' 		=> $this->input->post('article_name'),
			'article_author' 	=> $this->input->post('article_author'),
			'article_is_top' 	=> $this->input->post('article_is_top'),
			'article_display' 	=> $this->input->post('article_display'),
			'article_sort'    	=> !empty ( $this->input->post('article_sort') ) ? $this->input->post('article_sort') : 0,

			'article_second_name'	=> $this->input->post('article_second_name'),
			'article_cover' 	=> $this->input->post('article_cover'),

			'article_hits' 		=> $this->input->post('article_hits'),
			'article_media_url' => $this->input->post('article_media_url'),
			'article_password' 	=> $this->input->post('article_password'),
			'article_description' 	=> $this->input->post('article_description'),
			'news_cg_index'		=> $this->input->post('news_cg_index'),
			'rec_cg_index'		=> $this->input->post('rec_cg_index'),
			'article_date_start'=> $this->input->post('article_date_start'),
			'article_date_end'	=> $this->input->post('article_date_end'),
			
			'article_content' 	=> $this->input->post('article_content'),
			
			'article_created_time' 	=> time()
			
			
			);
        if( !empty( $this->input->post('article_hits') ) )
        {
            $article_data['article_hits']	= $this->input->post('article_hits');
        }
        if( !empty( $file['file_name'] ) )
        {
            $article_data['article_file']	= $file['file_url'];
            $article_data['article_file_name']	= $file['file_name'];
        }
        if( !empty( $article_attachment_1['file_name'] ) )
        {
            $article_data['article_attachment_1']	= $article_attachment_1['file_url'];
            $article_data['article_attachment_1_name']	= $article_attachment_1['file_name'];
        }
        if( !empty( $article_attachment_2['file_name'] ) )
        {
            $article_data['article_attachment_2']	= $article_attachment_2['file_url'];
            $article_data['article_attachment_2_name']	= $article_attachment_2['file_name'];
        }
        if( !empty( $article_attachment_3['file_name'] ) )
        {
            $article_data['article_attachment_3']	= $article_attachment_3['file_url'];
            $article_data['article_attachment_3_name']	= $article_attachment_3['file_name'];
        }

        $insert_article_index = $this->article->insertArticle($article_data);

		if(!$insert_article_index)
		{
			error('Failed');
		}

        $article_image = $this->input->post('article_image');
        
        if(!empty($article_image)||$article_image !="")
        {
            $count = 0;

            foreach($article_image as $article_image_arr)
            {
                $count++;

                $image_data = array(
                    'article_index' => $insert_article_index,
                    'article_image_url' => $article_image_arr
                );

                $query = $this->article->insertArticleImage($image_data);

                if(!$query)
                {
                    error('File uploading Failed! Error Sequence Code: '.$count);
                }
            }
        }

		$url = 'article/category/'.$this->input->post('category');

		if( $url1 != null)
		{
			$url = $url1;
			
			if( $url2 != null )
			{
				$url = $url1.'/'.$url2;

				if(  $url3 != null )
				{
					$url = $url1.'/'.$url2.'/'.$url3;
				}
			}
		}
		success( $url ,'Success');

	}

	public function edit(){

        $this->data['aspect_width'] = 500;
        $this->data['aspect_height'] = 500;

        $article_index = $this->uri->segment(3);

		$this->data['article'] = $this->article->getSingleArticle($article_index);

		$this->data['article_image'] = $this->article->getArticleImage($article_index);

        $category_list = $this->category->getCategoryList();

		$this->data['category_list'] = $this->getTree($category_list,0);

		$this->load->view('article_edit',$this->data);
	}

	public function update( $url1 = null, $url2 = null, $url3 = null ){
        
		$article_index              = $this->input->post('article_index');
		$article_image              = $this->input->post('article_image');
		$file 		                = $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_file",$allowed_types ='*',$max_size = '20480');
		$article_attachment_1 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_1",$allowed_types ='*',$max_size = '5120');
		$article_attachment_2 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_2",$allowed_types ='*',$max_size = '5120');
		$article_attachment_3 		= $this->getUploadFileUrl($upload_dir = './uploads/article/',$post_file = "article_attachment_3",$allowed_types ='*',$max_size = '5120');

		$article_data = array(
			'category_index'	=> $this->input->post('category'),
			'article_name'		=> $this->input->post('article_name'),
            'article_author'	=> $this->input->post('article_author'),
			'article_is_top'	=> $this->input->post('article_is_top'),
			'article_display'	=> $this->input->post('article_display'),
            'article_sort'		=> !empty ( $this->input->post('article_sort') ) ? $this->input->post('article_sort') : 0,

            'article_second_name'   => $this->input->post('article_second_name'),
            'article_cover'		=> $this->input->post('article_cover'),
			'article_media_url' => $this->input->post('article_media_url'),
			'article_password'	=> $this->input->post('article_password'),
			'article_description' => $this->input->post('article_description'),
			
			'news_cg_index'		=> $this->input->post('news_cg_index'),
			'rec_cg_index'		=> $this->input->post('rec_cg_index'),
			'article_content' 	=> $this->input->post('article_content'),
			'article_date_start'=> $this->input->post('article_date_start'),
			'article_date_end'	=> $this->input->post('article_date_end')
			
		);
		if( !empty( $this->input->post('article_hits') ) )
		{
			$article_data['article_hits']	= $this->input->post('article_hits');
		}
		if( !empty( $file['file_name'] ) )
		{
            $article_data['article_file']	= $file['file_url'];
            $article_data['article_file_name']	= $file['file_name'];
		}
		if( !empty( $article_attachment_1['file_name'] ) )
		{
            $article_data['article_attachment_1']	= $article_attachment_1['file_url'];
            $article_data['article_attachment_1_name']	= $article_attachment_1['file_name'];
		}
		if( !empty( $article_attachment_2['file_name'] ) )
		{
            $article_data['article_attachment_2']	= $article_attachment_2['file_url'];
            $article_data['article_attachment_2_name']	= $article_attachment_2['file_name'];
		}
		if( !empty( $article_attachment_3['file_name'] ) )
		{
            $article_data['article_attachment_3']	= $article_attachment_3['file_url'];
            $article_data['article_attachment_3_name']	= $article_attachment_3['file_name'];
        }
		
		//var_dump($article_data);exit;

        $this->article->updateArticle($article_data,$article_index);
        
		/*
		if(!$query):
            error('ERROR:UPDATE QEURY');
 		endif;
        */

		if(!empty($article_image)||$article_image !="")
		{
			$count = 0;

			foreach($article_image as $article_image_arr)
			{
				$count++;

				$image_data = array(
					'article_index'		=> $article_index,
					'article_image_url' => $article_image_arr
				);

				$query = $this->article->insertArticleImage($image_data);
			
				if(!$query)
				{
					error('File uploading Failed! Error Sequence Code: '.$count);
				}
			}
		}

		$url = 'article/category/'.$this->input->post('category');

		if( $url1 != null)
		{
			$url = $url1;
			
			if( $url2 != null )
			{
				$url = $url1.'/'.$url2;

				if(  $url3 != null )
				{
					$url = $url1.'/'.$url2.'/'.$url3;
				}
			}
		}
		
		success( $url ,'Success');

	}

	public function remove( $article_index, $url1 = null, $url2 = null, $url3 = null ){

		//$article_index = $this->uri->segment(3);

		$query_article = $this->article->deleteArticle($article_index);
        
		$query_image = $this->article->deleteArticleImage($article_index);

		$url = 'article';

		if( $url1 != null)
		{
			$url = $url1;
			
			if( $url2 != null )
			{
				$url = $url1.'/'.$url2;

				if(  $url3 != null )
				{
					$url = $url1.'/'.$url2.'/'.$url3;
				}
			}
		}

		if( $query_article && $query_image ){
			success( $url ,'Success');
		}else{
			error('Error');
		}

	}
    public function webUploader(){

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");	 

        $file_base_dir = './uploads/article/';

        $folder = date('Ymd').'/';

        $file_dir = $file_base_dir.$folder;

        if (!file_exists($file_dir)){

             mkdir($file_dir, 0777);

        }

		//$file_full_url = "";

	    $config['upload_path'] = $file_dir;
	    $config['allowed_types'] = '*';
		$config['max_size'] = '10240';
		$config['encrypt_name'] = true;

		$this->load->library('upload', $config);

		$this->output->set_header('Content-Type: application/json;charset=utf-8');

	    if ( ! $this->upload->do_upload('file')){            
		   $error = array('error' => $this->upload->display_errors());            
		   echo '{"jsonrpc" : "2.0", "code": 101, "message": "'.implode($error).'"}';        
		} else {            
		   $upload_data = $this->upload->data();            
		   $uploads = $upload_data['full_path'];            
		   $uploads = str_replace(str_replace('\\','/',  getcwd()), '', $uploads);            
		   echo '{"jsonrpc" : "2.0", "code": 201, "message": "'.$uploads.'"}';        
		} 

	    //$file_full_url = $config['upload_path'].$file_info['file_name'];
               
	}

	//新版本编辑器 上传图片方法
    public function uploadContentImage()
    {
        $date = date('Ymd');

        $config['upload_path']      = './uploads/article/'.$date.'/';
        $config['allowed_types']    = '*';
        $config['max_size']         = 4096;
        $config['encrypt_name']     = TRUE;

        if (!file_exists($config['upload_path']))
        {
            mkdir($config['upload_path'], 0777);
        }
        $this->load->library('upload',$config);

        $this->upload->do_upload('upload_image');

        $wrong = $this->upload->display_errors();

        if($wrong)
        {
            error($wrong);
        }

        $info = $this->upload->data();
        //var_dump($info);
        echo $date .'/'. $info['raw_name'].$info['file_ext'];

    }
	
    
/*

	public function multipleUpload(){

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'):
            exit; // finish preflight CORS requests here
        endif;
        if ( !empty($_REQUEST[ 'debug' ]) ):
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ):
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            endif;
        endif;
	    

		@set_time_limit(5*60);

		$done = $this->getTempFile();

        if ( $done ) {

        $pathInfo = pathinfo($fileName);
        $hashStr = substr(md5($pathInfo['basename']),8,16);
        $hashName = time() . $hashStr . '.' .$pathInfo['extension'];
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR .$hashName;
 
        if (!$out = @fopen($uploadPath, "wb")):
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        endif;

        if ( flock($out, LOCK_EX)):
            for( $index = 0; $index < $chunks; $index++ ) {
                if (!$in = @fopen("{$filePath}_{$index}.part", "rb")):
                    break;
                endif;
                while ($buff = fread($in, 4096)):
                    fwrite($out, $buff);
                endwhile;
                @fclose($in);
                @unlink("{$filePath}_{$index}.part");
            }
            flock($out, LOCK_UN);
        endif;

       @fclose($out);
       $response = ['success'=>true,'oldName'=>$oldName,'filePaht'=>$uploadPath,'fileSize'=>$data['size'],'fileSuffixes'=>$pathInfo['extension'],'file_id'=>$data['id'],];
 
       die(json_encode($response));

       }
 
       // Return Success JSON-RPC response
       die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');

    }

    public function getTempFile(){

        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")):
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        endif;

        if (!empty($_FILES)) {

            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])):
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            endif;

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")):
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            endif;

          } else {

            if (!$in = @fopen("php://input", "rb")):
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
			endif;
          
          }

        while ($buff = fread($in, 4096)):
            fwrite($out, $buff);
        endwhile;

        @fclose($out);
        @fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

        $index = 0;
        $done = true;

        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part")):
                $done = false;
                break;
        endif;
        }

		return $done;
	}
*/

}
