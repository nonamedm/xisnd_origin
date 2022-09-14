<?php

class Test extends Basic_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function myCodes( $str )
    {
        return urldecode( $str );
    }

    public function echoValue2( $value )
    {
        echo $value;
    }

    private function echoValue( $value )
    {
        echo $value;
    }

    public function Jurisdiction()
    {
        function myCode( $str )
        {
            return urldecode( $str );
        }
        /*$data = array("name"=>"callback" , "value"=>"test");
        $rs1 = http_build_query( $data );      //直接调用php函数
        $rs2  = call_user_func("http_build_query",$data); //使用回调函数
        echo $rs1;  //name=callback&value=test
        echo "<br />";
        echo $rs2;  //name=callback&value=test*/

        /*$data = array( "name"=>"callback" , "value"=>"天才" );
        $str  = http_build_query( $data );
        $rs1  = urldecode( $str );      //urlencode编码
        $rs2  = call_user_func(array( 'Test', 'myCodes' ),$str );
        echo $rs1;  //name=callback&value=天才
        echo "<br />";
        echo $rs2;  //name=callback&value=天才

        //这里我们可以看到,我们直接使用函数的名称也是可以的,不需要带引号字符串。*/

        $encode  = call_user_func(array(Test,"myCodes"),$str);
        //直接使用类的静态方法 将字符串进行url编码 不再是字符串或者函数名,而是一个数组格式,第一个项表示类名,第二个项则表示方法名。 第一项可以为类的引用地址,第二项为静态方法名称
        $decode  = call_user_func(array("Test","myCodes"),$encode);
        //同样是使用类的方法,不过调用的是普通方法名称。
        echo $encode;  //%3Fquery%3D%2Ftest%2Fdemo1
        echo "<br />"; //?query=/test/demo1
        echo $decode;
//注意 使用方法名也具有作用域的概念,即private protected 和 public,通常回调类方法都只能调用publi 和默认作用域的 方法。
//同时如果是普通方法,并且内部使用了$this变量,那么进行调用是无法成功的.

    }
}