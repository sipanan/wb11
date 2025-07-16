<?php
/**
 * Contact Page Specific Functions
 * Safe Cologne Theme - Contact Page
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Contact page specific enqueue scripts and styles
 */
function safe_cologne_contact_enqueue_scripts() {
    if (is_page_template('page-templates/page-contact.php') || is_page('contact') || is_page('kontakt')) {
        // Enqueue contact-specific CSS
        wp_enqueue_style(
            'safe-cologne-contact', 
            get_template_directory_uri() . '/assets/css/pages/contact.css', 
            array('safe-cologne-main'), 
            SAFE_COLOGNE_VERSION
        );
        
        // Enqueue contact-specific JavaScript
        wp_enqueue_script(
            'safe-cologne-contact', 
            get_template_directory_uri() . '/assets/js/pages/contact.js', 
            array('jquery', 'safe-cologne-main'), 
            SAFE_COLOGNE_VERSION, 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_contact_enqueue_scripts');

/**
 * Contact page customizer settings
 */
function safe_cologne_contact_customizer_settings($wp_customize) {
    // Contact Section
    $wp_customize->add_section('safe_cologne_contact', array(
        'title'    => __('Kontakt Seite', 'safe-cologne'),
        'panel'    => 'safe_cologne_panel',
        'priority' => 70,
    ));
    
    // Contact Hero Title
    $wp_customize->add_setting('safe_cologne_contact_hero_title', array(
        'default'           => 'Kontakt',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('safe_cologne_contact_hero_title', array(
        'label'    => __('Hero Titel', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'text',
    ));
    
    // Contact Hero Subtitle
    $wp_customize->add_setting('safe_cologne_contact_hero_subtitle', array(
        'default'           => 'Nehmen Sie Kontakt mit uns auf - wir sind für Sie da',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_contact_hero_subtitle', array(
        'label'    => __('Hero Untertitel', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'textarea',
    ));
    
    // Contact Form Email
    $wp_customize->add_setting('safe_cologne_contact_form_email', array(
        'default'           => get_option('admin_email'),
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('safe_cologne_contact_form_email', array(
        'label'    => __('Formular E-Mail', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'email',
    ));
    
    // Business Hours
    $wp_customize->add_setting('safe_cologne_business_hours', array(
        'default'           => 'Mo-Fr: 08:00-18:00\nSa: 09:00-14:00\nSo: Geschlossen',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_business_hours', array(
        'label'    => __('Geschäftszeiten', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'textarea',
    ));
    
    // Google Maps Embed
    $wp_customize->add_setting('safe_cologne_google_maps_embed', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('safe_cologne_google_maps_embed', array(
        'label'    => __('Google Maps Embed Code', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'textarea',
    ));
    
    // Contact Success Message
    $wp_customize->add_setting('safe_cologne_contact_success_message', array(
        'default'           => 'Vielen Dank für Ihre Nachricht! Wir werden uns schnellstmöglich bei Ihnen melden.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('safe_cologne_contact_success_message', array(
        'label'    => __('Erfolgs-Nachricht', 'safe-cologne'),
        'section'  => 'safe_cologne_contact',
        'type'     => 'textarea',
    ));
}
add_action('customize_register', 'safe_cologne_contact_customizer_settings');

/**
 * Handle contact form submission
 */
function safe_cologne_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'safe-cologne-nonce')) {
        wp_die('Security check failed');
    }
    
    // Sanitize form data
    $form_data = $_POST['form_data'];
    $name = sanitize_text_field($form_data['name']);
    $email = sanitize_email($form_data['email']);
    $phone = sanitize_text_field($form_data['phone']);
    $company = sanitize_text_field($form_data['company']);
    $service = sanitize_text_field($form_data['service']);
    $message = sanitize_textarea_field($form_data['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Bitte füllen Sie alle Pflichtfelder aus.');
        return;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_send_json_error('Bitte geben Sie eine gültige E-Mail-Adresse ein.');
        return;
    }
    
    // Prepare email
    $to = get_theme_mod('safe_cologne_contact_form_email', get_option('admin_email'));
    $subject = 'Neue Kontaktanfrage von ' . $name;
    
    $email_body = "Neue Kontaktanfrage über die Website:\n\n";
    $email_body .= "Name: " . $name . "\n";
    $email_body .= "E-Mail: " . $email . "\n";
    $email_body .= "Telefon: " . $phone . "\n";
    $email_body .= "Unternehmen: " . $company . "\n";
    $email_body .= "Service: " . $service . "\n";
    $email_body .= "Nachricht:\n" . $message . "\n\n";
    $email_body .= "Gesendet am: " . date('d.m.Y H:i') . "\n";
    $email_body .= "IP-Adresse: " . $_SERVER['REMOTE_ADDR'] . "\n";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    // Send email
    if (wp_mail($to, $subject, $email_body, $headers)) {
        // Save to database (optional)
        safe_cologne_save_contact_submission($form_data);
        
        wp_send_json_success(get_theme_mod('safe_cologne_contact_success_message', 'Vielen Dank für Ihre Nachricht!'));
    } else {
        wp_send_json_error('Fehler beim Senden der E-Mail. Bitte versuchen Sie es später erneut.');
    }
}
add_action('wp_ajax_safe_cologne_contact_form', 'safe_cologne_handle_contact_form');
add_action('wp_ajax_nopriv_safe_cologne_contact_form', 'safe_cologne_handle_contact_form');

/**
 * Save contact form submission to database
 */
function safe_cologne_save_contact_submission($form_data) {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'safe_cologne_contacts';
    
    // Create table if it doesn't exist
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        safe_cologne_create_contact_table();
    }
    
    $wpdb->insert(
        $table_name,
        array(
            'name' => $form_data['name'],
            'email' => $form_data['email'],
            'phone' => $form_data['phone'],
            'company' => $form_data['company'],
            'service' => $form_data['service'],
            'message' => $form_data['message'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'submitted_at' => current_time('mysql')
        ),
        array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')
    );
}

/**
 * Create contact submissions table
 */
function safe_cologne_create_contact_table() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'safe_cologne_contacts';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        phone varchar(50),
        company varchar(100),
        service varchar(100),
        message text NOT NULL,
        ip_address varchar(45),
        user_agent text,
        submitted_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";
    
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

/**
 * Get contact methods
 */
function safe_cologne_get_contact_methods() {
    $methods = array(
        array(
            'icon' => 'fas fa-phone',
            'title' => __('Telefon', 'safe-cologne'),
            'value' => get_theme_mod('safe_cologne_phone', '0221 6505 8801'),
            'link' => 'tel:' . str_replace(' ', '', get_theme_mod('safe_cologne_phone', '0221 6505 8801')),
            'description' => __('Rufen Sie uns an', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-envelope',
            'title' => __('E-Mail', 'safe-cologne'),
            'value' => get_theme_mod('safe_cologne_email', 'info@safecologne.de'),
            'link' => 'mailto:' . get_theme_mod('safe_cologne_email', 'info@safecologne.de'),
            'description' => __('Schreiben Sie uns', 'safe-cologne')
        ),
        array(
            'icon' => 'fas fa-map-marker-alt',
            'title' => __('Adresse', 'safe-cologne'),
            'value' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln'),
            'link' => 'https://maps.google.com/maps?q=' . urlencode(get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A, 50823 Köln')),
            'description' => __('Besuchen Sie uns', 'safe-cologne')
        ),
        array(
            'icon' => 'fab fa-whatsapp',
            'title' => __('WhatsApp', 'safe-cologne'),
            'value' => get_theme_mod('safe_cologne_whatsapp', '+49 170 1234567'),
            'link' => 'https://wa.me/' . str_replace(array('+', ' '), '', get_theme_mod('safe_cologne_whatsapp', '+49 170 1234567')),
            'description' => __('Chatten Sie mit uns', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_contact_methods', $methods);
}

/**
 * Get business hours
 */
function safe_cologne_get_business_hours() {
    $hours_text = get_theme_mod('safe_cologne_business_hours', 'Mo-Fr: 08:00-18:00\nSa: 09:00-14:00\nSo: Geschlossen');
    $hours_lines = explode("\n", $hours_text);
    $hours = array();
    
    foreach ($hours_lines as $line) {
        if (trim($line)) {
            $parts = explode(':', $line, 2);
            if (count($parts) === 2) {
                $hours[] = array(
                    'day' => trim($parts[0]),
                    'time' => trim($parts[1])
                );
            }
        }
    }
    
    return $hours;
}

/**
 * Get FAQ items
 */
function safe_cologne_get_contact_faq() {
    $faq_items = array(
        array(
            'question' => __('Wie schnell können Sie vor Ort sein?', 'safe-cologne'),
            'answer' => __('In Notfällen sind wir innerhalb von 15-30 Minuten vor Ort, abhängig von Ihrem Standort in Köln und Umgebung.', 'safe-cologne')
        ),
        array(
            'question' => __('Arbeiten Sie auch an Wochenenden?', 'safe-cologne'),
            'answer' => __('Ja, wir bieten unsere Sicherheitsdienste auch an Wochenenden und Feiertagen an. Für Notfälle sind wir rund um die Uhr erreichbar.', 'safe-cologne')
        ),
        array(
            'question' => __('Wie erfolgt die Kostenberechnung?', 'safe-cologne'),
            'answer' => __('Die Kosten werden nach tatsächlich geleisteten Stunden berechnet. Wir bieten transparente Preise ohne versteckte Kosten.', 'safe-cologne')
        ),
        array(
            'question' => __('Benötigen Sie eine Anzahlung?', 'safe-cologne'),
            'answer' => __('Für Langzeitverträge ist in der Regel keine Anzahlung erforderlich. Bei einmaligen Veranstaltungen kann eine Anzahlung verlangt werden.', 'safe-cologne')
        ),
        array(
            'question' => __('Sind Ihre Mitarbeiter versichert?', 'safe-cologne'),
            'answer' => __('Ja, alle unsere Mitarbeiter sind umfassend versichert. Wir verfügen über eine Betriebshaftpflicht- und Berufsunfähigkeitsversicherung.', 'safe-cologne')
        )
    );
    
    return apply_filters('safe_cologne_contact_faq', $faq_items);
}

/**
 * Contact page meta description
 */
function safe_cologne_contact_meta_description() {
    if (is_page_template('page-templates/page-contact.php') || is_page('contact') || is_page('kontakt')) {
        $meta_description = get_theme_mod('safe_cologne_contact_hero_subtitle', 'Nehmen Sie Kontakt mit uns auf - wir sind für Sie da');
        echo '<meta name="description" content="' . esc_attr($meta_description) . '">' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_contact_meta_description');

/**
 * Add structured data for contact page
 */
function safe_cologne_contact_structured_data() {
    if (is_page_template('page-templates/page-contact.php') || is_page('contact') || is_page('kontakt')) {
        $structured_data = array(
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => get_bloginfo('name') . ' - ' . __('Kontakt', 'safe-cologne'),
            'description' => get_theme_mod('safe_cologne_contact_hero_subtitle', 'Nehmen Sie Kontakt mit uns auf - wir sind für Sie da'),
            'mainEntity' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'address' => array(
                    '@type' => 'PostalAddress',
                    'streetAddress' => get_theme_mod('safe_cologne_address', 'Subbelrather Str. 15A'),
                    'addressLocality' => 'Köln',
                    'postalCode' => '50823',
                    'addressCountry' => 'DE'
                ),
                'contactPoint' => array(
                    '@type' => 'ContactPoint',
                    'telephone' => get_theme_mod('safe_cologne_phone', '0221 6505 8801'),
                    'email' => get_theme_mod('safe_cologne_email', 'info@safecologne.de'),
                    'contactType' => 'customer service'
                ),
                'openingHours' => array(
                    'Mo-Fr 08:00-18:00',
                    'Sa 09:00-14:00'
                )
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($structured_data) . '</script>' . "\n";
    }
}
add_action('wp_head', 'safe_cologne_contact_structured_data');

/**
 * Contact page specific body classes
 */
function safe_cologne_contact_body_classes($classes) {
    if (is_page_template('page-templates/page-contact.php') || is_page('contact') || is_page('kontakt')) {
        $classes[] = 'contact-page';
        $classes[] = 'has-hero';
        $classes[] = 'has-contact-form';
        $classes[] = 'has-contact-info';
        $classes[] = 'has-map';
        $classes[] = 'has-faq';
    }
    
    return $classes;
}
add_filter('body_class', 'safe_cologne_contact_body_classes');

/**
 * Custom CSS for contact page
 */
function safe_cologne_contact_custom_css() {
    if (is_page_template('page-templates/page-contact.php') || is_page('contact') || is_page('kontakt')) {
        $primary_color = get_theme_mod('safe_cologne_primary_color', '#E30613');
        $secondary_color = get_theme_mod('safe_cologne_secondary_color', '#B20510');
        
        $custom_css = "
        .contact-hero {
            background: linear-gradient(135deg, {$primary_color} 0%, {$secondary_color} 100%);
        }
        
        .contact-icon {
            background: {$primary_color};
        }
        
        .emergency-contact {
            background: {$primary_color};
        }
        
        .form-submit {
            background: {$primary_color};
        }
        
        .form-submit:hover {
            background: {$secondary_color};
        }
        
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: {$primary_color};
            box-shadow: 0 0 0 3px rgba(227, 6, 19, 0.1);
        }
        
        .hours-item.current-day {
            border-left-color: {$primary_color};
        }
        
        .map-placeholder i {
            color: {$primary_color};
        }
        ";
        
        wp_add_inline_style('safe-cologne-contact', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'safe_cologne_contact_custom_css');

/**
 * Add admin menu for contact submissions
 */
function safe_cologne_contact_admin_menu() {
    add_submenu_page(
        'tools.php',
        __('Kontakt Anfragen', 'safe-cologne'),
        __('Kontakt Anfragen', 'safe-cologne'),
        'manage_options',
        'safe-cologne-contacts',
        'safe_cologne_contact_admin_page'
    );
}
add_action('admin_menu', 'safe_cologne_contact_admin_menu');

/**
 * Contact admin page
 */
function safe_cologne_contact_admin_page() {
    global $wpdb;
    
    $table_name = $wpdb->prefix . 'safe_cologne_contacts';
    $contacts = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submitted_at DESC LIMIT 50");
    
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <?php if ($contacts) : ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th><?php _e('Name', 'safe-cologne'); ?></th>
                        <th><?php _e('E-Mail', 'safe-cologne'); ?></th>
                        <th><?php _e('Telefon', 'safe-cologne'); ?></th>
                        <th><?php _e('Service', 'safe-cologne'); ?></th>
                        <th><?php _e('Datum', 'safe-cologne'); ?></th>
                        <th><?php _e('Aktionen', 'safe-cologne'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?php echo esc_html($contact->name); ?></td>
                            <td><a href="mailto:<?php echo esc_attr($contact->email); ?>"><?php echo esc_html($contact->email); ?></a></td>
                            <td><?php echo esc_html($contact->phone); ?></td>
                            <td><?php echo esc_html($contact->service); ?></td>
                            <td><?php echo esc_html($contact->submitted_at); ?></td>
                            <td>
                                <a href="#" class="view-contact" data-id="<?php echo $contact->id; ?>"><?php _e('Ansehen', 'safe-cologne'); ?></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p><?php _e('Keine Kontaktanfragen vorhanden.', 'safe-cologne'); ?></p>
        <?php endif; ?>
    </div>
    <?php
}