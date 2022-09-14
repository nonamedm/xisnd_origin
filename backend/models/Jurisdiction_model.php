<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurisdiction_model extends CI_Model
{
    /**
     * 获取 jurisdiction_template 数据
     * @return mixed
     */
    public function getJscTpList()
    {
        $sql = "SELECT * FROM jurisdiction_template";

        return $this->db->query( $sql )->result_array();
    }

    /**
     * 根据 jsc_tp_index 获取 jurisdiction_template 单条数据
     * @param $jsc_tp_index
     * @return mixed
     */
    public function getJscTpEdit( $jsc_tp_index )
    {
        $sql = "SELECT * FROM jurisdiction_template WHERE jsc_tp_index = ".$jsc_tp_index;

        return $this->db->query( $sql )->row();
    }

    /**
     * 获取 jurisdiction_data 数据
     * @return mixed
     */
    public function getJscDataAdminList( $admin_index )
    {
        $sql = "SELECT * FROM jurisdiction_data WHERE admin_index = ".$admin_index;

        return $this->db->query( $sql )->result_array();
    }


    public function getAdminList(){

        $sql = "SELECT * FROM admin";
        return $this->db->query($sql)->result_array();

    }

    /**
     * 根据 user_index 获取 jurisdiction_data 一组数据
     * @param $user_index
     * @return mixed
     */
    public function getAdminJscData ( $admin_index )
    {
        $sql = "SELECT * FROM admin 
                LEFT JOIN jurisdiction_data ON admin.admin_index = jurisdiction_data.admin_index
                WHERE admin.admin_index = ".$admin_index;

        return $this->db->query( $sql )->result_array();
    }

    /**
     * 新增 jurisdiction_template 数据一条
     * @param $data_array
     * @return bool
     */
    public function insertJscTp( $data_array )
    {
        return $this->db->insert( 'jurisdiction_template', $data_array );
    }

    /**
     * 修改 jurisdiction_template 数据一条
     * @param $data_array
     * @param $jsc_tp_index
     * @return bool
     */
    public function updateJscTp( $data_array, $jsc_tp_index )
    {
        $this->db->where( 'jsc_tp_index', $jsc_tp_index  );

        return $this->db->update( 'jurisdiction_template', $data_array );
    }

    /**
     * 事物处理：jurisdiction_data 表 数据 修改（删除后）
     * @param $data_array
     * @param $admin_index
     * @return mixed
     */
    public function processJscData( $data_array, $admin_index )
    {
        $this->db->trans_start();

        $this->db->where( 'admin_index' , $admin_index );

        $this->db->delete( 'jurisdiction_data' );

        foreach ( $data_array as $i_index => $item)
        {
            $jsc_tp_index = $this->db->query( 'SELECT jsc_tp_index FROM jurisdiction_template WHERE jsc_tp_category_code = "'.$i_index.'"' )->row()->jsc_tp_index;

            $insert_array = array
            (
                'jsc_tp_index'  => $jsc_tp_index,
                'admin_index'   => $admin_index,
                'jsc_data_value'=> $item
            );

            $this->db->insert('jurisdiction_data', $insert_array);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    /**
     * jurisdiction_template 表 使用Code 值 查找index
     * @param $code
     * @return mixed
     */
    public function getJscTpIndexByCode( $code )
    {
        $sql = 'SELECT jsc_tp_index FROM jurisdiction_template WHERE jsc_tp_category_code = "'.$code.'"';

        return $this->db->query( $sql )->row();
    }
}