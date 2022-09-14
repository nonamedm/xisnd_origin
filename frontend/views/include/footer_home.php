<footer>
    <div class="footer_top">
        <div class="container">
            <div class="top_click"> <img src="<?php echo base_url()?>resource/frontend/images/up.jpg" alt=""> </div>
                <ul class="ul_left">
                    <li><a href="<?php echo site_url('page/way/40/47')?>">찾아오시는길</a></li>
                    <li><a href="<?php echo site_url('page/privacy')?>"><font color="#FFE400">개인정보처리방침</font></a></li>
                    <li><a href="<?php echo site_url('page/provision')?>">서비스규정</a></li>
                    <li><a href="<?php echo site_url('article/recruitment/40/46')?>">채용정보</a></li>
                    <li><a href="<?php echo site_url('page/siteMap')?>">사이트맵</a></li>
                    <div class="clearfix"></div>
                </ul>
                <div class="dropdown ul_right">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <b>FAMILY SITE</b><span class="caret"></span> </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <?php foreach( $family_list as $item ):?>
                            <li><a href="<?php echo $item['fs_url']?>" target="_blank"><?php echo $item['fs_name']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="container">
                <div class="f_bottom1"> <img src="<?php echo base_url()?>resource/frontend/images/logo3.png" alt=""> </div>
                <div class="f_bottom2">
                    <p class="text1">서울특별시 중구 퇴계로 173 남산스퀘어 (우)04554 </p>
                    <p class="text2"><span>대표번호 02-6910-7100</span><span>FAX　02-6910-7101</span><span>사업자번호 120-86-03362</span></p>
                    <p class="text3">Copyright Xi S&D Inc.<span> All rights reserved.</span></p>
                </div>
                <div class="f_bottom3">
                    <p>주택AS<a href="tel:1577-4254"><span><img src="<?php echo base_url()?>resource/frontend/images/phone.png" alt=""></span><b>1577-4254</b></a></p>
                    <p>홈네트워크AS<a href="tel:1588-9770"><span><img src="<?php echo base_url()?>resource/frontend/images/phone.png" alt=""></span><b>1588-9770</b></a></p>
                    <p>유상옵션 문의<a href="tel:1661-6441"><span><img src="<?php echo base_url()?>resource/frontend/images/phone.png" alt=""></span><b>1661-6441</b></a></p>
                    <p>주중 09:00 ~ 17:00 주말/공휴일 휴무</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
@media(max-width:768px){
        .pc_ad_confirm{
            display: none !important;
        }

}

.pc_ad_confirm{
    position: fixed;
    z-index: 999999;
    display: none;
}
.pc_ad_confirm_content{
    width: 100%;
    float:left;
    height: 100%;
    position: relative;
}
.pc_ad_confirm_content_bottom{
    position: absolute;
    bottom: 0px;
    left:0px;
    width: 100%;
    height: 25px;
    z-index: 9;
    background: #fff;
	margin-bottom: -25px;
}
.pc_ad_confirm_content_button{
    width: 25px;
    height: 25px;
    position: absolute;
    right: 0;
    top:5px;
    font-size: 18px;
    cursor: pointer;
    margin-right: 2px;
    color: #000;
}
    .pc_ad_confirm_content_button i{
        
        color: #000;
    }
.pc_ad_confirm_content_img{
    width: 100%;
    float: left;
}
.mobile_contet_img p img{
max-width:100%;
}
</style>

<?php foreach($pop_list as $p):?>
<div class="pc_ad_confirm pc_ad_confirm_01" style="top:<?php echo $p['top']?>px; left: <?php echo $p['left']?>px; bottom:auto;  right:auto; ">
<div class="pc_ad_confirm_content">
<a class="pc_ad_confirm_content_button"><i class="glyphicon glyphicon-remove"></i></a>
<div class="pc_ad_confirm_content_bottom">
<label>
       <input type="checkbox" id="pc_ad_confirm_01" style="float:left; margin-left:10px;"> <span style="margin-top:2px; margin-left:5px; float:left;">하루동안 보지 않기
</span></label>
    
</div>
<div class="pc_ad_confirm_content_img">
<a href="<?php echo $p['pop_link']?>" target="_blank"><img src="<?php echo base_url() ?><?php echo $p['pop_img']?>" alt="">
</div>
</div>
</div>
<?php endforeach;?>

<!-- <div class="pc_ad_confirm pc_ad_confirm_01" style="top:<?php echo $pop['top']?>px; left: <?php echo $pop['left']?>px; bottom:auto;  right:auto; ">
<div class="pc_ad_confirm_content">
<a class="pc_ad_confirm_content_button"><i class="glyphicon glyphicon-remove"></i></a>
<div class="pc_ad_confirm_content_bottom">
<label>
       <input type="checkbox" id="pc_ad_confirm_01" style="float:left; margin-left:10px;"> <span style="margin-top:2px; margin-left:5px; float:left;">하루동안 보지 않기
</span></label>
    
</div>
<div class="pc_ad_confirm_content_img">
<a href="<?php echo $pop['pop_link']?>" target="_blank"><img src="<?php echo base_url() ?><?php echo $pop['pop_img']?>" alt="">
</div>
</div>
</div> -->
