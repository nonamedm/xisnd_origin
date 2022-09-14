<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>

		<div class="page_container index_01">

			<div class="head row index_01">

				일반 회원 신청서 목록

			</div>

			<div class="row index_02">

				<div class="container_nav">

					<ul class="nav nav-tabs nav-justified">

						<li>

							<a href="<?php echo site_url('main/members');?>">

								변호사 명단

							</a>

						</li>

						<li>

							<a href="<?php echo site_url('main/members_ordinary');?>">

								일반 회원 목록

							</a>

						</li>

						<li>

							<a href="<?php echo site_url('main/members_application');?>">

								변호사 신청서 목록

							</a>

						</li>

						<li class="active">

							<a href="<?php echo site_url('main/members_ordinary_application');?>">

								일반 회원 신청서 목록

							</a>

						</li>

					</ul>

				</div>

			</div>

			<div class="row index_02 form">

				<div class="content index_02">

					<form action="?form_url=form" id="search" onsubmit="return (function(){

						return page.init.send_form_data( 'search' , 'http://127.0.0.1/test.php' , 'GET' );

					})();">

						<div class="clear"></div>

						<div class="item">

							<div class="left">

								지역

							</div>

							<div class="right">

								<div class="btn-group special like_form_unit like_selection area area_start" data-draggable="search" data-name="area_01" data-value="0">

									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span data-type="show">Please Select ...</span> <span class="caret"></span>
									</button>

									<ul class="dropdown-menu" data-type="options_block">
										<li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">Please Select ...</a></li>
										<li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">Area - A</a></li>
										<li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">Area - B</a></li>
										<li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">Area - C</a></li>
									</ul>

								</div>

								<div class="btn-group special like_form_unit like_selection area area_end" data-draggable="search" data-name="area_02" data-value="0">

									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
										<span data-type="show">Please Select ...</span> <span class="caret"></span>
									</button>

									<ul class="dropdown-menu" data-type="options_block">
										<li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">Please Select ...</a></li>
										<li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">Area - A</a></li>
										<li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">Area - B</a></li>
										<li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">Area - C</a></li>
									</ul>

								</div>

							</div>

						</div>

						<div class="item">

							<div class="left">

								관심분야

							</div>

							<div class="right" id="change_block">

								<div class="btn-group special like_form_unit like_selection" data-draggable="search" data-type="selection" data-category="search" data-name="field" data-value="0" data-index="0">

									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span data-type="show">Please Select ...</span><span class="caret"></span>
									</button>

									<ul class="dropdown-menu" data-type="options_block">
										<li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">Please Select ...</a></li>
										<li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">field - A</a></li>
										<li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">field - B</a></li>
										<li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">field - C</a></li>
									</ul>

								</div>

							</div>

						</div>

						<div class="item">

							<div class="left">

								검색하기

							</div>

							<div class="right">

								<div class="btn-group special search_criteria like_selection like_form_unit" data-draggable="search" data-name="search_type" data-value="0">

									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<span data-type="show">이름</span> <span class="caret"></span>
									</button>

									<ul class="dropdown-menu" data-type="options_block">
										<li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">이름</a></li>
										<li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">연락처</a></li>
										<li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">이메일</a></li>
									</ul>

								</div>

								<input type="text" class="form-control special search" name="search_value" placeholder="input ...">

								<button type="submit" class="btn btn-primary special submit">

									검색하기

								</button>

							</div>

						</div>

						<div class="clear"></div>

					</form>

				</div>

			</div>

			<div class="row index_02" style="margin:15px 0;padding:15px;">

				<div>

					Showing

					<div class="btn-group" style="margin:0 5px;display:inline-block;">

						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							30 <span class="caret"></span>
						</button>

						<ul class="dropdown-menu">

							<li><a href="?nav=30" style="color:#333;">30</a></li>
							<li><a href="?nav=60" style="color:#333;">60</a></li>
							<li><a href="?nav=100" style="color:#333;">100</a></li>
							<li><a href="?nav=All" style="color:#333;">All</a></li>
						</ul>

					</div>

					records perpage

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

									<a class="detail" href="javascript:;">

										번호

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										아이디

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										이름

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										연락처

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										이메일

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										지역

									</a>

								</div>

							</div>

							<div class="table_col" style="width:125px;">

								<div class="item">

									<a class="detail" href="javascript:;">

										신청일

										<span class="glyphicon glyphicon-triangle-bottom icon" aria-hidden="true"></span>

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										관리

									</a>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

						<div class="table_row" data-type="click" data-change="jump" data-url="<?php echo site_url('main/members_application_info');?>.html">

							<div class="table_col media_hide">

								<div class="item">

									<a class="detail" href="javascript:;">

										1

									</a>

								</div>

							</div>

							<div class="table_col media_fill">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">아이디 : </span>Junde123

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이름 : </span>俊德

									</a>

								</div>

							</div>

							<div class="table_col media_half">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">연락처 : </span>1111111111

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">이메일 : </span>111111@qq.com

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">지역 : </span>경상남도-창원시

									</a>

								</div>

							</div>

							<div class="table_col">

								<div class="item">

									<a class="detail" href="javascript:;">

										<span class="media_show">신청일 : </span>2018.1.2

									</a>

								</div>

							</div>

							<div class="table_col media_fill special">

								<div class="item">

									<button type="button" class="btn btn-primary">

										<a href="<?php echo site_url('main/members_application_info');?>.html">

											상세

										</a>

									</button>

									<button type="button" class="btn btn-danger" data-type="form" data-url_key="delete_list_row" data-ajax_category="00" data-ajax_index="09" data-toast="true" data-ajax_title="删除操作">삭제</button>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="page_number">

					<ul>

						<li class="item toLeft"><a href="javascript:;"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a></li>
						<li><a href="?nav=01">1</a></li>
						<li><a href="?nav=02">2</a></li>
						<li><a href="?nav=03">3</a></li>
						<li><a href="?nav=04">4</a></li>
						<li><a href="?nav=05">5</a></li>
						<li><a href="?nav=06">6</a></li>
						<li><a href="?nav=07">7</a></li>
						<li><a href="?nav=08">8</a></li>
						<li><a href="?nav=09">9</a></li>
						<li><a href="?nav=10">10</a></li>
						<li class="item toRight"><a href="javascript:;"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></li>

					</ul>

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

	page.set_add( 'search' , ['../templates/view/ajax_01.php','../templates/view/ajax_02.php'] );

</script>
