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
                            <h5> 분양안내 </h5>
                        </div>
                        <div class="ibox-content">
						<?php if($single_sell){?>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell_old/update'); ?>">
                            <input type="hidden" name="sell_index" value="<?php echo $single_sell['sell_index']?>">
						<?php }else{?>
							<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell_old/insert'); ?>">
						<?php }?>

							


                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">현장명</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="sell_title" id="sell_title" value="<?php echo $single_sell['sell_title']?>">
                                            </td>
                                        </tr>

										<tr>
                                            <td class="left">상황</td>
                                            <td>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="sell_type" value="0" checked>준비중</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="sell_type" value="1" <?php if($single_sell['sell_type'] == "1"):?>checked<?php endif;?>>예정</label>
												<label class="checkbox-inline i-checks">
                                                <input type="radio" name="sell_type" value="2" <?php if($single_sell['sell_type'] == "2"):?>checked<?php endif;?>>완료</label>
                                                <label class="checkbox-inline i-checks">
                                                <input type="radio" name="sell_type" value="3" <?php if($single_sell['sell_type'] == "3"):?>checked<?php endif;?>>분양중</label>
                                            </td>
                                        </tr>

										<tr>
                                            <td class="left">위치</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="sell_location" id="sell_location" value="<?php echo $single_sell['sell_location']?>">
                                            </td>
                                        </tr>

										<tr>
                                            <td class="left">규모</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="sell_generation" id="sell_generation" value="<?php echo $single_sell['sell_generation']?>">
                                            </td>
                                        </tr>

										<tr>
                                            <td class="left">분양일정</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="sell_inquiry" id="sell_inquiry" value="<?php echo $single_sell['sell_inquiry']?>">
                                            </td>
                                        </tr>

										<tr>
                                            <td class="left">링크</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="sell_link" id="sell_link" value="<?php echo $single_sell['sell_link']?>">
                                            </td>
                                        </tr>
										<?php if($single_sell['sell_file']):?>
										<tr>
                                            <td class="left">썸네일</td>
                                            <td><img src="<?php echo base_url();?><?php echo $single_sell['sell_file'];?>" >
											<input type="hidden" name="sell_file_bak" value="<?php echo $single_sell['sell_file'];?>">
                                            </td>
                                        </tr>
										<?php endif;?>
										<tr>
                                            <td class="left">썸네일 업로드</td>
                                            <td><input type="file" placeholder=""  name="sell_file" id="sell_file">
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
 