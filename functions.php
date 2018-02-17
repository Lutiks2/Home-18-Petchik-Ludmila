<?php
/**
 * businessplus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package businessplus
 */

if (!function_exists('businessplus_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function businessplus_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on businessplus, use a find and replace
         * to change 'businessplus' to the name of your theme in all the template files.
         */
        load_theme_textdomain('businessplus', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'businessplus'),
        ));
        register_nav_menus(array(
            'header' => esc_html__('Header menu', 'businessplus'),
            'footer' => esc_html__('Footer menu', 'businessplus'),
            'social-menu' => esc_html__('Social menu', 'businessplus')
        ));
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('businessplus_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'businessplus_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function businessplus_content_width()
{
    $GLOBALS['content_width'] = apply_filters('businessplus_content_width', 640);
}

add_action('after_setup_theme', 'businessplus_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function businessplus_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'businessplus'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'businessplus'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'businessplus_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function businessplus_scripts()
{
    wp_enqueue_style('businessplus-style', get_stylesheet_uri());
    // font awesome
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    // fonts
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet');
    wp_enqueue_style('Raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,600,800" rel="stylesheet');
    wp_enqueue_style('Lora', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet');

    wp_enqueue_style('', get_template_directory_uri() . '/css/main.css');

    wp_enqueue_script('businessplus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('businessplus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'businessplus_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

