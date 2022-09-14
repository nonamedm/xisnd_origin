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
                            <h5><?php echo $materials_title ?></h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('article/'.$form_type); ?>/<?php echo $form_url_1.'/'.$form_url_2.'/'.$category_index_v ?>">
                                <input type="hidden" name="category" value="<?php echo !empty( $category_index_v ) ? $category_index_v : ''; ?>">
                                <input type="hidden" name="article_index" value="">
                                <input type="hidden" id="crop_thumbnail" name="article_cover" value="">
                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">제목 article_title</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="article_name" id="article_name" value="">
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
                                            <td class="left">
                                                Cover<span>*</span><br>
                                                ( 500 * 500 픽셀 )
                                                
                                            </td>
                                            <td class="seller_select" >
                                                <div  id="crop-avatar">
                                                    <div class="clearfix"></div>
                                                    <div class="table_upload_img avatar-view" style="width:<?php echo $aspect_width/2 ?>px; height:<?php echo $aspect_height/2 ?>px;">
                                                        <img src="<?php echo !empty($article->article_cover) ? base_url().$article->article_cover : '/resource/admin/images/my_page_header_img.jpg'; ?>" width="<?php echo $aspect_width/2 ?>" height="<?php echo $aspect_height/2 ?>"data-width="<?php echo $aspect_width ?>" data-height="<?php echo $aspect_height ?>" data-element-id="crop_thumbnail" >
                                                    </div>
                                                    <div class="clearfix" style="margin-bottom:8px;"></div>

                                                    <br/>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">상단게시여부 article_is_top</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="0">NO</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="1">YES</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">게시글 노출여부 article_display</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="1">YES</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="0">NO</label>
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

        dataInit();


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

    var _article_index  = '<?php echo !empty($article->article_index) ? $article->article_index : ""; ?>',
        _article_name   = '<?php echo !empty($article->article_name) ? $article->article_name : ""; ?>',
        _category_index = '<?php echo !empty($article->category_index) ? $article->category_index : ""; ?>',
        _article_cover  = '<?php echo !empty($article->article_cover) ? $article->article_cover : ""; ?>',
        
       //_news_cg_index  = '<?php echo !empty($article->news_cg_index) ? $article->news_cg_index : ""; ?>',
        _article_is_top = '<?php echo isset( $article->article_is_top ) ? $article->article_is_top : 0 ; ?>',
        _article_display= '<?php echo isset( $article->article_display ) ? $article->article_display : 1 ; ?>',
        //_article_media_url  = '<?php echo !empty($article->article_media_url) ? $article->article_media_url : ''; ?>';
        //_news_cg_index  = '<?php echo !empty($article->news_cg_index) ? $article->news_cg_index : 0 ; ?>',
        _article_content= "<?php echo !empty($article->article_content) ? trim($article->article_content) : '';?>";
    function dataInit()
    {
        if( !!_article_index )
        {
            $('[name="article_index"]').val(_article_index);
        }
        if( !!_category_index )
        {
            $('[name="category"]').val(_category_index);
        }
        
        $('[name="article_name"]').val(_article_name);

        if( !!_article_cover )
        {
            $('[name="article_cover"]').val(_article_cover);
        }
        if( !!_article_content )
        {
            $('[name="article_content"]').val(_article_content);
        }
        //$('[name="article_media_url"]').val(_article_media_url);
        //$('[name="news_cg_index"]').val(_news_cg_index);
        //$('[name="article_content"]').val(_article_content);

        $('[name="article_is_top"][value="'+_article_is_top+'"]').attr('checked','checked');
        $('[name="article_is_top"][value="'+_article_is_top+'"]').parent().addClass('checked');

        $('[name="article_display"][value="'+_article_display+'"]').attr('checked','checked');
        $('[name="article_display"][value="'+_article_display+'"]').parent().addClass('checked');
    }

</script>