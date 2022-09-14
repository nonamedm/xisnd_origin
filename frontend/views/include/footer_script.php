
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="<?php echo base_url()?>resource/frontend/js/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="<?php echo base_url(); ?>resource/frontend/js/jquery.cookie.js"></script>
<script type="text/javascript">
	$(function(){



	if($.cookie("isClose_01") != 'yes'){
			
			$(".pc_ad_confirm_01").show();
			$(".pc_ad_confirm_content_button").click(function(){
			if($('#pc_ad_confirm_01').is(':checked')){
				$(this).parent().parent().fadeOut(500);
				
				console.log($.cookie("isClose_01"));

				//$.cookie("isClose_01",'yes',{ expires:1/8640});	//测试十秒
				$.cookie("isClose_01",'yes',{ expires:1});		//一天

			}else{
				$(this).parent().parent().fadeOut(500);

				console.log($.cookie("isClose_01"));
			}
			});
		}
			});
</script>
<script src="<?php echo base_url()?>resource/frontend/js/bootstrap.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/owl_carousel_min.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/isotope.pkgd.min.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/imagesloaded.pkgd.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/bootstrap-hover-dropdown.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/jquery.validate.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/YMDClass.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/fancy-box.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/jquery.form.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/jquery.easing.1.3.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/jquery.mousewheel.min.js"></script>

<script src="<?php echo base_url()?>resource/frontend/js/bootstrapValidator.min.js"></script> 
<script src="<?php echo base_url()?>resource/frontend/js/completer.min.js"></script><!--email auto completer-->
<script src="<?php echo base_url()?>resource/frontend/js/jquery.easing.1.3.js"></script> <!--easing animate-->
<script src="<?php echo base_url()?>resource/frontend/js/jquery.mousewheel.min.js"></script> <!--scroll page down-->
<script src="<?php echo base_url()?>resource/frontend/js/jQuery-Util.js"></script> <!--Util tools-->


<script src="<?php echo base_url()?>resource/frontend/js/main.js?version=20190429"></script>


<script>

$(window).load(function() {
$("p").animate({textIndent:"0.1px"});

});
/*
$(document).ready(function(){
 $("body").fadeOut();
});*/
</script>

<!-- <script>

var _nav_active_value = '<?php //echo $this->uri->segment(4)?>';
$(document).ready(function(){
    
    navActive()

});

function navActive()
{
    if( !!($("[data-navActive='"+_nav_active_value+"']")) )
    {
        $("[data-navActive='"+_nav_active_value+"']").addClass('active');
    }
    
}

</script> -->