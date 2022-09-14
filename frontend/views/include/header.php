<div class="top-attr-bar">
	<div class="container">
		<a class="brand-logos" target="_blank" href="http://www.sysclein.com"><img class="img-responsive" src="<?php echo base_url()?>resource/frontend/images/attr-brand_01.png" alt=""></a>
		<a class="brand-logos" href="<?php echo base_url()?>"><img class="img-responsive" src="<?php echo base_url()?>resource/frontend/images/attr-brand_03.png" alt=""></a>
		<a class="brand-logos" href="<?php echo base_url()?>"><img class="img-responsive" src="<?php echo base_url()?>resource/frontend/images/attr-brand_02.png" alt=""></a>
	</div>
</div>
<header>
    <div class="white_block">
        <nav class="navbar navbar-default navbar_index menu-center">
            <div class="container">
                <!-- Start Atribute Navigation -->
                
                <!-- End Atribute Navigation -->
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="<?php echo base_url()?>">
										<img src="<?php echo base_url()?>resource/frontend/images/logo1.png" alt="">
										</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-center" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"> <a href="<?php echo site_url('page/about/40');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">회사소개</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('page/greetings/40/44');?>">인사말</a></li>
                                <li><a href="<?php echo site_url('page/overview/40/146');?>">개요</a></li>
                                <li><a href="<?php echo site_url('page/organization/40/45');?>">조직도</a></li>
                                <li><a href="<?php echo site_url('article/History/40/92');?>">주요연혁</a></li>
                                <li><a href="<?php echo site_url('page/achievement/40/133');?>">수상실적</a></li>
                                <li><a href="<?php echo site_url('page/personal/40/147');?>">채용안내 </a></li>
                            </ul>
                        </li>
                        <li class="dropdown"> <a href="<?php echo site_url('page/main/41');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">사업분야</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('page/housing/41/51');?>">주택사업부문</a></li>
                                <li><a href="<?php echo site_url('page/hi/41/150');?>">Home Improvement<br>사업부문</a></li>
								<li><a href="<?php echo site_url('page/apartment/41/52');?>">부동산운영 사업부문</a></li>
                                <li><a href="<?php echo site_url('page/network/41/53');?>">정보통신</a></li>
                                <li><a href="<?php echo site_url('page/service/41/54');?>">CS</a></li>
								
                            </ul>
                        </li>

                        <li class="dropdown"> <a href="<?php echo site_url('page/sell_old_list/148');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">분양안내</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('page/sell_old_list/148/149');?>">분양안내</a></li>
                            </ul>
                        </li>
                    
                        <li class="dropdown"> <a href="<?php echo site_url('page/sell_list/1');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">공사정보</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('page/sell_list/1');?>">공사중인 단지</a></li>    
                            </ul>
                        </li>

                        <li class="dropdown"> <a href="<?php echo site_url('page/publicity/42');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">윤리경영</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('page/about/42/136');?>">소개</a></li>
                                <li><a href="<?php echo site_url('page/magazine/42/134');?>">사이버신문고</a></li>
                          </ul>
                        </li>

                        <li class="dropdown"> <a href="<?php echo site_url('page/support/43');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">고객지원</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('article/notice/43/50');?>">공지</a></li>
                                <li><a href="<?php echo site_url('page/contact/43/135');?>">문의하기</a></li>
                                <li><a href="<?php echo site_url('article/download/43/56');?>">다운로드</a></li>
                                <li><a href="<?php echo site_url('page/way/43/47');?>">오시는길</a></li>
                          </ul>
                        </li>
                       <!--  <?php $count = 0;foreach ( $category as $index => $item ):$count++;?>
                           <li class="dropdown"> <a href="<?php echo site_url($item['category_template_module'].'/'.$item['category_url'].'/'.$item['category_index']);?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $item['category_name']?></a>
                           
                       
                               <ul class="dropdown-menu">
                                   <?php foreach ( $sub_category[$item['category_index']] as $sub_index => $sub_item ):?>
                                       <li><a href="<?php echo site_url($sub_item['category_template_module'].'/'.$sub_item['category_url'].'/'.$item['category_index'].'/'.$sub_item['category_index']);?>"><?php echo $sub_item['category_name']?></a></li>
                                   <?php endforeach;?>
                               </ul>
                           </li>
                       
                       
                           <?php if($count == 3):?>
                           <li class="dropdown"> <a href="<?php echo site_url('page/sell_list/1');?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">공사정보</a>
                           <?php endif;?>
                           
                           <?php if($count == 3):?>
                                   <ul class="dropdown-menu">
                                       <li><a href="<?php echo site_url('page/sell_list/1');?>">공사중인 단지</a></li>
                                   
                               </ul>
                           </li>
                           <?php endif;?>
                       
                           
                       <?php endforeach;?> -->

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </div>
</header>
