
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
                        <h5 style="width:100%"><span style="margin-right: 100px;">Family site</span>
                       
                        <a href="<?php echo site_url('setting/familyDetail');?>" style='float:right;margin-right:10px;'><button type="button" class="btn btn-primary btn-sm">추가</button></a></h5>
                        
                    </div>
                    <div class="ibox-content">
                        <table class=" table-bordered my_form_table">
                            <thead>
                                <tr>
                                    <th>index<!-- 분류 --></th>
                                    <th>Family name</th>
                                    <th>Family url</th> 
                                    <th>관리</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($family_list as $item):?>
                                <tr>
                                    <td class="center"><?php echo $item['fs_index']?></td>
                                   
                                    <td><?php echo $item['fs_name']?></td>

                                    <td><?php echo $item['fs_url']?></td>

                                    <td class="center">
                                    
                                    <a href="<?php echo site_url('setting/familyDetail/'.$item['fs_index']) ?>"><button class="btn btn-success" type="button"  style="margin-bottom: 0px;"><i class="fa fa-paste"></i>  수정</button></a>
                                    <a href="<?php echo site_url('setting/processfamily/familyRemove/'.$item['fs_index']) ?>" ><button class="btn btn-danger" type="button" style="margin-bottom: 0px;"><i class="fa fa-times"></i>  삭제</button></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                       <nav aria-label="Page navigation" style="text-align: center;">
                            <?php //echo $page_nav;?>
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
