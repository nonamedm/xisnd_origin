<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends Basic_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('Setting_model', 'set');
	}

	public function index(){
        
    }
    
    public function email()
    {
        
        $this->data['message_email'] = $this->set->getEmailList();
        

        $this->load->view('message/email', $this->data);
    }

	public function update(){
        
        $email_array = $this->input->post('email');

        $result = $this->basics->processFormData('empty_table', FALSE, 'message_email');
        if(!$result){
           success('Message/email', 'Failed'); 
        }
        $result_array = array();
        foreach($email_array as $index => $item){
            if(!empty($item)){
                $array = array(
                    'message_email_index' => $index+1,
                    'message_email' => $item,
                );
                $result_array[] = $this->basics->processFormData('insert', $array, 'message_email');
            }
        }
        if(in_array(false, $result_array)){
            success('Message/email', 'Failed');
        }else{
            success('Message/email','Success');
        }
    }
    
    public function ajaxProcessEmail(){

        $data_array = json_decode($this->input->post('email'));
        
        //var_dump(json_decode($data_array));exit;
        $result = $this->basics->processFormData('empty_table', false, 'message_email');
        if(!$result){
            //success('Message/email', 'Failed');
            echo 0;
            exit;
        }

        foreach($data_array as $index => $item){
            $array = array(
                'message_email_index'   => $index+1,
                'message_email'         => $item
            );

            $result_array[] = $this->basics->processFormData('insert', $array, 'message_email', $table_index = false, $index = false, $detelt_array = false);
        }
        if(!in_array(false, $result_array)){
            //success('Message/email', 'Success');
            echo 1;
            exit;
        }

        //success('Message/email', 'Failed');
        echo 0;
        exit;
    }
    


}
