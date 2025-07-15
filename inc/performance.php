<?php
/**
 * Performance Optimization Functions
 *
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Optimize CSS and JS loading
add_action('wp_enqueue_scripts', 'safe_cologne_optimize_assets', 15);
function safe_cologne_optimize_assets() {
    // Defer non-critical CSS
    wp_enqueue_style('safe-cologne-critical', SAFE_COLOGNE_URI . '/assets/css/critical.css', array(), SAFE_COLOGNE_VERSION);
    
    // Preload critical resources
    add_action('wp_head', 'safe_cologne_preload_resources');
    
    // Optimize JavaScript loading
    wp_script_add_data('safe-cologne-main', 'defer', true);
    wp_script_add_data('safe-cologne-contact', 'defer', true);
}

// Preload critical resources
function safe_cologne_preload_resources() {
    ?>
    <link rel="preload" href="<?php echo SAFE_COLOGNE_URI; ?>/assets/css/style.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="<?php echo SAFE_COLOGNE_URI; ?>/assets/js/main.js" as="script">
    <?php
}

// Enable Gzip compression
add_action('init', 'safe_cologne_enable_gzip');
function safe_cologne_enable_gzip() {
    if (!ob_get_level()) {
        ob_start('ob_gzhandler');
    }
}

// Optimize images
add_filter('wp_image_editors', 'safe_cologne_image_editors');
function safe_cologne_image_editors($editors) {
    return array('WP_Image_Editor_Imagick', 'WP_Image_Editor_GD');
}

// Add WebP support
add_filter('wp_image_editors', 'safe_cologne_webp_support');
function safe_cologne_webp_support($editors) {
    array_unshift($editors, 'WP_Image_Editor_Imagick');
    return $editors;
}

// Lazy loading for images
add_filter('wp_img_tag_add_loading_attr', 'safe_cologne_lazy_loading', 10, 3);
function safe_cologne_lazy_loading($value, $image, $context) {
    if ('the_content' === $context) {
        return 'lazy';
    }
    return $value;
}

// Remove query strings from static resources
add_filter('script_loader_src', 'safe_cologne_remove_query_strings');
add_filter('style_loader_src', 'safe_cologne_remove_query_strings');
function safe_cologne_remove_query_strings($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Optimize WordPress database
add_action('wp_loaded', 'safe_cologne_optimize_database');
function safe_cologne_optimize_database() {
    // Clean up revisions
    if (is_admin() && current_user_can('manage_options')) {
        $revisions = wp_get_post_revisions('', array('numberposts' => -1));
        foreach ($revisions as $revision) {
            if (wp_is_post_revision($revision)) {
                wp_delete_post_revision($revision->ID);
            }
        }
    }
}

// Cache headers
add_action('send_headers', 'safe_cologne_cache_headers');
function safe_cologne_cache_headers() {
    if (!is_admin()) {
        $expires = 7 * 24 * 60 * 60; // 7 days
        header("Cache-Control: public, max-age=$expires");
        header("Expires: " . gmdate('D, d M Y H:i:s', time() + $expires) . ' GMT');
    }
}

// Minify HTML output
add_action('wp_loaded', 'safe_cologne_minify_html');
function safe_cologne_minify_html() {
    if (!is_admin()) {
        ob_start('safe_cologne_minify_html_output');
    }
}

function safe_cologne_minify_html_output($buffer) {
    // Remove comments
    $buffer = preg_replace('/<!--(?!<!)[^\[>].*?-->/', '', $buffer);
    
    // Remove extra whitespace
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    $buffer = preg_replace('/>\s+</', '><', $buffer);
    
    return $buffer;
}

// Critical CSS inline for above-the-fold content
add_action('wp_head', 'safe_cologne_critical_css', 1);
function safe_cologne_critical_css() {
    ?>
    <style id="safe-cologne-critical-css">
        /* Critical CSS for above-the-fold content */
        body{font-family:'Inter',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;margin:0;padding:0;line-height:1.6;color:#333}
        .sc-header{background:#fff;box-shadow:0 2px 8px rgba(0,0,0,0.1);position:fixed;top:0;left:0;right:0;z-index:1000}
        .sc-container{max-width:1200px;margin:0 auto;padding:0 20px}
        .sc-hero{padding:120px 0 80px;background:#f8f8f8;text-align:center}
        .sc-hero h1{font-size:3rem;font-weight:700;margin-bottom:1rem;color:#1a1a1a}
        .sc-hero p{font-size:1.25rem;margin-bottom:2rem;color:#666}
        .btn{display:inline-block;padding:1rem 2rem;background:#E30613;color:#fff;text-decoration:none;border-radius:6px;font-weight:600;transition:all 0.3s ease}
        .btn:hover{background:#B20510;transform:translateY(-2px)}
        @media (max-width:768px){
            .sc-hero{padding:100px 0 60px}
            .sc-hero h1{font-size:2rem}
            .sc-hero p{font-size:1rem}
        }
    </style>
    <?php
}

// Defer non-critical CSS
add_action('wp_head', 'safe_cologne_defer_css');
function safe_cologne_defer_css() {
    ?>
    <script>
        // Load non-critical CSS asynchronously
        function loadCSS(href) {
            var link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            document.head.appendChild(link);
        }
        
        // Load after page load
        window.addEventListener('load', function() {
            loadCSS('<?php echo SAFE_COLOGNE_URI; ?>/assets/css/responsive.css');
            loadCSS('<?php echo SAFE_COLOGNE_URI; ?>/assets/css/blocks.css');
        });
    </script>
    <?php
}

// Service Worker for caching
add_action('wp_head', 'safe_cologne_service_worker');
function safe_cologne_service_worker() {
    if (get_theme_mod('safe_cologne_enable_service_worker', false)) {
        ?>
        <script>
            if ('serviceWorker' in navigator) {
                window.addEventListener('load', function() {
                    navigator.serviceWorker.register('<?php echo SAFE_COLOGNE_URI; ?>/sw.js')
                        .then(function(registration) {
                            console.log('ServiceWorker registered successfully');
                        })
                        .catch(function(error) {
                            console.log('ServiceWorker registration failed');
                        });
                });
            }
        </script>
        <?php
    }
}