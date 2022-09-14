<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>

<div class="sub1_2">
       <div class="sub1_1_section1">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12">
                                        <p class="title_text1"><?php echo $sub_page->category_name ?></p>
                                        <div class="line"></div>
                                        <p class="detail_text3">흔들림 없는 핵심역량과 품격높은 라이프 스타일을 추구하며 늘 고객과 소통합니다.</p>
                                        <div class="pc_img"><img src="<?php echo base_url()?>resource/frontend/images/sub1_2_01.png" alt="" class="img-responsive center-block"></div>
                                        <div class="mobile_lg_img"><img src="<?php echo base_url()?>resource/frontend/images/sub1_2_02.png" alt="" class="img-responsive center-block"></div>
                                         <div class="mobile_sm_img"><img src="<?php echo base_url()?>resource/frontend/images/sub1_2_03.png" alt="" class="img-responsive center-block"></div>
                                </div>
                        </div>
                </div>
       </div>
</div>

	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
