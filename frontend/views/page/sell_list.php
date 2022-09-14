<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <div class="sub2 bg_common">
        <p class="text1">공사중인 단지</p>
        <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span>공사중인 단지</span></p>
</div>

<div class="sub2">
      <div class="container add1">
    <div class="row">
          <div class="col-xs-12">
        <p class="title_text1">공사중인 단지</p>
        <p class="detail_text3">자이S&D가 함께하는 공사 정보를 확인 하실 수 있습니다.</p>
      </div>
         
         <div class="area_search">
            <div class="search_box">
            <?php if($this->uri->segment(4)){?>
              <form action="<?php echo site_url('page/sell_list/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>" id="" name="" method="get" enctype="multipart/form-data">
            <?php }else{?>
              <form action="<?php echo site_url('page/sell_list/'.$this->uri->segment(3));?>" id="" name="" method="get" enctype="multipart/form-data">
            <?php }?>
             <!-- <form action="<?php echo site_url('page/sell_list');?>" id="" name="" method="get" enctype="multipart/form-data"> -->
              <div class="input_box">
                <input style="height: 40px;" type="text" id="searchText" name="keyword" placeholder="단지명을 입력해 주세요.">
              </div>
              <button type="submit" class="submit" title="단지검색">검색</button> 
             </form>
             </div>
          </div>
          <div class="list_tab">
          <ul>
            <li <?php if($state['is_state'] == 1):?>class="active"<?php endif;?>><a href="<?php echo site_url('page/sell_list/'."1");?>">공사중</a></li>
            <li <?php if($state['is_state'] == 2):?>class="active"<?php endif;?>><a href="<?php echo site_url('page/sell_list/'."2");?>">입주중</a></li>
            <li <?php if($state['is_state'] == 3):?>class="active"<?php endif;?>><a href="<?php echo site_url('page/sell_list/'."3");?>">입주완료</a></li>
            
          </ul>
          
    </div>
         <div class="list_type">
         <ul>
          <li class="type_title">
            <span>지역전체</span>
          </li>

          <li <?php if(@$category['xi_article_category_index'] == ""):?>class="active"<?php endif;?>>
              <a href="<?php echo site_url('page/sell_list/'.$this->uri->segment(3));?>">
                <span>지역전체</span>
              </a>
          </li>

          
          <?php foreach($regional_list as $r):?>
            <li <?php if(@$category['xi_article_category_index'] == $r['xi_article_category_index']):?>class="active"<?php endif;?>>
              <a href="<?php echo site_url('page/sell_list/'.$this->uri->segment(3).'/'.$r['xi_article_category_index']);?>">
                <span><?php echo $r['xi_article_category_name']?></span>
              </a>
          </li>
          <?php endforeach;?>
         </ul>
    </div>
          <!-- Start item01 -->
          <ul class="list_content">
          <?php foreach($sell_list as $s):?>
            <li class=" col-md-4 col-sm-6">
              <a href="<?php echo site_url('Page/sell_detail/'.$s['xi_article_index']);?>">
              <div class="list_img">
              <?php if($s['is_state'] == 1):?><div class="list_img_content_status work">공사중</div><?php endif;?>

              <?php if($s['is_state'] == 2):?><div class="list_img_content_status movein">입주중</div><?php endif;?>

              <?php if($s['is_state'] == 3):?><div class="list_img_content_status movein_end">입주완료</div><?php endif;?>


              

              <img src="<?php echo base_url();?><?php echo $s['xi_article_image']?>" class="img-responsive center-block">
              <?php $this->load->model('Article_model', 'article');
              $persent = $this->article->getPersentNewest($s['xi_article_index']);

              ?>
              <!-- <div class="circleChart">
			           <div class="circle" data-value="<?php echo $persent['xi_year_totle_percent']?>">
                 <strong></strong>
                   </div>
      			  </div> -->
             </div>
              <div class="text list_img_content">
                <p class="p1 list_img_content_title"><?php echo $s['xi_article_title']?></p>
                <p class="p2"><b>위치 :</b><?php echo $s['xi_article_location']?></p>
                <p class="p2"><b>면적 :</b><?php echo $s['xi_article_size']?></p>
                <p class="p2"><b>입주시기 :</b><?php echo $s['xi_article_time']?></p>
              </div>
              </a> 
          </li>
        <?php endforeach;?>   
      </ul>
        </div>

  </div>
      <!-- End container -->
      <div class="add1_page text-center">
    <nav aria-label="Page navigation"> <?php echo $page_nav;?></nav>
  </div>
    </div>



	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>
	<!--
<script src="<?php echo base_url()?>resource/frontend/js/circleChart.min.js"></script>
-->

<style>

.circle {
  width: 85px;
  display: inline-block;
  position: relative;
  text-align: center;
  
}

.circle canvas {
  vertical-align: top;
  width:85px;
   width:85px;
}

.circle strong {
  position: absolute;
  top: 26px;
  left: 0;
  width: 100%;
  text-align: center;
  font-size: 26px;
}
</style>
<script src="<?php echo base_url()?>resource/frontend/js/circle-progress.js"></script>

  <script>
$(".circle").each(function(){
	  var data_val = $(this).attr("data-value");
    $(this).circleProgress({
    value: data_val/100,
	fill: {gradient: [['#ffffff',.5], ['#ffffff', .5]], gradientAngle: Math.PI / 4}
  }).on('circle-animation-progress', function(event, progress, stepValue) {
	
    $(this).find('strong').html(Math.round(stepValue*100) + '%');
  });
 });
/*   $(".circleChart").each(function(){
	     var data_val = $(this).attr("data-value");
    $('this').circleProgress({
    value: data_val,
	fill: {color: '#fff'}
  }).on('circle-animation-progress', function(event, progress) {
	 var progress_value= data_val;
    $(this).find('strong').html(Math.round(100 * progress_value) + '<i>%</i>');
  });*/
        /*
  $(".circleChart").each(function(){
  var data_val = $(this).attr("data-value");
          $(this).circleChart({
            size: 85,
            value: data_val,
      color: "#fff",
      backgroundColor: "#ccc",
            text: 0,
        textSize:16,
            onDraw: function(el, circle) {
                circle.text(Math.round(circle.value) + "%");
            }
        });
  });
    
        */
    </script>
</body>
</html>
