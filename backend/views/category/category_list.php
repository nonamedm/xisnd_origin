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
                        <h5>메뉴 카테고리</h5>
						<a href="<?php echo site_url('category/add'); ?>" style='float:right'>
						<?php if($this->session->admin_grade < 0): ?>
						<button type="button" class="btn btn-primary btn-xs">새 카테고리 추가</button>
						<?php endif; ?>
						</a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
							
                                    <th>인덱스</th>
                                    <th>카테고리 이름</th>
                                    <th>상위 카테고리</th>
									<th>카테고리 주소</th>
									<th>카테고리 템플릿</th>
									<th>순서</th>
                                    <th>노출여부</th>
                                    <th>작업</th>
                                </tr>
                            </thead>
                            <tbody>

							<?php  if(!empty($category_list)): $num=0; foreach($category_list as $v): $num++?>
                                <tr>
                                    <td><?php echo $num; //echo $v['category_index']; ?></td>
                                    <td>

									<!--
									<?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $v['level'])?><?php echo $v['category_name'];?>
									-->
									
									<?php
									for($i= $v['level'];$i > 0; $i--):
									    if($i == 1){
											echo "&nbsp;&nbsp;&nbsp;&nbsp;├ &nbsp;";
										}else{
											echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
										}
									endfor;
									echo $v['category_name'];
									?>
									
									</td>
                                    <td><?php echo $v['parent_name']; ?></td>
									<td><?php echo $v['category_url']; ?></td>
									<td class="center"><?php echo $v['category_template_name']; ?></td>
                                    <td class="center"><?php echo $v['category_sort']; ?></td>
                                    <td class="center"><?php echo $category_display[$v['category_display']]; ?></td>
									<td class="center">
									<a href="<?php echo site_url('Categorys/detail'.'/'.$v['category_index']); ?>"><button class="btn btn-success" type="button" ><i class="fa fa-paste"></i> 수정</button></a>
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
                                    <th>카테고리 이름</th>
                                    <th>상위 카테고리</th>
									<th>카테고리 주소</th>
									<th>카테고리 템플릿</th>
									<th>순서</th>
                                    <th>노출여부</th>
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