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
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_secondary_color', array(
        'label'    => __('Sekundärfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
}

// Output custom CSS
add_action('wp_head', 'safe_cologne_customizer_css');
function safe_cologne_customizer_css() {
    $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
    $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#1a1a1a');
    ?>
    <style type="text/css">
        :root {
            --primary-red: <?php echo esc_attr($primary_color); ?>;
            --dark-gray: <?php echo esc_attr($secondary_color); ?>;
        }
    </style>
    <?php
}
