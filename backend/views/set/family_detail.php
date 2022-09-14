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
                        <h5>Family site</h5>
                    </div>
                    <div class="ibox-content">
                    <form id="article" method="post" role="form" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('setting/processFamily/'.$form_type); ?>">
                        <input type="hidden" name="fs_index" value="">
                        <table class="table table-bordered form_table">
                            <tbody>
                                    <tr>
                                        <td class="left">Family name</td>
                                        <td>
                                           <input type="text" class="form-control" name="fs_name" id="fs_name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">Family url</td>
                                        <td>
                                          <input type="text" class="form-control" name="fs_url" id="fs_url">
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                        <div style="text-align: right;">
                            <button class="btn btn-primary" type="submit" name="submit">저장하기</button>
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo site_url('setting/familySite');?>'">목록</button>
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
<script>
    var _fs_index   = '<?php echo !empty( $family_detail->fs_index ) ? $family_detail->fs_index : '' ?>',
        _fs_name    = '<?php echo !empty( $family_detail->fs_name ) ? $family_detail->fs_name : '' ?>',
        _fs_url     = '<?php echo !empty( $family_detail->fs_url ) ? $family_detail->fs_url : '' ?>';

    
    function init()
    {
        if( _fs_index != '' )
        {
            $('[name="fs_index"]').val(_fs_index);
        }

        if( _fs_name != '' )
        {
            $('[name="fs_name"]').val(_fs_name);
        }

        if( _fs_url != '' )
        {
            $('[name="fs_url"]').val(_fs_url);
        }
    }

    $(document).ready(function(){
        init();
    });
    
   
                    
</script>