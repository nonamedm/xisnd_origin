<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Basic_Controller {


	public function index()
	{
		
        $this->load->view('home',$this->data);        
	}

}
