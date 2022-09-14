<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    <?php $this->load->view('include/bg_common') ?>

<div class="sub3_1">
       <div class="sub3_1_1_section1">
                <div class="container">
                        <div class="row">
                                <div class="col-xs-12">
                                        <p class="title_text1">공지</p>
                                        <div class="line"></div>
                                </div>        
                        </div>
                </div>
       </div>
       <div class="sub3_1_1_section2">
            <div class="container">
                <div class="row">
                      <div class="col-lg-12 fleft">
                            <div class="kr_form">
                                <div class="kr_form_table">
                                          
                                          <div class="kr_form_tr  form_tr_detail">
                                                    
                                                    <div class="kr_form_td form_title"><a href="#"><?php echo !empty( $article->article_second_name ) ? $article->article_second_name : ''.$article->article_name ?></a></div>
                                                    <div class="kr_form_td form_auther"><span class="glyphicon glyphicon-user"></span><?php echo $article->article_author ?></div>
                                                    <div class="kr_form_td form_time"><span class="fa fa-calendar-check-o"></span><?php echo date( 'Y-m-d H:i', $article->article_created_time ) ?></div>
                                                    <div class="kr_form_td form_hit"><span class="glyphicon glyphicon-list-alt"></span>조회 <b></span><?php echo $article->article_hits ?></b>회</div>
                                          </div>
                                 </div>
                                 <div class="product_detail">
                                        <?php echo $article->article_content ?>
                                        <!-- <img src="<?php echo base_url()?>resource/frontend/images/sub3_1_1.jpg" alt=""> -->
                                 </div>

                                  <div class="article">     
                                        <?php if( !empty( $prev_article['article_name'] )):?>   
                                        <p><a href="<?php echo site_url('article/noticeDetail/'.$category_index.'/'.$sub_cg_index.'/'.$prev_article['article_index']) ?>"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_top.png" alt=""></i>이전글</b><?php echo $prev_article['article_name']?></a></p>
                                        <?php endif;?>
                                        <?php if( !empty( $next_article['article_name'] )):?> 
                                        <p><a href="<?php echo site_url('article/noticeDetail/'.$category_index.'/'.$sub_cg_index.'/'.$next_article['article_index']) ?>"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_bottom.png" alt=""></i>다음글</b><?php echo $next_article['article_name']?></a></p>
                                        <?php endif;?>
                                        <div class="list_button_block"><a href="<?php echo site_url('article/notice/'.$category_index.'/'.$sub_cg_index) ?>" class="list_button">목록</a></div>
                                 </div>
                               
                              </div>
                        </div>
                           
                 </div>
            </div>
       </div>
</div>

    <?php $this->load->view('include/footer')?>
    
    <?php $this->load->view('include/footer_script')?>
    <script>
        var _search_word = '<?php echo $this->input->get('search_word')?>';

        if( !!_search_word )
        {
            $('[name="search_word"]').val(_search_word);
        }
    </script>
    
</body>
</html>