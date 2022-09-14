<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    <?php $this->load->view('include/bg_common') ?>

<div class="sub3_1">
    <div class="sub3_1_section1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p class="title_text1"><?php echo $sub_page->category_name?></p>
                    <div class="line"></div>    
                </div>
            </div>
        </div>
    </div>
    <div class="sub3_1_section2">
        <div class="container">
            <div class="row">      
                <div class="col-lg-12 fleft">
                    <div class="kr_form">
                        <div class="kr_form_table">
                            
                            <div class="kr_form_tr form_big_title">
                                <div class="kr_form_td form_sorting">No.</div>
                                <div class="kr_form_td ">제목</div>
                                <div class="kr_form_td form_auther">등록일</div>
                            </div>
                            
                            <?php $i=1+$this->input->get('per_page'); foreach( $article_list as $item):
                                $imageIcon = '';
                                if( time() < ( $item['article_created_time']+604800) )
                                {
                                    $imageIcon = "<img class='article_icon' src='/resource/frontend/images/newarticle_icon.png'>";
                                }
                                ?>
                            <div class="kr_form_tr">
                                <div class="kr_form_td form_sorting"><?php echo $total_rows - $i +1 ?></div>
                                <div class="kr_form_td form_title"><a href="<?php echo site_url('article/noticeDetail/'.$category_index.'/'.$sub_cg_index.'/'.$item['article_index'])?>"><?php echo !empty($item['article_second_name']) ? $item['article_second_name'] : ''.$item['article_name']; echo $imageIcon; ?></a></div>
                                <div class="kr_form_td form_auther"><span class="fa fa-calendar-check-o"></span><?php echo date('Y-m-d',$item['article_created_time']) ?></div>
                            </div>
                            <?php $i++; endforeach;?>
                        </div> 
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="search_for">
                <form  action="" method="get" >
                    <!-- <select name="cg" class="changed_selection">
                        <option value="0">제목</option>
                        <option    value="1">제목1 </option>                                
                        <option    value="2">제목2 </option>

                    </select> -->
                    <input type="text" value="" name="search_word" id="" placeholder="" />
                    <button type="submit">검색</button>
                </form>
                </div>
                    
                <nav aria-label="..."  class="nav_block" >
                    <?php echo $page_nav; ?>
                </nav>
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