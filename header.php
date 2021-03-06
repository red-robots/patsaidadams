<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); 

$banner = get_field('header_banner_image', 'option');

?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row-1" style="background-image: url(<?php echo $banner['url'];?>)">
			<div class="wrapper cap">

			<div class="deep-link">
				<a href="https://deepeningyourfaith.com/" target="_blank">Deepening Your Faith</a>
			</div>

				<div class="social">
					<?php $facebook = get_field("facebook","option");
					$youtube = get_field("youtube","option");
					$email = get_field("email","option");
					if($facebook):?>
						<a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
					<?php endif;
					if($youtube):?>
						<a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a>
					<?php endif;
					if($email):?>
						<a href="mailto:<?php echo $email;?>" target="_blank"><i class="fa fa-envelope"></i></a>
					<?php endif;?>
				</div><!--.social-->
			</div><!-- wrapper -->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap">
				<?php if(is_home()) { ?>
					<h1 class="logo">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</h1>
				<?php } else { ?>
					<div class="logo">
					<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri()."/images/logo.png";?>" alt="<?php bloginfo('name'); ?>"></a>
					</div>
				<?php } ?>
			</div><!-- wrapper -->
		</div><!--.row-2-->
		<div class="row-3">
			<nav id="site-navigation" class="main-navigation clear-bottom" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!--.row-3-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
