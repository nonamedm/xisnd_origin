<head>
    <?php
    $title = " | 자이 S&D";
    if( !empty( $sub_page->category_name ) )
    {
        $title = $sub_page->category_name.$title;
    }
    elseif( !empty( $page->category_name )  )
    {
        $title = $page->category_name.$title;
    }
    else
    {
        $title = '자이 S&D';
    }
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="자이에스앤디, 자이엘라, 자이르네, 주택개발, 부동산운영관리, 시스클라인, Xi옵션등 사업소개 ">
    <link rel="canonical" href="http://www.xisnd.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="자이에스앤디, 자이엘라, 자이르네, 주택개발, 부동산운영관리, 시스클라인, Xi옵션등 사업소개">
    <meta property="og:image" content="http://www.xisnd.com/resource/frontend/images/logo1.png">
    <meta property="og:url" content="http://www.xisnd.com">
    <meta name="robots" content="index,follow">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>resource/frontend/css/bootstrap.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/notosanskr.css" rel="stylesheet">
    <!--    <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">-->
    <link href="<?php echo base_url()?>resource/frontend/css/style.css?updated=20190909" rel="stylesheet">
    <link href="<?php echo base_url()?>resource/frontend/css/animations.css" rel="stylesheet">
    <link href="<?php echo base_url()?>resource/frontend/css/owl_carousel_min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>resource/frontend/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>resource/frontend/css/fancy-box.css">
    <link rel="stylesheet" href="<?php echo base_url()?>resource/frontend/css/font-awesome.min.css">


    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    // var a=document.body.innerHTML;
	//     document.body.innerHTML=a.replace('/\ufeff/g','');
	</script>
</head>
