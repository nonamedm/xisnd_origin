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
                        <h5>팝업 관리</h5>
                    </div>
                    <div class="ibox-content">
                    <form id="article" name="article" method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('Pop/insert'); ?>">
                    
                        <table class="table table-bordered form_table">
                            <tbody> 
                                    <tr>
                                        <td class="left">팝업 이름</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="pop_title" id="pop_title">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">상단 여백 사이즈</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="top" id="top">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">왼쪽 여백 사이즈</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="left" id="left">
                                        </td>
                                    </tr>
									<tr>
                                        <td class="left">Pop LINK</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="pop_link" id="pop_link">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">공개여부</td>
                                        <td>
                                            <label class="checkbox-inline i-checks m-r-sm">
                                            <input type="radio" name="pop_option" value="1" checked style="margin-right: 5px;">공개</label>
                                        
                                            <label class="checkbox-inline i-checks m-r-sm">
                                            <input type="radio" name="pop_option" value="0" style="margin-right: 5px;">비공개</label>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">이미지 추가</td>
                                        <td>
                                            <input type="file" id="File" name="pop_img" class="my_form_input">
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                        <div style="text-align: right;">
                            <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo site_url('pop/pop_list');?>'">목록</button>
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
$this->load->view('include/footer');
?>
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>