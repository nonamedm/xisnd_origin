<!DOCTYPE html>
<html lang="kr">
<head>
	<?php $this->load->view('include/head') ?>
</head>
<body>
<header>
	<?php $this->load->view('include/header');?>
</header>

	<?php $this->load->view('include/right_bar');?>
    <?php $this->load->view('include/bg_common');?>

<div class="sub_content sub1_6" >
        <p class="text1">상담안내</p>
        <p class="text2"><span>레드트랜스</span>는 품질과 신의를 중시하는 기업경영방침으로 고객사의 성공과 가치를 높이기 위해 최선을 다합니다. </p>
        <div class="line"></div>
        <div class="red_line_left first"></div>
        <p class="title_left">문의하기</p>
        <form class="form_contact" id="form_contact" method="post" action="<?php echo site_url('process/createform');?>">
            <div class="form-group">
                    <label for="name1"><span></span>업체명</label>
                    <input type="text" class="form-control" id="name1" name="name1">
            </div>
            <div class="form-group">
                    <label for="name2"><span></span>담당자 성함</label>
                    <input type="text" class="form-control" id="name2" name="name2">
            </div>
            <div class="form-group phone_input">
                    <label for="phone1"><span></span>연락처</label>
                    <input type="text" class="form-control" id="phone1" name="phone1" maxlength="3"><b></b>
                    <input type="text" class="form-control" id="phone2" name="phone2" maxlength="4"><b></b>
                    <input type="text" class="form-control" id="phone3" name="phone3" maxlength="4">
                    <div id="phone-error"></div>
            </div>
            <div class="form-group">
                    <label for="email"><span></span>이메일</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="견적을 안내 받을 주소를 입력해 주세요.">
            </div> 
            <div class="form-group">
                    <label for="your_messeage"><span></span>문의내용</label>
                    <textarea type="text" class="form-control" id="your_messeage" name="your_messeage"></textarea>
            </div>
            <div class="form-group file">
                    <label for=""><span></span>첨부파일1</label>
                    <input type="text" id="txt1" name="txt1" class="form-control"  disabled="readonly" />
                    <input type="button" onMouseMove="f1.style.pixelLeft=event.x-60;f1.style.pixelTop=this.offsetTop;" value="파일찾기" size="30" onClick="f1.click()" class="liulan  form-control">
                    <input type="file"  onChange="txt1.value=this.value" name="f1" style="height:26px;" class="files f1"  size="1" hidefocus>
                    <span class="size">최대 5MB 이하 첨부 가능</span>
            </div>
            <div class="form-group file">
                    <label for=""><span></span>첨부파일2</label>
                    <input type="text" id="txt2" name="txt2" class="form-control" disabled="readonly" />
                    <input type="button" onMouseMove="f2.style.pixelLeft=event.x-60;f2.style.pixelTop=this.offsetTop;" value="파일찾기" size="30" onClick="f2.click()" class="liulan  form-control">
                    <input type="file"  onChange="txt2.value=this.value" name="f2" style="height:26px;" class="files f2"  size="1" hidefocus>
                    <span class="size">최대 5MB 이하 첨부 가능</span>
            </div>
            <div class="form-group file" >
                    <label for=""><span></span>첨부파일3</label>
                    <input type="text" id="txt3" name="txt3" class="form-control" disabled="readonly" >
                    <input type="button" onMouseMove="f3.style.pixelLeft=event.x-60;f3.style.pixelTop=this.offsetTop;" value="파일찾기" size="30" onClick="f3.click()" class="liulan  form-control">
                    <input type="file"  onChange="txt3.value=this.value" name="f3" style="height:26px;" class="files f3"  size="1" hidefocus>
                    <span class="size">최대 5MB 이하 첨부 가능</span>
            </div>
            
            <button type="submit" class="btn btn-default btn_submit" id="send_form_button">문의하기</button>
            <input type="hidden" name="form_cg_index" value="<?php echo $form_cg_index; ?>">
        </form>
       
