<?php
/**
 * @package WordPress
 * @subpackage WPEX WordPress Framework
 * Audio Post Format
 */

wpex_hook_entry_before(); ?>
<?php
	global $is_featured; 
	$post_class = ($is_featured) ? 'loop-entry container featured-entry' : 'loop-entry container';
?>
<article <?php post_class($post_class); ?>>
	<?php wpex_hook_entry_top(); ?>
	<?php wpex_entry_thumbnail(); ?>
	<?php if( of_get_option( 'pagination_style', 'infinite_scroll' ) !== 'infinite_scroll' ) { ?>
		<?php
		//get video meta
		$post_audio_mp3 = get_post_meta(get_the_ID(), 'wpex_post_audio_mp3', true);
		$post_audio_ogg = get_post_meta(get_the_ID(), 'wpex_post_audio_ogg', true);
		if($post_audio_mp3 || $post_audio_ogg) { ?>
		
			<script type="text/javascript">
			jQuery(function($){
				jQuery(document).ready(function($){
					if( $().jPlayer ) {
						$("#jquery_jplayer_<?php echo get_the_ID(); ?>").jPlayer({
							ready: function () {
								$(this).jPlayer("setMedia", {
										poster: "<?php echo aq_resize( wp_get_attachment_url(get_post_thumbnail_id(),'full'), 440, 9999, false ); ?>",
										mp3: "<?php echo $post_audio_mp3; ?>",
										oga: "<?php echo $post_audio_ogg; ?>"
								});
								},
							cssSelectorAncestor: "#jp_interface_<?php echo get_the_ID(); ?>",
							swfPath: "<?php echo get_template_directory_uri(); ?>/js",
							supplied: "<?php if($post_audio_ogg) echo 'oga'; ?><?php if($post_audio_mp3 && $post_audio_ogg) echo','; ?><?php if($post_audio_mp3) echo 'mp3'; ?>"
						});
					
					}
				});
			});
			</script>
			<div id="jquery_jplayer_<?php echo get_the_ID(); ?>" class="jp-jplayer"></div>
			<div id="jp_container_<?php echo get_the_ID(); ?>" class="jp-audio">
				<div id="jp_interface_<?php echo get_the_ID(); ?>" class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
				</div><!-- /jp_interface_<?php echo get_the_ID(); ?> -->
			</div><!-- .jp-jplayer -->
		<?php } ?>
	<?php } ?>
		<span class="dbl-arrow">&raquo; </span><?php the_category(); ?>
		<h2 <?php if( of_get_option( 'pagination_style', 'infinite_scroll' ) == 'infinite_scroll' ) { echo 'class="loop-entry-title-margin"'; } ?>><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-text">
			<?php the_excerpt(); ?>
		</div><!-- /entry-text -->
	<?php wpex_hook_entry_bottom(); ?>
</article><!-- /loop-entry -->

<?php wpex_hook_entry_after(); ?>
