<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends Basic_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Form_model', 'form');
        $this->load->model('Process_model', 'process');
    }

    public function mailtest() {
        $mail_from = "message@xisnd.info"; // 보내는 사람메일주소 
        $from_name = "폼메일 예제"; // 보내는사람 이름 
        $mail_to = "manue7@naver.com"; // 받는사람 메일주소


        $Headers = "from: =?utf-8?B?".base64_encode($from_name)."?= <$mail_from>n"; // from 과 : 은 붙여주세요 => from: 
        $Headers .= "Content-Type: text/html;";

        $subject = '=?UTF-8?B?'.base64_encode("폼메일 예제 - mail").'?=';


        $contents = 
        " 
        <html> 
        <body><br><br> 
        <table border=1 cellpadding=5 align=center> 
        <tr align=center bgcolor=#C0E0FF><td>카페24 호스팅 폼메일 예제</td></tr> 
        <tr align=center bgcolor=#E0F0FF height=100>이 테이블이 보이면, HTML 형식메일입니다.</td></tr> 
        </table> 
        </body> 
        </html> 
        ";

        $return = mail($mail_to,$subject,$contents,$Headers); 
        echo "PHP mail()".$return; 
    
    }

    public function createForm()
    {
        $data_post      = $this->input->post();
        //var_dump($data_post);exit;
        if( $data_post['agree'] == '0' )
        {
            success('page/newspaper/42/137','동의 하지 않습니다');
        }

        if( strtoupper($data_post['code']) != $_SESSION['code']  )
        {
            //var_dump( strtoupper($data_post['code']), $_SESSION['code']);
            success('page/newspaper/42/137','자동등록방지');
        }
        $return_array   = array();
        $data_array     = array(

            'form_cg_index' => $data_post['form_cg_index'],
            'name'          => $data_post['name'],
            //'name_2'        => $data_post['name2'],
            'title'         => $data_post['title'],
            'telephone'     => $data_post['phone'],
            'email'         => $data_post['email'],
            'contents'      => $data_post['content'],
            'create_date'   => time()
        );

        /* if( !empty( $data_post['language1'] ) )
        {
            $data_array['language_1'] = $data_post['language1'];
        }

        if( !empty( $data_post['language2'] ) )
        {
            $data_array['language_2'] = $data_post['language2'];
        }

        if( !empty( $data_post['year1'] ) )
        {
            $data_array['date'] =  $data_post['year1'].'-'.$data_post['month1'].'-'.$data_post['day1'];
        }

        if( !empty($_FILES['f1']['tmp_name']) )
        {
            $post_file = 'f1';

            $data_array['attachment_1'] = $this->getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '5120');
        }

        if( !empty($_FILES['f2']['tmp_name']) )
        {
            $post_file = 'f2';

            $data_array['attachment_2'] = $this->getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '5120');
        }

        if( !empty($_FILES['f3']['tmp_name']) )
        {
            $post_file = 'f3';

            $data_array['attachment_3'] = $this->getUploadFileUrl($upload_dir = './uploads/',$post_file,$allowed_types ='*',$max_size = '5120');
        } */

        $result     = $this->form->createForm( $data_array );

        $message    = 'Failed';

        if( $result )
        {
            $email_list = $this->process->getEmail();

            foreach ( $email_list as $item )
            {
                $this->sendMail( $data_array, $item['email_url'] );
            }

            $message = 'Success';

            $return_array['status'] = 1 ;
        }
        else
        {
            $return_array['status'] = 0 ;
        }

        success('page/magazine/42/134', $message);
        //echo json_encode( $return_array );

    }

    public function show( )
    {
        //$email = "zunz@zunz.net";
        //$email = "zero.wzsun@gmail.com";
        $email = "manue7@naver.com";
        echo $email;
        $result = $this->sendMailTest( $email );
        //var_dump($result);
    }
    public function sendMailTest( $to_email )
    {
        $from_info['subject']   = "[Xi S&D] 사이버신문고 신규접수";
        $from_info['name']      = "Xi S&D";
        $from_info['mail']      = "message@xisnd.info";
        $from_info['message']   = 'test';
        $from_info['to_email']  = $to_email;

        //$this->toEmailTest( $from_info );
        $this->toEmailCiTest( $from_info );
    }

    private function toEmailTest( $from_info )
    {
        //$subject = "=?GBK?B?".base64_encode('邮件主题')."?=";    //解决邮件主题乱码问题，GBK编码格式
        $header = "From: ".$from_info['form_name']." <".$from_info['from_mail'].">\n";
        $header .= "Return-Path: <".$from_info['from_mail'].">\n";	 //防止被当做垃圾邮件，但在sina邮箱里不起作用
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";    //邮件内容为utf-8编码
        $header .= "Content-Transfer-Encoding: 8bit\r\n";	 //注意header的结尾，只有这个后面有\r

        ini_set('Xi S&D', $from_info['from_mail']);	 //解决mail的一个bug

        $message = wordwrap($from_info['message'], 70);	 //每行最多70个字符,这个是mail方法的限制
        return mail($from_info['to_email'], $from_info['subject'], $message, $header);
    }

    private function toEmailCiTest( $from_info )
    {
        //$config['protocol'] = 'sendmail';
        //$config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        //$config['wordwrap'] = TRUE;



        $this->load->library('email');

        $this->email->initialize($config);

        $this->email->from( $from_info['mail'] , $from_info['name']);
        $this->email->to($from_info['to_email']);
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');

        $this->email->subject($from_info['subject']);
        $this->email->message($from_info['message']);

        $this->email->send();
    }

    private function sendMail( $data, $email = "info@transino.com" )
    {
        $subject    = "[Xi S&D] 사이버신문고 신규접수";
        $from_info['form_name']  = "Xi S&D";
        $from_info['from_mail']  = "message@xisnd.info";
        $message = '<html>
        <head>
            <title>Xi S&D Email</title>
        </head>
        <body>
            <table width="600px" style=" margin: 20px auto; border: 1px solid #eee; border-bottom: none; font-size: 18px; vertical-align:middle; font-family:"맑은 고딕", "Malgun Gothic", Dotum, 돋움, Gulim, 굴림, Helvetica, Arial, sans-serif;">
                <img src="http://xisnd.com/resource/frontend/images/logo1.png" style=" height: 30px; padding: 10px;">
                <tbody>
                    <tr style="height: 50px;">
                        <td colspan="2" style="background: #0082A1; color: #fff; padding-left: 15px; font-weight:bold; font-size: 20px;">사이버신문고</td>
                    </tr>
                    <tr style="height: 50px;">
                        <td style=" width:100px;border-bottom: 1px solid #eee; border-right: 1px solid #eee;  padding-left: 15px; font-weight: bold;">이름</td>
                        <td style="border-bottom: 1px solid #eee;  padding-left: 15px; color: #666;">'.$data["name"].'</td>
                    </tr>
                    <tr style="height: 50px;">
                        <td style="border-bottom: 1px solid #eee; border-right: 1px solid #eee;  padding-left: 15px; font-weight: bold;">이메일</td>
                        <td style="border-bottom: 1px solid #eee;  padding-left: 15px; color: #666;">'.$data["email"].'</td>
                    </tr>
                    <tr style="height: 50px;">
                        <td style="border-bottom: 1px solid #eee; border-right: 1px solid #eee;  padding-left: 15px; font-weight: bold;">연락처</td>
                        <td style="border-bottom: 1px solid #eee;  padding-left: 15px; color: #666;">'.$data["telephone"].'</td>
                    </tr>
                    <tr style="height: 50px;">
                        <td style="border-bottom: 1px solid #eee; border-right: 1px solid #eee;  padding-left: 15px; font-weight: bold;">제목</td>
                        <td style="border-bottom: 1px solid #eee;  padding-left: 15px; color: #666;">'.$data["title"].'</td>
                    </tr>
                    <tr style="height: 50px;">
                        <td style="border-right: 1px solid #eee; padding-left: 15px; font-weight: bold;">상담내용</td>
                        <td style=" padding-left: 15px; color: #666; padding: 15px;"> '.$data["contents"].' </td>
                    </tr>
                    <tr style="height: 50px;">
                        <td colspan="2" style="background: #eee; color: #999; padding-right: 15px;font-size: 12px; text-align: right;">Copyright Xi S&D SERVICE &amp;CONSTRUCTION Inc. All rights reserved.</td>
                    </tr>
            </tbody>
        </table>
        </body>
        </html>';



    
        return $this->toEmail($email, $message, $subject,  $from_info);
    }

    private function toEmail( $email, $send_message, $subject = 'Email Title', $from_info )
    {
        //$subject = "=?GBK?B?".base64_encode('邮件主题')."?=";    //解决邮件主题乱码问题，GBK编码格式
        $header = "From: ".$from_info['form_name']." <".$from_info['from_mail'].">\n";
        $header .= "Return-Path: <".$from_info['from_mail'].">\n";	 //防止被当做垃圾邮件，但在sina邮箱里不起作用
        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-type: text/html; charset=utf-8\n";    //邮件内容为utf-8编码
        $header .= "Content-Transfer-Encoding: 8bit\r\n";	 //注意header的结尾，只有这个后面有\r
        ini_set('Xi S&D', $from_info['from_mail']);	 //解决mail的一个bug
        $send_message = wordwrap($send_message, 70);	 //每行最多70个字符,这个是mail方法的限制
        return mail($email, $subject, $send_message, $header);
    }

    public function getSessionCode()
    {
        $now_code = strtoupper($this->input->get('code'));

        $data['valid'] = $now_code != $_SESSION['code'] ? 'false' : 'true';

        echo json_encode( $data );
    }

}