<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php //$this->load->view('include/bg_common') ?>

<div class="sub5 bg_common">
  <p class="text1">사이트맵</p>
  <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span>사이트맵</span></p>
</div>

<div class="sub5_1 sub_content">
  <div class="container">
    <div class="row">
      <div class="title">
        <h1>사이트맵</h1>
      </div>
    </div>
	<!-- item01 start-->
   <div class="row" style="text-align: center;">
   	<div class="site_map">
		<div class="main_menu"><a href="<?php echo site_url('page/overviewAndGreetings/40/44')?>">회사소개</a>
			<ul>
                <li><a href="<?php echo site_url('page/Greetings/40/44')?>">인사말</a></li>
                <li><a href="<?php echo site_url('page/overview/40/146')?>">개요</a></li>
				<li><a href="<?php echo site_url('page/organization/40/45')?>">조직도</a></li>
				<li><a href="<?php echo site_url('article/history/40/92')?>">주요연혁</a></li>
				<li><a href="<?php echo site_url('page/achievement/40/133')?>">수상실적</a></li>
				<li><a href="<?php echo site_url('page/personal/40/147')?>">채용안내</a></li>
			</ul>
		</div>
		<div class="main_menu"><a href="<?php echo site_url('page/housing/41/51')?>">사업분야</a>
			<ul>
				<li><a href="<?php echo site_url('page/housing/41/51')?>">주택개발</a></li>
				<li><a href="<?php echo site_url('page/apartment/41/52')?>">부동산운영관리</a>
					<ul>
						<li><a href="<?php echo site_url('page/apartment/41/52')?>">- 아파트시설</a></li>
						<li><a href="<?php echo site_url('page/office/41/138')?>">- 오피스시설</a></li>
						<li><a href="<?php echo site_url('page/infrastructure/41/139')?>">- 인프라관리</a></li>
						<li><a href="<?php echo site_url('page/rental/41/140')?>">- 아파트 임대관리</a></li>
						<div class="clearfix"></div>
					</ul>
				</li>
				<li><a href="<?php echo site_url('page/network/41/53')?>">정보통신</a>
					<ul>
						<li><a href="<?php echo site_url('page/network/41/53')?>">- 홈네트워크</a></li>
						<li><a href="<?php echo site_url('page/communication/41/144')?>">- 정보통신공사</a></li>
						<li><a href="<?php echo site_url('page/energy/41/145')?>">- 에너지솔루션</a></li>
						<div class="clearfix"></div>
					</ul>
				</li>
				<li><a href="<?php echo site_url('page/service/41/54')?>">CS</a>
					<ul>
						<li><a href="<?php echo site_url('page/service/41/54')?>">- 고객서비스</a></li>
						<li><a href="<?php echo site_url('page/options/41/141')?>">- Xi옵션</a></li>
						<li><a href="<?php echo site_url('page/diagnosis/41/142')?>">- 시설물 안전진단</a></li>
						<li><a href="<?php echo site_url('page/center/41/143')?>">- 고객상담 서비스센터</a></li>
						<div class="clearfix"></div>
					</ul>
				</li>
				<div class="clearfix"></div>
			</ul>
		</div>
		<div class="main_menu"><a href="<?php echo site_url('page/about/42/136')?>">윤리경영</a>
			<ul>
				<li><a href="<?php echo site_url('page/about/42/136')?>">소개</a></li>
                <li><a href="<?php echo site_url('page/magazine/42/134')?>">사이버신문고</a></li>
			</ul>
		</div>
		<div class="main_menu"><a href="<?php echo site_url('article/notice/43/50')?>">고객지원</a>
			<ul>
				<li><a href="<?php echo site_url('article/notice/43/50')?>">공지</a></li>
                <li><a href="<?php echo site_url('page/contact/43/135')?>">문의하기</a></li>
                <li><a href="<?php echo site_url('article/download/43/56')?>">다운로드</a></li>
                <li><a href="<?php echo site_url('page/way/43/47')?>">오시는길</a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
		</div>
   </div>
    <!-- item01 end-->
  </div>
  
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
