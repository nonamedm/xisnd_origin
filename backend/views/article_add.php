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
                            <h5>새 글 쓰기</h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('article/insert'); ?>">
                                <input type="hidden" id="crop_thumbnail" name="article_cover" value=">">
                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">제목 article_title</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="article_name" id="article_name" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">분류 category</td>
                                            <td>
                                                <select class="form-control m-b" name="category" id="category">
                                                    
                                                    <option value="0" data-type="0">없음</option>
                                                    
                                                    <?php foreach($category_list as $v): if($v['category_template_module'] != 'page'): ?>
                                                        <option value="<?php echo $v['category_index']; ?>" data-type="<?php echo $v['category_template_module']; ?>">
                                                            <?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $v['level']).$v['category_name']?>
                                                        </option>
                                                    <?php endif; endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">Second Name article_second_name</td>
                                            <td>
                                            <input type="text" placeholder="" class="form-control my_form_input" name="article_second_name" id="article_second_name" value="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">작성자 article_author</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="article_author" id="article_author" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">썸네일이미지</td>
                                            <td>
                                                <div id="img_url"></div>
                                                <div id="uploader" class="wu-example">
                                                    <div class="queueList">
                                                        <div id="dndArea" class="placeholder">
                                                            <div id="filePicker"></div>
                                                            <p>미이지 업로드</p>
                                                        </div>
                                                    </div>
                                                    <div class="statusBar" style="display:none;">
                                                        <div class="progress">
                                                            <span class="text">0%</span>
                                                            <span class="percentage"></span>
                                                        </div>
                                                        <div class="info"></div>
                                                        <div class="btns">
                                                            <div id="filePicker2"></div>
                                                            <div class="uploadBtn">업로드</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">상단게시여부 article_is_top</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="0" checked>NO</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="1">YES</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">게시글 노출여부 article_display</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="1" checked>YES</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="0">NO</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                Cover<span>*</span><br>
                                                ( 500 * 500 픽셀 )
                                            </td>
                                            <td class="seller_select">
                                                <div id="crop-avatar">
                                                    <div class="clearfix"></div>
                                                    <div class="table_upload_img avatar-view" style="width:250px; height:250px;">
                                                        <img src="<?php echo !empty($article->article_cover) ? base_url().$article->article_cover : '/resource/admin/images/my_page_header_img.jpg'; ?>" width="250" height="250"data-width="500" data-height="500" data-element-id="crop_thumbnail" >
                                                    </div>
                                                    <div class="clearfix" style="margin-bottom:8px;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Time slot </td>
                                            <td>
                                                <input class="col-sm-3" type="text" class="form-control" name="article_date_start" id="article_date_start" value="" >
                                                <span  class="col-sm-1" style="text-align:center;">~</span>
                                                <input class="col-sm-3" type="text" class="form-control" name="article_date_end" id="article_date_end" value="" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Article Password</td>
                                            <td>
                                                <input type="text" class="form-control" name="article_password" id="article_password" >
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">Article Media Url</td>
                                            <td>
                                                <input type="text" class="form-control" name="article_media_url" id="article_media_url">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Article Hits</td>
                                            <td>
                                                <input type="text" class="form-control" name="article_hits" id="article_hits" value="0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Article Description </td>
                                            <td>
                                                <input type="text" class="form-control" name="article_description" id="article_description" value="">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">Article Content </td>
                                            <td>
                                                <script src="<?php echo base_url()?>resource/ckeditor/ckeditor.js"></script>
                                                <textarea name="article_content" id="article_content"></textarea>
                                                <script>
                                                    var editor_parents = document.getElementById( 'article_content' );

                                                    CKEDITOR.replace( 'article_content', {
                                                        language: 'ko-kr',
                                                        toolbar : 'MyConfig',
                                                        }).on( 'blur' , function(){
                                                        $( editor_parents ).val( CKEDITOR.instances[ 'article_content' ].getData() ).change();
                                                    } );
                                                </script>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">Article File </td>
                                            <td>
                                                <input type="file"  name="article_file" id="article_file" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left"></td>
                                            <td>
                                                <input class="btn btn-primary" type="submit" name="submit" value="SAVE">
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
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="avatar-form" action="<?php echo site_url('Crop/resizeImage'); ?>" enctype="multipart/form-data" method="post" >
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
                                <input type="hidden"  name="aspect_width" value="<?php echo $aspect_width; ?>">
                                <input type="hidden"  name="aspect_height" value="<?php echo $aspect_height; ?>">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div> -->
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
        window.url_list = {

            editor_url : '<?php echo base_url(); ?>resource/ckeditor/',

            update_images : '<?php echo site_url('article/uploadContentImage');?>',

            upload_file_url : '<?php echo base_url()?>uploads/article/'

        };
</script>
    <script>
        $(document).ready(function () {
			
		    /* $(".Article_password").hide();
                      
		    $("#category").change(function(){

                  var type = $("#category option:selected").attr("data-type");  

				  if(type == "board"){
					  $(".Article_password").show();
				  }else{
					  $(".Article_password").hide();
					  $("#Article_password").val("");  
				  }

            }); */

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

  <script src="<?php echo base_url(); ?>resource/admin/js/crop/cropper.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/crop/crop_avatar_one_main.js"></script>
    <link href="<?php echo base_url(); ?>resource/admin/css/crop/cropper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/crop/cropper.min.css" rel="stylesheet">


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