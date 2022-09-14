<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>
    

	<div class="sub2 sub2_3_2">
		
		<div class="sub2_3_2_section1">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<p class="title_text1">정보통신</p>
						<div class="line"></div>
						<?php $this->load->view('include/network_nav') ?>
						<p class="title_text2">정보통신공사</p>
						<p class="detail_text4">정보통신 분야의 풍부한 기술력과 실적을 바탕으로 설계, 감리, 시공, 운영으로 이어지는 <br>종합적인 ICT 인프라 구축을 담당합니다.</p>
						<div class="city_float">
							<div><img  src="<?php echo base_url()?>resource/frontend/images/city_float_01.png" alt=""></div>
							<div class="visible-lg"><img  src="<?php echo base_url()?>resource/frontend/images/city_float_02.png" alt=""></div>
							<div><img  src="<?php echo base_url()?>resource/frontend/images/city_float_03.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>
       </div>
       <div class="sub2_3_2_section3">
       		<div class="container">
       			<div class="row">
       				<h3>주요 공정</h3>
       					<div class="col-md-3 col-lg-offset-1_5">
       						<div class="row">
       							<img src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_001.jpg" class="img-responsive center-block">
       						</div>
       					</div>
       					<div class="col-md-3">
       						<div class="row">
       							<img src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_002.jpg" class="img-responsive center-block">
							</div>
       					</div>
       					<div class="col-md-3">
       						<div class="row">
       							<img src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_003.jpg" class="img-responsive center-block">
							</div>
       					</div>
       			</div>
       		</div>
       </div>
       <div class="sub2_3_2_section2">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12 page_boot">
                                       <div class="page1_boot1">
                                               <p class="title_text3 mb_50">주요 실적</p> 
                                               <div class="col-xs-6 col-sm-6 col-lg-3">
                                                     <img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_block_01.jpg" alt="">
                                                     <p class="page_boot_text1">한강센트럴자이</p>
                                               </div>
                                               <div class="col-xs-6 col-sm-6 col-lg-3">
                                                     <img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_block_02.jpg" alt="">
                                                     <p class="page_boot_text1">서울역센트럴자이</p>
                                               </div>
                                               <div class="col-xs-6 col-sm-6 col-lg-3">
                                                     <img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_block_03.jpg" alt="">
                                                     <p class="page_boot_text1">한국도로공사 구미사옥</p>
                                               </div>
                                               <div class="col-xs-6 col-sm-6 col-lg-3">
                                                     <img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_2_block_04.jpg" alt="">
                                                     <p class="page_boot_text1">반포자이</p>
                                               </div>
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
