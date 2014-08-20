<?php
function optionsframework_option_name() {
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = 'options_wpex_themes';
	update_option('optionsframework', $optionsframework_settings);
}

function optionsframework_options() {

	//options
	$pagination_style = array(
		'standard'			=> __('Standard', 'wpex'),
		'load_more'			=> __('Load More', 'wpex'),
		'infinite_scroll'	=> __('Infinite Scroll', 'wpex'),
		
	);
	$related_random_posts = array(
		'random'	=> __('Random Posts', 'wpex'),
		'related'	=> __('Related Posts', 'wpex')
	);
	$lightbox_themes = array(
		'pp_default'	=> 'Default',
		'light_rounded'	=> 'Light Rounded',
		'dark_rounded'	=> 'Dark Rounded',
		'light_square'	=> 'Light Square',
		'dark_square' 	=> 'Dark Square',
		'facebook' 		=> 'Facebook'
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/options/';

	$options = array();
	
	
	//GENERAL
	
	$options[] = array(
		'name'	=> __('General', 'wpex'),
		'type'	=> 'heading');
		
	$options['custom_logo'] = array(
		'name'	=> __('Custom Logo', 'wpex'),
		'desc'	=> __('Upload your custom logo.', 'wpex'),
		'id'	=> 'custom_logo',
		'std'	=> get_template_directory_uri() .'/images/logo.png',
		'type'	=> 'upload');
		
	$options['custom_favicon'] = array(
		'name'	=> __('Custom Favicon', 'wpex'),
		'desc'	=> __('Upload your custom site favicon.', 'wpex'),
		'id'	=> 'custom_favicon',
		'std'	=> get_template_directory_uri() .'/images/favicons/favicon.png',
		'type'	=> 'upload');
		
	$options['responsive'] = array(
		'name'	=> __('Responsive?', 'wpex'),
		'desc'	=> __('Check box to enable the responsive layout.', 'wpex'),
		'id'	=> 'responsive',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['retina'] = array(
		'name'	=> __('Retina Support?', 'wpex'),
		'desc'	=> __('Check box to enable retina support for featured images.', 'wpex'),
		'id'	=> 'retina',
		'std'	=> '',
		'type'	=> 'checkbox');
		
	$options['bg_img'] = array(
		'name'	=> __('Disable Default Background Image?', 'wpex'),
		'desc'	=> __('Check box to disable the default background image.', 'wpex'),
		'id'	=> 'bg_img',
		'std'	=> '',
		'type'	=> 'checkbox');
		
	$options['static_header'] = array(
		'name'	=> __('Disable Fixed Header', 'wpex'),
		'desc'	=> __('Check box to disable the fixed header. Prevents it from staying at the top when you scroll down the page.', 'wpex'),
		'id'	=> 'static_header',
		'std'	=> '',
		'type'	=> 'checkbox');
		
	$options['sidebar_homepage_archive'] = array(
		'name'	=> __('Show Sidebar On The Homepage & Archive Pages?', 'wpex'),
		'desc'	=> __('Check box to enable the sidebar on the homepage and archive (category, tags, format and author pages).', 'wpex'),
		'id'	=> 'sidebar_homepage_archive',
		'std'	=> '',
		'type'	=> 'checkbox');
		
	$options['sidebar_responsive'] = array(
		'name'	=> __('Show Sidebar On Mobile Screens?', 'wpex'),
		'desc'	=> __('Check box to enable the sidebar on Mobile Screens (this option won\'t affect Table displays).', 'wpex'),
		'id'	=> 'sidebar_responsive',
		'std'	=> '',
		'type'	=> 'checkbox');
		
	$options['widgetized_footer'] = array(
		'name'	=> __('Widgetized Footer?', 'wpex'),
		'desc'	=> __('Check box to enable the widgetized footer area.', 'wpex'),
		'id'	=> 'widgetized_footer',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
		
	// ENTRIES
	$options[] = array(
		'name'	=> __('Entries', 'wpex'),
		'type'	=> 'heading');
		
	$options['pagination_style'] = array(
		'name'	=> __('Pagination Style', 'wpex'),
		'id'	=> 'pagination_style',
		'std'	=> 'infinite_scroll',
		'type'	=> 'select',
		'options'	=> $pagination_style );
		
	$options['excerpt_length'] = array(
		'name'	=> __('Excerpt Length?', 'wpex'),
		'desc'	=> __('Enter your custom excerpt length.', 'wpex'),
		'id'	=> 'excerpt_length',
		'std'	=> '15',
		'class'	=> 'mini',
		'type'	=> 'text');

	$options['entry_img_width'] = array(
		'name'	=> __('Entry Image Width', 'wpex'),
		'desc'	=> __('Enter your custom entry image width crop. No need to "regenerate thumbnails" just refresh your page.', 'wpex'),
		'id'	=> 'entry_img_width',
		'std'	=> '440',
		'class'	=> 'mini',
		'type'	=> 'text');

	$options['entry_img_height'] = array(
		'name'	=> __('Entry Image Height', 'wpex'),
		'desc'	=> __('Enter your custom entry image height crop. No need to "regenerate thumbnails" just refresh your page.', 'wpex'),
		'id'	=> 'entry_img_height',
		'std'	=> '9999',
		'class'	=> 'mini',
		'type'	=> 'text');
		
	$options['entry_hover_opacity'] = array(
		'name'	=> __('Entry Thumbnail Hover Opacity', 'wpex'),
		'desc'	=> __('Enter your desired opacity for the entry hovers.', 'wpex'),
		'id'	=> 'entry_hover_opacity',
		'std'	=> '0.5',
		'class'	=> 'mini',
		'type'	=> 'text');	
		
	$options[] = array(
		'name'	=> __('Entry Thumbnail Hover Background Color', 'options_framework_theme'),
		'id'	=> 'entry_hover_color',
		'std'	=> '#000000',
		'type'	=> 'color' );
		
	
		
		
	//POSTS
	$options[] = array(
		'name'	=> __('Posts', 'wpex'),
		'type'	=> 'heading');
		
	$options['single_post_thumb'] = array(
		'name'	=> __('Disable auto featured images on posts.', 'wpex'),
		'desc'	=> __('Check box to disable featured images automatically added to posts.', 'wpex'),
		'id'	=> 'single_post_thumb',
		'std'	=> '',
		'type'	=> 'checkbox');
				
	$options['sidebar_layout'] = array(
		'name'	=> "Single Post Layout",
		'id'	=> "sidebar_layout",
		'std'	=> "left",
		'type'	=> "images",
		'options'	=> array(
			'left'	=> $imagepath . '2cl.png',
			'right'	=> $imagepath . '2cr.png',
			'none'	=> $imagepath . '1column.png')
	);
		
	$options['blog_tags'] = array(
		'name'	=> __('Show Tags?', 'wpex'),
		'desc'	=> __('Check box to enable the tag links on single blog posts.', 'wpex'),
		'id'	=> 'blog_tags',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['blog_bio'] = array(
		'name'	=> __('Show Author Bio?', 'wpex'),
		'desc'	=> __('Check box to enable featured images on single blog posts.', 'wpex'),
		'id'	=> 'blog_bio',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['blog_tags'] = array(
		'name'	=> __('Show Social Share', 'wpex'),
		'desc'	=> __('Check box to enable the social sharing section on single posts.', 'wpex'),
		'id'	=> 'blog_social',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['blog_comments'] = array(
		'name'	=> __('Show Comments?', 'wpex'),
		'desc'	=> __('Check box to enable comments on single blog posts.', 'wpex'),
		'id'	=> 'blog_comments',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['related_random_show'] = array(
		'name'	=> __('Show Related/Random Posts Section?', 'wpex'),
		'desc'	=> __('Check box to enable the related posts or random posts on single blog posts.', 'wpex'),
		'id'	=> 'related_random_show',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	$options['related_random'] = array(
		'name'	=> __('Show Random or Related Posts?', 'wpex'),
		'desc'	=> __('Choose your PrettyPhoto theme.', 'wpex'),
		'id'	=> 'related_random',
		'std'	=> 'random',
		'type'	=> 'select',
		'class'	=> 'mini', //mini, tiny, small
		'options'	=> $related_random_posts );
						
	$options['related_random_count'] = array(
		'name'	=> __('How many posts do you want to show on the Related/Random Posts Section?', 'wpex'),
		'desc'	=> __('Enter an integer for how many posts you want to show. It is not possible to have infinite scroll here, sorry.', 'wpex'),
		'id'	=> 'related_random_count',
		'std'	=> '10',
		'class'	=> 'mini',
		'type'	=> 'text');
	
		
	//SOCIAL

	$options[] = array(
		'name'	=> __('Social', 'wpex'),
		'type'	=> 'heading');
		
		
	$options['social'] = array(
		'name'	=> __('Social?', 'wpex'),
		'desc'	=> __('Check box to enable the social in the theme header.', 'wpex'),
		'id'	=> 'social',
		'std'	=> '1',
		'type'	=> 'checkbox');
		
	if( function_exists( 'wpex_social_links' ) ) {
	$social_links = wpex_social_links();
		foreach($social_links as $social_link) {
			$options[$social_link] = array( "name"	=> ucfirst($social_link),
								'desc'	=> __('Enter your full profile url.','wpex'),
								'id'	=> $social_link,
								'std'	=> '',
								'type'	=> 'text');
		}
	}
	
	
	//CSS
	$options[] = array(
		'name'	=> __('CSS', 'wpex'),
		'type'	=> 'heading');
		
	$options['custom_css'] = array(
		'name'	=> __('Custom CSS', 'wpex','wpex'),
		'desc'	=> __('Use this area to add custom css to your theme\'s header for making small customizations', 'wpex','wpex'),
		'id'	=> 'custom_css',
		'std'	=> '',
		'type'	=> 'textarea');

	return $options;
}