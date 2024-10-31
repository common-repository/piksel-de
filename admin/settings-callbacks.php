<?php 
if (!defined('ABSPATH')) {
	exit;
}


function pikselde_callback_section_admin(){
	echo '<p>In this section you will be providing information about your Piksel DE account. Please refer to <a href="https://ovp.piksel.com/services/docs/" target="_blank">ovp.piksel.com</a> for more details. </p>';
}

function pikselde_callback_field_text($args){

	$options = get_option('pikselde_options',pikselde_options_default());

	$id    = isset( $args['id']) ? $args['id'] : '';
	$label = isset( $args['label']) ? $args['label'] : '';
	$value = isset($options[$id]) ? sanitize_text_field($options[$id]): '';
	echo '<input id="pikselde_options_'.$id.'" name="pikselde_options['.$id.']" type="text" size="40" value="'.$value.'"><br />';
	echo '<label>'.$label.'</label>'; 
}