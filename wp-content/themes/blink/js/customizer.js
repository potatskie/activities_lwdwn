/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
/* global wp */
( function( $ ) {
	var api = wp.customize;

	// Site title and description.
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	api( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	api( 'layout-site', function( value ) {
		value.bind( function( to ) {
			var $classes = 'layout-odd layout-even layout-hero layout-half';
			$( 'body' ).removeClass($classes).addClass( 'layout-' + to );
		} );
	} );

} )( jQuery );
