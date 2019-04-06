<?php
/**
 * ghhw functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ghhw
 */

if ( ! function_exists( 'ghhw_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ghhw_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ghhw, use a find and replace
		 * to change 'ghhw' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ghhw', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );


        add_theme_support( 'html5', array( 'search-form' ) );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ghhw' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ghhw_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ghhw_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ghhw_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ghhw_content_width', 640 );
}
add_action( 'after_setup_theme', 'ghhw_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ghhw_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ghhw' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ghhw' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ghhw_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ghhw_scripts() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js');
    wp_enqueue_script('jquery');

    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	wp_enqueue_style( 'ghhw-style', get_stylesheet_uri(), false, time() );
/*    wp_enqueue_script( 'ghhw-imagesloaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.js', array(), time(), true );*/
    wp_enqueue_script('slick_slider', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), time(), true);
/*    wp_enqueue_script( 'ghhw-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), time(), true );*/
    wp_enqueue_script( 'ghhw-scripts', get_template_directory_uri() . '/js-min/scripts.min.js', array(), time(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ghhw_scripts' );

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





function parse_shortcode_content( $content ) {

    /* Parse nested shortcodes and add formatting. */
    $content = trim( do_shortcode( shortcode_unautop( $content ) ) );

    /* Remove '' from the start of the string. */
    if ( substr( $content, 0, 4 ) == '' )
        $content = substr( $content, 4 );

    /* Remove '' from the end of the string. */
    if ( substr( $content, -3, 3 ) == '' )
        $content = substr( $content, 0, -3 );

    /* Remove any instances of ''. */
    $content = str_replace( array( '
' ), '', $content );
    $content = str_replace( array( '
  

' ), '', $content );

    return $content;
}

// move wpautop filter to AFTER shortcode is processed

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );


/*-------------------------------------POST TYPES REGISTER-------------------------------------*/
add_action('init', 'exam_posttypes');
function exam_posttypes()
{
    register_post_type('profiles', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt',
        ),
        'labels' => array(
            'name' => __('PROFILES'),
            'add_new' => 'Add more',
            'all_items' => 'All'
        )

    ));
    /*----------------------NEWS-------------*/
    register_post_type('news', array(
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
        ),
        'labels' => array(
            'name' => __('NEWS'),
            'add_new' => 'Add more',
            'all_items' => 'All'
        )

    ));
}
/*----------------SOCIAL BUTTONS-----------------*/
function my_customizer_social_media_array()
{
    $social_sites = array(
        'twitter',
        'facebook',
        'google-plus',
        'flickr',
        'pinterest',
        'youtube',
        'tumblr',
        'dribbble',
        'rss',
        'linkedin',
        'instagram',
        'email',
        'vk'
    );
    return $social_sites;
}
/*-------------------------------------CUSTOMIZER-------------------------------------*/
add_action('customize_register', 'my_add_social_sites_customizer');
function my_add_social_sites_customizer($wp_customize)
{
    /* ------------------------------ Social icons customizer -------------------------- */
    $wp_customize->add_section('my_social_settings', array(
        'title' => __('Social Media Icons', 'ghhw'),
        'priority' => 35
    ));
    $social_sites = my_customizer_social_media_array();
    $priority = 5;
    foreach ($social_sites as $social_site) {
        $wp_customize->add_setting("$social_site", array(
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ));
        $wp_customize->add_control($social_site, array(
            'label' => __("$social_site url:", 'ghhw'),
            'section' => 'my_social_settings',
            'type' => 'text',
            'priority' => $priority
        ));
        $priority = $priority + 5;
    }
    /* ------------------------------ footer paragraph -------------------------- */
    $wp_customize->add_section('ghwh_footer_text', array(
        'title' => __('Text on right block in footer', 'ghhw'),
        'priority' => 120
    ));
    $wp_customize->add_setting('ghwh_footer_text_set', array(
        'default' => 'lorem ipsum',
        'transport' => 'refresh'
    ));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'ghwh_footer_text_control', array(
        'label' => __("Write text in footer form", 'ghhw'),
        'section' => 'ghwh_footer_text',
        'settings' => 'ghwh_footer_text_set',
        'priority' => 1
    )));
}

/* -------------------------------------------- Social icons function ---------------------- */
function my_social_media_icons()
{
    $social_sites = my_customizer_social_media_array();
    foreach ($social_sites as $social_site) {
        if (strlen(get_theme_mod($social_site)) > 0) {
            $active_sites[] = $social_site;
        }
    }
    if (!empty($active_sites)) {
        echo "<ul class='social-media-icons'>";
        foreach ($active_sites as $active_site) {
            $class = 'fa fa-' . $active_site;
            if ($active_site == 'email') {
                ?>
                <li>
                    <a class="email" target="_blank"
                       href="mailto:<?php
                       echo antispambot(is_email(get_theme_mod($active_site)));
                       ?>">
                        <i class="fa fa-envelope" title="<?php
                        _e('email icon', 'promolod');
                        ?>"></i>
                    </a>
                </li>
                <?php
            } else {
                ?>
                <li>
                    <a class="<?php
                    echo $active_site;
                    ?>" target="_blank"
                       href="<?php
                       echo esc_url(get_theme_mod($active_site));
                       ?>">
                        <i class="<?php
                        echo esc_attr($class);
                        ?>"
                           title="<?php
                           printf(__('%s icon', 'promolod'), $active_site);
                           ?>"></i>
                    </a>
                </li>
                <?php
            }
        }
        echo "</ul>";
    }
}

?>