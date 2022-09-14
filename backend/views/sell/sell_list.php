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
                        <h5> 단지안내 </h5>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인텍스</th>
                                    <th>제목</th>
                                    <th>지역설정</th>
                                    <th>단지상태</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($sell_list as $s): ?>
                                <tr>
                                    <td><?php echo $s['xi_article_index']; ?></td>

                                    <td><?php echo $s['xi_article_title']; ?></td>

                                    <td>
                                    <?php foreach($regional_list as $r):?>
                                        <?php if($s['xi_article_category_index'] == $r['xi_article_category_index']):?>
                                            <?php echo $r['xi_article_category_name']?>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                    </td>

                                    <td class="center">
                                    <?php if($s['is_state'] == 1){?>
                                        공사중 
                                    <?php }else if($s['is_state'] == 2){?>
                                        입주중
                                    <?php }else{?>
                                        입주완료
                                    <?php }?>
                                    </td>
									<td><?php echo date('Y-m-d',$s['create_time']); ?></td>
									<td class="center">
                                        
                                        <?php 
                                            $this->load->model('Sell_model', 'sell');
                                            $info = $this->sell->getArticleInfo($s['xi_article_index']);
                                            $year = $this->sell->getArticleYear($s['xi_article_index']);
                                        ?>

                                        <?php if($year):?>
                                        <a href="<?php echo site_url('sell/year_list/'.$s['xi_article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i>  공사현장 목록</button></a>
                                        <?php endif;?>

                                        <?php if($info):?>
                                        <a href="<?php echo site_url('sell/info_list/'.$s['xi_article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 평형정보 목록</button></a>
                                        <?php endif;?>
                                            
                                        
									    <a href="<?php echo site_url('sell/edit_sell'.'/'.$s['xi_article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>

									    <a href="<?php echo site_url('sell/remove_sell'.'/'.$s['xi_article_index']); ?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
                                        
									</td>
                                </tr>
                            <?php endforeach; ?>
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

<!-- iCheck -->
<script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        /* Init DataTables */
        $('.dataTables-example').dataTable();

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

    });

</script>
