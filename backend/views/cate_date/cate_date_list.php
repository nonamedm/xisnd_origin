
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
                        <h5 style="width:100%">cate date<a href="<?php echo site_url('cate_date/add_cate');?>" style='float:right;margin-right:10px;'><button type="button" class="btn btn-primary btn-sm">add cate date</button></a></h5> 
                    </div>
                    <div class="ibox-content">
                        <table class=" table-bordered my_form_table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Option</th>
                                    <th>관리</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($cate_date_list as $v):?>
                                <tr>
                                    <td><b><?php echo $v['category_date_name'];?></b></td>
                                    
                                    <td class="center"><?php echo $is_option[$v['is_option']]; ?></td>

                                    <td class="center">
                                    <a href="<?php echo site_url('article_date/article_date_list'.'/'.$v['category_date_index']); ?>"><button class="btn btn-success" type="button"  style="margin-bottom: 0px;"><i class="fa fa-paste"></i>Date List</button></a>
                                    <a href="<?php echo site_url('article_date/edit_cate'.'/'.$v['category_date_index']); ?>"><button class="btn btn-success" type="button"  style="margin-bottom: 0px;"><i class="fa fa-paste"></i>  수정</button></a>
                                    <a href="<?php echo site_url('article_date/remove_cate'.'/'.$v['category_date_index']); ?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button" style="margin-bottom: 0px;"><i class="fa fa-times"></i>  삭제</button></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                       <nav aria-label="Page navigation" style="text-align: center;">
                            <?php echo $page_nav;?>
                       </nav>
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
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {
            /* Init DataTables */
            $('.dataTables-example').dataTable();

        });
    </script>