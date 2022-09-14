<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>
        <!--右侧部分开始-->
        <div id="page-wrapper">
<!-- data table begin-->
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>분류 목록</h5>
						<a href="<?php echo site_url('category_slide/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">새 분류 추가</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th style="display:none"></th>
                                    <th style="display:none"></th> 
                                    <th>분류</th>
                                    <th style="display:none"></th>
                                    <th style="display:none">Category Slide width</th>
                                    <th style="display:none">Category Slide height</th>
                                    <th>날짜</th>
                                    <th>관리</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php foreach($category_slide_list as $v): ?>
                                <tr>
                                    <td style="display:none"></td>
                                    <td style="display:none"></td>
                                    <td><a href="<?php echo site_url('slide/category_slide_list/'.$v['category_slide_index'])?>"><?php echo $v['category_slide_name']; ?></a></td>
                                    <td style="display:none"></td>
                                    <td style="display:none"></td>
                                    <td style="display:none"></td>
                                    <td><?php echo date('Y-m-d',$v['category_slide_created_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('category_slide/edit'.'/'.$v['category_slide_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									<a href="<?php echo site_url('category_slide/remove'.'/'.$v['category_slide_index']); ?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 삭제</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="display:none"></th>
                                    <th style="display:none"></th> 
                                    <th>분류</th>
                                    <th style="display:none"></th>
                                    <th style="display:none">Category Slide width</th>
                                    <th style="display:none">Category Slide height</th>
                                    <th>날짜</th>
                                    <th>관리</th>
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
$this->load->view('include/footer');
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