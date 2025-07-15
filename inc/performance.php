<?php
/**
 * Performance Optimizations
 * 
 * @package Safe_Cologne
 */

// Critical CSS inlining
add_action('wp_head', 'safe_cologne_critical_css', 5);
function safe_cologne_critical_css() {
    if (get_theme_mod('safe_cologne_css_minification', false)) {
        $critical_css = safe_cologne_get_critical_css();
        if ($critical_css) {
            echo "<style id='safe-cologne-critical-css'>{$critical_css}</style>";
        }
    }
}

// Get critical CSS
function safe_cologne_get_critical_css() {
    $critical_css = '';
    
    // Base critical CSS
    $critical_css .= '
        :root {
            --primary-red: ' . get_theme_mod('safe_cologne_primary_color', '#E30613') . ';
            --dark-gray: ' . get_theme_mod('safe_cologne_secondary_color', '#1a1a1a') . ';
            --font-headings: ' . get_theme_mod('safe_cologne_font_headings', 'Inter') . ';
            --font-body: ' . get_theme_mod('safe_cologne_font_body', 'Inter') . ';
            --container-width: ' . get_theme_mod('safe_cologne_container_width', '1200') . 'px;
            --header-height: ' . get_theme_mod('safe_cologne_header_height', '80') . 'px;
        }
        
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: var(--font-body), -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            line-height: 1.6;
            color: var(--dark-gray);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .container { max-width: var(--container-width); margin: 0 auto; padding: 0 1rem; }
        
        h1, h2, h3, h4, h5, h6 { font-family: var(--font-headings); font-weight: 700; line-height: 1.2; }
        
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(227,6,19,0.95) 0%, rgba(26,26,26,0.95) 100%);
            color: white;
            position: relative;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at center, transparent 0%, rgba(0,0,0,0.4) 100%);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        
        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.1;
        }
        
        .hero-subtitle {
            font-size: clamp(1.25rem, 3vw, 1.5rem);
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            min-width: 200px;
            justify-content: center;
        }
        
        .hero-btn-primary {
            background: white;
            color: var(--primary-red);
            border: 2px solid white;
        }
        
        .hero-btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        @media (max-width: 768px) {
            .hero-buttons { flex-direction: column; align-items: center; }
            .hero-btn { width: 100%; max-width: 300px; }
        }
    ';
    
    return $critical_css;
}

// Lazy loading for images
add_filter('wp_get_attachment_image_attributes', 'safe_cologne_lazy_loading_images', 10, 3);
function safe_cologne_lazy_loading_images($attr, $attachment, $size) {
    if (get_theme_mod('safe_cologne_lazy_loading', true)) {
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }
    return $attr;
}

// Preload critical resources
add_action('wp_head', 'safe_cologne_preload_resources', 5);
function safe_cologne_preload_resources() {
    // Preload critical fonts
    $font_headings = get_theme_mod('safe_cologne_font_headings', 'Inter');
    $font_body = get_theme_mod('safe_cologne_font_body', 'Inter');
    
    $fonts = array_unique(array($font_headings, $font_body));
    
    foreach ($fonts as $font) {
        switch ($font) {
            case 'Inter':
                echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
                break;
            case 'Roboto':
                echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
                break;
        }
    }
    
    // Preload critical CSS
    echo '<link rel="preload" href="' . SAFE_COLOGNE_URI . '/assets/css/style.css" as="style">';
    
    // Preload hero image if set
    if (is_front_page()) {
        $hero_bg = get_theme_mod('safe_cologne_hero_bg');
        if ($hero_bg) {
            echo '<link rel="preload" href="' . esc_url($hero_bg) . '" as="image">';
        }
    }
}

// Minify CSS output
add_filter('safe_cologne_minify_css', 'safe_cologne_minify_css_output');
function safe_cologne_minify_css_output($css) {
    if (get_theme_mod('safe_cologne_css_minification', false)) {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
        
        // Remove whitespace
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);
        
        // Remove trailing semicolons
        $css = str_replace(';}', '}', $css);
        
        // Remove unnecessary spaces
        $css = preg_replace('/\s+/', ' ', $css);
        $css = str_replace(array(' {', '{ ', ' }', '} ', ': ', ' :', '; ', ' ;'), array('{', '{', '}', '}', ':', ':', ';', ';'), $css);
        
        return trim($css);
    }
    
    return $css;
}

// Optimize database queries
add_action('init', 'safe_cologne_optimize_queries');
function safe_cologne_optimize_queries() {
    // Remove query strings from static resources
    add_filter('script_loader_src', 'safe_cologne_remove_query_strings', 15, 1);
    add_filter('style_loader_src', 'safe_cologne_remove_query_strings', 15, 1);
    
    // Disable embeds
    add_action('wp_footer', 'safe_cologne_deregister_scripts');
    
    // Remove unnecessary WordPress features
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
}

