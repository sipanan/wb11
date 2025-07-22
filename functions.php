<?php
/**
 * Safe Cologne Theme Functions
 *
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('SAFE_COLOGNE_VERSION', '1.0.0');
define('SAFE_COLOGNE_URI', get_template_directory_uri());
define('SAFE_COLOGNE_PATH', get_template_directory());

// Include required files
require_once SAFE_COLOGNE_PATH . '/inc/theme-setup.php';
require_once SAFE_COLOGNE_PATH . '/inc/customizer.php';
require_once SAFE_COLOGNE_PATH . '/inc/custom-post-types.php';
require_once SAFE_COLOGNE_PATH . '/inc/ajax-handlers.php';

// Theme setup
add_action('after_setup_theme', 'safe_cologne_setup');
function safe_cologne_setup() {
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
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('dark-editor-style');
    
    // Block editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary Red', 'safe-cologne'),
            'slug'  => 'primary',
            'color' => '#E30613',
        ),
        array(
            'name'  => esc_html__('Primary Dark', 'safe-cologne'),
            'slug'  => 'primary-dark',
            'color' => '#C2050F',
        ),
        array(
            'name'  => esc_html__('White', 'safe-cologne'),
            'slug'  => 'white',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => esc_html__('Black', 'safe-cologne'),
            'slug'  => 'black',
            'color' => '#1A1A1A',
        ),
        array(
            'name'  => esc_html__('Light Gray', 'safe-cologne'),
            'slug'  => 'gray-100',
            'color' => '#F8F9FA',
        ),
        array(
            'name'  => esc_html__('Medium Gray', 'safe-cologne'),
            'slug'  => 'gray-600',
            'color' => '#6C757D',
        ),
    ));
    
    // Block editor gradient presets
    add_theme_support('editor-gradient-presets', array(
        array(
            'name'     => esc_html__('Primary Gradient', 'safe-cologne'),
            'gradient' => 'linear-gradient(135deg, #E30613 0%, #C2050F 100%)',
            'slug'     => 'primary-gradient',
        ),
    ));
    
    // Block editor font sizes
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => esc_html__('Small', 'safe-cologne'),
            'size' => 14,
            'slug' => 'small'
        ),
        array(
            'name' => esc_html__('Normal', 'safe-cologne'),
            'size' => 16,
            'slug' => 'normal'
        ),
        array(
            'name' => esc_html__('Large', 'safe-cologne'),
            'size' => 20,
            'slug' => 'large'
        ),
        array(
            'name' => esc_html__('Extra Large', 'safe-cologne'),
            'size' => 32,
            'slug' => 'extra-large'
        ),
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'safe-cologne'),
        'footer'  => esc_html__('Footer Menu', 'safe-cologne'),
        'mobile'  => esc_html__('Mobile Menu', 'safe-cologne'),
    ));
    
    // Make theme translation ready
    load_theme_textdomain('safe-cologne', SAFE_COLOGNE_PATH . '/languages');
    
    // Add image sizes
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('hero-banner', 1920, 1080, true);
}

// Register custom block patterns
add_action('init', 'safe_cologne_register_block_patterns');
function safe_cologne_register_block_patterns() {
    // Register Safe Cologne pattern category
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'safe-cologne',
            array(
                'label' => __('Safe Cologne', 'safe-cologne'),
            )
        );
    }
    
    // Register patterns
    if (function_exists('register_block_pattern')) {
        $patterns = array(
            'hero-banner',
            'services-section',
            'cta-section'
        );
        
        foreach ($patterns as $pattern) {
            $pattern_file = SAFE_COLOGNE_PATH . '/patterns/' . $pattern . '.php';
            if (file_exists($pattern_file)) {
                $pattern_data = include $pattern_file;
                if (is_array($pattern_data)) {
                    register_block_pattern(
                        'safe-cologne/' . $pattern,
                        $pattern_data
                    );
                }
            }
        }
    }
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'safe_cologne_scripts');
function safe_cologne_scripts() {
    // CSS
    wp_enqueue_style('safe-cologne-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
    wp_enqueue_style('safe-cologne-main', SAFE_COLOGNE_URI . '/assets/css/style.css', array(), SAFE_COLOGNE_VERSION);
    wp_enqueue_style('safe-cologne-responsive', SAFE_COLOGNE_URI . '/assets/css/responsive.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    
    // JavaScript
    wp_enqueue_script('safe-cologne-navigation', SAFE_COLOGNE_URI . '/assets/js/navigation.js', array(), SAFE_COLOGNE_VERSION, true);
    wp_enqueue_script('safe-cologne-main', SAFE_COLOGNE_URI . '/assets/js/main.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    wp_enqueue_script('safe-cologne-contact', SAFE_COLOGNE_URI . '/assets/js/contact-form.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    
    // Localize script
    wp_localize_script('safe-cologne-main', 'safeCologne', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('safe-cologne-nonce'),
        'homeUrl' => home_url('/'),
        'themeUrl' => SAFE_COLOGNE_URI,
        'translations' => array(
            'loading' => __('Wird geladen...', 'safe-cologne'),
            'success' => __('Erfolgreich gesendet!', 'safe-cologne'),
            'error' => __('Ein Fehler ist aufgetreten.', 'safe-cologne'),
        ),
    ));
}

// Register widget areas
add_action('widgets_init', 'safe_cologne_widgets_init');
function safe_cologne_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Main Sidebar', 'safe-cologne'),
        'id'            => 'sidebar-main',
        'description'   => esc_html__('Add widgets here.', 'safe-cologne'),
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
}

// Custom excerpt length
add_filter('excerpt_length', 'safe_cologne_excerpt_length');
function safe_cologne_excerpt_length($length) {
    return 20;
}

// Custom excerpt more
add_filter('excerpt_more', 'safe_cologne_excerpt_more');
function safe_cologne_excerpt_more($more) {
    return '...';
}

// Add body classes
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
    
    return $classes;
}

// Security headers
add_action('send_headers', 'safe_cologne_security_headers');
function safe_cologne_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// Disable emojis
add_action('init', 'safe_cologne_disable_emojis');
function safe_cologne_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}

// Theme options page
add_action('admin_menu', 'safe_cologne_add_admin_menu');
function safe_cologne_add_admin_menu() {
    add_theme_page(
        __('Safe Cologne Options', 'safe-cologne'),
        __('Theme Options', 'safe-cologne'),
        'manage_options',
        'safe-cologne-options',
        'safe_cologne_options_page'
    );
}

function safe_cologne_options_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('safe_cologne_options');
            do_settings_sections('safe_cologne_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register theme settings
add_action('admin_init', 'safe_cologne_settings_init');
function safe_cologne_settings_init() {
    register_setting('safe_cologne_options', 'safe_cologne_settings');
    
    add_settings_section(
        'safe_cologne_section_general',
        __('General Settings', 'safe-cologne'),
        'safe_cologne_section_general_cb',
        'safe_cologne_options'
    );
    
    add_settings_field(
        'safe_cologne_field_phone',
        __('Emergency Phone Number', 'safe-cologne'),
        'safe_cologne_field_phone_cb',
        'safe_cologne_options',
        'safe_cologne_section_general'
    );
    
    add_settings_field(
        'safe_cologne_field_email',
        __('Contact Email', 'safe-cologne'),
        'safe_cologne_field_email_cb',
        'safe_cologne_options',
        'safe_cologne_section_general'
    );
}

function safe_cologne_section_general_cb() {
    echo '<p>' . __('General theme settings', 'safe-cologne') . '</p>';
}

function safe_cologne_field_phone_cb() {
    $options = get_option('safe_cologne_settings');
    ?>
    <input type="text" name="safe_cologne_settings[phone]" value="<?php echo isset($options['phone']) ? esc_attr($options['phone']) : ''; ?>" />
    <?php
}

function safe_cologne_field_email_cb() {
    $options = get_option('safe_cologne_settings');
    ?>
    <input type="email" name="safe_cologne_settings[email]" value="<?php echo isset($options['email']) ? esc_attr($options['email']) : ''; ?>" />
    <?php
}
