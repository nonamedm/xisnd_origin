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
                        <h5>Category Pop List</h5>
						<a href="<?php echo site_url('category_pop/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">Create New Category Pop</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Category Pop Index</th>
                                    <th>Category Pop Name</th>
                                    <th>Category Pop Url</th>
                                    <th>Created Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php foreach($category_pop_list as $v): ?>
                                <tr>
                                    <td><?php echo $v['category_pop_index']; ?></td>
                                    <td><a href="<?php echo site_url('pop/category_pop_list/'.$v['category_pop_index'])?>"><?php echo $v['category_pop_name']; ?></a></td>
                                    <td><?php echo $v['category_pop_url'];?></td>
                                    <td><?php echo date('Y-m-d',$v['category_pop_created_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('category_pop/edit'.'/'.$v['category_pop_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> EDIT</button></a>
									<a href="<?php echo site_url('category_pop/remove'.'/'.$v['category_pop_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> DELETE</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category Pop Index</th>
                                    <th>Category Pop Name</th>
                                    <th>Category Pop Url</th>
                                    <th>Created Time</th>
                                    <th>Action</th>
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