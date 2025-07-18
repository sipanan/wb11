<?php
/**
 * Theme Options - Safe Cologne
 * 
 * @package Safe_Cologne
 * @version 2.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme options to customizer
 */
add_action('customize_register', 'safe_cologne_customize_register');
function safe_cologne_customize_register($wp_customize) {
    
    // ===== COMPANY INFORMATION SECTION =====
    $wp_customize->add_section('safe_cologne_company', array(
        'title'    => __('Unternehmensinformationen', 'safe-cologne'),
        'priority' => 30,
    ));
    
    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'   => '0221 65058801',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Telefonnummer', 'safe-cologne'),
        'section'  => 'safe_cologne_company',
        'type'     => 'text',
    ));
    
    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'   => 'info@safecologne.de',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label'    => __('E-Mail Adresse', 'safe-cologne'),
        'section'  => 'safe_cologne_company',
        'type'     => 'email',
    ));
    
    // WhatsApp Number
    $wp_customize->add_setting('contact_whatsapp', array(
        'default'   => '491701234567',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_whatsapp', array(
        'label'       => __('WhatsApp Nummer', 'safe-cologne'),
        'description' => __('Ohne + und Leerzeichen (z.B. 491701234567)', 'safe-cologne'),
        'section'     => 'safe_cologne_company',
        'type'        => 'text',
    ));
    
    // Company Address
    $wp_customize->add_setting('company_address', array(
        'default'   => 'Musterstraße 123, 50667 Köln',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('company_address', array(
        'label'    => __('Firmenadresse', 'safe-cologne'),
        'section'  => 'safe_cologne_company',
        'type'     => 'textarea',
    ));
    
    // ===== HOMEPAGE CONTENT SECTION =====
    $wp_customize->add_section('safe_cologne_homepage', array(
        'title'    => __('Startseiten Inhalte', 'safe-cologne'),
        'priority' => 31,
    ));
    
    // Hero Title Line 1
    $wp_customize->add_setting('hero_title_line1', array(
        'default'   => 'Professionelle',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title_line1', array(
        'label'    => __('Hero Titel Zeile 1', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Hero Title Line 2
    $wp_customize->add_setting('hero_title_line2', array(
        'default'   => 'Sicherheit für Köln',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title_line2', array(
        'label'    => __('Hero Titel Zeile 2', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'   => 'Wir schützen Menschen, Objekte und Veranstaltungen mit modernster Technik, geschulten Profis und einem menschlichen Ansatz. Ihre Sicherheit ist unsere Mission.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label'    => __('Hero Beschreibung', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'textarea',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'    => __('Hero Hintergrundbild', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
    )));
    
    // Intro Title
    $wp_customize->add_setting('intro_title', array(
        'default'   => 'Safe Cologne – Sicherheit, die Sie spüren können',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('intro_title', array(
        'label'    => __('Intro Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Intro Content
    $wp_customize->add_setting('intro_content', array(
        'default'   => 'Seit 2023 sind wir Ihr verlässlicher Partner für professionelle Sicherheitsdienstleistungen in Köln und Umgebung. Mit modernster Technik, geschulten Mitarbeitern und einem menschlichen Ansatz sorgen wir dafür, dass Sie sich sicher fühlen können.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('intro_content', array(
        'label'    => __('Intro Inhalt', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'textarea',
    ));
    
    // Services Section Title
    $wp_customize->add_setting('services_title', array(
        'default'   => 'Unsere Sicherheitsdienstleistungen',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_title', array(
        'label'    => __('Services Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Services Section Subtitle
    $wp_customize->add_setting('services_subtitle', array(
        'default'   => 'Maßgeschneiderte Sicherheitslösungen für jeden Bedarf',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('services_subtitle', array(
        'label'    => __('Services Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Why Section Title
    $wp_customize->add_setting('why_title', array(
        'default'   => 'Warum Safe Cologne?',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('why_title', array(
        'label'    => __('Warum-Sektion Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // Why Section Subtitle
    $wp_customize->add_setting('why_subtitle', array(
        'default'   => 'Diese Werte machen uns zu Ihrem idealen Sicherheitspartner',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('why_subtitle', array(
        'label'    => __('Warum-Sektion Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // CTA Section Title
    $wp_customize->add_setting('cta_title', array(
        'default'   => 'Sicherheit beginnt mit einem Gespräch',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('cta_title', array(
        'label'    => __('CTA Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'text',
    ));
    
    // CTA Section Description
    $wp_customize->add_setting('cta_description', array(
        'default'   => 'Lassen Sie uns gemeinsam Ihr individuelles Sicherheitskonzept entwickeln. Kostenlose Beratung und maßgeschneiderte Lösungen.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('cta_description', array(
        'label'    => __('CTA Beschreibung', 'safe-cologne'),
        'section'  => 'safe_cologne_homepage',
        'type'     => 'textarea',
    ));
    
    // ===== SOCIAL MEDIA SECTION =====
    $wp_customize->add_section('safe_cologne_social', array(
        'title'    => __('Social Media', 'safe-cologne'),
        'priority' => 32,
    ));
    
    // Facebook URL
    $wp_customize->add_setting('social_facebook', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_facebook', array(
        'label'    => __('Facebook URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // Instagram URL
    $wp_customize->add_setting('social_instagram', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_instagram', array(
        'label'    => __('Instagram URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // LinkedIn URL
    $wp_customize->add_setting('social_linkedin', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_linkedin', array(
        'label'    => __('LinkedIn URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // XING URL
    $wp_customize->add_setting('social_xing', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_xing', array(
        'label'    => __('XING URL', 'safe-cologne'),
        'section'  => 'safe_cologne_social',
        'type'     => 'url',
    ));
    
    // ===== GDPR & LEGAL SECTION =====
    $wp_customize->add_section('safe_cologne_gdpr', array(
        'title'    => __('DSGVO & Rechtliches', 'safe-cologne'),
        'priority' => 33,
    ));
    
    // Cookie Consent Message
    $wp_customize->add_setting('cookie_consent_message', array(
        'default'   => 'Diese Website verwendet Cookies, um Ihnen die bestmögliche Funktionalität bieten zu können.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('cookie_consent_message', array(
        'label'    => __('Cookie Hinweis Text', 'safe-cologne'),
        'section'  => 'safe_cologne_gdpr',
        'type'     => 'textarea',
    ));
    
    // Privacy Policy Page
    $wp_customize->add_setting('privacy_policy_page', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('privacy_policy_page', array(
        'label'    => __('Datenschutz Seite', 'safe-cologne'),
        'section'  => 'safe_cologne_gdpr',
        'type'     => 'dropdown-pages',
    ));
    
    // Imprint Page
    $wp_customize->add_setting('imprint_page', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));
    
    $wp_customize->add_control('imprint_page', array(
        'label'    => __('Impressum Seite', 'safe-cologne'),
        'section'  => 'safe_cologne_gdpr',
        'type'     => 'dropdown-pages',
    ));
    
    // ===== PERFORMANCE SECTION =====
    $wp_customize->add_section('safe_cologne_performance', array(
        'title'    => __('Performance & SEO', 'safe-cologne'),
        'priority' => 34,
    ));
    
    // Enable Minification
    $wp_customize->add_setting('enable_minification', array(
        'default'   => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'safe_cologne_sanitize_checkbox',
    ));
    
    $wp_customize->add_control('enable_minification', array(
        'label'    => __('CSS/JS Minifizierung aktivieren', 'safe-cologne'),
        'section'  => 'safe_cologne_performance',
        'type'     => 'checkbox',
    ));
    
    // Enable Image Optimization
    $wp_customize->add_setting('enable_image_optimization', array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'safe_cologne_sanitize_checkbox',
    ));
    
    $wp_customize->add_control('enable_image_optimization', array(
        'label'    => __('Automatische Bildoptimierung', 'safe-cologne'),
        'section'  => 'safe_cologne_performance',
        'type'     => 'checkbox',
    ));
    
    // Google Analytics ID
    $wp_customize->add_setting('google_analytics_id', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('google_analytics_id', array(
        'label'       => __('Google Analytics ID', 'safe-cologne'),
        'description' => __('z.B. G-XXXXXXXXXX (DSGVO-konform mit Anonymisierung)', 'safe-cologne'),
        'section'     => 'safe_cologne_performance',
        'type'        => 'text',
    ));
}

/**
 * Sanitize checkbox values
 */
function safe_cologne_sanitize_checkbox($checked) {
    return ((isset($checked) && true == $checked) ? true : false);
}

/**
 * Helper function to get theme option
 */
function safe_cologne_get_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

/**
 * Add theme options to admin menu
 */
add_action('admin_menu', 'safe_cologne_add_theme_options_page');
function safe_cologne_add_theme_options_page() {
    add_theme_page(
        __('Safe Cologne Optionen', 'safe-cologne'),
        __('Theme Optionen', 'safe-cologne'),
        'manage_options',
        'safe-cologne-options',
        'safe_cologne_theme_options_page'
    );
}

/**
 * Theme options page content
 */
function safe_cologne_theme_options_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="notice notice-info">
            <p>
                <?php esc_html_e('Die meisten Einstellungen können im WordPress Customizer vorgenommen werden.', 'safe-cologne'); ?>
                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary">
                    <?php esc_html_e('Customizer öffnen', 'safe-cologne'); ?>
                </a>
            </p>
        </div>
        
        <div class="safe-cologne-options-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-top: 20px;">
            
            <!-- Quick Actions -->
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Schnellaktionen', 'safe-cologne'); ?></h2>
                <div class="inside">
                    <p><a href="<?php echo admin_url('customize.php?autofocus[section]=safe_cologne_company'); ?>" class="button">
                        <?php esc_html_e('Unternehmensdaten bearbeiten', 'safe-cologne'); ?>
                    </a></p>
                    <p><a href="<?php echo admin_url('customize.php?autofocus[section]=safe_cologne_homepage'); ?>" class="button">
                        <?php esc_html_e('Startseite anpassen', 'safe-cologne'); ?>
                    </a></p>
                    <p><a href="<?php echo admin_url('post-new.php?post_type=security_services'); ?>" class="button">
                        <?php esc_html_e('Neuen Service hinzufügen', 'safe-cologne'); ?>
                    </a></p>
                    <p><a href="<?php echo admin_url('post-new.php?post_type=job_openings'); ?>" class="button">
                        <?php esc_html_e('Stellenanzeige erstellen', 'safe-cologne'); ?>
                    </a></p>
                </div>
            </div>
            
            <!-- Theme Info -->
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Theme Information', 'safe-cologne'); ?></h2>
                <div class="inside">
                    <p><strong><?php esc_html_e('Version:', 'safe-cologne'); ?></strong> <?php echo SAFE_COLOGNE_VERSION; ?></p>
                    <p><strong><?php esc_html_e('DSGVO-konform:', 'safe-cologne'); ?></strong> ✅</p>
                    <p><strong><?php esc_html_e('Gutenberg-kompatibel:', 'safe-cologne'); ?></strong> ✅</p>
                    <p><strong><?php esc_html_e('Responsiv:', 'safe-cologne'); ?></strong> ✅</p>
                    <p><strong><?php esc_html_e('Lokal gehostete Fonts:', 'safe-cologne'); ?></strong> ✅</p>
                </div>
            </div>
            
            <!-- Performance -->
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Performance Status', 'safe-cologne'); ?></h2>
                <div class="inside">
                    <?php
                    $minification = get_theme_mod('enable_minification', false);
                    $image_opt = get_theme_mod('enable_image_optimization', true);
                    ?>
                    <p><strong><?php esc_html_e('CSS/JS Minifizierung:', 'safe-cologne'); ?></strong> 
                        <?php echo $minification ? '✅ Aktiviert' : '❌ Deaktiviert'; ?>
                    </p>
                    <p><strong><?php esc_html_e('Bildoptimierung:', 'safe-cologne'); ?></strong> 
                        <?php echo $image_opt ? '✅ Aktiviert' : '❌ Deaktiviert'; ?>
                    </p>
                    <p>
                        <a href="<?php echo admin_url('customize.php?autofocus[section]=safe_cologne_performance'); ?>" class="button">
                            <?php esc_html_e('Performance Einstellungen', 'safe-cologne'); ?>
                        </a>
                    </p>
                </div>
            </div>
            
            <!-- Documentation -->
            <div class="postbox">
                <h2 class="hndle"><?php esc_html_e('Dokumentation', 'safe-cologne'); ?></h2>
                <div class="inside">
                    <p><?php esc_html_e('Hilfe bei der Verwendung des Themes:', 'safe-cologne'); ?></p>
                    <ul>
                        <li><a href="#" target="_blank"><?php esc_html_e('Theme Dokumentation', 'safe-cologne'); ?></a></li>
                        <li><a href="#" target="_blank"><?php esc_html_e('Block Editor Anleitung', 'safe-cologne'); ?></a></li>
                        <li><a href="#" target="_blank"><?php esc_html_e('DSGVO Compliance Guide', 'safe-cologne'); ?></a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    
    <style>
    .safe-cologne-options-grid .postbox h2 {
        background: #E2001A;
        color: white;
        margin: 0;
        padding: 10px 15px;
        border-radius: 0;
    }
    .safe-cologne-options-grid .postbox {
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
    }
    .safe-cologne-options-grid .inside {
        padding: 15px;
    }
    .safe-cologne-options-grid .button {
        width: 100%;
        text-align: center;
        margin-bottom: 5px;
    }
    </style>
    <?php
}

/**
 * Add quick edit links to admin bar
 */
add_action('admin_bar_menu', 'safe_cologne_admin_bar_links', 999);
function safe_cologne_admin_bar_links($wp_admin_bar) {
    if (!current_user_can('manage_options')) {
        return;
    }
    
    $wp_admin_bar->add_node(array(
        'id'    => 'safe-cologne-options',
        'title' => __('Safe Cologne', 'safe-cologne'),
        'href'  => admin_url('themes.php?page=safe-cologne-options'),
    ));
    
    $wp_admin_bar->add_node(array(
        'id'     => 'safe-cologne-customize',
        'parent' => 'safe-cologne-options',
        'title'  => __('Anpassen', 'safe-cologne'),
        'href'   => admin_url('customize.php'),
    ));
    
    $wp_admin_bar->add_node(array(
        'id'     => 'safe-cologne-services',
        'parent' => 'safe-cologne-options',
        'title'  => __('Services verwalten', 'safe-cologne'),
        'href'   => admin_url('edit.php?post_type=security_services'),
    ));
    
    $wp_admin_bar->add_node(array(
        'id'     => 'safe-cologne-jobs',
        'parent' => 'safe-cologne-options',
        'title'  => __('Jobs verwalten', 'safe-cologne'),
        'href'   => admin_url('edit.php?post_type=job_openings'),
    ));
}

/**
 * Add contextual help
 */
add_action('load-themes.php', 'safe_cologne_add_contextual_help');
function safe_cologne_add_contextual_help() {
    $screen = get_current_screen();
    
    $screen->add_help_tab(array(
        'id'      => 'safe-cologne-overview',
        'title'   => __('Theme Übersicht', 'safe-cologne'),
        'content' => '
            <h3>' . __('Safe Cologne WordPress Theme', 'safe-cologne') . '</h3>
            <p>' . __('Dieses Theme ist speziell für Sicherheitsdienstleister entwickelt und bietet:', 'safe-cologne') . '</p>
            <ul>
                <li>' . __('DSGVO-konforme lokale Schriftarten', 'safe-cologne') . '</li>
                <li>' . __('Vollständige Gutenberg Block Editor Unterstützung', 'safe-cologne') . '</li>
                <li>' . __('Modulare CSS/JS Struktur pro Seite', 'safe-cologne') . '</li>
                <li>' . __('Responsive Design für alle Geräte', 'safe-cologne') . '</li>
                <li>' . __('SEO-optimiert und performant', 'safe-cologne') . '</li>
            </ul>
        '
    ));
    
    $screen->add_help_tab(array(
        'id'      => 'safe-cologne-customization',
        'title'   => __('Anpassungen', 'safe-cologne'),
        'content' => '
            <h3>' . __('Theme anpassen', 'safe-cologne') . '</h3>
            <p>' . __('Nutzen Sie den WordPress Customizer, um das Theme anzupassen:', 'safe-cologne') . '</p>
            <ul>
                <li><strong>' . __('Unternehmensinformationen:', 'safe-cologne') . '</strong> ' . __('Telefon, E-Mail, Adresse', 'safe-cologne') . '</li>
                <li><strong>' . __('Startseiten Inhalte:', 'safe-cologne') . '</strong> ' . __('Hero-Bereich, Texte, Bilder', 'safe-cologne') . '</li>
                <li><strong>' . __('Social Media:', 'safe-cologne') . '</strong> ' . __('Links zu sozialen Netzwerken', 'safe-cologne') . '</li>
                <li><strong>' . __('DSGVO Einstellungen:', 'safe-cologne') . '</strong> ' . __('Cookie-Hinweise, Datenschutz', 'safe-cologne') . '</li>
            </ul>
        '
    ));
    
    $screen->set_help_sidebar('
        <p><strong>' . __('Für weitere Hilfe:', 'safe-cologne') . '</strong></p>
        <p><a href="mailto:support@safecologne.de">' . __('Theme Support', 'safe-cologne') . '</a></p>
    ');
}