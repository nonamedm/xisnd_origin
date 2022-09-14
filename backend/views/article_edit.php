<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
    
<style>
.lightBoxGallery img {
    margin: 5px;
    width: 120px;
}

.hover_delete > .file-panel {
    position: absolute;
	text-align:center;
    width: 20px;
	height:20px;
    top: -20px;
    right: 0;
	background-color:rgba(0,0,0,0.7);
    z-index: 9099990;
}
.hover_delete:hover .file-panel{
top:0px;
}
</style>
    <!--右侧部分开始-->
<div id="page-wrapper">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>편집</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('article/update'); ?>">
						    <input type="hidden" name="article_index" id="article_index"  value="<?php echo $article->article_index; ?>" >
                            <input type="hidden" id="crop_thumbnail" name="article_cover" value="<?php echo $article->article_cover; ?>">
                            <table class="table table-bordered form_table" >
                                <tbody>
                                    <tr>
                                        <td class="left">제목</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_name" id="article_name" value="<?php echo $article->article_name; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">분류</td>
                                        <td>
                                            <select class="form-control m-b" name="category" id="category">
                                                <option value="0">없음</option>
                                                <?php 
                                                foreach($category_list as $v): 
                                                if($v['category_template_module'] != 'page'):
                                                ?>
                                                <option value="<?php echo $v['category_index']; ?>"  <?php echo $v['category_index'] == $article->category_index ? 'selected' : '';  ?> ><?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $v['level']).$v['category_name']?></option>
                                                <?php 
                                                endif;
                                                endforeach; 
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">Second Name</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_second_name" id="article_second_name" value="<?php echo $article->article_second_name; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">작성자</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_author" id="article_author" value="<?php echo $article->article_author; ?>">
                                        </td>
                                    </tr>
                                    
                                    
                                    <?php  if(!empty($article_image)): ?>

                                    <tr>
                                        <td class="left">업로드된 이미지</td>
                                        <td>
                                            <div class="lightBoxGallery" id="delete_img_ajax">
                                                <?php foreach($article_image as $v): ?>                            
                                                    <a class="hover_delete" style="position:relative; float:left; overflow:hidden;">
                                                        <img data-image-index="<?php echo $v['article_image_index']; ?>"  data-article-index="<?php echo $article->article_index; ?>" src="<?php echo base_url().$v['article_image_url']; ?>">
                                                        <p class="file-panel"><i class="fa fa-times" style="color:#fff;"></i></p>
                                                    </a>
                                                <?php endforeach; ?>

                                                <script src="<?php echo base_url(); ?>resource/admin/js/jquery.min.js?v=2.1.4"></script>
                                    
                                                <script>

                                                $(document).ready(function () {
                                                    $(".hover_delete .file-panel").on("click",function(){

                                                        var confirm_true=confirm("지우시겠습니까?");

                                                        if (confirm_true==true)
                                                        {
                                                            var data_image_index = $(this).parent().find("img").attr("data-image-index");
                                                            var data_article_index = $(this).parent().find("img").attr("data-article-index");

                                                            htmlobj = $.ajax({
                                                            url:"<?php echo site_url('article/ajaxRemoveImage'); ?>",
                                                            type: "POST",
                                                            async:false ,
                                                            dataType: "json",
                                                            data: {
                                                                article_image_index:data_image_index,
                                                                article_index:data_article_index
                                                                }
                                                            });

                                                            $("#delete_img_ajax").html(htmlobj.responseText);
                                                        }
                                                        else
                                                        {
                                                                
                                                        }
                                                            
                                                    });
                                                });
                                            </script>
                                            
                                            </div>
                                        </td>
                                    </tr>

                                    <?php endif; ?>
                                    <tr>
                                        <td class="left">썸네일이미지</td>
                                        <td>
                                            <div id="img_url"></div>
                                            <div id="uploader" class="wu-example">
                                                <div class="queueList">
                                                    <div id="dndArea" class="placeholder">
                                                        <div id="filePicker"></div>
                                                        <p>이미지 업로드</p>
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
                                        <td class="left">상단게시여부</td>
                                        <td>
                                            <div class="col-sm-10">
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="0" <?php echo $article->article_is_top == 0 ? 'checked' : '';  ?>>NO</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="1" <?php echo $article->article_is_top == 1 ? 'checked' : '';  ?>>YES</label>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="left">게시글 노출여부</td>
                                        <td>
                                            <div class="col-sm-10">
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="1" <?php echo $article->article_display == 1 ? 'checked' : '';  ?>>YES</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="0" <?php echo $article->article_display == 0 ? 'checked' : '';  ?>>NO</label>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">
                                            Cover<span>*</span><br>
                                            ( 500 * 500 픽셀 )
                                            
                                        </td>
                                        <td class="seller_select" >
                                            <div  id="crop-avatar">
                                                <div class="clearfix"></div>
                                                <div class="table_upload_img avatar-view" style="width:250px; height:250px;">
                                                    <img src="<?php echo !empty($article->article_cover) ? base_url().$article->article_cover : '/resource/admin/images/my_page_header_img.jpg'; ?>" width="250" height="250"data-width="250" data-height="250" data-element-id="crop_thumbnail" >
                                                </div>
                                                <div class="clearfix" style="margin-bottom:8px;"></div>

                                                <br/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">Time slot</td>
                                        <td>
                                            <input class="col-sm-3" type="text" class="form-control" name="article_date_start" id="article_date_start" value="<?php echo $article->article_date_start; ?>" >
                                            <span  class="col-sm-1" style="text-align:center;">~</span>
                                            <input class="col-sm-3" type="text" class="form-control" name="article_date_end" id="article_date_end" value="<?php echo $article->article_date_end; ?>" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">Article password</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_password" id="article_password" value="<?php echo $article->article_password; ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">Article Media Url</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_media_url" id="article_media_url" value="<?php echo $article->article_media_url; ?>">
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="left">Article Hits</td>
                                        <td>
                                            <input type="text" class="form-control" name="article_hits" id="article_hits" value="<?php echo $article->article_hits; ?>">
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="left">본문 내용</td>
                                        <td>
                                            <script src="<?php echo base_url()?>resource/ckeditor/ckeditor.js"></script>
                                            <textarea name="article_content" id="article_content"><?php echo $article->article_content;  ?></textarea>
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
                                            <input type="file"  name="article_file" id="article_file" >
                                            <br>
                                            <?php 
                                                if( !empty( $article->article_content ) )
                                                {
                                                    ?>
                                                        <a href = "<?php echo $article->article_file;?>" download="Article File" >Download</a>
                                                    <?php
                                                }
                                            ?>
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
	<!-- blueimp gallery -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

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