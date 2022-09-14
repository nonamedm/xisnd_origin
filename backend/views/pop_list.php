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
                        <h5>Pop List</h5>
						<a href="<?php echo site_url('pop/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">Create New Pop</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Pop Index</th>
                                    <th>Pop Name</th>
                                    <th>Category Pop Name</th>
									<th>Display</th>
                                    <th>Created Time</th>
                                    <th>Begin Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php 

                            foreach($pop_list as $v): 
                            $this->load->model('Category_Pop_model', 'category_pop');
                            $data['category_pop'] = $this->category_pop->select_category_pop($v['category_pop_index']);

                            ?>
                                <tr>
                                    <td><?php echo $v['pop_index']; ?></td>
                                    <td><?php echo $v['pop_name']; ?></td>
                                    <td>
                                        <?php if(!empty($data['category_pop'])):?>
                                        <?php foreach($data['category_pop'] as $vv):?>
                                        <?php echo $vv['category_pop_name']; ?>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </td>
                                    <td class="center">
                                        <?php if($v['pop_option'] == 0): ?>No<?php endif;?>
                                        <?php if($v['pop_option'] == 1): ?>Yes<?php endif;?>
                                    </td>
									<td><?php echo date('Y-m-d',$v['pop_created_time']); ?></td>
                                    <td><?php echo date('Y-m-d',$v['pop_begin_time']); ?></td>
                                    <td><?php echo date('Y-m-d',$v['pop_end_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('pop/edit'.'/'.$v['pop_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> EDIT</button></a>
									<a href="<?php echo site_url('pop/remove'.'/'.$v['pop_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> DELETE</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Pop Index</th>
                                    <th>Pop Name</th>
                                    <th>Category Pop Name</th>
                                    <th>Display</th>
                                    <th>Created Time</th>
                                    <th>Begin Time</th>
                                    <th>End Time</th>
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