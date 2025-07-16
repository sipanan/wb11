<?php
/**
 * Legal Pages Specific Functions
 * Safe Cologne Theme - Legal Pages
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Legal pages specific enqueue scripts and styles
 */
function safe_cologne_legal_enqueue_scripts() {
    if (is_page_template('page-templates/page-privacy.php') || is_page_template('page-templates/page-imprint.php') || is_page('privacy') || is_page('imprint') || is_page('datenschutz') || is_page('impressum')) {
        // Enqueue legal-specific CSS (already done in main functions.php)
        
        // Enqueue legal-specific JavaScript
        wp_enqueue_script(
            'safe-cologne-legal', 
            get_template_directory_uri() . '/assets/js/pages/legal.js', 
            array('jquery', 'safe-cologne-main'), 
            SAFE_COLOGNE_VERSION, 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_legal_enqueue_scripts');

/**
 * Legal pages customizer settings
 */
function safe_cologne_legal_customizer_settings($wp_customize) {
    // Legal Section
    $wp_customize->add_section('safe_cologne_legal', array(
        'title'    => __('Rechtliche Seiten', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 80,
    ));
    
    // Company Legal Name
    $wp_customize->add_setting('safe_cologne_legal_name', array(
        'default'           => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_legal_name', array(
        'label'    => __('Vollständiger Firmenname', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'text',
    ));
    
    // Managing Director
    $wp_customize->add_setting('safe_cologne_managing_director', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_managing_director', array(
        'label'    => __('Geschäftsführer', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'text',
    ));
    
    // Commercial Register
    $wp_customize->add_setting('safe_cologne_commercial_register', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_commercial_register', array(
        'label'    => __('Handelsregister', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'text',
    ));
    
    // VAT Number
    $wp_customize->add_setting('safe_cologne_vat_number', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_vat_number', array(
        'label'    => __('Umsatzsteuer-ID', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'text',
    ));
    
    // Professional Liability Insurance
    $wp_customize->add_setting('safe_cologne_insurance', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_insurance', array(
        'label'    => __('Berufshaftpflichtversicherung', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'textarea',
    ));
    
    // Supervisory Authority
    $wp_customize->add_setting('safe_cologne_supervisory_authority', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_supervisory_authority', array(
        'label'    => __('Aufsichtsbehörde', 'safe-cologne'),
        'section'  => 'safe_cologne_legal',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'safe_cologne_legal_customizer_settings');

/**
 * Get legal company information
 */
function safe_cologne_get_legal_company_info() {
    $company_info = array(
        'name' => get_theme_mod('safe_cologne_legal_name', get_bloginfo('name')),
        'address' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln'),
        'phone' => get_theme_mod('safe_cologne_phone', '0221 6505 8801'),
        'email' => get_theme_mod('safe_cologne_email', 'info@safecologne.de'),
        'managing_director' => get_theme_mod('safe_cologne_managing_director', ''),
        'commercial_register' => get_theme_mod('safe_cologne_commercial_register', ''),
        'vat_number' => get_theme_mod('safe_cologne_vat_number', ''),
        'insurance' => get_theme_mod('safe_cologne_insurance', ''),
        'supervisory_authority' => get_theme_mod('safe_cologne_supervisory_authority', ''),
    );
    
    return apply_filters('safe_cologne_legal_company_info', $company_info);
}

/**
 * Legal pages meta description
 */
function safe_cologne_legal_meta_description() {
    if (is_page_template('page-templates/page-privacy.php') || is_page('privacy') || is_page('datenschutz')) {
        echo '<meta name="description" content="' . esc_attr(__('Datenschutzerklärung für Safe Cologne - Informationen über die Erhebung und Verarbeitung personenbezogener Daten', 'safe-cologne')) . '">' . "\n";
    }
    
    if (is_page_template('page-templates/page-imprint.php') || is_page('imprint') || is_page('impressum')) {
        echo '<meta name="description" content="' . esc_attr(__('Impressum von Safe Cologne - Angaben gemäß § 5 TMG', 'safe-cologne')) . '">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_legal_meta_description');

/**
 * Legal pages specific body classes
 */
function safe_cologne_legal_body_classes($classes) {
    if (is_page_template('page-templates/page-privacy.php') || is_page('privacy') || is_page('datenschutz')) {
        $classes[] = 'legal-page';
        $classes[] = 'privacy-page';
        $classes[] = 'has-toc';
    }
    
    if (is_page_template('page-templates/page-imprint.php') || is_page('imprint') || is_page('impressum')) {
        $classes[] = 'legal-page';
        $classes[] = 'imprint-page';
        $classes[] = 'has-contact-info';
    }
    
    return $classes;
}
add_filter('body_class', 'safe_cologne_legal_body_classes');

/**
 * Add robots noindex for legal pages
 */
function safe_cologne_legal_robots_meta() {
    if (is_page_template('page-templates/page-privacy.php') || is_page_template('page-templates/page-imprint.php') || is_page('privacy') || is_page('imprint') || is_page('datenschutz') || is_page('impressum')) {
        echo '<meta name="robots" content="noindex, nofollow">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_legal_robots_meta');

/**
 * Custom CSS for legal pages
 */
function safe_cologne_legal_custom_css() {
    if (is_page_template('page-templates/page-privacy.php') || is_page_template('page-templates/page-imprint.php') || is_page('privacy') || is_page('imprint') || is_page('datenschutz') || is_page('impressum')) {
        $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
        $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
        
        $custom_css = "
        .legal-hero {
            background: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        }
        
        .legal-toc {
            border-left-color: {$primary_color};
        }
        
        .legal-contact-box {
            border-left-color: {$primary_color};
        }
        
        .legal-notice {
            border-color: {$primary_color}33;
            background: {$primary_color}0d;
        }
        
        .legal-notice h4 {
            color: {$primary_color};
        }
        
        .legal-content h2 {
            border-bottom-color: {$primary_color};
        }
        
        .legal-toc a:hover,
        .legal-toc a.active {
            color: {$primary_color};
        }
        
        .back-to-top {
            background: {$primary_color};
        }
        
        .back-to-top:hover {
            background: {$secondary_color};
        }
        ";
        
        wp_add_inline_style('safe-cologne-legal', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_legal_custom_css');

/**
 * Generate legal page structured data
 */
function safe_cologne_legal_structured_data() {
    if (is_page_template('page-templates/page-privacy.php') || is_page('privacy') || is_page('datenschutz')) {
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'PrivacyPolicy',
            'name' => get_the_title() . ' - ' . get_bloginfo('name'),
            'url' => get_permalink(),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'url' => home_url()
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
    
    if (is_page_template('page-templates/page-imprint.php') || is_page('imprint') || is_page('impressum')) {
        $company_info = safe_cologne_get_legal_company_info();
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $company_info['name'],
            'url' => home_url(),
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $company_info['address'],
                'addressLocality' => 'Köln',
                'postalCode' => '50823',
                'addressCountry' => 'DE'
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => $company_info['phone'],
                'email' => $company_info['email'],
                'contactType' => 'customer service'
            )
        );
        
        if ($company_info['vat_number']) {
            $structured_data['vatID'] = $company_info['vat_number'];
        }
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_legal_structured_data');

/**
 * Legal page breadcrumbs
 */
function safe_cologne_legal_breadcrumbs() {
    if (is_page_template('page-templates/page-privacy.php') || is_page_template('page-templates/page-imprint.php') || is_page('privacy') || is_page('imprint') || is_page('datenschutz') || is_page('impressum')) {
        $breadcrumbs = array(
            array(
                'title' => __('Startseite', 'safe-cologne'),
                'url' => home_url('/')
            ),
            array(
                'title' => get_the_title(),
                'url' => get_permalink()
            )
        );
        
        return apply_filters('safe_cologne_legal_breadcrumbs', $breadcrumbs);
    }
    
    return array();
}

/**
 * Legal disclaimer text
 */
function safe_cologne_get_legal_disclaimer() {
    $disclaimer = array(
        'liability' => __('Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen.', 'safe-cologne'),
        'links' => __('Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen.', 'safe-cologne'),
        'copyright' => __('Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht.', 'safe-cologne')
    );
    
    return apply_filters('safe_cologne_legal_disclaimer', $disclaimer);
}

/**
 * Get GDPR compliance information
 */
function safe_cologne_get_gdpr_info() {
    $gdpr_info = array(
        'data_protection_officer' => get_theme_mod('safe_cologne_data_protection_officer', ''),
        'data_retention_period' => get_theme_mod('safe_cologne_data_retention_period', ''),
        'cookie_policy' => get_theme_mod('safe_cologne_cookie_policy', ''),
        'third_party_services' => get_theme_mod('safe_cologne_third_party_services', ''),
        'user_rights' => array(
            'access' => __('Recht auf Auskunft', 'safe-cologne'),
            'rectification' => __('Recht auf Berichtigung', 'safe-cologne'),
            'erasure' => __('Recht auf Löschung', 'safe-cologne'),
            'restriction' => __('Recht auf Einschränkung', 'safe-cologne'),
            'portability' => __('Recht auf Datenübertragbarkeit', 'safe-cologne'),
            'objection' => __('Recht auf Widerspruch', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_gdpr_info', $gdpr_info);
}