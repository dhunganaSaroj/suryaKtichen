<?php
/**
 * suryaKitchen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package suryaKitchen
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function suryakitchen_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on suryaKitchen, use a find and replace
		* to change 'suryakitchen' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'suryakitchen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'suryakitchen' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'suryakitchen' ),
			)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'suryakitchen_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'suryakitchen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function suryakitchen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'suryakitchen_content_width', 640 );
}
add_action( 'after_setup_theme', 'suryakitchen_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function suryakitchen_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'suryakitchen' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'suryakitchen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'suryakitchen_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function suryakitchen_scripts() {
	wp_enqueue_style( 'suryakitchen-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'suryakitchen-style', 'rtl', 'replace' );

	wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/assets/css/bootstrap.css');
	wp_enqueue_style('main-css',get_template_directory_uri().'/assets/css/style.css');
	wp_enqueue_style('responsive-css',get_template_directory_uri().'/assets/css/responsive.css');

	//wp_enqueue_script( 'suryakitchen-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script('jquery',get_template_directory_uri().'/assets/js/jquery.js',[],'1.0.0',true);
	wp_enqueue_script('popper-min',get_template_directory_uri().'/assets/js/popper.min.js',[],'1.0.0',true);
	wp_enqueue_script('bootstrap-js',get_template_directory_uri().'/assets/js/bootstrap.min.js',[],'1.0.0',true);
	wp_enqueue_script('jquery-ui',get_template_directory_uri().'/assets/js/jquery-ui.js',[],'1.0.0',true);
	wp_enqueue_script('jquery-fancybox',get_template_directory_uri().'/assets/js/jquery.fancybox.js',[],'1.0.0',true);
	wp_enqueue_script('swiper-js',get_template_directory_uri().'/assets/js/swiper.js',[],'1.0.0',true);
	wp_enqueue_script('owl-js',get_template_directory_uri().'/assets/js/owl.js',[],'1.0.0',true);
	wp_enqueue_script('appear-js',get_template_directory_uri().'/assets/js/appear.js',[],'1.0.0',true);
	wp_enqueue_script('wow-js',get_template_directory_uri().'/assets/js/wow.js',[],'1.0.0',true);
	wp_enqueue_script('parallax-js',get_template_directory_uri().'/assets/js/parallax.min.js',[],'1.0.0',true);
	wp_enqueue_script('custom-script-js',get_template_directory_uri().'/assets/js/custom-script.js',[],'1.0.0',true);
	
}
add_action( 'wp_enqueue_scripts', 'suryakitchen_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//to add options page into the site backend 
if( function_exists('acf_add_options_page') ) {
		
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Header Settings',
	// 	'menu_title'	=> 'Theme Header Settings',
	// 	'parent_slug' 	=> 'theme-general-settings',
	// ));

	// acf_add_options_sub_page(array(
	// 	'page_title' 	=> 'Theme Footer Settings',
	// 	'menu_title'	=> 'Theme Footer Settings',
	// 	'parent_slug' 	=> 'theme-general-settings',
	// ));

}

/**
 * Custom Menu Attribues
 */

function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
//add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

//add_filter("nav_menu_css_class",'classes_for_nav_li',10,4);
function classes_for_nav_li($classes,$item,$args,$dept){
	// if($args->menu->term_id==2){
	// 	$classes[]='nav-item py-3 lg:px-3 group lg:ml-4';
	// }else{
	// 	$classes[]='mb-2 pb-2 border-b border-gray-500 last-of-type:border-0';
	// }
	$classes[]='nav-item';
	return $classes;
}
function wpb_first_and_last_menu_class($items) {
	foreach($items as $item){
		$classes=$item->classes;
		if(in_array('menu-item-has-children',$classes)){
			$classes[]="dropdown";
			$item->classes=$classes;
			// print_r($item);
		}
	}
	//exit;
    return $items;
}
//add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');

//add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
	$classes=$item->classes;
		if(in_array('menu-item-has-children',$classes)){
			$class = 'dropdown-toggle'; // or something based on $item
			$atts['class'] = $class;	
			$atts['data-bs-toggle']='dropdown';
			// print_r($item);
		}
    
    return $atts;
}

//add_filter( 'nav_menu_submenu_css_class', 'my_custom_submenu_classnames', 10, 3 );
/**
 * Filters the CSS class(es) applied to a menu list element.
 *
 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 * @return string[]
 */
