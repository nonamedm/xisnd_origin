<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('include/header');
?>

        <div class="page_container index_01">

            <div class="head row index_01">

                <a href="javascript:history && history.back();" style="margin-right:15px;"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>회원 가입

            </div>

            <form id="change_info" class="change_form_unit_edit" onsubmit="return (function(){

                    return this.getAttribute( 'data-status' ) == 1 ?

                        page.init.send_form_data( 'change_info' , 'http://127.0.0.1/test.php' , 'GET' ) :

                        false;

                }).call( this );">

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="form form_01">

                        <div class="content">

                            <div class="clear"></div>

                            <div class="item title">

                                기본 데이터

                            </div>

                            <div class="item">

                                <div class="left">

                                    아이디

                                </div>

                                <div class="right full">

                                    <input class="form-control special full change_form_unit_edit" data-status="0" data-change_type="input" name="user_id" readonly="readonly" value="Junde123">

                                </div>

                            </div>

                            <div class="item">

                                <div class="left">

                                    이름

                                </div>

                                <div class="right full">

                                    <input class="form-control special full change_form_unit_edit" data-status="0" data-change_type="input" name="user_name" value="Junde" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="item">

                                <div class="left">

                                    연락처

                                </div>

                                <div class="right full">

                                    <input class="form-control special full change_form_unit_edit" data-status="0" data-change_type="input" name="contact" value="11111111111" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="item">

                                <div class="left">

                                    이메일

                                </div>

                                <div class="right full">

                                    <input class="form-control special full change_form_unit_edit" data-status="0" data-change_type="input" name="mail" value="1261466029@qq.com" readonly="readonly"/>

                                </div>

                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="form form_01">

                        <div class="content">

                            <div class="clear"></div>

                            <div class="item">

                                <div class="left">

                                    지역

                                </div>

                                <div class="right">

                                    <div class="btn-group bigger special like_form_unit like_selection change_form_unit_edit area area_start" data-draggable="change_info" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">경상남도</span> <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a href="javascript:;" data-type="option" data-value="0" style="color:#333;">경상남도</a></li>
                                            <li><a href="javascript:;" data-type="option" data-value="1" style="color:#333;">1</a></li>
                                            <li><a href="javascript:;" data-type="option" data-value="2" style="color:#333;">2</a></li>
                                            <li><a href="javascript:;" data-type="option" data-value="3" style="color:#333;">3</a></li>
                                        </ul>

                                    </div>

                                    <div class="btn-group bigger special like_selection change_form_unit_edit area area_end" data-draggable="change_info" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">창원시</span> <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">창원시</a></li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="form form_01">

                        <div class="content">

                            <div class="clear"></div>

                            <div class="item title">

                                지역

                            </div>

                            <div class="item" id="change_block">

                                <div class="right" style="width:100%;">

                                    <div class="btn-group full special search_criteria change_form_unit_edit like_selection" data-draggable="change_info" data-name="field_01" data-type="selection" data-index="0" data-category="0" data-value="1" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">경상남도</span> <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">경상남도</a></li>
                                            <li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">1</a></li>
                                            <li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">2</a></li>
                                            <li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">3</a></li>
                                        </ul>

                                    </div>

                                </div>

                                <div class="right" style="width:100%;">

                                    <div class="btn-group full special search_criteria change_form_unit_edit like_selection" data-draggable="change_info" data-name="field_02" data-type="selection" data-index="1" data-category="0" data-value="1" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">경상남도</span><span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">경상남도</a></li>
                                            <li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">1</a></li>
                                            <li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">2</a></li>
                                            <li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">3</a></li>
                                        </ul>

                                    </div>

                                </div>

                                <div class="right" style="width:100%;">

                                    <div class="btn-group full special search_criteria change_form_unit_edit like_selection" data-draggable="change_info" data-name="field_03" data-type="selection" data-index="2" data-category="0" data-value="3" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">경상남도</span><span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">경상남도</a></li>
                                            <li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">1</a></li>
                                            <li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">2</a></li>
                                            <li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">3</a></li>
                                        </ul>

                                    </div>

                                </div>

                                <div class="right" style="width:100%;">

                                    <div class="btn-group full special search_criteria change_form_unit_edit like_selection" data-draggable="change_info" data-name="field_04" data-type="selection" data-index="3" data-category="0" data-value="4" data-status="0" data-change_type="select">

                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown_none" aria-haspopup="true" aria-expanded="false">
                                            <span data-type="show">경상남도</span><span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu" data-type="options_block">
                                            <li><a data-type="option" data-value="0" href="javascript:;" style="color:#333;">경상남도</a></li>
                                            <li><a data-type="option" data-value="1" href="javascript:;" style="color:#333;">1</a></li>
                                            <li><a data-type="option" data-value="2" href="javascript:;" style="color:#333;">2</a></li>
                                            <li><a data-type="option" data-value="3" href="javascript:;" style="color:#333;">3</a></li>
                                        </ul>

                                    </div>

                                </div>

                            </div>

                            <div class="icon">
                                <a href="javascript:;" data-next_category="1" id="add_new_category" class="change_form_unit_edit" data-draggable="change_info" data-status="0" data-change_type="button">
                                    <img src="../resources/images/icon_more.png" >
                                </a>
                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="result_block">

                        <div class="form form_01">

                            <div class="content">

                                <div class="clear"></div>

                                <div class="item">

                                    <div class="right" id="changed_block">

                                        <button type="button" class="btn btn-danger change_form_unit_edit" data-type="selected" data-index="0" data-category="0" data-name="1111" data-value="1" data-status="0" data-change_type="button" style="margin-top:10px;">

                                            경상남도 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>

                                        </button>

                                        <button type="button" class="btn btn-danger change_form_unit_edit" data-type="selected" data-index="1" data-category="0" data-name="1112" data-value="1" data-status="0" data-change_type="button"  style="margin-top:10px;">

                                            경상남도 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>

                                        </button>

                                        <button type="button" class="btn btn-danger change_form_unit_edit" data-type="selected" data-index="2" data-category="0" data-name="1113" data-value="3" data-status="0" data-change_type="button"  style="margin-top:10px;">

                                            경상남도 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>

                                        </button>

                                        <button type="button" class="btn btn-danger change_form_unit_edit" data-type="selected" data-index="3" data-category="0" data-name="1117" data-value="4" data-status="0" data-change_type="button"  style="margin-top:10px;">

                                            경상남도 <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>

                                        </button>

                                    </div>

                                </div>

                                <div class="clear"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="row index_02" style="margin:15px 0 0;padding:15px;">

                    <div class="form form_01">

                        <div class="content">

                            <div class="clear"></div>

                            <div class="item title">

                                상세내용

                            </div>

                            <div class="item">

                                <div class="right" style="width:100%;">

                                    <textarea class="form-control textarea special full change_form_unit_edit" name="textarea" data-status="0" data-change_type="input" readonly="readonly">

        这是一个 文本域，之所以不可编辑，是因为他的readonly属性被使用。
        由于方便 添加Js操作 。于是 采用这样的写法，方便处理和展示。
        ... ...
        ... ...
        ... ...
        ... ...
        ... ...
        ... ...
        ... ...
                                    </textarea>

                                </div>

                            </div>

                            <div class="item">

                                <div class="right" style="width:100%;">

                                    <button type="submit" class="btn btn-primary special submit" style="margin-right:15px;float:right;">

                                        저장하기

                                    </button>

                                </div>

                            </div>

                            <div class="clear"></div>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <?php

