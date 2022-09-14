<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
      <?php $this->load->view('include/bg_common') ?>

<div class="sub1_3">
       <div class="sub1_3_section1">
                <div class="container container_920">
                        <div class="row">
                                <div class="col-xs-12">
                                        <p class="title_text1">주요연혁</p>
                                        <div class="line"></div>
                                        <p class="detail_text3">흔들림 없는 핵심역량과 품격높은 라이프 스타일을 추구하며 늘 고객과 소통합니다.</p>
                                        <div class="qa-list">
											<ul>
												<?php foreach( $history_category as $item ):?>
													<li class="question-line">
														<div class="q-text" style="display: inline-block"><?php echo $item['category_date_name']?></div>
														<i class="plus"></i>
													</li>
													<li class="answer-line">
														<div class="p-block">
															<?php 
															
																foreach( $history_list[$item['category_date_index']] as $index => $item_1)
																{
																	$date_year[$index] = $index;
																}
															?>
															
															<?php foreach( $date_year as $item_2): ?>
																<div class="block">
																<div class="block_detail">
																		<p><?php echo $item_2 ?></p>
																</div>
																<div class="block_detail">
																	<?php foreach( $history_list[$item['category_date_index']][$item_2] as $item_3 ):?>
																		<p><span><?php echo str_pad( $item_3['month'],2,'0',STR_PAD_LEFT) ?></span><?php echo $item_3['content'] ?></p>
																	<?php endforeach;?>
																</div> 
															</div> 
															<?php endforeach; $date_year = array();?>
														</div>
													</li>
												<?php endforeach;?>
											</ul>
										</div>
                                </div>
                        </div>
                </div>
       </div>
</div>

    <?php $this->load->view('include/footer')?>
    
    <?php $this->load->view('include/footer_script')?>
    
</body>
</html>