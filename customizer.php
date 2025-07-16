<?php
/**
 * Comprehensive WordPress Customizer Integration
 * Safe Cologne Security Services
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer sections and settings
 */
add_action('customize_register', 'safe_cologne_customize_register');
function safe_cologne_customize_register($wp_customize) {
    
    // Add Safe Cologne panel
    $wp_customize->add_panel('safe_cologne_panel', array(
        'title'       => __('Safe Cologne Settings', 'safe-cologne'),
        'description' => __('Comprehensive customization options for Safe Cologne Security Services', 'safe-cologne'),
        'priority'    => 10,
    ));
    
    // ==============================================
    // Company Information Section
    // ==============================================
    $wp_customize->add_section('safe_cologne_company_info', array(
        'title'    => __('Company Information', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 10,
    ));
    
    // Company Name
    $wp_customize->add_setting('safe_cologne_company_name', array(
        'default'           => 'Safe Cologne Security Services',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_company_name', array(
        'label'    => __('Company Name', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'text',
    ));
    
    // Company Tagline
    $wp_customize->add_setting('safe_cologne_company_tagline', array(
        'default'           => 'Sicherheitsdienst mit Herz & System',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_company_tagline', array(
        'label'    => __('Company Tagline', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'text',
    ));
    
    // Company Description
    $wp_customize->add_setting('safe_cologne_company_description', array(
        'default'           => 'Professioneller Sicherheitsdienst in Köln und Umgebung. Wir bieten umfassende Sicherheitslösungen für Unternehmen und Privatpersonen.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_company_description', array(
        'label'    => __('Company Description', 'safe-cologne'),
        'section'  => 'safe_cologne_company_info',
        'type'     => 'textarea',
    ));
    
    // ==============================================
    // Contact Information Section
    // ==============================================
    $wp_customize->add_section('safe_cologne_contact_info', array(
        'title'    => __('Contact Information', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 20,
    ));
    
    // Phone Number
    $wp_customize->add_setting('safe_cologne_phone', array(
        'default'           => '0221 6505 8801',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_phone', array(
        'label'    => __('Phone Number', 'safe-cologne'),
        'section'  => 'safe_cologne_contact_info',
        'type'     => 'text',
    ));
    
    // Email Address
    $wp_customize->add_setting('safe_cologne_email', array(
        'default'           => 'info@safecologne.de',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('safe_cologne_email', array(
        'label'    => __('Email Address', 'safe-cologne'),
        'section'  => 'safe_cologne_contact_info',
        'type'     => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('safe_cologne_address', array(
        'default'           => 'Musterstraße 123, 50667 Köln',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_address', array(
        'label'    => __('Address', 'safe-cologne'),
        'section'  => 'safe_cologne_contact_info',
        'type'     => 'textarea',
    ));
    
    // ==============================================
    // Hero Section
    // ==============================================
    $wp_customize->add_section('safe_cologne_hero', array(
        'title'    => __('Hero Section', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 30,
    ));
    
    // Hero Title
    $wp_customize->add_setting('safe_cologne_hero_title', array(
        'default'           => 'Professioneller Sicherheitsdienst in Köln',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_title', array(
        'label'    => __('Hero Title', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('safe_cologne_hero_subtitle', array(
        'default'           => 'Vertrauen Sie auf unsere Erfahrung und Kompetenz für Ihre Sicherheit. Wir sind für Sie da.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'textarea',
    ));
    
    // Hero CTA Text
    $wp_customize->add_setting('safe_cologne_hero_cta_text', array(
        'default'           => 'Jetzt Kontakt aufnehmen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_cta_text', array(
        'label'    => __('Hero CTA Button Text', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'text',
    ));
    
    // Hero CTA URL
    $wp_customize->add_setting('safe_cologne_hero_cta_url', array(
        'default'           => '/kontakt/',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_hero_cta_url', array(
        'label'    => __('Hero CTA Button URL', 'safe-cologne'),
        'section'  => 'safe_cologne_hero',
        'type'     => 'url',
    ));
    
    // ==============================================
    // Services Section
    // ==============================================
    $wp_customize->add_section('safe_cologne_services', array(
        'title'    => __('Services Section', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 40,
    ));
    
    // Services Title
    $wp_customize->add_setting('safe_cologne_services_title', array(
        'default'           => 'Unsere Sicherheitsdienste',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_title', array(
        'label'    => __('Services Section Title', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    // Services Subtitle
    $wp_customize->add_setting('safe_cologne_services_subtitle', array(
        'default'           => 'Umfassende Sicherheitslösungen für jeden Bedarf',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_services_subtitle', array(
        'label'    => __('Services Section Subtitle', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    // Service 1
    $wp_customize->add_setting('safe_cologne_service_1_title', array(
        'default'           => 'Objektschutz',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_1_title', array(
        'label'    => __('Service 1 Title', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('safe_cologne_service_1_description', array(
        'default'           => 'Professioneller Schutz Ihrer Objekte und Immobilien.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_1_description', array(
        'label'    => __('Service 1 Description', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'textarea',
    ));
    
    // Service 2
    $wp_customize->add_setting('safe_cologne_service_2_title', array(
        'default'           => 'Personenschutz',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_2_title', array(
        'label'    => __('Service 2 Title', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('safe_cologne_service_2_description', array(
        'default'           => 'Diskreter und professioneller Schutz für Personen.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_2_description', array(
        'label'    => __('Service 2 Description', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'textarea',
    ));
    
    // Service 3
    $wp_customize->add_setting('safe_cologne_service_3_title', array(
        'default'           => 'Veranstaltungsschutz',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_3_title', array(
        'label'    => __('Service 3 Title', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('safe_cologne_service_3_description', array(
        'default'           => 'Sicherheit für Events und Veranstaltungen aller Art.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_service_3_description', array(
        'label'    => __('Service 3 Description', 'safe-cologne'),
        'section'  => 'safe_cologne_services',
        'type'     => 'textarea',
    ));
    
    // ==============================================
    // Team Section
    // ==============================================
    $wp_customize->add_section('safe_cologne_team', array(
        'title'    => __('Team Section', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 50,
    ));
    
    // Team Title
    $wp_customize->add_setting('safe_cologne_team_title', array(
        'default'           => 'Unser Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_team_title', array(
        'label'    => __('Team Section Title', 'safe-cologne'),
        'section'  => 'safe_cologne_team',
        'type'     => 'text',
    ));
    
    // Team Member 1
    $wp_customize->add_setting('safe_cologne_team_member_1_name', array(
        'default'           => 'Max Mustermann',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_team_member_1_name', array(
        'label'    => __('Team Member 1 Name', 'safe-cologne'),
        'section'  => 'safe_cologne_team',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('safe_cologne_team_member_1_role', array(
        'default'           => 'Geschäftsführer',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_team_member_1_role', array(
        'label'    => __('Team Member 1 Role', 'safe-cologne'),
        'section'  => 'safe_cologne_team',
        'type'     => 'text',
    ));
    
    $wp_customize->add_setting('safe_cologne_team_member_1_description', array(
        'default'           => 'Über 20 Jahre Erfahrung im Sicherheitsbereich.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_team_member_1_description', array(
        'label'    => __('Team Member 1 Description', 'safe-cologne'),
        'section'  => 'safe_cologne_team',
        'type'     => 'textarea',
    ));
    
    // ==============================================
    // Colors and Typography
    // ==============================================
    $wp_customize->add_section('safe_cologne_colors', array(
        'title'    => __('Colors & Typography', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 60,
    ));
    
    // Primary Color
    $wp_customize->add_setting('safe_cologne_primary_color', array(
        'default'           => '#E30613',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_primary_color', array(
        'label'    => __('Primary Color', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Dark Gray Color
    $wp_customize->add_setting('safe_cologne_dark_gray', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_dark_gray', array(
        'label'    => __('Dark Gray Color', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Light Gray Color
    $wp_customize->add_setting('safe_cologne_light_gray', array(
        'default'           => '#F8F9FA',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_light_gray', array(
        'label'    => __('Light Gray Color', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // ==============================================
    // Social Media Links
    // ==============================================
    $wp_customize->add_section('safe_cologne_social', array(
        'title'    => __('Social Media Links', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 70,
    ));
    
    // Facebook URL
    $wp_customize->add_setting('safe_cologne_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_facebook_url', array(
        'label'    => __('Facebook URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // Instagram URL
    $wp_customize->add_setting('safe_cologne_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_instagram_url', array(
        'label'    => __('Instagram URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // LinkedIn URL
    $wp_customize->add_setting('safe_cologne_linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('safe_cologne_linkedin_url', array(
        'label'    => __('LinkedIn URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // ==============================================
    // Business Hours
    // ==============================================
    $wp_customize->add_section('safe_cologne_business_hours', array(
        'title'    => __('Business Hours', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 80,
    ));
    
    // Monday - Friday
    $wp_customize->add_setting('safe_cologne_hours_weekdays', array(
        'default'           => '08:00 - 18:00',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hours_weekdays', array(
        'label'    => __('Monday - Friday', 'safe-cologne'),
        'section'  => 'safe_cologne_business_hours',
        'type'     => 'text',
    ));
    
    // Saturday
    $wp_customize->add_setting('safe_cologne_hours_saturday', array(
        'default'           => '09:00 - 16:00',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hours_saturday', array(
        'label'    => __('Saturday', 'safe-cologne'),
        'section'  => 'safe_cologne_business_hours',
        'type'     => 'text',
    ));
    
    // Sunday
    $wp_customize->add_setting('safe_cologne_hours_sunday', array(
        'default'           => 'Geschlossen',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_hours_sunday', array(
        'label'    => __('Sunday', 'safe-cologne'),
        'section'  => 'safe_cologne_business_hours',
        'type'     => 'text',
    ));
    
    // Emergency Hours Note
    $wp_customize->add_setting('safe_cologne_emergency_hours', array(
        'default'           => 'Notfälle: Nach Vereinbarung',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_emergency_hours', array(
        'label'    => __('Emergency Hours Note', 'safe-cologne'),
        'section'  => 'safe_cologne_business_hours',
        'type'     => 'text',
    ));
}

/**
 * Output customizer CSS
 */
add_action('wp_head', 'safe_cologne_customizer_css');
function safe_cologne_customizer_css() {
    $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
    $dark_gray = get_theme_mod('safe_cologne_dark_gray', '#333333');
    $light_gray = get_theme_mod('safe_cologne_light_gray', '#F8F9FA');
    
    ?>
    <style type="text/css">
        :root {
            --primary-red: <?php echo esc_attr($primary_color); ?>;
            --dark-red: <?php echo esc_attr(safe_cologne_adjust_brightness($primary_color, -20)); ?>;
            --light-red: <?php echo esc_attr(safe_cologne_adjust_brightness($primary_color, 20)); ?>;
            --dark-gray: <?php echo esc_attr($dark_gray); ?>;
            --medium-gray: <?php echo esc_attr($dark_gray); ?>;
            --light-gray: <?php echo esc_attr($light_gray); ?>;
            --bg-light: <?php echo esc_attr($light_gray); ?>;
        }
    </style>
    <?php
}

/**
 * Helper function to adjust color brightness
 */
function safe_cologne_adjust_brightness($hex, $percent) {
    $hex = str_replace('#', '', $hex);
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    
    $r = max(0, min(255, $r + ($r * $percent / 100)));
    $g = max(0, min(255, $g + ($g * $percent / 100)));
    $b = max(0, min(255, $b + ($b * $percent / 100)));
    
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

/**
 * Register customizer partials for selective refresh
 */
add_action('customize_register', 'safe_cologne_customize_register_partials');
function safe_cologne_customize_register_partials($wp_customize) {
    // Check if selective refresh is available
    if (!isset($wp_customize->selective_refresh)) {
        return;
    }
    
    // Hero title partial
    $wp_customize->selective_refresh->add_partial('safe_cologne_hero_title', array(
        'selector' => '.hero h1',
        'render_callback' => function() {
            return get_theme_mod('safe_cologne_hero_title', 'Professioneller Sicherheitsdienst in Köln');
        },
    ));
    
    // Company name partial
    $wp_customize->selective_refresh->add_partial('safe_cologne_company_name', array(
        'selector' => '.site-title',
        'render_callback' => function() {
            return get_theme_mod('safe_cologne_company_name', 'Safe Cologne Security Services');
        },
    ));
}