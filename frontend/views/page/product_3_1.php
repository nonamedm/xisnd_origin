<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php //$this->load->view('include/bg_common') ?>

<div class="sub6 bg_common">
  <p class="text1">제품소개</p>
  <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span>제품소개</span></p>
</div>
<div class="sub6_1 sub_content">
  <div class="container">
    <div class="row">
      <div class="title">
        <h1>제품소개</h1>
        <p>Products</p>
      </div>
	  <div class="product_list text-center">
	  	<!-- Nav tabs -->
		<ul class="nav-tabs">
			<li><a href="<?php echo site_url('page/products')?>?active=cat_01">홈네트워크 시스템</a></li>
			<li><a href="<?php echo site_url('page/products')?>?active=cat_02">홈오토메이션 시스템</a></li>
			<li class="active"><a href="<?php echo site_url('page/products')?>?active=cat_03">로비폰</a></li>
			<li><a href="<?php echo site_url('page/products')?>?active=cat_04">도어폰</a></li>
			<li><a href="<?php echo site_url('page/products')?>?active=cat_05">경비실기</a></li>
		</ul>
	  	<h3>홈네트워크 시스템</h3>
	  	<div class="product_detail">
	  		<div class="product_title">
	  			ELP-0710
	  		</div>
	  		<div class="product_content">
	  			<img src="<?php echo base_url()?>resource/frontend/images/product/product_03_01.jpg" class="img-responsive center-block">
	  			<div class="intro text-left">
	  				<h4 class="intro_brand">제조사/브랜드<span>자이 S&amp;D</span></h4>
	  				<p class="intro_title">제품설명</p>
	  				<div class="intro_name">제원</div>
	  				<div class="intro_content">
	  					<ul>
	  						<li>디스플레이 : 7인치 TFT color LCD</li>
	  						<li>인터페이스 : 정전식 터치방식</li>
	  						<li>카메라 : 47만화소</li>
	  						<li>전원 : AC free voltage</li>
	  						<li>크기 : 253(W) X 343(H) X 12(D)mm</li>
	  					</ul>
	  				</div>
	  				<div class="clearfix"></div>
	  				<div class="intro_name">기능</div>
	  				<div class="intro_content">
	  					<ul>
	  						<li>출입관리 : 비밀번호, RF카드</li>
	  						<li>통화 및 문열림 : 월패드 호출 및 통화, 월패드/경비실기로 방문자 영상 전송, 경비실 통화, 공동현관 문열림</li>
	  						<li>홈 시큐리티 : 소방 기기 연동 공동현관 문열림</li>
	  						<li>공용시스템 연동 : 엘리베이터 호출</li>
	  						<li>기타 : 근접센서 적용, 세대 공지사항/택배/주차위치 정보 제공, 날씨정보 제공, 음성안내</li>
	  					</ul>
	  				</div>
	  				<div class="clearfix"></div>
	  			</div> 
	  		</div>
	  	</div>
		<div class="article">        
		   <p><a href="<?php echo site_url('page/product_2_1')?>"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_top.png" alt=""></i>이전글</b>EAW-0710</a></p>
		   <p><a href="<?php echo site_url('page/product_4_1')?>"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_bottom.png" alt=""></i>도어폰</b>EDP-S50</a></p>
		   <div class="list_button_block"><a href="<?php echo site_url('page/products')?>?active=cat_03" class="list_button">목록</a></div>
		</div>
	  	<div class="clearfix"></div>
	  </div>
    </div>
    
  </div>
  
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
