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
                        <h5>편집</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('category/update'); ?>">
						<input type="hidden" name="category_index" id ="category_index" value="<?php echo $category->category_index; ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">카태고리 이름</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo $category->category_name; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">카태고리 주소</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_url" id="category_url" value="<?php echo $category->category_url; ?>">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">상위 카태고리</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="parent_index" id="parent_index">
                                        <option value="0">None</option>
										<?php 
										foreach($category_list as $v): 
										    if($v['category_index'] != $category->category_index):
										?>
                                        <option value="<?php echo $v['category_index']; ?>"  <?php echo $v['category_index'] == $category->parent_index ? 'selected' : '';  ?> >
										<?php echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;", $v['level'])?><?php echo $v['category_name'];?>
										</option>
                                        <?php
										    endif;
										endforeach; 
										?>

                                    </select>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">카태고리 템플릿</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_template_index" id="category_template_index">
										<?php foreach($category_template_list as $t): ?>
                                        <option value="<?php echo $t['category_template_index']; ?>"  <?php echo $t['category_template_index'] == $category->category_template_index ? 'selected' : '';  ?> ><?php echo $t['category_template_name']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
							<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">순서</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="category_sort" id="category_sort" value="<?php echo $category->category_sort; ?>">
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">노출여부</label>

                                <div class="col-sm-10">
                                    <label class="checkbox-inline i-checks">
                                        <input type="radio" name="category_display" value="1" <?php echo $category->category_display == 1 ? 'checked' : '';  ?>>YES</label>
                                    <label class="checkbox-inline i-checks">
                                        <input type="radio" name="category_display" value="0" <?php echo $category->category_display == 0 ? 'checked' : '';  ?>>NO</label>
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>

                            <div class="form-group">

                                <label class="col-sm-2 control-label">카태고리 이미지</label>

                                <div class="col-sm-10">
	                             <?php if($category->category_image !="" || !empty($category->category_image)): ?>
									<img src="<?php echo base_url().$category->category_image; ?>" style="padding-bottom:10px;max-width:100%" />
								 <?php endif; ?>
									<input type="file" name="category_image" id="category_image">
									<input type="hidden" name="category_image_path" id ="category_image_path" value="<?php echo $category->category_image; ?>">

                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">카태고리 설명</label>

                                <div class="col-sm-10"><textarea name="category_description" id="category_description" class="form-control"><?php echo $category->category_description;  ?></textarea></div>
                            </div>
                            <div class="hr-line-dashed"></div>

    <!-- Loading ueditor -->
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>/tools/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>/tools/editor/ueditor.all.min.js"> </script>   
    <script type="text/javascript">  
        var ue = UE.getEditor('category_content' ,{initialFrameHeight:400});
    </script>
	
				    <div class="form-group" >
                        <label class="col-sm-2 control-label">카태고리 내용</label>
						<div class="col-sm-10">
						<textarea name="category_content" id="category_content">
						<?php echo $category->category_content; ?>
                        </textarea>
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
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
