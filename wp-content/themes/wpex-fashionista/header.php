<?php
/**
 * The Header for our theme.
 *
 * @package WordPress
 * @subpackage Fashionista
 * @since Fashionista 1.0
 */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wpex_hook_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php
	//add viewport meta if responsive enabled
	if(of_get_option('responsive')) { ?>
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<?php } ?>
	<!-- Title Tag -->
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<?php
	//set favicon if defined in admin
	if(of_get_option('custom_favicon')) { ?>
	<link rel="icon" type="image/png" href="<?php echo of_get_option('custom_favicon'); ?>" />
	<?php } ?>
	<!-- Browser dependent stylesheets -->
	<!--[if IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" media="screen" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" media="screen" />
	<![endif]-->
	<?php
	//WordPress head hook <== DO NOT DELETE ME
	wp_head(); ?>
	<?php wpex_hook_head_bottom(); ?>
</head><!-- /end head -->

<!-- Begin Body -->

<?php $no_sidebar = ( of_get_option('sidebar_layout') == 'none' && is_singular() ) ? 'no-sidebar' : ''; ?>
<body <?php body_class('body '. $no_sidebar .''); ?>>

<?php wpex_hook_header_before(); ?>
<div id="header-wrap" <?php if( of_get_option('static_header') !== '1' && ! wp_is_mobile() ) { echo 'class="fixed-header"'; } ?> >
	<header id="header" class="clearfix">
	<?php wpex_hook_header_top(); ?>
	<!--<div class="show-in-small">
		<a href="" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icon-L.png" alt="Lowdown Logo" />
		</a>
	</div>-->
	<div class="b-top-bar">
		<div class="b-search">

			<div role="inputbox" class="inpt-what-to-do">
				<input type="text" placeholder="What do you want to do today?">
			</div>
			<div role="dropdown-list" class="drpdwn-venues" data-name="venues" style="height: 36px">
				<ul class="select">
					<li data-value="all" class="current">All Venues</li>
					<li data-value="all">All Venues</li>
					<li data-value="pub">Pubs</li>
					<li data-value="bar">Bars</li>
					<li data-value="cafe">Cafes</li>
					<li data-value="bar">Hotels</li>
					<li data-value="parking">Parking</li>
					<li data-value="attraction">Attractions</li>
					<li data-value="shop">Shops</li>
					<li data-value="restaurant">Restaurant</li>
				</ul>
			</div>
			<div role="dropdown-list" class="drpdwn-areas" data-name="areas" style="height: 36px">
				<ul class="select">
					<li data-value="all" class="current">All Areas</li>
					<li data-value="all">All Areas</li>
					<li data-value="central">Central</li>
					<li data-value="convention">Convention</li>
					<li data-value="digbeth">Digbeth</li>
					<li data-value="eastside">Eastside</li>
					<li data-value="gunsmith">Gunsmiths</li>
					<li data-value="jewellery">Jewellery</li>
					<li data-value="southside">Southside</li>
				</ul>
			</div>
			<a href="#" class="btn-search">Search</a>					
		</div>
	</div>	
	<div class="logo-container">
		<a href="" class="logo">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Lowdown Logo" />
		</a>
	</div>
	<?php wpex_hook_header_bottom(); ?>
	</header><!-- /header -->
</div><!-- /header-wrap -->
<?php wpex_hook_header_after(); ?>
	
<div id="wrap">

<?php wpex_hook_content_before(); ?>
<div id="main-content" class="outerbox <?php //echo is_single() ? 'fullwidth post-container ' : 'outerbox '; ?>clearfix <?php if( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'infinite_scroll' ) { echo 'infinite-scroll-enabled'; } ?>">
<?php wpex_hook_content_top(); ?>

	<?php
	//run code only on pages
	if(is_page() && !is_attachment()) {
		
		//show large featured images on pages
		if( has_post_thumbnail() ) { echo '<div id="page-featured-img" class="container"><img src="'. wp_get_attachment_url( get_post_thumbnail_id() ) .'" alt="'. get_the_title() .'" /></div>'; }
	} ?>
