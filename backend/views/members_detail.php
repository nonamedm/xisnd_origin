<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>

        <div class="page_container index_01">

            <div class="head row index_01">
                <?php if(!empty($user_data)) : ?>
                <a href="javascript:history && history.back();" style="margin-right:15px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>회원 정보
                <?php else: ?>
                <a href="javascript:history && history.back();" style="margin-right:15px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>회원 가입
                <?php endif; ?>
            </div>
            <?php if(!empty($user_data)) : ?>
            <form role="form" name="change_info" id="change_info" class="change_form_unit_edit" enctype="multipart/form-data" action="<?php echo site_url('Main/update') ?>" method="post">
            <input id="user_index" name="user_index" type="hidden" value="<?=$user_data['user_index']?>">
            <?php else: ?>
            <form role="form" name="change_info" id="change_info" class="change_form_unit_edit" enctype="multipart/form-data" action="<?php echo site_url('Main/add') ?>" method="post">
            <?php endif; ?>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="form form_01">

                        <div class="content">

                            <div class="clear"></div>

                            <div class="item title">
                                기본 데이터
                            </div>
                                     <input type="hidden" id="user_profile_image" name="user_profile_image" value="<?php echo !empty($user_data['user_profile_image'])?$user_data['user_profile_image']:'';?>">
					           <div class="item">
                                <div class="left">
                                    썸네일 이미지
                                </div>
                                <div class="right full">
								   <div class="crop-avatar">
                                        <a class="avatar-view" data-original-title="" title="" style="width: auto; height: auto;">
                                        <img src="<?php echo !empty($user_data['user_profile_image'])?base_url().$user_data['user_profile_image']:base_url().'resource/admin/resources/crop/header_edit.png';?>" 
                                        width="180" height="180" data-width="180" data-height="180" data-element-id="user_profile_image">
                                        </a>
                                    <input type="hidden" id="upload_img_01" name="upload_img_01" class="upload_img_error" data-check_txt="썸네일 이미지 이미지선택해주세요" data-name="check_empty" value="">
                                    </div>

                                </div>
                            </div>

                            <div class="item">
                                <div class="left">
                                    회원종류
                                </div>
                                <div class="right full">
                                    <?php foreach($enumvalue->enum_array['user_type'] as $i => $v): 
                                        $checked_string ='';
                                        if(!empty($user_data['user_type'])) {
                                            if($i == $user_data['user_type'])
                                                $checked_string = 'checked';
                                        }else {
                                            if($i =='0')
                                                $checked_string = 'checked';
                                        }
                                         ?>
                                    <label class="checkbox_block">
										<input class="form-control special" type="radio" name="user_type" value="<?=$i?>" <?=$checked_string?>>
										<span class="detail">
											<?=$v?>
										</span>
									</label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    아이디
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['user_id'])?$user_data['user_id']:'';?>" class="form-control special full" name="user_id" id="user_id">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    비밀번호
                                </div>
                                <div class="right full">
                                    <input placeholder="공백이면 기존 값 유지." type="password" class="form-control special full" name="user_pwd" id="user_pwd">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    이름
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['user_name'])?$user_data['user_name']:'';?>" class="form-control special full" name="user_name" id="user_name">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    연락처
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['user_tel'])?$user_data['user_tel']:'';?>" class="form-control special full" name="user_tel" id="user_tel">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    이메일
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['user_email'])?$user_data['user_email']:'';?>" class="form-control special full" name="user_email" id="user_email">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    가입시간
                                </div>
                                <div class="right full">
                                    <label><?php echo !empty($user_data['create_time'])?$user_data['create_time']:'';?></label>
                                </div>
                            </div>
                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                분류정보
                            </div>
                            <div class="item">
                                <div class="left">
                                    지역
                                </div>

                                <div class="right">
                                    <div class="btn-group special like_form_unit area area_start" style="width:130px;">
                                        <input id="regional_user_taxonomy_index" name="regional_user_taxonomy_index" type="hidden" value="">
                                        <select id="regional_level1" name="regional_level1" class="form-control">
                                            <option></option>
                                            <?php foreach($regional_level1_list as $i => $v): ?>
                                            <option value="<?=$v['level1_index']?>"><?=$v['level1_name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>

                                    <div class="btn-group special like_form_unit area area_end" style="width:130px;">
                                        <select id="regional_level2" name="regional_level2" class="form-control">
                                        </select>									
                                    </div>
							    </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    주요분야
                                </div>
                                <div class="right" id="change_block">

                                    <div class="btn-group special like_form_unit area area_start" style="width:130px;">
                                        <select id="taxonomy_level1" name="taxonomy_level1" class="form-control">
                                            <option></option>
                                            <?php foreach($taxonomy_level1_list as $i => $v): ?>
                                            <option value="<?=$v['level1_index']?>"><?=$v['level1_name']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>

                                    <div class="btn-group special like_form_unit area area_end" style="width:130px;">
                                        <select id="taxonomy_level2" name="taxonomy_level2" class="form-control">
                                        </select>									
                                    </div>

                                    <div class="btn-group special like_form_unit area area_end" style="width:130px;">
                                        <select id="taxonomy_level3" name="taxonomy_level3" class="form-control">
                                        </select>									
                                    </div>

                                    <div class="btn-group special like_form_unit area area_end" style="width:130px;">
                                        <select id="taxonomy_level4" name="taxonomy_level4" class="form-control">
                                        </select>									
                                    </div>

                                    <div class="btn-group special like_form_unit area area_end" style="">
                                        <button id="btn_add_taxonomy" type="button" class="btn btn-primary">
                                            추가하기
                                        </button>
                                    </div>
                                    
                                </div>
						    </div>

                            <div class="item">
                                <div class="right" id="changed_block">

                                </div>
                            </div>

                            <div class="item">
                                <div class="left">
                                    주요분야 설명
                                </div>
                                <div class="right" style="width:100%;">
                                    <textarea name="taxonomy_description" id="taxonomy_description" class="form-control textarea special full change_form_unit_edit" ><?php echo !empty($user_data['taxonomy_description'])?$user_data['taxonomy_description']:'';?></textarea>
                                </div>
						    </div>

                            <div class="item">
                                <div class="left">
                                    변리사 키워드
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['user_keyword'])?$user_data['user_keyword']:'';?>" class="form-control special full" name="user_keyword" id="user_keyword">
                                </div>
                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                변리사 추가 설정
                            </div>
                            <div class="item">
                                <div class="left">
                                    법인이름
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['corporate_name'])?$user_data['corporate_name']:'';?>" class="form-control special full" name="corporate_name" id="corporate_name">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    특허몬 인증상태
                                </div>
                                <div class="right full">
                                    <?php foreach($enumvalue->enum_array['user_status'] as $i => $v): 
                                         $checked_string ='';
                                         if(!empty($user_data['user_status'])) {
                                             if($i == $user_data['user_status'])
                                                 $checked_string = 'checked';
                                         }else {
                                             if($i =='1')
                                                 $checked_string = 'checked';
                                         }?>
                                    <label class="checkbox_block">
										<input class="form-control special" type="radio" name="user_status" value="<?=$i?>" <?=$checked_string?>>
										<span class="detail">
											<?=$v?>
										</span>
									</label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    평점(평균/총수)
                                </div>
                                <div class="right full">
                                    <label>
                                        <?php echo !empty($user_data['consult_average_point'])?$user_data['consult_average_point'].'/'.$user_data['consult_total_count']:'';?>
                                    </label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    인증신청서
                                </div>
                                <div class="right full">
                                    <?php if(!empty($user_data['user_cert_file'])): ?>
                                        <a href="<?php echo base_url().$user_data['user_cert_file']?>" 
                                        download="<?php echo base_url().$user_data['user_cert_file']?>" target="_blank">다운로드</a>
                                    <?php endif;?>
                                    <label>
                                        <input type="file" data-name="file" style="display:none;" data-draggable=".show_file_01" data-change_url_target=".change_file_show" data-url_key="test_ajax_file_url" />
                                        <input type="hidden" name="user_cert_file" class="change_file_show"/>
                                        <div class="btn btn-primary bigger show_file_01">
                                            upload
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    소개글
                                </div>
                                <div class="right" style="width:100%;">
                                    <textarea name="user_intro" id="user_intro" class="form-control textarea special full change_form_unit_edit" ><?php echo !empty($user_data['user_intro'])?$user_data['user_intro']:'';?></textarea>
                                </div>
						    </div>
                            <div class="item">
                                <div class="left">
                                    사무실 주소
                                </div>
                                <div class="right full">
                                    <input value="<?php echo !empty($user_data['address'])?$user_data['address']:'';?>" class="form-control special full" name="address" id="address">
                                </div>
                            </div>
                            <div class="item">
                                <div class="left">
                                    사무실 지도
                                </div>
                                <div class="right full">
                                   <input type="hidden" id="map" name="map" value="<?php echo !empty($user_data['map'])?$user_data['map']:'';?>" >
