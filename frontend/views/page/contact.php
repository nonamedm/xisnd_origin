<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>

<div class="sub4_2 sub_content">
    <div class="container">
        <div class="row">
            <div class="title">
                <h1>문의하기</h1>
            </div>
            <div class="sub_title">자이S&amp;D에 대해 궁금하세요? 언제든지 문의하시면 신속하게 답변드립니다. </div>
        </div>
        <div class="row cs_center text-center">
            <h4><img src="<?php echo base_url()?>resource/frontend/images/icon_phone.png">전화 상담</h4>
            <div class="col-md-4 col-sm-4">
                <h3>CS 고객센터</h3>
                <h1>1588-9770</h1>
                <p>신규 입주단지 고객님은 해당 단지<br>자이안라운지(AS센터)로  방문하시면<br> 더 자세한 안내를 받으실 수 있습니다.</p>
            </div>
            <div class="col-md-4 col-sm-4">
                <h3>유상옵션</h3>
                <h1>1661-6441</h1>
                <p>품목, 설치, 서류관련 <br>문의상담이 가능합니다.</p>
            </div>
            <div class="col-md-4 col-sm-4 after_none">
                <h3>홈네트워크</h3>
                <h1>1588-9770</h1>
                <p>홈네트워크  제품  및  사용  문의 <br>상담이  가능합니다.</p>
            </div>
            <img src="<?php echo base_url()?>resource/frontend/images/sub4_2_img01.jpg" class="img-responsive cs_img center-block">
        </div>
    </div>
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
