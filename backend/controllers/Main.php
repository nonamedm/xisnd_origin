<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Basic_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('main',$this->data);
	}
    


}
