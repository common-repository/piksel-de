<?php 
if (!defined('ABSPATH')) {
	exit;
}


function pikselde_callback_validate_options($input){
 
 if (isset($input['piksel_api_token'])) {
 	$input['piksel_api_token'] = sanitize_text_field($input['piksel_api_token']); 
 }

/*
 if (isset($input['piksel_vod_project_uuid'])) {
 	$input['piksel_vod_project_uuid'] = sanitize_text_field($input['piksel_vod_project_uuid']); 
 }

 if (isset($input['piksel_liveseries_token'])) {
 	$input['piksel_liveseries_token'] = sanitize_text_field($input['piksel_liveseries_token']); 
 }
*/
 return $input;
}