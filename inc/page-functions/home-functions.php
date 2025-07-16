<?php
/**
 * Home Page Specific Functions
 * Safe Cologne Theme - Home Page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Home page specific enqueue scripts and styles
 */
function safe_cologne_home_enqueue_scripts() {
    if (is_front_page()) {
        // Enqueue home-specific CSS
        wp_enqueue_style(
            'safe-cologne-home', 
            get_template_directory_uri() . '/assets/css/pages/home.css', 
            array('safe-cologne-main'), 
            SAFE_COLOGNE_VERSION
        );
        
        // Enqueue home-specific JavaScript
        wp_enqueue_script(
            'safe-cologne-home', 
            get_template_directory_uri() . '/assets/js/pages/home.js', 
            array('jquery', 'safe-cologne-main'), 
            SAFE_COLOGNE_VERSION, 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_home_enqueue_scripts');

/**
 * Home page customizer settings
 */
function safe_cologne_home_customizer_settings($wp_customize) {
    // Hero Section
    $wp_customize->add_section('safe_cologne_home_hero', array(
        'title'    => __('Hero Bereich', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 20,
    ));
    
    // Hero Title
    $wp_customize->add_setting('safe_cologne_hero_title', array(
        'default'           => 'Sicherheit mit Herz & System',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_title', array(
        'label'    => __('Hero Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_home_hero',
        'type'     => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('safe_cologne_hero_subtitle', array(
        'default'           => 'Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_home_hero',
        'type'     => 'textarea',
    ));
    
    // Hero Button Text
    $wp_customize->add_setting('safe_cologne_hero_button_text', array(
        'default'           => 'Jetzt Kontakt aufnehmen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_button_text', array(
        'label'    => __('Hero Button Text', 'safe-cologne'),
        'section'  => 'safe_cologne_home_hero',
        'type'     => 'text',
    ));
    
    // Hero Button URL
    $wp_customize->add_setting('safe_cologne_hero_button_url', array(
        'default'           => '/kontakt/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_button_url', array(
        'label'    => __('Hero Button URL', 'safe-cologne'),
        'section'  => 'safe_cologne_home_hero',
        'type'     => 'url',
    ));
    
    // Features Section
    $wp_customize->add_section('safe_cologne_home_features', array(
        'title'    => __('Features Bereich', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 30,
    ));
    
    // Features Title
    $wp_customize->add_setting('safe_cologne_features_title', array(
        'default'           => 'Was uns besonders macht',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_features_title', array(
        'label'    => __('Features Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_home_features',
        'type'     => 'text',
    ));
    
    // Features Subtitle
    $wp_customize->add_setting('safe_cologne_features_subtitle', array(
        'default'           => 'Professionelle Sicherheit mit menschlichem Ansatz',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_features_subtitle', array(
        'label'    => __('Features Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_home_features',
        'type'     => 'textarea',
    ));
    
    // Statistics Section
    $wp_customize->add_section('safe_cologne_home_stats', array(
        'title'    => __('Statistiken', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 40,
    ));
    
    // Years in Business
    $wp_customize->add_setting('safe_cologne_stat_years', array(
        'default'           => '15',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_stat_years', array(
        'label'    => __('Jahre im Geschäft', 'safe-cologne'),
        'section'  => 'safe_cologne_home_stats',
        'type'     => 'number',
    ));
    
    // Happy Clients
    $wp_customize->add_setting('safe_cologne_stat_clients', array(
        'default'           => '500',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_stat_clients', array(
        'label'    => __('Zufriedene Kunden', 'safe-cologne'),
        'section'  => 'safe_cologne_home_stats',
        'type'     => 'number',
    ));
    
    // Security Officers
    $wp_customize->add_setting('safe_cologne_stat_officers', array(
        'default'           => '50',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_stat_officers', array(
        'label'    => __('Sicherheitskräfte', 'safe-cologne'),
        'section'  => 'safe_cologne_home_stats',
        'type'     => 'number',
    ));
    
    // Response Time
    $wp_customize->add_setting('safe_cologne_stat_response', array(
        'default'           => '15',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_stat_response', array(
        'label'    => __('Antwortzeit (Minuten)', 'safe-cologne'),
        'section'  => 'safe_cologne_home_stats',
        'type'     => 'number',
    ));
}
add_action('customize_register', 'safe_cologne_home_customizer_settings');

/**
 * Get home page features
 */
function safe_cologne_get_home_features() {
    $features = array(
        array(
            'icon' => 'fas fa-handshake',
            'title' => __('Diskretion & Menschenkenntnis', 'safe-cologne'),
            'description' => __('Wir handeln respektvoll und deeskalierend. Unsere Profis arbeiten mit Fingerspitzengefühl.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-graduation-cap',
            'title' => __('Geschulte Profis', 'safe-cologne'),
            'description' => __('Vorausschauend und souverän - alle Mitarbeiter durchlaufen kontinuierliche Schulungen.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-satellite-dish',
            'title' => __('Moderne Technik', 'safe-cologne'),
            'description' => __('GPS-Tracking, Funk und Echtzeit-Kommunikation für kluge Koordination.', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-clipboard-check',
            'title' => __('Verlässliche Planung', 'safe-cologne'),
            'description' => __('Strukturierte Abläufe und durchdachte Konzepte für maximale Effizienz.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_home_features', $features);
}

/**
 * Get home page services preview
 */
function safe_cologne_get_home_services() {
    $services = array(
        array(
            'icon' => 'fas fa-shield-alt',
            'title' => __('Objektschutz', 'safe-cologne'),
            'description' => __('Professioneller Schutz für Ihre Immobilien und Geschäfte.', 'safe-cologne'),
            'link' => '/services/#objektschutz'
        ),
        array(
            'icon' => 'fas fa-users',
            'title' => __('Veranstaltungsschutz', 'safe-cologne'),
            'description' => __('Sicherheit für Events, Messen und Veranstaltungen aller Art.', 'safe-cologne'),
            'link' => '/services/#veranstaltungsschutz'
        ),
        array(
            'icon' => 'fas fa-car',
            'title' => __('Revierdienst', 'safe-cologne'),
            'description' => __('Mobile Sicherheitspatrouillen für Ihr Unternehmen.', 'safe-cologne'),
            'link' => '/services/#revierdienst'
        )
    );
    
    return apply_filters('safe_cologne_home_services', $services);
}

/**
 * Get statistics for home page
 */
function safe_cologne_get_home_stats() {
    $stats = array(
        array(
            'number' => get_theme_mod('safe_cologne_stat_years', '15'),
            'label' => __('Jahre Erfahrung', 'safe-cologne'),
            'suffix' => '+'
        ),
        array(
            'number' => get_theme_mod('safe_cologne_stat_clients', '500'),
            'label' => __('Zufriedene Kunden', 'safe-cologne'),
            'suffix' => '+'
        ),
        array(
            'number' => get_theme_mod('safe_cologne_stat_officers', '50'),
            'label' => __('Sicherheitskräfte', 'safe-cologne'),
            'suffix' => '+'
        ),
        array(
            'number' => get_theme_mod('safe_cologne_stat_response', '15'),
            'label' => __('Min. Antwortzeit', 'safe-cologne'),
            'suffix' => ''
        )
    );
    
    return apply_filters('safe_cologne_home_stats', $stats);
}

/**
 * Home page meta description
 */
function safe_cologne_home_meta_description() {
    if (is_front_page()) {
        $meta_description = get_theme_mod('safe_cologne_hero_subtitle', 'Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln');
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_home_meta_description');

/**
 * Add structured data for home page
 */
function safe_cologne_home_structured_data() {
    if (is_front_page()) {
        $company_name = get_bloginfo('name');
        $company_url = home_url();
        $company_logo = get_theme_mod('custom_logo') ? wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] : '';
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'SecurityCompany',
            'name' => $company_name,
            'url' => $company_url,
            'logo' => $company_logo,
            'description' => get_theme_mod('safe_cologne_hero_subtitle', 'Ihr zuverlässiger Partner für professionelle Sicherheitslösungen in Köln'),
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A'),
                'addressLocality' => 'Köln',
                'postalCode' => '50823',
                'addressCountry' => 'DE'
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => get_theme_mod('safe_cologne_phone', '0221 6505 8801'),
                'contactType' => 'customer service'
            ),
            'sameAs' => array(
                get_theme_mod('safe_cologne_facebook', ''),
                get_theme_mod('safe_cologne_instagram', ''),
                get_theme_mod('safe_cologne_linkedin', '')
            )
        );
        
        // Remove empty values
        $structured_data['sameAs'] = array_filter($structured_data['sameAs']);
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_home_structured_data');

/**
 * Add custom CSS for home page
 */
function safe_cologne_home_custom_css() {
    if (is_front_page()) {
        $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
        $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
        
        $custom_css = "
        .hero-section {
            background: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        }
        
        .feature-icon {
            background: linear-gradient(135deg, {$primary_color}, {$secondary_color});
        }
        
        .stat-number {
            color: {$primary_color};
        }
        
        .contact-cta {
            background: linear-gradient(135deg, {$primary_color}, {$secondary_color});
        }
        ";
        
        wp_add_inline_style('safe-cologne-home', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_home_custom_css');

/**
 * Home page specific body classes
 */
function safe_cologne_home_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
        $classes[] = 'has-hero';
        $classes[] = 'has-features';
        $classes[] = 'has-stats';
    }
    
    return $classes;
}
add_filter('body_class', 'safe_cologne_home_body_classes');