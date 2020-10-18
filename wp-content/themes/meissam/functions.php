<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'meissam_setup' ) ) :
	function meissam_setup() {

		
		add_theme_support( 'title-tag' );

		
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary', 'meissam' ),
			)
		);
		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;

add_action( 'after_setup_theme', 'meissam_setup' );


/**
 * ============================================ Register widget area.
 */
// https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

function meissam_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'meissam' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'meissam' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'meissam_widgets_init' );

/**
 * ============================================ Enqueue scripts and styles.
 */


function meissam_scripts() {
	wp_enqueue_style('meissam-css', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script('meissam-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'),  _S_VERSION , true );

}
add_action( 'wp_enqueue_scripts', 'meissam_scripts' );





