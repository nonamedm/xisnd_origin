<?php
class EnumValue{

	public $category_display = array(1 => 'YES', 0 => 'NO');

	public $article_display = array(1 => 'YES', 0 => 'NO');

	public $article_reply_display = array(0 => 'YES', 1 => 'NO');

	public $article_is_top = array(0 => 'NO', 1 => 'YES');

	public $user_authority = array(0 => 'NO', 1 => 'YES');

	public $user_status = array(0 => 'Normal', 1 => 'Blocked');

	public $user_gender = array(0 => 'Male', 1 => 'Female');

	public $is_option = array(0 => 'No', 1 => 'Yes');


	public $y_n = array( 0 => 'NO', 1 => 'YES');

    public function __construct(){

    }


}