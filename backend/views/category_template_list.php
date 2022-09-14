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
                        <h5>Category Template</h5>
						<a href="<?php echo site_url('category_template/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">Create New Category 
						Template</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Category Template Index</th>
                                    <th>Category Template Name</th>
									<th>Category Template Module</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php 
							if(!empty($category_template_list)):
							    foreach($category_template_list as $v): 
							?>
                                <tr>
                                    <td><?php echo $v['category_template_index']; ?></td>
                                    <td><?php echo $v['category_template_name']; ?></td>
                                    <td><?php echo $v['category_template_module']; ?></td>
									<td class="center">
									<a href="<?php echo site_url('category_template/edit'.'/'.$v['category_template_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> EDIT</button></a>
									<a href="<?php echo site_url('category_template/remove'.'/'.$v['category_template_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> DELETE</button></a>
									</td>

                                </tr>
                            <?php 
							    endforeach;
							endif;
							?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Category Template Index</th>
                                    <th>Category Template Name</th>
									<th>Category Template Module</th>
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