<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
        <!--右侧部分开始-->
        <div id="page-wrapper">


    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">

                    <div class="ibox-title">
                        <h5>메뉴 카테고리</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('category/'.$form_type.'/Categorys/lists'); ?>">
                            <input type="hidden" name="category_index" id ="category_index" value="">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">카테고리 이름</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_name" id="category_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">카테고리 주소</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_url" id="category_url">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">상위 카테고리</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="parent_index" id="parent_index">
                                        <option value="0"> 없음 </option>

										<?php foreach($category_list as $v): ?>
                                            <option value="<?php echo $v['category_index']; ?>">
									<?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $v['level'])?><?php echo $v['category_name'];?>

                                            </option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>

							<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">카테고리 템플릿</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_template_index" id="category_template_index">
										<?php foreach($category_template_list as $t): ?>
                                        <option value="<?php echo $t['category_template_index']; ?>" ><?php echo $t['category_template_name']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">순서</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_sort" id="category_sort" value="0">
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">노출여부</label>

                                <div class="col-sm-10">
                                    <label class="checkbox-inline i-checks">
                                        <input type="radio" name="category_display" value="1">YES</label>
                                    <label class="checkbox-inline i-checks">
                                        <input type="radio" name="category_display" value="0">NO</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" id="submit" value="SAVE" >
                                </div>
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
<?php
$this->load->view('footer');
?>
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>
    <script>

        var _Value = {};
            _Value.form_type = '<?php echo $form_type?>';
            _Value.category_index = '<?php echo $category->category_index; ?>';
            _Value.category_name  = '<?php echo $category->category_name; ?>';
            _Value.category_url   = '<?php echo $category->category_url; ?>';
            _Value.parent_index   = '<?php echo $category->parent_index; ?>';
            _Value.category_template_index    = '<?php echo $category->category_template_index?>';
            _Value.category_sort  = '<?php echo $category->category_sort; ?>';
            _Value.category_display   = ' <?php echo $category->category_display; ?>';


        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

            if( _Value.form_type == 'update' )
            {
                initData();
            }
        });


        function initData()
        {
            !!_Value.category_index ? $('[name="category_index"]').val( _Value.category_index ) : '';
            !!_Value.category_name ? $('[name="category_name"]').val( _Value.category_name ) : '';
            !!_Value.category_url ? $('[name="category_url"]').val( _Value.category_url ) : '';
            !!_Value.parent_index ? $('[name="parent_index"]').val( _Value.parent_index ) : '';
            !!_Value.category_template_index ? $('[name="category_template_index"]').val( _Value.category_template_index ) : '';
            !!_Value.category_sort ? $('[name="category_sort"]').val( _Value.category_sort ) : '';

            if( _Value.category_display == 0 )
            {
                $('[name="category_display"][value='+_Value.category_display+']').attr('checked', 'checked');
                $('[name="category_display"][value='+_Value.category_display+']').parent().addClass('checked');
            }
            else
            {
                $('[name="category_display"][value=1]').attr('checked', 'checked');
                $('[name="category_display"][value=1]').parent().addClass('checked');
            }

        }
    </script>
