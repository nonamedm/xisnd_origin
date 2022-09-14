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
                        <h5>슬라이드 카태고리</h5>
						<a href="<?php echo site_url('category_slide/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">새 카태고리 추가</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인덱스</th>
                                    <th>카태고리 이름</th>
                                    <th>카태고리 너비</th>
                                    <th>카태고리 높이</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php foreach($category_slide_list as $v): ?>
                                <tr>
                                    <td><?php echo $v['category_slide_index']; ?></td>
                                    <td><a href="<?php echo site_url('slide/category_slide_list/'.$v['category_slide_index'])?>"><?php echo $v['category_slide_name']; ?></a></td>
                                    <td><?php echo $v['category_slide_width']; ?></td>
                                    <td><?php echo $v['category_slide_height']; ?></td>
                                    <td><?php echo date('Y-m-d',$v['category_slide_created_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('category_slide/edit'.'/'.$v['category_slide_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									<a href="<?php echo site_url('category_slide/remove'.'/'.$v['category_slide_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>인덱스</th>
                                    <th>카태고리 이름</th>
                                    <th>카태고리 너비</th>
                                    <th>카태고리 높이</th>
                                    <th>날짜</th>
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