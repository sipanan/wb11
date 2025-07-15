<?php
/**
 * AJAX Handlers
 *
 * @package Safe_Cologne
 */

// Contact Form Handler
add_action('wp_ajax_safe_cologne_contact_form', 'safe_cologne_handle_contact_form');
add_action('wp_ajax_nopriv_safe_cologne_contact_form', 'safe_cologne_handle_contact_form');

function safe_cologne_handle_contact_form() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'safe-cologne-nonce')) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Sicherheitsprüfung fehlgeschlagen.', 'safe-cologne')
        )));
    }
    
    // Sanitize form data
    $name = sanitize_text_field($_POST['name']);
    $company = sanitize_text_field($_POST['company']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $service = sanitize_text_field($_POST['service']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Bitte füllen Sie alle Pflichtfelder aus.', 'safe-cologne')
        )));
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Bitte geben Sie eine gültige E-Mail-Adresse ein.', 'safe-cologne')
        )));
    }
    
    // Prepare email
    $to = get_option('safe_cologne_settings')['email'] ?? get_option('admin_email');
    $subject = sprintf(__('Neue Anfrage von %s - Safe Cologne', 'safe-cologne'), $name);
    
    $email_body = sprintf(
        __("Neue Kontaktanfrage erhalten:\n\n" .
        "Name: %s\n" .
        "Unternehmen: %s\n" .
        "E-Mail: %s\n" .
        "Telefon: %s\n" .
        "Gewünschte Leistung: %s\n\n" .
        "Nachricht:\n%s\n\n" .
        "---\n" .
        "Diese Nachricht wurde über das Kontaktformular auf %s gesendet.", 'safe-cologne'),
        $name,
        $company ?: '-',
        $email,
        $phone,
        $service ?: '-',
        $message,
        get_bloginfo('name')
    );
    
    $headers = array(
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email,
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    // Send email
    $sent = wp_mail($to, $subject, $email_body, $headers);
    
    if ($sent) {
        // Send confirmation email to user
        $user_subject = __('Ihre Anfrage bei Safe Cologne', 'safe-cologne');
        $user_body = sprintf(
            __("Sehr geehrte(r) %s,\n\n" .
            "vielen Dank für Ihre Anfrage. Wir haben Ihre Nachricht erhalten und werden uns schnellstmöglich bei Ihnen melden.\n\n" .
            "Mit freundlichen Grüßen\n" .
            "Ihr Safe Cologne Team\n\n" .
            "---\n" .
            "Safe Cologne SecUG\n" .
            "Subbelrather Str. 15A\n" .
            "50823 Köln\n" .
            "Tel: 0221 65058801\n" .
            "E-Mail: info@safecologne.de", 'safe-cologne'),
            $name
        );
        
        wp_mail($email, $user_subject, $user_body);
        
        wp_die(json_encode(array(
            'success' => true,
            'message' => __('Vielen Dank für Ihre Anfrage. Wir melden uns schnellstmöglich bei Ihnen!', 'safe-cologne')
        )));
    } else {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Es gab einen Fehler beim Senden Ihrer Nachricht. Bitte versuchen Sie es später erneut.', 'safe-cologne')
        )));
    }
}

// Emergency Contact Handler
add_action('wp_ajax_safe_cologne_emergency_contact', 'safe_cologne_handle_emergency_contact');
add_action('wp_ajax_nopriv_safe_cologne_emergency_contact', 'safe_cologne_handle_emergency_contact');

function safe_cologne_handle_emergency_contact() {
    // Verify nonce
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'safe-cologne-nonce')) {
        wp_die(json_encode(array(
            'success' => false,
            'message' => __('Sicherheitsprüfung fehlgeschlagen.', 'safe-cologne')
        )));
    }
    
    $emergency_type = sanitize_text_field($_POST['emergency_type']);
    $location = sanitize_text_field($_POST['location']);
    $contact_phone = sanitize_text_field($_POST['contact_phone']);
    $description = sanitize_textarea_field($_POST['description']);
    
    // Log emergency request
    $emergency_data = array(
        'type' => $emergency_type,
        'location' => $location,
        'phone' => $contact_phone,
        'description' => $description,
        'timestamp' => current_time('mysql'),
        'ip' => $_SERVER['REMOTE_ADDR']
    );
    
    // Here you would integrate with your actual emergency dispatch system
    // For now, we'll send an urgent email
    $to = get_option('safe_cologne_settings')['email'] ?? get_option('admin_email');
    $subject = '🚨 NOTFALL - ' . $emergency_type;
    $body = sprintf(
        "NOTFALLANFRAGE:\n\n" .
        "Art: %s\n" .
        "Ort: %s\n" .
        "Kontakt: %s\n" .
        "Beschreibung: %s\n" .
        "Zeit: %s\n",
        $emergency_type,
        $location,
        $contact_phone,
        $description,
        current_time('mysql')
    );
    
    $headers = array(
        'Priority: Urgent',
        'X-Priority: 1',
        'Content-Type: text/plain; charset=UTF-8'
    );
    
    wp_mail($to, $subject, $body, $headers);
    
    wp_die(json_encode(array(
        'success' => true,
        'message' => __('Notfallteam wurde benachrichtigt. Wir sind unterwegs!', 'safe-cologne')
    )));
}

// Load More Posts Handler
add_action('wp_ajax_safe_cologne_load_more_posts', 'safe_cologne_handle_load_more_posts');
add_action('wp_ajax_nopriv_safe_cologne_load_more_posts', 'safe_cologne_handle_load_more_posts');

function safe_cologne_handle_load_more_posts() {
    $paged = isset($_POST['page']) ? absint($_POST['page']) : 1;
    $post_type = isset($_POST['post_type']) ? sanitize_text_field($_POST['post_type']) : 'post';
    
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => 6,
        'paged' => $paged,
        'post_status' => 'publish'
    );
    
    $query = new WP_Query($args);
    
    ob_start();
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', $post_type);
        }
    }
    
    $content = ob_get_clean();
    
    wp_die(json_encode(array(
        'success' => true,
        'content' => $content,
        'max_pages' => $query->max_num_pages
    )));
}
