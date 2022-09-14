<div class="sub2_2_1_section1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <p class="title_text1">부동산운영 사업부문</p>
                <div class="line"></div>
                <div class="sub2_tab">
                    <a data-active = 'apartment' href="<?php echo site_url('page/apartment/41/52')?>">아파트시설</a>
                    <a data-active = 'office' href="<?php echo site_url('page/office/41/138')?>">오피스시설</a>
                    <a data-active = 'infrastructure' href="<?php echo site_url('page/infrastructure/41/139')?>">인프라관리</a>
                    <a data-active = 'rental' href="<?php echo site_url('page/rental/41/140')?>">아파트 임대관리</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var _where = '<?php echo $this->uri->segment(2)?>';
    
    document.querySelector('[data-active = "'+_where+'"]').className = 'active';

</script>