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
                        <h5>글 목록</h5>
						<a href="<?php echo site_url('article/add'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">새 글 추가하기</button></a>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인텍스</th>
                                    <th>제목</th>
                                    <th>분류</th>
								    <th>상단게시여부</th>
									<th>게시글 노출여부</th>
									<th>조회수</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
							<?php foreach($article_list as $v): ?>
                                <tr>
                                    <td><?php echo $v['article_index']; ?></td>
                                    <td>
									<?php 
									echo $v['article_name'];
									if(isBoard($v['category_template_module'])):
									if(!hasReply($v['count'])){
									?>
                                    <a href="<?php echo site_url('reply/add').'/'.$v['article_index']; ?>" style="color:red">[Waiting For Reply]</a>
									<?php
									}else{
									?>
									<a href="<?php echo site_url('reply/articleReply'.'/'.$v['article_index']); ?>">[Replied]</a>
									<?php
									}
									endif;
									?>
									</td>
                                    <td><?php echo $v['category_name']; ?></td>
                                    <td class="center"><?php echo $article_is_top[$v['article_is_top']]; ?></td>
                                    <td class="center"><?php echo $article_display[$v['article_display']]; ?></td>
									<td><?php echo $v['article_hits']; ?></td>
									<td><?php echo date('Y-m-d',$v['article_created_time']); ?></td>
									<td class="center">
									<a href="<?php echo site_url('article/edit'.'/'.$v['article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
								    <?php 
									if(hasReply($v['count'])):
									?>
									<a href="<?php echo site_url('reply/articleReply'.'/'.$v['article_index']); ?>"><button class="btn btn-primary" type="button"><i class="fa fa-paste"></i> REPLY</button></a>
                                    <?php
									endif;
									?>
									<a href="<?php echo site_url('article/remove'.'/'.$v['article_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
									</td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>인텍스</th>
                                    <th>제목</th>
                                    <th>분류</th>
								    <th>상단게시여부</th>
									<th>게시글 노출여부</th>
									<th>조회수</th>
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