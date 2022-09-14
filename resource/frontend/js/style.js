

$(function(){
	var pageheight = $(window).height();
	$('.firstpage').css('height', pageheight);	
	$('.firstpage').on('mousewheel', function(event, delta) {  
		var step = $(window).height();     
		var cur_top = $(window).scrollTop(); 
		var direction = delta > 0 ? -1 : 1;
		var height = direction * step + cur_top;
		var x_height = Math.floor(height/step)*step;   
		console.log(step,cur_top,direction,height,x_height);
		$("html, body").stop().animate({ scrollTop: x_height }, 800);   
		return false;  
	});
});