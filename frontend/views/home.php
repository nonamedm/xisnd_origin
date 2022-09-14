<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	 <?php $this->load->view('include/header') ?>

	<!-- <img src="<?php echo base_url()?>resource/frontend/images/image1.jpg" alt=""> -->

<div class="index_content1" style="height: 900px;">
  	<div class="container">
		<div class="text">
			<h4 class="text1">저 푸른 바람처럼,</h4>
			<p class="text2">자이 S&amp;D<span>가 함께합니다.</span></p>
		</div>
    	<div class="scroll-down"><img src="<?php echo base_url()?>resource/frontend/images/scrolldown-btn.png"></div>
    	<div class="plus_block col-md-4 col-sm-4 col-xs-12 pull-right" style="height: 900px">
			<a href="<?php echo site_url('page/Housing/41/51')?>" >
				<div class="title">
					<p>BUSSINESS FIELD</p>
					<i><img class="img-responsive" src="<?php echo base_url()?>resource/frontend/images/plus_white.png" alt=""></i> </div>
				<div class="bg" style="background-image:url(/resource/frontend/images/plus1.jpg);"> </div>
			</a>
			<a href="<?php echo site_url('page/contact/43/135')?>" >
				<div class="title">
					<p>CS</p>
					<i><img src="<?php echo base_url()?>resource/frontend/images/plus_white.png" alt=""></i> </div>
				<div class="bg" style="background-image:url(/resource/frontend/images/plus2.jpg);"> </div>
			</a>
			<a href="<?php echo site_url('page/Greetings/40/44')?>" >
				<div class="title">
					<p>COMPANY</p>
					<i><img src="<?php echo base_url()?>resource/frontend/images/plus_white.png" alt=""></i> </div>
				<div class="bg" style="background-image:url(/resource/frontend/images/plus3.jpg);"> </div>
			</a>

			<div class="clearfix"></div>
    	</div>

		<div class="clearfix"></div>
  	</div>
  	<div class="bgcolor_one_mask"></div>
  	<div class="main-bg"  style="background-image:url(/resource/frontend/images/content1_bg.jpg);"></div>
</div>

<div style="clear:both;"></div>

<div class="index_content2">
  	<div class="container">
    	<p class="text1">OUR BUSSINESS</p>
    	<div class="index_slide">
      		<div id="myCarousel" class="carousel slide slide1" data-interval="false">
				<!-- （Carousel tab） -->
				<ul class="carousel-indicators" id="myTab">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ul>
        		<!-- （Carousel item） -->
				<div class="carousel-inner">
					<div class="item active">
						<div class="pic" style="background-image: url(/resource/frontend/images/item1.jpg);"></div>
						<div class="item_block">
							<p class="text2">브랜드에 가치를 더하다, <br> 자이S&amp;D 주택개발 </p>
							<div class="line"></div>
							<p class="text3">공간에 대한 새로운 개념의 부여로 <br> 新가치를 창출합니다.</p>
							<a class="slide_btn" href="<?php echo site_url('page/housing/41/51')?>">주택개발</a>
						</div>
					</div>
					<div class="item">
						<div class="pic" style="background-image: url(/resource/frontend/images/item2.jpg);"></div>
						<div class="item_block">
							<p class="text2">철저한 분석과 품질관리,<br>
								자이S&amp;D 부동산운영관리 </p>
							<div class="line"></div>
							<p class="text3">자이S&amp;D는 다양한 건물관리 경험을 바탕으로 <br>
								시설관리, 운영서비스, 컨설팅 등 <br>
								종합 건물관리 및 운영 서비스를 제공합니다.</p>
							<a class="slide_btn" href="<?php echo site_url('page/apartment/41/52')?>">부동산운영관리</a>
						</div>
					</div>
					<div class="item item3">
						<div class="pic" style="background-image: url(/resource/frontend/images/item3.jpg);"></div>
						<div class="item_block">
							<p class="text2">공간을 초월한 테크놀러지,<br>
								자이S&amp;D 정보통신 </p>
							<div class="line"></div>
							<p class="text3">첨단 인텔리전트시스템을 통해 고객의 가치를 높이며 <br>
								더욱 편리한 스마트라이프를 제공합니다.</p>
							<a class="slide_btn"  href="<?php echo site_url('page/network/41/53')?>">정보통신</a>
						</div>
					</div>
					<div class="item">
						<div class="pic" style="background-image: url(/resource/frontend/images/item4.jpg);"></div>
						<div class="item_block">
							<p class="text2">고객에 대한 특별한 존중,<br>
								자이S&amp;D CS </p>
							<div class="line"></div>
							<p class="text3">품격 있는 서비스로 고객을 특별한 존재로 존중하며, <br>
								고급 라이프 스타일과 수준 높은 서비스를 제공합니다.</p>
							<a class="slide_btn"  href="<?php echo site_url('page/service/41/54')?>">CS</a>
						</div>
					</div>
				</div>
        		<!-- （Carousel arrow）-->

				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span></span> </a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span></span> </a>
			</div>
    	</div>
  	</div>
</div>
<div class="index_content3">
  	<div class="container">
    	<div class="row">
      		<div class="col-xs-12 col-md-4 col-sm-4 index3_block">
				<img src="<?php echo base_url()?>resource/frontend/images/index3_01.png" alt="">
        		<p class="text1">고객지원</p>

				<div class="line"></div>

				<p class="text2">고객님의 불편함을 해결해 드리기 위하여 <br>
          		최선을 다하겠습니다.</p>

				<a href="<?php echo site_url('page/contact/43/135')?>" class="index3_btn">바로가기</a>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-4 index3_block">
				<img src="<?php echo base_url()?>resource/frontend/images/index3_02.png" alt="">
				<p class="text1">채용</p>

				<div class="line"></div>

				<p class="text2">자이 S&amp;D와 함께 새로운 가치를 만들어 갈 <br>

					인재를 기다립니다.</p>
				<a href="<?php echo site_url('article/recruitment/40/46')?>" class="index3_btn">바로가기</a>
			</div>
			<div class="col-xs-12 col-md-4 col-sm-4 index3_block">
				<img src="<?php echo base_url()?>resource/frontend/images/index3_03.png" alt="">
				<p class="text1">찾아오시는길</p>

				<div class="line"></div>

				<p class="text2">자이 S&amp;D를 찾아주셔서 <br>
				감사합니다.</p>

				<a href="<?php echo site_url('page/way/40/47')?>" class="index3_btn">바로가기</a>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="line_long"></div>
</div>
<div class="index_container4">
	<div class="container">
		<div class="nav_list">
		<?php foreach ( $category as $index => $item ):?>
			<ul>
				<li><?php echo $item['category_name']?></li>
				<?php foreach ( $sub_category[$item['category_index']] as $sub_index => $sub_item ):?>
					<li><a href="<?php echo site_url($sub_item['category_template_module'].'/'.$sub_item['category_url'].'/'.$item['category_index'].'/'.$sub_item['category_index']);?>"><?php echo $sub_item['category_name']?></a></li>
				<?php endforeach;?>
			</ul>
		<?php endforeach; ; ?>
		</div>
	</div>
</div>
	<?php $this->load->view('include/footer_home') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
