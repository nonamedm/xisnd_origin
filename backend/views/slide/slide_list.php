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
                        <h5>스라이드 목록</h5>
						<a href="<?php echo site_url('slide/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">새 스라이드 추가</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th style="display:none">인덱스</th>
                                    <th>스라이드 이름</th>
                                    <th>스라이드 이미지</th>
                                    <th>순서</th>
                                    <th>카태고리</th>
									<th>노출여부</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php 

                            foreach($slide_list as $v): 
                            $this->load->model('Category_Slide_model', 'category_slide');
                            $data['category_slide'] = $this->category_slide->select_category_slide($v['category_slide_index']);

                            ?>
                                <tr>
                                    <td style="display:none"><?php echo $v['slide_index']; ?></td>
                                    <td><?php echo $v['slide_name']; ?></td>
                                    <td style="text-align:center"><img src="<?php echo base_url();?><?php echo $v['slide_image']; ?>" width="200px" height="120px"/></td>
                                    <td><?php echo $v['slide_sort']; ?></td>
                                    <td>
                                        <?php if(!empty($data['category_slide'])):?>
                                        <?php foreach($data['category_slide'] as $vv):?>
                                        <?php echo $vv['category_slide_name']; ?>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </td>
                                    <td class="center">
                                        <?php echo $slide_option[$v['slide_option']]?>
                                    </td>
									<td><?php echo date('Y-m-d',$v['slide_created_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('slide/edit'.'/'.$v['slide_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									<a href="<?php echo site_url('slide/remove'.'/'.$v['slide_index']); ?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="display:none">인덱스</th>
                                    <th>스라이드 이름</th>
                                    <th>스라이드 이미지</th>
                                    <th>순서</th>
                                    <th>카태고리</th>
									<th>노출여부</th>
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