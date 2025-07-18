<?php
/**
 * Custom Post Types
 *
 * @package Safe_Cologne
 */

// Register Custom Post Types
add_action('init', 'safe_cologne_register_post_types');
function safe_cologne_register_post_types() {
    
    // Security Services CPT
    register_post_type('security_services', array(
        'labels' => array(
            'name'                  => _x('Sicherheitsdienste', 'Post type general name', 'safe-cologne'),
            'singular_name'         => _x('Sicherheitsdienst', 'Post type singular name', 'safe-cologne'),
            'menu_name'             => _x('Sicherheitsdienste', 'Admin Menu text', 'safe-cologne'),
            'add_new'               => __('Neuer Dienst', 'safe-cologne'),
            'add_new_item'          => __('Neuen Sicherheitsdienst hinzufügen', 'safe-cologne'),
            'edit_item'             => __('Sicherheitsdienst bearbeiten', 'safe-cologne'),
            'new_item'              => __('Neuer Sicherheitsdienst', 'safe-cologne'),
            'view_item'             => __('Sicherheitsdienst ansehen', 'safe-cologne'),
            'search_items'          => __('Sicherheitsdienste suchen', 'safe-cologne'),
            'not_found'             => __('Keine Sicherheitsdienste gefunden', 'safe-cologne'),
            'not_found_in_trash'    => __('Keine Sicherheitsdienste im Papierkorb gefunden', 'safe-cologne'),
        ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'sicherheitsdienste'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-shield',
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'          => true,
    ));
    
    // Team Members CPT
    register_post_type('team_members', array(
        'labels' => array(
            'name'                  => _x('Team', 'Post type general name', 'safe-cologne'),
            'singular_name'         => _x('Teammitglied', 'Post type singular name', 'safe-cologne'),
            'menu_name'             => _x('Team', 'Admin Menu text', 'safe-cologne'),
            'add_new'               => __('Neues Mitglied', 'safe-cologne'),
            'add_new_item'          => __('Neues Teammitglied hinzufügen', 'safe-cologne'),
            'edit_item'             => __('Teammitglied bearbeiten', 'safe-cologne'),
            'new_item'              => __('Neues Teammitglied', 'safe-cologne'),
            'view_item'             => __('Teammitglied ansehen', 'safe-cologne'),
            'search_items'          => __('Team durchsuchen', 'safe-cologne'),
            'not_found'             => __('Keine Teammitglieder gefunden', 'safe-cologne'),
        ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'team'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'show_in_rest'          => true,
    ));
    
    // Testimonials CPT
    register_post_type('testimonials', array(
        'labels' => array(
            'name'                  => _x('Referenzen', 'Post type general name', 'safe-cologne'),
            'singular_name'         => _x('Referenz', 'Post type singular name', 'safe-cologne'),
            'menu_name'             => _x('Referenzen', 'Admin Menu text', 'safe-cologne'),
            'add_new'               => __('Neue Referenz', 'safe-cologne'),
            'add_new_item'          => __('Neue Referenz hinzufügen', 'safe-cologne'),
            'edit_item'             => __('Referenz bearbeiten', 'safe-cologne'),
            'new_item'              => __('Neue Referenz', 'safe-cologne'),
            'view_item'             => __('Referenz ansehen', 'safe-cologne'),
            'search_items'          => __('Referenzen suchen', 'safe-cologne'),
            'not_found'             => __('Keine Referenzen gefunden', 'safe-cologne'),
        ),
        'public'                => false,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => false,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => false,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-testimonial',
        'supports'              => array('title', 'editor', 'custom-fields'),
        'show_in_rest'          => true,
    ));
    
    // Jobs CPT (renamed from job_openings for better clarity)
    register_post_type('jobs', array(
        'labels' => array(
            'name'                  => _x('Jobs', 'Post type general name', 'safe-cologne'),
            'singular_name'         => _x('Job', 'Post type singular name', 'safe-cologne'),
            'menu_name'             => _x('Jobs', 'Admin Menu text', 'safe-cologne'),
            'add_new'               => __('Neuer Job', 'safe-cologne'),
            'add_new_item'          => __('Neuen Job hinzufügen', 'safe-cologne'),
            'edit_item'             => __('Job bearbeiten', 'safe-cologne'),
            'new_item'              => __('Neuer Job', 'safe-cologne'),
            'view_item'             => __('Job ansehen', 'safe-cologne'),
            'search_items'          => __('Jobs suchen', 'safe-cologne'),
            'not_found'             => __('Keine Jobs gefunden', 'safe-cologne'),
        ),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'karriere'),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-businessperson',
        'supports'              => array('title', 'editor', 'excerpt', 'custom-fields'),
        'show_in_rest'          => true,
    ));
}

// Add custom meta boxes
add_action('add_meta_boxes', 'safe_cologne_add_meta_boxes');
function safe_cologne_add_meta_boxes() {
    // Service pricing meta box
    add_meta_box(
        'service_pricing',
        __('Preisgestaltung', 'safe-cologne'),
        'safe_cologne_service_pricing_callback',
        'security_services',
        'side',
        'default'
    );
    
    // Service features meta box
    add_meta_box(
        'service_features',
        __('Service Features', 'safe-cologne'),
        'safe_cologne_service_features_callback',
        'security_services',
        'normal',
        'default'
    );
    
    // Team member details
    add_meta_box(
        'team_member_details',
        __('Mitarbeiter Details', 'safe-cologne'),
        'safe_cologne_team_member_details_callback',
        'team_members',
        'normal',
        'default'
    );
    
    // Testimonial details
    add_meta_box(
        'testimonial_details',
        __('Referenz Details', 'safe-cologne'),
        'safe_cologne_testimonial_details_callback',
        'testimonials',
        'normal',
        'default'
    );
    
    // Job details
    add_meta_box(
        'job_details',
        __('Stellen Details', 'safe-cologne'),
        'safe_cologne_job_details_callback',
        'jobs',
        'jobs',
        'normal',
        'default'
    );
}

// Meta box callbacks
function safe_cologne_service_pricing_callback($post) {
    wp_nonce_field('safe_cologne_save_meta_box_data', 'safe_cologne_meta_box_nonce');
    $price_range = get_post_meta($post->ID, '_service_price_range', true);
    ?>
    <p>
        <label for="service_price_range"><?php _e('Preisspanne:', 'safe-cologne'); ?></label>
        <input type="text" id="service_price_range" name="service_price_range" value="<?php echo esc_attr($price_range); ?>" style="width: 100%;" />
        <span class="description"><?php _e('z.B. "Ab 25€/Stunde"', 'safe-cologne'); ?></span>
    </p>
    <?php
}

function safe_cologne_service_features_callback($post) {
    $features = get_post_meta($post->ID, '_service_features', true);
    ?>
    <div id="service-features-container">
        <p><?php _e('Service Features (eine pro Zeile):', 'safe-cologne'); ?></p>
        <textarea name="service_features" rows="10" style="width: 100%;"><?php echo esc_textarea($features); ?></textarea>
    </div>
    <?php
}

function safe_cologne_team_member_details_callback($post) {
    $position = get_post_meta($post->ID, '_member_position', true);
    $experience = get_post_meta($post->ID, '_member_experience', true);
    $certifications = get_post_meta($post->ID, '_member_certifications', true);
    $specialization = get_post_meta($post->ID, '_member_specialization', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="member_position"><?php _e('Position:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="member_position" name="member_position" value="<?php echo esc_attr($position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="member_experience"><?php _e('Jahre Erfahrung:', 'safe-cologne'); ?></label></th>
            <td><input type="number" id="member_experience" name="member_experience" value="<?php echo esc_attr($experience); ?>" class="small-text" /></td>
        </tr>
        <tr>
            <th><label for="member_certifications"><?php _e('Zertifizierungen:', 'safe-cologne'); ?></label></th>
            <td><textarea id="member_certifications" name="member_certifications" rows="3" class="large-text">            <?php echo esc_textarea($certifications); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="member_specialization"><?php _e('Spezialisierung:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="member_specialization" name="member_specialization" value="<?php echo esc_attr($specialization); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

function safe_cologne_testimonial_details_callback($post) {
    $client_name = get_post_meta($post->ID, '_client_name', true);
    $client_company = get_post_meta($post->ID, '_client_company', true);
    $client_position = get_post_meta($post->ID, '_client_position', true);
    $security_rating = get_post_meta($post->ID, '_security_rating', true);
    $service_used = get_post_meta($post->ID, '_service_used', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="client_name"><?php _e('Kundenname:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="client_name" name="client_name" value="<?php echo esc_attr($client_name); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="client_company"><?php _e('Unternehmen:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="client_company" name="client_company" value="<?php echo esc_attr($client_company); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="client_position"><?php _e('Position:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="client_position" name="client_position" value="<?php echo esc_attr($client_position); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="security_rating"><?php _e('Bewertung:', 'safe-cologne'); ?></label></th>
            <td>
                <select id="security_rating" name="security_rating">
                    <?php for ($i = 5; $i >= 1; $i--) : ?>
                        <option value="<?php echo $i; ?>" <?php selected($security_rating, $i); ?>><?php echo $i; ?> <?php _e('Sterne', 'safe-cologne'); ?></option>
                    <?php endfor; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="service_used"><?php _e('Genutzter Service:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="service_used" name="service_used" value="<?php echo esc_attr($service_used); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

function safe_cologne_job_details_callback($post) {
    $job_type = get_post_meta($post->ID, '_job_type', true);
    $job_location = get_post_meta($post->ID, '_job_location', true);
    $job_salary_range = get_post_meta($post->ID, '_job_salary_range', true);
    $job_requirements = get_post_meta($post->ID, '_job_requirements', true);
    $job_benefits = get_post_meta($post->ID, '_job_benefits', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="job_type"><?php _e('Anstellungsart:', 'safe-cologne'); ?></label></th>
            <td>
                <select id="job_type" name="job_type">
                    <option value="vollzeit" <?php selected($job_type, 'vollzeit'); ?>><?php _e('Vollzeit', 'safe-cologne'); ?></option>
                    <option value="teilzeit" <?php selected($job_type, 'teilzeit'); ?>><?php _e('Teilzeit', 'safe-cologne'); ?></option>
                    <option value="minijob" <?php selected($job_type, 'minijob'); ?>><?php _e('Minijob', 'safe-cologne'); ?></option>
                    <option value="freelance" <?php selected($job_type, 'freelance'); ?>><?php _e('Freelance', 'safe-cologne'); ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <th><label for="job_location"><?php _e('Standort:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="job_location" name="job_location" value="<?php echo esc_attr($job_location); ?>" class="regular-text" placeholder="z.B. Köln-Innenstadt" /></td>
        </tr>
        <tr>
            <th><label for="job_salary_range"><?php _e('Gehaltsspanne:', 'safe-cologne'); ?></label></th>
            <td><input type="text" id="job_salary_range" name="job_salary_range" value="<?php echo esc_attr($job_salary_range); ?>" class="regular-text" placeholder="z.B. 2.500 - 3.500 EUR" /></td>
        </tr>
        <tr>
            <th><label for="job_requirements"><?php _e('Anforderungen:', 'safe-cologne'); ?></label></th>
            <td><textarea id="job_requirements" name="job_requirements" rows="5" class="large-text" placeholder="Eine Anforderung pro Zeile"><?php echo esc_textarea($job_requirements); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="job_benefits"><?php _e('Benefits:', 'safe-cologne'); ?></label></th>
            <td><textarea id="job_benefits" name="job_benefits" rows="5" class="large-text" placeholder="Ein Benefit pro Zeile"><?php echo esc_textarea($job_benefits); ?></textarea></td>
        </tr>
    </table>
    <?php
}

// Save meta box data
add_action('save_post', 'safe_cologne_save_meta_box_data');
function safe_cologne_save_meta_box_data($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['safe_cologne_meta_box_nonce'])) {
        return;
    }
    
    if (!wp_verify_nonce($_POST['safe_cologne_meta_box_nonce'], 'safe_cologne_save_meta_box_data')) {
        return;
    }
    
    // Check if autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save data based on post type
    $post_type = get_post_type($post_id);
    
    switch ($post_type) {
        case 'security_services':
            if (isset($_POST['service_price_range'])) {
                update_post_meta($post_id, '_service_price_range', sanitize_text_field($_POST['service_price_range']));
            }
            if (isset($_POST['service_features'])) {
                update_post_meta($post_id, '_service_features', sanitize_textarea_field($_POST['service_features']));
            }
            break;
            
        case 'team_members':
            if (isset($_POST['member_position'])) {
                update_post_meta($post_id, '_member_position', sanitize_text_field($_POST['member_position']));
            }
            if (isset($_POST['member_experience'])) {
                update_post_meta($post_id, '_member_experience', absint($_POST['member_experience']));
            }
            if (isset($_POST['member_certifications'])) {
                update_post_meta($post_id, '_member_certifications', sanitize_textarea_field($_POST['member_certifications']));
            }
            if (isset($_POST['member_specialization'])) {
                update_post_meta($post_id, '_member_specialization', sanitize_text_field($_POST['member_specialization']));
            }
            break;
            
        case 'testimonials':
            if (isset($_POST['client_name'])) {
                update_post_meta($post_id, '_client_name', sanitize_text_field($_POST['client_name']));
            }
            if (isset($_POST['client_company'])) {
                update_post_meta($post_id, '_client_company', sanitize_text_field($_POST['client_company']));
            }
            if (isset($_POST['client_position'])) {
                update_post_meta($post_id, '_client_position', sanitize_text_field($_POST['client_position']));
            }
            if (isset($_POST['security_rating'])) {
                update_post_meta($post_id, '_security_rating', absint($_POST['security_rating']));
            }
            if (isset($_POST['service_used'])) {
                update_post_meta($post_id, '_service_used', sanitize_text_field($_POST['service_used']));
            }
            break;
            
        case 'jobs':
            if (isset($_POST['job_type'])) {
                update_post_meta($post_id, '_job_type', sanitize_text_field($_POST['job_type']));
            }
            if (isset($_POST['job_location'])) {
                update_post_meta($post_id, '_job_location', sanitize_text_field($_POST['job_location']));
            }
            if (isset($_POST['job_salary_range'])) {
                update_post_meta($post_id, '_job_salary_range', sanitize_text_field($_POST['job_salary_range']));
            }
            if (isset($_POST['job_requirements'])) {
                update_post_meta($post_id, '_job_requirements', sanitize_textarea_field($_POST['job_requirements']));
            }
            if (isset($_POST['job_benefits'])) {
                update_post_meta($post_id, '_job_benefits', sanitize_textarea_field($_POST['job_benefits']));
            }
            break;
    }
}

// Add custom columns to admin
add_filter('manage_security_services_posts_columns', 'safe_cologne_service_columns');
function safe_cologne_service_columns($columns) {
    $columns['price_range'] = __('Preisspanne', 'safe-cologne');
    return $columns;
}

add_action('manage_security_services_posts_custom_column', 'safe_cologne_service_column_content', 10, 2);
function safe_cologne_service_column_content($column, $post_id) {
    if ($column == 'price_range') {
        $price_range = get_post_meta($post_id, '_service_price_range', true);
        echo $price_range ? esc_html($price_range) : '—';
    }
}

// Add custom columns for team members
add_filter('manage_team_members_posts_columns', 'safe_cologne_team_columns');
function safe_cologne_team_columns($columns) {
    $columns['position'] = __('Position', 'safe-cologne');
    $columns['experience'] = __('Erfahrung', 'safe-cologne');
    return $columns;
}

add_action('manage_team_members_posts_custom_column', 'safe_cologne_team_column_content', 10, 2);
function safe_cologne_team_column_content($column, $post_id) {
    switch ($column) {
        case 'position':
            $position = get_post_meta($post_id, '_member_position', true);
            echo $position ? esc_html($position) : '—';
            break;
        case 'experience':
            $experience = get_post_meta($post_id, '_member_experience', true);
            echo $experience ? sprintf(__('%d Jahre', 'safe-cologne'), $experience) : '—';
            break;
    }
}

// Add custom columns for testimonials
add_filter('manage_testimonials_posts_columns', 'safe_cologne_testimonial_columns');
function safe_cologne_testimonial_columns($columns) {
    $columns['rating'] = __('Bewertung', 'safe-cologne');
    $columns['client'] = __('Kunde', 'safe-cologne');
    return $columns;
}

add_action('manage_testimonials_posts_custom_column', 'safe_cologne_testimonial_column_content', 10, 2);
function safe_cologne_testimonial_column_content($column, $post_id) {
    switch ($column) {
        case 'rating':
            $rating = get_post_meta($post_id, '_security_rating', true);
            if ($rating) {
                echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
            } else {
                echo '—';
            }
            break;
        case 'client':
            $client_name = get_post_meta($post_id, '_client_name', true);
            $client_company = get_post_meta($post_id, '_client_company', true);
            if ($client_name) {
                echo esc_html($client_name);
                if ($client_company) {
                    echo '<br><small>' . esc_html($client_company) . '</small>';
                }
            } else {
                echo '—';
            }
            break;
    }
}

// Add custom columns for job openings
add_filter('manage_jobs_posts_columns', 'safe_cologne_job_columns');
function safe_cologne_job_columns($columns) {
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key == 'title') {
            $new_columns['job_type'] = __('Art', 'safe-cologne');
            $new_columns['job_location'] = __('Standort', 'safe-cologne');
        }
    }
    return $new_columns;
}

add_action('manage_jobs_posts_custom_column', 'safe_cologne_job_column_content', 10, 2);
function safe_cologne_job_column_content($column, $post_id) {
    switch ($column) {
        case 'job_type':
            $job_type = get_post_meta($post_id, '_job_type', true);
            $types = array(
                'vollzeit' => __('Vollzeit', 'safe-cologne'),
                'teilzeit' => __('Teilzeit', 'safe-cologne'),
                'minijob' => __('Minijob', 'safe-cologne'),
                'freelance' => __('Freelance', 'safe-cologne'),
            );
            echo isset($types[$job_type]) ? esc_html($types[$job_type]) : '—';
            break;
        case 'job_location':
            $location = get_post_meta($post_id, '_job_location', true);
            echo $location ? esc_html($location) : '—';
            break;
    }
}
