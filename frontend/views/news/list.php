<!DOCTYPE html>
<html lang="ko">

    <?php $this->load->view('include/head')?>

<body>
<header>
    <div class="container">
        <div class="row">

            <?php $this->load->view('include/nav')?>

        </div>
    </div>
</header>

<div class="board">
    <div class="container_content">
        <div class="row"> <a href="<?php echo base_url()?>" class="board_index"><span style="line-height: 40px;" class="glyphicon glyphicon-home"></span></a>
            <div class="btn-group board_nav">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="margin-top:0px;line-height:40px">뉴스/홍보</span>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($category as $item):?>
                        <li><a href="<?php echo site_url($item['category_template_module'].'/'.$item['category_url'].'/'.$item['category_index']); ?>"><?php echo $item['category_name'] ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>

            <div class="btn-group board_nav">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style="margin-top:0px;line-height:40px">보도자료</span>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                </button>
                <ul class="dropdown-menu">

                    <?php foreach ( $sub_category[52] as $item):  ?>
                        <li><a href="<?php echo site_url($item['category_template_module'].'/'.$item['category_url'].'/'.$item['category_index']); ?>"><?php echo $item['category_name'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="container_content">
    <div class="row">
        <div class="page_title">보도자료 </div>
        <div class="sub_4_1_tabs">
            <ul>
                <li data-active = "1"><a href="<?php echo site_url('news/lists/1')?>">보도자료 </a></li>
                <li data-active = "2" ><a href="<?php echo site_url('news/lists/2')?>">신제품소개</a></li>
            </ul>

        </div>
        <div class="sub_4_search_number">
            총 <b class="max_news_number">360</b> 건
        </div>


        <div class="sub_4_search">
            <form id="" name="" action="" method="get" enctype="multipart/form-data" onsubmit="return function(){

 		var trim = function( str ){

 			return ( typeof str == 'string' ? str : '' ).replace( /(^\s+)|(\s+$)/ , '' )

 		},check = function(){

			if( !trim( $( target = $( form ).find( '[id=\'search_input\']' ) ).val() ) )

				return target.addClass( 'fail_input' ) , target.off( 'input' ).off( 'change' ).on({

					'input' : check,
					'change' : check

				}) , false;

			else

				target.removeClass( 'fail_input' );

 		},form = this,target;

 		return check();

 	}.call( this )">
                <input type="text" value="" id="search_input" name="search_word" placeholder="검색어를 입력해 주세요">

                <button type="submit">검색</button>
            </form>

        </div>

        <div class="sub_4_news_list">
            <ul>
                <?php foreach ( $news_list as $item ): ?>
                <li>
                    <div class="row">
                        <div class="col-md-4 sub_4_news_images"><a href="<?php echo site_url('news/detail/'.$item['news_index'])?>"><img src="<?php echo base_url().$item['news_image']?>"></a></div>
                        <div class="col-md-8 sub_4_news_text">
                            <div class="sub_4_news_text_title">
                                <a href="<?php echo site_url('news/detail/'.$item['news_index'])?>"><span>[<?php echo $item['news_cg_name']?>]</span> <?php echo $item['news_title']?> </a>
                            </div>
                            <div class="sub_4_news_text_dec" style="white-space: pre-wrap; word-wrap: break-word;"><?php echo $item['news_description']?></div>
                            <div class="sub_4_news_text_time">
                                <?php echo date('Y.m.d', $item['news_create_date']);?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach;?>

            </ul>

        </div>


        <a href="javascript:;" class="sub_4_news_list_ajax_button get_more">

            + 더보기 ( <b class="now_news_number">5</b> / <span class="max_news_number">360</span> )
        </a>

    </div>
</div>

<?php $this->load->view('include/footer')?>

<?php $this->load->view('include/footer_script')?>

<script>
    var _url_2 = '<?php echo $this->uri->segment(3) ?>';

    _url_2 == 1 ?
        $("li[data-active='1']").addClass('active') :
        $("li[data-active='2']").addClass('active');


</script>

<script>

    var _ajax_url = '<?php echo site_url('news/getListByAjax')?>',
        _cg_index = '<?php echo $this->uri->segment(3)?>' != '' ? '<?php echo $this->uri->segment(3)?>' : 1,
        _search = '<?php echo $this->input->get('search_word')?>';
        console.log(_search);

</script>

<script>

    var create_left = function( bl , src ){

        return bl ? '<div class="col-md-4 sub_4_news_images"><a href="javscript:;"><img src="'+ src +'"></a></div>' : '';

    },create_right = function( bl , json ){

        return '<div class="'+ ( bl ? 'col-md-8' : 'col-md-12' ) +' sub_4_news_text"><div class="sub_4_news_text_title"><a href="'+ json.url +'"><span>['+ json.tags +']</span>'+ json.title +'</a></div><div class="sub_4_news_text_dec">'+json.detail+'</div><div class="sub_4_news_text_time">'+json.date+'</div></div>';

    }

    get_more( '.sub_4_news_list>ul' , {} , <?php if($list_count > 5){echo 5;}elseif($list_count > 0){echo $list_count;}else{echo 0;}; ?> , <?php echo $list_count ?> , 5 , _ajax_url , function( json ){

        return $('<li><div class="row">'+ create_left( json.img_src , json.img_src ) + create_right( json.img_src , json ) +'</div></li>');

    } , function(){

        return {

            cg_index : _cg_index,
            search : _search

        }

    } );

</script>
<style>

    .sub_4_search input.fail_input{
        border-color:red;
        outline:none;
    }

    .header_search input.fail_input{
        border:1px solid red;
        outline:none;
    }

</style>
</body>
</html>