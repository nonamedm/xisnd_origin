<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

    <!--右侧部分开始-->
    <div id="page-wrapper">


    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Create New Pop</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('pop/insert'); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_name" id="pop_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Pop</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_pop_index" id="category_pop_index">
                                        <?php foreach($category_pop_list as $v):?>
                                        <option value="<?php echo $v['category_pop_index']?>" data-type=""><?php echo $v['category_pop_name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Image</label>

                                <div class="col-sm-10">
                                    <input type="file" name="pop_image" id="pop_image">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Video</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_video" id="pop_video">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <!--<div class="form-group">
                                <label class="col-sm-2 control-label">Pop Description</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_description" id="pop_description">
                                </div>
                            </div>-->

                            <!-- Loading ueditor -->
                            <script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>/tools/editor_pop/ueditor.config.js"></script>
                            <script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>/tools/editor_pop/ueditor.all.min.js"> </script>   
                            <script type="text/javascript">  
                                var ue = UE.getEditor('pop_description');
                            </script>
    
                            <div class="form-group" >
                                <label class="col-sm-2 control-label">Pop Description</label>
                                <div class="col-sm-10">
                                    <textarea name="pop_description" id="pop_description"></textarea>
                                </div>
                            </div>


                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Display</label>

                                <div class="col-sm-10">
									<label class="checkbox-inline i-checks">
                                    <input type="radio" name="pop_option" value="0" checked>NO</label>
                                    <label class="checkbox-inline i-checks">
                                    <input type="radio" name="pop_option" value="1">YES</label>
                                </div>

                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Margin Left</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_margin_left" id="pop_margin_left">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Margin Top</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_margin_top" id="pop_margin_top">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Padding Left</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_padding_left" id="pop_padding_left">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Padding Top</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_padding_top" id="pop_padding_top">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Begin Time</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_begin_time" id="pop_begin_time">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop End Time</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pop_end_time" id="pop_end_time">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" value="SAVE">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

        </div>
        <!--右侧部分结束-->
    </div>
<?php
$this->load->view('footer');
?>
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
 

    <!-- Web Uploader -->

    <script type="text/javascript">
        var BASE_URL = '<?php echo base_url(); ?>resource/admin/js/plugins/webuploader';
	    var UPLOAD_URL = '<?php echo site_url("article/webuploader"); ?>';
    </script>

	 <script src="<?php echo base_url(); ?>resource/admin/js/plugins/webuploader/webuploader.min.js"></script>
	 <script src="<?php echo base_url(); ?>resource/admin/js/demo/webuploader-demo.js"></script>