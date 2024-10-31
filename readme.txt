=== Piksel DE ===
Contributors: cazyjones
Tags: api, video, publishing, piksel, digital enterprise, de
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Connect to your OVP/DE account and easily fetch your audio/video content. 

== Description ==

Connect to your OVP/DE account and easily fetch your audio/video content. Get API token key from your OVP/DE account and add it under the plugin settings section.

You are now ready to use shortcodes to easily embed responsive video players by passing in:
*program_uuid 
*project_uuid
*series_uuid 

Example:
[pikselplayer program_uuid=“xxxxxx”]



== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `piksel-de` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Get API token key from your OVP/DE account and add it under the plugin settings section.
4. Place `[pikselplayer program_uuid=“xxxxxx”]` in your page/post.
5. For template usage: `<?php echo do_shortcode( '[pikselplayer program_uuid=“xxxxxx”]' );?>` 

== FAQ ==

= Where do I get amy API Token from? =

Login to https://ovp.piksel.com/login.php
1.Once logged in click on the gear icon on the right top corner.
2. Then click on API Accounts to see you API Token and all the related options.


== Screenshots ==

1. Plugin the API Token here.
2. Short code examples.

== Changelog ==

= 1.0 =

* This is the first version.

