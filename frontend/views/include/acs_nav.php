<div class="sub2_4_1_section1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <p class="title_text1">Home Improvement 사업부문</p>
                <div class="line"></div>
                <div class="sub2_tab">
                    <a data-active = 'acs' href="<?php echo site_url('page/hi/41/150')?>">시스클라인</a>
                    <a data-active = 'acs_option' href="<?php echo site_url('page/acs_option/41/151')?>">Xi유상옵션</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var _where = '<?php echo $this->uri->segment(2)?>';
    
    document.querySelector('[data-active = "'+_where+'"]').className = 'active';

</script>