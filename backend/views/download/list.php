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
                        <h5  style="width:100%">
                            다운로드
                            <a href="<?php echo site_url('download/detail')?>" style="float:right"><button type="button" class="btn btn-primary btn-sm">추가</button></a>    
                        </h5>
                    </div>
                    
                
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인덱스</th>
                                    <th>제목</th>
                                    <th>파일</th>
								    <th>상단게시여부</th>
									<th>게시글 노출여부</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($article_list as $item): ?>
                                <tr>
                                    <td><?php echo $item['article_index']; ?> </td>

                                    <td><?php echo $item['article_name']; ?> </td>

                                    <td>
                                        <?php 
                                            echo !empty( $item['article_file'] ) ? '<a download="'.$item['article_name'].'" href=/'.$item['article_file'].'>Download<a>' : 'None';
                                        ?>
                                    </td>

                                    <td class="center"><?php echo $y_n[$item['article_is_top']]; ?></td>
                                    <td class="center"><?php echo $y_n[$item['article_display']]; ?></td>
									<td><?php echo date('Y-m-d',$item['article_created_time']); ?></td>
									<td class="center">
									    <a href="<?php echo site_url($category_type.'/detail'.'/'.$item['article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									    <a href="<?php echo site_url('article/remove'.'/'.$item['article_index'].'/'.$category_type.'/lists/'); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
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

<script>
    var _data_get = <?php echo json_encode($this->input->get())?>,
        _search_name = $('[name="search_name]');

    $(document).ready(function () {
        !!_data_get.search_name ?
            _search_ask_title.val( _data_get.search_name ) : '';

        if( !!_data_get.search_category )
        {
            $('[name="search_category"][value="'+_data_get.search_category+'"]').attr('checked', 'checked');
            $('[name="search_category"][value="'+_data_get.search_category+'"]').parent().addClass('checked');
        }else
        {
            $('[name="search_category"][value=0]').attr('checked', 'checked') ;
            $('[name="search_category"][value=0]').parent().addClass('checked');
        }
    });

</script>