</div>
<!-- （Modal） -->
<div class="modal fade form_modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true">
      <div class="modal-body1">
           <p class="text1">레드트랜스</p>
           <div class="redline"></div>
           <p class="text2">고객님의 문의가 접수되었습니다. <br>
                            빠른 시간내 담당자를 배정하여 내드리겠습니다.</p>
           <p class="text3"><span>성공을 위한 파트너</span> 레드트랜스                 
           </p>
           <p class="text4">고객센터 <span>02)1600-1403</span></p>
           <a href="<?php echo base_url();?>">메인으로 돌아가기</a>
      </div>
    </div><!-- /.modal-content -->
<div class="form_bg">
         <img src="<?php echo base_url()?>resource/frontend/images/form_image1.png" alt="">
         <img src="<?php echo base_url()?>resource/frontend/images/form_image2.png" alt="">
         <img src="<?php echo base_url()?>resource/frontend/images/form_image3.png" alt="">
</div>

<footer>
	<?php $this->load->view('include/footer')?>
</footer>

    <?php $this->load->view('include/footer_script')?>
    
    <script>
        //validate
        $(".files").change(function(){
            var size=this.files[0].size;
            var maxSize = 5*1024*1024;
            if(size > maxSize){
            $(this).siblings("span").css("color","red");
            $("#send_form_button").attr("type","button");
            }
            else{ $(this).siblings("span").css("color","#4B4B4B");
            $("#send_form_button").attr("type","submit");
            }
    
        });
        $(function(){
            // jQuery.validator.addMethod("checkSize", function (value, element, param) {
            //     var fileSize = element.files[0].size;
            //     return this.optional(element) || param-fileSize>=0;  
            //   }, "최대 5MB 이하 첨부 가능");
            $(".form_contact").validate({

                errorClass: "has-error-input",
                errorElement: "p",
                groups: {
                        phone: "phone1 phone2 phone3",
                },
                errorPlacement: function (error, element) {
                        if (element.attr("name") == "phone1" || element.attr("name") == "phone2" || element.attr("name") == "phone3"){
                            error.insertAfter("#phone-error");
                    
                        }else {
                            error.insertAfter(element);
                        }

                    },
                onfocusout: function (element) {
                            $(element).valid();
                },
                rules: {
                    name1: "required",
                    name2: "required",
                    phone1:{
                                required: true,
                                minlength:3,
                                maxlength:3,
                                digits:true
                            },
                    phone2:{
                                required: true,
                                minlength:3,
                                maxlength:4,
                                digits:true
                            },
                    phone3:{
                                required: true,
                                minlength:3,
                                maxlength:4,
                                digits:true
                            },
                    email: {
                                required: true,
                                email:true
                            },
                    your_messeage:"required",
                    // f1:{
                    //             required : true,
                    //             checkSize:5*1024*102,
                    //         },     
                
                },
                messages: {
                    name1: "업체명을 입력해 주세요.",
                    name2: "담당자 성함을 입력해 주세요.",
                    phone1:{       
                        required:"전화번호를 입력해 주세요.",
                        minlength:"정확한전화번호를 입력해 주세요.",
                        maxlength:"정확한전화번호를 입력해 주세요.",
                        digits:"정확한전화번호를 입력해 주세요."
                    },
                    phone2:{       
                        required:"전화번호를 입력해 주세요.",
                        minlength:"정확한전화번호를 입력해 주세요.",
                        maxlength:"정확한전화번호를 입력해 주세요.",
                        digits:"정확한전화번호를 입력해 주세요."
                    },
                    phone3:{       
                        required:"전화번호를 입력해 주세요.",
                        minlength:"정확한전화번호를 입력해 주세요.",
                        maxlength:"정확한전화번호를 입력해 주세요.",
                        digits:"정확한전화번호를 입력해 주세요."
                    },
                    email:{       
                        required:"이메일주소를 입력해 주세요.",
                        email:"이메일주소를 다시 확인해 주세요."
                    },
                    your_messeage:"문의내용을 입력해 주세요.",
                },

            });

            $('#form_contact').ajaxForm({  
                forceSync:false,  
                success: function(data) {  
                    $("#myModal").modal("show");
                }  
            });  
        });
    </script>

</body>
</html>