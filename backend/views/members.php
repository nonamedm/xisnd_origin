<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>

		<div class="page_container index_01">

			<div class="head row index_01">

				회원 명단

			</div>

			<div class="row index_02">

				<div class="container_nav">

					<ul class="nav nav-tabs nav-justified">

						<li id="nav_tab1" data-value="" class="nav-tab">

							<a href="javascript:;">

								전체회원

							</a>

						</li>

						<li id="nav_tab2" data-value="0" class="nav-tab">

							<a href="javascript:;">

								일반 회원

							</a>

						</li>

						<li id="nav_tab3" data-value="1" class="nav-tab">

							<a href="javascript:;">

								일반 변리사

							</a>

						</li>

						<li id="nav_tab4" data-value="2" class="nav-tab">

							<a href="javascript:;">

								프리미엄 변리사

							</a>

						</li>

					</ul>

				</div>

			</div>

			<div class="row index_02 form">

				<div class="content index_02">

					<form id="search" role="form" method="get" enctype="multipart/form-data" action="<?php echo site_url('Main/members'); ?>">

						<input id="user_type" name="user_type" type="hidden" value="">
						<div class="clear"></div>

						<div class="item">

							<div class="left">

								지역

							</div>

							<div class="right">

								<div class="btn-group special like_form_unit area area_start" style="width:130px;">
									<select id="regional_level1" name="regional_level1" class="form-control">
                                        <option></option>
										<?php foreach($regional_level1_list as $i => $v): ?>
										<?php 
											
										?>
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

								관심분야

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

							</div>

						</div>

						<div class="item">

							<div class="left">

								인증신청 상태

							</div>

							<div class="right full">
								<?php foreach($enumvalue->enum_array['user_status'] as $i => $v): 
									$checked_string ='';
									if(!empty($data_get['user_status'])) {
										if($i == $data_get['user_status'])
											$checked_string = 'checked';
									}
								?>
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

								검색하기

							</div>

							<div class="right">

								<input type="text" class="form-control special search" id="search_keyword_value1" name="search_keyword_value1" placeholder="아이디, 이름, 연락처, 이메일, 자기소개, 키워드">

								<button type="submit" class="btn btn-primary special submit">
									검색하기
								</button>
								<button type="button" class="btn btn-primary special" >
									<a style="color:#fff;" href="<?php echo site_url('Main/members_detail');?>">
									추가하기
									</a>
								</button>

							</div>

						</div>

						<div class="clear"></div>
						<div class="row index_02" style="margin:15px 0;padding:15px;">
							<div>
								Showing
								<div class="btn-group" style="margin:0 5px;display:inline-block;">
									<select id="offset" name="offset" class="form-control">
										<option value="10">10</option>
										<option value="60">60</option>
										<option value="100">100</option>
									</select>
								</div>
								records per page
							</div>
						</div>

					</form>

				</div>

			</div>

			

			<div class="row index_02">

				<div class="list">

					<div>

						<a class="detail media_show sort" href="javascript:;">

							Sorting by date

							<span class="glyphicon glyphicon-triangle-bottom icon" aria-hidden="true"></span>

						</a>

					</div>

					<div class="table_block">

						<div class="table_header media_hide">

							<div style="width:75px;" class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										번호

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										아이디

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										이름

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										회원분류

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										인증상태

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										연락처

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										이메일

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										지역

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										관심분야

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										키워드

									</a>

								</div>

							</div>

							<div class="table_col" style="width:125px;">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										가입일

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;" style="font-size:0.8rem;">

										관리

									</a>

								</div>

							</div>

						</div>
						<?php foreach($list as $i => $v): ?>
						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('Main/members_detail/'.$v['user_index']);?>">
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
										<?=$v['user_index']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_id']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_name']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_type']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_status']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_tel']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_email']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['regional_name']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['taxonomy_list']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['user_keyword']?>
									</a>
								</div>
							</div>
							<div class="table_col">
								<div class="item">
									<a class="detail" href="javascript:;" style="font-size:0.8rem;">
									<?=$v['create_time']?>
									</a>
								</div>
							</div>
							<div class="table_col media_fill special">
								<div class="item">
									<button type="button" class="btn-sm btn btn-primary">
										<a href="<?php echo site_url('Main/members_detail/'.$v['user_index']);?>" style="font-size:0.8rem;">
											상세
										</a>
									</button>
									<button data-id="<?=$v['user_index']?>" type="button" class="btn-sm btn-delete btn btn-danger" style="font-size:0.8rem;">
											삭제
									</button>
								</div>
							</div>
						</div>
						<?php endforeach;?>

					</div>

				</div>

				<div class="page_number">
					<?=$pagination?>					
				</div>

			</div>

		</div>

	</div>

	<?php