function my_custom_submenu_classnames( $classes, $args, $depth ) {
    // Here we can additionally use menu arguments.
    if ( 'menu-1' === $args->theme_location ) {
        $default_class_name_key = array_search( 'sub-menu', $classes );
        if ( false !== $default_class_name_key ) {
            unset( $classes[ $default_class_name_key ] );
        }
        $classes[] = 'dropdown-menu';
        $classes[] = "depth-{$depth}";
    }

    return $classes;
}

/**
 * Registering custom post types
 */
// Our custom post type function
function create_posttype() {

    // caseStudy post type
    register_post_type( 'destinations',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Destinations' ),
                'singular_name' => __( 'Destination' )
            ),
            'public' => true,
            'menu_icon'           => 'dashicons-media-text',
            'has_archive' => false,
			'rewrite' => array('slug' => 'destiantions'),
			'hierarchical'          => true,
			'show_in_rest' => true,
			// 'taxonomies'  => array('casestudy-category' ),
			'supports' => array('title', 'editor','thumbnail'),
 
        )
    );

	register_post_type( 'branches',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Branches' ),
                'singular_name' => __( 'Branch' )
            ),
            'public' => true,
            'menu_icon'           => 'dashicons-networking',
            'has_archive' => false,
			'rewrite' => array('slug' => 'branches'),
			'hierarchical'          => true,
			'show_in_rest' => true,
			'taxonomies'  => array('super_branches'),
			'supports' => array('title','editor','thumbnail'),
        )
    );

	register_post_type( 'menu',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Menu' ),
                'singular_name' => __( 'Menu' )
            ),
            'public' => true,
            'menu_icon'           => 'dashicons-food',
            'has_archive' => false,
			'rewrite' => array('slug' => 'menu'),
			'hierarchical'          => true,
			'show_in_rest' => true,
			'taxonomies'  => array('menu-category' ),
			'supports' => array('title','editor','thumbnail'),
        )
    );

	register_post_type( 'testimonials',
    	// CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonials' )
            ),
            'public' => true,
            'menu_icon'           => 'dashicons-admin-network',
            'has_archive' => false,
			'rewrite' => array('slug' => 'testimonials'),
			'hierarchical'          => true,
			'show_in_rest' => true,
			// 'taxonomies'  => array('casestudy-category' ),
			'supports' => array('title','editor','thumbnail'),
        )
    );


	
}

// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
	/**
	 * Add new SUper Branch
	 */
	register_taxonomy('super_branches', 'branches', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
		  'name' => _x( 'Super Branch', 'taxonomy general name' ),
		  'singular_name' => _x( 'Super Branch', 'taxonomy singular name' ),
		  'search_items' =>  __( 'Super Branch' ),
		  'all_items' => __( 'All Super Branch' ),
		  'parent_item' => __( 'Super Branch Type' ),
		  'parent_item_colon' => __( 'Super Branch Type:' ),
		  'edit_item' => __( 'Edit SUper Branch' ),
		  'update_item' => __( 'Update SUper Branch' ),
		  'add_new_item' => __( 'Add New SUper Branch' ),
		  'new_item_name' => __( 'New SUper Branch Name' ),
		  'menu_name' => __( 'SUper Branch' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
		  'slug' => 'super_branches', // This controls the base slug that will display before each term
		  'with_front' => true, // Don't display the category base before "/locations/"
		  'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	  ));

}
add_action( 'init', 'add_custom_taxonomies', 0 );

/**
 * CUstom Print Function
 */

function wp_print($item){
	echo '<pre><code>';
	print_r($item);
	echo '</code></pre>';
}


/**
 * Pagination
 */
if ( ! function_exists( 'pagination' ) ) :

    function pagination( $paged = '', $max_page = '' ) {
        $big = 999999999; // need an unlikely integer
        if( ! $paged ) {
            $paged = get_query_var('paged');
        }

        if( ! $max_page ) {
            global $wp_query;
            $max_page = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
        }

        echo paginate_links( array(
            'base'       => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'     => '?paged=%#%',
            'current'    => max( 1, $paged ),
            'total'      => $max_page,
            'mid_size'   => 1,
            'prev_text'  => __( '«' ),
            'next_text'  => __( '»' ),
            'type'       => 'list'
        ) );
    }
endif;

/**
 * 
 * Gutenberg with ACF
 */

 if(function_exists('acf_register_block_type')){
    add_action('acf/init','register_acf_block_types');
}


function register_acf_block_types(){
        
        /**
         * Home Slider Block
         */
        acf_register_block_type(
        array(
            'name'      => 'homeslider',
            'title'     => __('Home slider'),
            'description'   =>__('Home slider Block'),
            'render_template'   =>('/blocks/homepage/slider.php'),
            'icon'          =>'dashicons-cover-image',
            'keywords'      =>'slider','slider home',
        ));  
		
		acf_register_block_type(
			array(
				'name'      => 'homeintro',
				'title'     => __('Home intro'),
				'description'   =>__('Home intro Block'),
				'render_template'   =>('/blocks/homepage/intro.php'),
				'icon'          =>'dashicons-cover-image',
				'keywords'      =>'intro','intro home',
			));   

			acf_register_block_type(
			array(
				'name'      => 'homebranches',
				'title'     => __('Home Branches'),
				'description'   =>__('Home Branches Block'),
				'render_template'   =>('/blocks/homepage/branches.php'),
				'icon'          =>'dashicons-cover-image',
				'keywords'      =>'branches','branches home',
			)); 

			acf_register_block_type(
				array(
					'name'      => 'homemenu',
					'title'     => __('Home menu'),
					'description'   =>__('Home menu Block'),
					'render_template'   =>('/blocks/homepage/menu.php'),
					'icon'          =>'dashicons-cover-image',
					'keywords'      =>'menu','menu home',
				)); 

				acf_register_block_type(
					array(
						'name'      => 'hometestimonials',
						'title'     => __('Home testimonials'),
						'description'   =>__('Home testimonials Block'),
						'render_template'   =>('/blocks/homepage/testimonials.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'testimonials','testimonials home',
					)); 
				acf_register_block_type(
				array(
					'name'      => 'homeblog',
					'title'     => __('Home blog'),
					'description'   =>__('Home blog Block'),
					'render_template'   =>('/blocks/homepage/blog.php'),
					'icon'          =>'dashicons-cover-image',
					'keywords'      =>'blog','blog home',
				)); 

					acf_register_block_type(
					array(
						'name'      => 'bannerblock',
						'title'     => __('Banner Block'),
						'description'   =>__('Banner  Block'),
						'render_template'   =>('/blocks/banner-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'Banner','Banner Block',
					)); 

					/**
					 * About Block
					 */
					acf_register_block_type(
					array(
						'name'      => 'aboutintroblock',
						'title'     => __('About Intro Block'),
						'description'   =>__('about intro  Block'),
						'render_template'   =>('/blocks/about/about-intro-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'about intro','about intro Block',
					)); 
					acf_register_block_type(
					array(
						'name'      => 'aboutwhyblock',
						'title'     => __('About why Block'),
						'description'   =>__('about why  Block'),
						'render_template'   =>('/blocks/about/about-why-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'about why','about why Block',
					)); 
					
					acf_register_block_type(
					array(
						'name'      => 'aboutgalleryblock',
						'title'     => __('About gallery Block'),
						'description'   =>__('about gallery  Block'),
						'render_template'   =>('/blocks/about/about-gallery-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'about gallery','about gallery Block',
					)); 

					acf_register_block_type(
					array(
						'name'      => 'Menu block',
						'title'     => __('Menu Block'),
						'description'   =>__('Menu Block'),
						'render_template'   =>('/blocks/menu/menu-page.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'menu page','menu',
					)); 
					
					acf_register_block_type(
					array(
						'name'      => 'branches block',
						'title'     => __('branches Block'),
						'description'   =>__('branches Block'),
						'render_template'   =>('/blocks/shop-info/shop-info-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'branches page','branches',
					)); 
				
					acf_register_block_type(
					array(
						'name'      => 'blog block',
						'title'     => __('blog Block'),
						'description'   =>__('blog Block'),
						'render_template'   =>('/blocks/blog/blog-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'blog page','blog',
					)); 

					acf_register_block_type(
					array(
						'name'      => 'recruit block',
						'title'     => __('recruit Block'),
						'description'   =>__('recruit Block'),
						'render_template'   =>('/blocks/recruit/recruit-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'recruit page','recruit',
					)); 
					
					acf_register_block_type(
					array(
						'name'      => 'recruit contact block',
						'title'     => __('recruit contact Block'),
						'description'   =>__('recruit contact Block'),
						'render_template'   =>('/blocks/recruit/recruit-contact-block.php'),
						'icon'          =>'dashicons-cover-image',
						'keywords'      =>'recruit page','recruit',
					));
}
