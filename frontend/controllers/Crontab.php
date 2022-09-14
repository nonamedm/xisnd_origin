<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crontab extends CI_Controller {

    public function __construct(){

        parent::__construct();

    }

    private function jobbyLog()
    {
        $array = array(
            'jobby_content' => 'action',
            'jobby_date'    => date('Y-m-d H:i:s')
        );

        $result = $this->db->insert( 'jobby', $array );
    }
    
    public function jobbyVisit()
    {
        $this->load->model('Visit_model', 'visit');

        $status_code = 500;
        $data_post = $this->input->post();

        if( !empty( $data_post['verification'] ) && $data_post['verification'] == "DFANBG6168462jhio" )
        {
            $data_status = array(
                'today_visit' => 0
            );

            $this->visit->updateStatus($data_status);

            $this->jobbyLog();

            $status_code = 200;

        }

        echo $status_code;
    }

    public function jobbyCurl()
    {
        $status = 30;

        $data_post = array(
            'verification' => "DFANBG6168462jhio",
        );
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, 'http://project-05.ithanhua.cn/index.php/Crontab/jobbyVisit' );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_post);

        $response = curl_exec( $ch );
        curl_close( $ch );

        if($response == 200 )
        {
            $status = 20;
        }

        //echo $status;
    }
}