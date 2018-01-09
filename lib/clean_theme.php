<?php

function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script( 'wp-embed' );
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3.1.1', true);
		wp_register_script('lightbox2', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/js/lightbox.min.js', false, '2.9.0', true);
		wp_enqueue_script('jquery');
		wp_enqueue_script('lightbox2');
	}
}

add_action('init', 'modify_jquery');

function deactivate_plugin_conditional() {
	if(is_plugin_active('mpc-massive/mpc-massive.php')) {
		deactivate_plugins('mpc-massive/mpc-massive.php');
	}

	if(is_plugin_active('conditional-menus/init.php')) {
		deactivate_plugins('conditional-menus/init.php');
	}
}

add_action( 'init', 'deactivate_plugin_conditional' );


//remove emojies script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// function bs_tinymce_fix( $init )
// {
//     // html elements being stripped
//     $init['extended_valid_elements'] = 'div[*], article[*]';
//
// 		$init['paste_remove_spans'] = false;
//
//     // don't remove line breaks
//     $init['remove_linebreaks'] = false;
//
//     // convert newline characters to BR
//     $init['convert_newlines_to_brs'] = true;
//
//     // don't remove redundant BR
//     $init['remove_redundant_brs'] = false;
//
//     $init['forced_root_block'] = false;
//
// 		$init['wpautop'] = false;
//
//     return $init;
// }
//
// add_filter('tiny_mce_before_init', 'bs_tinymce_fix');

//remove_filter( 'the_content', 'wpautop' );
