<div class="sub2_4_1_section1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <p class="title_text1">CS</p>
                <div class="line"></div>
                <div class="sub2_tab">
                    <a data-active = 'service' href="<?php echo site_url('page/service/41/54')?>">고객서비스</a>
                    <a data-active = 'options' href="<?php echo site_url('page/options/41/141')?>">Housing Service</a>
                    <a data-active = 'diagnosis' href="<?php echo site_url('page/diagnosis/41/142')?>">시설물 안전진단</a>
                    <a data-active = 'center' href="<?php echo site_url('page/center/41/143')?>">고객상담 서비스센터</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var _where = '<?php echo $this->uri->segment(2)?>';
    
    document.querySelector('[data-active = "'+_where+'"]').className = 'active';

</script>