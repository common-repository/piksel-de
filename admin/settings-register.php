<?php 
//EXIT IF FILE IS CALLED DIRECTLY
if (!defined('ABSPATH')) {
	exit;
}
function pikselde_register_settings(){
	register_setting(
	'pikselde_options',
	'pikselde_options',
	'pikselde_callback_validate_options'
	);

	add_settings_section(
		'pikselde_section_admin',
		'Account Details',
		'pikselde_callback_section_admin',
		'pikselde'
	);

	add_settings_field(
		'piksel_api_token',
		'API Token',
		'pikselde_callback_field_text',
		'pikselde',
		'pikselde_section_admin',
		['id' => 'piksel_api_token','label' => 'API Token which can be fetched from piksel OVP system']
	);

	/*add_settings_field(
		'piksel_vod_project_uuid',
		'Piksel VOD project UUID',
		'pikselde_callback_field_text',
		'pikselde',
		'pikselde_section_admin',
		['id' => 'piksel_vod_project_uuid','label' => 'Piksel VOD project UUID piksel OVP system']
	);

	add_settings_field(
		'piksel_liveseries_token',
		'Piksel Live Series Token',
		'pikselde_callback_field_text',
		'pikselde',
		'pikselde_section_admin',
		['id' => 'piksel_liveseries_token','label' => 'Piksel Liveseries token fetched from piksel OVP system']
	);*/
}

add_action('admin_init','pikselde_register_settings');