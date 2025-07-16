<?php
/**
 * Services Page Specific Functions
 * Safe Cologne Theme - Services Page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Services page specific enqueue scripts and styles
 */
function safe_cologne_services_enqueue_scripts() {
    if (is_page_template('page-templates/page-services.php') || is_page('services') || is_page('leistungen')) {
        // Enqueue services-specific CSS
        wp_enqueue_style(
            'safe-cologne-services', 
            get_template_directory_uri() . '/assets/css/pages/services.css', 
            array('safe-cologne-main'), 
            SAFE_COLOGNE_VERSION
        );
        
        // Enqueue services-specific JavaScript
        wp_enqueue_script(
            'safe-cologne-services', 
            get_template_directory_uri() . '/assets/js/pages/services.js', 
            array('jquery', 'safe-cologne-main'), 
            SAFE_COLOGNE_VERSION, 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_services_enqueue_scripts');

/**
 * Services page customizer settings
 */
function safe_cologne_services_customizer_settings($wp_customize) {
    // Services Section
    $wp_customize->add_section('safe_cologne_services', array(
        'title'    => __('Services Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 60,
    ));
    
    // Services Hero Title
    $wp_customize->add_setting('safe_cologne_services_hero_title', array(
        'default'           => 'Unsere Sicherheitslösungen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_hero_title', array(
        'label'    => __('Hero Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    // Services Hero Subtitle
    $wp_customize->add_setting('safe_cologne_services_hero_subtitle', array(
        'default'           => 'Professionelle Sicherheitsdienste für jeden Bedarf',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'textarea',
    ));
    
    // Process Title
    $wp_customize->add_setting('safe_cologne_process_title', array(
        'default'           => 'Unser Prozess',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_process_title', array(
        'label'    => __('Prozess Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    // Pricing Title
    $wp_customize->add_setting('safe_cologne_pricing_title', array(
        'default'           => 'Unsere Preise',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_pricing_title', array(
        'label'    => __('Preise Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'safe_cologne_services_customizer_settings');

/**
 * Get services data
 */
function safe_cologne_get_services() {
    $services = array(
        array(
            'id' => 'objektschutz',
            'icon' => 'fas fa-building',
            'title' => __('Objektschutz', 'safe-cologne'),
            'subtitle' => __('Sicherheit für Ihre Immobilien', 'safe-cologne'),
            'description' => __('Professioneller Schutz für Bürogebäude, Industrieanlagen und Wohnobjekte. Unsere geschulten Sicherheitskräfte sorgen für umfassende Sicherheit.', 'safe-cologne'),
            'features' => array(
                __('Zugangskontrollen', 'safe-cologne'),
                __('Rundgänge und Kontrollen', 'safe-cologne'),
                __('Empfangsdienste', 'safe-cologne'),
                __('Alarmverfolgung', 'safe-cologne'),
                __('Brandwachen', 'safe-cologne')
            ),
            'category' => 'security'
        ),
        array(
            'id' => 'veranstaltungsschutz',
            'icon' => 'fas fa-calendar-alt',
            'title' => __('Veranstaltungsschutz', 'safe-cologne'),
            'subtitle' => __('Sicherheit für Events aller Art', 'safe-cologne'),
            'description' => __('Umfassende Sicherheitslösungen für Veranstaltungen, Messen, Konzerte und private Events. Von der Planung bis zur Durchführung.', 'safe-cologne'),
            'features' => array(
                __('Einlasskontrollen', 'safe-cologne'),
                __('Ordnerdienste', 'safe-cologne'),
                __('Personenschutz', 'safe-cologne'),
                __('Absperrungen', 'safe-cologne'),
                __('Notfallmanagement', 'safe-cologne')
            ),
            'category' => 'events'
        ),
        array(
            'id' => 'revierdienst',
            'icon' => 'fas fa-car',
            'title' => __('Revierdienst', 'safe-cologne'),
            'subtitle' => __('Mobile Sicherheitspatrouillen', 'safe-cologne'),
            'description' => __('Flexible mobile Sicherheitsdienste mit regelmäßigen Kontrollfahrten. Optimal für weitläufige Objekte und Außenbereiche.', 'safe-cologne'),
            'features' => array(
                __('Kontrollfahrten', 'safe-cologne'),
                __('Alarmverfolgung', 'safe-cologne'),
                __('Schlüsseldienst', 'safe-cologne'),
                __('Interventionsdienst', 'safe-cologne'),
                __('Protokollierung', 'safe-cologne')
            ),
            'category' => 'security'
        ),
        array(
            'id' => 'sicherheitsberatung',
            'icon' => 'fas fa-lightbulb',
            'title' => __('Sicherheitsberatung', 'safe-cologne'),
            'subtitle' => __('Individuelle Sicherheitskonzepte', 'safe-cologne'),
            'description' => __('Professionelle Beratung und Entwicklung maßgeschneiderter Sicherheitskonzepte für Ihr Unternehmen oder Ihre Immobilie.', 'safe-cologne'),
            'features' => array(
                __('Risikoanalyse', 'safe-cologne'),
                __('Sicherheitskonzepte', 'safe-cologne'),
                __('Schulungen', 'safe-cologne'),
                __('Notfallpläne', 'safe-cologne'),
                __('Technische Beratung', 'safe-cologne')
            ),
            'category' => 'consulting'
        ),
        array(
            'id' => 'personenschutz',
            'icon' => 'fas fa-user-shield',
            'title' => __('Personenschutz', 'safe-cologne'),
            'subtitle' => __('Diskreter Schutz für Einzelpersonen', 'safe-cologne'),
            'description' => __('Professioneller Personenschutz für Führungskräfte, Prominente und gefährdete Personen. Diskret und effektiv.', 'safe-cologne'),
            'features' => array(
                __('Begleitschutz', 'safe-cologne'),
                __('Residenzschutz', 'safe-cologne'),
                __('Veranstaltungsbegleitung', 'safe-cologne'),
                __('Reiseschutz', 'safe-cologne'),
                __('Risikoanalyse', 'safe-cologne')
            ),
            'category' => 'security'
        ),
        array(
            'id' => 'citystreife',
            'icon' => 'fas fa-walking',
            'title' => __('City-Streife', 'safe-cologne'),
            'subtitle' => __('Sicherheit im öffentlichen Raum', 'safe-cologne'),
            'description' => __('Präventive Sicherheitsstreifen in Stadtvierteln, Einkaufszentren und öffentlichen Bereichen für mehr Sicherheitsgefühl.', 'safe-cologne'),
            'features' => array(
                __('Präventive Streifen', 'safe-cologne'),
                __('Bürgerkontakt', 'safe-cologne'),
                __('Notfallhilfe', 'safe-cologne'),
                __('Konfliktlösung', 'safe-cologne'),
                __('Berichterstattung', 'safe-cologne')
            ),
            'category' => 'security'
        )
    );
    
    return apply_filters('safe_cologne_services', $services);
}

/**
 * Get process steps
 */
function safe_cologne_get_process_steps() {
    $steps = array(
        array(
            'number' => '01',
            'title' => __('Beratung', 'safe-cologne'),
            'description' => __('Ausführliche Beratung und Analyse Ihrer Sicherheitsbedürfnisse.', 'safe-cologne')
        ),
        array(
            'number' => '02',
            'title' => __('Konzept', 'safe-cologne'),
            'description' => __('Entwicklung eines maßgeschneiderten Sicherheitskonzepts.', 'safe-cologne')
        ),
        array(
            'number' => '03',
            'title' => __('Angebot', 'safe-cologne'),
            'description' => __('Transparentes Angebot mit allen Leistungen und Kosten.', 'safe-cologne')
        ),
        array(
            'number' => '04',
            'title' => __('Umsetzung', 'safe-cologne'),
            'description' => __('Professionelle Umsetzung durch geschulte Sicherheitskräfte.', 'safe-cologne')
        ),
        array(
            'number' => '05',
            'title' => __('Betreuung', 'safe-cologne'),
            'description' => __('Kontinuierliche Betreuung und Qualitätskontrolle.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_process_steps', $steps);
}

/**
 * Get pricing plans
 */
function safe_cologne_get_pricing_plans() {
    $plans = array(
        array(
            'id' => 'basic',
            'title' => __('Basis', 'safe-cologne'),
            'price' => '€25',
            'period' => __('pro Stunde', 'safe-cologne'),
            'features' => array(
                __('Grundlegende Sicherheitsdienste', 'safe-cologne'),
                __('Geschulte Sicherheitskräfte', 'safe-cologne'),
                __('Grundausstattung', 'safe-cologne'),
                __('Telefonische Betreuung', 'safe-cologne'),
                __('Wochentags verfügbar', 'safe-cologne')
            ),
            'featured' => false
        ),
        array(
            'id' => 'professional',
            'title' => __('Professional', 'safe-cologne'),
            'price' => '€35',
            'period' => __('pro Stunde', 'safe-cologne'),
            'features' => array(
                __('Erweiterte Sicherheitsdienste', 'safe-cologne'),
                __('Speziell geschulte Kräfte', 'safe-cologne'),
                __('Vollständige Ausrüstung', 'safe-cologne'),
                __('Rund um die Uhr erreichbar', 'safe-cologne'),
                __('Wochenende verfügbar', 'safe-cologne'),
                __('Digitale Berichterstattung', 'safe-cologne')
            ),
            'featured' => true
        ),
        array(
            'id' => 'premium',
            'title' => __('Premium', 'safe-cologne'),
            'price' => '€45',
            'period' => __('pro Stunde', 'safe-cologne'),
            'features' => array(
                __('Premium Sicherheitsdienste', 'safe-cologne'),
                __('Hochqualifizierte Spezialisten', 'safe-cologne'),
                __('Modernste Ausrüstung', 'safe-cologne'),
                __('Persönlicher Ansprechpartner', 'safe-cologne'),
                __('Express-Einsätze', 'safe-cologne'),
                __('Detaillierte Analysen', 'safe-cologne'),
                __('Maßgeschneiderte Lösungen', 'safe-cologne')
            ),
            'featured' => false
        )
    );
    
    return apply_filters('safe_cologne_pricing_plans', $plans);
}

/**
 * Services page meta description
 */
function safe_cologne_services_meta_description() {
    if (is_page_template('page-templates/page-services.php') || is_page('services') || is_page('leistungen')) {
        $meta_description = get_theme_mod('safe_cologne_services_hero_subtitle', 'Professionelle Sicherheitsdienste für jeden Bedarf');
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_services_meta_description');

/**
 * Add structured data for services page
 */
function safe_cologne_services_structured_data() {
    if (is_page_template('page-templates/page-services.php') || is_page('services') || is_page('leistungen')) {
        $services = safe_cologne_get_services();
        $services_schema = array();
        
        foreach ($services as $service) {
            $services_schema[] = array(
                '@type' => 'Service',
                'name' => $service['title'],
                'description' => $service['description'],
                'provider' => array(
                    '@type' => 'Organization',
                    'name' => get_bloginfo('name')
                ),
                'areaServed' => array(
                    '@type' => 'City',
                    'name' => 'Köln'
                ),
                'serviceType' => 'SecurityService'
            );
        }
        
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => __('Sicherheitsdienste', 'safe-cologne'),
            'itemListElement' => $services_schema
        );
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_services_structured_data');

/**
 * Services page specific body classes
 */
function safe_cologne_services_body_classes($classes) {
    if (is_page_template('page-templates/page-services.php') || is_page('services') || is_page('leistungen')) {
        $classes[] = 'services-page';
        $classes[] = 'has-hero';
        $classes[] = 'has-services-grid';
        $classes[] = 'has-process';
        $classes[] = 'has-pricing';
    }
    
    return $classes;
}
add_filter('body_class', 'safe_cologne_services_body_classes');

/**
 * Custom CSS for services page
 */
function safe_cologne_services_custom_css() {
    if (is_page_template('page-templates/page-services.php') || is_page('services') || is_page('leistungen')) {
        $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
        $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
        
        $custom_css = "
        .services-hero {
            background: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        }
        
        .service-header {
            background: linear-gradient(135deg, {$primary_color}, {$secondary_color});
        }
        
        .service-cta {
            background: {$primary_color};
        }
        
        .service-cta:hover {
            background: {$secondary_color};
        }
        
        .step-number {
            background: {$primary_color};
        }
        
        .pricing-card.featured {
            border-color: {$primary_color};
        }
        
        .pricing-cta {
            background: {$primary_color};
        }
        
        .pricing-cta:hover {
            background: {$secondary_color};
        }
        ";
        
        wp_add_inline_style('safe-cologne-services', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_services_custom_css');

/**
 * Get service by ID
 */
function safe_cologne_get_service_by_id($service_id) {
    $services = safe_cologne_get_services();
    
    foreach ($services as $service) {
        if ($service['id'] === $service_id) {
            return $service;
        }
    }
    
    return null;
}

/**
 * Get services by category
 */
function safe_cologne_get_services_by_category($category) {
    $services = safe_cologne_get_services();
    $filtered_services = array();
    
    foreach ($services as $service) {
        if ($service['category'] === $category) {
            $filtered_services[] = $service;
        }
    }
    
    return $filtered_services;
}

/**
 * Get service categories
 */
function safe_cologne_get_service_categories() {
    $categories = array(
        'security' => __('Sicherheitsdienst', 'safe-cologne'),
        'events' => __('Veranstaltungen', 'safe-cologne'),
        'consulting' => __('Beratung', 'safe-cologne')
    );
    
    return apply_filters('safe_cologne_service_categories', $categories);
}