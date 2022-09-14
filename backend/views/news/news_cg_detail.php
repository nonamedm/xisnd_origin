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
                        <h5>News Category Detail</h5>
                    </div>
                    <div class="ibox-content">
                        <form id="article" method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('news/processCategory/'.$form_type); ?>">
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
                                        <td><input type="text" placeholder="" class="form-control my_form_input" name="news_cg_name" id="news_cg_name" >
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="left">Display</td></td>
                                        <td>
                                        <label class="checkbox-inline i-checks">
                                                <input type="radio" class="dis_yes"  name="news_cg_display" value="1" >YES</label>
                                            <label class="checkbox-inline i-checks">
                                                <input type="radio" class="dis_no"   name="news_cg_display" value="0" >NO</label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="text-align: right;">
                                <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                                <a href="<?php echo site_url('news/categoryLists');?>"><input class="btn btn-primary" type="button" name="button" value="목록"></a>
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

    var _news_cg_index      = '<?php echo isset( $news_cg_detail->news_cg_index ) ? $news_cg_detail->news_cg_index : '' ?>',
        _category_index     = '<?php echo isset( $news_cg_detail->category_index) ? $news_cg_detail->category_index: '' ?>',
        _news_cg_name       = '<?php echo isset( $news_cg_detail->news_cg_name ) ? $news_cg_detail->news_cg_name : '' ?>',
        _news_cg_display    = '<?php echo isset( $news_cg_detail->news_cg_display ) ? $news_cg_detail->news_cg_display : ''?>';

    $(document).ready(function () {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        initData();

    });

    function initData( )
    {
        if( !!_news_cg_index )
        {
            $('form').append('<input type="hidden" name="news_cg_index" value="'+_news_cg_index+'">');
        }
        if( !!_category_index )
        {
            $('[name="category_index"]').val(_category_index);
        }

        if( !!_news_cg_name )
        {
            $('[name="news_cg_name"]').val(_news_cg_name);
        }

        if( !!_news_cg_display )
        {
            $('input:radio[name="news_cg_display"][value='+_news_cg_display+']').attr('checked', 'checked');
            $('input:radio[name="news_cg_display"][value='+_news_cg_display+']').parent().addClass('checked');
        }
        else
        {
            $('input:radio[name="news_cg_display"][value=1]').attr('checked', 'checked');
            $('input:radio[name="news_cg_display"][value=1]').parent().addClass('checked');
        }
    }



</script>