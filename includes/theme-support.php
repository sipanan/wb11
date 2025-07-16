<?php
/**
 * Theme Support
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
add_action('after_setup_theme', 'safe_cologne_theme_setup');
function safe_cologne_theme_setup() {
    // Make theme available for translation
    load_theme_textdomain('safe-cologne', SAFE_COLOGNE_PATH . '/languages');
    
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Switch default core markup for search form, comment form, and comments to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for core custom colors
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary Red', 'safe-cologne'),
            'slug'  => 'primary-red',
            'color' => '#E30613',
        ),
        array(
            'name'  => esc_html__('Dark Gray', 'safe-cologne'),
            'slug'  => 'dark-gray',
            'color' => '#333333',
        ),
        array(
            'name'  => esc_html__('Light Gray', 'safe-cologne'),
            'slug'  => 'light-gray',
            'color' => '#F8F9FA',
        ),
        array(
            'name'  => esc_html__('White', 'safe-cologne'),
            'slug'  => 'white',
            'color' => '#ffffff',
        ),
    ));
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for wide and full alignment
    add_theme_support('align-wide');
    
    // Add support for custom line height
    add_theme_support('custom-line-height');
    
    // Add support for custom units
    add_theme_support('custom-units');
    
    // Add support for custom spacing
    add_theme_support('custom-spacing');
    
    // Add support for post formats
    add_theme_support('post-formats', array(
        'aside',
        'gallery',
        'quote',
        'video',
        'audio',
    ));
    
    // This theme uses wp_nav_menu() in several locations
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'safe-cologne'),
        'footer'  => esc_html__('Footer Menu', 'safe-cologne'),
        'mobile'  => esc_html__('Mobile Menu', 'safe-cologne'),
        'social'  => esc_html__('Social Media Menu', 'safe-cologne'),
    ));
    
    // Add custom image sizes
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('hero-banner', 1920, 1080, true);
    add_image_size('blog-thumb', 600, 400, true);
    add_image_size('testimonial-thumb', 150, 150, true);
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet
 */
function safe_cologne_content_width() {
    $GLOBALS['content_width'] = apply_filters('safe_cologne_content_width', 1200);
}
add_action('after_setup_theme', 'safe_cologne_content_width', 0);

/**
 * Register widget areas
 */
add_action('widgets_init', 'safe_cologne_widgets_init');
function safe_cologne_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'safe-cologne'),
        'id'            => 'sidebar-main',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'safe-cologne'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'safe-cologne'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'safe-cologne'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'safe-cologne'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 4', 'safe-cologne'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer widget area 4', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Homepage Sidebar', 'safe-cologne'),
        'id'            => 'homepage-sidebar',
        'description'   => esc_html__('Sidebar for homepage widgets', 'safe-cologne'),
        'before_widget' => '<div id="%1$s" class="homepage-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="homepage-widget-title">',
        'after_title'   => '</h3>',
    ));
}

/**
 * Enqueue editor styles
 */
add_action('enqueue_block_editor_assets', 'safe_cologne_editor_styles');
function safe_cologne_editor_styles() {
    wp_enqueue_style('safe-cologne-editor-styles', SAFE_COLOGNE_URI . '/assets/css/editor-styles.css', array(), SAFE_COLOGNE_VERSION);
}

/**
 * Add custom classes to body
 */
add_filter('body_class', 'safe_cologne_body_classes');
function safe_cologne_body_classes($classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }
    
    // Add class if sidebar is active
    if (is_active_sidebar('sidebar-main')) {
        $classes[] = 'has-sidebar';
    }
    
    // Add class for homepage
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    // Add class for mobile detection
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    }
    
    return $classes;
}

/**
 * Custom excerpt length
 */
add_filter('excerpt_length', 'safe_cologne_excerpt_length');
function safe_cologne_excerpt_length($length) {
    if (is_admin()) {
        return $length;
    }
    
    return 20;
}

/**
 * Custom excerpt more
 */
add_filter('excerpt_more', 'safe_cologne_excerpt_more');
function safe_cologne_excerpt_more($more) {
    if (is_admin()) {
        return $more;
    }
    
    return '...';
}

/**
 * Filter the except length for specific post types
 */
add_filter('excerpt_length', 'safe_cologne_custom_excerpt_length', 999);
function safe_cologne_custom_excerpt_length($length) {
    if (is_admin()) {
        return $length;
    }
    
    // Different lengths for different contexts
    if (is_home() || is_category() || is_tag()) {
        return 25;
    }
    
    if (is_search()) {
        return 15;
    }
    
    return $length;
}

/**
 * Add schema markup support
 */
add_action('wp_head', 'safe_cologne_schema_markup');
function safe_cologne_schema_markup() {
    if (is_front_page()) {
        $company_info = safe_cologne_get_company_info();
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'SecurityCompany',
            'name' => $company_info['name'],
            'description' => $company_info['description'],
            'telephone' => $company_info['phone'],
            'email' => $company_info['email'],
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $company_info['address'],
                'addressLocality' => 'Köln',
                'addressCountry' => 'DE',
            ),
            'url' => home_url(),
            'logo' => get_theme_mod('custom_logo') ? wp_get_attachment_url(get_theme_mod('custom_logo')) : '',
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema) . '</script>' . "\n";
    }
}