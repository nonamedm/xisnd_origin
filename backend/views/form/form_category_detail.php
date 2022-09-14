<?php
defined( 'BASEPATH' )OR exit( 'No direct script access allowed' );
$this->load->view( 'include/header_super' );
?>
<!--右侧部分开始-->
<div id="page-wrapper">

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>FORM Category Detail</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="article" method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('form/processCategory/'.$form_type); ?>">
                            <table class="table table-bordered form_table">
                                <tbody> 
                                    <tr>
                                        <td class="left">Category</td>
                                        <td>
                                            <select class="form-control m-b" name="category_index" id="category_idex">
                                                <option value="0">None</option>
                                                <?php foreach($category_list as $item): ?>
                                                    <option value="<?php echo $item['category_index']; ?>" >
                                                        <?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $item['level'])?><?php echo $item['category_name'];?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">Name</td>
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="form_cg_name" id="form_cg_name" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">Display</td></td>
                                        <td>
                                        <label class="checkbox-inline i-checks">
                                                <input type="radio" class="dis_yes"  name="form_cg_display" value="1" >YES</label>
                                            <label class="checkbox-inline i-checks">
                                                <input type="radio" class="dis_no"   name="form_cg_display" value="0" >NO</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="text-align: right;">
                                <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                                <a href="<?php echo site_url('form/categoryLists');?>"><input class="btn btn-primary" type="button" name="button" value="목록"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!--右侧部分结束-->
<
/div>

<div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
<?php
$this->load->view( 'include/footer' );
?>
<!-- 自定义js -->
<script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>
<script>
    var execut_upload_show = function () {

        mulity_img.fadeIn( 0 );

        $( window ).trigger( 'resize' );

    }
</script>
 

<!-- 自定义js -->
<script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>



<script>

    var _form_cg_index      = '<?php echo isset( $form_cg_detail->form_cg_index ) ? $form_cg_detail->form_cg_index : '' ?>',
        _category_index     = '<?php echo isset( $form_cg_detail->category_index) ? $form_cg_detail->category_index: '' ?>',
        _form_cg_name       = '<?php echo isset( $form_cg_detail->form_cg_name ) ? $form_cg_detail->form_cg_name : '' ?>',
        _form_cg_display    = '<?php echo isset( $form_cg_detail->form_cg_display ) ? $form_cg_detail->form_cg_display : ''?>';

    $(document).ready(function () {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        initData();

    });

    function initData( )
    {
        if( !!_form_cg_index )
        {
            $('form').append('<input type="hidden" name="form_cg_index" value="'+_form_cg_index+'">');
        }
        if( !!_category_index )
        {
            $('[name="category_index"]').val(_category_index);
        }

        if( !!_form_cg_name )
        {
            $('[name="form_cg_name"]').val(_form_cg_name);
        }

        if( !!_form_cg_display )
        {
            $('input:radio[name="form_cg_display"][value='+_form_cg_display+']').attr('checked', 'checked');
            $('input:radio[name="form_cg_display"][value='+_form_cg_display+']').parent().addClass('checked');
        }
        else
        {
            $('input:radio[name="form_cg_display"][value=1]').attr('checked', 'checked');
            $('input:radio[name="form_cg_display"][value=1]').parent().addClass('checked');
        }
    }



</script>