
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Basic_model v0.1.2
 */
class Basic_model extends CI_Model{

    public function processFormData($type, $array, $table, $table_index = false, $index = false, $detelt_array = false){
        /**
         * $type        选择处理的方式( insert | insert_id | update | delete | delete_array)
         * $array       数据的数组
         * $table       数据库 表名
         * $table_index 数据库 索引ID 键值
         * $index       数据库 索引ID 值
         * $detelt_array数据库 键值与值的数组 仅限delete_array使用 
         */
        switch($type){
            case 'insert':
                return $this->db->insert($table, $array);
                break;
            case 'insert_id':
                $this->db->insert($table, $array);
                return $this->db->insert_id();
            case 'update':
                $this->db->where($table_index, $index);
                return $this->db->update($table ,$array);
                break;
            case 'delete':
                return $this->db->delete($table, array($table_index => $index ));
                break;
            case 'delete_array':
                return $this->db->delete($table, $detelt_array);
                break;
            case 'empty_table' :
                return $this->db->empty_table($table);
                break;
        }
    }

    public function getSqlData($type = 'result_array', $table, $table_index = false, $index = false ,$limit = FALSE ,$offset = FALSE, $Sorting_index = FALSE, $Sorting = FALSE, $where = ""){
        //$where = "";
        $filter = "";
        $Sorting_srt = "";
        if($limit != FALSE){
            if($offset == ''){
                $filter = 'LIMIT '.$limit;
            }else{
                $filter = 'LIMIT '.$offset.','.$limit;
            }
        }
        if($Sorting_index != FALSE && $Sorting != FALSE){
            $Sorting_srt = 'ORDER BY ' .$Sorting_index.' '.$Sorting;
        }
        if (!empty($table_index) && !empty($index)) {
            $where = "WHERE " . $table_index . " = " . $index;
        }
        $sql = "SELECT * FROM " . $table . " " . $where ." " . $Sorting_srt ." ". $filter;
        switch ($type) {
            case 'result_array':
                return $this->db->query($sql)->result_array();
                break;
            case 'row':
                return $this->db->query($sql)->row();
                break;
            case 'num_rows':
                return $this->db->query($sql)->num_rows();
                break;
        }
    }
}