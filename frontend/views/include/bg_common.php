
 
    <div class="<?php echo $sub_type?> bg_common">
        <?php if( !empty( $page->category_name ) ):?>
        <p class="text1"><?php echo $page->category_name ?></p>
        <?php endif;?>
        <?php if( !empty( $sub_page->category_name ) ):?>
        <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span><?php echo $page->category_name ?></span><span><?php echo $sub_page->category_name ?></span></p>
        <?php endif;?>
    </div>