<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _nivijah
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

	<a href="https://github.com/NiviJah/Material-Bootstrap-Theme-For-Wordpress"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>
	
<header id="masthead" class="site-header" role="banner">
	<div class="container">
		<div class="row">
			<div class="site-header-inner col-12">
					
				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				<?php } // end if ( ! empty( $header_image ) ) ?>
				
				
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
				</div>
						
			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->
		
<nav class="site-navigation">		
	<div class="container">
		<div class="row">
			<div class="site-navigation-inner col-12">
				<div class="navbar">
				    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
				    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				    </button>
				
				    <!-- Your site title as branding in the menu -->
				    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				    
				    <!-- The WordPress Menu goes here -->
				       <?php wp_nav_menu(
			                array(
			                    'theme_location' => 'primary',
			                    'container_class' => 'nav-collapse collapse navbar-responsive-collapse',
			                    'menu_class' => 'nav navbar-nav',
			                    'fallback_cb' => '',
			                    'menu_id' => 'main-menu',
			                    'walker' => new wp_bootstrap_navwalker()
			                )
			            ); ?>
				
				</div><!-- .navbar -->
			</div>
		</div>
	</div><!-- .container -->
</nav><!-- .site-navigation -->

<div class="main-content">	
	<div class="container">
		<div class="row">

			<?php
			if ( is_active_sidebar('sidebar-1') ): ?>
				<div class="main-content-inner col-12 col-lg-9">
			<?php else : ?>
				<div class="main-content-inner col-12 col-lg-12">
			<?php endif; ?>
			

