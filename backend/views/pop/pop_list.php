
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
                        <h5 style="padding-top: 10px;margin-right: 150px;">팝업 관리</h5>
                         <a href="<?php echo site_url('Pop/add_pop'); ?>" style='float:right;margin-right:10px;'><button type="button" class="btn btn-primary btn-ms">추가</button></a>
                    </div>
                    <div class="ibox-content">
                        <div style="text-align: right;">
                        
                        <button type="button" class="btn btn-primary btn-sm checkbox_change" data-select="remove">선택 삭제</button>
                        
                        </div>
                        <table class=" table-bordered my_form_table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="all_checkbox"></th>
                                    <th>이미지</th>
                                    <th>팝업 이름</th>
                                    <th>상단 여백 사이즈</th>
                                    <th>왼쪽 여백 사이즈</th>
                                    <th>공개여부</th>
                                    <th>관리</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($pop_list as $v):?>
                                <tr>
                                    <td class="center"><input type="checkbox" class="checkbox_select"  value="<?php echo $v['pop_index'];?>"></td>
                                    <td class="center"><img src="<?php echo base_url(); ?><?php echo $v['pop_img']?>" width="120" height="50"></td>
                                    <td class="center"><?php echo $v['pop_title']; ?></td>
                                    <td class="center"><?php echo $v['top']?>px</td>
                                    <td class="center"><?php echo $v['left']?>px</td>

                                    <td class="center"><?php if($v['pop_option'] == 0):?>비공개<?php endif;?><?php if($v['pop_option'] == 1):?>공개<?php endif;?></td>
                                    <td class="center">
                                    <a href="<?php echo site_url('Pop/edit_pop/'.$v['pop_index']);?>"><button class="btn btn-success" type="button"><i class="fa fa-paste"></i>  수정</button></a>
                                   
                                    <a href="<?php echo site_url('Pop/remove/'.$v['pop_index']);?>" onclick="javascript:return del();"><button class="btn btn-danger" type="button"><i class="fa fa-times"></i>  삭제</button></a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $(".all_checkbox").on("click",function(){
            if($(".all_checkbox").is(":checked")==true){
                $(".checkbox_select").prop("checked",true);
            }else{
                $(".checkbox_select").prop("checked",false);
            }
        });

        var shop_select_arr = new Array();  
        $(".checkbox_change").on("click",function(){
            var selected_length=$(".checkbox_select:checked").length;
            if(selected_length > 0){

                if($(this).attr("data-select")=="remove"){

                    var confirm_selected =confirm('삭제 하시겠습니까?');

                    if (confirm_selected==true){

                        shop_select_arr = [];
         
                        var select_operation = $(this).attr("data-select");

                        $(".checkbox_select:checked").each(function(){

                            var selected_val = $(this).val();
            
                            shop_select_arr.push({'value':selected_val,'operation':select_operation });
            
                        });
                        $.ajax({
                            url:"<?php echo site_url('Pop/removeAjax');?>",
                            type:"post",
                            data:{state_arr:shop_select_arr},

                            success: function (data) {

                                alert('선택한 삭제 되었습니다');
                                window.location.reload();
                            }
                        });
                    }
                }else{

                    shop_select_arr = [];
         
                    var select_operation = $(this).attr("data-select");

                    $(".checkbox_select:checked").each(function(){
                        var selected_val = $(this).val();
                        shop_select_arr.push({'value':selected_val,'operation':select_operation });
            
                    });
                
                    /*$.ajax({
                        url:"",
                        type:"post",
                        data:{state_arr:shop_select_arr},
                        success: function (data) {
                            alert('상태 변경 되었습니다');
                            window.location.reload();
                
                        }
                    });*/

                }

  
        }else{
            alert('선택해주세요');
        }
        
        });

    
    });
</script>
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
