<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends Basic_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Form_model','form');

        $this->data['category_index']   = $this->uri->segment(3);
        $this->data['sub_cg_index']     = $this->uri->segment(4);
    }

    public function index(  )
    {
       //foreach
    }

    //一级导航
    /* public function n1( $category_index = 40, $sub_cg_index = 41 )
    {
       jump2('page/field/'.$category_index.'/'.$sub_cg_index );

    }

    public function n2( $category_index = 46, $sub_cg_index = 47 )
    {
       jump2('page/certificate/'.$category_index.'/'.$sub_cg_index );

    }
    public function n3( $category_index = 48, $sub_cg_index = 49 )
    {
       jump2('page/beef/'.$category_index.'/'.$sub_cg_index );

    }

    public function n4( $category_index = 52, $sub_cg_index = 53 )
    {
       jump2('page/materials/'.$category_index.'/'.$sub_cg_index );

    }

    public function n5( $category_index = 107, $sub_cg_index = 126 )
    {
       jump2('page/web/'.$category_index.'/'.$sub_cg_index );

    }
    
    public function n6( $category_index = 51, $sub_cg_index = 110 )
    {
       jump2('page/greetings/'.$category_index.'/'.$sub_cg_index );

    }
    
    public function n7( $category_index = 95, $sub_cg_index = 94 )
    {
       jump2('article/notice/'.$category_index.'/'.$sub_cg_index );

    } */
    public function field( )
    {
        $this->fetchPageData();

        //$this->console_log($this->data);

        $this->load->view('page/field', $this->data);
    }
    //1.1
    public function greetings()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('page/greetings', $this->data);
    }
    //1.2
    public function overview()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('page/overview', $this->data);
    }
    //1.3
    public function organization()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('page/organization', $this->data);
    }

    public function personal()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';
        $this->load->view('page/personal', $this->data);
    }

    //1.4
    public function achievement()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('page/achievement', $this->data);
    }


    //1.6
    public function way()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub1';

        $this->load->view('page/way', $this->data);
    }
    //2.1
    public function housing()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/housing', $this->data);
    }
    //2.2
    public function apartment()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/apartment', $this->data);
    }

    //2.2.2
    public function office()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/office', $this->data);
    }
    
    //2.2.3
    public function infrastructure()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/infrastructure', $this->data);
    }
    //2.2.4
    public function rental()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/rental', $this->data);
    }

    //2.3
    public function network()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/network', $this->data);
    }

    //2.3.2
    public function communication()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/communication', $this->data);
    }

    //2.3.3
    public function energy()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/energy', $this->data);
    }

    //2.4.1
    public function service()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/service', $this->data);
    }

    //2.4.2
    public function options()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/options', $this->data);
    }

    //2.4.3
    public function diagnosis()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/diagnosis', $this->data);
    }

    //2.4.4
    public function center()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';

        $this->load->view('page/center', $this->data);
    }
    //2.5.1
    public function hi()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub2';
    
        $this->load->view('page/acs', $this->data);
    }
		//2.5.2
		public function acs_option()
		{
		    $this->fetchPageData();
		    $this->data['sub_type'] = 'sub2';
		
		    $this->load->view('page/acs_option', $this->data);
		}
		
		//2.5.2
		public function acs_options()
		{
		    $this->fetchPageData();
		    $this->data['sub_type'] = 'sub2';
		
		    $this->load->view('page/acs_options', $this->data);
		}
		
		
    public function about()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub3';

        $this->load->view('page/about', $this->data);
    }
    public function magazine()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub3';
        $this->load->view('page/magazine', $this->data);
    }

    public function newspaper()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub3';
        
        if( !empty( $this->data['sub_cg_index'] ) )
        {
            $this->data['form_cg_index'] = $this->form->getFormCgIndex( $this->data['sub_cg_index'] );
        }
        else
        {
            $this->data['form_cg_index'] = 0;
        }

        $this->load->view('page/newspaper', $this->data);
    }
    
    public function contact()
    {
        $this->fetchPageData();
        $this->data['sub_type'] = 'sub4';
        $this->load->view('page/contact', $this->data);
    }
    //5,1
    public function siteMap()
    {

        $this->load->view('page/site_map', $this->data);
    }

    //5.2
    public function privacy()
    {
    
        $this->load->view('page/privacy', $this->data);
    }
		
		public function document_20181201_v1_2()
		{
		
		    $this->load->view('page/document_20181201_v1_2', $this->data);
		}
		public function document_20180108_v1_1()
		{
		
		    $this->load->view('page/document_20180108_v1_1', $this->data);
		}
		public function document_20160930_v1_0()
		{
		
		    $this->load->view('page/document_20160930_v1_0', $this->data);
		}
		

    //5.1
    public function provision()
    {

        $this->load->view('page/provision', $this->data);
    }

    public function products()
    {
        $this->load->view('page/products', $this->data);
    }

    public function product_1_1()
    {
        $this->load->view('page/product_1_1', $this->data);
    }

    public function product_1_2()
    {
        $this->load->view('page/product_1_2', $this->data);
    }

    public function product_2_1()
    {
        $this->load->view('page/product_2_1', $this->data);
    }

    public function product_3_1()
    {
        $this->load->view('page/product_3_1', $this->data);
    }

    public function product_4_1()
    {
        $this->load->view('page/product_4_1', $this->data);
    }

    public function product_4_2()
    {
        $this->load->view('page/product_4_2', $this->data);
    }

    public function product_5_1()
    {
        $this->load->view('page/product_5_1', $this->data);
    }
	public function sell_old_list()
	{
		$this->fetchSellOldData($site_url = '/page/sell_old_list/',$limit = 9);
		$this->load->view('page/sell_old_list',$this->data);
	}
    public function sell_list()
    {
        $this->data['regional_list'] = $this->article->getRegionalList();
        $this->fetchSellData($site_url = '/page/sell_list/',$limit = 30);
        $this->load->view('page/sell_list',$this->data);
    }
    public function sell_detail()
    {
        $xi_article_index = $this->uri->segment(3);
        $this->data['regional_list'] = $this->article->getRegionalList();
        $this->data['sell_list'] = $this->article->getTotleArticle();
        $this->data['single_sell'] = $this->article->getSingleSell( $xi_article_index );
        $this->data['info'] = $this->article->getArticleInfo($xi_article_index);
        $this->data['year'] = $this->article->getArticleYear($xi_article_index);
        $this->data['images'] = $this->article->getArticleImgaes($xi_article_index);
        $this->load->view('page/sell_detail',$this->data);
    }
    public function getInfoAjax()
    {
        $xi_article_info_index = $this->input->post('linetype_id');

        $single_info = $this->article->getSingleInfo($xi_article_info_index);

        $htmltext = $single_info['xi_article_info_content'];
        $data = array(
            'status'=>1,
            'htmltext'=>$htmltext
        );
        echo json_encode($data);
    }
}