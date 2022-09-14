<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>

		<div class="page_container index_01">

			<div class="head row index_01">

				<span class="float_left">

					<a href="javascript:history && history.back();" style="margin-right:15px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>회원 정보

				</span>

				<span class="float_right">

					<button type="button" class="btn btn-primary" data-type="edit">EDIT</button>

					<button type="button" class="btn btn-primary" data-type="save_edit" data-url_key="delete_list_row" data-toast="true" data-ajax_title="修改用户信息操作">SAVE</button>

				</span>

			</div>

			<div class="card_block">

				<div class="row index_02 card">

					<div class="form form_01">

						<div class="content">

							<div class="clear"></div>

							<div class="item title" data-title="分类名" data-type="text" data-index="0">

								변리사 답변

							</div>

							<div class="item">

								<div class="clear"></div>

								<div class="avatar title" data-title="用户头像" data-type="image" data-index="100">

									<img class="icon_image" src="http://www.qqzhi.com/uploadpic/2015-02-02/153209128.jpg" alt=""/>

								</div>

								<div class="inline full">

									<div style="text-align:center;">

										<span class="title" data-title="用户名" data-type="text" data-index="1">홍 길동</span>

										<span class="detail" data-title="用户分类" data-type="text" data-index="2" style="font-size:.9rem;margin-left:15px;display:inline-block;">변리사</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="userid字段" data-type="text" data-index="3"> 아이디</span><span class="float_left"> : </span>

										<span class="detail" data-title="用户的userid" data-type="text" data-index="4">Junde123</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="用户名字段" data-type="text" data-index="5">이름</span><span class="float_left"> : </span><span class="detail" data-title="用户名" data-type="text" data-index="6">俊德</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="联系方式字段" data-type="text" data-index="7">연락처</span><span class="float_left"> : </span><span class="detail" data-title="用户联系方式" data-type="text" data-index="8">11111111111</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="邮箱字段" data-type="text" data-index="9">이메일</span><span class="float_left"> : </span><span class="detail" data-title="用户邮箱" data-type="text" data-index="10">1261466029@qq.com</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="地区字段" data-type="text" data-index="11">지역</span><span class="float_left"> : </span><span class="detail" data-title="用户地区内容" data-type="text" data-index="12">경상남도-창원시</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="兴趣领域字段" data-type="text" data-index="13">관심분야</span><span class="float_left"> : </span><span class="detail" data-title="用户兴趣领域内容" data-type="text" data-index="14">분야별-IT국가별-아시아-중국</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="简介字段" data-type="text" data-index="15">소개글</span><span class="float_left"> : </span><span data-title="用户简介内容" class="detail" data-type="text" data-index="16">전문기술을 바탕의 효율적인 특허 진행 <br/>같은 마음으로 성공을 돕겠습니다.</span>

									</div>

								</div>

								<div class="clear"></div>

							</div>

							<div class="clear"></div>

						</div>

					</div>

				</div>

			</div>

			<div class="card_block">

				<div class="row index_02 card">

					<div class="form form_01">

						<div class="content">

							<div class="clear"></div>

							<div class="item title" data-title="分类名" data-type="text" data-index="20">

								인증 및 평점

							</div>

							<div class="item">

								<div class="clear"></div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="星级字段" data-type="text" data-index="21">평점</span><span class="flaot_left"> : </span>

										<span class="detail" data-title="用户星级" data-type="star" data-index="22">

											<span class="detail_raty" data-rating='{"score" : 4,"readOnly": true, "space": true }'>

											</span>

											<span style="margin-left:15px;">

												<span data-type="result">4.0</span> / <span>40명</span>

											</span>

										</span>

										<!--<span class="detail">

											<span class="glyphicon glyphicon-star" data-type="icon_star" data-index="1" aria-hidden="true"></span>

											<span class="glyphicon glyphicon-star" data-type="icon_star" data-index="2" aria-hidden="true"></span>

											<span class="glyphicon glyphicon-star" data-type="icon_star" data-index="3" aria-hidden="true"></span>

											<span class="glyphicon glyphicon-star" data-type="icon_star" data-index="4" aria-hidden="true"></span>

											<span class="glyphicon glyphicon-star-empty" data-type="icon_star" data-index="5" aria-hidden="true"></span>

											<span style="margin-left:15px;">

												<span data-type="result">4.0</span> / <span>40명</span>

											</span>

										</span>-->

									</div>

								</div>

								<div class="inline">

									<div class="right">

									<span class="detail" data-title="用户成就" data-type="image" data-index="23">

										<a href="javascript:;" class="icon_achievement">

											<img class="icon_image" src="../resources/images/icon_achievement_01.png" alt=""/>

										</a>

										<a href="javascript:;" class="icon_achievement">

											<img class="icon_image" src="../resources/images/icon_achievement_01.png" alt=""/>

										</a>

										<a href="javascript:;" class="icon_achievement">

											<img class="icon_image" src="../resources/images/icon_achievement_02.png" alt=""/>

										</a>

										<a href="javascript:;" class="icon_achievement">

											<img class="icon_image" src="../resources/images/icon_achievement_02.png" alt=""/>

										</a>

									</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="历史字段" data-type="text" data-index="31">이력입니다</span><span class="flaot_left"> : </span>

										<span class="detail" data-title="用户的案例数" data-type="text" data-index="32">

											전기산업48건 IT기반48건 전력기술48건

										</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="全部字段" data-type="text" data-index="24">전체 진행건</span><span class="flaot_left"> : </span>

									<span class="detail" data-title="用户的全部案例数" data-type="text" data-index="25">

										48건

									</span>

									</div>

								</div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="三月内取得进展字段" data-type="text" data-index="26">3개월내진행건</span><span class="flaot_left"> : </span>

									<span class="detail" data-title="用户三月内取得进展的数目" data-type="text" data-index="27">

										15건

									</span>

									</div>

								</div>

								<div class="clear"></div>

							</div>

							<div class="clear"></div>

						</div>

					</div>

				</div>

				<div class="row index_02 card">

					<div class="form form_01">

						<div class="content">

							<div class="clear"></div>

							<div class="item title" data-title="分类名" data-type="text" data-index="17">

								최근진행 사례

							</div>

							<div class="item">

								<div class="clear"></div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="位置字段" data-type="text" data-index="18">주소</span><span class="flaot_left"> : </span>

									<span class="detail" data-title="用户位置信息" data-type="text" data-index="19">

										노경희 법률사무소 서울특별시 서초구 법원로 16 (서초동) 501호

									</span>

									<span class="img title" data-title="用户位置信息图片" data-type="image" data-index="109">

										<img class="icon_image" src="../resources/images/eq_map.png" alt=""/>

									</span>

									</div>

								</div>

								<div class="clear"></div>

							</div>

							<div class="clear"></div>

						</div>

					</div>

				</div>

			</div>

			<div class="card_block">

				<div class="row index_02 card">

					<div class="form form_01">

						<div class="content">

							<div class="clear"></div>

							<div class="item title" data-title="分类名" data-type="text" data-index="28">

								최근진행 사례

							</div>

							<div class="item">

								<div class="clear"></div>

								<div class="inline">

									<div class="right">

										<span class="title" data-title="最近进行的事例-标题" data-type="text" data-index="29">양육권 위자료 재산분할에 대해 궁금합니다 </span>

										<span class="detail" data-title="用户最近进行的事例-内容" data-type="text" data-index="30">

											결혼 3년차 만3세 미만 자녀 2명 싸우면 자기 화를 조절못하고 아기가 있던 말던 폭언을하고 물건을 던지고 부수는 행동을 합니다. 두번정도 애두고 나가라고 끌고 내쫓으려고도 했습니다. 육아는 도와주지않고 도와줄 시간도 없이 바쁩니다. 출근시간 9시 퇴근시간은 보통11시이며

										</span>

									</div>

								</div>

								<div class="clear"></div>

							</div>

							<div class="clear"></div>

						</div>

					</div>

				</div>

				<div class="row index_02 card">

					<div class="form form_01">

						<div class="content">

							<div class="clear"></div>

							<div class="item title" data-title="分类名" data-type="text" data-index="31">

								최근진행 사례

							</div>

							<div class="item">

								<div class="clear"></div>

								<div class="news">

									<div class="table_block">

										<div class="table_row">

											<div class="table_col">

											<span class="img detail" data-title="事例图片" data-type="image" data-index="32">

												<img class="icon_image" src="../resources/images/eq_images_01.png" alt=""/>

											</span>

											</div>

											<div class="table_col">

												<div class="content" style="text-align:left;">

													<h4 class="title" data-title="事例标题" data-type="text" data-index="33">

														이만저만! 저만이만 !

													</h4>

													<p class="detail" data-title="事例简介" data-type="text" data-index="34">

														이만저만한데 저만이만 하려면?이렇게 하면 저만 이만!

													</p>

												</div>

											</div>

										</div>

										<div class="table_row">

											<div class="table_col">

											<span class="img detail" data-title="事例图片" data-type="image" data-index="35">

												<img class="icon_image" src="../resources/images/eq_images_01.png" alt=""/>

											</span>

											</div>

											<div class="table_col">

												<div class="content" style="text-align:left;">

													<h4 class="title" data-title="事例标题" data-type="text" data-index="36">

														이만저만! 저만이만 !

													</h4>

													<p class="detail" data-title="事例简介" data-type="text" data-index="37">

														이만저만한데 저만이만 하려면?이렇게 하면 저만 이만!

													</p>

												</div>

											</div>

										</div>

									</div>

								</div>

								<div class="clear"></div>

							</div>

							<div class="clear"></div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<?php

$this->load->view('include/footer');
?>
<script>

	$().ready(function(){

		page.init.init( 4 );

	});

	page.set_add( 'search' , ['../templates/view/ajax_01.php'] );

</script>
