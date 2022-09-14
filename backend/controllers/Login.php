<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model', 'admin');

        if(!function_exists('password_hash'))
        {
            $this->load->helper('password');
        }
        $this->load->library('Tool', 'tool');
        $this->load->model('Login_model','login');
	}

	public function index()
	{

		if($this->session->admin_index):
            header('Location:'.site_url('main'));
            exit;
        endif;

		$this->load->view('login');
	}

	public function signin(){

        $submit     = $this->input->post('submit');
		$admin_id   = $this->input->post('admin_id');
		$admin_pwd  = $this->input->post('admin_pwd');
		$code       = $this->input->post('captcha');

		if ($submit)
		{
			$admin = $this->admin->checkAdminId( $admin_id );

		    if( strtoupper($code) != $_SESSION['code'] )
            {
                error('Incorrect captcha');
            }

			if( !$admin || !password_verify( $admin_pwd, $admin->admin_pwd ) )
            {
                error('Incorrect admin ID or password');
            }

			$session_data = array(
				'admin_index' => $admin->admin_index,
				'admin_nick_name' => $admin->admin_nick_name,
				'admin_grade' => $admin->admin_grade,
				'login_time' => time()
				);

			$this->session->set_userdata( $session_data );

			$random = $this->tool->getRandomStr();

            $cookie_array = array(
                'login_index'   => $admin->admin_index,
                'login_grade'   => $admin->admin_grade,
                'login_name'    => $admin->admin_nick_name,
                'login_random'  => $random,
                'login_time'    => time()
            );

            $this->login->createLoginInfo( $cookie_array );

            set_cookie( 'login', json_encode( $cookie_array ) , 43200);


            /*$data = array(
                'login_index'   => $admin->admin_index,
                'login_grade'   => $admin->admin_grade,
                'login_name'    => $admin->admin_nick_name,
                'login_random'  => $random,
                'login_time'    => time()
            );

            $this->login->createLoginInfo( $data );*/

			success('main', 'Success');
		}
		else
        {
			$this->load->view('login');
		}
	}

	public function signout(){

		$session_data = array('admin_index', 'admin_nick_name', 'admin_grade','login_time','code');

        delete_cookie('login');

		$this->session->unset_userdata($session_data);

		success('login','Success');

	}

    public function captcha(){

        $config = array(
            'width'     =>130,
            'height'    =>50,
            'codeLen'   =>4,
            'fontSize'  =>22,
        );

        $this->load->library('captcha',$config);

        $this->captcha->show();
    }

	public function test(){
		formatdump($_SESSION);exit;
	}
   

}
