<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_model extends CI_Model
{
    /** Regional Start**/
    public function getRegionalList()
    {
        return $this->db->get( 'xi_article_category' )->result_array();
    }
    public function count_regional()
    {
        $data = $this->db->get( 'xi_article_category' )->result_array();
        return count($data);
    }
    public function getSingleRegional( $xi_article_category_index )
    {
        $this->db->where('xi_article_category_index', $xi_article_category_index );
        
        return $this->db->get('xi_article_category')->row_array();
    }
    public function insertRegional( $data )
    {
        return $this->db->insert( 'xi_article_category', $data );
    }
    public function updateRegional( $data, $xi_article_category_index )
    {
        $this->db->update('xi_article_category',$data,array('xi_article_category_index'=>$xi_article_category_index));
    }
    public function removeRegional( $xi_article_category_index )
    {
        return $this->db->delete('xi_article_category', array( 'xi_article_category_index'=>$xi_article_category_index ));
    }
    /** Regional End**/


    /** Sell Start**/
    public function getSellList()
    {
        return $this->db->get( 'xi_article' )->result_array();
    }
	public function count_sell()
	{
		$data = $this->db->get( 'xi_article' )->result_array();
		return count($data);
	}
    public function getSingleSell( $xi_article_index )
    {
        $this->db->where('xi_article_index', $xi_article_index );
        
        return $this->db->get('xi_article')->row_array();
    }
    public function insertSell( $sell_data )
    {
        $this->db->insert( 'xi_article', $sell_data );
        return $this->db->insert_id();
    }
    public function updateSell( $sell_data, $xi_article_index )
    {
        $this->db->update('xi_article',$sell_data,array('xi_article_index'=>$xi_article_index));
    }
    public function removeSell( $xi_article_index )
    {
        return $this->db->delete('xi_article', array( 'xi_article_index'=>$xi_article_index ));
    }
    /** Sell End**/

    /** Info And Year Get Start**/
    public function getArticleInfo($xi_article_index)
    {
        $data = $this->db->query("SELECT * FROM xi_article_info WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_article_info_index DESC")->result_array();
        return $data;
    }
    public function getArticleYear($xi_article_index)
    {
        $data = $this->db->query("SELECT * FROM xi_article_year WHERE xi_article_index = ".$xi_article_index." ORDER BY xi_year_index DESC")->result_array();
        return $data;
    }
    //insert/update/delete Info
    public function getSingleInfo( $xi_article_info_index )
    {
        $this->db->where('xi_article_info_index', $xi_article_info_index );
        
        return $this->db->get('xi_article_info')->row_array();
    }
    public function insertInfo($data_info)
    {
        $this->db->insert('xi_article_info',$data_info);
        return $this->db->insert_id();
    }
    public function updateInfo($data_info,$xi_article_info_index)
    {
        $this->db->update('xi_article_info',$data_info,array('xi_article_info_index'=>$xi_article_info_index));
    }
    public function removeInfo($xi_article_info_index)
    {
        $this->db->delete('xi_article_info',array('xi_article_info_index'=>$xi_article_info_index));
    }
    //insert/update/delete Year
    public function getSingleYear( $xi_year_index )
    {
        $this->db->where('xi_year_index', $xi_year_index );
        
        return $this->db->get('xi_article_year')->row_array();
    }
    public function insertYear($data_year)
    {
        $this->db->insert('xi_article_year',$data_year);
        return $this->db->insert_id();
    }
    public function updateYear($data_year,$xi_year_index)
    {
        $this->db->update('xi_article_year',$data_year,array('xi_year_index'=>$xi_year_index));
    }
    public function removeYear($xi_year_index)
    {
        $this->db->delete('xi_article_year',array('xi_year_index'=>$xi_year_index));
    }
    /** Info And Year Get End**/

    public function insertArticleImg($data1)
    {
        $this->db->insert('xi_article_image',$data1);
    }
    public function getArticleImgaes($xi_article_index)
    {
        $data = $this->db->get_where('xi_article_image',array('xi_article_index'=>$xi_article_index))->result_array();
        return $data;
    }
    public function removeImages($xi_article_image_index)
    {
        $this->db->delete('xi_article_image',array('xi_article_image_index'=>$xi_article_image_index));
    }

    
}