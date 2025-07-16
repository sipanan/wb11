<?php
/**
 * Enqueue Scripts and Styles
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles
 */
add_action('wp_enqueue_scripts', 'safe_cologne_enqueue_scripts');
function safe_cologne_enqueue_scripts() {
    // Get current page template
    $template = get_page_template_slug();
    $page_slug = get_post_field('post_name', get_post());
    
    // CSS Dependencies
    wp_enqueue_style('safe-cologne-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
    
    // Main CSS
    wp_enqueue_style('safe-cologne-main', SAFE_COLOGNE_URI . '/assets/css/main.css', array(), SAFE_COLOGNE_VERSION);
    
    // Page-specific CSS
    if (is_front_page() || $template === 'templates/page-home.php') {
        wp_enqueue_style('safe-cologne-home', SAFE_COLOGNE_URI . '/assets/css/home.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    }
    
    if (is_page('about') || $template === 'templates/page-about.php') {
        wp_enqueue_style('safe-cologne-about', SAFE_COLOGNE_URI . '/assets/css/about.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    }
    
    if (is_page('services') || $template === 'templates/page-services.php') {
        wp_enqueue_style('safe-cologne-services', SAFE_COLOGNE_URI . '/assets/css/services.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    }
    
    if (is_page('contact') || $template === 'templates/page-contact.php') {
        wp_enqueue_style('safe-cologne-contact', SAFE_COLOGNE_URI . '/assets/css/contact.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    }
    
    // Responsive CSS
    wp_enqueue_style('safe-cologne-responsive', SAFE_COLOGNE_URI . '/assets/css/responsive.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
    
    // JavaScript Dependencies
    wp_enqueue_script('jquery');
    
    // Main JavaScript
    wp_enqueue_script('safe-cologne-main', SAFE_COLOGNE_URI . '/assets/js/main.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    
    // Navigation JavaScript
    wp_enqueue_script('safe-cologne-navigation', SAFE_COLOGNE_URI . '/assets/js/navigation.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    
    // Page-specific JavaScript
    if (is_front_page() || $template === 'templates/page-home.php') {
        wp_enqueue_script('safe-cologne-home', SAFE_COLOGNE_URI . '/assets/js/home.js', array('jquery', 'safe-cologne-main'), SAFE_COLOGNE_VERSION, true);
    }
    
    if (is_page('about') || $template === 'templates/page-about.php') {
        wp_enqueue_script('safe-cologne-about', SAFE_COLOGNE_URI . '/assets/js/about.js', array('jquery', 'safe-cologne-main'), SAFE_COLOGNE_VERSION, true);
    }
    
    if (is_page('services') || $template === 'templates/page-services.php') {
        wp_enqueue_script('safe-cologne-services', SAFE_COLOGNE_URI . '/assets/js/services.js', array('jquery', 'safe-cologne-main'), SAFE_COLOGNE_VERSION, true);
    }
    
    if (is_page('contact') || $template === 'templates/page-contact.php') {
        wp_enqueue_script('safe-cologne-contact', SAFE_COLOGNE_URI . '/assets/js/contact.js', array('jquery', 'safe-cologne-main'), SAFE_COLOGNE_VERSION, true);
        wp_enqueue_script('safe-cologne-contact-form', SAFE_COLOGNE_URI . '/assets/js/contact-form.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    }
    
    // Localize script for AJAX
    wp_localize_script('safe-cologne-main', 'safeCologne', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('safe-cologne-nonce'),
        'homeUrl' => home_url('/'),
        'themeUrl' => SAFE_COLOGNE_URI,
        'isRTL' => is_rtl(),
        'translations' => array(
            'loading' => __('Wird geladen...', 'safe-cologne'),
            'success' => __('Erfolgreich gesendet!', 'safe-cologne'),
            'error' => __('Ein Fehler ist aufgetreten.', 'safe-cologne'),
            'required' => __('Dieses Feld ist erforderlich.', 'safe-cologne'),
            'invalid_email' => __('Ungültige E-Mail-Adresse.', 'safe-cologne'),
            'invalid_phone' => __('Ungültige Telefonnummer.', 'safe-cologne'),
        ),
    ));
    
    // Add comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

/**
 * Enqueue admin scripts and styles
 */
add_action('admin_enqueue_scripts', 'safe_cologne_admin_scripts');
function safe_cologne_admin_scripts($hook) {
    // Only load on specific admin pages
    if ($hook !== 'appearance_page_safe-cologne-options' && $hook !== 'customize.php') {
        return;
    }
    
    wp_enqueue_style('safe-cologne-admin', SAFE_COLOGNE_URI . '/assets/css/admin.css', array(), SAFE_COLOGNE_VERSION);
    wp_enqueue_script('safe-cologne-admin', SAFE_COLOGNE_URI . '/assets/js/admin.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    
    wp_localize_script('safe-cologne-admin', 'safeCologneAdmin', array(
        'nonce' => wp_create_nonce('safe-cologne-admin-nonce'),
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ));
}

/**
 * Add preload hints for performance
 */
add_action('wp_head', 'safe_cologne_preload_hints');
function safe_cologne_preload_hints() {
    // Preload critical CSS
    echo '<link rel="preload" href="' . esc_url(SAFE_COLOGNE_URI . '/assets/css/main.css') . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // Preload Google Fonts
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // Preload FontAwesome
    echo '<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
}

/**
 * Add resource hints for performance
 */
add_action('wp_head', 'safe_cologne_resource_hints');
function safe_cologne_resource_hints() {
    // DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">' . "\n";
    
    // Preconnect for critical resources
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}

/**
 * Optimize script and style loading
 */
add_filter('script_loader_tag', 'safe_cologne_script_loader_tag', 10, 2);
function safe_cologne_script_loader_tag($tag, $handle) {
    // Add defer to non-critical scripts
    $defer_scripts = array(
        'safe-cologne-home',
        'safe-cologne-about',
        'safe-cologne-services',
        'safe-cologne-contact',
    );
    
    if (in_array($handle, $defer_scripts)) {
        return str_replace(' src', ' defer src', $tag);
    }
    
    return $tag;
}

/**
 * Add critical CSS inline for above-the-fold content
 */
add_action('wp_head', 'safe_cologne_critical_css', 1);
function safe_cologne_critical_css() {
    // Only add critical CSS on front page
    if (!is_front_page()) {
        return;
    }
    
    $critical_css = '
        :root {
            --primary-red: #E30613;
            --dark-gray: #333;
            --white: #ffffff;
            --transition: all 0.3s ease;
        }
        
        .hero {
            background: linear-gradient(135deg, var(--primary-red) 0%, #B20510 100%);
            color: var(--white);
            padding: 120px 0 80px;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
        }
    ';
    
    echo '<style id="safe-cologne-critical-css">' . $critical_css . '</style>' . "\n";
}