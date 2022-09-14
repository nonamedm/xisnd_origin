<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
        <!--右侧部分开始-->
        <div id="page-wrapper">
<!-- data table begin-->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>회원 목록</h5>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
							
                                    <th>인덱스</th>
                                    <th>아이디</th>
                                    <th>이름</th>
									<th>성별</th>
									<th>권한</th>
									<th>상태</th>
                                    <th>작업</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							if(!empty($user_list)):
							    foreach($user_list as $v): 
							?>
                                <tr>
                                    <td><?php echo $v['user_index']; ?></td>
                                    <td><?php echo $v['user_id']; ?></td>
                                    <td><?php echo $v['user_name']; ?></td>
									<td><?php echo $user_gender[$v['user_gender']]; ?></td>
									<td class="center"><?php echo $user_authority[$v['user_authority']]; ?></td>
                                    <td class="center"><?php echo $user_status[$v['user_status']]; ?></td>
									<td class="center">
									<a href="<?php echo site_url('user/edit'.'/'.$v['user_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 상세정보</button></a>
									<a href="<?php echo site_url('user/remove'.'/'.$v['user_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
									</td>
                                </tr>
                            <?php 
							    endforeach;
							endif;
							?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>인덱스</th>
                                    <th>아이디</th>
                                    <th>이름</th>
									<th>성별</th>
									<th>권한</th>
									<th>상태</th>
                                    <th>작업</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
  
    </div>
<!-- data table end -->

        </div>
        <!--右侧部分结束-->
    </div>
<?php
$this->load->view('footer');
?>
  <!-- 全局 js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
			/* Init DataTables */
            $('.dataTables-example').dataTable();

        });

    </script>