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
                        <h5>회원정보</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('user/update'); ?>">

						   <input type="hidden" name="user_index" id="user_index" value="<?php echo $user->user_index; ?>" >

                            <div class="form-group">
                                <label class="col-sm-2 control-label">회원정보</label>
                                    <div class="col-sm-5 well">

                                        <dl class="dl-horizontal">
                                            <dt>아이디:</dt>
                                            <dd><?php echo $user->user_id; ?></dd>
                                            <dt>이름:</dt>
                                            <dd><?php echo $user->user_name; ?></dd>
                                            <dt>생일:</dt>
                                            <dd><?php echo $user->user_birthday; ?></dd>
                                            <dt>성별:</dt>
                                            <dd><?php echo $user_gender[$user->user_gender]; ?></dd>
                                            <dt>주소:</dt>
                                            <dd><?php echo $user->user_address; ?></dd>
                                            <dt>연락처:</dt>
                                            <dd><?php echo $user->user_contact; ?></dd>
                                            <dt>관심사:</dt>
                                            <dd><?php echo $user->user_concern; ?></dd>
                                            <dt>회원가입 날짜:</dt>
                                            <dd><?php echo date('Y-m-d',$user->user_register_time); ?></dd>
                                        </dl>

                            </div>

                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">회원 권한</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="user_authority" id="user_authority">
                                        <option value="0" <?php echo $user->user_authority == 0 ? 'selected' : '';  ?> ><?php echo $user_authority[0]; ?></option>
                                        <option value="1" <?php echo $user->user_authority == 1 ? 'selected' : '';  ?> ><?php echo $user_authority[1]; ?></option>
                                    </select>
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>

                       <div class="form-group">
                                <label class="col-sm-2 control-label">회원 상태</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="user_status" id="user_status">
                                        <option value="0" <?php echo $user->user_status == 0 ? 'selected' : '';  ?> ><?php echo $user_status[0]; ?></option>
                                        <option value="1" <?php echo $user->user_status == 1 ? 'selected' : '';  ?> ><?php echo $user_status[1]; ?></option>
                                    </select>
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="SAVE" >
                                </div>
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
$this->load->view('footer');
?>
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>

	<script src="<?php echo base_url(); ?>resource/admin/js/plugins/datapicker/bootstrap-datepicker.js"></script>
	 <link href="<?php echo base_url(); ?>resource/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function () {
			$('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });



            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
