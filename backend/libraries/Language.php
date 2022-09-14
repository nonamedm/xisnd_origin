<?php
class Language{

	public $category = array('kr' => '카태고리', 'cn' => 'NO');

	public $list = array('kr' => '리스트', 'cn' => 'NO');

	public $add = array('kr' => '추가', 'cn' => '添加');

	public $category_display = array(0 => 'YES', 1 => 'NO');

	public $article_display = array(0 => 'YES', 1 => 'NO');

	public $article_reply_display = array(0 => 'YES', 1 => 'NO');

	public $article_is_top = array(0 => 'NO', 1 => 'YES');

	public $user_authority = array(0 => 'NO', 1 => 'YES');

	public $user_status = array(0 => 'Normal', 1 => 'Blocked');

	public $user_gender = array(0 => 'Male', 1 => 'Female');


    public function __construct(){

    }


}