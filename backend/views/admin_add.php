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
                        <h5>Create Administrators</h5>
                    </div>
                    <div class="ibox-content">
                        <form style="width: 100%;" method="post" class="form-horizontal " enctype="multipart/form-data" action="<?php echo site_url('admin/insert'); ?>">
                            <div class="junde_form_template">
                                <div class="form-group template_row">
                                    <label class="col-sm-2 control-label cell_left">Admin ID</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" name="admin_id" id="admin_id" >
                                        <span id="verify" style="color:red"></span>
                                    </div>
                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 control-label cell_left">Nick Name</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" name="admin_nick_name" id="admin_nick_name">
                                    </div>
                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 control-label cell_left">Password</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="password" class="form-control" name="admin_pwd" id="admin_pwd">
                                    </div>
                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 control-label cell_left">Jurisdiction</label>
                                    <div class="col-sm-10 cell_right">
                                        <select class="form-control m-b" name="admin_grade" id="admin_grade">
                                            <option value="4" data-type="">분양 Editor</option>
                                            <option value="3" data-type="">공사 Editor</option>
                                            <option value="2" data-type="">채용 Editor</option>
                                            <option value="1" data-type="">Editor</option>
                                            <option value="0" data-type="">Administrator</option>
                                            <?php if($this->session->admin_grade == -1):?>
                                                <option value="-1" data-type="">Super Admin</option>
                                            <?php endif;?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="submit_btn_block">

                                    <input class="btn btn-primary" style="padding:0 15px;" type="submit" name="submit" value="SAVE">

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