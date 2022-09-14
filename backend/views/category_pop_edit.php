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
                        <h5>Edit Category Pop</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('category_pop/update'); ?>">
                            <input type="hidden" class="form-control" value="<?php echo $category_pop['category_pop_index']?>" name="category_pop_index" id="category_pop_index">
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Pop Name</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $category_pop['category_pop_name']?>" name="category_pop_name" id="category_pop_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Category Pop Url</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $category_pop['category_pop_url']?>"  name="category_pop_url" id="category_pop_url">
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
