<div class="sub2_2_1_section1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <p class="title_text1">채용안내 </p>
                <div class="line"></div>
                <div class="sub2_tab">
                    <a data-active = 'personal' href="<?php echo site_url('page/personal/40/147')?>">인사제도</a>
                    <a data-active = 'recruitment' href="<?php echo site_url('article/recruitment/40/46')?>">채용공고</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var _where = '<?php echo $this->uri->segment(2)?>';
    
    document.querySelector('[data-active = "'+_where+'"]').className = 'active';

</script>