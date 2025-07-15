<?php
/**
 * Enhanced Theme Customizer
 *
 * @package Safe_Cologne
 */

// Add customizer sections and settings
add_action('customize_register', 'safe_cologne_customize_register');
function safe_cologne_customize_register($wp_customize) {
    
    // Add Safe Cologne panel
    $wp_customize->add_panel('safe_cologne_panel', array(
        'title'       => __('Safe Cologne Einstellungen', 'safe-cologne'),
        'description' => __('Vollständige Anpassungen für das Safe Cologne Theme', 'safe-cologne'),
        'priority'    => 10,
    ));
    
    // Company Information Section
    $wp_customize->add_section('safe_cologne_company_info', array(
        'title'    => __('Firmeninformationen', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 10,
    ));
    
    // Emergency Phone Number
    $wp_customize->add_setting('safe_cologne_emergency_phone', array(
        'default'           => '0221 65058801',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_emergency_phone', array(
        'label'    => __('24/7 Notfallnummer', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'text',
    ));
    
    // WhatsApp Number
    $wp_customize->add_setting('safe_cologne_whatsapp', array(
        'default'           => '+49 170 1234567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_whatsapp', array(
        'label'    => __('WhatsApp Nummer', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'text',
    ));
    
    // Company Email
    $wp_customize->add_setting('safe_cologne_email', array(
        'default'           => 'info@safecologne.de',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('safe_cologne_email', array(
        'label'    => __('Kontakt E-Mail', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'email',
    ));
    
    // Company Address
    $wp_customize->add_setting('safe_cologne_address', array(
        'default'           => 'Subbelrather Str. 15A, 50823 Köln',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_address', array(
        'label'    => __('Firmenadresse', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'textarea',
    ));
    
        // Hero Section
    $wp_customize->add_section('safe_cologne_hero', array(
        'title'    => __('Hero Bereich', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 20,
    ));
    
    // Hero Title
    $wp_customize->add_setting('safe_cologne_hero_title', array(
        'default'           => 'Safe Cologne',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_title', array(
        'label'    => __('Hero Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('safe_cologne_hero_subtitle', array(
        'default'           => 'Ihr Sicherheitsdienst mit Herz & System',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('safe_cologne_hero_description', array(
        'default'           => 'Sicherheit beginnt mit Vertrauen. Bei Safe Cologne steht Ihre Sicherheit an erster Stelle – zuverlässig, empathisch und professionell.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_description', array(
        'label'    => __('Hero Beschreibung', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'textarea',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('safe_cologne_hero_bg', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'safe_cologne_hero_bg', array(
        'label'    => __('Hero Hintergrundbild', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
    )));
    
    // Social Media Section
    $wp_customize->add_section('safe_cologne_social', array(
        'title'    => __('Social Media', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 30,
    ));
    
    // Instagram
    $wp_customize->add_setting('safe_cologne_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_instagram', array(
        'label'    => __('Instagram URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // Facebook
    $wp_customize->add_setting('safe_cologne_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_facebook', array(
        'label'    => __('Facebook URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // LinkedIn
    $wp_customize->add_setting('safe_cologne_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_linkedin', array(
        'label'    => __('LinkedIn URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // Footer Section
    $wp_customize->add_section('safe_cologne_footer', array(
        'title'    => __('Footer', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 40,
    ));
    
    // Footer Text
    $wp_customize->add_setting('safe_cologne_footer_text', array(
        'default'           => 'Ihr Sicherheitsdienst mit Herz & System. Verlässlich. Vorausschauend. Menschlich.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_footer_text', array(
        'label'    => __('Footer Text', 'safe-cologne'),
        'section'  => 'safe_cologne_footer',
        'type'     => 'textarea',
    ));
    
    // Colors Section
    $wp_customize->add_section('safe_cologne_colors', array(
        'title'    => __('Farben', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 50,
    ));
    
    // Primary Color
    $wp_customize->add_setting('safe_cologne_primary_color', array(
        'default'           => '#E30613',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_primary_color', array(
        'label'    => __('Primärfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('safe_cologne_secondary_color', array(
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_secondary_color', array(
        'label'    => __('Sekundärfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Accent Color
    $wp_customize->add_setting('safe_cologne_accent_color', array(
        'default'           => '#0066CC',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_accent_color', array(
        'label'    => __('Akzentfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Success Color
    $wp_customize->add_setting('safe_cologne_success_color', array(
        'default'           => '#28a745',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_success_color', array(
        'label'    => __('Erfolgsfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Typography Section
    $wp_customize->add_section('safe_cologne_typography', array(
        'title'    => __('Typography', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 60,
    ));
    
    // Google Fonts
    $wp_customize->add_setting('safe_cologne_font_headings', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_font_headings', array(
        'label'    => __('Schriftart Überschriften', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins',
            'Montserrat' => 'Montserrat',
        ),
    ));
    
    $wp_customize->add_setting('safe_cologne_font_body', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_font_body', array(
        'label'    => __('Schriftart Fließtext', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Source Sans Pro' => 'Source Sans Pro',
        ),
    ));
    
    // Layout Section
    $wp_customize->add_section('safe_cologne_layout', array(
        'title'    => __('Layout', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 70,
    ));
    
    // Container Width
    $wp_customize->add_setting('safe_cologne_container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_container_width', array(
        'label'       => __('Container Breite (px)', 'safe-cologne'),
        'section'     => 'safe_cologne_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 960,
            'max'  => 1920,
            'step' => 20,
        ),
    ));
    
    // Header Height
    $wp_customize->add_setting('safe_cologne_header_height', array(
        'default'           => '80',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_header_height', array(
        'label'       => __('Header Höhe (px)', 'safe-cologne'),
        'section'     => 'safe_cologne_layout',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 60,
            'max'  => 120,
            'step' => 5,
        ),
    ));
    
    // Homepage Customization
    $wp_customize->add_section('safe_cologne_homepage', array(
        'title'    => __('Homepage', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 80,
    ));
    
    // Show Hero Section
    $wp_customize->add_setting('safe_cologne_show_hero', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_show_hero', array(
        'label'    => __('Hero Bereich anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'checkbox',
    ));
    
    // Show Services Section
    $wp_customize->add_setting('safe_cologne_show_services', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_show_services', array(
        'label'    => __('Services Bereich anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'checkbox',
    ));
    
    // Show Testimonials Section
    $wp_customize->add_setting('safe_cologne_show_testimonials', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_show_testimonials', array(
        'label'    => __('Testimonials Bereich anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'checkbox',
    ));
    
    // Services Page Customization
    $wp_customize->add_section('safe_cologne_services_page', array(
        'title'    => __('Services Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 90,
    ));
    
    // Services Page Header
    $wp_customize->add_setting('safe_cologne_services_header_text', array(
        'default'           => 'Unsere Sicherheitsdienstleistungen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_header_text', array(
        'label'    => __('Header Text', 'safe-cologne'),
        'section'  => 'safe_cologne_services_page',
        'type'     => 'text',
    ));
    
    // Services Layout
    $wp_customize->add_setting('safe_cologne_services_layout', array(
        'default'           => 'grid',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_layout', array(
        'label'    => __('Layout', 'safe-cologne'),
        'section'  => 'safe_cologne_services_page',
        'type'     => 'select',
        'choices'  => array(
            'grid' => __('Grid Layout', 'safe-cologne'),
            'list' => __('Listen Layout', 'safe-cologne'),
            'cards' => __('Karten Layout', 'safe-cologne'),
        ),
    ));
    
    // Contact Page Customization
    $wp_customize->add_section('safe_cologne_contact_page', array(
        'title'    => __('Kontakt Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 100,
    ));
    
    // Contact Form Title
    $wp_customize->add_setting('safe_cologne_contact_form_title', array(
        'default'           => 'Kontaktieren Sie uns',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_contact_form_title', array(
        'label'    => __('Formular Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_contact_page',
        'type'     => 'text',
    ));
    
    // Show Map
    $wp_customize->add_setting('safe_cologne_show_map', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_show_map', array(
        'label'    => __('Karte anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_contact_page',
        'type'     => 'checkbox',
    ));
    
    // Careers Page Customization
    $wp_customize->add_section('safe_cologne_careers_page', array(
        'title'    => __('Karriere Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 110,
    ));
    
    // Careers Hero Text
    $wp_customize->add_setting('safe_cologne_careers_hero_text', array(
        'default'           => 'Ihre Karriere bei SafeCologne',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_careers_hero_text', array(
        'label'    => __('Hero Text', 'safe-cologne'),
        'section'  => 'safe_cologne_careers_page',
        'type'     => 'text',
    ));
    
    // Show Benefits Section
    $wp_customize->add_setting('safe_cologne_show_benefits', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_show_benefits', array(
        'label'    => __('Benefits Bereich anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_careers_page',
        'type'     => 'checkbox',
    ));
    
    // Performance Section
    $wp_customize->add_section('safe_cologne_performance', array(
        'title'    => __('Performance', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 120,
    ));
    
    // Enable Lazy Loading
    $wp_customize->add_setting('safe_cologne_lazy_loading', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_lazy_loading', array(
        'label'    => __('Lazy Loading aktivieren', 'safe-cologne'),
        'section'  => 'safe_cologne_performance',
        'type'     => 'checkbox',
    ));
    
    // Enable CSS Minification
    $wp_customize->add_setting('safe_cologne_css_minification', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_css_minification', array(
        'label'    => __('CSS Minification aktivieren', 'safe-cologne'),
        'section'  => 'safe_cologne_performance',
        'type'     => 'checkbox',
    ));
    
    // Enable JS Minification
    $wp_customize->add_setting('safe_cologne_js_minification', array(
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_js_minification', array(
        'label'    => __('JS Minification aktivieren', 'safe-cologne'),
        'section'  => 'safe_cologne_performance',
        'type'     => 'checkbox',
    ));
}

// Output custom CSS
add_action('wp_head', 'safe_cologne_customizer_css');
function safe_cologne_customizer_css() {
    $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
    $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#1a1a1a');
    $accent_color = get_theme_mod('safe_cologne_accent_color', '#0066CC');
    $success_color = get_theme_mod('safe_cologne_success_color', '#28a745');
    $font_headings = get_theme_mod('safe_cologne_font_headings', 'Inter');
    $font_body = get_theme_mod('safe_cologne_font_body', 'Inter');
    $container_width = get_theme_mod('safe_cologne_container_width', '1200');
    $header_height = get_theme_mod('safe_cologne_header_height', '80');
    ?>
    <style type="text/css">
        :root {
            --primary-red: <?php echo esc_attr($primary_color); ?>;
            --dark-gray: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --success-color: <?php echo esc_attr($success_color); ?>;
            --font-headings: '<?php echo esc_attr($font_headings); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-body: '<?php echo esc_attr($font_body); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --container-width: <?php echo esc_attr($container_width); ?>px;
            --header-height: <?php echo esc_attr($header_height); ?>px;
        }
        
        body {
            font-family: var(--font-body);
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-headings);
        }
        
        .container {
            max-width: var(--container-width);
        }
        
        .site-header {
            height: var(--header-height);
        }
        
        .btn-primary {
            background-color: var(--primary-red);
            border-color: var(--primary-red);
        }
        
        .btn-primary:hover {
            background-color: var(--dark-gray);
            border-color: var(--dark-gray);
        }
        
        .btn-accent {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .text-primary {
            color: var(--primary-red) !important;
        }
        
        .text-accent {
            color: var(--accent-color) !important;
        }
        
        .bg-primary {
            background-color: var(--primary-red) !important;
        }
        
        .bg-accent {
            background-color: var(--accent-color) !important;
        }
        
        .border-primary {
            border-color: var(--primary-red) !important;
        }
    </style>
    <?php
}

// Load Google Fonts based on customizer settings
add_action('wp_enqueue_scripts', 'safe_cologne_load_custom_fonts');
function safe_cologne_load_custom_fonts() {
    $font_headings = get_theme_mod('safe_cologne_font_headings', 'Inter');
    $font_body = get_theme_mod('safe_cologne_font_body', 'Inter');
    
    $fonts = array_unique(array($font_headings, $font_body));
    $font_families = array();
    
    foreach ($fonts as $font) {
        switch ($font) {
            case 'Inter':
                $font_families[] = 'Inter:300,400,500,600,700,800,900';
                break;
            case 'Roboto':
                $font_families[] = 'Roboto:300,400,500,700,900';
                break;
            case 'Open Sans':
                $font_families[] = 'Open+Sans:300,400,500,600,700,800';
                break;
            case 'Lato':
                $font_families[] = 'Lato:300,400,700,900';
                break;
            case 'Poppins':
                $font_families[] = 'Poppins:300,400,500,600,700,800,900';
                break;
            case 'Montserrat':
                $font_families[] = 'Montserrat:300,400,500,600,700,800,900';
                break;
            case 'Source Sans Pro':
                $font_families[] = 'Source+Sans+Pro:300,400,600,700,900';
                break;
        }
    }
    
    if (!empty($font_families)) {
        $font_url = 'https://fonts.googleapis.com/css2?family=' . implode('&family=', $font_families) . '&display=swap';
        wp_enqueue_style('safe-cologne-google-fonts', $font_url, array(), null);
    }
}

// Add conditional page-specific CSS and JS loading
add_action('wp_enqueue_scripts', 'safe_cologne_conditional_assets');
function safe_cologne_conditional_assets() {
    // Get current page template
    $template = get_page_template_slug();
    
    // Load page-specific CSS
    if ($template === 'page-templates/page-services.php') {
        wp_enqueue_style('safe-cologne-services', SAFE_COLOGNE_URI . '/assets/css/pages/services.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
        wp_enqueue_script('safe-cologne-services-js', SAFE_COLOGNE_URI . '/assets/js/pages/services.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    }
    
    if ($template === 'page-templates/page-contact.php') {
        wp_enqueue_style('safe-cologne-contact', SAFE_COLOGNE_URI . '/assets/css/pages/contact.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
        wp_enqueue_script('safe-cologne-contact-js', SAFE_COLOGNE_URI . '/assets/js/pages/contact.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    }
    
    if ($template === 'page-templates/page-jobportal.php') {
        wp_enqueue_style('safe-cologne-careers', SAFE_COLOGNE_URI . '/assets/css/pages/careers.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
        wp_enqueue_script('safe-cologne-careers-js', SAFE_COLOGNE_URI . '/assets/js/pages/careers.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    }
    
    if (is_front_page()) {
        wp_enqueue_style('safe-cologne-homepage', SAFE_COLOGNE_URI . '/assets/css/pages/homepage.css', array('safe-cologne-main'), SAFE_COLOGNE_VERSION);
        wp_enqueue_script('safe-cologne-homepage-js', SAFE_COLOGNE_URI . '/assets/js/pages/homepage.js', array('jquery'), SAFE_COLOGNE_VERSION, true);
    }
}

// Add theme support for custom editor styles
add_action('after_setup_theme', 'safe_cologne_add_editor_styles');
function safe_cologne_add_editor_styles() {
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
}

// Helper function to get customizer setting with fallback
function safe_cologne_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}
