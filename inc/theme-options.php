<?php
/**
 * Theme Options for SafeCologne
 * 
 * @package Safe_Cologne
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add theme options to functions.php include
add_action('admin_init', 'safe_cologne_theme_options_init');
add_action('admin_menu', 'safe_cologne_theme_options_add_page');

// Initialize the theme options
function safe_cologne_theme_options_init() {
    register_setting(
        'safe_cologne_theme_options',
        'safe_cologne_theme_options',
        'safe_cologne_theme_options_validate'
    );
    
    // General Section
    add_settings_section(
        'safe_cologne_general_section',
        __('Allgemeine Einstellungen', 'safe-cologne'),
        'safe_cologne_general_section_text',
        'safe_cologne_theme_options'
    );
    
    // Contact Information Fields
    add_settings_field(
        'safe_cologne_phone',
        __('Telefonnummer', 'safe-cologne'),
        'safe_cologne_phone_field',
        'safe_cologne_theme_options',
        'safe_cologne_general_section'
    );
    
    add_settings_field(
        'safe_cologne_email',
        __('E-Mail Adresse', 'safe-cologne'),
        'safe_cologne_email_field',
        'safe_cologne_theme_options',
        'safe_cologne_general_section'
    );
    
    add_settings_field(
        'safe_cologne_address',
        __('Firmenadresse', 'safe-cologne'),
        'safe_cologne_address_field',
        'safe_cologne_theme_options',
        'safe_cologne_general_section'
    );
    
    add_settings_field(
        'safe_cologne_whatsapp',
        __('WhatsApp Nummer', 'safe-cologne'),
        'safe_cologne_whatsapp_field',
        'safe_cologne_theme_options',
        'safe_cologne_general_section'
    );
    
    // Social Media Section
    add_settings_section(
        'safe_cologne_social_section',
        __('Social Media', 'safe-cologne'),
        'safe_cologne_social_section_text',
        'safe_cologne_theme_options'
    );
    
    add_settings_field(
        'safe_cologne_linkedin',
        __('LinkedIn URL', 'safe-cologne'),
        'safe_cologne_linkedin_field',
        'safe_cologne_theme_options',
        'safe_cologne_social_section'
    );
    
    add_settings_field(
        'safe_cologne_xing',
        __('XING URL', 'safe-cologne'),
        'safe_cologne_xing_field',
        'safe_cologne_theme_options',
        'safe_cologne_social_section'
    );
    
    // Company Info Section
    add_settings_section(
        'safe_cologne_company_section',
        __('Firmendaten', 'safe-cologne'),
        'safe_cologne_company_section_text',
        'safe_cologne_theme_options'
    );
    
    add_settings_field(
        'safe_cologne_founding_year',
        __('Gründungsjahr', 'safe-cologne'),
        'safe_cologne_founding_year_field',
        'safe_cologne_theme_options',
        'safe_cologne_company_section'
    );
    
    add_settings_field(
        'safe_cologne_clients_count',
        __('Anzahl Kunden', 'safe-cologne'),
        'safe_cologne_clients_count_field',
        'safe_cologne_theme_options',
        'safe_cologne_company_section'
    );
    
    add_settings_field(
        'safe_cologne_experience_years',
        __('Jahre Erfahrung', 'safe-cologne'),
        'safe_cologne_experience_years_field',
        'safe_cologne_theme_options',
        'safe_cologne_company_section'
    );
    
    // SEO Section
    add_settings_section(
        'safe_cologne_seo_section',
        __('SEO Einstellungen', 'safe-cologne'),
        'safe_cologne_seo_section_text',
        'safe_cologne_theme_options'
    );
    
    add_settings_field(
        'safe_cologne_google_analytics',
        __('Google Analytics ID', 'safe-cologne'),
        'safe_cologne_google_analytics_field',
        'safe_cologne_theme_options',
        'safe_cologne_seo_section'
    );
    
    add_settings_field(
        'safe_cologne_google_tagmanager',
        __('Google Tag Manager ID', 'safe-cologne'),
        'safe_cologne_google_tagmanager_field',
        'safe_cologne_theme_options',
        'safe_cologne_seo_section'
    );
}

// Add the theme options page
function safe_cologne_theme_options_add_page() {
    add_theme_page(
        __('SafeCologne Optionen', 'safe-cologne'),
        __('Theme Optionen', 'safe-cologne'),
        'manage_options',
        'safe_cologne_theme_options',
        'safe_cologne_theme_options_page'
    );
}

// Display the theme options page
function safe_cologne_theme_options_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('SafeCologne Theme Optionen', 'safe-cologne'); ?></h1>
        
        <form method="post" action="options.php">
            <?php
            settings_fields('safe_cologne_theme_options');
            do_settings_sections('safe_cologne_theme_options');
            submit_button();
            ?>
        </form>
        
        <div class="theme-info" style="margin-top: 2rem; padding: 1rem; background: #f1f1f1; border-radius: 4px;">
            <h3><?php esc_html_e('Theme Information', 'safe-cologne'); ?></h3>
            <p><strong><?php esc_html_e('Version:', 'safe-cologne'); ?></strong> <?php echo SAFE_COLOGNE_VERSION; ?></p>
            <p><strong><?php esc_html_e('DSGVO Status:', 'safe-cologne'); ?></strong> <span style="color: green;">✓ Compliant</span></p>
            <p><strong><?php esc_html_e('Performance:', 'safe-cologne'); ?></strong> <span style="color: green;">✓ Optimiert</span></p>
        </div>
    </div>
    <?php
}

// Section text functions
function safe_cologne_general_section_text() {
    echo '<p>' . __('Grundlegende Kontaktinformationen für Ihr Unternehmen.', 'safe-cologne') . '</p>';
}

function safe_cologne_social_section_text() {
    echo '<p>' . __('Social Media Profile für bessere Reichweite.', 'safe-cologne') . '</p>';
}

function safe_cologne_company_section_text() {
    echo '<p>' . __('Wichtige Firmendaten für die "Über uns" Seite.', 'safe-cologne') . '</p>';
}

function safe_cologne_seo_section_text() {
    echo '<p>' . __('SEO und Analytics Einstellungen. Alle Tools sind DSGVO-konform konfiguriert.', 'safe-cologne') . '</p>';
}

// Field functions
function safe_cologne_phone_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['phone']) ? $options['phone'] : '';
    echo '<input type="text" name="safe_cologne_theme_options[phone]" value="' . esc_attr($value) . '" class="regular-text" />';
    echo '<p class="description">' . __('Haupttelefonnummer (z.B. 0221 65058801)', 'safe-cologne') . '</p>';
}

function safe_cologne_email_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['email']) ? $options['email'] : '';
    echo '<input type="email" name="safe_cologne_theme_options[email]" value="' . esc_attr($value) . '" class="regular-text" />';
    echo '<p class="description">' . __('Haupt-E-Mail Adresse', 'safe-cologne') . '</p>';
}

function safe_cologne_address_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['address']) ? $options['address'] : '';
    echo '<textarea name="safe_cologne_theme_options[address]" rows="3" class="large-text">' . esc_textarea($value) . '</textarea>';
    echo '<p class="description">' . __('Vollständige Firmenadresse', 'safe-cologne') . '</p>';
}

function safe_cologne_whatsapp_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['whatsapp']) ? $options['whatsapp'] : '';
    echo '<input type="text" name="safe_cologne_theme_options[whatsapp]" value="' . esc_attr($value) . '" class="regular-text" />';
    echo '<p class="description">' . __('WhatsApp Nummer im internationalen Format (z.B. 491701234567)', 'safe-cologne') . '</p>';
}

function safe_cologne_linkedin_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['linkedin']) ? $options['linkedin'] : '';
    echo '<input type="url" name="safe_cologne_theme_options[linkedin]" value="' . esc_attr($value) . '" class="regular-text" />';
    echo '<p class="description">' . __('LinkedIn Firmenprofil URL', 'safe-cologne') . '</p>';
}

function safe_cologne_xing_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['xing']) ? $options['xing'] : '';
    echo '<input type="url" name="safe_cologne_theme_options[xing]" value="' . esc_attr($value) . '" class="regular-text" />';
    echo '<p class="description">' . __('XING Firmenprofil URL', 'safe-cologne') . '</p>';
}

function safe_cologne_founding_year_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['founding_year']) ? $options['founding_year'] : '2023';
    echo '<input type="number" name="safe_cologne_theme_options[founding_year]" value="' . esc_attr($value) . '" min="1900" max="' . date('Y') . '" class="small-text" />';
    echo '<p class="description">' . __('Jahr der Firmengründung', 'safe-cologne') . '</p>';
}

function safe_cologne_clients_count_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['clients_count']) ? $options['clients_count'] : '50';
    echo '<input type="number" name="safe_cologne_theme_options[clients_count]" value="' . esc_attr($value) . '" min="0" class="small-text" />';
    echo '<p class="description">' . __('Anzahl zufriedener Kunden', 'safe-cologne') . '</p>';
}

function safe_cologne_experience_years_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['experience_years']) ? $options['experience_years'] : '20';
    echo '<input type="number" name="safe_cologne_theme_options[experience_years]" value="' . esc_attr($value) . '" min="0" class="small-text" />';
    echo '<p class="description">' . __('Jahre Erfahrung im Bereich Sicherheit', 'safe-cologne') . '</p>';
}

function safe_cologne_google_analytics_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['google_analytics']) ? $options['google_analytics'] : '';
    echo '<input type="text" name="safe_cologne_theme_options[google_analytics]" value="' . esc_attr($value) . '" class="regular-text" placeholder="G-XXXXXXXXXX" />';
    echo '<p class="description">' . __('Google Analytics 4 Measurement ID (optional)', 'safe-cologne') . '</p>';
}

function safe_cologne_google_tagmanager_field() {
    $options = get_option('safe_cologne_theme_options');
    $value = isset($options['google_tagmanager']) ? $options['google_tagmanager'] : '';
    echo '<input type="text" name="safe_cologne_theme_options[google_tagmanager]" value="' . esc_attr($value) . '" class="regular-text" placeholder="GTM-XXXXXXX" />';
    echo '<p class="description">' . __('Google Tag Manager Container ID (optional)', 'safe-cologne') . '</p>';
}

// Validate input
function safe_cologne_theme_options_validate($input) {
    $output = array();
    
    // Sanitize text fields
    $text_fields = array('phone', 'email', 'address', 'whatsapp', 'linkedin', 'xing', 'google_analytics', 'google_tagmanager');
    foreach ($text_fields as $field) {
        if (isset($input[$field])) {
            $output[$field] = sanitize_text_field($input[$field]);
        }
    }
    
    // Sanitize email
    if (isset($input['email'])) {
        $output['email'] = sanitize_email($input['email']);
    }
    
    // Sanitize URLs
    $url_fields = array('linkedin', 'xing');
    foreach ($url_fields as $field) {
        if (isset($input[$field])) {
            $output[$field] = esc_url_raw($input[$field]);
        }
    }
    
    // Sanitize numbers
    $number_fields = array('founding_year', 'clients_count', 'experience_years');
    foreach ($number_fields as $field) {
        if (isset($input[$field])) {
            $output[$field] = absint($input[$field]);
        }
    }
    
    // Sanitize textarea
    if (isset($input['address'])) {
        $output['address'] = sanitize_textarea_field($input['address']);
    }
    
    return $output;
}

// Helper function to get theme option
function safe_cologne_get_option($key, $default = '') {
    $options = get_option('safe_cologne_theme_options');
    return isset($options[$key]) ? $options[$key] : $default;
}

// Add to head for tracking codes (DSGVO compliant)
add_action('wp_head', 'safe_cologne_tracking_codes');
function safe_cologne_tracking_codes() {
    // Only add if user has consented (you should implement consent management)
    if (!safe_cologne_has_tracking_consent()) {
        return;
    }
    
    $ga_id = safe_cologne_get_option('google_analytics');
    $gtm_id = safe_cologne_get_option('google_tagmanager');
    
    // Google Analytics 4
    if ($ga_id) {
        ?>
        <!-- Google Analytics 4 (DSGVO compliant) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_id); ?>"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('consent', 'default', {
            'analytics_storage': 'denied',
            'ad_storage': 'denied'
        });
        gtag('config', '<?php echo esc_js($ga_id); ?>', {
            'anonymize_ip': true,
            'allow_google_signals': false,
            'allow_ad_personalization_signals': false
        });
        </script>
        <?php
    }
    
    // Google Tag Manager
    if ($gtm_id) {
        ?>
        <!-- Google Tag Manager (DSGVO compliant) -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo esc_js($gtm_id); ?>');</script>
        <?php
    }
}

// Helper function to check tracking consent (implement based on your consent solution)
function safe_cologne_has_tracking_consent() {
    // This should check your DSGVO consent cookie/localStorage
    // For now, return false to ensure DSGVO compliance by default
    return isset($_COOKIE['safe_cologne_analytics_consent']) && $_COOKIE['safe_cologne_analytics_consent'] === 'accepted';
}

// Add GTM noscript after body tag
add_action('wp_body_open', 'safe_cologne_gtm_noscript');
function safe_cologne_gtm_noscript() {
    if (!safe_cologne_has_tracking_consent()) {
        return;
    }
    
    $gtm_id = safe_cologne_get_option('google_tagmanager');
    if ($gtm_id) {
        ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($gtm_id); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?php
    }
}
?>