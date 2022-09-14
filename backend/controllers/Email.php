<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Basic_model', 'basics');
        $this->data['system'] = $this->basics->getSqlData('row', 'system');
        $this->data['system_email'] = $this->basics->getSqlData('result_array', 'system_email');
    }

    public function index(){
        if($this->input->post('form_status') == 1){

            $data_array = array(
                'type' => 0
            );

            $email_array = $this->input->post('email');
            $result = false;
            if($this->basics->getSqlData('num_rows', 'system') > 0){
                $result = $this->basics->processFormDate('update', $data_array, 'system', 'index', '1');
            }else{
                $result = $this->basics->processFormDate('insert', $data_array, 'system');
            }

            if($result){
                $result = $this->basics->processFormDate('empty_table', FALSE, 'system_email');
                $i = 0;
                if($result){
                    foreach($email_array as $index => $item){
                        $i++;
                        $array = array(
                            'system_email_index' => $i,
                            'system_index'      => 1,
                            'system_email_type' => 0,
                            'system_email'      => $item,
                        );
                        $result_array[] = $this->basics->processFormDate('insert', $array, 'system_email');
                    }
                    if(!in_array(false, $result_array)){
                        success('system', 'Success');
                    }
                }
            }

            success('system', 'Failed');
        }
        $this->load->view('system' ,$this->data);
    }

}