
	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>
        <!--右侧部分开始-->
        <div id="page-wrapper">


    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>편집 분류</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="category_slide"  method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('category_slide/update'); ?>">
                            <input type="hidden" class="form-control" value="<?php echo $category_slide['category_slide_index']?>" name="category_slide_index" id="category_slide_index">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">분류 이름</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $category_slide['category_slide_name']?>" name="category_slide_name" id="category_slide_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                             <!--<div class="form-group">
                                <label class="col-sm-2 control-label">Category Slide width</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $category_slide['category_slide_width']?>" name="category_slide_width" id="category_slide_width">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Slide height</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $category_slide['category_slide_height']?>" name="category_slide_height" id="category_slide_height">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>-->
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="등록하기" >
                                </div>
                            </div>
                      