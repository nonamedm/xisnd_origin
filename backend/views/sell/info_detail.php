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
                            <h5> 평형정보 </h5>
                        </div>
                        <div class="ibox-content">
						<?php if($single_info){?>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/update_info/'.$id['xi_article_index']); ?>">
                            <input type="hidden" name="xi_article_info_index" value="<?php echo $single_info['xi_article_info_index']?>">
						<?php }else{?>
							<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/insert_info/'.$id['xi_article_index']); ?>">
						<?php }?>

                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">제목</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_article_info_title" id="xi_article_info_title" value="<?php echo @$single_info['xi_article_info_title']?>">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">내용</td>
                                            <td>
                                                <script src="<?php echo base_url()?>resource/ckeditor/ckeditor.js"></script>
                                                <textarea name="xi_article_info_content" id="article_content"><?php echo @$single_info['xi_article_info_content']?></textarea>
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
                                                <input class="btn btn-primary" type="submit" name="submit" value="저장하기">
                                                <a href="<?php echo site_url('sell/info_list/'.$id['xi_article_index']);?>"><input class="btn btn-primary" type="button" name="button" value="목록"></a>
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
        window.url_list = {

            editor_url : '<?php echo base_url(); ?>resource/ckeditor/',

            update_images : '<?php echo site_url('article/uploadContentImage');?>',

            upload_file_url : '<?php echo base_url()?>uploads/article/'

        };
    </script>
    <script>
        $(document).ready(function () {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
 