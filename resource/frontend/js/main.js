

(function ($) { 
	
	if($('.sub5_2.sub_content .doc-select select').length>0){
		$('.sub5_2.sub_content .doc-select select').change(function(){
			if($(this).val()!==''){
				$(this).next('a').attr('href',$(this).val());
			}else{
				$(this).next('a').attr('href','#');
			}
		})
	}
	
	
		$(".qa-list ul li").eq(0).addClass("active");
		$(".qa-list ul li").eq(0).find("i").attr("class", "minus");
		$(".qa-list ul li").eq(1).show();
		$(".question-line").click(function () {
		if ($(this).find("i").attr("class") === "plus") {
				$(".answer-line").slideUp(300);
				$(".question-line i").attr("class", "plus");
				$(this).find("i").attr("class", "minus");
				$(this).next().stop(true,true).slideDown(300);
				$(this).addClass("active").siblings().removeClass('active');
			} else {
				$(this).find("i").attr("class", "plus");
				$(this).next().stop(true,true).slideUp(300);
				$(this).removeClass('active');
			}
		});
	
//20180526
	
	//	mainpicture
	var pageheight = $(window).height();
	if($('.index_content1').length > 0) {
		if(!navigator.userAgent.match(/mobile/i)) {  
			$('.index_content1 .plus_block,.index_content1').css('height',pageheight-111);
		}else {
			$('.index_content1 .plus_block,.index_content1').css('height',410);
		}
	}
	
	setTimeout(function(){
		$('.index_content1').addClass('active');
	},800);
	
	$(window).resize(function () { 
		pageheight = $(window).height();
		if($('.index_content1').length > 0) {
			if($(window).width() < 768){
				$('.index_content1 .plus_block,.index_content1').css('height',410);
			}else {
				$('.index_content1 .plus_block,.index_content1').css('height',pageheight-111);
			}
	}
	});
	
	//Fitst page scrollspy
//	$(window).on('mousewheel', function(event, delta) {  
//		var step = $(window).height();     
//		var cur_top = $(window).scrollTop(); 
//		var direction = delta > 0 ? -1 : 1;
//		var height = direction * step + cur_top;
//		var x_height = Math.floor(height/step)*step;   
//		console.log(delta);
//		$("html, body").stop().animate({ scrollTop: x_height }, 800);   
//		return false;  
//	});
	
	$('.scroll-down').click(function(){
		$("html, body").stop().animate({scrollTop:pageheight},1000,'easeInOutQuint'); 
	});
	
	//	backtop button
	$(window).scroll(function(){
		var cur_top = $(window).scrollTop(); 
		var step = $(window).height();    
		var body =  $('html,body').height();
		var x_height = body - step ;
		if (x_height <= cur_top){
			$('.top_click').addClass('animated');
		}else {
			$('.top_click').removeClass('animated');
		}
	});
	$('.top_click').click(function(){
		$("html, body").stop().animate({scrollTop:0},1000,'easeInOutQuint'); 
	});
	
	//menu active 
	$('.dropdown-menu>li>a').each(function(){
		if(this.href===window.location.href){
			$(this).parents(".dropdown-menu").parent().addClass("active");
		}
	});
	$('.navbar-default .navbar-nav>li>a').each(function(){
		if(this.href===window.location.href){
			$(this).parent().addClass("active");
		}
	});
	//email  sub3_2_1.html
	$("#email").completer({
		separator: "@",
		source: ['naver.com','chol.com','dreamwiz.com','empal.com','freechal.com','gmail.com','hanafos.com','hanmail.net','hanmir.com','hitel.net','hotmail.com','korea.com','lycos.co.kr','nate.com','netian.com','paran.com','yahoo.com','yahoo.co.kr'],
		complete: function(){
			$('#sub3_2_form').data('bootstrapValidator')  
				.updateStatus('email', 'NOT_VALIDATED',null)  
				.validateField('email'); 
		}
	});
	//form  sub3_2_1.html
	if($('#sub3_2_form').length>0){
	$('#sub3_2_form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: '이름을 입력해주세요.'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
                        message: '이메일주소를 입력해주세요.'
                    },
                    emailAddress: {
                       message: '정확한 이메일주소를 입력해주세요.'
                    }
                }
             },
			phone: {
                validators: {
					notEmpty: {
                        message: '전화번호 입력해주세요.'
                    },
					regexp: {
                            regexp: /^[0-9]*$/,
                            message: '정확한 전화번호 입력해주세요.'
                        },
					stringLength: {
                         min: 11,
                         max: 11,
                 		 message: '정확한 전화번호 입력해주세요.'
                    },
                }
            },
			title: {
                validators: {
					notEmpty: {
                        message: '제목을 입력해주세요.'
                    }
                }
            },
			agree: {
                validators: {
                     notEmpty: {
                         message: 'The gender is required'
                     },
					stringLength: {
					  min: 3,
					  max: 4,
					  message: '用户名长度不能小于6位或超过30位'
					  },
                }
             },
			code: {
                validators: {
                     notEmpty: {
                         message: '자동등록방지번호 입력해주십시요'
                     },
					stringLength: {  
                        min: 4,  
                        max: 4,  
                        message: '자동등록방지번호 입력해주십시요',  
                    },  
					remote: {  
                        url: _code_url,  
                        message:"정확한 자동등록방지번호 입력해주십시요",  
                        type: "get",  
                        dataType: 'json',  
                        data: function() {
							if($('[name="code"]').val().length >= 4){
								 return {
                                   code: $('[name="code"]').val()
                               };
							}  
                    	},
                        delay: 2000,  
                    },  
				}
             },
			content: {
                validators: {
					notEmpty: {
                        message: ' 상담내용을 입력해주세요.'
                    }
                }
            }
        }
    });
	}
	//phone numbaer autotab sub3_2_1.html
	function isNumber(value) {     
		var patrn = /^(-)?\d+(\.\d+)?$/;
		if (patrn.exec(value) === null || value === "") {
			return false;
		} else {
			return true;
		}
	}
	var numbers = 0;
	$('#phone_2').mousedown(function(){
		numbers = 0;
	});
	$('#phone_2').bind('input propertychange', function() {
		var thisval = $('#phone_2').val();
		if(isNumber($(this).val())){
			numbers = numbers + 1;
		}else{
			$('#phone_2').val(thisval.substring(0,thisval.length-1));
		}
		if(numbers === 4){
			$('#phone_3').val("");
			$('#phone_3').focus();
		}
		$('#phone').val($('#phone_1').val() + $('#phone_2').val() + $('#phone_3').val());
	});
	$('#phone_3').bind('input propertychange', function() {
		if(!isNumber($(this).val())){
			$('#phone_3').val($('#phone_3').val().substring(0,$('#phone_3').val().length-1));
		}
		$('#phone').val($('#phone_1').val() + $('#phone_2').val() + $('#phone_3').val());
		if($('#phone_3').val().length === 4){
			$('#sub3_2_form').data('bootstrapValidator')  
			.updateStatus('phone', 'NOT_VALIDATED',null)  
			.validateField('phone'); 
		}
	});
	$('#phone_1').change(function(){
		$('#phone').val($('#phone_1').val() + $('#phone_2').val() + $('#phone_3').val());
	});
	$('#phone_2,#phone_3').blur(function(){
		$('#sub3_2_form').data('bootstrapValidator')  
			.updateStatus('phone', 'NOT_VALIDATED',null)  
			.validateField('phone'); 
	});
	
	//product tab active sub6_1.html
	if($.Util.getQueryString("active")!== undefined){
		$('.product_main .nav-tabs li').removeClass('active');
		$('.nav-tabs li a').each(function(){
			if($(this).attr('href')==="#"+$.Util.getQueryString("active")){
				$(this).parent().addClass('active');
			}
		});
		$('.tab-content .tab-pane').removeClass('in active');
		$('.tab-content .tab-pane').each(function(){
			if($(this).attr('id')===$.Util.getQueryString("active")){
				$(this).addClass('fade in active');
			}
		});
	}
	if($.Util.getQueryString("active") === false ){
		if($('.sub6_1 .product_main').length > 0) {
			$('.sub6_1 .product_main .nav-tabs li:first').addClass('active');
			$('.sub6_1 .tab-content .tab-pane:first').addClass('fade in active');
		}
	}


