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
                            <h5> 공사현장 </h5>
                        </div>
                        <div class="ibox-content">
						<?php if($single_year){?>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/update_year/'.$id['xi_article_index']); ?>">
                            <input type="hidden" name="xi_year_index" value="<?php echo @$single_year['xi_year_index']?>">
						<?php }else{?>
							<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('sell/insert_year/'.$id['xi_article_index']); ?>">
						<?php }?>

                                <table class="table table-bordered form_table">
                                    <tbody>
                                        <tr>
                                            <td class="left">제목</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_title" id="xi_year_title" value="<?php echo @$single_year['xi_year_title']?>" <?php if($this->session->admin_grade == 1):?>Readonly<?php endif;?>>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">전체공정률(%)</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_totle_percent" id="xi_year_totle_percent" value="<?php echo @$single_year['xi_year_totle_percent']?>">
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="left">건축공사(%)</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_colum2" id="xi_year_colum2" value="<?php echo @$single_year['xi_year_colum2']?>">
                                            </td>
                                        </tr>
                                    
                                        <tr>
                                            <td class="left">전기공사(%)</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_colum4" id="xi_year_colum4" value="<?php echo @$single_year['xi_year_colum4']?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">토목공사(%)</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_colum6" id="xi_year_colum6" value="<?php echo @$single_year['xi_year_colum6']?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">설비공사(%)</td>
                                            <td><input type="text" placeholder="" class="form-control my_form_input" name="xi_year_colum8" id="xi_year_colum8" value="<?php echo @$single_year['xi_year_colum8']?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">건축공사</td>
                                            <td><textarea class="form-control" rows="3" name="xi_year_colum1" id="xi_year_colum1" <?php if($this->session->admin_grade == 1):?>Readonly<?php endif;?>><?php echo @$single_year['xi_year_colum1']?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">전기공사</td>
                                            <td><textarea class="form-control" rows="3" name="xi_year_colum3" id="xi_year_colum3" <?php if($this->session->admin_grade == 1):?>Readonly<?php endif;?>><?php echo @$single_year['xi_year_colum3']?></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="left">토목공사</td>
                                            <td><textarea class="form-control" rows="3" name="xi_year_colum5" id="xi_year_colum5" <?php if($this->session->admin_grade == 1):?>Readonly<?php endif;?>><?php echo @$single_year['xi_year_colum5']?></textarea>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="left">설비공사</td>
                                            <td><textarea class="form-control" rows="3" name="xi_year_colum7" id="xi_year_colum7" <?php if($this->session->admin_grade == 1):?>Readonly<?php endif;?>><?php echo @$single_year['xi_year_colum7']?></textarea>

                                            
                                            </td>
                                        </tr>

                                        



                                        <tr>
                                            <td class="left"></td>
                                            <td>
                                                <input class="btn btn-primary" type="submit" name="submit" value="저장하기">
                                                <a href="<?php echo site_url('sell/year_list/'.$id['xi_article_index']);?>"><input class="btn btn-primary" type="button" name="button" value="목록"></a>
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
 