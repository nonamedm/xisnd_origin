<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>LOGIN</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="<?php echo base_url(); ?>resource/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="<?php echo base_url(); ?>resource/admin/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div >

                <h1 class="logo-name">Xi S&D</h1>

            </div>
            <h3>Content Manage System v-1.2</h3>

            <form class="m-t" role="form" method="post" action="<?php echo site_url('login/signin'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="User ID" required="" name="admin_id" id="admin_id" >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="User Password" required="" name="admin_pwd" id="admin_pwd" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Captcha" required="" name="captcha" id="captcha" >
                </div>
                <div class="form-group">
                    <img onclick="this.src='<?php echo site_url('login/captcha/') ?>'+Math.random()" src="<?php echo site_url('login/captcha') ?>" />
                </div>

				<input type="submit" name="submit" id="submit" class="btn btn-primary block full-width m-b" value="LOGIN">

            </form>
        </div>
    </div>

    <!-- 全局js -->
    <script src="<?php echo base_url(); ?>resource/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="<?php echo base_url(); ?>resource/admin/js/bootstrap.min.js?v=3.3.6"></script>

</body>

</html>
