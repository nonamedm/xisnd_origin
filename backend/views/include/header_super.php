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
                                    <strong class="font-bold">Transino</strong>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        <?php echo _('ADMIN'); ?>
                    </div>
                </li>

                <li>
                    <a class="J_menuItem" href="<?php echo site_url('main'); ?>">
                        <i class="fa fa-home"></i>
                        <span class="nav-label"><?php echo _('HOME'); ?></span>
                    </a>
                </li>

                <li >
                    <a href="#">
                        <i class="fa fa-photo"></i>
                        <span class="nav-label"><?php echo _('Slide'); ?></span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo site_url('slide'); ?>"><?php echo _('Slide List'); ?></a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo site_url('slide/add'); ?>"><?php echo _('Add Slide'); ?></a>
                        </li>

                        <?php if($this->session->admin_grade < 0): ?>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_slide'); ?>"><?php echo _('Slide Category'); ?></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_slide/add'); ?>"><?php echo _('Add Slide Category'); ?></a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </li>
                <li data-active = "form">
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">表单管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "formLists"  >
                            <a class="J_menuItem" href="<?php echo site_url('form/formLists')?>">表单列表</a>
                        </li> 
                        <?php if($this->session->admin_grade < 1): ?>
                            <li data-active = "categoryLists" >
                                <a class="J_menuItem" href="<?php echo site_url('form/categoryLists')?>">表单分类</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li data-active = "news" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">新闻通知</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('news/lists/50')?>">新闻列表</a>
                        </li>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('news/detail')?>">添加新闻</a>
                        </li>
                        <li data-active = "categoryLists">
                            <a class="J_menuItem" href="<?php echo site_url('news/categoryLists')?>">新闻分类</a>
                        </li>
                    </ul>
                </li>
                <li data-active = "recruitment" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">recruitment 회사소개</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('recruitment/lists/46')?>">列表</a>
                        </li>
                        <li data-active = "detail">
                            <a class="J_menuItem" href="<?php echo site_url('recruitment/detail')?>">添加</a>
                        </li>
                        <li data-active = "categoryLists">
                            <a class="J_menuItem" href="<?php echo site_url('recruitment/categoryLists')?>">分类</a>
                        </li>
                    </ul>
                </li>
                <li data-active = "redtransfer" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">下载</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "lists">
                            <a class="J_menuItem" href="<?php echo site_url('download/lists/56')?>">List</a>
                        </li>
                        <li data-active = "create">
                            <a class="J_menuItem" href="<?php echo site_url('download/detail')?>">add</a>
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
                            <a class="J_menuItem" href="<?php echo site_url('article_date/article_date_list')?>">List</a>
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
                <li data-active = "setting" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">Family Site</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "article_date_list">
                            <a class="J_menuItem" href="<?php echo site_url('setting/familySite')?>">List</a>
                        </li>
                        <li data-active = "article_date_list">
                            <a class="J_menuItem" href="<?php echo site_url('setting/familyDetail')?>">Add</a>
                        </li>
                    </ul>
                </li>
                
                    
                
                <!-- <li data-active = "materials" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">인쇄홍보물제작</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "materialsEnLists">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsEnLists/54')?>">영어 List</a>
                        </li>
                        <li data-active = "materialsEnDetail">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsEnDetail')?>">영어  add</a>
                        </li>
                        <li data-active = "materialsCnLists">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsCnLists/101')?>">중국어 List</a>
                        </li>
                        <li data-active = "materialsCnDetail">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsCnDetail')?>">중국어 add</a>
                        </li>
                        <li data-active = "materialsOLists">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsOLists/102')?>">기타언어 List</a>
                        </li>
                        <li data-active = "materialsODetail">
                            <a class="J_menuItem" href="<?php echo site_url('materials/materialsODetail')?>">기타언어 add</a>
                        </li>
                        
                    </ul>
                </li> -->

                <li data-active = "portfolio" >
                    <a href="#">
                        <i class="fa "></i>
                        <span class="nav-label">포트폴리오</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li data-active = "portfolioLists">
                            <a class="J_menuItem" href="<?php echo site_url('portfolio/portfolioLists/106')?>">List</a>
                        </li>
                        <li data-active = "portfolioDetail">
                            <a class="J_menuItem" href="<?php echo site_url('portfolio/portfolioDetail')?>">add</a>
                        </li>
                    </ul>
                </li>

                <?php if($this->session->admin_grade == -1){ ?>
                    <li>
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            <span class="nav-label"><?php echo _('Pop Up');?></span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('pop'); ?>"><?php echo _('Pop Up List');?></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('pop/add'); ?>"><?php echo _('Add Pop Up');?></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_pop'); ?>"><?php echo _('Pop Up Category');?></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_pop/add'); ?>"><?php echo _('Add Pop Up Category');?></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa fa-bar-chart-o"></i>
                            <span class="nav-label"><?php echo _('Category');?></span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category'); ?>">分类列表<!-- 카태고리 목록 --></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category/treeList'); ?>">分类树形图<!-- 카태고리 트리 --></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category/add'); ?>">添加新分类<!-- 새 카태고리 추가 --></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_template'); ?>">分类模板<!-- 카태고리 템플릿 --></a>
                            </li>
                            <!-- <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_type/add'); ?>">새 템플릿 추가</a>
                            </li> -->
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo site_url('setting'); ?>">
                            <i class="fa fa-cutlery"></i>
                            <span class="nav-label"><?php echo _('Setting'); ?></span>
                            <span class="fa arrow"></span>
                        </a>

                        <ul class="nav nav-second-level">

                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('category_type/add'); ?>">Sys</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('Message/email'); ?>">Email</a>
                            </li>

                        </ul>

                    </li>

                    <!--
                    <li>
                        <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">SYSTEM</span></a>
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">ARTICLE</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li><a class="J_menuItem" href="<?php echo site_url('article'); ?>">Article List</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo site_url('article/add'); ?>">Create New Article</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo site_url('article'); ?>">Article Reply List</a>
                            </li>
                            <li><a class="J_menuItem" href="<?php echo site_url('reply/add'); ?>">Create New Reply</a>
                            </li>

                        </ul>
                    </li>
					 -->
                <?php } else { foreach($navi as $v): ?>
                    <li>
                        <a href="<?php echo site_url('category/index').'/'.$v['category_index']; ?>"><i class="fa fa-edit"></i> <span class="nav-label"><?php echo $v['category_name']; ?></span></a>
                    </li>
                <?php endforeach; } ?>

                <li>
                    <a href="<?php echo site_url('user'); ?>"><i class="fa fa-cutlery"></i> <span class="nav-label">用户列表<!-- 회원관리 --></span></a>
                </li>

                <?php if($this->session->admin_grade < 1): ?>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">管理员<!-- 관리자 정보 --></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('admin'); ?>">管理员列表<!-- 관리자 목록 --></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('admin/add'); ?>">添加管理员<!-- 새 관리자 추가 --></a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('Jurisdiction/Lists'); ?>">权限列表</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('Jurisdiction/tpList'); ?>">权限模板</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="<?php echo site_url('Jurisdiction/tpCreate'); ?>">增加模板项目</a>
                            </li>

                        </ul>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="/" target="_blank"><i class="fa fa-cutlery"></i> <span class="nav-label">进入网站首页<!-- 홈페이지 --></span></a>
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