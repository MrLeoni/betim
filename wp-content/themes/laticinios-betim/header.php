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

<!-- Vendors Files -->
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/ionicons.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php bloginfo( "stylesheet_directory" ) ?>/assets/css/jquery.bxslider.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
          <div class="col-md-4 col-sm-6 pull-right">
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
  </header>