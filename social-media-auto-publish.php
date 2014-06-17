<?php
/*
 Plugin Name: Social Media Auto Publish
Plugin URI: http://xyzscripts.com/wordpress-plugins/social-media-auto-publish/
Description:   Publish posts automatically from your blog to social media networks like Facebook, Twitter and LinkedIn. The plugin supports filtering posts by post-types and categories.
Version: 1.3.2
Author: xyzscripts.com
Author URI: http://xyzscripts.com/
License: GPLv2 or later
*/

/*
 This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( !function_exists( 'add_action' ) ) {
	echo "Hi there!  I'm just a plugin, not much I can do when called directly.";
	exit;
}
ob_start();
//error_reporting(0);
define('XYZ_SMAP_PLUGIN_FILE',__FILE__);
define('XYZ_SMAP_FB_API_VERSION','v2.0');

define('XYZ_SMAP_FB_api','https://api.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');
define('XYZ_SMAP_FB_api_video','https://api-video.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');
define('XYZ_SMAP_FB_api_read','https://api-read.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');
define('XYZ_SMAP_FB_graph','https://graph.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');
define('XYZ_SMAP_FB_graph_video','https://graph-video.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');
define('XYZ_SMAP_FB_www','https://www.facebook.com/'.XYZ_SMAP_FB_API_VERSION.'/');

global $wpdb;
$wpdb->query('SET SQL_MODE=""');

require_once( dirname( __FILE__ ) . '/admin/install.php' );
require_once( dirname( __FILE__ ) . '/xyz-functions.php' );
require_once( dirname( __FILE__ ) . '/admin/menu.php' );
require_once( dirname( __FILE__ ) . '/admin/destruction.php' );

if(!class_exists('SMAPFacebook'))
require_once( dirname( __FILE__ ) . '/api/facebook.php' );

if(!class_exists('SMAPTwitterOAuth'))
require_once( dirname( __FILE__ ) . '/api/twitteroauth.php' );

if(!class_exists('SMAPLinkedInException'))
require_once( dirname( __FILE__ ) . '/api/linkedin_3.2.0.class.php' );

require_once( dirname( __FILE__ ) . '/admin/ajax-backlink.php' );
require_once( dirname( __FILE__ ) . '/admin/metabox.php' );
require_once( dirname( __FILE__ ) . '/admin/publish.php' );
if(get_option('xyz_credit_link')=="smap"){

	add_action('wp_footer', 'xyz_smap_credit');

}
function xyz_smap_credit() {
	$content = '<div style="clear:both;width:100%;text-align:center; font-size:11px; "><a target="_blank" title="Social Media Auto Publish" href="http://xyzscripts.com/wordpress-plugins/social-media-auto-publish/details" >Social Media Auto Publish</a> Powered By : <a target="_blank" title="PHP Scripts & Programs" href="http://www.xyzscripts.com" >XYZScripts.com</a></div>';
	echo $content;
}
if(!function_exists('get_post_thumbnail_id'))
	add_theme_support( 'post-thumbnails' );
?>