<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_old_model extends CI_Model
{
    
    public function getSellList()
    {
        return $this->db->get( 'sell' )->result_array();
    }
	public function count_sell()
	{
		$data = $this->db->get( 'sell' )->result_array();
		return count($data);
	}

    public function getSingleSell( $sell_index )
    {
        $this->db->where('sell_index', $sell_index );
        
        return $this->db->get('sell')->row_array();
    }

    public function insertSell( $sell_data )
    {
        return $this->db->insert( 'sell', $sell_data );
    }

    public function updateSell( $sell_data, $sell_index )
    {
        $this->db->update('sell',$sell_data,array('sell_index'=>$sell_index));
    }

    public function removeSell( $sell_index )
    {
        return $this->db->delete('sell', array( 'sell_index'=>$sell_index ));
    }
}