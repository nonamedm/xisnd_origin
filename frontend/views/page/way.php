<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>

<div class="sub1_6">
	<div class="sub1_6_section1">
		<div class="container container_1050">
			<div class="row">
				<div class="col-xs-12">
					<p class="title_text1"><?php echo $sub_page->category_name?></p>
					<div class="line"></div>
					<p class="detail_text3">흔들림 없는 핵심역량과 품격높은 라이프 스타일을 추구하며 늘 고객과 소통합니다.</p>
					<img src="<?php echo base_url()?>resource/frontend/images/map.jpg" alt="" class="img-responsive center-block"> 
					<p class="detail_text4" style="margin-top:40px"><span><img src="<?php echo base_url()?>resource/frontend/images/map.png" alt=""></span><em>주소 : 서울특별시 중구 퇴계로 173 남산스퀘어 (서울특별시 중구 충무로3가 60-1)</em></p>
					<p class="detail_text4"><span><img src="<?php echo base_url()?>resource/frontend/images/phone_blue.png" alt=""></span><em>대표번호 : 02-6910-7100</em></p>
					<div class="line_long"></div>
					<div class="bus">
						<p class="detail_text4">대중교통</p>
						<p class="detail_text5"><i></i>지하철 : <span>3호선</span><span>4호선</span>   충무로역 5번 출구</p>
						<p class="detail_text5"><i></i>버스(퇴계로3가, 한옥마을 하차)</p>
						<p class="detail_text5"><b><img src="<?php echo base_url()?>resource/frontend/images/bus1.png" alt=""></b><em>N16, 104, 105, 140, 421, 463, 507, 604</em></p>
						<p class="detail_text5"><b><img src="<?php echo base_url()?>resource/frontend/images/bus2.png" alt=""></b>7011</p>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