// Remove query strings from static resources
function safe_cologne_remove_query_strings($src) {
    if (strpos($src, '?ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

// Deregister unnecessary scripts
function safe_cologne_deregister_scripts() {
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        wp_dequeue_script('wp-embed');
    }
}

// Optimize images
add_filter('wp_calculate_image_sizes', 'safe_cologne_optimize_image_sizes', 10, 2);
function safe_cologne_optimize_image_sizes($sizes, $size) {
    if (get_theme_mod('safe_cologne_lazy_loading', true)) {
        return $sizes;
    }
    return $sizes;
}

// Enable Gzip compression
add_action('init', 'safe_cologne_enable_gzip');
function safe_cologne_enable_gzip() {
    if (!headers_sent() && !ob_get_contents() && !ini_get('zlib.output_compression')) {
        ob_start('ob_gzhandler');
    }
}

// Browser caching headers
add_action('init', 'safe_cologne_browser_cache_headers');
function safe_cologne_browser_cache_headers() {
    if (!is_admin()) {
        // Cache static resources for 1 year
        $expires = 31536000; // 1 year
        header("Cache-Control: max-age=$expires, public, immutable");
        header("Expires: " . gmdate("D, d M Y H:i:s", time() + $expires) . " GMT");
    }
}

// Conditional loading of Contact Form 7
add_action('wp_enqueue_scripts', 'safe_cologne_conditional_cf7');
function safe_cologne_conditional_cf7() {
    if (!is_page_template('page-templates/page-contact.php') && !is_page_template('page-templates/page-jobportal.php')) {
        wp_dequeue_style('contact-form-7');
        wp_dequeue_script('contact-form-7');
    }
}

// Optimize WordPress heartbeat
add_action('init', 'safe_cologne_optimize_heartbeat');
function safe_cologne_optimize_heartbeat() {
    // Disable heartbeat on frontend
    if (!is_admin()) {
        wp_deregister_script('heartbeat');
    }
}

// Clean up WordPress head
add_action('wp_head', 'safe_cologne_cleanup_head', 1);
function safe_cologne_cleanup_head() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}

// Optimize menu queries
add_filter('wp_nav_menu_args', 'safe_cologne_optimize_menu_queries');
function safe_cologne_optimize_menu_queries($args) {
    $args['fallback_cb'] = false;
    return $args;
}

// Defer JavaScript loading
add_filter('script_loader_tag', 'safe_cologne_defer_scripts', 10, 3);
function safe_cologne_defer_scripts($tag, $handle, $src) {
    if (get_theme_mod('safe_cologne_js_minification', false)) {
        // Defer non-critical scripts
        $defer_scripts = array(
            'safe-cologne-main',
            'safe-cologne-contact',
            'safe-cologne-navigation',
        );
        
        if (in_array($handle, $defer_scripts)) {
            return str_replace(' src', ' defer src', $tag);
        }
    }
    
    return $tag;
}

// Performance monitoring
add_action('wp_footer', 'safe_cologne_performance_monitoring');
function safe_cologne_performance_monitoring() {
    if (WP_DEBUG && current_user_can('manage_options')) {
        ?>
        <script>
        // Performance monitoring
        window.addEventListener('load', function() {
            if ('performance' in window) {
                const perfData = performance.timing;
                const loadTime = perfData.loadEventEnd - perfData.navigationStart;
                const domReady = perfData.domContentLoadedEventEnd - perfData.navigationStart;
                
                console.log('Safe Cologne Performance:');
                console.log('Load Time: ' + loadTime + 'ms');
                console.log('DOM Ready: ' + domReady + 'ms');
                console.log('Database Queries: <?php echo get_num_queries(); ?>');
                console.log('Memory Usage: <?php echo size_format(memory_get_peak_usage(true)); ?>');
            }
        });
        </script>
        <?php
    }
}

// Optimize database queries
add_action('pre_get_posts', 'safe_cologne_optimize_queries_frontend');
function safe_cologne_optimize_queries_frontend($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Optimize homepage queries
        if (is_home() || is_front_page()) {
            $query->set('posts_per_page', 10);
            $query->set('no_found_rows', true);
        }
        
        // Optimize archive queries
        if (is_archive()) {
            $query->set('posts_per_page', 12);
        }
    }
}

// Add resource hints
add_action('wp_head', 'safe_cologne_resource_hints', 2);
function safe_cologne_resource_hints() {
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">';
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">';
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}

// Service Worker registration
add_action('wp_footer', 'safe_cologne_service_worker');
function safe_cologne_service_worker() {
    if (get_theme_mod('safe_cologne_service_worker', false)) {
        ?>
        <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('<?php echo home_url('/sw.js'); ?>')
                    .then(function(registration) {
                        console.log('SW registered: ', registration);
                    })
                    .catch(function(registrationError) {
                        console.log('SW registration failed: ', registrationError);
                    });
            });
        }
        </script>
        <?php
    }
}