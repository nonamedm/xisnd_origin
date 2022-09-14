<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header') ?>
    <?php //$this->load->view('include/bg_common') ?>

<div class="sub5 bg_common">
  <p class="text1">고객지원</p>
  <p class="text2"><img src="<?php echo base_url()?>resource/frontend/images/home.png" alt=""><span>서비스규정</span></p>
</div>
<div class="sub5_3 sub_content">
  <div class="container">
    <div class="row">
      <div class="title">
        <h1>서비스규정</h1>
        <p>Customer Service</p>
      </div>
      <div class="sub_title"> 고객님의 불편함을 해결해 드리기 위하여 최선을 다하겠습니다.<br>
        다음의 서비스 규정을 확인 하시고 편안한 서비스 이용 하시기 바랍니다. </div>
    </div>
	<!-- table start-->
    <div class="row item01">
    	<div class="tab-content">
        <table  class="table table-condensed">
          <tbody>
            <tr>
              <td colspan="2" class="tab_title" >구분</td>
              <td class="tab_title">비고</td>
            </tr>
            <tr>
              <td rowspan="2" class="tab_title">수리</td>
              <td>무상수리</td>
              <td>품질보증기간 이내에 정상적인 사용상태에서 발생한 성능 및 기능상의 하자로 인한 경우</td>
            </tr>
            <tr>
              <td>유상수리</td>
              <td>
               	<ul>
               		<li>품질 보증기간이 경과된 제품</li>
               		<li>천재지변(낙뢰, 화재, 염해, 수해, 이상 전원 등)에 의한 제품의 고장</li>
               		<li>소비자의 고의 또는 과실로 인해 발생한 고장(무리한 작동, 임의 분해, 이동, 파손 등)</li>
               		<li>사용전원의 이상 및 접속기기의 불량으로 인해 발생한 고장</li>
               		<li>자이에스앤디(주)의 대리점이나 서비스센터의 수리기사가 아닌 사람이 수리하여 고장이 발생하는 경우</li>
               		<li>소모성 부품의 수명이 다한 경우(배터리 6개월), 아답터, 케이블 등</li>
               	</ul>
                </td>
            </tr>
            <tr>
              <td colspan="2" class="tab_title">부품비</td>
              <td>
               <ul>
               	<li>제품수리 시 불량부품의 교제 비용</li>
               	<li>부품비용 : 부가세 10% 포함</li>
               </ul>
               </td>
            </tr>
            <tr>
              <td colspan="2" class="tab_title">제품보증기간</td>
              <td>
              	<ul>
				   <li>소비자분쟁해결기준(공정거래위원회 고시)에 따라 제품에 대한 보증을 실시 합니다.</li>
				   <li>제품의 무상보증기간은 구입일로 부터 1년 입니다.</li>
				   <li>제품의 보증기간은 소비자의 구입일자를 기준으로 산정되며, 구입일은 제품보증서 또는 구입 영수증을 기준 합니다.</li>
				   <li> 별도 계약에 의한 공급일 경우에는 주계약에 따라 보증내용을 적용합니다.</li>
               </ul>
               </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div><!-- table end-->
  </div>
  <div class="container-fluid item02">
  	<div class="container">
  		<div class="row">
			<div class="col-md-2">
				<div class="row">
					서비스 요금 징수 규정
				</div>
			</div>
			<div class="col-md-10">
				<p>유상 서비스 시 발행되는 서비스 요금은 출장비용, 부품비용으로 분류됩니다.</p>
				<ul>
					<li>출장비용 : 출장수리가 발생하는 경우에 청구되며, 장거리 출장 시에는 별도의 비용을 청구 할 수 있다.</li>
					<li>부품비용 : 제품의 고장으로 부품을 교체 할 경우 부품 단가표에 준하여 산정된다.</li>
					<li>기술료 : 기술료는 유상수리 시에 기술 난이도 및 소요시간 등을 감안하여 품목별 기술 단가표에 준하여 산정된다.</li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-2">
				<div class="row">
					접수 및 상담
				</div>
			</div>
			<div class="col-md-10">
				<ul>
					<li>AS, 제품기능 및 구입 문의 등 서비스 관련 사항은 고객센터로 연락바랍니다.</li>
				</ul>
			</div>
			<div class="clearfix"></div>
			<div class="col-md-2">
				<div class="row">
					<p>고객센터 업무시간 안내</p>
				</div>
			</div>
			<div class="col-md-10">
				<ul>
					<li>평일 : 09:00 ~ 17:00</li>
					<li>주말 및 공휴일은 휴무입니다.</li>
				</ul>
			</div>
		</div>
  	</div>
  </div>
</div>

	<?php $this->load->view('include/footer') ?>
	<?php $this->load->view('include/footer_script') ?>

</body>
</html>
