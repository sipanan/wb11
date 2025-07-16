<?php
/**
 * Theme Customizer
 *
 * @package SpecSec
 */

// Add customizer sections and settings
add_action('customize_register', 'specsec_customize_register');
function specsec_customize_register($wp_customize) {
    
    // Add SpecSec panel
    $wp_customize->add_panel('specsec_panel', array(
        'title'       => __('SpecSec Einstellungen', 'specsec'),
        'description' => __('Anpassungen für das SpecSec Theme', 'specsec'),
        'priority'    => 10,
    ));
    
    // Company Information Section
    $wp_customize->add_section('specsec_company_info', array(
        'title'    => __('Firmeninformationen', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 10,
    ));
    
    // Phone Number
    $wp_customize->add_setting('specsec_phone', array(
        'default'           => '+49 2271 98950',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_phone', array(
        'label'    => __('Telefonnummer', 'specsec'),
        'section'  => 'specsec_company_info',
        'type'     => 'text',
    ));
    
    // Company Email
    $wp_customize->add_setting('specsec_email', array(
        'default'           => 'info@specsec.de',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('specsec_email', array(
        'label'    => __('Kontakt E-Mail', 'specsec'),
        'section'  => 'specsec_company_info',
        'type'     => 'email',
    ));
    
    // Jobs Email
    $wp_customize->add_setting('specsec_jobs_email', array(
        'default'           => 'jobs@specsec.de',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('specsec_jobs_email', array(
        'label'    => __('Jobs E-Mail', 'specsec'),
        'section'  => 'specsec_company_info',
        'type'     => 'email',
    ));
    
    // Company Address
    $wp_customize->add_setting('specsec_address', array(
        'default'           => 'August-Borsig-Straße 8, 50126 Bergheim',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_address', array(
        'label'    => __('Firmenadresse', 'specsec'),
        'section'  => 'specsec_company_info',
        'type'     => 'textarea',
    ));
    
    // Hero Section
    $wp_customize->add_section('specsec_hero', array(
        'title'    => __('Hero Bereich', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 20,
    ));
    
    // Hero Title
    $wp_customize->add_setting('specsec_hero_title', array(
        'default'           => 'Werde Teil unseres Teams!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_hero_title', array(
        'label'    => __('Hero Titel', 'specsec'),
        'section'  => 'specsec_hero',
        'type'     => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('specsec_hero_subtitle', array(
        'default'           => 'Gemeinsam zum Erfolg',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'specsec'),
        'section'  => 'specsec_hero',
        'type'     => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('specsec_hero_description', array(
        'default'           => 'Professionelle Veranstaltungssicherheit und Ordnungsdienste mit über 41 Jahren Erfahrung. Wir bieten Ihnen umfassende Lösungen für Ihre Veranstaltung.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_hero_description', array(
        'label'    => __('Hero Beschreibung', 'specsec'),
        'section'  => 'specsec_hero',
        'type'     => 'textarea',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('specsec_hero_bg', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'specsec_hero_bg', array(
        'label'    => __('Hero Hintergrundbild', 'specsec'),
        'section'  => 'specsec_hero',
    )));
    
    // Statistics Section
    $wp_customize->add_section('specsec_statistics', array(
        'title'    => __('Kennzahlen', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 30,
    ));
    
    // Employees Count
    $wp_customize->add_setting('specsec_employees', array(
        'default'           => '780',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_employees', array(
        'label'    => __('Anzahl Mitarbeiter', 'specsec'),
        'section'  => 'specsec_statistics',
        'type'     => 'text',
    ));
    
    // Events Count
    $wp_customize->add_setting('specsec_events', array(
        'default'           => '2000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_events', array(
        'label'    => __('Veranstaltungen pro Jahr', 'specsec'),
        'section'  => 'specsec_statistics',
        'type'     => 'text',
    ));
    
    // Years Experience
    $wp_customize->add_setting('specsec_experience', array(
        'default'           => '41',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_experience', array(
        'label'    => __('Jahre Erfahrung', 'specsec'),
        'section'  => 'specsec_statistics',
        'type'     => 'text',
    ));
    
    // Testimonials Section
    $wp_customize->add_section('specsec_testimonials', array(
        'title'    => __('Testimonials', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 40,
    ));
    
    // Testimonial 1
    $wp_customize->add_setting('specsec_testimonial1_name', array(
        'default'           => 'Marek Lieberberg',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial1_name', array(
        'label'    => __('Testimonial 1 - Name', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_testimonial1_text', array(
        'default'           => 'Das hohe Maß an Vertrauen, das ich in die Arbeit von SpecSec habe, führt dazu, dass ich ausschließlich mit ihnen arbeite - und das seit 1990.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial1_text', array(
        'label'    => __('Testimonial 1 - Text', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'textarea',
    ));
    
    // Testimonial 2
    $wp_customize->add_setting('specsec_testimonial2_name', array(
        'default'           => 'Herbert Grönemeyer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial2_name', array(
        'label'    => __('Testimonial 2 - Name', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_testimonial2_text', array(
        'default'           => 'Ich hatte sofort das Gefühl, dass meine Sicherheit in guten Händen ist. Professionell und menschlich zugleich.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial2_text', array(
        'label'    => __('Testimonial 2 - Text', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'textarea',
    ));
    
    // Testimonial 3
    $wp_customize->add_setting('specsec_testimonial3_name', array(
        'default'           => 'Luciano Pavarotti',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial3_name', array(
        'label'    => __('Testimonial 3 - Name', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_testimonial3_text', array(
        'default'           => 'Exzellente Arbeit und höchste Professionalität. Ich fühle mich sicher und gut betreut.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_testimonial3_text', array(
        'label'    => __('Testimonial 3 - Text', 'specsec'),
        'section'  => 'specsec_testimonials',
        'type'     => 'textarea',
    ));
    
    // Services Section
    $wp_customize->add_section('specsec_services', array(
        'title'    => __('Leistungen', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 50,
    ));
    
    // VSD Service
    $wp_customize->add_setting('specsec_vsd_title', array(
        'default'           => 'Veranstaltungssicherheitsdienste (VSD)',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_vsd_title', array(
        'label'    => __('VSD Titel', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_vsd_description', array(
        'default'           => 'Risikoanalyse, Personal-Konzepte und reibungslose Abläufe für Ihre Veranstaltung.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_vsd_description', array(
        'label'    => __('VSD Beschreibung', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'textarea',
    ));
    
    // VOD Service
    $wp_customize->add_setting('specsec_vod_title', array(
        'default'           => 'Veranstaltungsordnungsdienste (VOD)',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_vod_title', array(
        'label'    => __('VOD Titel', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_vod_description', array(
        'default'           => 'Besucherservice, Engagement und professionelles Crowd Management.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_vod_description', array(
        'label'    => __('VOD Beschreibung', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'textarea',
    ));
    
    // Projektierung Service
    $wp_customize->add_setting('specsec_projektierung_title', array(
        'default'           => 'Projektierung',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_projektierung_title', array(
        'label'    => __('Projektierung Titel', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('specsec_projektierung_description', array(
        'default'           => 'Anforderungsanalyse, Flächenplanung und maßgeschneiderte Personalkonzepte.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_projektierung_description', array(
        'label'    => __('Projektierung Beschreibung', 'specsec'),
        'section'  => 'specsec_services',
        'type'     => 'textarea',
    ));
    
    // Footer Section
    $wp_customize->add_section('specsec_footer', array(
        'title'    => __('Footer', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 60,
    ));
    
    // Footer Text
    $wp_customize->add_setting('specsec_footer_text', array(
        'default'           => 'Professionelle Veranstaltungssicherheit seit 1983. Mitglied im Bundesverband der Sicherheitswirtschaft.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('specsec_footer_text', array(
        'label'    => __('Footer Text', 'specsec'),
        'section'  => 'specsec_footer',
        'type'     => 'textarea',
    ));
    
    // Certifications
    $wp_customize->add_setting('specsec_certifications', array(
        'default'           => 'ISO 9001 | DIN 77200-1 zertifiziert',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('specsec_certifications', array(
        'label'    => __('Zertifikate', 'specsec'),
        'section'  => 'specsec_footer',
        'type'     => 'text',
    ));
    
    // Colors Section
    $wp_customize->add_section('specsec_colors', array(
        'title'    => __('Farben', 'specsec'),
        'panel'    => 'specsec_panel',
        'priority' => 70,
    ));
    
    // Primary Color (Gold)
    $wp_customize->add_setting('specsec_primary_color', array(
        'default'           => '#B8860B',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'specsec_primary_color', array(
        'label'    => __('Primärfarbe (Gold)', 'specsec'),
        'section'  => 'specsec_colors',
    )));
    
    // Secondary Color (Brown)
    $wp_customize->add_setting('specsec_secondary_color', array(
        'default'           => '#8B4513',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'specsec_secondary_color', array(
        'label'    => __('Sekundärfarbe (Braun)', 'specsec'),
        'section'  => 'specsec_colors',
    )));
    
    // Accent Color (Dark)
    $wp_customize->add_setting('specsec_accent_color', array(
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'specsec_accent_color', array(
        'label'    => __('Akzentfarbe (Dunkel)', 'specsec'),
        'section'  => 'specsec_colors',
    )));
}

// Output custom CSS
add_action('wp_head', 'specsec_customizer_css');
function specsec_customizer_css() {
    $primary_color = get_theme_mod('specsec_primary_color', '#B8860B');
    $secondary_color = get_theme_mod('specsec_secondary_color', '#8B4513');
    $accent_color = get_theme_mod('specsec_accent_color', '#1a1a1a');
    ?>
    <style type="text/css">
        :root {
            --primary-gold: <?php echo esc_attr($primary_color); ?>;
            --secondary-brown: <?php echo esc_attr($secondary_color); ?>;
            --accent-dark: <?php echo esc_attr($accent_color); ?>;
        }
    </style>
    <?php
}

// Helper functions for customizer values
function specsec_get_customizer_option($option, $default = '') {
    return get_theme_mod($option, $default);
}
