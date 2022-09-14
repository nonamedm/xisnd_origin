<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
$this->load->view( 'header' );
?>
<!--右侧部分开始-->
<div id="page-wrapper">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>edit cate date</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-bordered form_table">
                            <tbody>
                                <form id="article" method="post" role="form" class="form-horizontal" action="<?php echo site_url('cate_date/update_cate'); ?>">
                                     <input type="hidden" name="category_date_index" value="<?php echo $single_cate['category_date_index']?>">
                                    <tr>
                                        <td class="left">Name</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="category_date_name" id="category_date_name" value="<?php echo $single_cate['category_date_name']?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">Sort</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="category_date_sort" id="category_date_sort" value="<?php echo $single_cate['category_date_sort']?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">IS OPTION</td>
                                        <td>
                                            <label class="checkbox-inline i-checks m-r-sm">
                                            <input type="radio" name="is_option" value="1" <?php if($single_cate['is_option'] == 1):?>checked<?php endif;?> style="margin-right: 5px;">Yes</label>
                                        
                                            <label class="checkbox-inline i-checks m-r-sm">
                                            <input type="radio" name="is_option" value="0" <?php if($single_cate['is_option'] == 0):?>checked<?php endif;?> style="margin-right: 5px;">No</label>
                                        
                                        </td>
                                    </tr>
      
                            </tbody>
                        </table>
                        <div style="text-align: right;">
                            <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo site_url('cate_date/cate_list');?>'">목록</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--右侧部分结束-->
</div>


<?php $this->load->view('include/footer');?>