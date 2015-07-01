<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Blink
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
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blink' ); ?></a>
	<div id="header-wrap">
		<header id="masthead" class="site-header" role="banner">
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
		</header><!-- #masthead -->
	</div>

	<div id="content" class="site-content">