<div class="crop-avatar">
<a class="avatar-view" style="width: auto; height: auto;">
<img src="<?php echo !empty($user_data['map'])?base_url().$user_data['map']:base_url().'resource/admin/resources/crop/user_map.png';?>" 
 data-width="511" data-height="163" data-element-id="map" style="max-width: 100%;"></a><input type="hidden" class="upload_img_error" style="opacity:0;" id="upload_img_02" name="upload_img_02" value=""> </div>

                                </div>
                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                요금안내
                            </div>
                            <div class="item">
                                <?php for($i=0; $i<6; $i++): ?>
                                <div class="right full">
                                <input name="user_price_index[]" type="hidden" value="<?php echo !empty($user_price_array[$i]['user_price_index'])?$user_price_array[$i]['user_price_index']:'';?>">
                                <input value="<?php echo !empty($user_price_array[$i]['user_price_item'])?$user_price_array[$i]['user_price_item']:'';?>" style="width:15%" class="form-control special" name="user_price_item[]">
                                <input value="<?php echo !empty($user_price_array[$i]['user_price_value'])?$user_price_array[$i]['user_price_value']:'';?>" type="number" style="width:25%" class="form-control special" name="user_price_value[]">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                경력
                            </div>
                            <div class="item">
                                <?php for($i=0; $i<6; $i++): ?>
                                <div class="right full">
                                <input name="user_work_experience_index[]" type="hidden" value="<?php echo !empty($user_work_experience_array[$i]['user_work_experience_index'])?$user_work_experience_array[$i]['user_work_experience_index']:'';?>">
                                <input value="<?php echo !empty($user_work_experience_array[$i]['experience_item'])?$user_work_experience_array[$i]['experience_item']:'';?>" style="width:15%" class="form-control special" name="experience_item[]">
                                <input value="<?php echo !empty($user_work_experience_array[$i]['experience_description'])?$user_work_experience_array[$i]['experience_description']:'';?>" style="width:25%" class="form-control special" name="experience_description[]">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                이력
                            </div>
                            <div class="item">
                                <?php for($i=0; $i<6; $i++): ?>
                                <div class="right full">
                                <input name="user_history_index[]" type="hidden" value="<?php echo !empty($user_history_array[$i]['user_history_index'])?$user_history_array[$i]['user_history_index']:'';?>">
                                <input value="<?php echo !empty($user_history_array[$i]['user_history_item'])?$user_history_array[$i]['user_history_item']:'';?>" style="width:15%" class="form-control special" name="user_history_item[]">
                                <input value="<?php echo !empty($user_history_array[$i]['user_hisotry_description'])?$user_history_array[$i]['user_hisotry_description']:'';?>" style="width:25%" class="form-control special" name="user_hisotry_description[]">
                                </div>
                                <?php endfor; ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">
                    <div class="form form_01">
                        <div class="content">
                            <div class="clear"></div>
                            <div class="item title">
                                
                            </div>
                            <div class="item">
                                    <div class="full special right">
                                        <button type="submit" class="btn btn-primary bigger btn-submit">
                                            저장하기
                                        </button>
                                    </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>

