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
                        <h5> 회사소개 </h5>
                    </div>

                    <div class="ibox-content search_box" >
                        <style>
                            .search_form tr {
                                height: 50px;
                            }
                            .search_form th ,.search_form td {
                                line-height: 50px;

                            }
                            .search_form th{
                                width: 100px;
                                text-align: center;
                            }
                        </style>
                        <form class="search_form" action="" method="get">
                            <table class="table table-striped table-bordered table-hover">
                                <tr>
                                    <th>제목</th>
                                    <td> <input type="text" name="search_name"></td>
                                </tr>
                                <tr>
                                    <th>분류</th>
                                    <td>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="search_category" value="0"> All
                                        </label>

                                        <?php foreach ( $second_category as $index => $item ): ?>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="search_category" data-index="<?php echo $index;?>" value="<?php echo $index;?>"> <?php echo $item ?>
                                        </label>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th >작업</th>
                                    <td><input class="btn btn-success" type="submit" value="search"></td>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>인텍스</th>
                                    <th>제목</th>
                                    <th>분류</th>
                                    <th>모집기간</th>
								    <th>상단게시여부</th>
									<th>게시글 노출여부</th>
									<th>조회수</th>
                                    <th>날짜</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($article_list as $item): ?>
                                <tr>
                                    <td class="center"><?php echo $item['article_index']; ?> </td>

                                    <td> <?php echo $item['article_name']; ?> </td>

                                    <td class="center"><?php echo !empty($second_category[$item['rec_cg_index']] ) ? $second_category[$item['rec_cg_index']] : 'None'; ?></td>
                                    <td class="center"><?php echo $item['article_date_start'] .'~'.  $item['article_date_end']; ?></td>
                                    <td class="center"><?php echo $y_n[$item['article_is_top']]; ?></td>
                                    <td class="center"><?php echo $y_n[$item['article_display']]; ?></td>
                                    <td class="center"><?php echo $item['article_hits']; ?></td>
									<td class="center"><?php echo date('Y-m-d',$item['article_created_time']); ?></td>
									<td class="center">
									    <a href="<?php echo site_url('recruitment/detail'.'/'.$item['article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> 수정</button></a>
									    <a href="<?php echo site_url('article/remove'.'/'.$item['article_index'].'/recruitment/lists/46'); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> 지우기</button></a>
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
            $('[name="search_name"]').val( _data_get.search_name ) : '';

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