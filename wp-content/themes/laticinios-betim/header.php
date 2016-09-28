<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Laticínios_Betim
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- Icons -->
<link rel="icon" href="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/favicon_16x16.png" size="16x16">
<link rel="icon" href="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/favicon_32x32.png" size="32x32">

<!-- Vendors Files -->
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/ionicons.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/jquery.bxslider.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
  
  <header id="header">
    <div class="pre-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 custom-pull pull-right">
            <div class="search-wrapper">
              <?php get_search_form(); ?>
            </div>
            <div class="buy-wrapper">
              <a href="#" title="Comprar"><i class="ion-ios-cart"></i>Quero Comprar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <nav class="custom-navbar navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
            <span class="sr-only">Alternar exibição do menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo esc_html( home_url("/") ); ?>" title="Laticínios Betim"><img src="<?php bloginfo("stylesheet_directory"); ?>/assets/images/logo/logo-betim-minify.svg" alt="Laticínios Betim"></a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-nav">
          <?php
            $header_menu_args = array(
              "theme_location"	=> "header",
              "container"				=> "ul",
              "menu_class"			=> "nav navbar-nav navbar-right"
            );
            wp_nav_menu($header_menu_args);
          ?>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
  </header>