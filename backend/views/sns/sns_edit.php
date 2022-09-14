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
                        <h5>SNS Edit</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sns/process/sns_modify'); ?>">
                            <div class="junde_form_template">
                                <input type="hidden" name="article_index" id="article_index"  value="<?php echo $article->article_index; ?>" >
                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Title</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" name="article_name" id="article_name" value="<?php echo $article->article_name; ?>">
                                    </div>
                                </div>

                                <input type="hidden" name="category" value="104" >
                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Category</label>

                                    <div class="col-sm-10 cell_right">
                                        <select class="form-control m-b" name="sns_cg" id="sns_cg">
                                            <?php foreach($sns_category as  $item): ?>
                                                <option value="<?php echo $item['sns_cg_index']; ?>"  >
                                                    <?php echo $item['sns_cg_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Top</label>

                                    <div class="col-sm-10 cell_right">
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="article_is_top" value="0" <?php echo $article->article_is_top == 0 ? 'checked' : '';  ?>>NO</label>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="article_is_top" value="1" <?php echo $article->article_is_top == 1 ? 'checked' : '';  ?>>YES</label>
                                    </div>

                                </div>

                                <div class="form-group template_row">
                                    <label class="col-sm-2 cell_left control-label">Display</label>

                                    <div class="col-sm-10 cell_right">
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="article_display" value="1" <?php echo $article->article_display == 1 ? 'checked' : '';  ?>>YES</label>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="article_display" value="0" <?php echo $article->article_display == 0 ? 'checked' : '';  ?>>NO</label>
                                    </div>

                                </div>

                                <div class="form-group template_row" >
                                    <label class="col-sm-2 cell_left control-label">Jump url</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" name="article_media_url" id="article_media_url" value="<?php echo $article->article_media_url; ?>">
                                    </div>
                                </div>


                                <input type="hidden" id="crop_thumbnail" name="article_cover" value="<?php echo $article->article_cover; ?>">

                                <div class="form-group template_row seller_select">

                                    <label class="col-sm-2 cell_left control-label">
                                        Cover<span>*</span><br>
                                        ( <?php echo $aspect_width; ?> * <?php echo $aspect_height; ?> px )
                                    </label>
                                    <div class="col-sm-10 cell_right" id="crop-avatar">

                                        <div class="clearfix"></div>
                                        <div class="table_upload_img avatar-view" style="width:<?php echo $aspect_width/2; ?>px; height:<?php echo $aspect_height/2; ?>px;">
                                            <img src="<?php echo !empty($article->article_cover) ? base_url().$article->article_cover : '/resource/admin/images/my_page_header_img.jpg'; ?>" width="<?php echo $aspect_width/2; ?>" height="<?php echo $aspect_height/2; ?>" data-width="<?php echo $aspect_width; ?>" data-height="<?php echo $aspect_height; ?>" data-element-id="crop_thumbnail">
                                        </div>
                                        <div class="clearfix" style="margin-bottom:8px;"></div>

                                        <br/>
                                    </div>
                                </div>



                                <div class="form-group template_row" >
                                    <label class="col-sm-2 cell_left control-label">Title</label>

                                    <div class="col-sm-10 cell_right">
                                        <input type="text" class="form-control" name="article_second_name" id="article_second_name" value="<?php echo $article->article_second_name; ?>">
                                    </div>
                                </div>


                                <div class="form-group template_row" >
                                    <label class="col-sm-2 cell_left control-label">Content</label>
                                    <div class="col-sm-10 cell_right">
                                        <textarea style="min-height: 200px" name="article_description" id="article_description" class="form-control"><?php echo $article->article_description; ?></textarea>
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
</div>
<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="avatar-form" action="<?php echo site_url('crop/resizeImage'); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="avatar-modal-label">사진</h4>
                </div>
                <div class="modal-body">
                    <div class="avatar-body">
                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                            <input type="hidden" class="avatar-src" name="avatar_src">
                            <input type="hidden" class="avatar-data" name="avatar_data">
                            <input type="hidden" id="aspect_width"  name="aspect_width" value="">
                            <input type="hidden" id="aspect_height"  name="aspect_height" value="">
                            <label for="avatarInput">업로드</label>
                            <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                        </div>
                        <!-- Crop and preview -->
                        <div class="row">
                            <div class="col-md-9">
                                <div class="avatar-wrapper"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="avatar-preview preview-lg"></div>
                                <div class="avatar-preview preview-md"></div>
                                <div class="avatar-preview preview-sm"></div>
                            </div>
                        </div>
                        <div class="row avatar-btns">
                            <div class="col-md-9">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">좌회전</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">우회전</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-block avatar-save">저장</button>
                            </div>
                        </div>
                    </div>
            </form>
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
    var _sns_cg_val = '<?php echo $article->sns_cg_index; ?>';

    $(document).ready(function () {

        $(".Article_password").hide();

        $("#category").change(function(){

            var type = $("#category option:selected").attr("data-type");

            if(type == "board"){
                $(".Article_password").show();
            }else{
                $(".Article_password").hide();
                $("#Article_password").val("");
            }

        });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $('[name="sns_cg"]').val( _sns_cg_val );
    });
</script>


<script src="<?php echo base_url(); ?>resource/admin/js/cropper.min.js"></script>
<script src="<?php echo base_url(); ?>resource/admin/js/crop_avatar_one_main.js"></script>
<link href="<?php echo base_url(); ?>resource/admin/css/cropper.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>resource/admin/css/cropper.min.css" rel="stylesheet">


<script>
    var aspect_width = <?php echo $aspect_width; ?>;
    var aspect_height = <?php echo $aspect_height; ?>;
    var element_id = 'crop_thumbnail';

    $(window).load(function (){
        var user_type = $("#user_type").val();
        if(user_type==0){

            $("#copy_click").show();
            $("#remove_click").show();
            $("#remove_click").trigger("click");
            $("#certificate").val("");

        }else{
            $("#copy_click").hide();
            $("#remove_click").hide();
            $("#certificate").val("1");
            $("#copy_click").trigger("click");
        }

    });

    $(document).ready(function () {

        /* $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        }); */


        $("#copy_click").click(function(){
            $("#user_type").val(1);
            $(".seller_select").show();
            $("#upload_img").val("").removeClass("ignore");
            $("#certificate").val("").removeClass("ignore");
            $("#is_certificate").val("").removeClass("ignore");
            $("#seller_user_shop").val("").removeClass("ignore");
            $("#seller_intro").val("").removeClass("ignore");

        });
        $("#remove_click").click(function(){
            $("#user_type").val(0);
            $(".seller_select").hide();
            $("#upload_img").val("").addClass("ignore");
            $("#is_certificate").val("").addClass("ignore");
            $("#certificate").val("").addClass("ignore");
            $("#seller_user_shop").val("").addClass("ignore");
            $("#seller_intro").val("").addClass("ignore");
        });

    });


</script>