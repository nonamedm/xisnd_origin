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
                        <h5>Administrators</h5>
                    </div>
                    <div class="ibox-content">
                        <form style="width: 100%;" method="post" class="form-horizontal " enctype="multipart/form-data" action="<?php echo site_url('admin/update'); ?>">
                            <div class="junde_form_template">
                                <input type="hidden" class="form-control" value="<?php echo $admin['admin_index']?>" name="admin_index" id="admin_index">
                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Admin ID</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" value="<?php echo $admin['admin_id']?>" name="admin_id" id="admin_id">
                                    </div>
                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Nick Name</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" value="<?php echo $admin['admin_nick_name']?>" name="admin_nick_name" id="admin_nick_name">
                                    </div>
                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Jurisdiction</label>

                                    <div class="col-sm-10 cell_right">
                                        <select class="form-control m-b" name="admin_grade" id="admin_grade">
                                            <option value="4" <?php if($admin['admin_grade'] == 4):?>selected<?php endif;?>  data-type="">분양 Editor</option>
                                            <option value="3" <?php if($admin['admin_grade'] == 3):?>selected<?php endif;?>  data-type="">공사 Editor</option>
                                            <option value="2" <?php if($admin['admin_grade'] == 2):?>selected<?php endif;?>  data-type="">채용 Editor</option>
                                            <option value="1" <?php if($admin['admin_grade'] == 1):?>selected<?php endif;?> data-type="">Editor</option>
                                            <option value="0" <?php if($admin['admin_grade'] == 0):?>selected<?php endif;?> data-type="">Administrator</option>
                                            <?php
                                            if($this->session->admin_grade == -1):
                                                ?>
                                                <option value="-1" <?php if($admin['admin_grade'] == -1):?>selected<?php endif;?> data-type="">Super Admin</option>
                                                <?php
                                            endif;
                                            ?>

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
    <!-- Web Uploader -->

    <script type="text/javascript">
        var BASE_URL = '<?php echo base_url(); ?>resource/admin/js/plugins/webuploader';
        var UPLOAD_URL = '<?php echo site_url("article/webuploader"); ?>';
    </script>

     <script src="<?php echo base_url(); ?>resource/admin/js/plugins/webuploader/webuploader.min.js"></script>
     <script src="<?php echo base_url(); ?>resource/admin/js/demo/webuploader-demo.js"></script>