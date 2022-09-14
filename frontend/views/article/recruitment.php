<!DOCTYPE html>
<html lang="kr">
	<?php $this->load->view('include/head') ?>
<body>
	<?php $this->load->view('include/header');?>
    
    <?php $this->load->view('include/bg_common') ?>

    <div class="sub1_5">
        <div class="sub1_5_section1" style="margin-bottom:7px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <?php $this->load->view('include/requirement_nav') ?>
                        <!-- <p class="title_text1"><?php echo $sub_page->category_name?></p> -->
                       
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
                            <li><a class="category_nav" data-category="<?php echo $index ?>" ><?php echo $item?></a></li>
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
                                
                                <!-- <div class="kr_form_tr">
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
                                </div> -->
                            </div> 
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div style="text-align:center;">
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
                                <!-- <li><a href="#"><i class="fa fa-angle-double-left fa-lg"></i></a></li>
                                <li><a href="#"><i class="fa fa-angle-left fa-lg"></i></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">5 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-right fa-lg"></i></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right fa-lg"></i></a></li> -->
                            </ul>
                        </nav>
                    </div>
                    
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

        /** Data init */
        var _load_url   = "<?php echo site_url('article/getAjaxRecruitmentList/'.$category_index.'/'.$sub_cg_index);?>",
            _zys_url    = "<?php echo site_url('article/getTotleNav/'.$category_index.'/'.$sub_cg_index);?>",
            _ajax_url   = "<?php echo site_url('article/getAjaxSingleForm/'.$category_index.'/'.$sub_cg_index);?>",
            _cg_url     = "<?php echo site_url('article/getRecruitmentCgByAjax/'.$category_index.'/'.$sub_cg_index);?>"
        
        var ts      = 10,
            page    = 1,
            _Pages  = 1,
            _Value  = {};
            
        /** Data init end */

        /**  main start */
        $(document).ready(function(){
            
            categoryEvent();

            Load();
            
            Loadlist();

            $("#ck").click(function()
            {       
                Load( false, _Value.cg_index );
                Loadlist(false, _Value.cg_index );       
            })

            $("#back").click(function(){

                processShow('list');

                Load(false, _Value.cg_index );
                Loadlist(false, _Value.cg_index );       
            })

        });

        /**  main end */

        /* Category process */ 

        function categoryEvent()
        {
            $('#list_category').find('a').on({
                'click':function()
                {
                    processCategoryInfo( $(this) );
                    
                },
            });
        }

         
        function processCategoryInfo( _this )
        {
            _Value.cg_index    = _this.attr('data-category') == 0 ? false : _this.attr('data-category');

            // Current category
            $('[name="category_2"]').attr('data-category', _Value.cg_index ).val( _Value.cg_index );

            _this.parent('li').parent('ul').find('li').removeClass('active');
            _this.parent('li').addClass('active');

            Cg_index =  _this.attr('data-category') == 0 ? false : _this.attr('data-category');

            processShow( 'list' );
            
            //console.log(Cg_index);
            _Pages = 1;

            //console.log( _Value );
            
            Load( _Value );
            Loadlist( );

        }
             
        function processList( data )
        {

            var len     = data.list.length,
                count   = data.num,
                str     = "";
            _Value.total_num  = count;
            
            for(var k=0; k<len; k++) 
            {
                var _hits   = data.list[k]['article_hits'],
                    _index  = data.list[k]['article_index'],
                    
                    _hits   = !!_hits ? _hits : 0,
                    _index  = data.list[k]['article_is_top'] == 1 ? '공지' : ( count-k-((_Pages-1)*ts) ),
                    _date_now  = Date.parse(new Date())/1000,
                    _date  = data.list[k]['article_created_time'],
                    _date_7  = parseInt(data.list[k]['article_created_time']) + 604800,
                    _showImage = '';

                    console.log(_date, _date_now, _date_7);

                    if( _date_now < _date_7 )
                    {
                        _showImage = '<img class="article_icon" src = "<?php echo base_url()?>resource/frontend/images/newarticle_icon.png" >';
                    }  
                    

                str +=  '<div style="cursor:pointer;" class="kr_form_tr click_div" rel="'+data.list[k]['article_index']+'">'+
                        '<div class="kr_form_td form_sorting">'+_index+'</div>'+
                        '<div class="kr_form_td form_title "><span>'+data.cg[data.list[k]['rec_cg_index']]+'</span>'+data.list[k]['article_name']+_showImage+'</div>'+
                        '<div class="kr_form_td form_time">'+data.list[k]['article_date_start']+' ~ '+data.list[k]['article_date_end']+'</div>'+
                        '<div class="kr_form_td form_auther">'+timestampToTime(data.list[k]['article_created_time'])+'</div>'+
                        '<div class="kr_form_td form_hit">'+_hits+'</div>'+
                        '</div>';
                //str +="<tr rel="+data.list[k]['article_index']+" ><td>"+(count-k-((page-1)*ts))+"</td><td>"+data.list[k]['article_name']+"</td><td>"+data.list[k]['article_author']+"</td><td>"+timestampToTime(data.list[k]['article_created_time'])+"</td></tr>";
            }
            $("#list").html(str)
        }

        function processShow( _type )
        {
            
            switch( _type )
            {
                case 'list':
                    $("#form_list").show();
                    $("#detail").hide();
                    //$("#back").hide();   
                    //$("#pre_next").hide()
                break;

                case 'detail':
                    $("#form_list").hide();
                    $("#detail").show();
                    //$("#back").show();
                    //$("#pre_next").show();
                break;
            }
        }

        function Load( _values  ){
            
            var values = '';
            if ( !!_values )
            {
                values = _values;
            }
            else
            {
                values = _Value;
            }
            var cg_index    =  !!values.cg_index  ? values.cg_index : 0,   
                gjz         = $("#key").val();
            
            $.ajax({
                async:false,
                url: _load_url,
                data:{
                    page    : _Pages,
                    ts      : ts,
                    gjz     : gjz,
                    cg_index: cg_index
                },
                type:"POST",
                dataType:"JSON",                            
                success: function( _data )
                {
                    processList(_data);                            
                }
            })
        }

        function processPaginationEvent ( )
        {
            $("#prev").click(function(){

                if( _Pages >1 )
                {
                    _Pages--;                   
                }

                //var _value = getListInfo(  $('[name=category_2]') )

                Load( );
                Loadlist( );
            })

            $(".item").click(function(){

                //var _value = getListInfo(  $('[name=category_2]') )

                var p = $(this).text();

                _Pages = parseInt(p);

                Load();
                Loadlist();
            })

            $("#next").click(function(){

                //var _value = getListInfo(  $('[name=category_2]') )

                if( _Pages < zys( _Value.cg_index ) )
                {
                _Pages++;
                }

                Load( );
                Loadlist( );
            })
        }
                    
        function Loadlist(  ){

            var total_num   = _Value.total_num ? _Value.total_num : zys( _Value.cg_index ),
                page_num    = Math.ceil(total_num/ts);
                str ="";
            //console.log( total_num,page_num,_Pages);
                //_Pages = _page ? _page : _Pages;

            if( total_num > ts && _Pages > 1)
            {
                str+="<li><a id='prev'>&laquo;</a></li>";
            }
            
            
            for(var i = _Pages-4; i < _Pages+5; i++)
            {
                
                if(i > 0 && i <= page_num)
                {
                    if(i == _Pages)
                    {   
                        str+= "<li class='active'><a>"+i+"</a></li>";   
                    }
                    else
                    {
                        str+= "<li><a class='item'>"+i+"</a></li>";
                    }
                }       
            }
            
            
            if( total_num > ts && _Pages != page_num)
            {
                str+="<li><a id='next'>&raquo;</a></li>";
            }

            $("#fenye").html(str);
                
            processPaginationEvent();
                
        }
            

        function zys( )
        {
            var cg_index    = _Value.cg_inde ? _Value.cg_inde : 0; 
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
                D = date.getDate() < 10 ? '0'+date.getDate()+ ' ' : date.getDate()+ ' ';
                return Y+M+D;
        }



        $(document).on("click",".click_div",function(){

            var _article_index = $(this).attr("rel");

            detailAjax( _article_index );
            
        });
        
        function detailAjax( _article_index )
        {
            _cg_index = !!_Value.cg_index ? _Value.cg_index : 0
            $.ajax({
                
                url: _ajax_url,
                data:{
                    article_index   : _article_index,
                    cg_index        : _cg_index
                    },
                type:"POST",
                dataType:"JSON",                            
                success: function(data)
                { 
                    dateilInit( data );
                }
            })
        }

        function isNull( _value)
        {
            return _value == null ? '' : _value;
        }

        function dateilInit( data )
        {
                                                                
            var time = timestampToTime(data.single.article_created_time);
            
            var _detail_title   = '<span>'+data.cg[data.single.rec_cg_index]+'</span>'+data.single.article_name+'</a>',
                _detail_date    = '<span class="glyphicon glyphicon-time"></span>'+data.single.article_date_start+' ~ '+data.single.article_date_end,
                _date           = '<span class="fa fa-calendar-check-o"></span>'+data.single.article_created_time;
                _detail_hit     = '<span class="glyphicon glyphicon-user"></span>'+data.single.article_hits+'</div>',
                

                _detail_file = '<div class="file" style="margin: 10px;">';
                if( !!data.single.article_attachment_1 )
                {
                    _detail_file += '<div class="file_liulan"><a download="'+isNull(data.single.article_attachment_1_name)+'" href="/'+data.single.article_attachment_1+'" class="liulan">첨부파일</a><span>'+isNull(data.single.article_attachment_1_name)+'</span></div>';
                }
                if( !!data.single.article_attachment_2 )
                {
                    _detail_file += '<div class="file_liulan"><a download="'+isNull(data.single.article_attachment_2_name)+'" href="/'+data.single.article_attachment_2+'" class="liulan">첨부파일</a><span>'+isNull(data.single.article_attachment_2_name)+'</span></div>';
                }
                if( !!data.single.article_attachment_3 )
                {
                    _detail_file += '<div class="file_liulan"><a download="'+isNull(data.single.article_attachment_3_name)+'" href="/'+data.single.article_attachment_3+'" class="liulan">첨부파일</a><span>'+isNull(data.single.article_attachment_3_name)+'</span></div>';
                }
                _detail_file += '</div>';

                _detail_content = data.single.article_content + _detail_file;
           
                
                processShow('detail');

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
            console.log(data);
            var str =""; 

            if( data.pre.article_index != undefined )
            {
                //str +="<tr rel="+data.pre.as_index+"><td>PRE</td></tr></a>";
                str += '<p><a rel="'+data.pre.article_index+'" ><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_top.png" alt=""></i>이전글</b><span>'+data.cg[data.pre.rec_cg_index]+'</span>'+data.pre.article_name+'</a></p>';
            }
            if( data.next.article_index != undefined)
            {
                //str +="<tr rel="+data.next.as_index+"><td>NEXT</td></tr></a>";
                str += '<p><a rel="'+data.next.article_index+'" ><b><i><img src="<?php echo base_url()?>resource/frontend/images/arrow_bottom.png" alt=""></i>다음글</b><span>'+data.cg[data.next.rec_cg_index]+'</span>'+data.next.article_name+'</a></p> ';
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