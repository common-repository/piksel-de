<?php // Admin menu
//EXIT IF FILE IS CALLED DIRECTLY
if (!defined('ABSPATH')) {
	exit;
}

function pikselde_add_toplevel_menu(){
	
	add_menu_page(
		'Piksel DE Settings',
		'Piksel DE',
		'manage_options',
		'pikselde',
		'pikselde_display_settings_page',
		'dashicons-admin-generic',
		null
	);
}
add_action('admin_menu','pikselde_add_toplevel_menu');