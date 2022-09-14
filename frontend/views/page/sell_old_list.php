<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <div class="sub2 bg_common">
        <p class="text1">분양안내</p>
        <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span>분양안내</span></p>
</div>
<div class="sub2">
      <div class="container add1">
              <div class="row">
                      <div class="col-xs-12">
                              <p class="title_text1">분양안내</p>
                              <p class="detail_text3">자이S&D가 함께하는 분양정보를 확인하실수 있습니다.</p>
                              
                      </div>
                        <!-- Start item01 -->
                      <ul>
					  <?php foreach($sell_list as $s):?>
                            <li class=" col-md-4 col-sm-6"> 
                              <a href="<?php echo $s['sell_link']?>" target="_blank">
                                <img src="<?php echo base_url();?><?php echo $s['sell_file']?>" class="img-responsive center-block">
                                  <div class="text">
                                    <p class="p1"><?php echo $s['sell_title']?></p>
                                    <?php if($s['sell_type'] == "0"):?><p class="state grey">준비중</p><?php endif;?>
									                 <?php if($s['sell_type'] == "1"):?><p class="state yellow">예정</p><?php endif;?>
									                 <?php if($s['sell_type'] == "2"):?><p class="state red">완료</p><?php endif;?>
									                 <?php if($s['sell_type'] == "3"):?><p class="state blue">분양중</p><?php endif;?>
                                    <p class="p2"><b>위치 :</b><?php echo $s['sell_location']?></p>
                                    <p class="p2"><b>규모 :</b><?php echo $s['sell_generation']?></p>
                                    <p class="p2"><b>분양일정 :</b><?php echo $s['sell_inquiry']?></p>
                                    
                                  </div>
                               </a>
                            </li>
                      <?php endforeach;?>  
                      </ul>
              </div><!-- End row -->
      </div><!-- End container -->
      <div class="add1_page text-center">
        <nav aria-label="Page navigation">
          <?php echo $page_nav;?>
        </nav>
      </div>
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
