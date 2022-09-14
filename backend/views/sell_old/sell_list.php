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
                        <h5> 분양안내 </h5>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인텍스</th>
                                    <th>현장명</th>

                                    
									<th>분양일정</th>
									

                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($sell_list as $s): ?>
                                <tr>
                                    <td><?php echo $s['sell_index']; ?></td>

                                    <td><?php echo $s['sell_title']; ?></td>


                                   
                                    <td class="center"><?php echo $s['sell_inquiry']; ?></td>
                                    

									<td><?php echo date('Y-m-d',$s['sell_time']); ?></td>
									<td class="center">
									    <a href="<?php echo site_url('sell_old/sell_detail'.'/'.$s['sell_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									    <a href="<?php echo site_url('sell_old/remove_sell'.'/'.$s['sell_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
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
