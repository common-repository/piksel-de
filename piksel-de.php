<?php
/*
Plugin Name: Piksel DE
Plugin URI: http://wordpress.org/plugins/piksel-de/
Description: Plugin to sync all your On Demand and Live content from Piksel Digital Enterprise platform.
Author: Piksel, INC
Version: 1.0
Author URI: http://piksel.com
*/

//EXIT IF FILE IS CALLED DIRECTLY
if (!defined('ABSPATH')) {
	exit;
}

//IF ADMIN AREA

if (is_admin()) {
	require_once plugin_dir_path(__FILE__).'admin/admin-menu.php';
	require_once plugin_dir_path(__FILE__).'admin/settings-page.php';
	require_once plugin_dir_path(__FILE__).'admin/settings-register.php';
	require_once plugin_dir_path(__FILE__).'admin/settings-callbacks.php';
	require_once plugin_dir_path(__FILE__).'admin/settings-validate.php';
}

require_once plugin_dir_path(__FILE__).'includes/core-functions.php';


function pikselde_options_default(){
	return array(
		'piksel_vod_project_uuid' => 'xxxxxx',
		'piksel_liveseries_token' => 'xxxxx',

	);
}

function pikselplayer_shortcode( $atts, $content = null)	{
 
	extract( shortcode_atts( array('series_uuid' => NULL,'program_uuid' => NULL,'project_uuid' => NULL), $atts));
	$player ='<style>.piksel-video-container {
    position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
	}
	.piksel-video-container iframe {
    position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	}</style>';
	$options = get_option('pikselde_options',pikselde_options_default());
	if (isset($options['piksel_api_token']) && ! empty($options['piksel_api_token'])) {
 		$piksel_api_token = sanitize_text_field($options['piksel_api_token']); 
 	}else{
 		echo "<span style='color:red;'>Please set API Token key before using the shortcodes.</span>";
 	}
	if($series_uuid !== NULL)
	{
	$player .='<div class="piksel-video-container">
    <iframe height="350" width="100%" allowfullscreen="" frameborder="0" src="https://player.piksel.com/s/'.$series_uuid.'?player_uuid=rzz16131&de-fluid=true&targetId=pikselvideo&de-responsive=true&de-api-key='.$piksel_api_token.'"></iframe>
	</div>';
	}
	elseif($project_uuid !== NULL){
	$player .='<div class="piksel-video-container">
    <iframe height="350" width="100%" allowfullscreen="" frameborder="0" src="https://player.piksel.com/p/'.$project_uuid.'?de-playerType=single&de-pl-backForward=false&player_uuid=rzz16131&de-fluid=true&targetId=pikselvideo&de-responsive=true&de-api-key='.$piksel_api_token.'"></iframe>
	</div>';
	}
	elseif($program_uuid !== NULL){
	$player .='<div class="piksel-video-container">
    <iframe height="350" width="100%" allowfullscreen="" frameborder="0" src="https://player.piksel.com/v/'.$program_uuid.'?player_uuid=rzz16131&de-fluid=true&targetId=pikselvideo&de-responsive=true&de-api-key='.$piksel_api_token.'"></iframe>
	</div>';
	}
	
	return $player;
 
}
add_shortcode('pikselplayer', 'pikselplayer_shortcode');
?>

