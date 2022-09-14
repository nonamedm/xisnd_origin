<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>
 
	
		<div class="page_container index_01">
		
			<div class="head row index_01">
			
				USER SETTING
			
			</div>

			<div class="row index_02">

				<div class="container_nav">

					<ul class="nav nav-tabs nav-justified">

						<li>

							<a href="<?php echo site_url('main/setting');?>">

								BASE SETTING

							</a>

						</li>

						<li class="active">

							<a href="<?php echo site_url('main/setting_theme');?>">

								THEME SETTING

							</a>

						</li>

					</ul>

				</div>

			</div>

			<div class="row index_02" style="margin:15px 0;">

				<div class="form form_01">

					<div class="content">

						<div class="clear"></div>

						<div class="item title">

							Change Theme

						</div>

						<div class="item">

							<div class="right">

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_theme" value="theme_01" style="position:relative;top:2px;">

										<span>

											Theme ： bark

										</span>

									</label>

								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_theme" value="theme_02" style="position:relative;top:2px;">

										<span>

											Theme ： white

										</span>

									</label>
								</div>

							</div>

						</div>

						<div class="clear"></div>

					</div>

				</div>

			</div>

			<div class="row index_02" style="margin:15px 0;">

				<div class="form form_01">

					<div class="content">

						<div class="clear"></div>

						<div class="item title">

							Change Font Size

						</div>

						<div class="item">

							<div class="right">

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="10px" style="position:relative;top:2px;">

										<span style="font-size:10px;">

											Font Size : 10px

										</span>

									</label>

								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="12px" style="position:relative;top:2px;">

										<span style="font-size:12px;">

											Font Size : 12px

										</span>

									</label>
								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="14px" style="position:relative;top:2px;">

										<span style="font-size:14px;">

											Font Size : 14px

										</span>

									</label>
								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="16px" style="position:relative;top:2px;">

										<span style="font-size:16px;">

											Font Size : 16px

										</span>

									</label>
								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="18px" style="position:relative;top:2px;">

										<span style="font-size:18px;">

											Font Size : 18px

										</span>

									</label>
								</div>

								<div class="radio" style="width:100%;">

									<label>

										<input type="radio" name="change_font_size" value="20px" style="position:relative;top:2px;">

										<span style="font-size:20px;">

											Font Size : 20px

										</span>

									</label>
								</div>

							</div>

						</div>

						<div class="clear"></div>

					</div>

				</div>

			</div>
		
		</div>
	
	</div>

    <div class="page_footer">

	
	
    </div>

    <div class="page_fixed_view">
	
		<a class="menu_btn index_03 fixed_menu" href="javascript:;" data-draggable="close_menu_left_bar" data-change="show&hide" data-index="00" data-target=".page_bar" data-type="click" data-callback="{start:function(target){$(target).toggleClass( 'first' );},after:function(target,_target,callback,status){status == 'in' ? $( '.fixed_menu' ).addClass( 'none' ) && $( target ).addClass( 'change' ) : $( '.fixed_menu' ).removeClass( 'none' ).removeClass( 'first' ) && $( target ).removeClass( 'change' ) }}">
		
			<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>

		</a>

		<a class="menu_btn index_03 fixed_menu left_menu_icon" href="javascript:;" data-draggable="close_menu" data-change="show&hide" data-index="00" data-target=".page_bar" data-type="click" data-callback="{start:function(target){$(target).toggleClass( 'first' );},after:function(target,_target,callback,status){status == 'in' ? $( '.page_body .page_container' ).css( 'padding-left' , 0 ) && $( '.page_body .page_bar' ).addClass( 'hide_bar' ) && $( $( '.left_menu_icon' ).children( 'span' ) ).prop( 'className' , 'glyphicon glyphicon-plus' ) : $( '.page_body .page_container' ).css({'padding-left':''}) && $( '.page_body .page_bar' ).removeClass( 'hide_bar' ) && $( $( '.left_menu_icon' ).children( 'span' ) ).prop( 'className' , 'glyphicon glyphicon-minus' ) }}">

			<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>

		</a>

		<div class="modal fade" style="z-index: 10000;" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

			<div class="modal-dialog" role="document">

				<form action="?reset_password.php" method="POST" onsubmit="return (function(){

					var form = this,
						success_input = 'success_input',
						fail_input = 'fail_input',
						check = function(){

							var num = 0,
								result = $();

							$().checkForm( form ).check({

								type :  {

									'old_password' : '',
									'new_password' : '',
									'repeat_password' : function( value ){

										var _value;

										if( _value = $().tool().trim( $( $( form ).find( '[data-index=\'new_password\']' ) ).val() ) )

											return _value == value;

									}

								},

								success : function(){

									$( this ).removeClass( fail_input ).addClass( success_input );

									result[ result.length ++ ] = $( this ).get( 0 );

								},

								fail : function( value ){

									num ++;

									$( this ).removeClass( success_input ).addClass( fail_input );

									result[ result.length ++ ] = $( this ).get( 0 );

								}

							});

							if( num > 0 )

								return console.log( result ) , result.off('input').off('change').on({

									'input' : check,
									'change' : check

								}),false;

						}

					return check();

				}).call( this )">

					<input type="hidden" name="user_id" value="Junde" />

					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Change Password</h4>
						</div>
						<div class="modal-body">

							<div class="form form_01">

								<div class="content">

									<div class="clear"></div>

									<div class="item">

										<div class="left" style="width:100%;">

											old password

										</div>

										<div class="right" style="width:100%;">

											<input type="password" class="form-control special" data-index="old_password" name="old_password" placeholder="input ..." style="margin-left:0;width:100%;">

										</div>

									</div>

									<div class="item">

										<div class="left" style="width:100%;">

											new password

										</div>

										<div class="right" style="width:100%;">

											<input type="password" class="form-control special" data-index="new_password" name="new_password" placeholder="input ..." style="margin-left:0;width:100%;">

										</div>

									</div>

									<div class="item">

										<div class="left" style="width:100%;">

											repeat password

										</div>

										<div class="right" style="width:100%;">

											<input type="password" class="form-control special" data-index="repeat_password" name="repeat_password" placeholder="input ..." style="margin-left:0;width:100%;">

										</div>

									</div>

									<div class="clear"></div>

								</div>

							</div>

						</div>
						<div class="modal-footer">

							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

							<button type="submit" class="btn btn-primary">Save</button>

						</div>

					</div>

				</form>

			</div>
		</div>
	
    </div>

    <?php
$this->load->view('include/footer');
?>
 
<script>

	$().ready(function(){
	
		page.init.init( 11 );
	
	})

</script>