<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog"
tabindex="-1">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="avatar-form" action="<?php echo site_url('crop/resizeImage');?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="avatar-modal-label" style="color:#000;">사진</h4>
            </div>
            <div class="modal-body">
                <div class="avatar-body">

                    <!-- Upload image and data -->
                    <div class="avatar-upload" style="color:#000;">
                        <input type="hidden" class="avatar-src" name="avatar_src">
                        <input type="hidden" class="avatar-data" name="avatar_data">
                        <input type="hidden" id="aspect_width" name="aspect_width" value="">
                        <input type="hidden" id="aspect_height" name="aspect_height" value="">
                        <label for="avatarInput">업로드</label>
                        <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">(마우스 휠로 크기 조절이 가능합니다)
                    </div>

                    <!-- Crop and preview -->
                    <div class="row">
                        <div class="col-md-9">
                            <div class="avatar-wrapper"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="avatar-preview preview-lg"></div>
                            <div class="avatar-preview preview-md"></div>
                            <div class="avatar-preview preview-sm"></div>
                        </div>
                    </div>
                    <div class="row avatar-btns">
                        <div class="col-md-9">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90"
                                title="Rotate -90 degrees">좌회전
                            </button>
                            <button type="button" class="btn btn-primary" data-method="rotate"
                            data-option="-15">-15deg
                        </button>
                        <button type="button" class="btn btn-primary" data-method="rotate"
                        data-option="-30">-30deg
                    </button>
                    <button type="button" class="btn btn-primary" data-method="rotate"
                    data-option="-45">-45deg
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-method="rotate" data-option="90"
                title="Rotate 90 degrees">우회전
            </button>
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="15">
                15deg
            </button>
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">
                30deg
            </button>
            <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">
                45deg
            </button>
        </div>
        <div class="clearfix"></div>
        <div class="btn-group" style="margin-top:15px;">
           <button type="button" class="btn btn-primary" data-method="reset">리셋</button>
       </div>
   </div>
   <div class="col-md-3">
    <button style="width: 100px" type="submit" class="btn btn-primary btn-block avatar-save">저장</button>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>

    <?php $this->load->view('include/footer');?>

