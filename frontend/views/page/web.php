<!DOCTYPE html>
<html lang="kr">
<head>
	<?php $this->load->view('include/head') ?>
</head>
<body>
<header>
	<?php $this->load->view('include/header');?>
</header>

	<?php $this->load->view('include/right_bar');?>
    <?php $this->load->view('include/bg_common');?>

<div class="sub_content sub5_1">
    <p class="text1">홈페이지제작 서비스소개</p>
    <a href="<?php echo site_url('page/webAsk/107/114')?>" class="sub1_btn"><img src="<?php echo base_url()?>resource/frontend/images/sub1_btn.jpg" alt="" ></a>
    <p class="text2">하오디자인의 홈페이지제작 서비스는 10년 이상의 경험과 노하우로 검증된 프로젝트 수행력을 가지고 있습니다. <br> 
                        지금껏 보지 못했던 크리에이티브한 맞춤형 홈페이지를 만나보세요.</p>
    <img src="<?php echo base_url()?>resource/frontend/images/sub5_1_01.png" alt="">
    <div class="red_line_left"></div>
    <p class="title_left">홈페이지제작 절차</p>
    <img src="<?php echo base_url()?>resource/frontend/images/sub5_1_02.png" alt="">
    <div class="red_line_left"></div>
    <p class="title_left">홈페이지제작 서비스</p>
    <img src="<?php echo base_url()?>resource/frontend/images/sub5_1_03.png" alt="">
</div>

<footer>
	<?php $this->load->view('include/footer')?>
</footer>

	<?php $this->load->view('include/footer_script')?>

</body>
</html>