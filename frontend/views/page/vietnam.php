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
	
    <div class="sub_content sub2_5">
        <p class="text1">베트남대사관인증 안내</p>
        <a href="<?php echo site_url('page/certificateAsk/46/131')?>" class="sub1_btn"><img src="<?php echo base_url()?>resource/frontend/images/sub1_btn.jpg" alt="" ></a>
        <p class="text2">베트남대사관인증 업무를 정확하고 빠르게 제공합니다. </p>
        <div class="line"></div>
        <div class="red_line_left first"></div>
        <p class="title_left">베트남대사관 진행서류</p>
        <img src="<?php echo base_url()?>resource/frontend/images/sub2_5_01.png" alt="">
        <div class="red_line_left"></div>
        <p class="title_left">베트남대사관 인증 절차</p>
        <img src="<?php echo base_url()?>resource/frontend/images/sub2_5_02.png" alt="">
        <div class="red_line_left"></div>
        <p class="title_left">베트남대사관 진행비용</p>
        <img src="<?php echo base_url()?>resource/frontend/images/sub2_5_03.png" alt="">
</div>

<footer>
	<?php $this->load->view('include/footer')?>
</footer>

	<?php $this->load->view('include/footer_script')?>

</body>
</html>