$this->load->view('include/footer');
?>

	
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
	?>
	function warning_delete() {
        if(confirm('정말 삭제하시겠습니까? 삭제하면 연관된 부분에서 오류가 발생할 수 있고 복구가 안됩니다.')){
            return true;
        } else {
            return false;
        }
    }
	$().ready(function(){
		page.init.init( 4 );

		$(".page_number a").each(function(index) {
			if($(this).attr('href') != undefined) {
				var prev_href = $(this).attr('href');
				if($(this).attr('rel') == 'start' || $(this).attr('rel') == 'prev' || $(this).attr('rel') == 'next') {
					prev_href = prev_href+'?';
					
				} else {
					prev_href = prev_href+'&';
				}
				var regional_level2 = $("#regional_level2").val()
				$(this).attr('href', prev_href+'offset='+$("#offset").val()+'&search_keyword_value1='+$("#search_keyword_value1").val()
					+'&user_type='+$("#user_type").val()+'&user_status='+$("input[name='user_status']:checked").val()+'&regional_level1='+$("#regional_level1").val()
					+'&regional_level2='+$("#regional_level2").val()+'&taxonomy_level1='+$("#taxonomy_level1").val()
					+'&taxonomy_level2='+$("#taxonomy_level2").val()+'&taxonomy_level3='+$("#taxonomy_level3").val()
					+'&taxonomy_level4='+$("#taxonomy_level4").val());
			}
    	});

		$(".btn-delete").on('click', function(e) {
			e.stopPropagation();
			var result = warning_delete();
            if(result) {
				var index = $(this).attr('data-id');
                var row_object = $(this).parent().parent().parent();
                if(index != '' && index !== 'undefined') {
                    $.ajax({
					url: "<?php echo site_url('Main/deleteUserAjax') ?>",
					type: 'post',
					data: {'user_index': index
					},
					success: function(data) {
						var parsedData = $.parseJSON(data);
						console.log(parsedData);
						if(parsedData == 'false') {
							alert('회원 삭제실패하였습니다.');
						} else {
                            row_object.remove();
						}
					},
					error: function(xhr, desc, err) {
						alert("회원 삭제실패하였습니다.");
					}
				    });
                } 
            }
        });

		$(".nav-tab").on('click', function(e) {
			e.stopPropagation();
			$(this).siblings().removeClass('active');
			$(this).addClass('active');
			$("#user_type").val($(this).attr('data-value'));
			$("#search").submit();
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

		// Init 
		if(data_get.user_type !== undefined) {
			var tab_index = 1;
			if(data_get.user_type != '')
				tab_index = parseInt(data_get.user_type) + 2;
			$(".nav-tab").removeClass('active');
			$("#nav_tab"+tab_index).addClass('active');
			$("#user_type").val(data_get.user_type);
		} else {
			$(".nav-tab").removeClass('active');
			$("#nav_tab1").addClass('active');
			$("#user_type").val("");
		}
		if(data_get.regional_level1 !== undefined && data_get.regional_level1 != '') {
			$("#regional_level1").val(data_get.regional_level1).change();
		}
		if(data_get.regional_level2 !== undefined && data_get.regional_level2 != '' ) {
			$("#regional_level2").val(data_get.regional_level2).change();
		}
		if(data_get.taxonomy_level1 !== undefined && data_get.taxonomy_level1 != '') {
			$("#taxonomy_level1").val(data_get.taxonomy_level1).change();
		}
		if(data_get.taxonomy_level2 !== undefined && data_get.taxonomy_level2 != '') {
			$("#taxonomy_level2").val(data_get.taxonomy_level2).change();
		}
		if(data_get.taxonomy_level3 !== undefined && data_get.taxonomy_level3 != '') {
			$("#taxonomy_level3").val(data_get.taxonomy_level3).change();
		}
		if(data_get.taxonomy_level4 !== undefined && data_get.taxonomy_level4 != '') {
			$("#taxonomy_level4").val(data_get.taxonomy_level4).change();
		}
		if(data_get.search_keyword_value1 !== undefined && data_get.search_keyword_value1 !='') {
			$("#search_keyword_value1").val(data_get.search_keyword_value1);
		}
		if(data_get.offset !== undefined && data_get.offset != '') {
			$("#offset").val(data_get.offset);
		}
		
	});


</script>
