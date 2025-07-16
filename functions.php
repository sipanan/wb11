<?php
/**
 * SpecSec Professional Security Theme Functions
 *
 * @package SpecSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('SPECSEC_VERSION', '1.0.0');
define('SPECSEC_URI', get_template_directory_uri());
define('SPECSEC_PATH', get_template_directory());

// Include required files
require_once SPECSEC_PATH . '/inc/theme-setup.php';
require_once SPECSEC_PATH . '/inc/customizer.php';
require_once SPECSEC_PATH . '/inc/custom-post-types.php';
require_once SPECSEC_PATH . '/inc/ajax-handlers.php';

// Theme setup
add_action('after_setup_theme', 'specsec_setup');
function specsec_setup() {
    // Add theme support
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    add_theme_support('custom-logo', array(
        'height'      => 120,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'specsec'),
        'footer'  => esc_html__('Footer Menu', 'specsec'),
        'mobile'  => esc_html__('Mobile Menu', 'specsec'),
    ));
    
    // Make theme translation ready
    load_theme_textdomain('specsec', SPECSEC_PATH . '/languages');
    
    // Add image sizes
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('team-member', 300, 400, true);
    add_image_size('hero-banner', 1920, 1080, true);
    add_image_size('testimonial-avatar', 80, 80, true);
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'specsec_scripts');
function specsec_scripts() {
    // CSS
    wp_enqueue_style('specsec-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700&display=swap', array(), null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
    wp_enqueue_style('specsec-main', SPECSEC_URI . '/assets/css/style.css', array(), SPECSEC_VERSION);
    wp_enqueue_style('specsec-responsive', SPECSEC_URI . '/assets/css/responsive.css', array('specsec-main'), SPECSEC_VERSION);
    
    // Page-specific styles
    if (is_front_page()) {
        wp_enqueue_style('specsec-home', SPECSEC_URI . '/assets/css/home.css', array('specsec-main'), SPECSEC_VERSION);
    }
    if (is_page_template('page-templates/page-team.php')) {
        wp_enqueue_style('specsec-team', SPECSEC_URI . '/assets/css/team.css', array('specsec-main'), SPECSEC_VERSION);
    }
    if (is_page_template('page-templates/page-services.php')) {
        wp_enqueue_style('specsec-services', SPECSEC_URI . '/assets/css/services.css', array('specsec-main'), SPECSEC_VERSION);
    }
    if (is_page_template('page-templates/page-jobportal.php')) {
        wp_enqueue_style('specsec-jobportal', SPECSEC_URI . '/assets/css/jobportal.css', array('specsec-main'), SPECSEC_VERSION);
    }
    if (is_page_template('page-templates/page-contact.php')) {
        wp_enqueue_style('specsec-contact', SPECSEC_URI . '/assets/css/contact.css', array('specsec-main'), SPECSEC_VERSION);
    }
    
    // JavaScript
    wp_enqueue_script('specsec-navigation', SPECSEC_URI . '/assets/js/navigation.js', array(), SPECSEC_VERSION, true);
    wp_enqueue_script('specsec-main', SPECSEC_URI . '/assets/js/main.js', array('jquery'), SPECSEC_VERSION, true);
    
    // Page-specific scripts
    if (is_front_page()) {
        wp_enqueue_script('specsec-home', SPECSEC_URI . '/assets/js/home.js', array('jquery'), SPECSEC_VERSION, true);
    }
    if (is_page_template('page-templates/page-team.php')) {
        wp_enqueue_script('specsec-team', SPECSEC_URI . '/assets/js/team.js', array('jquery'), SPECSEC_VERSION, true);
    }
    if (is_page_template('page-templates/page-jobportal.php')) {
        wp_enqueue_script('specsec-jobportal', SPECSEC_URI . '/assets/js/jobportal.js', array('jquery'), SPECSEC_VERSION, true);
    }
    if (is_page_template('page-templates/page-contact.php')) {
        wp_enqueue_script('specsec-contact', SPECSEC_URI . '/assets/js/contact.js', array('jquery'), SPECSEC_VERSION, true);
    }
    
    // Localize script
    wp_localize_script('specsec-main', 'specSec', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('specsec-nonce'),
        'homeUrl' => home_url('/'),
        'themeUrl' => SPECSEC_URI,
        'translations' => array(
            'loading' => __('Wird geladen...', 'specsec'),
            'success' => __('Erfolgreich gesendet!', 'specsec'),
            'error' => __('Ein Fehler ist aufgetreten.', 'specsec'),
        ),
    ));
}

// Register widget areas
add_action('widgets_init', 'specsec_widgets_init');
function specsec_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'specsec'),
        'id'            => 'sidebar-main',
        'description'   => esc_html__('Add widgets here.', 'specsec'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'specsec'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Footer widget area 1', 'specsec'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 2', 'specsec'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Footer widget area 2', 'specsec'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 3', 'specsec'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Footer widget area 3', 'specsec'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 4', 'specsec'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Footer widget area 4', 'specsec'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}

// Custom excerpt length
add_filter('excerpt_length', 'specsec_excerpt_length');
function specsec_excerpt_length($length) {
    return 20;
}

// Custom excerpt more
add_filter('excerpt_more', 'specsec_excerpt_more');
function specsec_excerpt_more($more) {
    return '...';
}

// Add body classes
add_filter('body_class', 'specsec_body_classes');
function specsec_body_classes($classes) {
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
    
    return $classes;
}

// Security headers
add_action('send_headers', 'specsec_security_headers');
function specsec_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// Disable emojis
add_action('init', 'specsec_disable_emojis');
function specsec_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}

// Theme options page
add_action('admin_menu', 'specsec_add_admin_menu');
function specsec_add_admin_menu() {
    add_theme_page(
        __('SpecSec Options', 'specsec'),
        __('Theme Options', 'specsec'),
        'manage_options',
        'specsec-options',
        'specsec_options_page'
    );
}

function specsec_options_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('specsec_options');
            do_settings_sections('specsec_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register theme settings
add_action('admin_init', 'specsec_settings_init');
function specsec_settings_init() {
    register_setting('specsec_options', 'specsec_settings');
    
    add_settings_section(
        'specsec_section_general',
        __('General Settings', 'specsec'),
        'specsec_section_general_cb',
        'specsec_options'
    );
    
    add_settings_field(
        'specsec_field_phone',
        __('Phone Number', 'specsec'),
        'specsec_field_phone_cb',
        'specsec_options',
        'specsec_section_general'
    );
    
    add_settings_field(
        'specsec_field_email',
        __('Contact Email', 'specsec'),
        'specsec_field_email_cb',
        'specsec_options',
        'specsec_section_general'
    );
    
    add_settings_field(
        'specsec_field_address',
        __('Address', 'specsec'),
        'specsec_field_address_cb',
        'specsec_options',
        'specsec_section_general'
    );
}

function specsec_section_general_cb() {
    echo '<p>' . __('General theme settings', 'specsec') . '</p>';
}

function specsec_field_phone_cb() {
    $options = get_option('specsec_settings');
    ?>
    <input type="text" name="specsec_settings[phone]" value="<?php echo isset($options['phone']) ? esc_attr($options['phone']) : '+49 2271 98950'; ?>" />
    <?php
}

function specsec_field_email_cb() {
    $options = get_option('specsec_settings');
    ?>
    <input type="email" name="specsec_settings[email]" value="<?php echo isset($options['email']) ? esc_attr($options['email']) : 'info@specsec.de'; ?>" />
    <?php
}

function specsec_field_address_cb() {
    $options = get_option('specsec_settings');
    ?>
    <textarea name="specsec_settings[address]" rows="3" cols="50"><?php echo isset($options['address']) ? esc_textarea($options['address']) : 'August-Borsig-Straße 8, 50126 Bergheim'; ?></textarea>
    <?php
}

// Helper functions
function specsec_get_option($key, $default = '') {
    $options = get_option('specsec_settings');
    return isset($options[$key]) ? $options[$key] : $default;
}

function specsec_get_phone() {
    return specsec_get_option('phone', '+49 2271 98950');
}

function specsec_get_email() {
    return specsec_get_option('email', 'info@specsec.de');
}

function specsec_get_address() {
    return specsec_get_option('address', 'August-Borsig-Straße 8, 50126 Bergheim');
}
