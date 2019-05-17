<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen 
 * @since Twenty Fifteen 1.0
 */   
dynamic_sidebar('config_geral');   
 
$fontes_config = $_SESSION['fontes_config'];

?><!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title( '-', true, 'right' ); ?></title> 
    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]--> 
    <?php  
      wp_head(); 
    ?>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/bootstrap/css/bootstrap.min.css" type="text/css" media="all" rel="stylesheet" />


      <!-- Libraries CSS Files -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php bloginfo( 'template_directory' ); ?>/lib/venobox/venobox.css" rel="stylesheet">

      <!-- Nivo Slider Theme -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/css/nivo-slider-theme.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/css/style.css" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="<?php bloginfo( 'template_directory' ); ?>/css/responsive.css" rel="stylesheet">

    <link href="<?php echo bloginfo('stylesheet_url'); ?>" type="text/css" media="all" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php bloginfo('template_directory')?>/img/favicon.png" />


      
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head> 

<body data-spy="scroll" data-target="#navbar-example">



  <?php

    $itens_menu_1 = (array) wp_get_nav_menu_items('menu_1');

    foreach ($itens_menu_1 as $key => $value) {
      $value = (array) $value;
      $html_li_menu_1 .= "<li><a href=\"".$value['url']."\"><span>".$value['title']."</span></a></li>";
    }

  ?>


  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>e</span>Business</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
                </a>
              </div>
 
              <!-- Collect the nav links, forms, and other content for toggling -->

            <?php
                    wp_nav_menu( array(
                        'menu'              => 'menu_1',
                        'theme_location'    => 'menu_1',
                        'depth'             => 3,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse main-menu bs-example-navbar-collapse-1',
                'container_id'      => 'navbar',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>   
              <!-- /.navbar-collapse -->

              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->
