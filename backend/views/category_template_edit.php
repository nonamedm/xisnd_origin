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
                        <h5>Create New Category Template</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('category_template/update'); ?>">

                        <input type="hidden" name="category_template_index" id="category_template_index" value="<?php echo $template->category_template_index; ?>" >

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Template Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_template_name" id="category_template_name" value="<?php echo $template->category_template_name; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Template Module</label>
                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_template_module" id="category_template_module">
                                        <option value="article" <?php echo $template->category_template_module == "article" ? 'selected' : '';  ?>>Article</option>
										<option value="gallery" <?php echo $template->category_template_module == "gallery" ? 'selected' : '';  ?>>Gallery</option>
										<option value="video" <?php echo $template->category_template_module == "video" ? 'selected' : '';  ?>>Video</option>
										<option value="board" <?php echo $template->category_template_module == "board" ? 'selected' : '';  ?>>Board</option>
										<option value="page" <?php echo $template->category_template_module == "page" ? 'selected' : '';  ?>>Page</option>
                                    </select>
                                </div>
                            </div>

							<div class="hr-line-dashed"></div>


                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="SAVE" >
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
