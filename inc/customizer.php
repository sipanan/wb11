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
    
    // Accent Color
    $wp_customize->add_setting('safe_cologne_accent_color', array(
        'default'           => '#FF2633',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_accent_color', array(
        'label'    => __('Akzentfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Background Color
    $wp_customize->add_setting('safe_cologne_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_background_color', array(
        'label'    => __('Hintergrundfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Text Color
    $wp_customize->add_setting('safe_cologne_text_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_text_color', array(
        'label'    => __('Textfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Link Color
    $wp_customize->add_setting('safe_cologne_link_color', array(
        'default'           => '#E30613',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'safe_cologne_link_color', array(
        'label'    => __('Linkfarbe', 'safe-cologne'),
        'section'  => 'safe_cologne_colors',
    )));
    
    // Typography Section
    $wp_customize->add_section('safe_cologne_typography', array(
        'title'    => __('Typografie', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 60,
    ));
    
    // Body Font Family
    $wp_customize->add_setting('safe_cologne_body_font_family', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_body_font_family', array(
        'label'    => __('Body Schriftart', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Poppins' => 'Poppins',
            'Lato' => 'Lato',
            'Montserrat' => 'Montserrat',
            'Source Sans Pro' => 'Source Sans Pro',
            'Nunito' => 'Nunito',
        ),
    ));
    
    // Body Font Size
    $wp_customize->add_setting('safe_cologne_body_font_size', array(
        'default'           => '16',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_body_font_size', array(
        'label'    => __('Body Schriftgröße (px)', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ),
    ));
    
    // Heading Font Family
    $wp_customize->add_setting('safe_cologne_heading_font_family', array(
        'default'           => 'Inter',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_heading_font_family', array(
        'label'    => __('Überschrift Schriftart', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            'Inter' => 'Inter',
            'Roboto' => 'Roboto',
            'Open Sans' => 'Open Sans',
            'Poppins' => 'Poppins',
            'Lato' => 'Lato',
            'Montserrat' => 'Montserrat',
            'Source Sans Pro' => 'Source Sans Pro',
            'Nunito' => 'Nunito',
            'Playfair Display' => 'Playfair Display',
            'Merriweather' => 'Merriweather',
        ),
    ));
    
    // Heading Font Weight
    $wp_customize->add_setting('safe_cologne_heading_font_weight', array(
        'default'           => '700',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_heading_font_weight', array(
        'label'    => __('Überschrift Schriftgewicht', 'safe-cologne'),
        'section'  => 'safe_cologne_typography',
        'type'     => 'select',
        'choices'  => array(
            '300' => 'Light (300)',
            '400' => 'Regular (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi Bold (600)',
            '700' => 'Bold (700)',
            '800' => 'Extra Bold (800)',
            '900' => 'Black (900)',
        ),
    ));
    
    // Layout Section
    $wp_customize->add_section('safe_cologne_layout', array(
        'title'    => __('Layout', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 70,
    ));
    
    // Header Style
    $wp_customize->add_setting('safe_cologne_header_style', array(
        'default'           => 'default',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_header_style', array(
        'label'    => __('Header Stil', 'safe-cologne'),
        'section'  => 'safe_cologne_layout',
        'type'     => 'select',
        'choices'  => array(
            'default' => __('Standard', 'safe-cologne'),
            'centered' => __('Zentriert', 'safe-cologne'),
            'minimal' => __('Minimal', 'safe-cologne'),
            'full-width' => __('Vollbreite', 'safe-cologne'),
        ),
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
            'min'  => 960,
            'max'  => 1600,
            'step' => 10,
        ),
    ));
    
    // Sidebar Position
    $wp_customize->add_setting('safe_cologne_sidebar_position', array(
        'default'           => 'right',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_sidebar_position', array(
        'label'    => __('Sidebar Position', 'safe-cologne'),
        'section'  => 'safe_cologne_layout',
        'type'     => 'select',
        'choices'  => array(
            'right' => __('Rechts', 'safe-cologne'),
            'left' => __('Links', 'safe-cologne'),
            'none' => __('Keine Sidebar', 'safe-cologne'),
        ),
    ));
    
    // Mobile Options Section
    $wp_customize->add_section('safe_cologne_mobile', array(
        'title'    => __('Mobile Einstellungen', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 80,
    ));
    
    // Mobile Menu Style
    $wp_customize->add_setting('safe_cologne_mobile_menu_style', array(
        'default'           => 'slide',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_mobile_menu_style', array(
        'label'    => __('Mobile Menü Stil', 'safe-cologne'),
        'section'  => 'safe_cologne_mobile',
        'type'     => 'select',
        'choices'  => array(
            'slide' => __('Slide-In', 'safe-cologne'),
            'overlay' => __('Overlay', 'safe-cologne'),
            'dropdown' => __('Dropdown', 'safe-cologne'),
        ),
    ));
    
    // Mobile Font Size
    $wp_customize->add_setting('safe_cologne_mobile_font_size', array(
        'default'           => '14',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('safe_cologne_mobile_font_size', array(
        'label'    => __('Mobile Schriftgröße (px)', 'safe-cologne'),
        'section'  => 'safe_cologne_mobile',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 12,
            'max'  => 18,
            'step' => 1,
        ),
    ));
    
    // Show Mobile Contact Button
    $wp_customize->add_setting('safe_cologne_mobile_contact_button', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_mobile_contact_button', array(
        'label'    => __('Mobile Kontakt Button anzeigen', 'safe-cologne'),
        'section'  => 'safe_cologne_mobile',
        'type'     => 'checkbox',
    ));
    
    // Advanced Options Section
    $wp_customize->add_section('safe_cologne_advanced', array(
        'title'    => __('Erweiterte Optionen', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 90,
    ));
    
    // Enable Animations
    $wp_customize->add_setting('safe_cologne_enable_animations', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_enable_animations', array(
        'label'    => __('Animationen aktivieren', 'safe-cologne'),
        'section'  => 'safe_cologne_advanced',
        'type'     => 'checkbox',
    ));
    
    // Smooth Scrolling
    $wp_customize->add_setting('safe_cologne_smooth_scrolling', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    
    $wp_customize->add_control('safe_cologne_smooth_scrolling', array(
        'label'    => __('Smooth Scrolling', 'safe-cologne'),
        'section'  => 'safe_cologne_advanced',
        'type'     => 'checkbox',
    ));
    
    // Custom CSS
    $wp_customize->add_setting('safe_cologne_custom_css', array(
        'default'           => '',
        'sanitize_callback' => 'wp_strip_all_tags',
    ));
    
    $wp_customize->add_control('safe_cologne_custom_css', array(
        'label'    => __('Benutzerdefiniertes CSS', 'safe-cologne'),
        'section'  => 'safe_cologne_advanced',
        'type'     => 'textarea',
    ));
}

// Output custom CSS
add_action('wp_head', 'safe_cologne_customizer_css');
function safe_cologne_customizer_css() {
    // Get color options
    $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
    $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#1a1a1a');
    $accent_color = get_theme_mod('safe_cologne_accent_color', '#FF2633');
    $background_color = get_theme_mod('safe_cologne_background_color', '#ffffff');
    $text_color = get_theme_mod('safe_cologne_text_color', '#333333');
    $link_color = get_theme_mod('safe_cologne_link_color', '#E30613');
    
    // Get typography options
    $body_font_family = get_theme_mod('safe_cologne_body_font_family', 'Inter');
    $body_font_size = get_theme_mod('safe_cologne_body_font_size', 16);
    $heading_font_family = get_theme_mod('safe_cologne_heading_font_family', 'Inter');
    $heading_font_weight = get_theme_mod('safe_cologne_heading_font_weight', '700');
    
    // Get layout options
    $container_width = get_theme_mod('safe_cologne_container_width', 1200);
    $sidebar_position = get_theme_mod('safe_cologne_sidebar_position', 'right');
    
    // Get mobile options
    $mobile_font_size = get_theme_mod('safe_cologne_mobile_font_size', 14);
    
    // Get advanced options
    $enable_animations = get_theme_mod('safe_cologne_enable_animations', true);
    $smooth_scrolling = get_theme_mod('safe_cologne_smooth_scrolling', true);
    $custom_css = get_theme_mod('safe_cologne_custom_css', '');
    
    // Load Google Fonts if needed
    $google_fonts = array();
    if (!in_array($body_font_family, array('Arial', 'Helvetica', 'Times', 'Georgia', 'Verdana'))) {
        $google_fonts[] = $body_font_family . ':300,400,500,600,700';
    }
    if ($heading_font_family !== $body_font_family && !in_array($heading_font_family, array('Arial', 'Helvetica', 'Times', 'Georgia', 'Verdana'))) {
        $google_fonts[] = $heading_font_family . ':300,400,500,600,700,800,900';
    }
    
    if (!empty($google_fonts)) {
        ?>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?<?php echo 'family=' . implode('&family=', $google_fonts); ?>&display=swap" rel="stylesheet">
        <?php
    }
    ?>
    <style type="text/css" id="safe-cologne-customizer-css">
        :root {
            --primary-red: <?php echo esc_attr($primary_color); ?>;
            --dark-gray: <?php echo esc_attr($secondary_color); ?>;
            --accent-color: <?php echo esc_attr($accent_color); ?>;
            --background-color: <?php echo esc_attr($background_color); ?>;
            --text-color: <?php echo esc_attr($text_color); ?>;
            --link-color: <?php echo esc_attr($link_color); ?>;
            --body-font-family: '<?php echo esc_attr($body_font_family); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --heading-font-family: '<?php echo esc_attr($heading_font_family); ?>', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --body-font-size: <?php echo esc_attr($body_font_size); ?>px;
            --heading-font-weight: <?php echo esc_attr($heading_font_weight); ?>;
            --container-width: <?php echo esc_attr($container_width); ?>px;
            --mobile-font-size: <?php echo esc_attr($mobile_font_size); ?>px;
        }
        
        body {
            font-family: var(--body-font-family);
            font-size: var(--body-font-size);
            color: var(--text-color);
            background-color: var(--background-color);
            <?php if ($smooth_scrolling): ?>
            scroll-behavior: smooth;
            <?php endif; ?>
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--heading-font-family);
            font-weight: var(--heading-font-weight);
            color: var(--text-color);
        }
        
        a {
            color: var(--link-color);
        }
        
        .container, .sc-container {
            max-width: var(--container-width);
        }
        
        /* Layout adjustments for sidebar position */
        <?php if ($sidebar_position === 'left'): ?>
        .content-area {
            order: 2;
        }
        .widget-area {
            order: 1;
        }
        <?php elseif ($sidebar_position === 'none'): ?>
        .content-area {
            width: 100%;
            max-width: none;
        }
        .widget-area {
            display: none;
        }
        <?php endif; ?>
        
        /* Mobile styles */
        @media (max-width: 768px) {
            body {
                font-size: var(--mobile-font-size);
            }
        }
        
        /* Animations */
        <?php if ($enable_animations): ?>
        * {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        <?php endif; ?>
        
        /* Custom CSS */
        <?php if (!empty($custom_css)): ?>
        <?php echo wp_strip_all_tags($custom_css); ?>
        <?php endif; ?>
    </style>
    <?php
}
