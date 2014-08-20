<?php
/**
 * @package WordPress
 * @subpackage Fashionista WordPress Theme
 * Creates a function for page wpex_paginate_pages
 */
if( ! function_exists('wpex_paginate_pages')) {
	function wpex_paginate_pages($pages = '', $range = 4) {
	 $showitems = ($range * 2)+1; 
		 global $paged;
		 if(empty($paged)) $paged = 1;
		 
		 if($pages == '') {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages) {
				 $pages = 1;
			 }
		 }  
	 
		 if(1 != $pages) {
			 echo "<div class=\"page-wpex_paginate_pages\"><div class=\"page-wpex_paginate_pages-inner clearfix\">";
				 echo "<div class=\"page-of-page\"><span class=\"inner\">".$paged." of ".$pages."</span></div>"; 
				 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
				 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
				 for ($i=1; $i <= $pages; $i++) {
					 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
					 {
						 echo ($paged == $i)? "<span class=\"current outer\"><span class=\"inner\">".$i."</span></span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\"><span class=\"inner\">".$i."</span></a>";
					 }
				 }
				if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
			echo "</div></div>\n";
		 }
	}
 }
 
 


/**
* Infinite Scroll
* @since 1.0
*/
if ( !function_exists( 'wpex_infinite_scroll' ) ) {
	
	function wpex_infinite_scroll( $pages = '', $range = 4 ) {
		wp_enqueue_script( 'att-infinitescroll-init', WPEX_JS_DIR .'/infinitescroll-init.js', array( 'jquery', 'wpex-global' ), 1.0, true );
		$output = '';
		$showitems = ($range * 2)+1; 
		global $paged;
		if(empty($paged)) $paged = 1;
		
		if( $pages == '' ) {
		   global $wp_query;
		   $pages = $wp_query->max_num_pages;
		   if(!$pages) {
			   $pages = 1;
		   }
		}		
		if( 1 != $pages ) {
		  $output .= '<div class="infinite-scroll-nav clr">';
			  $output .= '<div class="alignleft newer-posts">';
				  $output .= get_previous_posts_link('&larr; '. __( 'Newer Posts', 'wpex' ) );
			  $output .= '</div>';
			  $output .= '<div class="alignright older-posts">';
				  $output .= get_next_posts_link( __( 'Older Posts', 'wpex' ) .' &rarr;');
			  $output .= '</div>';
		  $output .= '</div>';
		}
		
		echo $output;
	}
	
}
?>