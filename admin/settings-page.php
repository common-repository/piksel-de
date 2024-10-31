<?php 
//EXIT IF FILE IS CALLED DIRECTLY
if (!defined('ABSPATH')) {
	exit;
}
//DISPLAY THE PLUGIN SETTINGS PAGE
function pikselde_display_settings_page(){
 	//CHECK IF USER IS ALLOWED ACCESS
	if (!current_user_can('manage_options')) return;
	?>
	<div class="wrap">
		<h1><?php echo esc_html(get_admin_page_title()); ?></h1>
		<?php settings_errors();?>
		<form action="options.php" method="post">
			<?php
			settings_fields('pikselde_options');
			do_settings_sections('pikselde');

			submit_button();
			?>
		</form>
	</div>
	<?php
}