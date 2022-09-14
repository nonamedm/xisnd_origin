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
                        <h5>설정</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('setting/update'); ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Title</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $setting->title; ?>" >
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                               <div class="form-group">
                                <label class="col-sm-2 control-label">Keyword</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="keyword" id="keyword" value="<?php echo $setting->keyword; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description</label>

                                <div class="col-sm-10">
									<textarea  class="form-control" name="description" id="description"><?php echo $setting->description; ?></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Language</label>

                                <div class="col-sm-10">
									<label class="checkbox-inline i-checks">
                                    <input type="radio" name="language" value="zh_CN" <?php echo $setting->language == 'zh_CN' ? 'checked' : '';  ?>> Chinese </label>
                                    <label class="checkbox-inline i-checks">
                                    <input type="radio" name="language" value="ko_KR" <?php echo $setting->language == 'ko_KR' ? 'checked' : '';  ?>> Korean </label>
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

          $("#admin_id").blur(function() {

                var admin_id = $("#admin_id").val();
	            htmlobj = $.ajax({
					url: "<?php echo site_url('admin/ajaxCheckAdmin'); ?>",
					type: "POST",
					async:false ,
					dataType: "json",
					data: {
						   admin_id:admin_id
						  }
				    });

                $("#verify").html(htmlobj.responseText);
                
            });
     });
</script>