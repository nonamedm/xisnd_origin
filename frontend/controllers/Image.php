<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends Basic_Controller {



    public function __construct(){

        parent::__construct();
        
        //$this->load->library('Crop');

        if(!function_exists('password_hash')):
            $this->load->helper('password');
        endif;

    }

    public function index()
    {

		$this->load->view('crop_test');

    }


	public function test(){
		formatdump($_SESSION);exit;
	}



}