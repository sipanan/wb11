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
require_once SAFE_COLOGNE_PATH . '/includes/theme-support.php';
require_once SAFE_COLOGNE_PATH . '/includes/enqueue-scripts.php';
require_once SAFE_COLOGNE_PATH . '/includes/customizer-options.php';
require_once SAFE_COLOGNE_PATH . '/customizer.php';
require_once SAFE_COLOGNE_PATH . '/inc/custom-post-types.php';
require_once SAFE_COLOGNE_PATH . '/inc/ajax-handlers.php';

// Security headers
add_action('send_headers', 'safe_cologne_security_headers');
function safe_cologne_security_headers() {
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// Disable emojis for performance
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

// Remove unnecessary WordPress features for performance
add_action('wp_enqueue_scripts', 'safe_cologne_remove_wp_features');
function safe_cologne_remove_wp_features() {
    // Remove jQuery migrate
    if (!is_admin() && !is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, null, true);
        wp_enqueue_script('jquery');
    }
}

// Optimize database queries
add_action('init', 'safe_cologne_optimize_queries');
function safe_cologne_optimize_queries() {
    // Remove unnecessary meta queries
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
}

// Add custom post meta for SEO
add_action('add_meta_boxes', 'safe_cologne_add_meta_boxes');
function safe_cologne_add_meta_boxes() {
    add_meta_box(
        'safe-cologne-seo',
        __('SEO Settings', 'safe-cologne'),
        'safe_cologne_seo_meta_box',
        'page',
        'normal',
        'high'
    );
}

function safe_cologne_seo_meta_box($post) {
    wp_nonce_field(basename(__FILE__), 'safe_cologne_seo_nonce');
    
    $meta_description = get_post_meta($post->ID, '_safe_cologne_meta_description', true);
    $meta_keywords = get_post_meta($post->ID, '_safe_cologne_meta_keywords', true);
    
    ?>
    <table class="form-table">
        <tr>
            <th><label for="safe_cologne_meta_description"><?php _e('Meta Description', 'safe-cologne'); ?></label></th>
            <td>
                <textarea id="safe_cologne_meta_description" name="safe_cologne_meta_description" rows="3" cols="50"><?php echo esc_textarea($meta_description); ?></textarea>
                <p class="description"><?php _e('Brief description for search engines (max 160 characters)', 'safe-cologne'); ?></p>
            </td>
        </tr>
        <tr>
            <th><label for="safe_cologne_meta_keywords"><?php _e('Meta Keywords', 'safe-cologne'); ?></label></th>
            <td>
                <input type="text" id="safe_cologne_meta_keywords" name="safe_cologne_meta_keywords" value="<?php echo esc_attr($meta_keywords); ?>" size="50" />
                <p class="description"><?php _e('Keywords separated by commas', 'safe-cologne'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}

// Save custom post meta
add_action('save_post', 'safe_cologne_save_meta_boxes');
function safe_cologne_save_meta_boxes($post_id) {
    if (!isset($_POST['safe_cologne_seo_nonce']) || !wp_verify_nonce($_POST['safe_cologne_seo_nonce'], basename(__FILE__))) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['safe_cologne_meta_description'])) {
        update_post_meta($post_id, '_safe_cologne_meta_description', sanitize_textarea_field($_POST['safe_cologne_meta_description']));
    }
    
    if (isset($_POST['safe_cologne_meta_keywords'])) {
        update_post_meta($post_id, '_safe_cologne_meta_keywords', sanitize_text_field($_POST['safe_cologne_meta_keywords']));
    }
}

// Add meta tags to head
add_action('wp_head', 'safe_cologne_add_meta_tags');
function safe_cologne_add_meta_tags() {
    if (is_singular()) {
        global $post;
        
        $meta_description = get_post_meta($post->ID, '_safe_cologne_meta_description', true);
        $meta_keywords = get_post_meta($post->ID, '_safe_cologne_meta_keywords', true);
        
        if ($meta_description) {
            echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
        }
        
        if ($meta_keywords) {
            echo '<meta name="keywords" content="' . esc_attr($meta_keywords) . '">' . "\n";
        }
    }
}
