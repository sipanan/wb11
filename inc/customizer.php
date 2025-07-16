<?php
/**
 * Theme Customizer
 *
 * @package Safe_Cologne
 */

// Add customizer sections and settings
add_action('customize_register', 'safe_cologne_customize_register');
function safe_cologne_customize_register($wp_customize) {
    
    // Add Safe Cologne panel
    $wp_customize->add_panel('safe_cologne_panel', array(
        'title'       => __('Safe Cologne Einstellungen', 'safe-cologne'),
        'description' => __('Anpassungen für das Safe Cologne Theme', 'safe-cologne'),
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
        'default'           => '#B20510',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_secondary_color', array(
        'label'    => __('Sekundärfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Typography Section
    $wp_customize->add_section('safe_cologne_typography', array(
        'title'    => __('Typografie', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 55,
    ));
    
    // Body Font
    $wp_customize->add_setting('safe_cologne_body_font', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_body_font', array(
        'label'    => __('Hauptschrift', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins'
        ),
    ));
    
    // Heading Font
    $wp_customize->add_setting('safe_cologne_heading_font', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_heading_font', array(
        'label'    => __('Überschriften-Schrift', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Lato' => 'Lato',
            'Poppins' => 'Poppins'
        ),
    ));
    
    // Layout Section
    $wp_customize->add_section('safe_cologne_layout', array(
        'title'    => __('Layout', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 60,
    ));
    
    // Container Width
    $wp_customize->add_setting('safe_cologne_container_width', array(
        'default'           => '1200',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_container_width', array(
        'label'    => __('Container Breite (px)', 'safe-cologne'),
        'section'  => 'safe_cologne_layout',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 800,
            'max' => 1800,
            'step' => 50,
        ),
    ));
    
    // Border Radius
    $wp_customize->add_setting('safe_cologne_border_radius', array(
        'default'           => '12',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_border_radius', array(
        'label'    => __('Border Radius (px)', 'safe-cologne'),
        'section'  => 'safe_cologne_layout',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));
}

// Output custom CSS
add_action('wp_head', 'safe_cologne_customizer_css');
function safe_cologne_customizer_css() {
    $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
    $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
    $body_font = get_theme_mod('safe_cologne_body_font', 'Inter');
    $heading_font = get_theme_mod('safe_cologne_heading_font', 'Inter');
    $container_width = get_theme_mod('safe_cologne_container_width', '1200');
    $border_radius = get_theme_mod('safe_cologne_border_radius', '12');
    ?>
    <style type="text/css">
        :root {
            --primary-red: <?php echo esc_attr($primary_color); ?>;
            --dark-red: <?php echo esc_attr($secondary_color); ?>;
            --light-red: <?php echo esc_attr($primary_color); ?>33;
            --radius-md: <?php echo esc_attr($border_radius); ?>px;
            --radius-sm: <?php echo esc_attr($border_radius / 2); ?>px;
            --radius-lg: <?php echo esc_attr($border_radius * 1.5); ?>px;
        }
        
        .container {
            max-width: <?php echo esc_attr($container_width); ?>px;
        }
        
        body {
            font-family: '<?php echo esc_attr($body_font); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: '<?php echo esc_attr($heading_font); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .hero-section,
        .about-hero,
        .services-hero,
        .contact-hero {
            background: linear-gradient(135deg, <?php echo esc_attr($primary_color); ?> 0%, <?php echo esc_attr($secondary_color); ?> 100%);
        }
        
        .feature-icon,
        .value-icon,
        .service-header {
            background: linear-gradient(135deg, <?php echo esc_attr($primary_color); ?>, <?php echo esc_attr($secondary_color); ?>);
        }
        
        .contact-cta,
        .emergency-contact {
            background: linear-gradient(135deg, <?php echo esc_attr($primary_color); ?>, <?php echo esc_attr($secondary_color); ?>);
        }
        
        .service-cta,
        .form-submit,
        .modal-cta,
        .pricing-cta {
            background: <?php echo esc_attr($primary_color); ?>;
        }
        
        .service-cta:hover,
        .form-submit:hover,
        .modal-cta:hover,
        .pricing-cta:hover {
            background: <?php echo esc_attr($secondary_color); ?>;
        }
        
        .stat-number {
            color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .timeline-date,
        .step-number,
        .certification-icon,
        .contact-icon {
            background: <?php echo esc_attr($primary_color); ?>;
        }
        
        .timeline::before {
            background: <?php echo esc_attr($primary_color); ?>;
        }
        
        .pricing-card.featured {
            border-color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: <?php echo esc_attr($primary_color); ?>;
            box-shadow: 0 0 0 3px <?php echo esc_attr($primary_color); ?>1a;
        }
        
        .hours-item.current-day {
            border-left-color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .map-placeholder i {
            color: <?php echo esc_attr($primary_color); ?>;
        }
        
        .service-filter.active,
        .service-filter:hover {
            background: <?php echo esc_attr($primary_color); ?>;
            border-color: <?php echo esc_attr($primary_color); ?>;
        }
    </style>
    <?php
}
