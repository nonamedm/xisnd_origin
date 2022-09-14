<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Basic_Controller {

    public function __construct(){

        parent::__construct();

        if(!function_exists('password_hash')):
            $this->load->helper('password');
        endif;

    }

    public function index()
    {

    }

	public function register(){

		$user_id = trim($this->input->post('user_id'));
		$user_pwd = trim($this->input->post('user_pwd'));
		$user_name = trim($this->input->post('user_name'));
		$user_birthday = $this->input->post('birthday_years').'-'.$this->input->post('birthday_months').'-'.$this->input->post('birthday_days');
		$user_address = $this->input->post('user_address');
		$user_contact = $this->input->post('user_contact');
		$user_gender = $this->input->post('user_gender');
		$user_concern = implode(',', $this->input->post('user_concern'));

		$data = array(
			'user_id' => $user_id,
			'user_pwd' => password_hash($user_pwd,PASSWORD_BCRYPT),
			'user_name' => $user_name,
			'user_birthday' => $user_birthday,
			'user_gender' => $user_gender,
			'user_address' => $user_address,
			'user_contact' => $user_contact,
			'user_concern' => $user_concern,
			'user_authority' => 0,
			'user_status' => 0,
			'user_register_time' => time()
			);

		 $query = $this->user->insertUser($data);

         if($query){
			 success('home','회원 가입 성공하였습니다');
		 }else{
			 error('회원 가입 실패하였습니다');
		 }
   
	}

    public function ajaxCheckUserId(){

		$user_id = trim($this->input->post('userid'));

		$query = $this->user->checkUserId($user_id);

		if(!$query):
		    echo "true";
		endif;
		
	}


	public function login(){

        $submit = $this->input->post('submit');

		$user_id =  trim($this->input->post('login_user_id'));

		$user_pwd = trim($this->input->post('login_user_pwd'));

		@$save_id = $this->input->post('save_id');

		if ($submit) {
            
			$user = $this->user->checkUserId($user_id);

			if(!$user || !password_verify($user_pwd, $user->user_pwd)):
				error('정확한 아이디와 비밀번호 입력해주시길 바랍니다');
			endif;

			$session_data = array(
				'user_index' => $user->user_index,
				'user_name' => $user->user_name,
				'user_authority' => $user->user_authority,
				'user_login_time' => time()
				);

			$this->session->set_userdata($session_data);

		    if(@isset($save_id) || @!empty($save_id)):
		        $cookie_data = array(
					           'saved_id' => $user_id
			                 );
                $this->session->set_tempdata($cookie_data, NULL, 604800); 
		    endif;

			jump('로그인 성공하였습니다',-1);

		}else{

			error('불법요청입니다');

		}

	}

	public function logout(){

		$session_data = array('user_index', 'user_name', 'user_authority','user_login_time');

		$this->session->unset_userdata($session_data);

		jump('로그아웃 하셨습니다',-1);

	}

	public function test(){
		formatdump($_SESSION);exit;
	}



}