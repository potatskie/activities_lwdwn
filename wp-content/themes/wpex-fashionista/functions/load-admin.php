<?php
// Includes the Options Framework
if(!function_exists( 'optionsframework_init')) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
	require_once ( get_template_directory() . '/admin/options-framework.php');
}