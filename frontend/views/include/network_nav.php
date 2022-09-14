    <div class="sub2_tab">
        <a data-active = 'network' href="<?php echo site_url('page/network/41/53')?>">홈네트워크</a>
        <a data-active = 'communication' href="<?php echo site_url('page/communication/41/144')?>">정보통신공사</a>
        <a data-active = 'energy' href="<?php echo site_url('page/energy/41/145')?>">에너지솔루션</a>
    </div>
    <script>
        var _where = '<?php echo $this->uri->segment(2)?>';
        
        document.querySelector('[data-active = "'+_where+'"]').className = 'active';
</script>