
    <!-- 全局js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/bootstrap.min.js?v=3.3.6"></script>


    
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/layer/layer.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/hAdmin.js?v=4.1.0"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/textSum.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/pace/pace.min.js"></script>
    


    <script>

            
        var _url_position_1 = '<?php echo $this->uri->segment(1) ?>',
            _url_position_2 = '<?php echo $this->uri->segment(2) ?>';

            if( _url_position_2 == '' )
            {
                _url_position_2 = _url_position_1;
            }

        var _active_list_1  = document.querySelector( '[data-active="'+_url_position_1+'"]' ),
            _active_list_2  = document.querySelectorAll( '[data-active="'+_url_position_1+'"] ul li' ) ;

        if( !!_active_list_1 )
        {
            _active_list_1.classList.add('active');
        }
            
        for(var _i = 0; _i < _active_list_2.length; _i++)
        {
            var _this = _active_list_2[_i];

            if( _this.getAttribute('data-active') == _url_position_2  )
            {
                _this.classList.add('active')
            }
        }

    </script>

    <script>

        var change_className = function( w , u ){

            var jquery_w = $( w ).on( 'resize' , function(){

                jquery_w.width() > max_width && $( target ).removeClass( mini_navbar );

            } ),

                max_width = 768,

                mini_navbar = 'mini-navbar',

                target = '.' + mini_navbar;

        }( window , void( 0 ) )

    </script>

</body>

</html>