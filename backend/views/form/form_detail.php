<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

<style>
    .lightBoxGallery img {
        margin: 5px;
        width: 120px;
    }

    .hover_delete > .file-panel {
        position: absolute;
        text-align:center;
        width: 20px;
        height:20px;
        top: -20px;
        right: 0;
        background-color:rgba(0,0,0,0.7);
        z-index: 9099990;
    }
    .hover_delete:hover .file-panel{
        top:0px;
    }
</style>
<!--右侧部分开始-->
<div id="page-wrapper">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form Detail</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal junde_form_template" enctype="multipart/form-data" action="<?php echo site_url('form/process/'.$form_type);?>">
                            <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label">이름</label>

                                <div class="col-sm-5 cell_right">
                                    <input type="text" class="form-control" name="name" id="name" value="">
                                </div>
                            </div>
                            <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label">이메일</label>
                                <div class="col-sm-5 cell_right">
                                    <input type="text" class="form-control" name="email" id="email" value="">
                                </div>
                            </div>
                            <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label">연락처</label>
                                <div class="col-sm-5 cell_right">
                                    <input type="text" class="form-control" name="telephone" id="telephone" value="">
                                </div>
                            </div>
                            <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label">제목</label>

                                <div class="col-sm-5 cell_right">
                                    <input type="text" class="form-control" name="title" id="title" value="">
                                </div>
                            </div>
                            
                            <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label"> 문의내용</label>
                                <div class="col-sm-5 cell_right">
                                    <textarea readonly class="form-control" name="contents" id="contents" ><?php echo isset($form_detail->contents) ? $form_detail->contents : '' ?></textarea>
                                </div>
                            </div>

                            <!-- <div class="form-group template_row">
                                <label class="col-sm-2 cell_left control-label">첨부파일</label>

                                <div class="col-sm-5 cell_right attachment">
                                    
                                </div>
                            </div> -->

                            <!--<div class="form-group template_row">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" value=""SAVE">
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!--右侧部分结束-->
</div>
<?php
$this->load->view('footer');
?>
<!-- 自定义js -->
<script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>

<script>

    var _name       = '<?php echo isset($form_detail->name) ? $form_detail->name : '' ?>',
        _name_2     = '<?php echo isset($form_detail->name_2) ? $form_detail->name_2 : '' ?>',
        _title      = '<?php echo isset($form_detail->title) ? $form_detail->title : '' ?>',
        _telephone  = '<?php echo isset($form_detail->telephone) ? $form_detail->telephone : '' ?>',
        _email      = '<?php echo isset($form_detail->email) ? $form_detail->email : '' ?>',
        _date       = '<?php echo isset($form_detail->date) ? $form_detail->date : 'None' ?>',
        _language_1 = '<?php echo isset($form_detail->language_1) ? $form_detail->language_1 : 'None' ?>',
        _language_2 = '<?php echo isset($form_detail->language_2) ? $form_detail->language_2 : 'None' ?>',

        _attachment_1   = '<?php echo isset($form_detail->attachment_1) ? $form_detail->attachment_1 : '' ?>',
        _attachment_2   = '<?php echo isset($form_detail->attachment_2) ? $form_detail->attachment_2 : '' ?>',
        _attachment_3   = '<?php echo isset($form_detail->attachment_3) ? $form_detail->attachment_3 : '' ?>';
    
    function attachmentHtml( _url, _attachment_name )
    {
        return '<a style="line-height: 30px; " href = "'+_url+'" download="" >'+_attachment_name+'</a><br>'
    }
    function initDetail()
    {
        $('[name="name"]').val(_name);
        $('[name="title"]').val(_title);
        $('[name="telephone"]').val(_telephone);
        $('[name="email"]').val(_email);
        //$('[name="language_1"]').val(_language_1);
        //$('[name="language_2"]').val(_language_2);

        //$('[name="date"]').val(_date);
        
        var _attachment_box = $('.attachment');
        if( !!_attachment_1 )
        {
            _attachment_box.append(attachmentHtml( _attachment_1, 'attachment 1' ));
        }
        if( !!_attachment_2 )
        {
            _attachment_box.append(attachmentHtml( _attachment_2, 'attachment 2' ))
        }
        if( !!_attachment_3 )
        {
            _attachment_box.append(attachmentHtml( _attachment_3, 'attachment 3' ))
        }
    }
    
    $(document).ready(function () {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        $('input').attr('readonly', 'readonly');

        initDetail();

    });
</script>

<script>

</script>

