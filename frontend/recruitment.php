<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    
    <?php $this->load->view('include/bg_common') ?>

    <div class="sub1_5">
        <div class="sub1_5_section1">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <p class="title_text1">채용안내</p>
                        <div class="line"></div>
                        <p class="title_text2">인재상</p>
                        <p class="detail_text3">도전과 혁신적인 사고 방식으로 새로운 경쟁 환경에 능동적으로 대처할수 있는 인재를 찾습니다.</p>
                        <img src="<?php echo base_url()?>resource/frontend/images/sub1_5_01.png" alt="" class="img-responsive center-block">
                        <p class="title_text2">보상제도</p>
                        <p class="detail_text3">성과관리 체계에 근거한 개인의 능력과 성과에 따른 보상체계로 합리적인  연봉제를 실시하고 있습니다.</p>
                        <img src="<?php echo base_url()?>resource/frontend/images/sub1_5_02.png" alt="" class="img-responsive center-block">
                        <p class="title_text2">복리후생</p>
                    </div>
                    <div class="box_container">
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">자녀학자금</p>
                                <div class="box_text2">중·고등학교  자녀 학자금 지원</div>
                            </div>
                        </div>  
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">포상</p>
                                <div class="box_text2">장기근속 / 우수조직 / 우수사원 포상</div>
                            </div>
                        </div> 
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">종합건강검진</p>
                                <div class="box_text2">임직원 연 1회 종합검진비 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">경조사지원</p>
                                <div class="box_text2">경조금 / 경조화환 / 조의물품 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">단체보험가입</p>
                                <div class="box_text2">질병, 상해, 암치료비 보장</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">복지카드</p>
                                <div class="box_text2">연간 1회 지급</div>
                            </div>
                        </div>
                            <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">휴양시설운영</p>
                                <div class="box_text2">강촌리조트 이용 지원</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="box">
                                <p class="box_text1">사내 동호회 운영</p>
                                <div class="box_text2">직원간 친선도모를 위한 취미활동 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub1_5_section2">
            <div class="container">
                <div class="row" >
                    <div class="page_board">
                        <p class="title_text2">채용공고</p>
                        <ul id="list_category" class="secone_category">
                            <li  class=" active"><a data-category = "0" >전체</a></li>
                            <?php foreach( $second_category as $index => $item ):?>
                            <li><a data-category="<?php echo $index ?>" ><?php echo $item?></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <div class="row" id="form_list" >
                    <div class="col-lg-12 fleft">
                        <div class="kr_form">
                            <div class="kr_form_table" >
                                <div class="kr_form_tr form_big_title">
                                    <div class="kr_form_td form_sorting">No.</div>
                                    <div class="kr_form_td ">제목</div>
                                    <div class="kr_form_td form_time">모집기간</div>
                                    <div class="kr_form_td form_auther">등록일</div>
                                    <div class="kr_form_td form_hit">조회</div>
                                </div>
                            </div>
                            <div class="kr_form_table" id="list">
                                
                                <div class="kr_form_tr">
                                    <div class="kr_form_td form_sorting">공지</div>
                                    <div class="kr_form_td form_title"><a href="sub1_5_1.html"><span>현장</span>㈜이지빌 2017년 3분기 예비 관리소장 공개모집 공고</a></div>
                                    <div class="kr_form_td form_time"><span class="glyphicon glyphicon-time"></span>2017-06-01 ~ 2017-06-16</div>
                                    <div class="kr_form_td form_auther"><span class="fa fa-calendar-check-o"></span>2017-06-01</div>
                                    <div class="kr_form_td form_hit"><span class="glyphicon glyphicon-user"></span>1356</div>
                                </div>
                                <div class="kr_form_tr">
                                    <div class="kr_form_td form_sorting">9</div>
                                    <div class="kr_form_td form_title"><a href="#"><span>현장</span>㈜이지빌 2017년 3분기 예비 관리소장 공개모집 공고</a></div>
                                    <div class="kr_form_td form_time"><span class="glyphicon glyphicon-time"></span>2017-06-01 ~ 2017-06-16</div>
                                    <div class="kr_form_td form_auther"><span class="fa fa-calendar-check-o"></span>2017-06-01</div>
                                    <div class="kr_form_td form_hit"><span class="glyphicon glyphicon-user"></span>1356</div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="search_for">
                        <!-- <select name="cg" class="changed_selection">
                            <option value="0">제목</option>
                            <option    value="1">제목1 </option>                                
                            <option    value="2">제목2 </option>
                        </select> -->
                        <input type="text" value="" name="key" id="key" placeholder="" />
                        <input type='hidden' value="0" data-category="" name="category_2">
                        <button value = "Search" id="ck">검색</button>

                    </div>
            
                    <nav aria-label="...">
                        <ul class="pagination" id="fenye" >
                            <li><a href="#"><i class="fa fa-angle-double-left fa-lg"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-left fa-lg"></i></a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                            <li><a href="#"><i class="fa fa-angle-right fa-lg"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right fa-lg"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="row" id="detail" style="display:none;">
                    <div class="col-lg-12 fleft">
                        <div class="kr_form">
                            <div class="kr_form_table"> 
                                <div class="kr_form_tr  form_tr_detail">                                           
                                    <div class="kr_form_td form_title" id="detail_title">  </div>
                                    <div class="kr_form_td form_time" id="detail_date"></div>
                                    <div class="kr_form_td form_auther" id="date"> </div>
                                    <div class="kr_form_td form_hit" id="detail_hits"></div>
                                </div>
                            </div>
                            <div class="product_detail" id="content">
                                <!-- <img src="<?php echo base_url()?>resource/frontend/images/img.jpg" alt="">
                                <p class="text1">2017년 3월 3분기 예비 관리소장 공개모집</p>
                                <p class="text2">투명한 인재채용을 통해 선진 관리문화 조성에 앞장서 온 자이 S&D 주택관리사 밑 주택관리사(보)를 대상으로 <br> 2017년 3분기 예비 관리소장을 공개모집합니다.</p>
                                <div class="file">
                                    <a href="#" class="liulan">첨부파일</a>
                                    <a href="#" class="liulan liulan2">첨부파일</a>
                                </div> -->
                            </div>

                            <div class="article" id="prev_next">        
                                <p><a href="#"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_top.png" alt=""></i>이전글</b><span>현장</span>부산명지2차호반베르디움 관리소장 모집</a></p>
                                <p><a href="#"><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_bottom.png" alt=""></i>다음글</b><span>현장</span>㈜ 이지빌 2017년 1분기 예비 관리소장 공개모집 공고</a></p>                                       
                            </div>
                                <div class="article" id="return_list">
                                    <div class="list_button_block"><a class="list_button" id="back">목록</a></div>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>

    <?php $this->load->view('include/footer')?>
    
    <?php $this->load->view('include/footer_script')?>
    
    <script type="text/javascript">

        var _load_url   = "<?php echo site_url('article/getAjaxRecruitmentList/'.$category_index.'/'.$sub_cg_index);?>",
            _zys_url    = "<?php echo site_url('article/getTotleNav/'.$category_index.'/'.$sub_cg_index);?>",
            _ajax_url   = "<?php echo site_url('article/getAjaxSingleForm/'.$category_index.'/'.$sub_cg_index);?>",
            _cg_url     = "<?php echo site_url('article/getRecruitmentCgByAjax/'.$category_index.'/'.$sub_cg_index);?>"

        $(document).ready(function(){
            
            categoryEvent();

            Load();
            
            Loadlist();

        });

        
        function getListInfo( _this )
        {
            var _value = {};

            _value.cg_index    = _this.attr('data-category'),
            _value.totle_num   = zys( _value.cg_index );

            return _value;

        }  

        function categoryEvent()
        {
            $('#list_category').find('a').on({
                'click':function()
                {
                    var _value = getListInfo( $(this) );
                    
                    $('[name="category_2"]').attr('data-category', _value.cg_index).val( _value.cg_index )
                    
                    $(this).parent('li').parent('ul').find('li').removeClass('active');
                    $(this).parent('li').addClass('active');

                    Load(_value.totle_num, _value.cg_index, 1);
                    Loadlist( _value.totle_num, 1 );
                    
                },
            });
        }


        var ts      = 10;
        var page    = 1;

        $(document).ready(function(e){
                
                
        
            $("#ck").click(function()
            {       
                Load();
                Loadlist();       
            })
        
            $("#back").click(function(){    
                $("#form_list").show();
                $("#detail").hide();
                $("#back").hide();   
                $("#pre_next").hide();
                Load();
                Loadlist();       
            })
        })
             

        function Load( _totle_num = false, _cg_index = false, _page = false ){

            var totle_num   = _totle_num ? _totle_num : zys(),
                cg_index    = _cg_index ? _cg_index : 0,   
                gjz         = $("#key").val();
                pages       = _page ? _page : page; 
            
            $.ajax({
                async:false,
                url: _load_url,
                data:{
                    page    : pages,
                    ts      : ts,
                    gjz     : gjz,
                    cg_index: cg_index
                },
                type:"POST",
                dataType:"JSON",                            
                success: function( data )
                {
                    processList(data);                                           
                }
            })
        }

        function processList( data )
        {
            console.log(data);
            var len = data.list.length;
            var count = data.num;
            var str ="";                       
            for(var k=0; k<len; k++) 
            {
                str +=  '<div class="kr_form_tr click_div" rel="'+data.list[k]['article_index']+'">'+
                        '<div class="kr_form_td form_sorting">'+(count-k-((page-1)*ts))+'</div>'+
                        '<div class="kr_form_td form_title "><span>'+data.cg[data.list[k]['rec_cg_index']]+'</span>'+data.list[k]['article_name']+'</div>'+
                        '<div class="kr_form_td form_time">'+data.list[k]['article_date_start']+' ~ '+data.list[k]['article_date_end']+'</div>'+
                        '<div class="kr_form_td form_auther">'+timestampToTime(data.list[k]['article_created_time'])+'</div>'+
                        '<div class="kr_form_td form_hit">'+data.list[k]['article_hits']+'</div>'+
                        '</div>';
                //str +="<tr rel="+data.list[k]['article_index']+" ><td>"+(count-k-((page-1)*ts))+"</td><td>"+data.list[k]['article_name']+"</td><td>"+data.list[k]['article_author']+"</td><td>"+timestampToTime(data.list[k]['article_created_time'])+"</td></tr>";
            }
            $("#list").html(str)
        }


                    
        function Loadlist( _totle_num = false, _page = false ){
            var totle_num = _totle_num ? _totle_num : zys(),
                str ="";
                pages = _page ? _page : page;        
            if((totle_num * ts) > ts && page > 1)
            {
                str+="<li><a id='prev'>&laquo;</a></li>";
            }
            
            
            for(var i=pages-4; i<pages+5; i++)
            {
                
                if(i>0 && i<= totle_num)
                {
                    if(i==pages)
                    {   
                        str+= "<li class='active'><a>"+i+"</a></li>";   
                    }
                    else
                    {
                        str+= "<li><a class='item'>"+i+"</a></li>";
                    }
                }       
            }
            
            
            if((totle_num * ts) > ts && pages != totle_num)
            {
                str+="<li><a id='next'>&raquo;</a></li>";
            }

            $("#fenye").html(str);
                
            $("#prev").click(function(){

                if(pages>1)
                {
                    pages--;                   
                }

                var _value = getListInfo(  $('[name=category_2]') )

                Load( _value.totle_num, _value.cg_index, pages );
                Loadlist(  _value.totle_num );
            })
                
            $(".item").click(function(){

                var _value = getListInfo(  $('[name=category_2]') )
                
                console.log( _value);
                
                var p = $(this).text();
                page = parseInt(p);

                Load( _value.totle_num, _value.cg_index, page );
                Loadlist(  _value.totle_num );
            })
                
            $("#next").click(function(){

                var _value = getListInfo(  $('[name=category_2]') )

                if(pages<zys())
                {
                    page++;
                }

                Load( _value.totle_num, _value.cg_index, page);
                Loadlist(  _value.totle_num );
            })
                
        }
            

        function zys( _cg_index = false )
        {
            var cg_index    = _cg_index ? _cg_index : 0; 
            var zys = 0;
            var gjz = $("#key").val();
            $.ajax({
                async:false,
                url: _zys_url,
                data:{
                    page    : page,
                    ts      : ts,
                    gjz     : gjz,
                    cg_index: cg_index
                    },
                type:"POST",
                dataType:"TEXT",
                success:function(data){
                    zys = Math.ceil(data/ts);
                }
            });
            return zys;
        }

        function timestampToTime(timestamp) {

                var date = new Date(timestamp * 1000);
                Y = date.getFullYear() + '-';
                M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
                D = date.getDate() + ' ';
                return Y+M+D;
        }



        $(document).on("click",".click_div",function(){

            var _article_index = $(this).attr("rel");

            detailAjax( _article_index );
            
        });
        
        function detailAjax( _article_index )
        {
            $.ajax({
                
                url: _ajax_url,
                data:{article_index:_article_index},
                type:"POST",
                dataType:"JSON",                            
                success: function(data)
                { 
                    dateilInit( data );
                }
            })
        }

        function dateilInit( data )
        {
                                                                
            var time = timestampToTime(data.single.article_created_time);
            
            var _detail_title   = '<span>'+data.cg[data.single.rec_cg_index]+'</span>'+data.single.article_name+'</a>',
                _detail_date    = '<span class="glyphicon glyphicon-time"></span>'+data.single.article_date_start+' ~ '+data.single.article_date_end,
                _date           = '<span class="fa fa-calendar-check-o"></span>'+data.single.article_created_time;
                _detail_hit     = '<span class="glyphicon glyphicon-user"></span>'+data.single.article_hits+'</div>',
                

                _detail_file = '<div class="file">';
                if( !!data.single.article_attachment_1 )
                {
                    _detail_file += '<a download="attachment 1" href="/'+data.single.article_attachment_1+'" class="liulan">첨부파일</a>';
                }
                if( !!data.single.article_attachment_2 )
                {
                    _detail_file += '<a download="attachment 2" href="/'+data.single.article_attachment_2+'" class="liulan">첨부파일</a>';
                }
                if( !!data.single.article_attachment_3 )
                {
                    _detail_file += '<a download="attachment 3" href="/'+data.single.article_attachment_3+'" class="liulan">첨부파일</a>';
                }
                _detail_file += '</div>'

                _detail_content = data.single.article_content + _detail_file;
           
            
                $("#form_list").hide();

                $("#detail").show();
                $("#back").show();
                $("#pre_next").show();

                $("#detail_title").html( _detail_title ); 
                $("#detail_data").html( _detail_date);
                $('#detail_hits').html( _detail_hit);
                $("#date").html(time);
                $("#content").html( _detail_content );

                //$("#author").html(data.single.as_author);
                prevAndNext( data );
        }

        function prevAndNext( data )
        {
            var str =""; 

            if(data.pre)
            {
                //str +="<tr rel="+data.pre.as_index+"><td>PRE</td></tr></a>";
                str += '<p><a rel="'+data.pre.article_index+'" ><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_top.png" alt=""></i>이전글</b><span>현장</span>'+data.pre.article_name+'</a></p>';
            }
            if(data.next)
            {
                //str +="<tr rel="+data.next.as_index+"><td>NEXT</td></tr></a>";
                str += '<p><a rel="'+data.next.article_index+'" ><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_bottom.png" alt=""></i>다음글</b><span>현장</span>'+data.next.article_name+'</a></p> ';
            }
            $("#prev_next").empty();
            $("#prev_next").html(str);
            $("#prev_next").find('a').on({
                'click':function(){
                    prevAndNextEvent( this );
                }
            });

        }

        function prevAndNextEvent( _this )
        {
            detailAjax($(_this).attr('rel'));
        }

        $("body").bind("keydown",function(e){    
            e=window.event||e; 
            if(event.keyCode==116){ 
            e.keyCode = 0;
            return false;  
            }   
        });

    </script>
</body>
</html>