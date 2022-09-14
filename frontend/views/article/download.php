<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    <?php $this->load->view('include/bg_common') ?>

    <div class="sub4_1 sub_content">
        <div class="container">
            <div class="row">
                <div class="title">
                    <h1>다운로드</h1>
                    <p>Customer Service</p>
                </div>
            </div>
        <!-- item01 start-->
            <div class="row">
                <div class="download_list">
                    <ul>
                        <?php foreach( $article_list as $item ): if( !empty(  $item['article_file'] )): ?>
                            <li>
                                <div class="list_cat col-md-2 col-sm-3 "><?php echo $item['article_second_name']?></div>
                                <div class="list_title"><?php echo $item['article_name']?></div>
                                <div class="list_btn">
                                    <a href="/<?php echo $item['article_file']?>" download="<?php echo $item['article_name']?>">
                                        <span class="glyphicon glyphicon-download-alt"></span>파일 다운로드
                                    </a>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        <?php endif; endforeach;?>
                        
                    </ul>
                </div>
            </div>
    <!-- item01 end-->
        </div>
    </div>

    <?php $this->load->view('include/footer')?>
    
    <?php $this->load->view('include/footer_script')?>
    
</body>
</html>