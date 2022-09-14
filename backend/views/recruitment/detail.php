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
                            <h5> 커뮤니티 </h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('article/'.$form_type); ?>/recruitment/lists/46">
                                <input type="hidden" name="category" value="">
                                <input type="hidden" name="article_index" value="">
                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">제목</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="article_name" id="article_name" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">분류</td>
                                            <td>
                                                <select class="form-control m-b" name="rec_cg_index" id="rec_cg_index">
                                                    <?php foreach($second_category as  $item): ?>
                                                        <option data-category ="<?php echo $item['category_index'] ?>"  value="<?php echo $item['rec_cg_index'];?>">
                                                            <?php echo $item['rec_cg_name'] ?>
                                                        </option>
                                                    <?php  endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">모집기간</td>
                                            <td >
                                            <div class="input-daterange input-group col-sm-5" id="datepicker">
                                                <input type="text" class="input-sm form-control" name="article_date_start" value="" >
                                                <span class="input-group-addon">~</span>
                                                <input type="text" class="input-sm form-control" name="article_date_end" value="">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">상단게시여부</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="0">NO</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_is_top" value="1">YES</label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">게시글 노출여부</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="1">YES</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="article_display" value="0">NO</label>
                                            </td>
                                        </tr>
                                    
                                        <tr>
                                            <td class="left">내용</td>
                                            <td>
                                                <script src="<?php echo base_url()?>resource/ckeditor/ckeditor.js"></script>
                                                <textarea name="article_content" id="article_content"><?php echo !empty($article->article_content) ? trim($article->article_content) : '';?></textarea>
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
                                            <td class="left">첨부파일1</td>
                                            <td>
                                                <input type="file"  name="article_attachment_1" id="article_attachment_1" >
                                                <br>
                                                <?php 
                                                    if( !empty( $article->article_attachment_1 ) )
                                                    {
                                                        ?>
                                                            <a href = "<?php echo  base_url().$article->article_attachment_1;?>" download="<?php echo $article->article_attachment_1_name;?>" >Download</a>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">첨부파일2</td>
                                            <td>
                                                <input type="file"  name="article_attachment_2" id="article_attachment_2" >
                                                <br>
                                                <?php 
                                                    if( !empty( $article->article_attachment_2 ) )
                                                    {
                                                        ?>
                                                            <a href = "<?php echo  base_url().$article->article_attachment_2;?>" download="<?php echo $article->article_attachment_2_name;?>" >Download</a>
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">첨부파일3</td>
                                            <td>
                                                <input type="file"  name="article_attachment_3" id="article_attachment_3" >
                                                <br>
                                                <?php 
                                                    if( !empty( $article->article_attachment_3 ) )
                                                    {
                                                        ?>
                                                            <a href = "<?php echo base_url().$article->article_attachment_3;?>" download="<?php echo $article->article_attachment_3_name;?>" >Download</a>
                                                        <?php
                                                    }
                                                ?>
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

    <!-- Data picker -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <link href="<?php echo base_url(); ?>resource/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">


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

	 <!-- <script src="<?php echo base_url(); ?>resource/admin/js/plugins/webuploader/webuploader.min.js"></script>
	 <script src="<?php echo base_url(); ?>resource/admin/js/demo/webuploader-demo.js"></script> -->

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

        categorySelect();

        init();

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
        _rec_cg_index   = '<?php echo !empty($article->rec_cg_index) ? $article->rec_cg_index : ""; ?>',
        _article_date_start = '<?php echo !empty($article->article_date_start) ? $article->article_date_start : date('Y-m-d'); ?>',
        _article_date_end   = '<?php echo !empty($article->article_date_end) ? $article->article_date_end : date('Y-m-d'); ?>',
        _rec_cg_index   = '<?php echo !empty($article->rec_cg_index) ? $article->rec_cg_index : ""; ?>',
        _article_is_top = '<?php echo isset( $article->article_is_top ) ? $article->article_is_top : 0 ; ?>',
        _article_display= '<?php echo isset( $article->article_display ) ? $article->article_display : 1 ; ?>',
        
        _news_cg_index  = '<?php echo !empty($article->news_cg_index) ? $article->news_cg_index : 0 ; ?>';
    
       
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
        if(  _rec_cg_index > 0 )
        {
            $('[name="rec_cg_index"]').val( _rec_cg_index );
        }
        if( !!_article_date_start )
        {
            $('[name="article_date_start"]').val( _article_date_start );
        }
        if( !!_article_date_end )
        {
            $('[name="article_date_end"]').val( _article_date_end );
        } 
        $('[name="article_name"]').val(_article_name);
        $('[name="category"]').val(_category_index);
        

        $('[name="article_is_top"][value="'+_article_is_top+'"]').attr('checked','checked');
        $('[name="article_is_top"][value="'+_article_is_top+'"]').parent().addClass('checked');

        $('[name="article_display"][value="'+_article_display+'"]').attr('checked','checked');
        $('[name="article_display"][value="'+_article_display+'"]').parent().addClass('checked');
    }

    function init()
    {
        $('#datepicker').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });
    }
    
    function categorySelect()
    {
        $('[name="category"]').val(  $("#rec_cg_index").find("option:selected").attr('data-category') );

        $("#rec_cg_index").on({
            'change':function(){
                $('[name="category"]').val(  $(this).find("option:selected").attr('data-category') );
            }
        });
    }

</script>