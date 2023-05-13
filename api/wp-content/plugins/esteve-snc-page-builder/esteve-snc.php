<?php
/*
Plugin Name: Esteve SNC page builder
Plugin URI: https://commonpeoplei.com/
Description: Este plugin require tener instalado Advanced Custom Fields previamente para poder funcionar
Version: 1.0.0
Author: fitodac
Author URI: https://fitodac.com/
*/


add_theme_support( 'align-wide' );


// Gutenberg Blocks
add_action( 'acf/init', 'register_acf_blocks', 5 );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/page-title' );
	register_block_type( __DIR__ . '/blocks/hero' );
	register_block_type( __DIR__ . '/blocks/video' );
	register_block_type( __DIR__ . '/blocks/download' );
	register_block_type( __DIR__ . '/blocks/carousel' );
	register_block_type( __DIR__ . '/blocks/heading' );
}



// TailwindCSS for using in WordPress editor view
function esteveSNC_enqueue_styles(){
	global $pagenow;

	if( (
		$pagenow == 'post.php' || $pagenow == 'post-new.php'
	) && get_post_type() !== 'acf-field-group' ){
		wp_register_script('wp-admin-tailwind', 'https://cdn.tailwindcss.com/3.3.1', array(), '3.3.1', true);
		wp_enqueue_script('wp-admin-tailwind');
		
		// Additional stylesheet for Gutenberg Blocks
		wp_enqueue_style('wp-admin-tailwind', plugin_dir_url( __FILE__ ).'/esteve-snc.css', array(), '1.0.0', 'all');
	}
}

add_action( 'admin_enqueue_scripts', 'esteveSNC_enqueue_styles' );




// This function allows showing the blocks as an object in the WordPress RES API
add_action(
	'rest_api_init',
	function () {

		if ( ! function_exists( 'use_block_editor_for_post_type' ) ) {
			require ABSPATH . 'wp-admin/includes/post.php';
		}

		$post_types = get_post_types_by_support( [ 'editor' ] );
		foreach ( $post_types as $post_type ) {
			if ( use_block_editor_for_post_type( $post_type ) ) {
				register_rest_field(
					$post_type,
					'blocks',
					[
						'get_callback' => function ( array $post ) {
							if( defined( 'REST_REQUEST' ) && REST_REQUEST )
								return parse_blocks( $post['content']['raw'] );
						},
					]
				);
			}
		}

	}
);