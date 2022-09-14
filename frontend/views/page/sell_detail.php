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
        <p class="detail_text3">자이S&D가 함께하는 공사정보를 확인하실수 있습니다.</p>
        
        <div class="select_more">
                       
                        <label class="blind" for="more_complex">공사중인단지 선택</label>
                        <select name="more_complex" id="more_complex" style="width:200px;">
                        <?php foreach($sell_list as $s):?>
                            <option value="<?php echo site_url('page/sell_detail/'.$s['xi_article_index']);?>"><?php echo $s['xi_article_title']?></option>
                        <?php endforeach;?>
                        </select>
                        <button type="submit">이동</button>
                       
                    </div>
        <div class="area_complex_info clf">
              <div class="complex_img" > <img src="<?php echo base_url();?><?php echo $single_sell['xi_article_image']?>" alt=""> </div>
              <div class="details">
            <h3><?php echo $single_sell['xi_article_title']?></h3>
            <dl class="clf">
                  <dt>위치</dt>
                  <dd><?php echo $single_sell['xi_article_location']?></dd>
                  <dt>세대수</dt>
                  <dd><?php echo $single_sell['xi_article_num']?></dd>
                  <dt>면적</dt>
                  <dd><?php echo $single_sell['xi_article_size']?></dd>
                  <dt>입주시기</dt>
                  <dd> <?php echo $single_sell['xi_article_time']?> </dd>
                </dl>
          </div>
            </div>
        <ul class="tab_boxtype">
              <li class="content_01" style="width: 25%;"><a href="javascript:;" class="on">공사현장</a></li>
              <li class="content_02" style="width: 25%;"><a href="javascript:;">단지안내</a></li>
              <li class="content_03" style="width: 25%;"><a href="javascript:;">특장점</a></li>
              <li class="content_04" style="width: 25%;"><a href="javascript:;">평형정보</a></li>
            </ul>
        <div class="tab_container">
              <div class="tab_content" tabindex="0">
            <!-- <div class="tab_date"> <a href="#" class="fa fa-angle-left btn_prev"></a>
                  <div class="list_container">
                <ul class="list">
                      <?php $count=0;foreach($year as $y):$count++;?>

                      <li <?php if($count==1):?>class="init_fist"<?php endif;?>> <a href="#" title="<?php echo $y['xi_year_title']?>" data-percent1-value="<?php echo $y['xi_year_totle_percent']?>" data-percent2-value="<?php echo $y['xi_year_colum2']?>" data-percent2-text="<?php echo $y['xi_year_colum1']?>" data-percent3-value="<?php echo $y['xi_year_colum4']?>" data-percent3-text="<?php echo $y['xi_year_colum3']?>" data-percent4-value="<?php echo $y['xi_year_colum6']?>" data-percent4-text="<?php echo $y['xi_year_colum5']?>" data-percent5-value="<?php echo $y['xi_year_colum8']?>" data-percent5-text="<?php echo $y['xi_year_colum7']?>"><?php echo $y['xi_year_title']?></a> </li>
                    <?php endforeach;?>

                    </ul>
              </div>
                  <a href="#" class="fa fa-angle-right btn_next"></a> </div>
            <div class="percent_box clf">
                  <div class="box total">
                <h4></h4>
                <div class="percent_circle percent_circle_lineheight percent_1" percent-value="" data-size="280" data-fontsize="28" data-text="전체공정률<br/>"> 
                 <strong></strong>
                </div>
              </div>
                  <div class="box_container">
                <div class="box">
                      <h4>건축공사</h4>
                      <pre data-id="contrWorkMemo" class="percent2_text"></pre>
                      <div class="percent_circle percent_2" percent-value="" data-size="85" data-fontsize="16" data-text="">  <strong></strong> </div>
                    </div>
                <div class="box">
                      <h4>전기공사</h4>
                      <pre data-id="electricWorkMemo" class="percent3_text"></pre>
                      <div class="percent_circle percent_3" percent-value="" data-size="85" data-fontsize="16" data-text="">  <strong></strong> </div>
                    </div>
              </div>
                  <div class="box_container">
                <div class="box">
                      <h4>토목공사</h4>
                      <pre data-id="publicWorkMemo" class="percent4_text"></pre>
                      <div class="percent_circle percent_4" percent-value="" data-size="85" data-fontsize="16" data-text="">  <strong></strong> </div>
                    </div>
                <div class="box">
                      <h4>설비공사</h4>
                      <pre data-id="equipmentWorkMemo" class="percent5_text"></pre>
                      <div class="percent_circle percent_5" percent-value="" data-size="85" data-fontsize="16" data-text="">  <strong></strong> </div>
                    </div>
              </div>
                </div> -->
            <!-- percent_box --> 
            
            <!--공사현장 이미지-->
            <div class="gallery_box clf">
                  <div class="thum_list"> <a href="#" class="btn_prev fa fa-angle-left" aria-hidden="true" title="이전"></a>
                <div class="thum_con">
                    <ul class="list" >
                      <?php $count=0;foreach($images as $img):$count++;?>
                      <li <?php if($count==1):?>class="init_fist on"<?php endif;?>><a href="#" ><img src="<?php echo base_url();?><?php echo $img['xi_article_image_url']?>" alt="<?php echo $img['xi_article_image_title']?>"></a></li>
                      <?php endforeach;?>
                    </ul>
                    </div>
                <a href="#" class="btn_next fa fa-angle-right" aria-hidden="true" title="다음"></a> </div>
                <div class="img_view"><span class="date"></span><img src="" alt=""></div>
                </div>
                
          </div>
              <div class="tab_content" tabindex="0">
              <?php echo $single_sell['xi_article_content1']?> 
            
          </div>
              <!-- tab_content_02 -->
              <div class="tab_content aptPoint" tabindex="0"> 
                <?php echo $single_sell['xi_article_content2']?> 
          </div>
              <!-- tab_content_03 -->
              <div class="tab_content" tabindex="0">
            <ul class="tab_linetype unit clf">
                <?php $count=0;foreach($info as $i):$count++;?>
                    <li <?php if($count==1):?>class="init_fist"<?php endif;?>><a class="on" data-id="<?php echo $i['xi_article_info_index']?>"><span><?php echo $i['xi_article_info_title']?></span></a></li>
                <?php endforeach;?>
                  
                </ul>
            
            <div class="tab_linetype_content">
            
          </div>
            
            
          </div>
              <!-- tab_content_04 --> 
            </div>
        
       
      </div>
      <div class="btn_set">
                    <a class="btn_list" href="<?php echo site_url('page/sell_list/1');?>" >목록</a>
                </div>
        </div>
    
    <!-- End row --> 
  </div>
      <!-- End container -->
