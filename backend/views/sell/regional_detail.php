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
                            <h5> 지역설정 </h5>
                        </div>
                        <div class="ibox-content">
						<?php if($single_regional){?>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/update_regional'); ?>">
                            <input type="hidden" name="xi_article_category_index" value="<?php echo $single_regional['xi_article_category_index']?>">
						<?php }else{?>
							<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/insert_regional'); ?>">
						<?php }?>

                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">지역</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_article_category_name" id="xi_article_category_name" value="<?php echo $single_regional['xi_article_category_name']?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"></td>
                                            <td>
                                                <input class="btn btn-primary" type="submit" name="submit" value="저장하기">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
 