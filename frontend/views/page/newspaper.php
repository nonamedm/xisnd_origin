<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php $this->load->view('include/bg_common') ?>
    
<div class="sub3_2 sub5_3 sub_content">
  <div class="container">
    <div class="row">
      <div class="title">
        <h1>사이버신문고</h1>
      </div>
      
      <div class="sub_title">
		  <h3>윤리경영의 실천</h3>
	  </div>
	  <div class="agreement">
	  	<h4 class="text-center">개인정보보호를 위한<br> 이용자 동의사항</h4>
	  	<h5>개인정보수집 및 이용안내</h5>
	  	<h6>1. 개인정보의 수집 및 이용 목적</h6>
	  	<p>자이 S&amp;D는 고객님의 문의사항에 대한 답변 및 안내를 위하여 필요한 최소한의 범위 내에서 개인정보를 수집하고 있습니다.</p>
	  	<h6>2. 수집하는 개인정보의 항목</h6>
	  	<ul>
			<li>필수항목: 성명, 제목, 내용</li>
			<li>선택항목: E-mail, 휴대폰번호</li>
			<li>수집방법: 웹사이트에 고객이 직접 입력</li>
	  	</ul>
	  	<h6>3. 개인정보의 처리 및 보유기간</h6>
	  	<p>자이 S&amp;D는 개인정보 수집 및 이용목적이 달성된 후에는 해당 정보를 지체 없이 파기합니다. 단, 다음의 정보에 대해서는 아래의 이유로 명시한 기간 동안 보존합니다.</p>
	  	<ul>
	  		<li>보존 항목 : 이름 , 전화번호 , E-mail, 제목, 내용</li>
	  		<li>보존 근거 : 소비자의 불만 또는 분쟁처리에 관한 기록 (전자상거래등에서의 소비자보호에 관한 법률)</li>
	  		<li>보존 기간 : 3년</li>
	  	</ul>
	  	<h6>4. 부동의에 따른 고지사항</h6>
	  	<p>위 개인정보 제공에 대해서 부동의할 수 있으나, 이 경우 게시판의 내용 입력을 할 수 없어 민원처리가 불가능합니다.</p>
	  </div>
	  <form id="sub3_2_form" method="post"  data-toggle="validator"  class="form-horizontal" action="<?php echo site_url('process/createForm')?>">
	  	<input type="hidden" name="form_cg_index" value="<?php echo $form_cg_index ?>">
          <div class="agree text-center">
	  		<div class="radio form-group">
				<input type="radio" name="agree" id="radio1" value="true" >
				<label for="radio1">동의 합니다.</label>
			</div>
			<div class="radio form-group">
				<input type="radio" name="agree" id="radio2" value="0">
				<label for="radio2">동의 하지 않습니다.</label>
			</div>
	  	</div>
	  	<div class="form">
	  		<div class="form-group col-md-12">
				<label class="col-md-1 col-sm-2 col-xs-12" for="name"><font color="#FF0000">*</font>성명</label>
				<input type="text" class="col-md-4 col-sm-4 col-xs-12" name="name" placeholder="">
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-12">
				<label for="email" class="col-md-1 col-sm-2 col-xs-12" >이메일</label>
				<input type="text" class="col-md-4  col-sm-4 col-xs-12" name="email" id="email" autocomplete="off">
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-12 phone">
				<label for="phone" class="col-md-1 col-sm-2 col-xs-12">휴대폰번호</label>
				<div class="col-md-4  col-sm-4 col-xs-12">
					<div class="row">
						<select  id="phone_1">
							<option value="010">010</option>
							<option value="011">011</option>
							<option value="016">016</option>
							<option value="017">017</option>
							<option value="019">019</option>
						
						</select>
						<b>-</b>
						<input type="text" class="number" id="phone_2"  maxlength="4" placeholder="">
						<b>-</b>
						<input type="text"  class="number" id="phone_3"   maxlength="4" placeholder="">
					</div>
				</div>
				<input id="phone" name="phone">
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-12">
				<label for="title" class="col-md-1 col-sm-2 col-xs-12"><font color="#FF0000">*</font>제목</label>
				<input type="text"  class="col-md-4 col-sm-4 col-xs-12" name="title" placeholder="">
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-12 form_content">
				<label for="content" class="col-md-1 col-sm-2 col-xs-12"><font color="#FF0000">*</font>내용</label>
				<textarea  class="col-md-8 col-sm-8 col-xs-12" rows="8" name="content"></textarea>
			</div>
			<div class="clearfix"></div>
			<div class="form-group col-md-12 code_num">
				<label for="code" class="col-md-1 col-sm-2 col-xs-12">자동등록방지</label>
				<input type="text"  class="col-md-2 col-sm-2" name="code" placeholder="" maxlength="4">
                    <img id="codeImage" style="height:32px; margin-left:1em; cursor:pointer;"  src="<?php echo site_url('login/captcha') ?>" />
				<div class="clearfix"></div>
				<div class="col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-2">
					<div class="row">* 자동등록방지 숫자를 순서대로 입력하세요.</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
	  	</div>
	  	<div class="form-group">
			<div class="col-lg-12 text-center">
				<button type="submit" class="btn btn-primary" name="signup" value="Sign up">확인</button>
				<a href="<?php echo site_url('page/magazine/42/134')?>" class="btn btn-default">취소</a>
			</div>
		</div>
	</form>
    </div>
  </div>
  
</div>
	<?php $this->load->view('include/footer') ?>
	<script>

		var _code_url	= "<?php echo site_url('process/getSessionCode')?>",
			_code_image	= "<?php echo site_url('login/captcha/') ?>";

	</script>
	<?php $this->load->view('include/footer_script') ?>
    <script>

	$('#codeImage').on({
		'click': function(){
			this.src=_code_image+Math.random();
			$('[name="code"]').val(''); 
			$('#sub3_2_form').data('bootstrapValidator').updateStatus('code', 'NOT_VALIDATED',null).validateField('code');
			
		},
	});
		if(window.top !== window.self){ window.top.location = window.location;}
	</script>

</body>
</html>