//sub2_1	

              $('.owl-carousel').owlCarousel({
                loop:true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true,
                nav:true,
                dots:false,
                margin:27,
                navClass:['owl-prev glyphicon glyphicon-chevron-left','owl-next glyphicon glyphicon-chevron-right'],
                navText:['',''],
                responsive: {
                  300: {
                    items: 1,
                  },
                  650: {
                    items: 2,
                  
                  },
                  1000: {
                    items: 3,
                  
                  },
                  1230: {
                    items: 4,
                  }
                }
              });

//06/06   tab hover
              $(".blue_group li").hover(function(){ 
                    var index=$(this).index(); 
                    $(this).addClass("active"); 
                    $(".tab-content .tab-pane").eq(index).addClass("in active");  
                }).mouseleave(function(){ 
                    var index=$(this).index();  
                    $(this).removeClass("active"); 
                    $(".tab-content .tab-pane").eq(index).removeClass("in active");  
                });

//06/14   tab hover
              $(".sub2_4_1_hover li").hover(function(){ 
                    var index=$(this).index(); 
                    $(this).addClass("active"); 
                    $(".tab-content .tab-pane").eq(index).addClass("in active");  
                }).mouseleave(function(){ 
                    var index=$(this).index();  
                    $(this).removeClass("active"); 
                    $(".tab-content .tab-pane").eq(index).removeClass("in active");  
                });	
		
	
	
	
	
})(jQuery);

