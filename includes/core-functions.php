<?php 
if (!defined('ABSPATH')) {
	exit;
}

function pikselde_custom_admin_footer($html){

	$options = get_option('pikselde_options',pikselde_options_default());
	if (isset($options['piksel_api_token']) && ! empty($options['piksel_api_token'])) {
 		$piksel_api_token = sanitize_text_field($options['piksel_api_token']); 
 	}

	if (isset($options['piksel_vod_project_uuid']) && ! empty($options['piksel_vod_project_uuid'])) {
 		$piksel_vod_project_uuid = sanitize_text_field($options['piksel_vod_project_uuid']); 
 	}

 	$json = "http://player.piksel.com/ws/get_project/api/".$piksel_api_token."/p/".$piksel_vod_project_uuid."/apiv/4.0/mode/json";
	echo $json;
	//$json = "http://player.piksel.com/ws/get_project/api/628225ab-269b-11e3-b5cd-005056865f49/p/j99hj645/apiv/4.0/mode/json";
	$string = file_get_contents($json);
	$arr = json_decode($string, true);
    if (count($arr['response']['getProjectResponse']['vodProject']['categories'])>0)// CATEGORIZED PROJECT
    {
  		$html = "";

    	for($i=0; $i < count($arr['response']['getProjectResponse']['vodProject']['categories']);$i++)
    	{	
    		$json1="http://player.piksel.com/ws/get_programs/api/".$piksel_api_token."/p/".$piksel_vod_project_uuid."/catid/".$arr['response']['getProjectResponse']['vodProject']['categories'][$i]['categoryid']."/start/0/end/30/apiv/4.0/mode/json";
    		$string1 = file_get_contents($json1);
    		$arr1 = json_decode($string1, true);

    		$html .='<h2>'.$arr['response']['getProjectResponse']['vodProject']['categories'][$i]['name'].'</h2>';

    		$html .='<div class="row regular slider responsive">';
    		for($n=0; $n < $arr1['response']['getPrograms']['totalCount']; $n++) 
    		{   
    			$html .= '<div class="uuid" data-uuid='.$arr1['response']['getPrograms']['programs'][$n]['uuid'].'>';
    			$html .= '<img src="'.$arr1['response']['getPrograms']['programs'][$n]['thumbnailUrl'].'?w=480&amp;h=320" width="480" height="320" class="thumbnail" />';
    			$html .= '<h4>'.$arr1['response']['getPrograms']['programs'][$n]['Title'].' ['.getTime($arr1['response']['getPrograms']['programs'][$n]['duration']).']</h4>';
    			$html .= '<div class="card-img-overlay">';
    			$html .= '<p class="card-text">'.$arr1['response']['getPrograms']['programs'][$n]['Description'].'</p>
    			<p class="card-text"><small class="text-muted">'.getTime($arr1['response']['getPrograms']['programs'][$n]['duration']).'</small></p>';
    			$html .= '</div></div>';
    		}
    		$html .= '</div>';
    	}
    }
    else
    {
    	$json1="http://player.piksel.com/ws/get_programs/api/".$piksel_api_token."/p/".$piksel_vod_project_uuid."/apiv/4.0/mode/json";
			//echo $json1;
    	$string1 = file_get_contents($json1);
    	$arr1 = json_decode($string1, true);
    	$html .="<h2>Playlist Videos </h2>";
    	$html .='<div class="row regular slider responsive">';
    	for($n=0; $n < $arr1['response']['getPrograms']['totalCount']; $n++) 
    	{   
    		$html .= '<div>';
    		$html .= '<img src="'.$arr1['response']['getPrograms']['programs'][$n]['thumbnailUrl'].'?w=480&amp;h=320" width="480" height="320" class="thumbnail" />';
    		$html .= '<h4>'.$arr1['response']['getPrograms']['programs'][$n]['Title'].' ['.getTime($arr1['response']['getPrograms']['programs'][$n]['duration']).']</h4>';
    		$html .= '<div class="card-img-overlay">';
    		$html .= '<p class="card-text">'.$arr1['response']['getPrograms']['programs'][$n]['Description'].'</p>
    		<p class="card-text"><small class="text-muted">'.getTime($arr1['response']['getPrograms']['programs'][$n]['duration']).'</small></p>';
    		$html .= '</div></div>';
    	}
    	$html .= '</div>';
    }
    $html .= '';
    //echo $html;
return $html;
}

add_filter('admin_footer_text','pikselde_custom_admin_footer');
