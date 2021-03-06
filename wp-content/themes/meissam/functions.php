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
 * ============================================ Add Custom Class to Menu Item 
 */

function atg_menu_classes($classes, $item, $args) {
	if($args->theme_location == 'menu-primary') {
	  $classes[] = 'menu-item';
	}
	return $classes;
  }
  add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);



  function wpse156165_menu_add_class( $atts, $item, $args ) {
	  $class = 'menu-link'; // or something based on $item
	  $atts['class'] = $class;
	  return $atts;
  }

  add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

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
	wp_enqueue_style('meissam-fonts', get_template_directory_uri() . '/assets/css/fonts.css' , array(), _S_VERSION );
	wp_enqueue_style('meissam-css', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script('meissam-js-scroll', get_template_directory_uri() . '/assets/js/scrollList.js', array(),  _S_VERSION , true );
	wp_enqueue_script('meissam-js-p5', get_template_directory_uri() . '/assets/js/p5.min.js', array(),  _S_VERSION , true );
	wp_enqueue_script('meissam-js-vanta-topology', get_template_directory_uri() . '/assets/js/vanta.topology.min.js', array(),  _S_VERSION , true );
	wp_enqueue_script('meissam-js-clipboard', get_template_directory_uri() . '/assets/js/clipboard.min.js', array(),  _S_VERSION , true );
	wp_enqueue_script('meissam-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'),  _S_VERSION , true );

}
add_action( 'wp_enqueue_scripts', 'meissam_scripts' );



/**
 * ============================================ Caclulate Reading Time
 */


 function get_the_reading_time($text, $postfix){
		$estimated_time = ceil(sizeof(explode(" ", $text)) / 230);
		return $estimated_time ." ". $postfix;
 }


 
/**
 * ============================================ Register Custom Posttype :: Projects
 */


function custom_post_type_Project() {
 
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Projects', 'Post Type General Name', 'meissam' ),
			'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'meissam' ),
			'menu_name'           => __( 'Projects', 'meissam' ),
			'parent_item_colon'   => __( 'Parent Project', 'meissam' ),
			'all_items'           => __( 'All Projects', 'meissam' ),
			'view_item'           => __( 'View Project', 'meissam' ),
			'add_new_item'        => __( 'Add New Project', 'meissam' ),
			'add_new'             => __( 'Add Project', 'meissam' ),
			'edit_item'           => __( 'Edit Project', 'meissam' ),
			'update_item'         => __( 'Update Project', 'meissam' ),
			'search_items'        => __( 'Search Project', 'meissam' ),
			'not_found'           => __( 'Not Found', 'meissam' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'meissam' ),
	
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Projects', 'meissam' ),
			'description'         => __( 'Projects of Meissam', 'meissam' ),
			'labels'              => $labels,
			'supports'            => array( 'title','editor','thumbnail', 'excerpt' ),
			'taxonomies'            => array(''), 	
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-database-view',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'query_var'          => true,
			'show_in_rest'		  => true,
			'rewrite' 		      => array('slug' => 'project'),
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'projects', $args );
	 
	}
	 
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	 
	 add_action( 'init', 'custom_post_type_Project', 0 );

	


/**
 * ============================================ Make Custom Link Relative in Menus
 */



	 function wpd_nav_menu_link_atts( $atts, $item, $args, $depth ){
		if( '/' == substr( $atts['href'], 0, 1 ) ){
			$atts['href'] = home_url() . $atts['href'];
		}
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'wpd_nav_menu_link_atts', 20, 4 );





	add_filter( 'get_the_archive_title', function ($title) {    
        if ( is_category() ) {    
                $title = single_cat_title( '', false );    
            } elseif ( is_tag() ) {    
                $title = single_tag_title( '', false );    
            } elseif ( is_author() ) {    
                $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
            } elseif ( is_tax() ) { //for custom post types
                $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
            } elseif (is_post_type_archive()) {
                $title = post_type_archive_title( '', false );
            }
        return $title;    
	});
	

/**
 * ============================================ Make Custom Link Relative in Menus
 */

	
// Custom Callback
            
function your_theme_slug_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	    
		<div class="comment-wrap">
			<div class="comment-img">
				<?php echo get_avatar($comment,$args['avatar_size'],null,null,array('class' => array('img-responsive', 'img-circle') )); ?>
			</div>
			<div class="comment-body">
				<h4 class="comment-author"><?php echo get_comment_author_link(); ?></h4>
				<span class="comment-date"><?php printf(__('%1$s at %2$s', 'your-text-domain'), get_comment_date(),  get_comment_time()) ?></span>
				<?php if ($comment->comment_approved == '0') { ?><em><i class="fa fa-spinner fa-spin" aria-hidden="true"></i> <?php _e('Comment awaiting approval', 'your-text-domain'); ?></em><br /><?php } ?>
				<?php comment_text(); ?>
				<span class="comment-reply"> <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'your-text-domain'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?></span>
			</div>
		</div>
<?php }

// Enqueue comment-reply

add_action('wp_enqueue_scripts', 'your_theme_slug_public_scripts');

function your_theme_slug_public_scripts() {
    if (!is_admin()) {
        if (is_singular() && get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
    }
}

// Enqueue fontawesome

add_action('wp_enqueue_scripts', 'your_theme_slug_public_styles');

function your_theme_slug_public_styles() {
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
}

    