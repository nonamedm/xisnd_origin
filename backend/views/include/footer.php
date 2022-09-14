  <div class="page_footer">

  
  
    </div>

    <div class="page_fixed_view">
  
    <a class="menu_btn index_03 fixed_menu" href="javascript:;" data-draggable="close_menu_left_bar" data-change="show&hide" data-index="00" data-target=".page_bar" data-type="click" data-callback="{start:function(target){$(target).toggleClass( 'first' );},after:function(target,_target,callback,status){status == 'in' ? $( '.fixed_menu' ).addClass( 'none' ) && $( target ).addClass( 'change' ) : $( '.fixed_menu' ).removeClass( 'none' ).removeClass( 'first' ) && $( target ).removeClass( 'change' ) }}">
    
      <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>

    </a>

    <a class="menu_btn index_03 fixed_menu left_menu_icon" href="javascript:;" data-draggable="close_menu" data-change="show&hide" data-index="00" data-target=".page_bar" data-type="click" data-callback="{start:function(target){$(target).toggleClass( 'first' );},after:function(target,_target,callback,status){status == 'in' ? $( '.page_body .page_container' ).css( 'padding-left' , 0 ) && $( '.page_body .page_bar' ).addClass( 'hide_bar' ) && $( $( '.left_menu_icon' ).children( 'span' ) ).prop( 'className' , 'glyphicon glyphicon-plus' ) : $( '.page_body .page_container' ).css({'padding-left':''}) && $( '.page_body .page_bar' ).removeClass( 'hide_bar' ) && $( $( '.left_menu_icon' ).children( 'span' ) ).prop( 'className' , 'glyphicon glyphicon-minus' ) }}">

      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>

    </a>
      
    <a class="menu_btn index_03 fixed_menu" href="javascript:;" data-draggable="close_form" data-target=".page_container .form .content" data-index="00" data-change="show&hide" data-type="click" data-callback="{start:function(target){$(target).toggleClass( 'first' );},after:function(target,_target,callback,status){status == 'in' ? $( '.fixed_menu' ).addClass( 'none' ) && $( target ).addClass( 'change' ) : $( '.fixed_menu' ).removeClass( 'none' ) && $( target ).removeClass( 'change' ) }}">
    
      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    
    </a>
  
    </div>

    <div class="page_hidden_view">



    </div>

</div>

 
    <!-- 全局js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/bootstrap.min.js?v=3.3.6"></script>

    <script>
    window.url_list = {

        editor_url : '<?php echo base_url(); ?>resource/ckeditor/',

        update_images : '<?php echo site_url('article/uploadContentImage');?>',

        upload_file_url : '<?php base_url()?>uploads/article/'

    };
  </script>
    
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/layer/layer.min.js"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/hAdmin.js?v=4.1.0"></script>
    <!-- <script src="<?php //echo base_url(); ?>resource/admin/js/jquery.validate.js"></script>
    <script src="<?php //echo base_url(); ?>resource/admin/js/validate.js"></script> -->
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<script>
  	$( function() {
    	$( "#datepicker" ).datepicker();
    	$( "#datepicker1" ).datepicker();
  	} );
  	</script>
</body>

</html>




  <script>
      var _url_position_1 = '<?php echo $this->uri->segment(1) ?>',
          _url_position_2 = '<?php echo $this->uri->segment(2) ?>';

      if( _url_position_2 == '' )
      {
          _url_position_2 = _url_position_1;
      }


      var _active_list_1  = document.querySelector( '[data-active="'+_url_position_1+'"]' ),
          _active_list_2  = document.querySelectorAll( '[data-active="'+_url_position_1+'"] ul li' ) ;


      _active_list_1.classList.add('active');


      for(var _i = 0; _i < _active_list_2.length; _i++)
      {
          var _this = _active_list_2[_i];

          if( _this.getAttribute('data-active') == _url_position_2  )
          {
              _this.classList.add('active')
          }
      }

  </script>

</body>
</html>