<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    
    <?php $this->load->view('include/bg_common') ?>

    <div class=" sub1_5">
        <div class="sub1_5_section1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php $this->load->view('include/requirement_nav') ?>
                        <!-- <p class="title_text1"><?php echo $sub_page->category_name?></p> -->
                        <p class="title_text2">인재상</p>
                        <p class="detail_text3">도전과 혁신적인 사고 방식으로 새로운 경쟁 환경에 능동적으로 대처할수 있는 인재를 찾습니다.</p>
                        <img src="<?php echo base_url()?>resource/frontend/images/sub1_5_01.png" alt="" class="img-responsive center-block">
                    </div>
                    <div class="col-xs-12">
                        <p class="title_text2">보상제도</p>
                        <p class="detail_text3">성과관리 체계에 근거한 개인의 능력과 성과에 따른 보상체계로 합리적인  연봉제를 실시하고 있습니다.</p>
                        <img src="<?php echo base_url()?>resource/frontend/images/sub1_5_02.png" alt="" class="img-responsive center-block">
                        <p class="title_text2">복리후생</p>
                    </div>
                    <div class="box_container">
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">자녀학자금</p>
                                <div class="box_text2">중·고등학교  자녀 학자금 지원</div>
                            </div>
                        </div>  
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">포상</p>
                                <div class="box_text2">장기근속 / 우수조직 / 우수사원 포상</div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">종합건강검진</p>
                                <div class="box_text2">임직원 연 1회 종합검진비 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">경조사지원</p>
                                <div class="box_text2">경조금 / 경조화환 / 조의물품 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">단체보험가입</p>
                                <div class="box_text2">질병, 상해, 암치료비 보장</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">복지카드</p>
                                <div class="box_text2">연간 1회 지급</div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">휴양시설운영</p>
                                <div class="box_text2">강촌리조트 이용 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6"  style="margin-bottom:70px;">
                            <div class="box">
                                <p class="box_text1">사내 동호회 운영</p>
                                <div class="box_text2">직원간 친선도모를 위한 취미활동 </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</div>

    <?php $this->load->view('include/footer')?>
    
    <?php $this->load->view('include/footer_script')?>
    
  </body>
</html>