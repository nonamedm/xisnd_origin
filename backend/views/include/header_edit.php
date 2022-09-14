<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> Xi S&D Admin</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="<?php echo base_url(); ?>resource/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/admin/css/plugins/webuploader/webuploader.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resource/admin/css/demo/webuploader-demo.css">
    <link href="<?php echo base_url(); ?>resource/admin/css/style.css?v=4.1.0" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>resource/admin/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    <script type="text/javascript"> 

        function del() {

            var msg = "삭제하시겠습니까?";

            if (confirm(msg)==true){

                return true;

            }else{

                return false;

            }

        }

    </script>
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">

    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">

        <div class="nav-close">
            <i class="fa fa-times-circle"></i>
        </div>

        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs" style="font-size:20px;">
                                    <i class="fa fa-area-chart"></i>
                                    <strong class="font-bold">Xi S&D</strong>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        
                    </div>
                </li>
                <?php if($this->session->admin_grade < 2):?>

                <li>
                    <a class="J_menuItem" href="<?php echo site_url('main'); ?>">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">Admin Home</span>
                    </a>
                </li>
                <li data-active = "form">
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">사이버신문고</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "formLists"  >
                            <a class="J_menuItem" href="<?php echo site_url('form/formLists')?>">리스트</a>
                        </li>
                        <li data-active = "formLists"  >
                            <a class="J_menuItem" href="<?php echo site_url('form/email')?>">이메일 설정</a>
                        </li>
                    </ul>
                </li>
                <li data-active = "news" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">공지</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('news/lists/50')?>">리스트</a>
                        </li>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('news/detail')?>">추가</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php if($this->session->admin_grade == 4):?>
				<li data-active = "sell_old" >
                                    <a href="#">
                                        <i class="fa "></i>
                                        <span class="nav-label">분양안내</span>
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="nav nav-second-level">
                                        <li data-active = "lists">
                                            <a class="J_menuItem" href="<?php echo site_url('sell_old/sell_list')?>">리스트</a>
                                        </li>
                                        <li data-active = "detail">
                                            <a class="J_menuItem" href="<?php echo site_url('sell_old/sell_detail')?>">추가</a>
                                        </li>
                                    </ul>
                                </li>
                <?php endif;?>
                <?php if($this->session->admin_grade == 3):?>
                <li data-active = "sell" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">공사정보</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                    <?php if($this->session->admin_grade != 1):?>
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('sell/regional_list')?>">지역설정</a>
                        </li>
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('sell/regional_detail')?>">지역설정 추가</a>
                        </li>
                    <?php endif;?>
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('sell/sell_list')?>">단지안내</a>
                        </li>
                        <?php if($this->session->admin_grade != 1):?>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('sell/add_sell')?>">단지추가</a>
                        </li>
                        <?php endif;?>
                    </ul>
                </li>
                <?php endif;?>
                
                <?php if($this->session->admin_grade == 2):?>
                <li data-active = "recruitment" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">채용공고</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('recruitment/lists/46')?>">리스트</a>
                        </li>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('recruitment/detail')?>">추가</a>
                        </li>
                    </ul>
                </li>
                <?php endif;?>
                <?php if($this->session->admin_grade < 2):?>
                <li data-active = "download" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">다운로드</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('download/lists/56')?>">리스트</a>
                        </li>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('download/detail')?>">추가</a>
                        </li>
                    </ul>
                </li>
                <li data-active = "article_date" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">주요연혁</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "article_date_list">
                            <a class="J_menuItem" href="<?php echo site_url('article_date/article_date_list')?>">리스트</a>
                        </li>
                        <li data-active = "add_article_date">
                            <a class="J_menuItem" href="<?php echo site_url('article_date/add_article_date')?>">연혁추가</a>
                        </li>
                        <li data-active = "cate_list">
                            <a class="J_menuItem" href="<?php echo site_url('article_date/cate_list')?>">연도 List</a>
                        </li>
                        <li data-active = "add_cate">
                            <a class="J_menuItem" href="<?php echo site_url('article_date/add_cate')?>">연도추가</a>
                        </li>
                    </ul>
                </li>
				<li data-active = "pop" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">팝업 관리</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "pop_list">
                            <a class="J_menuItem" href="<?php echo site_url('pop/pop_list')?>">팝업 관리</a>
                        </li>
                        <li data-active = "add_pop">
                            <a class="J_menuItem" href="<?php echo site_url('pop/add_pop')?>">새 팝업 추가</a>
                        </li>
                    </ul>
                </li>
                <li data-active = "setting" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">Family Site</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "article_date_list">
                            <a class="J_menuItem" href="<?php echo site_url('setting/familySite')?>">리스트</a>
                        </li>
                        <li data-active = "article_date_list">
                            <a class="J_menuItem" href="<?php echo site_url('setting/familyDetail')?>">추가</a>
                        </li>
                    </ul>
                </li>
            <?php endif;?>

                <li>
                    <a href="/" target="_blank"><i class="fa fa-cutlery"></i> <span class="nav-label">홈페이지</span></a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user"></i> <span class="nav-label" style="color:white"><?php echo 'Hello,'.$_SESSION['admin_nick_name'];?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li><a class="J_menuItem" href="<?php echo site_url('profile'); ?>">내 프로파일</a></li>
                        <li><a class="J_menuItem" href="<?php echo site_url('login/signout'); ?>">로그아웃</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->