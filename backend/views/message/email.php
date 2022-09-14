<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>

    <!--右侧部分开始-->
<div id="page-wrapper">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>편집</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('Message/update')?>">
                        <input type="hidden" name="form_status" value="1">
                        <div class="hr-line-dashed"></div>
                        <?php foreach($message_email as $index => $item): if(!empty($item['message_email'])):?>
                        <div class="form-group form_init">
                            <label class="col-sm-2 control-label"><?php echo $index == 0 ? "Email" : ""; ?></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control email_input" name="email[]" id="email" value="<?php echo $item['message_email']; ?>">
                            </div>
                            <div class="col-sm-3">
                                <button  class="btn btn-primary email_remove" type="button" name="email_remove" value="SAVE"> REMOVE </button>
                            </div>
                        </div>
                        <?php endif; endforeach; ?>
                        <div class="form-group form_init">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control email_input" name="email[]" id="email" value="">
                            </div>
                            <div class="col-sm-3">
                                <button  class="btn btn-primary email_remove" type="button" name="submit" value="SAVE"> REMOVE </button>
                                <button  class="btn btn-primary email_add" type="button" name="submit" value="SAVE"> NEW </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input class="btn btn-primary submit" type="submit" name="submit" value="SAVE">
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--右侧部分结束-->
    </div>
<?php
$this->load->view('footer');
?>
    <!-- 自定义js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/content.js?v=1.0.0"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>resource/admin/js/plugins/iCheck/icheck.min.js"></script>
<script>

var createNode = function( node , txt , id , className , style , data ){

        return '<' + node
                 + ( id ? ' id="' + id + '"' : '' )
                 + ( className ? ' class="' + className + '"' : '' )
                 + ( style ? ' style="' + style + '"' : '' )
                 + ( data ? ' ' + data + '' : '' ) + '>'
                 + txt
                 + '</' + node + '>';

    },
    createButton = function( className , txt ){

        //<button class="btn btn-primary email_add" type="button" name="submit" value="SAVE" data-id="01"> NEW </button>
        return createNode( 'button' , txt ? txt : ' NEW ' , '' , 'btn btn-primary' + ( className ? ' ' + className : ' email_add' ) , '' , 'type="button"'  );

    },
    createGroup = function(){

        //<button class="btn btn-primary email_remove" type="button" name="submit" value="SAVE"> REMOVE </button>
        //hagun0003@naver.com
        var btn = $( createButton( 'email_remove' , ' REMOVE ' ) ),
            div = $( createNode( 'div' , '' , '' , 'col-sm-3' ) ),
            txt = createNode(

                'div' , 
                '<label class="col-sm-2 control-label"></label><div class="col-sm-3"><input type="text" ' +
                'class="form-control email_input" name="email[]" id="email" value=""></div>',
                '',
                'form-group form_init'

            ),
            dom;

        dom = $( txt );

        //console.log( dom )

        div.append( btn );
        div.append( '&nbsp;' );

        dom.append( div );
            
        return [ dom , btn ];

    },
    delete_Button = function( name ){

        var btn = $( queryButton + name );
        
        btn.remove();

        return btn;

    },
    append_Button = function( target , btn ){

        $( target ).append( btn );

    },
    has_Button = function( node , name ){

        if( $( node ).find( name ).length )

            return true;

        return false;

    },
    queryParents = function( target , name ){

        return $( $( target ).parents( name ) );

    },
    queryTxt = '.form-horizontal .form-group.form_init',
    queryButton = '.form-horizontal .btn',
    queryLastDiv = 'div.col-sm-3:last-child',
    query_add = '.email_add',
    query_remove = '.email_remove',
    query_input = '.email_input'; 

    var ___email_remove = function (__this){
        var target = $( __this ); 

        if($( query_input ).length > 1){

            queryParents( target , queryTxt ).remove();

            var _add = $( createButton() ),
               data = $( queryTxt ),
               last = $( data[ data.length - 1 ] );//$('.email_add').prop("outerHTML");

            if($(query_remove).index(__this) < 1){
                $(query_remove).eq(0).closest('.form_init').find('.control-label').text('Email');
            }
            delete_Button( query_add );

            if( !has_Button( last , query_add ) )

                append_Button( last.children( queryLastDiv ) , _add );


            ___email_function( _add , true );

        } 
    }

    var ___email_add = function(__this){

        var target = $( __this ),
            data = queryParents( target , queryTxt ),
            _add = $( createButton() ),
            group = createGroup(),
            dom = $( group[ 0 ] );

        delete_Button( query_add );
        

        //var _this = $(__this).closest('.form-group');
        //var _email = _this.prop('outerHTML');
        // var _add = $('.email_add').prop("outerHTML");
        //$('.email_add').remove();
        data.after( dom );

        append_Button( dom.children( queryLastDiv ) , _add );
        
        ___email_function( group[ 1 ]  );

        console.log( _add )
        
        ___email_function( _add , true  );

    }

    var ___email_function = function( target , bl ){

        var _target = $( target );

        if( bl )
        
            _target.on('click', function(){
                ___email_add(this);
            });

        else

            _target.on('click', function(){
                ___email_remove(this);
            });

    }

     $(document).ready(function () {

        ___email_function( query_remove );

        ___email_function( query_add , true );

        if($('.email_remove').index() < 1){
                $('.email_remove').eq(0).closest('.form_init').find('.control-label').text('Email');
        }

          /* $("#admin_id").blur(function() {

                var admin_id = $("#admin_id").val();
	            htmlobj = $.ajax({
					url: "<?php //echo site_url('admin/ajaxCheckAdmin'); ?>",
					type: "POST",
					async:false ,
					dataType: "json",
					data: {
						   admin_id:admin_id
						  }
				    });

                $("#verify").html(htmlobj.responseText);
                
            }); */
            
         $('.submit').on( 'click' , function(){
            var _email_array = new Array();
            var i = 0;
            $('.email_input').each(function(){
                 i++;
                _email_array.push($(this).val());
                console.log($(this).val());
            });
            console.log(_email_array);
            
            $.ajax({
                // url : $(this).closest('form').attr('action'), 
                url : '<?php echo site_url('Message/ajaxProcessEmail'); ?>',
                type: 'POST', 
                dataType:'text',
                data:{
                    email:JSON.stringify(_email_array)
                },
                success:function(e){
                    if(e == 1){
                        alert('Success');
                    }else{
                        alert('Failed');
                    }
                },
                error:function(xhr,status,error){
                    alert('Failed');
                }
            });

            return false;
        }); 
     });
</script>