</div>
	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>
	<!--
<script src="<?php echo base_url()?>resource/frontend/js/circleChart.min.js"></script>-->

<script src="<?php echo base_url()?>resource/frontend/js/circle-progress.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>resource/frontend/js/TweenMax.min.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/front_set.js"></script> 
<style>

.circle {
 /* width: 100px;
  margin: 6px 6px 20px;
  display: inline-block;
  position: relative;
  text-align: center;
  line-height: 1.2;*/
}

.circle canvas {
  vertical-align: top;
}

.circle strong {
/*  position: absolute;
  top: 30px;
  left: 0;
  width: 100%;
  text-align: center;
  line-height: 40px;
  font-size: 30px;*/
}
/*
.circle strong i {
  font-style: normal;
  font-size: 0.6em;
  font-weight: normal;
}

.circle span {
  display: block;
  color: #aaa;
  margin-top: 12px;
}
*/
</style>
<script>
   GS.tab.init();
    GS.ajaxSet.init();
    GS.thumTab.init();

$(window).load(function() {
$("p").animate({textIndent:"0.1px"});

});
  
$(document).ready(function(){
  
  
$(".tab_linetype > li > a").click(function(){
  var linetype_id = $(this).attr("data-id");
  
  $.ajax({
      　　　　 url : "<?php echo site_url('page/getInfoAjax');?>",
      　　　　 type : "post",
              dataType:"json",
      　　  data: {
            'linetype_id':linetype_id
          },
      　　　　success : function(data) {
           console.log(data.status);
      　　　　if(data.status=="1"){
          $(".tab_linetype_content").html(data.htmltext);
        }else{
          alert("error");
        }
    　　}
    });
  
});
  
  
$(".thum_con > ul > li > a").click(function(){
  var img_src = $(this).find("img").attr("src");
  var date_title = $(this).find("img").attr("alt");
  
  $(".img_view").find("img").attr("src",img_src);
  $(".img_view").find("span").html(date_title);
});

  
$(".tab_date > .list_container >  ul > li > a").click(function(){
  
  
  $(".percent2_text").html(" ");
  $(".percent3_text").html(" ");
  $(".percent4_text").html(" ");
  $(".percent5_text").html(" ");
  
  var tab_date_title = $(this).attr("title");
  var percent1_value = $(this).attr("data-percent1-value");
  var percent2_value = $(this).attr("data-percent2-value");
  var percent2_text = $(this).attr("data-percent2-text");
  var percent3_value = $(this).attr("data-percent3-value");
  var percent3_text = $(this).attr("data-percent3-text");
  var percent4_value = $(this).attr("data-percent4-value");
  var percent4_text = $(this).attr("data-percent4-text");
  var percent5_value = $(this).attr("data-percent5-value");
  var percent5_text = $(this).attr("data-percent5-text");
  
  console.log(percent1_value,percent2_value,percent3_value,percent4_value,percent5_value);
  $(".box.total h4").html(tab_date_title);
  $(".percent_1").attr("percent-value",percent1_value);
  $(".percent_2").attr("percent-value",percent2_value);
  $(".percent_3").attr("percent-value",percent3_value);
  $(".percent_4").attr("percent-value",percent4_value);
  $(".percent_5").attr("percent-value",percent5_value);
  
  $(".percent2_text").html(percent2_text);
  $(".percent3_text").html(percent3_text);
  $(".percent4_text").html(percent4_text);
  $(".percent5_text").html(percent5_text);
  
  
  $(".percent_circle").each(function(){
  var data_val = $(this).attr("percent-value");
  var data_size = $(this).attr("data-size");
	  $(this).find("canvas").attr("width",data_size);
	  $(this).find("canvas").attr("height",data_size);
    var data_fontsize= $(this).attr("data-fontsize");
    var data_text = $(this).attr("data-text");
	   $(this).circleProgress({
    value: data_val/100,
	fill: {color: '#006899'}
  }).on('circle-animation-progress', function(event, progress, stepValue) {
	
    $(this).find('strong').html(data_text + Math.round(stepValue*100) + '%');
  });
         /* $(this).circleChart({
            size: data_size,
            value: data_val,
      color: "#006899",
      backgroundColor: "#e5e5e5",
            text: 0,
        textSize:data_fontsize,
        startAngle: 0,
            onDraw: function(el, circle) {
                circle.text( data_text + Math.round(circle.value) + "%");
            }
        });*/
  });
  
  
});
  
  $(".select_more > button").click(function(){
    var link = $("#more_complex").val();
    window.location.href=link;

    });
$(".init_fist > a").trigger("click");
});
</script> 

</body>
</html>
