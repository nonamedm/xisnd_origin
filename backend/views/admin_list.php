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
                        <h5>Management</h5>
						<a href="<?php echo site_url('admin/add'); ?>" style='float:right'>
                            <button type="button" class="btn btn-primary btn-xs">Create Administrator</button>
                        </a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Index</th>
									<th>Admin ID</th>
									<th>Nick Name</th>
                                    <th>Jurisdiction</th>
									<th>Create Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($admin_list as $v):?>
                                <tr>
                                    <td><?php echo $v['admin_index'];?></td>
									<td><?php echo $v['admin_id'];?></td>
                                    <td><?php echo $v['admin_nick_name'];?></td>
									<td>
                                        <?php if($v['admin_grade'] == 0):?>Administrator<?php endif;?>
                                        <?php if($v['admin_grade'] == 1):?>Editor<?php endif;?>
                                        <?php if($v['admin_grade'] == 2):?>채용 Editor<?php endif;?>
                                        <?php if($v['admin_grade'] == 3):?>공사 Editor<?php endif;?>
                                        <?php if($v['admin_grade'] == 4):?>분양 Editor<?php endif;?>
                                    </td>
                                    <td class="center"><?php echo date('Y-m-d',$v['admin_create_time']);?></td>
									<td class="center">
									<a href="<?php echo site_url('admin/edit/'.$v['admin_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> Edit</button></a>
                                    <a href="<?php echo site_url('admin/edit_pwd/'.$v['admin_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> Modify Password</button></a>
									<a href="<?php echo site_url('admin/remove/'.$v['admin_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> Delete</button></a>
									</td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <tr>
                                    <th>Index</th>
                                    <th>Admin ID</th>
                                    <th>Nick Name</th>
                                    <th>Jurisdiction</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
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