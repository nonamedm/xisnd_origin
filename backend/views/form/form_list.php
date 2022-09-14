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
                        <h5> 사이버신문고</h5>
                    </div>

                    <!-- <div class="ibox-content search_box" >
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
                                    <th>업체명</th>
                                    <td> <input type="text" name="search_name"></td>
                                </tr>
                                <tr>
                                    <th>분류</th>
                                    <td>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="search_category" value="0"> All
                                        </label>

                                        <?php foreach ( $form_category as $index => $item ): ?>
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
                    </div>-->

                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>Index</th>
                                   <!--  <th>분류</th> -->                                    
                                    <th>이름</th>
                                    <th>제목</th>
                                    <th>연락처</th>
                                    <th>이메일</th>
                                    <th>등록일</th>
                                    <th>작업</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($form_list as $item): ?>
                                <tr>
                                    <td><?php echo $item['form_index']; ?></td>

                                    <!-- <td><?php echo isset( $form_category[$item['form_cg_index']] ) ? $form_category[$item['form_cg_index']] : 'None'; ?></td> -->

                                    <td><?php echo $item['name']; ?></td>

                                    <td><?php echo $item['title']; ?></td>

                                    <td><?php echo $item['telephone']; ?></td>

                                    <td><?php echo $item['email']; ?></td>

                                    <td><?php echo date('Y-m-d', $item['create_date']); ?></td>

                                    <td class="center">
                                        <a href="<?php echo site_url('form/formDetail/'.$item['form_cg_index'].'/'.$item['form_index']); ?>">
                                            <button class="btn btn-success" type="button"><i class="fa fa-paste"></i>상세보기</button>
                                        </a>
                                        <?php if( $this->session->admin_grade < 1 ):?>
                                        <a href="<?php echo site_url('form/process/remove/'.$item['form_index']); ?>">
                                            <button class="btn btn-danger" type="button"><i class="fa fa-times"></i>지우기</button>
                                        </a>
                                        <?php endif;?>
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