<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>resource/admin/css/crop/cropper.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>resource/admin/css/crop/main.css">
 <style>
.loading {
  display: none;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: #fff url("<?php echo base_url();?>resource/admin/img/loading.gif") no-repeat center center;
  opacity: .75;
  filter: alpha(opacity=75);
  z-index: 20140628;
}
 </style>
    <!--右侧部分开始-->
    <div id="page-wrapper">


    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>새 스라이드 추가</h5>
                    </div>

                    <div class="ibox-content">
                        <!-- begin crop -->

                    <div class="container_crop" id="crop-avatar" style="">

                        <!-- Current avatar -->
                        <div class="avatar-view" title="대표 이미지">
      <img src="<?php echo base_url(); ?>resource/admin/img/picture.jpg" style="width:260px;" alt="Avatar">
      <p id="images_help" style="text-align:center; font-size:16px; color:red;"></p>
                        </div>

     <!-- Cropping modal -->
      <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo site_url('crop/resizeImage'); ?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">대표 이미지</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <input type="hidden"  name="aspect_width" value="1820">
                  <input type="hidden"  name="aspect_height" value="469">
                  <label for="avatarInput">이미지 업로드</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">（마우스 휠로 크기 조절이 가능합니다）
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>

                  </div>
                </div>

                <div class="row avatar-btns">
                        <div class="row">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>
                    </div>

                  </div>

                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save" id="images_save_btn">업로드</button>
                  </div>
                  </div>

                        </div>
                    </div>
                    </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
            </div> 

          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    
  </div>
  <!-- end crop -->
  <div class="hr-line-dashed"></div>

                    <div class="ibox-content" style="border:none;">
                        <form id="slide"  method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('slide/insert'); ?>">
                            <input type="hidden" name="slide_image" id="slide_image" value="" /> 
                           
                            <div class="form-group">
                                <label class="col-sm-2 control-label">슬라이드 이름</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slide_name" id="slide_name">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">슬라이드 카태고리</label>

                            <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_slide_index" id="category_slide_index" >
                                        <option value="0">Please Select</option>
                                        <?php foreach($category_slide_list as $v):?>
                                        <option value="<?php echo $v['category_slide_index']?>" data-type=""><?php echo $v['category_slide_name']?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>

                           <div class="hr-line-dashed"></div>
                            

                            <div class="form-group">
                                <label class="col-sm-2 control-label">노출여부</label>

                                <div class="col-sm-10">
									<label class="checkbox-inline i-checks">
                                    <input type="radio" name="slide_option" value="1" checked>공개</label>
                                    <label class="checkbox-inline i-checks">
                                    <input type="radio" name="slide_option" value="0">비공개</label>
                                </div>

                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">순서</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slide_sort" id="slide_sort" value="0">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">First Row</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slide_first_row" id="slide_first_row">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Second Row</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slide_second_row" id="slide_second_row">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Third Row</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="slide_third_row" id="slide_third_row" >
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input class="btn btn-primary" type="submit" name="submit" value="등록하기">
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
$this->load->view('include/footer');
?>
<!--<script type="text/javascript">
      function select(){
          var category_slide_index = $("#category_slide_index").val();
          $.ajax({
            type: "post",
            async: true ,
            cache: false,
            dataType:'html',
            url: "<?php echo site_url('slide/getCateSlideAjax');?>",
            data: {
                category_slide_index:category_slide_index
                  },
            success:function(data){
                $('#show').html(data);
                
            }
          });
        };

</script>-->

<script>

var aspect_width = "1820";
var aspect_height = "469";
var element_id = 'slide_image';
</script>
<script src="<?php echo base_url(); ?>resource/admin/js/crop/cropper.js"></script>
<script src="<?php echo base_url(); ?>resource/admin/js/crop/main.js"></script>
