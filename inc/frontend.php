<?php

//declare( strict_types = 1 );

namespace Kucrut\ViteForWPExample\React\Frontend;

use Kucrut\Vite;


function bootstrap(): void {
	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_script' );
	add_action( 'wp_footer', __NAMESPACE__ . '\\render_app' );

	add_action( 'admin_menu',  __NAMESPACE__ . '\\jobplace_init_menu');  
	
}
 
/**
 * Render application's markup
 */
function render_app(): void {
	printf( '<div id="my-app" class="my-app"></div>' );
}

/**
 * Enqueue script
 */
function enqueue_script(): void {
	Vite\enqueue_asset(
		dirname( __DIR__ ) . '/js/dist',
		'js/src/main.jsx',
		[
			'dependencies' => [ 'react', 'react-dom' ],
			'handle' => 'vite-for-wp-react',
			'in-footer' => false,
		]
	);
}


function jobplace_admin_page(): void {   
	
    require_once plugin_dir_path( __FILE__ ) . 'templates/app.php';
	//printf( '<div id="my-app" class="my-app"></div>' );  
}


function jobplace_init_menu(): void
{
    //add_menu_page( __( 'Job Place', 'jobplace'), __( 'Job Place', 'jobplace'), 'manage_options', 'jobplace', 'jobplace_admin_page', 'dashicons-admin-post', '2.1' );
	add_menu_page('My Page Title', 'Job Place', 'manage_options', 'jobplace', 'jobplace_admin_page' );


}


