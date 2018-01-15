<?php
/*
 * BrandSpa (http://brandspa.com)
 * Alejandro Sanabria <alejandro@brandspa.com>
 * Copyright 2017 BrandSpa
 */

//MENUS
require_once 'lib/menus.php';

//POSTS TYPES
require_once 'lib/post_type.php';

//CLEAN THEME
require_once 'lib/clean_theme.php';

//LIBS
require_once 'lib/clean_menu.php';
require_once 'lib/space_to_lodash.php';
require_once 'lib/translation.php';
require_once 'lib/is_mobile.php';
require_once 'lib/infusionsoft.php';
require_once 'lib/get_lang.php';
require_once 'lib/show_posts.php';
require_once 'lib/show_donate.php';
require_once 'lib/get_home_url.php';
require_once 'lib/replace_office_texts.php';
require_once 'lib/logo_url.php';
require_once 'lib/in_office.php';
require_once 'lib/geolify.php';
require_once 'lib/redirect_to_lang.php';
require_once 'lib/redirect_ajax.php';
require_once 'lib/clean_quote.php';
require_once 'lib/get_lang_tag.php';
require_once 'lib/get_continents.php';
require_once 'lib/country_code.php';

//TRANSLATIONS
require_once 'translations/index.php';

//APIS
require_once 'apis/index.php';
include_once 'apis/stripe.php';
include_once 'apis/convertloop.php';
include_once 'apis/mailchimp.php';
include_once 'apis/infusion.php';
include_once 'apis/posts.php';
include_once 'apis/events.php';
include_once 'apis/contact_us.php';
// APIS AJAX
include_once 'apis/ajax/convertloop.php';
include_once 'apis/ajax/mailchimp.php';
include_once 'apis/ajax/donate.php';
include_once 'apis/ajax/stripe.php';
include_once 'apis/ajax/contact_us.php';

//OPTIONS
require_once 'options/index.php';

//SHORTCODES
require_once 'shortcodes/index.php';

//FULLPAGE
require_once('shortcodes/fullpage/fullpage.php');
require_once('shortcodes/fullpage/fullpage_slide.php');
require_once('shortcodes/fullpage/fullpage_slide_layers.php');
require_once('shortcodes/fullpage/fullpage_slide_post.php');
require_once('shortcodes/fullpage/fullpage_slide_video.php');
require_once('shortcodes/fullpage/fullpage_slide_video_layers.php');
require_once('shortcodes/fullpage/fullpage_slide_points.php');
require_once('shortcodes/fullpage/fullpage_slide_end.php');
require_once('shortcodes/fullpage/fullpage_modal.php');

require_once('shortcodes/fullpage/vc/fullpage.php');
require_once('shortcodes/fullpage/vc/fullpage_slide.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_layers.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_post.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_video.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_video_layers.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_points.php');
require_once('shortcodes/fullpage/vc/fullpage_slide_end.php');
require_once('shortcodes/fullpage/vc/fullpage_modal.php');

//METABOXES
require_once 'metaboxes/index.php';

$post_types = array( 'video', 'gallery','featured' );

foreach( $post_types as $post_type) {
  add_meta_box('page_image_square', 'Square Image', 'bs_page_image_square_cb', $post_type, 'normal', 'high', null);
}

add_theme_support( 'post-thumbnails', ['post', 'gallery', 'video'] );

add_filter( 'upload_mimes', 'add_svg_mime' );

function add_svg_mime( $existing_mimes = array() ) {
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}

add_post_type_support( 'page', 'excerpt' );

function add_theme_scripts() {
   
	wp_enqueue_style( 'migrate', 'https://code.jquery.com/jquery-migrate-1.0.0.js', array('jquery' ), '1.1', true);
   
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar Area',
		'id'            => 'post_widget_area',
		'before_widget' => '<div class="widget-area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

add_filter('bcn_breadcrumb_url', 'my_add_post_type_arg_filt', 10, 3);
function my_add_post_type_arg_filt($add_query_arg, $type, $taxonomy)
{
    remove_query_arg('post_type', $url);
}