<script src="http://project-05.ithanhua.cn/resource/admin/resources/crop/cropper.min.js"></script> 
<script src="http://project-05.ithanhua.cn/resource/admin/resources/crop/crop_avatar_one_main_v2.js"></script>
<link href="http://project-05.ithanhua.cn/resource/admin/resources/crop/cropper.css" rel="stylesheet">
<link href="http://project-05.ithanhua.cn/resource/admin/resources/crop/cropper.min.css" rel="stylesheet">
<script>

ajax_list[ 'test_ajax_file_url' ] = '<?php echo site_url('Main/upload_file') ?>';

</script>

<script>
<?php
	if (isset($regional_level1_list)){
        echo "var regional_level1_list = ". json_encode($regional_level1_list) . ";\n";
    } else {
        echo "var regional_level1_list = '';\n";
	}
	if (isset($regional_level2_list)){
        echo "var regional_level2_list = ". json_encode($regional_level2_list) . ";\n";
    } else {
        echo "var regional_level2_list = '';\n";
	}
	if (isset($taxonomy_level1_list)){
        echo "var taxonomy_level1_list = ". json_encode($taxonomy_level1_list) . ";\n";
    } else {
        echo "var taxonomy_level1_list = '';\n";
	}
	if (isset($taxonomy_level2_list)){
        echo "var taxonomy_level2_list = ". json_encode($taxonomy_level2_list) . ";\n";
    } else {
        echo "var taxonomy_level2_list = '';\n";
	}
	if (isset($taxonomy_level3_list)){
        echo "var taxonomy_level3_list = ". json_encode($taxonomy_level3_list) . ";\n";
    } else {
        echo "var taxonomy_level3_list = '';\n";
	}
	if (isset($taxonomy_level4_list)){
        echo "var taxonomy_level4_list = ". json_encode($taxonomy_level4_list) . ";\n";
    } else {
        echo "var taxonomy_level4_list = '';\n";
	}
	if (isset($data_get)){
        echo "var data_get = ". json_encode($data_get) . ";\n";
    } else {
        echo "var data_get = '';\n";
    }
    if (isset($user_data)){
        echo "var user_data = ". json_encode($user_data) . ";\n";
    } else {
        echo "var user_data = '';\n";
    }
    if (isset($regional_index_array)){
        echo "var regional_index_array = ". json_encode($regional_index_array) . ";\n";
    } else {
        echo "var regional_index_array = '';\n";
    }
    if (isset($user_taxonomy_array)){
        echo "var user_taxonomy_array = ". json_encode($user_taxonomy_array) . ";\n";
    } else {
        echo "var user_taxonomy_array = '';\n";
    }
    if (isset($taxonomy_index_array)){
        echo "var taxonomy_index_array = ". json_encode($taxonomy_index_array) . ";\n";
    } else {
        echo "var taxonomy_index_array = '';\n";
    }
    if (isset($user_taxonomy_index_array)){
        echo "var user_taxonomy_index_array = ". json_encode($user_taxonomy_index_array) . ";\n";
    } else {
        echo "var user_taxonomy_index_array = '';\n";
    }
    if (isset($regional_user_taxonomy_index)){
        echo "var regional_user_taxonomy_index = ". json_encode($regional_user_taxonomy_index) . ";\n";
    } else {
        echo "var regional_user_taxonomy_index = '';\n";
    }
    if (isset($user_price_array)){
        echo "var user_price_array = ". json_encode($user_price_array) . ";\n";
    } else {
        echo "var user_price_array = '';\n";
    }
    if (isset($user_work_experience_array)){
        echo "var user_work_experience_array = ". json_encode($user_work_experience_array) . ";\n";
    } else {
        echo "var user_work_experience_array = '';\n";
    }
    if (isset($user_history_array)){
        echo "var user_history_array = ". json_encode($user_history_array) . ";\n";
    } else {
        echo "var user_history_array = '';\n";
	}
	?>
    var selected_taxonomy_array = [];

    function warning_delete() {
        if(confirm('정말 삭제하시겠습니까? 삭제하면 연관된 부분에서 오류가 발생할 수 있습니다.')){
            return true;
        } else {
            return false;
        }
    }
    function addUserTaxonomy(user_taxonomy_index) {
        //selected_taxonomy_array.push([$("#taxonomy_level1").val(), $("#taxonomy_level2").val(), $("#taxonomy_level3").val(), $("#taxonomy_level4").val()]);
       
        var tag_name = '';
        for (var i=1; i<5; i++) {
            if(i==1 && ($("#taxonomy_level1").val() != '' && $("#taxonomy_level1").val() !== undefined && $("#taxonomy_level1").val() != null)) {
                tag_name = $("#taxonomy_level1 option:selected").text();
            } else {
                if($("#taxonomy_level"+i).val() != '' && $("#taxonomy_level"+i).val() !== undefined && $("#taxonomy_level"+i).val() != null) {
                    var test = $("#taxonomy_level"+i).val();
                    tag_name = tag_name + " - " + $("#taxonomy_level"+i+" option:selected").text();
                }
            }
        }
        
        var button_obj = '<div><button type="button" class="remove-taxonomy btn btn-danger change_form_unit_edit" data-type="selected" data-index="0" data-category="0" data-name="1111" data-value="1" data-status="0" data-change_type="button" style="margin-top:10px;">'
        +tag_name+'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></div>';
        $('#changed_block').append(button_obj);
        for (var i=1; i<5; i++) {
            $('#changed_block div:last-child').append('<input name="sel_taxonomy_level'+i+'[]" type="hidden" value='+$("#taxonomy_level"+i).val()+'>');
        }
        $('#changed_block div:last-child').append('<input class="user_taxonomy_index" name="user_taxonomy_index[]" type="hidden" value='+user_taxonomy_index+'>');
        $(".remove-taxonomy").on('click', function() {
            var result = warning_delete();
            if(result) {
                var user_taxonomy_index = $(this).parent().find(".user_taxonomy_index").val();
                var parent_object = $(this).parent();
                if(user_taxonomy_index != '' && user_taxonomy_index !== 'undefined') {
                    $.ajax({
					url: "<?php echo site_url('Main/deleteUserTaxonomyAjax') ?>",
					type: 'post',
					data: {'user_taxonomy_index': user_taxonomy_index
					},
					success: function(data) {
						var parsedData = $.parseJSON(data);
						if(parsedData == 'false') {
							alert('Failed.');
						} else {
                            parent_object.remove();
						}
					},
					error: function(xhr, desc, err) {
						alert("Failed !");
					}
				    });
                } else {
                    parent_object.remove();
                }
            }
        });
    }

    $().ready(function(){
        page.init.init( 4 );

        $("#btn_add_taxonomy").on('click', function () {
            addUserTaxonomy('');
        });
        $("#regional_level1").on('change', function () {
            $("#regional_level2 *").remove();
            $("#regional_level2").append('<option></option>'); 
            for (var i = 0 ; i < regional_level2_list.length; i++ ) {
                if(regional_level2_list[i].level1_index == $(this).val()) {
                    $("#regional_level2").append('<option value='+regional_level2_list[i].level2_index+'>'+regional_level2_list[i].level2_name+'</option>');
                }
            }
        });
		$("#taxonomy_level1").on('change', function () {
            $("#taxonomy_level2 *").remove();
			$("#taxonomy_level3 *").remove();
			$("#taxonomy_level4 *").remove();
            $("#taxonomy_level2").append('<option></option>'); 
            for (var i = 0 ; i < taxonomy_level2_list.length; i++ ) {
                if(taxonomy_level2_list[i].level1_index == $(this).val()) {
                    $("#taxonomy_level2").append('<option value='+taxonomy_level2_list[i].level2_index+'>'+taxonomy_level2_list[i].level2_name+'</option>');
                }
            }
        });
		$("#taxonomy_level2").on('change', function () {
			$("#taxonomy_level3 *").remove();
			$("#taxonomy_level4 *").remove();
            $("#taxonomy_level3").append('<option></option>'); 
            for (var i = 0 ; i < taxonomy_level3_list.length; i++ ) {
                if(taxonomy_level3_list[i].level2_index == $(this).val()) {
                    $("#taxonomy_level3").append('<option value='+taxonomy_level3_list[i].level3_index+'>'+taxonomy_level3_list[i].level3_name+'</option>');
                }
            }
        });
		$("#taxonomy_level3").on('change', function () {
			$("#taxonomy_level4 *").remove();
            $("#taxonomy_level4").append('<option></option>'); 
            for (var i = 0 ; i < taxonomy_level4_list.length; i++ ) {
                if(taxonomy_level4_list[i].level3_index == $(this).val()) {
                    $("#taxonomy_level4").append('<option value='+taxonomy_level4_list[i].level4_index+'>'+taxonomy_level4_list[i].level4_name+'</option>');
                }
            }
        });


         // init value
         if(typeof user_data.user_index !== 'undefined') {
            for(var i=0; i<regional_index_array.length; i++) {
                var index = i+1;
                $("#regional_level"+index).val(regional_index_array[i+1]).change();
            }
            $("#regional_user_taxonomy_index").val(regional_user_taxonomy_index);
            for(var i=0; i<taxonomy_index_array.length; i++) {
                for(var j=0; j<taxonomy_index_array[i].length; j++) {
                    var index = j+1;
                    $("#taxonomy_level"+index).val(taxonomy_index_array[i][j]).change();
                }
                addUserTaxonomy(user_taxonomy_index_array[i]);
            }
            $("#taxonomy_level1").val('');
            $("#taxonomy_level2 *").remove();
			$("#taxonomy_level3 *").remove();
			$("#taxonomy_level4 *").remove();
        }



    });

</script>

