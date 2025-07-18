<?php
/**
 * Theme Setup Functions
 *
 * @package Safe_Cologne
 */

// Theme supports and features
add_action('after_setup_theme', 'safe_cologne_theme_support');
function safe_cologne_theme_support() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '000000',
        'width'              => 1920,
        'height'             => 400,
        'flex-height'        => true,
    ));
    
    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    ));
    
    // Add support for Block Styles
    add_theme_support('wp-block-styles');
    
    // Add support for full and wide align images
    add_theme_support('align-wide');
    
    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');
    
    // Add support for custom line height control
    add_theme_support('custom-line-height');
    
    // Add support for experimental link color control
    add_theme_support('experimental-link-color');
    
    // Add support for custom units
    add_theme_support('custom-units', array('px', 'em', 'rem', '%', 'vh', 'vw'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'safe-cologne'),
        'footer'  => esc_html__('Footer Menu', 'safe-cologne'),
        'mobile'  => esc_html__('Mobile Menu', 'safe-cologne'),
    ));
    
    // Make theme translation ready
    load_theme_textdomain('safe-cologne', SAFE_COLOGNE_PATH . '/languages');
}

// Register custom image sizes
add_action('after_setup_theme', 'safe_cologne_custom_image_sizes');
function safe_cologne_custom_image_sizes() {
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('hero-banner', 1920, 1080, true);
    add_image_size('blog-thumb', 600, 400, true);
    add_image_size('testimonial-thumb', 100, 100, true);
}

// Add custom image size names
add_filter('image_size_names_choose', 'safe_cologne_custom_image_size_names');
function safe_cologne_custom_image_size_names($sizes) {
    return array_merge($sizes, array(
        'service-thumb' => __('Service Thumbnail', 'safe-cologne'),
        'team-member' => __('Team Member', 'safe-cologne'),
        'hero-banner' => __('Hero Banner', 'safe-cologne'),
        'blog-thumb' => __('Blog Thumbnail', 'safe-cologne'),
    ));
}

// Clean up WordPress head
add_action('init', 'safe_cologne_head_cleanup');
function safe_cologne_head_cleanup() {
    // Remove feed links
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    
    // Remove rsd link
    remove_action('wp_head', 'rsd_link');
    
    // Remove Windows live writer link
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Remove index link
    remove_action('wp_head', 'index_rel_link');
    
    // Remove previous link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    
    // Remove start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    
    // Remove links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    
    // Remove WP version
    remove_action('wp_head', 'wp_generator');
}

// Custom MIME types
add_filter('upload_mimes', 'safe_cologne_mime_types');
function safe_cologne_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

// Allow SVG uploads
add_filter('wp_check_filetype_and_ext', 'safe_cologne_check_filetype', 10, 4);
function safe_cologne_check_filetype($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}

// Disable Gutenberg for specific post types
add_filter('use_block_editor_for_post_type', 'safe_cologne_disable_gutenberg', 10, 2);
function safe_cologne_disable_gutenberg($use_block_editor, $post_type) {
    if (in_array($post_type, array('testimonials'))) {
        return false;
    }
    return $use_block_editor;
}

// Add theme support for editor styles
add_action('after_setup_theme', 'safe_cologne_editor_styles');
function safe_cologne_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}

// Register theme text domain
add_action('after_setup_theme', 'safe_cologne_load_textdomain');
function safe_cologne_load_textdomain() {
    load_theme_textdomain('safe-cologne', get_template_directory() . '/languages');
}

// Set content width
if (!isset($content_width)) {
    $content_width = 1200;
}

// Theme activation hook
add_action('after_switch_theme', 'safe_cologne_theme_activation');
function safe_cologne_theme_activation() {
    // Create default pages if they don't exist
    $default_pages = array(
        'dienstleistungen' => array(
            'title' => 'Dienstleistungen',
            'template' => 'page-templates/page-services.php'
        ),
        'ueber-uns' => array(
            'title' => 'Über uns',
            'template' => 'page-templates/page-about.php'
        ),
        'kontakt' => array(
            'title' => 'Kontakt',
            'template' => 'page-templates/page-contact.php'
        ),
        'jobportal' => array(
            'title' => 'Jobportal',
            'template' => 'page-templates/page-jobportal.php'
        ),
        'datenschutz' => array(
            'title' => 'Datenschutz',
            'template' => 'page-templates/page-privacy.php'
        ),
        'impressum' => array(
            'title' => 'Impressum',
            'template' => 'page-templates/page-imprint.php'
        ),
    );
    
    foreach ($default_pages as $slug => $page_data) {
        if (!get_page_by_path($slug)) {
            $page_id = wp_insert_post(array(
                'post_title'    => $page_data['title'],
                'post_name'     => $slug,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'page_template' => $page_data['template']
            ));
        }
    }
    
    // Set homepage
    $homepage = get_page_by_title('Startseite');
    if (!$homepage) {
        $homepage_id = wp_insert_post(array(
            'post_title'    => 'Startseite',
            'post_content'  => '',
            'post_status'   => 'publish',
            'post_type'     => 'page',
        ));
        update_option('page_on_front', $homepage_id);
        update_option('show_on_front', 'page');
    }
    
    // Flush rewrite rules
    flush_rewrite_rules();
}

// Theme deactivation hook
add_action('switch_theme', 'safe_cologne_theme_deactivation');
function safe_cologne_theme_deactivation() {
    flush_rewrite_rules();
}
