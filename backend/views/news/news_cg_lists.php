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
                        <h5 style="width:100%">New Category<a href="<?php echo site_url('form/categoryDetail'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-sm">New Category</button></a></h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
									<th>Index</th>
                                    <th>Category</th>
									<th>Name</th>
                                    <th>Display</th>
									<th>관리</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($news_cg_lists as $item):?>
                                <tr>
									<td><?php echo $item['news_cg_index'];?></td>
									<td><?php echo $category_value[$item['category_index']];?></td>
                                    <td><?php echo $item['news_cg_name'];?></td>
									<td><?php echo $this->enumvalue->y_n[$item['news_cg_display']];?></td>
									<td class="center">
									    <a href="<?php echo site_url('news/categoryDetail/'.$item['news_cg_index']); ?>">
                                            <button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 상세</button>
                                        </a>
									    <a href="<?php echo site_url('news/processCategory/remove/'.$item['news_cg_index']); ?>" >
                                            <button class="btn btn-danger " type="button"><i class="fa fa-times"></i> 삭제</button>
                                        </a>
									</td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
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