$this->load->view('include/footer');
?>
<script>

    $().ready(function(){

        page.init.init( 4 );

    });

</script>

<script>

    !function(){

        var tool = $().tool(),
            create = tool.create_nodes,
            array_walk = tool.array_walk,
            add = page.init.click_add(
                function (arg,type) {
                    return type == 'selection' ? $( arg ).parent( '.right' ).get(0) : arg;
                },
                function (arg, type , get_context , get_last_dom ) {
                    var right = create( 'div' , {'class':'right','style':'width:100%;'}),
                            result;
                    if( !get_context )
                        right.append( arg );

                    if( get_last_dom ){
                        if( type == 'selection' )
                            result = $( get_last_dom() ).parent('.right').get(0);
                        else
                            result = $( get_last_dom() ).get(0);
                    } else result = type == 'selection' ? right : arg;
                    return result;
                },
                function (category, index, name, value, data, type) {

                    var attr_arr = {
                        'data-type': type,
                        'data-draggable' : 'change_info',
                        'data-index': index,
                        'data-name': name,
                        'data-category': category,
                        'data-value': value,
                        'data-status' : 1
                    }, create_options = function(){

                        return setTimeout(init,0) , array_walk( data , function( key , value ){

                            html += '<li><a data-type="option" data-value="'+ key +'" href="javascript:;" style="color:#333;">'+ value +'</a></li>';

                        } , true ),html;

                    },target, html = '';

                    if( type == 'selection' )

                        attr_arr[ 'class' ] = 'btn-group full special search_criteria change_form_unit_edit like_selection',

                                attr_arr[ 'data-change_type' ] = 'select',

                                target = create( 'div' , attr_arr , '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span data-type="show"></span> <span class="caret"></span> </button>' );

                    else

                        attr_arr[ 'class' ] = 'btn btn-danger change_form_unit_edit',

                                attr_arr[ 'style' ] = 'margin-top:10px',

                                attr_arr[ 'data-change_type' ] = 'button',

                                target = create( 'button' , attr_arr , data + '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>' );

                    return type == 'selection' ? target.append( create( 'ul' , {'class':'dropdown-menu','data-type':'options_block'} , create_options() ) ) : target ;

                }
            ),
            init = function(){

                var data = add.getData('selection'),
                        get_right = function( target ){return $( target ).parent( '.right' );};

                return array_walk( data , function( key , value ){

                    array_walk( tool.to_array( value ) , function( key , value ){

                        key == 0 ?

                                get_right( value.dom ).css({'margin-top' : '25px' }) :

                                get_right( value.dom ).css({'margin-top' : '0px'});

                        dom = value.dom;

                    } , true )

                } , true );

            },
            debug = false,
            change_block = '#change_block',
            changed_block = '#changed_block',
            all_block = change_block + ',' + changed_block,
            add_selection = '#add_new_category',
            add_category_status = 0,
            i = 1000,
            default_option_value = 'Please Select ...',
            get_option_innertext = function( target ){

                var _target = $( target ).get(0),
                        data;

                return data = page.init.like_selection().domList.get( _target ),

                        data.options[ data.value ] && data.options[ data.value ].innerText;

            },
            handle_response = function (res) {

                var response;

                return tool.handle_try(function () {

                    response = res;

                }, function () {

                    response = tool.is_string(res) ? JSON.parse(res) : res;

                }), response;

            },
            handle_formData = function (target) {

                var result = {}, _target;

                return _target = add.getDomData($( target ).get(0) ),
                        result.category = _target.category,
                        result.name = _target.name,
                        result.value = _target.value,
                        result;

            },
            ajax = function (url, data, callback) {

                debug ?

                        callback({

                            status : 1,
                            category : 0,
                            name : 123456789,
                            options : {

                                0 : '默认',
                                1 : 'Junde',
                                2 : 'Lee',
                                3 : 'Junde Lee'

                            }

                        }):

                        $.ajax({

                            url: url,
                            type: 'POST',
                            data: data,
                            success: function (res) {
                                var response = handle_response(res);
                                callback(response);
                            },
                            error : function(){
                                callback({status:0});
                            }

                        })

            },
            change_area = function(){

                return {

                    'check' : function( target ){

                        return $( target ).is( '.area.area_start' ) ? this.get_items() : undefined;

                    },

                    'get_items' : function(){

                        return this.start = $( '.area.area_start' ).get(0),

                                this.end = $( '.area.area_end' ).get( 0 ),

                                this;

                    },

                    'get_end_options_block':function( options ){

                        return $( $( this.end ).find( '[data-type="options_block"]' )).html( options );

                    },

                    'get_value' : function( target ){

                        return $( target ).attr( 'data-value' );

                    },

                    'create_options' : function( key , value ){

                        return '<li><a data-type="option" data-value="'+ key +'" href="javascript:;" style="color:#333;">'+ value +'</a></li>'

                    },

                    'init' : function( ajaxUrl ){

                        return this.ajaxUrl = ajaxUrl,

                                this;

                    },

                    'change_button_toggle' : function( type ){

                        return $( $( this.end ).children( 'button' ) ).attr( 'data-toggle' , type ? 'dropdown_none' : 'dropdown' );

                    },

                    'ajax' : function( value ){

                        var self = this;

                        if( value != 0 )

                            $.ajax({

                                url : this.ajaxUrl,
                                data : {'area_key' : value},
                                type : 'POST',
                                success : function( res ){

                                    var response = handle_response( res),
                                            options = '';

                                    array_walk( response , function( key , value ){

                                        options += self.create_options( key , value );

                                    } , true );

                                    self.get_end_options_block( options );

                                    get_like_selection();

                                    options ? self.change_button_toggle() : self.change_button_toggle( true );

                                }

                            });

                        else

                            this.get_end_options_block( this.create_options( '0' , default_option_value ) ) , get_like_selection() , self.change_button_toggle( true );

                    },

                    'change' : function( target ){

                        var _target = $( target ).get( 0 ),
                                start = $( this.start );

                        if( !_target )

                            return;

                        if( _target == start.get( 0 ) )

                            this.ajax( this.get_value( _target ) );

                    }

                }

            },
            get_like_selection = function(){

                return page.init.like_selection( '.form' );

            };

        get_like_selection().set_change(function ( option , value ) {

            var target = add.is( this ) ? $( this ) : '',
                    area = change_area().check( this );

            if( area )

                return area.init( '../templates/view/ajax_02.php' ).change( this );

            if( !target || target.attr( 'data-status' ) == 0 )

                return ;

            add.clear(target.get(0));

            if( target.length && add.change_value( target , value ) && value != 0 )

                ajax('../templates/view/ajax_01.php', handle_formData(target), function (res) {

                    switch (res.status - 0) {

                        case 1:
                            add.add(res.category, i++, res.name, 0, 'selection', res.options).add(target.attr('data-category'),target.attr('data-index'),target.attr('data-name'),target.attr('data-value'),'selected',get_option_innertext( target ));
                            break;

                        case 0:
                            break;

                    }

                    get_like_selection();

                });

        });

        $( changed_block ).on( 'click' , function(e){

            var target = add.is(e.target) ?
                            e.target :
                            $(e.target).parent(changed_block + ' [data-type="selected"]').get(0),
                    _target = add.get_another(target);

            if( $(target).attr( 'data-status' ) == 0 )

                return ;

            target && add.clear(target);

        });

        $(add_selection).bind('click', function(){

            var target = this,
                    _category = this.getAttribute( 'data-next_category' );

            if( $( target ).attr( 'data-status' ) == 0 )

                return ;

            add_category_status = 1;

            ajax( '../templates/view/ajax_03.php?status=1' , {'category' : _category } , function (res) {

                switch (res.status - 0) {

                    case 1:
                        add.add(_category, i++, res.name, 0, 'selection', res.options);
                        target.setAttribute( 'data-next_category' , res.category );
                        break;
                    case 0:
                        break;

                }

                add_category_status = 0;

                get_like_selection();

            });

        });

    }( window , void( 0 ) );

</script>
