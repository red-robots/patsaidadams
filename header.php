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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'acstarter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="row-1" style="background-image: url(<?php echo get_template_directory_uri()."/images/water-2.jpg";?>)">
			<div class="wrapper">
				<div class="social">
					<?php $facebook = get_field("facebook","option");
					$youtube = get_field("youtube","option");
					if($facebook):?>
						<a href="<?php echo $facebook;?>"><i class="fa fa-facebook"></i></a>
					<?php endif;
					if($youtube):?>
						<a href="<?php echo $youtube;?>"><i class="fa fa-youtube"></i></a>
					<?php endif;?>
				</div><!--.social-->
			</div><!-- wrapper -->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper">
				<?php if(is_home()) { ?>
					<h1 class="logo">
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					</h1>
				<?php } else { ?>
					<div class="logo">
					<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
					</div>
				<?php } ?>
			</div><!-- wrapper -->
		</div><!--.row-2-->
		<div class="row-3">
			<div class="wrapper">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'MENU', 'acstarter' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
			</div><!-- wrapper -->
		</div><!--.row-3-->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper">
