<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>


	<div class="sub2 sub2_4_4">
	<?php $this->load->view('include/service_nav') ?>
       <div class="sub2_4_4_section2">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12">
                                      <p class="title_text2">고객상담 서비스센터 체계</p>
                                      <p class="blue_font">고객상담 서비스센터는 고객만족을 위한 전문 상담서비스를 제공하고 있습니다.</p>
                                      <p class="detail_text4" style="margin-bottom:112px;">이를 위해 다양한 고객문의 채널(분양, AS, 입주, 공사, 본사 등)을 일원화하여 고객상담 서비스센터를 구축하였으며 <br>고객관리시스템(CRM : Customer Relationship Management)운영으로 보다 전문화된 고객 상담서비스를 제공합니다. </p>
                                      <img  src="<?php echo base_url()?>resource/frontend/images/sub2_4_4_01.png" alt="" class="img-responsive center-block">
                                </div>

                        </div>
                </div>
       </div>
       <div class="sub2_4_4_section3">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12">
                                      <p class="title_text2">고객상담 서비스센터 차별화</p>
                                      <p class="blue_font">고객상담 서비스센터는 차별화된  전문 상담서비스를 제공하고 있습니다.</p>
                                      <p class="detail_text4" style="margin-bottom:44px;">CTI,  IVR, IP-Phone, REC sys. 등 첨단 인프라 시스템을 바탕으로 자체 개발한 상담전용 Application을 운영하고  있으며,<br>10년의 직영운영 노하우를 통해 보다 차원 높은 고객 응대 서비스를 제공합니다.</p>

                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-4"><img  src="<?php echo base_url()?>resource/frontend/images/sub2_4_4_02.png" alt=""></div>
                                <div class="col-xs-12 col-md-6 col-lg-4"><img  src="<?php echo base_url()?>resource/frontend/images/sub2_4_4_03.png" alt=""></div>
                                <div class="col-xs-12 col-md-6 col-lg-4"><img  src="<?php echo base_url()?>resource/frontend/images/sub2_4_4_04.png" alt=""></div>
                        </div>
                </div>
       </div>
           <div class="sub2_4_common">
                    <div class="container">
                            <div class="row">
                                    <div class="col-xs-12">
                                          <p class="contact_text1"><a href="tel:1577-4254"><i><img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_1_icon1.png" alt=""></i>고객상담 서비스센터<span>1577-4254</span></a></p>
                                          <p class="contact_text2"><i><img  src="<?php echo base_url()?>resource/frontend/images/sub2_3_1_icon3.png" alt=""></i>AM 09:00 ~ PM 17:00<span>주말 휴일 상담은 고객문의에 남겨주세요.</span></p>

                                    </div>

                            </div>
                    </div>
           </div>

</div>

	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

  <script>
    $('.sub2_4_common').on({
      'click':function(){
        window.open("https://www.xi.co.kr");
      }
    });
  </script>

</body>
</html>
