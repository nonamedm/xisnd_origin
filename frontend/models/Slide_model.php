<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_model extends CI_Model {

	public function delete_slide($slide_index)
	{

		$this->db->delete('slide',array('slide_index'=>$slide_index));

	}

	public function getSlideList()
	{
        
		$sql = "SELECT * FROM slide ORDER BY slide.slide_sort ASC,slide.slide_created_time DESC";

		$data = $this->db->query($sql)->result_array();

  		return $data;

	}

	public function count()
	{
		$data = $this->db->get('slide')->result_array();
		$count = count($data);
  		return $count;
	}

	public function check_slide($slide_index)
	{
		$data = $this->db->get_where('slide',array('slide_index'=>$slide_index))->row_array();
		return $data;
	}

	public function getCategorySlide($category_slide_index)
	{
		$data = $this->db->get_where('slide',array('category_slide_index'=>$category_slide_index))->result_array();
		return $data;
	}

	public function count_category_slide($category_slide_index)
	{
		$data = $this->db->get_where('slide',array('category_slide_index'=>$category_slide_index))->result_array();
		$count = count($data);
  		return $count;
	}



}