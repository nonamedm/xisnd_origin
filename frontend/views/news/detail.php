<!DOCTYPE html>
<html lang="ko">

    <?php $this->load->view('include/head')?>

<body>
<header>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default nav_01">
                <div class="container-fluid">
                    <div class="row">

                        <?php $this->load->view('include/nav')?>

                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<div class="board">
    <div class="container_content">
        <div class="row"> <a href="<?php echo base_url()?>" class="board_index"><span style="line-height: 40px;" class="glyphicon glyphicon-home"></span></a>
            <div class="btn-group board_nav">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="margin-top:0px;line-height:40px">뉴스/홍보</span>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($category as $item):?>
                        <li><a href="<?php echo site_url($item['category_template_module'].'/'.$item['category_url'].'/'.$item['category_index']); ?>"><?php echo $item['category_name'] ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>

            <div class="btn-group board_nav">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="margin-top:0px;line-height:40px">공지사항</span>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
                <ul class="dropdown-menu">

                    <?php foreach ( $sub_category[52] as $item):  ?>
                        <li><a href="<?php echo site_url($item['category_template_module'].'/'.$item['category_url'].'/'.$item['category_index']); ?>"><?php echo $item['category_name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="container_content">
    <div class="row">
        <div class="page_title">보도자료</div>

        <div class="page_detail_content">

            <div class="page_detail_content_title">
                <?php echo $news_detail->news_title; ?>
            </div>
            <div class="page_detail_content_order_message">
                <div class="page_detail_content_time"><span>작성일</span> <?php echo date('Y.m.d',$news_detail->news_create_date); ?></div>
                <div class="page_detail_content_hit"><span>조회수</span><?php echo $news_detail->news_click; ?></div>
            </div>
            <div class="page_detail_content_text">
                <?php echo $news_detail->news_content; ?>
            </div>
            <div class="pc_page_detail_nav">
                <div class="pc_page_detail_nav_prev">
                    <div class="left">
                        <a href="#"><img src="/resource/frontend/images/page_detail_prev_img.png"> <span>이전글</span></a>
                    </div>
                    <div class="pc_page_detail_nav_content">
                        <?php if ( !empty( $prev_next['prev'] ) ): ?>
                            <a href="<?php echo site_url('news/detail/'.$prev_next['prev']->news_index); ?>" style="color: #000;"> <?php echo  $prev_next['prev']->news_title  ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pc_page_detail_nav_next">
                    <div class="left"><a href=""><img src="/resource/frontend/images/page_detail_next_img.png"> <span>다음글</span></a></div>
                    <div class="pc_page_detail_nav_content">
                        <?php if ( !empty( $prev_next['next'] ) ): ?>
                            <a href="<?php echo site_url('news/detail/'.$prev_next['next']->news_index); ?>" style="color: #000;"> <?php echo  $prev_next['next']->news_title  ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="pc_page_detail_bottom_btn">
                <a href="<?php echo site_url('news/lists/'.$news_detail->news_cg_index)?>">목록</a>
            </div>


        </div>




    </div>
</div>

<?php $this->load->view('include/footer')?>

<?php $this->load->view('include/footer_script')?>

</body>
</html>