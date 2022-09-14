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
                        <h5>SNS</h5>
                        <a href="<?php echo site_url('sns/snsCreate'); ?>" style='float:right'><button type="button" class="btn btn-primary btn-xs">Create SNS</button></a>
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
                                    <th>Title</th>
                                    <td> <input type="text" name="search_sns_title"></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="search_sns_category" value="0"> All
                                        </label>

                                        <?php foreach ( $sns_category as $item ): ?>
                                        <label class="checkbox-inline i-checks">
                                            <input type="radio" name="search_sns_category" value="<?php echo $item['sns_cg_index'];?>"> <?php echo $item['sns_cg_name'] ?>
                                        </label>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th >Action</th>
                                    <td><input class="btn btn-success" type="submit" value="search"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Top</th>
                                <th>Display</th>
                                <th>Cover</th>
                                <th>Cteate Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach($article_list as $item): ?>
                                <tr>
                                    <td><?php echo $item['article_index']; ?></td>
                                    <td><?php echo $item['article_name']; ?></td>
                                    <td><?php echo $sns_cg[$item['sns_cg_index']]; ?></td>
                                    <td class="center"><?php echo $article_is_top[$item['article_is_top']]; ?></td>
                                    <td class="center"><?php echo $article_display[$item['article_display']]; ?></td>
                                    <td ><img   style="display:block;max-height: 50px;margin: 0 auto;" src="<?php echo base_url().$item['article_cover']; ?>"></td>
                                    <td><?php echo date('Y-m-d',$item['article_created_time']); ?></td>
                                    <td class="center">
                                        <a href="<?php echo site_url('sns/edit/'.$item['article_index']); ?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i> Edit</button></a>
                                        <a href="<?php echo site_url('sns/process/sns_remove'.'/'.$item['article_index'].'/'.$item['category_index']); ?>"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i> Delete</button></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Index</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Top</th>
                                <th>Display</th>
                                <th>Cover</th>
                                <th>Cteate Date</th>
                                <th>Action</th>
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
        _search_sns_title = $('[name="search_sns_title"]');

    $(document).ready(function () {
        !!_data_get.search_sns_title ?
            _search_sns_title.val( _data_get.search_sns_title ) : '';

        if( !!_data_get.search_sns_category )
        {
            $('[name="search_sns_category"][value="'+_data_get.search_sns_category+'"]').attr('checked', 'checked');
            $('[name="search_sns_category"][value="'+_data_get.search_sns_category+'"]').parent().addClass('checked');
        }
        else
        {
            $('[name="search_sns_category"][value=0]').attr('checked', 'checked') ;
            $('[name="search_sns_category"][value=0]').parent().addClass('checked');
        }

    });
</script>