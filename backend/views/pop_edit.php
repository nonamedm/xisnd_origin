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
                        <h5>Edit Pop</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('pop/update'); ?>">
                            <input type="hidden" name="pop_index" id="pop_index" value="<?php echo $pop['pop_index']?>">
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $pop['pop_name']?>" name="pop_name" id="pop_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Pop</label>

                            <div class="col-sm-10">
                                        <input type="hidden" name="category_pop_index" id="category_pop_index" value="<?php echo $pop['category_pop_index']?>">
                                        <?php foreach($category_pop_list as $v):?>
                                        <?php if($pop['category_pop_index'] == $v['category_pop_index']):?>
                                            <p style="font-weight:600;padding-top:7px"><?php echo $v['category_pop_name']?></p>
                                        <?php endif;?>
                                        <?php endforeach;?>
                                    
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>
                           <?php if($pop['pop_image'] != ""):?>
                           <div class="form-group">
                                <label class="col-sm-2 control-label">Show Pop Image</label>

                                <div class="col-sm-10">
                            
                                   <img src="<?php echo $pop['pop_image']?>">
                                
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Image</label>

                                <div class="col-sm-10">
                                    <input type="file" name="pop_image" id="pop_image">
                                    <input type="hidden" name="pop_image_bak" id="pop_image_bak" <?php if($pop['pop_image'] != ""):?>value="<?php echo $pop['pop_image']?>"<?php endif;?>>
                                
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <?php endif;?>
                            <?php if($pop['pop_video'] != ""):?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Video</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" <?php if($pop['pop_video'] != ""):?>value="<?php echo $pop['pop_video']?>"<?php endif;?> name="pop_video" id="pop_video">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <?php endif;?>
                            <?php if($pop['pop_description'] != ""):?>
                            
                            <!--<div class="form-group">
                                <label class="col-sm-2 control-label">Pop Description</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" <?php if($pop['pop_description'] != ""):?>value="<?php echo $pop['pop_description']?>"<?php endif;?> name="pop_description" id="pop_description">
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
                                    <textarea name="pop_description" id="pop_description"><?php echo $pop['pop_description']?></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <?php endif;?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Display</label>

                                <div class="col-sm-10">
									<label class="checkbox-inline i-checks">
                                    <input type="radio" name="pop_option" value="0" <?php if($pop['pop_option'] == 0):?>checked<?php endif;?>>NO</label>
                                    <label class="checkbox-inline i-checks">
                                    <input type="radio" name="pop_option" value="1" <?php if($pop['pop_option'] == 1):?>checked<?php endif;?>>YES</label>
                                </div>

                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Margin Left</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $pop['pop_margin_left']?>" name="pop_margin_left" id="pop_margin_left">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Margin Top</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $pop['pop_margin_top']?>" name="pop_margin_top" id="pop_margin_top">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Padding Left</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $pop['pop_padding_left']?>" name="pop_padding_left" id="pop_padding_left">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Padding Top</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $pop['pop_padding_top']?>" name="pop_padding_top" id="pop_padding_top">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop Begin Time</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" <?php if(date('Y-m-d',$pop['pop_begin_time']) != ""):?>value="<?php echo date('Y-m-d',$pop['pop_begin_time']);?>"<?php endif;?> name="pop_begin_time" id="pop_begin_time">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Pop End Time</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" <?php if(date('Y-m-d',$pop['pop_end_time']) != ""):?>value="<?php echo date('Y-m-d',$pop['pop_end_time']);?>"<?php endif;?> name="pop_end_time" id="pop_end_time">
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