<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getLoginInfo( $login_random, $login_index )
    {
        $sql = "SELECT * FROM login_info WHERE login_random = '".$login_random."' AND login_index = ".$login_index;

        return $this->db->query( $sql )->row();
    }

    public function createLoginInfo( $data )
    {
        return $this->db->replace( 'login_info', $data );
    }

}